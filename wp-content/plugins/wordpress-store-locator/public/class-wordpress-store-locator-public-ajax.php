<?php

class WordPress_Store_Locator_Public_Ajax
{

    private $plugin_name;
    private $version;
    private $options;
    protected $alreadyFetchedIds;

    /**
     * Store Locator Ajax Class 
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   string                         $plugin_name 
     * @param   string                         $version     
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->alreadyFetchedIds = array();
    }

    /**
     * Get Stores and echo json encoded Data
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  JSON    The Stores
     */
    public function get_stores()
    {
        if (!defined('DOING_AJAX') || !DOING_AJAX) {
            die('No AJAX call!');
        }

        if (!isset($_POST['lat']) || !isset($_POST['lng']) || !isset($_POST['radius'])) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('No Lat, Lng or Radius');
        }

        $lat = floatval($_POST['lat']);
        $lng = floatval($_POST['lng']);
        $radius = absint($_POST['radius']);
        if (!is_float($lat) || !is_float($lng) || !absint($radius)) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('Not a correct value for Lat, Lng or Radius!');
        }

        $stores = $this->query_stores($lat, $lng, $radius);
        echo json_encode($stores, JSON_FORCE_OBJECT);
        die();
    }

    /**
     * Get Stores and echo json encoded Data
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  JSON    The Stores
     */
    public function get_along_route_stores()
    {
        global $wordpress_store_locator_options;

        if (!defined('DOING_AJAX') || !DOING_AJAX) {
            die('No AJAX call!');
        }

        if (!isset($_POST['latLngs']) || empty($_POST['latLngs'])) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('No Lat, Lng or Radius');
        }

        $latLngs = $_POST['latLngs'];
        $radius = absint( $wordpress_store_locator_options['searchBoxAlongRouteRadius'] );

        $stores = array();
        foreach($latLngs as $latLng) {
            $storesPart = $this->query_stores($latLng['lat'], $latLng['lng'], $radius);
            $stores = array_merge($stores, $storesPart);
        }

        echo json_encode($stores, JSON_FORCE_OBJECT);
        die();
    }



    /**
     * The Database query for getting the right Stores
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  array Stores
     */
    public function query_stores($lat, $lng, $radius)
    {
        global $wpdb, $wordpress_store_locator_options;

        $store_data = array();

        $distanceUnit = ($wordpress_store_locator_options['mapDistanceUnit'] == 'km') ? 6371 : 3959;

        if (!$radius || empty($radius)) {
            $radius = $wordpress_store_locator_options['mapRadius'];
        }

        $resultListMax = $wordpress_store_locator_options['resultListMax'];    
        $sorting = $wordpress_store_locator_options['resultListOrder'];

        if(empty($sorting)) {
            $sorting = 'distance';
        }

        // Filtering
        $filter = '';
        if (isset($_POST['categories']) || isset($_POST['filter'])) {

            if (!empty($_POST['categories'][0])) {
                $categories_ids = array_map('absint', $_POST['categories']);
                $filter = $filter."
                        INNER JOIN $wpdb->term_relationships AS term_rel ON posts.ID = term_rel.object_id
                        INNER JOIN $wpdb->term_taxonomy AS term_tax ON term_rel.term_taxonomy_id = term_tax.term_taxonomy_id 
                        AND term_tax.taxonomy = 'store_category'
                        AND term_tax.term_id IN (".implode(',', $categories_ids).')';
            }

            if (!empty($_POST['filter'])) {

                $filter_ids = array_map('absint', $_POST['filter']);

                $filtersWithOrOperator = array();
                $filtersWithAndOperator = array();
                foreach ($filter_ids as $filter_id) {

                    $filterQueryOperator = $wordpress_store_locator_options['filterQueryOperator'];
                    $filterQueryOperatorCheck = get_term_meta($filter_id, 'wordpress_store_locator_query_operator');

                    if(isset($filterQueryOperatorCheck[0]) && !empty($filterQueryOperatorCheck[0]) && $filterQueryOperatorCheck[0] !== "default") {
                        $filterQueryOperator = $filterQueryOperatorCheck[0];
                    }

                    if($filterQueryOperator == "OR") {
                        $filtersWithOrOperator[] = $filter_id;
                    } else {
                        $filtersWithAndOperator[] = $filter_id;
                    }
                }

                // OR-Operator!
                if(!empty($filtersWithOrOperator)) {
                    
                    $filter = $filter . " 
                           INNER JOIN $wpdb->term_relationships AS term_rel2 ON posts.ID = term_rel2.object_id
                           INNER JOIN $wpdb->term_taxonomy AS term_tax2 ON term_rel2.term_taxonomy_id = term_tax2.term_taxonomy_id 
                           AND term_tax2.taxonomy = 'store_filter'
                           AND term_tax2.term_id IN (" . implode( ', ', $filtersWithOrOperator ) .')';
                
                // AND Operator
                } 

                if(!empty($filtersWithAndOperator)) {
                    
                    $c = 3;
                    foreach ($filtersWithAndOperator as $filterWithAndOperator) {
                        $filter = $filter." 
                               INNER JOIN $wpdb->term_relationships AS term_rel".$c.' ON posts.ID = term_rel'.$c.".object_id
                               INNER JOIN $wpdb->term_taxonomy AS term_tax".$c.' ON term_rel'.$c.'.term_taxonomy_id = term_tax'.$c.'.term_taxonomy_id 
                               AND term_tax'.$c.".taxonomy = 'store_filter'
                               AND term_tax".$c.'.term_id = '.$filterWithAndOperator;
                        ++$c;
                    }
                }
            }
        } 

        $whereQuery = "";
        $extraJoin = "";
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $whereQuery = " AND posts.post_title LIKE '%" . esc_sql($_POST['name']) . "%' ";
        }

        if(isset($_POST['online_offline']) && !empty($_POST['online_offline']) && $_POST['online_offline'] != "all") {

            if($_POST['online_offline'] == 'online') {
                $radius = 999999;
                $extraJoin .= "INNER JOIN $wpdb->postmeta AS post_online ON post_online.post_id = posts.ID AND post_online.meta_key = 'wordpress_store_locator_online'";
                $whereQuery .= " AND post_online.meta_value = '1'";

            } elseif( $_POST['online_offline'] == 'offline') {

                $extraJoin .= "INNER JOIN $wpdb->postmeta AS post_offline ON post_offline.post_id = posts.ID AND post_offline.meta_key = 'wordpress_store_locator_offline'";
                $whereQuery .= " AND post_offline.meta_value = '1'";
            }
        }

        if($sorting == "premium") {
            $sql = "SELECT 
                    posts.ID,
                    posts.post_title as na,
                    posts.guid as gu,
                    posts.post_content as de,
                    posts.post_excerpt as ex,
                    post_lat.meta_value AS lat,
                    post_lng.meta_value AS lng,
                    post_premium.meta_value AS premium,
                    ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                        AS distance
                    FROM $wpdb->posts AS posts
                    INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                    INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                    INNER JOIN $wpdb->postmeta AS post_premium ON post_premium.post_id = posts.ID AND post_premium.meta_key = 'wordpress_store_locator_premium'
                    $extraJoin
                    $filter
                    WHERE posts.post_type = 'stores'
                    AND posts.post_status = 'publish'
                    $whereQuery
                    GROUP BY lat  
                    HAVING distance < %d ORDER BY premium DESC, distance ASC LIMIT 0, %d";
        } elseif($sorting == "ranking") {

            $sql = "SELECT 
                    posts.ID,
                    posts.post_title as na,
                    posts.guid as gu,
                    posts.post_content as de,
                    posts.post_excerpt as ex,
                    post_lat.meta_value AS lat,
                    post_lng.meta_value AS lng,
                    post_ranking.meta_value AS ranking,
                    ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                        AS distance
                    FROM $wpdb->posts AS posts
                    INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                    INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                    INNER JOIN $wpdb->postmeta AS post_ranking ON post_ranking.post_id = posts.ID AND post_ranking.meta_key = 'wordpress_store_locator_ranking'
                    $extraJoin
                    $filter
                    WHERE posts.post_type = 'stores'
                    AND posts.post_status = 'publish'
                    $whereQuery
                    GROUP BY lat  
                    HAVING distance < %d ORDER BY ranking + 0 DESC, distance ASC LIMIT 0, %d";
        } else {
            $sql = "SELECT 
            			posts.ID,
            			posts.post_title as na,
                        posts.guid as gu,
            			posts.post_content as de,
                        posts.post_excerpt as ex,
    					post_lat.meta_value AS lat,
                       	post_lng.meta_value AS lng,
                       	( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                    	AS distance
                  		FROM $wpdb->posts AS posts
    		            INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
    		            INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                        $extraJoin
                        $filter
                 		WHERE posts.post_type = 'stores'
                   		AND posts.post_status = 'publish'
                        $whereQuery
                   		GROUP BY lat 
                       	HAVING distance < %d ORDER BY " . $sorting . " LIMIT 0, %d";
        }

        $values = array(
            $distanceUnit,
            $lat,
            $lng,
            $lat,
            $radius,
            $resultListMax,
        );

        $stores = $wpdb->get_results($wpdb->prepare($sql, $values));

        // echo $wpdb->last_query;
        // echo $wpdb->last_result;
        // echo $wpdb->last_error;
        // die();

        $resultListMin = isset($wordpress_store_locator_options['resultListMin']) ? $wordpress_store_locator_options['resultListMin'] : 0;
        if(!empty($resultListMin)) {
            $storesCount = count($stores); 
            if($storesCount < $resultListMin) {

               $values = array(
                    $distanceUnit,
                    $lat,
                    $lng,
                    $lat,
                    99999,
                    $resultListMax,
                );

                $stores = $wpdb->get_results($wpdb->prepare($sql, $values));
                if($stores) {
                    $stores = array_slice($stores, 0, $resultListMin);
                }

            }
        }

        if ($stores) {
            $store_data = apply_filters('wordpress_store_locator_stores', $this->get_meta_data($stores));
        }

        return $store_data;
    }

    /**
     * Get the Stores Metadata
     * Also remove not needed Data and minify the data for the AJAX transfer
     * 
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   array $stores Stores
     * @return  array Stores with Meta Data
     */
    public function get_meta_data($stores, $isAllStores = false)
    {
        global $wpdb, $wordpress_store_locator_options, $isContactForm;;

        $prefix = 'wordpress_store_locator_';

        foreach ($stores as $store_key => $store) {

            if(in_array($store->ID, $this->alreadyFetchedIds)) {
                unset($stores[$store_key]);
            }

            $this->alreadyFetchedIds[] = $store->ID;

            // Get the post meta data
            $store_metas = get_post_meta($store->ID);

            $store->gu = get_permalink($store->ID);

            // Meta Data
            if ($wordpress_store_locator_options['showRating'] || $isContactForm) {
                $store->rt = '';
                if(isset($store_metas["{$prefix}average_rating"][0])) {
                    $store->rt = $store_metas["{$prefix}average_rating"][0];
                }
            }

            if ($wordpress_store_locator_options['showStreet'] || $isContactForm) {
                $store->st = '';
                if(isset($store_metas["{$prefix}address1"][0])) {
                    $store->st .= $store_metas["{$prefix}address1"][0];
                }
                if(isset($store_metas["{$prefix}address2"][0])) {
                    $store->st .= '<br> '. $store_metas["{$prefix}address2"][0];
                }
            }
            if ($wordpress_store_locator_options['showZip'] || $isContactForm) {
                $store->zp = '';
                if(isset($store_metas["{$prefix}zip"][0])) {
                    $store->zp = $store_metas["{$prefix}zip"][0];
                }
            }
            if ($wordpress_store_locator_options['showCity'] || $isContactForm) {
                $store->ct = '';
                if(isset($store_metas["{$prefix}city"][0])) {
                    $store->ct = ' '. $store_metas["{$prefix}city"][0];
                }
            }
            if ($wordpress_store_locator_options['showCountry'] || $isContactForm) {
                $store->co = '';
                if(isset($store_metas["{$prefix}country"][0])) {
                    $store->co = ' '. $store_metas["{$prefix}country"][0];
                }
            }
            if ($wordpress_store_locator_options['showRegion'] || $isContactForm) {
                $store->rg = '';
                if(isset($store_metas["{$prefix}region"][0])) {
                    $store->rg = $store_metas["{$prefix}region"][0];
                }
            }
            
            if (($wordpress_store_locator_options['showTelephone'] || $wordpress_store_locator_options['showCallNow'] || $wordpress_store_locator_options['resultListLinkAction'] == "tel" || $wordpress_store_locator_options['infowindowLinkAction'] == "tel" || $isContactForm) && isset($store_metas["{$prefix}telephone"][0])) {
                $store->te = $store_metas["{$prefix}telephone"][0];
            }

            if (($wordpress_store_locator_options['showMobile'] || $isContactForm) && isset($store_metas["{$prefix}mobile"][0])) {
                $store->mo = $store_metas["{$prefix}mobile"][0];
            }

            if (($wordpress_store_locator_options['showFax'] || $isContactForm) && isset($store_metas["{$prefix}fax"][0])) {
                $store->fa = $store_metas["{$prefix}fax"][0];
            }

            if (($wordpress_store_locator_options['showDistance'] || $isContactForm) && isset($store->distance)) {
                $store->dc = substr($store->distance, 0, 4) . ' ' . $wordpress_store_locator_options['mapDistanceUnit'];

                if($isAllStores && $wordpress_store_locator_options['resultListAllHideDistance'] == "1") {
                    unset($store->dc);
                }
            }

            if(isset($wordpress_store_locator_options['showCustomMetaFieldAfterAddress']) && !empty($wordpress_store_locator_options['showCustomMetaFieldAfterAddress']) && isset($store_metas[$wordpress_store_locator_options['showCustomMetaFieldAfterAddress']][0])) {
                $store->aa = $store_metas[$wordpress_store_locator_options['showCustomMetaFieldAfterAddress']][0];
            }

            // Live Lat
            if ($wordpress_store_locator_options['singleStoreLivePosition'] && isset($store_metas[$wordpress_store_locator_options['singleStoreLivePositionLatField']][0])) {
                $store->ll = $store_metas[$wordpress_store_locator_options['singleStoreLivePositionLatField']][0];
            }


            $customFields = $wordpress_store_locator_options['showCustomFields'];
            if(!empty($customFields)) {

                $customStoreFields = array();

                foreach ($customFields as $customFieldKey => $customFieldName) {

                    $customFieldKey = $prefix . $customFieldKey;
                    if (isset($store_metas[$customFieldKey][0])) {
                        $customStoreFields[] = array(
                            'name' => $customFieldName,
                            'value' => $store_metas[$customFieldKey][0],
                        );
                    }
                }

                $store->cs = $customStoreFields;
            }

            if (($wordpress_store_locator_options['showFax'] || $isContactForm) && isset($store_metas["{$prefix}fax"][0])) {
                $store->fa = $store_metas["{$prefix}fax"][0];
            }

            $store->ic = "";
            $args = array('fields' => 'ids', 'orderby' => 'name', 'order' => 'ASC');
            $category_ids = wp_get_object_terms($store->ID, 'store_category', $args); // categories

            if(isset($store_metas["{$prefix}icon"]) && isset($store_metas["{$prefix}icon"][0]) && is_string($store_metas["{$prefix}icon"][0]) ) {
                $store_icon = trim( $store_metas["{$prefix}icon"][0] );
                if(isset($store_icon) && !empty($store_icon)) {
                    $store->ic = $store_icon;
                }
            }

            if(empty($store->ic)) {

                // Selected category
                $category_ids_selected = array();
                if(isset($_POST['categories']) && !empty($_POST['categories'])) {
                    $category_ids_selected = array_intersect($_POST['categories'], $category_ids);
                }

                if(!empty($category_ids_selected)) {

                    $category_icon_selected = get_term_meta($category_ids_selected[0], 'wordpress_store_locator_icon');
                    if(isset($category_icon_selected[0]) && !empty( trim( $category_icon_selected[0]['url'])) ) {
                        $store->ic = $category_icon_selected[0]['url'];
                    }
                }

                if(!empty($category_ids) && empty($store->ic)){

                    $category_icon = get_term_meta($category_ids[0], 'wordpress_store_locator_icon');
                    if(isset($category_icon[0]) && isset($category_icon[0]['url']) && is_string($category_icon[0]['url'])) {
                        $category_icon = trim( $category_icon[0]['url'] );
                        if(!empty($category_icon)) {
                            $store->ic = $category_icon;
                        }
                    }
                }
            }

            // 
            $store->mi = "";

            $inventories = get_the_terms($store->ID, 'inventories'); // categories
            if(!is_wp_error($inventories) && !empty($inventories)) {
                $inventory = $inventories[0];
                $store->mi = array(
                    'id' => $inventory->term_id,
                    'name' => $inventory->name,
                );
            }

            if (($wordpress_store_locator_options['showEmail'] || $wordpress_store_locator_options['showWriteEmail'] || $wordpress_store_locator_options['resultListLinkAction'] == "email" || $wordpress_store_locator_options['infowindowLinkAction'] == "email" || $isContactForm) && isset($store_metas["{$prefix}email"][0])) {
                $store->em = $store_metas["{$prefix}email"][0];

                if($wordpress_store_locator_options['showEmailPlaceholder'] == "1" && isset($store_metas["{$prefix}email_placeholder"][0])) {
                    $store->emp = $store_metas["{$prefix}email_placeholder"][0];                    
                }
            }
            
            if (($wordpress_store_locator_options['showWebsite'] || $wordpress_store_locator_options['showVisitWebsite'] || $wordpress_store_locator_options['resultListLinkAction'] == "web" || $wordpress_store_locator_options['infowindowLinkAction'] || $isContactForm) && isset($store_metas["{$prefix}website"][0])) {
                $store->we = $store_metas["{$prefix}website"][0];
            }

            if (($wordpress_store_locator_options['showRetailers']) && isset($_POST['product_id']) && !empty($_POST['product_id'])) {
                // $store->re = $store_metas["{$prefix}website"][0];
                $retailers = get_the_terms($store->ID, 'retailers'); // categories
                if(!is_wp_error($retailers) && !empty($retailers)) {

                    $retailerIds = wp_list_pluck($retailers, 'term_id');
                    $store->re = do_shortcode('[woocommerce_product_retailers product_id="' . intval($_POST['product_id']) .'" retailer_ids="' . implode(',', $retailerIds) . '"]');
                    
                }

                
            }

            if (($wordpress_store_locator_options['showChat'] || $wordpress_store_locator_options['resultListLinkAction'] == "chat" || $wordpress_store_locator_options['infowindowLinkAction'] || $isContactForm) && isset($store_metas["{$prefix}chat"][0])) {
                $store->ch = $store_metas["{$prefix}chat"][0];
            }

            if ($wordpress_store_locator_options['resultListPremiumIconEnabled'] && isset($store_metas["{$prefix}premium"][0])) {
                $store->pr = $store_metas["{$prefix}premium"][0];
            }
            if ($wordpress_store_locator_options['showStoreFilter']) {
                $args = array('orderby' => 'name', 'order' => 'ASC');
                $storeFilters = wp_get_object_terms($store->ID, 'store_filter', $args);
                $store->fi = array();
                if(!empty($storeFilters)) {

                    $storeFilterNames = array();
                    foreach($storeFilters as $storeFilter) {
                        if($storeFilter->parent != 0) {
                            $storeFilterNames[] = $storeFilter->name;
                        }
                    }
                    $store->fi = $storeFilterNames;
                }
            }
            if ($wordpress_store_locator_options['showStoreCategories'] || $isContactForm) {

                if ($wordpress_store_locator_options['showFilterCategoriesAsImage']) {

                    $tmp = array();
                    $store->ca = wp_get_object_terms($store->ID, 'store_category');
                    if(!empty($store->ca)) {
                        foreach ($store->ca as $store_category) {

                            $category_icon = get_term_meta($store_category->term_id, 'wordpress_store_locator_icon');
                            if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                                $tmp[] = $category_icon[0]['url'];
                            } else {
                                $tmp[] = $wordpress_store_locator_options['mapDefaultIcon'];
                            }
                        }
                    }
                    $store->ca = $tmp;
                } else {
                    $args = array('fields' => 'names', 'orderby' => 'name', 'order' => 'ASC');
                    $store->ca = wp_get_object_terms($store->ID, 'store_category', $args);
                }
            }

            if ($wordpress_store_locator_options['showOpeningHours'] || $isContactForm) {
                $weekdays = array(
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday',
                );
                $c = 0;
                foreach ($weekdays as $weekday) {
                    $store->op[$c++] = isset($store_metas["{$prefix}{$weekday}_open"]) ? $store_metas["{$prefix}{$weekday}_open"][0] : '';
                    $store->op[$c++] = isset($store_metas["{$prefix}{$weekday}_close"]) ? $store_metas["{$prefix}{$weekday}_close"][0] : '';
                }
            }

            if ($wordpress_store_locator_options['showOpeningHours2'] || $isContactForm) {
                $weekdays = array(
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday',
                );
                $c = 0;
                foreach ($weekdays as $weekday) {
                    $store->op2[$c++] = isset($store_metas["{$prefix}{$weekday}_open2"]) ? $store_metas["{$prefix}{$weekday}_open2"][0] : '';
                    $store->op2[$c++] = isset($store_metas["{$prefix}{$weekday}_close2"]) ? $store_metas["{$prefix}{$weekday}_close2"][0] : '';
                }
            }

            // Unset not shown posts fields
            if (!$wordpress_store_locator_options['showName']) {
                unset($store->na);
            }
            
            if (!$wordpress_store_locator_options['showExcerpt']) {
                unset($store->ex);
            }

            if (!$wordpress_store_locator_options['showDescription']) {
                unset($store->de);
            } else {

                if ($wordpress_store_locator_options['showDescriptionStripShortcodes']) {
                    $store->de = preg_replace("/\[[^\]]+\]/", '', $store->de);
                } else {
                    if (class_exists('WPBMap') && $wordpress_store_locator_options['showDescriptionVisualComposer']) {
                        WPBMap::addAllMappedShortcodes();
                    }
                    $store->de = wpautop( do_shortcode($store->de) );
                }
            }

            if ($wordpress_store_locator_options['showImage'] && isset($store_metas['_thumbnail_id'])) {
                $imageURL = $this->get_thumb($store_metas['_thumbnail_id'][0]);

                if(!empty($imageURL)) {
                    $store->im = $imageURL;
                }
            }
        }

        return $stores;
    }

    /**
     * Get Image Thumb
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   int                         $image_id Image ID
     * @return  string URL of image
     */
    public function get_thumb($image_id)
    {
        global $wordpress_store_locator_options;

        // $width = substr($wordpress_store_locator_options['imageDimensions']['width'], 0, -2);
        // $height = substr($wordpress_store_locator_options['imageDimensions']['height'], 0, -2);

        $showImageSize = "medium";
        if(isset($wordpress_store_locator_options['showImageSize']) && !empty($wordpress_store_locator_options['showImageSize']) ) {
            $showImageSize = $wordpress_store_locator_options['showImageSize'];
        }

        $image = wp_get_attachment_image_src($image_id, $showImageSize);

        return $image[0];
    }

   /**
     * Get Stores and echo json encoded Data
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  JSON    The Stores
     */
    public function get_all_stores()
    {
        global $isContactForm;

        if (!defined('DOING_AJAX') || !DOING_AJAX) {
            die('No AJAX call!');
        }

        $lat = floatval($_POST['lat']);
        $lng = floatval($_POST['lng']);

        $isContactForm = $_POST['contactform'];

        $stores = $this->query_all_stores($lat, $lng);
        echo json_encode($stores, JSON_FORCE_OBJECT);
        die();
    }

    /**
     * The Database query for getting the right Stores
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  array Stores
     */
    public function query_all_stores($lat, $lng, $useDefaultSorting = true)
    {
        global $wpdb, $wordpress_store_locator_options;

        $store_data = array();

        $distanceUnit = ($wordpress_store_locator_options['mapDistanceUnit'] == 'km') ? 6371 : 3959;

        $sorting = $wordpress_store_locator_options['resultListOrderAllStores'];
        if(empty($sorting) || !$useDefaultSorting) {
            $sorting = 'distance';
        }

        if(empty($lat) || empty($lng)) {
            $lat = $wordpress_store_locator_options['searchBoxShowShowAllStoresLat'];
            $lng = $wordpress_store_locator_options['searchBoxShowShowAllStoresLng'];
        }

        if(!empty($lat) && !empty($lng)) {

            if($sorting == "premium") {
                $sql = "SELECT 
                        posts.ID,
                        posts.post_title as na,
                        posts.guid as gu,
                        posts.post_content as de,
                        posts.post_excerpt as ex,
                        post_lat.meta_value AS lat,
                        post_lng.meta_value AS lng,
                        post_premium.meta_value AS premium,
                        ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                            AS distance
                        FROM $wpdb->posts AS posts
                        INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                        INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                        INNER JOIN $wpdb->postmeta AS post_premium ON post_premium.post_id = posts.ID AND post_premium.meta_key = 'wordpress_store_locator_premium'
                        WHERE posts.post_type = 'stores'
                        AND posts.post_status = 'publish'
                        GROUP BY lat  
                        HAVING distance < %d ORDER BY premium DESC";
            } elseif($sorting == "ranking") {

                $sql = "SELECT 
                        posts.ID,
                        posts.post_title as na,
                        posts.guid as gu,
                        posts.post_content as de,
                        posts.post_excerpt as ex,
                        post_lat.meta_value AS lat,
                        post_lng.meta_value AS lng,
                        post_ranking.meta_value AS ranking,
                        ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                            AS distance
                        FROM $wpdb->posts AS posts
                        INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                        INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                        INNER JOIN $wpdb->postmeta AS post_ranking ON post_ranking.post_id = posts.ID AND post_ranking.meta_key = 'wordpress_store_locator_ranking'
                        WHERE posts.post_type = 'stores'
                        AND posts.post_status = 'publish'
                        GROUP BY lat  
                        HAVING distance < %d ORDER BY ranking + 0 DESC";
            } else {
                $sql = "SELECT 
                            posts.ID,
                            posts.post_title as na,
                            posts.guid as gu,
                            posts.post_content as de,
                            posts.post_excerpt as ex,
                            post_lat.meta_value AS lat,
                            post_lng.meta_value AS lng,
                            ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                            AS distance
                            FROM $wpdb->posts AS posts
                            INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                            INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                            WHERE posts.post_type = 'stores'
                            AND posts.post_status = 'publish'
                            GROUP BY lat 
                            HAVING distance < %d ORDER BY " . $sorting . "";
            }


            $values = array(
                $distanceUnit, 
                $lat, 
                $lng, 
                $lat, 
                99999, 
            );

            $stores = $wpdb->get_results($wpdb->prepare($sql, $values));

        } else {
            $sql = "SELECT 
                        posts.ID,
                        posts.post_title as na,
                        posts.guid as gu,
                        posts.post_content as de,
                        posts.post_excerpt as ex,
                        post_lat.meta_value AS lat,
                        post_lng.meta_value AS lng
                        FROM $wpdb->posts AS posts
                        INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                        INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                        WHERE posts.post_type = 'stores'
                        AND posts.post_status = 'publish'
                        GROUP BY lat 
                        ORDER BY posts.post_title";

            $stores = $wpdb->get_results($wpdb->prepare($sql, array()));
        }

        if ($stores) {
            $store_data = apply_filters('wordpress_store_locator_all_stores', $this->get_meta_data($stores, true));
        }

        return $store_data;
    }

    /**
     * The Database query for getting the right Stores
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  array Stores
     */
    public function get_stores_by_name()
    {
        global $wpdb, $wordpress_store_locator_options;

        $store_data = array();

        if (!isset($_POST['name'])) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('No name.');
        }

        $name = sanitize_text_field($_POST['name']);

        $sorting = $wordpress_store_locator_options['resultListOrder'];
        $distanceUnit = ($wordpress_store_locator_options['mapDistanceUnit'] == 'km') ? 6371 : 3959;
        
        if(empty($sorting)) {
            $sorting = 'distance';
        }

        if($sorting == "premium") {
            $sql = "SELECT 
                    posts.ID,
                    posts.post_title as na,
                    posts.guid as gu,
                    posts.post_content as de,
                    posts.post_excerpt as ex,
                    post_lat.meta_value AS lat,
                    post_lng.meta_value AS lng,
                    post_premium.meta_value AS premium,
                    ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                        AS distance
                    FROM $wpdb->posts AS posts
                    INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                    INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                    INNER JOIN $wpdb->postmeta AS post_premium ON post_premium.post_id = posts.ID AND post_premium.meta_key = 'wordpress_store_locator_premium'
                    WHERE posts.post_type = 'stores'
                    AND posts.post_status = 'publish'
                    AND posts.post_title LIKE %s
                    GROUP BY lat  
                    HAVING distance < %d ORDER BY premium DESC";
        } elseif($sorting == "ranking") {

            $sql = "SELECT 
                    posts.ID,
                    posts.post_title as na,
                    posts.guid as gu,
                    posts.post_content as de,
                    posts.post_excerpt as ex,
                    post_lat.meta_value AS lat,
                    post_lng.meta_value AS lng,
                    post_ranking.meta_value AS ranking,
                    ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                        AS distance
                    FROM $wpdb->posts AS posts
                    INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                    INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                    INNER JOIN $wpdb->postmeta AS post_ranking ON post_ranking.post_id = posts.ID AND post_ranking.meta_key = 'wordpress_store_locator_ranking'
                    WHERE posts.post_type = 'stores'
                    AND posts.post_status = 'publish'
                    AND posts.post_title LIKE %s
                    GROUP BY lat  
                    HAVING distance < %d ORDER BY ranking + 0 DESC";
        } else {
            $sql = "SELECT 
                        posts.ID,
                        posts.post_title as na,
                        posts.guid as gu,
                        posts.post_content as de,
                        posts.post_excerpt as ex,
                        post_lat.meta_value AS lat,
                        post_lng.meta_value AS lng,
                        ( %d * acos( cos( radians( %s ) ) * cos( radians( post_lat.meta_value ) ) * cos( radians( post_lng.meta_value ) - radians( %s ) ) + sin( radians( %s ) ) * sin( radians( post_lat.meta_value ) ) ) )
                        AS distance
                        FROM $wpdb->posts AS posts
                        INNER JOIN $wpdb->postmeta AS post_lat ON post_lat.post_id = posts.ID AND post_lat.meta_key = 'wordpress_store_locator_lat'
                        INNER JOIN $wpdb->postmeta AS post_lng ON post_lng.post_id = posts.ID AND post_lng.meta_key = 'wordpress_store_locator_lng'
                        WHERE posts.post_type = 'stores'
                        AND posts.post_status = 'publish'
                        AND LOWER(posts.post_title) LIKE LOWER(%s)
                        GROUP BY lat 
                        HAVING distance < %d ORDER BY " . $sorting . "";
        }


        $values = array(
            $distanceUnit, 
            $wordpress_store_locator_options['mapDefaultLat'], 
            $wordpress_store_locator_options['mapDefaultLng'], 
            $wordpress_store_locator_options['mapDefaultLat'],
            '%' . $name . '%',
            999999, 
        );

        $stores = $wpdb->get_results($wpdb->prepare($sql, $values));   

        if ($stores) {
            $store_data = apply_filters('wordpress_store_locator_stores_by_name_stores', $this->get_meta_data($stores));
        }

        echo json_encode($stores, JSON_FORCE_OBJECT);
        die();
    }

    /**
     * Get nearest store
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  JSON    The Stores
     */
    public function get_nearest_store()
    {
        if (!defined('DOING_AJAX') || !DOING_AJAX) {
            die('No AJAX call!');
        }

        if (!isset($_POST['lat']) || !isset($_POST['lng'])) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('No Lat or Lng or Radius');
        }

        $lat = floatval($_POST['lat']);
        $lng = floatval($_POST['lng']);
        $day = intval($_POST['day']);
        if (!is_float($lat) || !is_float($lng) ) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('Not a correct value for Lat or Lng!');
        }

        $stores = $this->query_all_stores($lat, $lng, false);

        $store = $stores[0];
        $prefix = 'wordpress_store_locator_';

        $store_metas = get_post_meta($store->ID);

        $store->st = "";
        $store->st .= isset($store_metas["{$prefix}address1"]) ? $store_metas["{$prefix}address1"][0]: '';
        $store->st .= isset($store_metas["{$prefix}address2"]) ? ' ' . $store_metas["{$prefix}address2"][0]: '';
        $store->st .= isset($store_metas["{$prefix}city"]) ? ', ' . $store_metas["{$prefix}city"][0]: '';
        // $store->st = $store_metas["{$prefix}zip"][0];
        // $store->co = $store_metas["{$prefix}country"][0];
        // $store->rg = $store_metas["{$prefix}region"][0];

        $weekdays = array(
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        );
        $c = 0;
        $weekday = $weekdays[$day];

        $store->op = isset($store_metas["{$prefix}{$weekday}_open"]) ? '' . $store_metas["{$prefix}{$weekday}_open"][0]: '';
        $store->op .= isset($store_metas["{$prefix}{$weekday}_close"]) ?  ' – ' . $store_metas["{$prefix}{$weekday}_close"][0] : '';
        
        echo json_encode($store, JSON_FORCE_OBJECT);

        die();
    }

    public function get_single_store_live_position()
    {
        if (!defined('DOING_AJAX') || !DOING_AJAX) {
            die('No AJAX call!');
        }

        if (!isset($_POST['post_id'])) {
            header('HTTP/1.1 400 Bad Request', true, 400);
            die('No post ID');
        }

        global $wordpress_store_locator_options;
        $post_id = intval($_POST['post_id']);

        $response = array(
            'lat' => floatval( get_post_meta($post_id, $wordpress_store_locator_options['singleStoreLivePositionLatField'], true) ),
            'lng' => floatval( get_post_meta($post_id, $wordpress_store_locator_options['singleStoreLivePositionLngField'], true) ),
        );

        echo json_encode($response, JSON_FORCE_OBJECT);
        die();

    }
}