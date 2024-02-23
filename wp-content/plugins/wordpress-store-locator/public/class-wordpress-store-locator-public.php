<?php

class WordPress_Store_Locator_Public
{
    private $plugin_name;
    private $version;
    private $options;
    protected $prefix;

    /**
     * Store Locator Plugin Construct
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

        $this->prefix = 'wordpress_store_locator_';
    }

    /**
     * Enqueue Styles
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function enqueue_styles()
    {
        global $wordpress_store_locator_options, $post;

        $performanceRenderOnThesePages = $this->get_option('performanceRenderOnThesePages');
        if(!empty($performanceRenderOnThesePages) && is_object($post)) {
            if ( $post->post_type != 'stores' && !in_array($post->ID, $performanceRenderOnThesePages) ) {
                if($this->get_option('buttonEnabled') && $this->get_option('buttonAction') == "1" && $post->post_type == 'product') {

                } else {
                    return false;
                }
            }
        }

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wordpress-store-locator-public.css', array(), $this->version, 'all');
        wp_enqueue_style($this->plugin_name . '-bootstrap', plugin_dir_url(__FILE__) . 'vendor/bootstrap/bootstrap.min.css', array(), $this->version, 'all');

        $doNotLoadFontAwesome = $this->get_option('doNotLoadFontAwesome');
        if (!$doNotLoadFontAwesome) {
            wp_enqueue_style('font-awesome-store-locator', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), '5.14.0', 'all');
        }

        if ($this->get_option('resultListSlider')) {
            wp_enqueue_style('slick', plugin_dir_url(__FILE__) . 'vendor/slick/slick.css', array(), '1.8.0', 'all');
        }

        $css = '';
        if (!$this->get_option('showName')) {
            $css .= ' .store_locator_name{display:none;}';
        }
        if (!$this->get_option('showStreet')) {
            $css .= ' .store_locator_street{display:none;}';
        }
        if (!$this->get_option('showCity')) {
            $css .= ' .store_locator_city{display:none;}';
        }
        if (!$this->get_option('showCountry')) {
            $css .= ' .store_locator_country{display:none;}';
        }
        if (!$this->get_option('showTelephone')) {
            $css .= ' .store_locator_tel{display:none;}';
        }
        if (!$this->get_option('showFax')) {
            $css .= ' .store_locator_fax{display:none;}';
        }
        if (!$this->get_option('showDistance')) {
            $css .= ' .store_locator_distance{display:none;}';
        }
        if (!$this->get_option('showMobile')) {
            $css .= ' .store_locator_mobile{display:none;}';
        }
        if (!$this->get_option('showWebsite')) {
            $css .= ' .store_locator_website{display:none;}';
        }
        if (!$this->get_option('showEmail')) {
            $css .= ' .store_locator_email{display:none;}';
        }
        if (!$this->get_option('showDescription')) {
            $css .= ' .store_locator_description{display:none;}';
        }
        if (!$this->get_option('showExcerpt')) {
            $css .= ' .store_locator_excerpt{display:none;}';
        }
        if (!$this->get_option('resultListEnabled')) {
            $css .= ' .store_locator_result_list_box{display:none;}';
        }
        if (!$this->get_option('mapEnabled')) {
            $css .= ' .store_locator_main{display:none;}';
        } 
        if (!$this->get_option('showGetDirection')) {
            $css .= ' .store_locator_get_direction{display:none !important;}';
        }
        if (!$this->get_option('showCallNow')) {
            $css .= ' .store_locator_call_now{display:none !important;}';
        }
        if (!$this->get_option('showChat')) {
            $css .= ' .store_locator_chat{display:none !important;}';
        }
        if (!$this->get_option('showVisitWebsite')) {
            $css .= ' .store_locator_visit_website{display:none !important;}';
        }
        if (!$this->get_option('showWriteEmail')) {
            $css .= ' .store_locator_write_email{display:none !important;}';
        }
        if (!$this->get_option('showShowOnMap')) {
            $css .= ' .store_locator_show_on_map{display:none !important;}';
        }
        if (!$this->get_option('showVisitStore')) {
            $css .= ' .store_locator_visit_store{display:none !important;}';
        }
        if (!$this->get_option('showImage')) {
            $css .= ' .store_locator_image{display:none !important;}';
        }

        if (!$this->get_option('resultListAutoHeight')) {
            $css .= '#store_locator_result_list {
                        max-height: initial;
                        overflow-y: auto;
                        overflow-x: auto;
                    }';
        }

        $opacity = $this->get_option('loadingOverlayTransparency');
        $css .= ' .store_locator_loading{background-color:' . $this->get_option('loadingOverlayColor') . ';opacity: ' . $opacity . ';}';
        $css .= ' .store_locator_loading i{color:' . $this->get_option('loadingIconColor') . ';}';
        $css .= ' .gm-style-iw, .store_locator_infowindow{max-width: ' . $this->get_option('infowwindowWidth') . 'px !important; width: 100% !important; max-height: 400px; white-space: nowrap; overflow: auto;}';

        $customCSS = $this->get_option('customCSS');

        echo '<style>' . $css . $customCSS . '</style>';

        return true;
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function enqueue_scripts()
    {
        global $wordpress_store_locator_options, $post;

        $doNotLoadBootstrap = $this->get_option('doNotLoadBootstrap');
        if (!$doNotLoadBootstrap) {
            wp_enqueue_script('bootstrap', plugin_dir_url(__FILE__) . 'vendor/bootstrap/bootstrap.min.js', array('jquery'), '4.5.3', true);
        }

        $performanceRenderOnThesePages = $this->get_option('performanceRenderOnThesePages');
        if(!empty($performanceRenderOnThesePages) && is_object($post)) {
            if ( $post->post_type != 'stores' && !in_array($post->ID, $performanceRenderOnThesePages) ) {
                if($this->get_option('buttonEnabled') && $this->get_option('buttonAction') == "1" && $post->post_type == 'product') {

                } else {
                    return false;
                }
            }
        }

        $mapsJS = 'https://maps.googleapis.com/maps/api/js?libraries=places&callback=Function.prototype';
        $googleApiKey = $this->get_option('apiKey');
        if (!empty($googleApiKey)) {
            $mapsJS = $mapsJS . '&key=' . $googleApiKey;
        }

        wp_enqueue_script($this->plugin_name . '-gmaps', $mapsJS, array(), $this->version, true);

        if($this->get_option('mapMarkerClusterer')) {
            wp_enqueue_script('MarkerClusterer', plugin_dir_url(__FILE__) . 'vendor/MarkerClusterer.min.js', array('jquery', $this->plugin_name . '-gmaps'), $this->version, true);        
        }

        if ($this->get_option('resultListSlider')) {
            wp_enqueue_script('slick', plugin_dir_url(__FILE__).'vendor/slick/slick.min.js', array('jquery'), '1.8.0', true);
        }

        wp_enqueue_script($this->plugin_name . '-single', plugin_dir_url(__FILE__) . 'js/wordpress-store-locator-public-single.js', array('jquery'), $this->version, true);
        wp_enqueue_script($this->plugin_name . '-public', plugin_dir_url(__FILE__) . 'js/wordpress-store-locator-public.js', array('jquery'), $this->version, true);


        $forJS = $wordpress_store_locator_options;
        $forJS['ajax_url'] = admin_url('admin-ajax.php');
        $forJS['trans_select_store'] = esc_html__('Select Store', 'wordpress-store-locator');
        $forJS['trans_your_position'] = esc_html__('Your Position!', 'wordpress-store-locator');

        if(is_singular('stores')) {
            $forJS['post_id'] = $post->ID;

            $forJS['live_lat'] = floatval( get_post_meta($post->ID, $this->get_option('singleStoreLivePositionLatField'), true) );
            $forJS['live_lng'] = floatval( get_post_meta($post->ID, $this->get_option('singleStoreLivePositionLngField'), true) );
        }
        
        unset($forJS['showContactStore']);
        unset($forJS['showContactStorePage']);
        unset($forJS['serverApiKey']);

        if(!empty($wordpress_store_locator_options['showContactStore']) && !empty($wordpress_store_locator_options['showContactStorePage'])) {
            $forJS['showContactStorePage'] = get_permalink($wordpress_store_locator_options['showContactStorePage']);
        }        

        $forJS = apply_filters('wordpress_store_locator_options', $forJS);
        
        wp_localize_script($this->plugin_name . '-public', 'store_locator_options', $forJS);

        $customJS = $this->get_option('customJS');
        if (empty($customJS)) {
            return false;
        }

        file_put_contents(dirname(__FILE__)  . '/js/wordpress-store-locator-custom.js', $customJS);

        wp_enqueue_script($this->plugin_name . '-custom', plugin_dir_url(__FILE__) . 'js/wordpress-store-locator-custom.js', array('jquery'), $this->version, false);

        return true;
    }

    /**
     * Get Options
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   mixed                         $option The option key
     * @return  mixed                                 The option value
     */
    private function get_option($option)
    {
        if(!is_array($this->options)) {
            return false;
        }

        if (!array_key_exists($option, $this->options)) {
            return false;
        }

        return $this->options[$option];
    }

    /**
     * Init the Store Locator
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function init()
    {
        global $wordpress_store_locator_options;

        $this->options = apply_filters('wordpress_store_locator_options', $wordpress_store_locator_options);

        if (!$this->get_option('enable')) {
            return false;
        }

        $layout = $this->get_option('layout');

        $originalOptions = $wordpress_store_locator_options;

        if($layout == 1) {
            $this->options['resultListPosition'] = 'store-locator-order-first';
            $this->options['resultListColumns'] = '3';

            $this->options['searchBoxPosition'] = 'before';
            $this->options['searchBoxColumns'] = '';

            $this->options['mapColumns'] = '9';
        } elseif ($layout == 2) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '3';

            $this->options['searchBoxPosition'] = 'before';
            $this->options['searchBoxColumns'] = '';

            $this->options['mapColumns'] = '9';
        } elseif ($layout == 3) {
            $this->options['resultListPosition'] = 'below';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'above';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 4) {
            $this->options['resultListPosition'] = 'above';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'below';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 5) {
            $this->options['resultListPosition'] = 'store-locator-order-first';
            $this->options['resultListColumns'] = '3';

            $this->options['searchBoxPosition'] = 'after';
            $this->options['searchBoxColumns'] = '';

            $this->options['mapColumns'] = '9';
        } elseif ($layout == 6) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '3';

            $this->options['searchBoxPosition'] = 'after';
            $this->options['searchBoxColumns'] = '';

            $this->options['mapColumns'] = '9';
        } elseif ($layout == 7) {
            $this->options['resultListPosition'] = 'below';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'above';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 8) {
            $this->options['resultListPosition'] = 'above';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'below';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 9) {
            $this->options['resultListPosition'] = 'below';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'above';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 10) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = '';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 11) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = '';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 12) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = '';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 13) {
            $this->options['resultListPosition'] = 'store-locator-order-last';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = '';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '12';
        } elseif ($layout == 14) {
            $this->options['resultListPosition'] = '';
            $this->options['resultListColumns'] = '4';

            $this->options['searchBoxPosition'] = 'above';
            $this->options['searchBoxColumns'] = '12';

            $this->options['mapColumns'] = '8';
        } elseif ($layout == 15) {
            $this->options['resultListPosition'] = 'below';
            $this->options['resultListColumns'] = '12';

            $this->options['searchBoxPosition'] = 'above';
            $this->options['searchBoxColumns'] = '12';
            
            $this->options['mapColumns'] = '15';
        } 

        if($this->get_option('advancedLayout')) {
            $this->options['resultListColumns'] = $originalOptions['resultListColumns'];
            $this->options['searchBoxColumns'] = $originalOptions['searchBoxColumns'];
            $this->options['mapColumns'] = $originalOptions['mapColumns'];
        }
    

        if(isset($_POST['store_locator_review_form']) && $_POST['store_locator_review_form'] == "true") {
            $this->process_review_form();
        }

        add_shortcode('wordpress_store_locator', array($this, 'get_store_locator'));
        add_shortcode('wordpress_store_locator_list_stores', array($this, 'list_stores'));
        add_shortcode('wordpress_store_locator_search', array($this, 'get_store_locator_search'));
        add_shortcode('wordpress_store_locator_nearest_store', array($this, 'get_store_locator_nearest_store'));
        add_shortcode('wordpress_store_locator_modal_button', array($this, 'store_modal_button_shortcode'));
        

        // Single Product Button
        if ($this->get_option('buttonEnabled') && class_exists( 'WooCommerce' )) {


            $buttonPosition = $this->get_option('buttonPosition');
            !empty($buttonPosition) ? $buttonPosition = $buttonPosition : $buttonPosition = 'woocommerce_single_product_summary';

            // Go to product page
            if ($this->get_option('buttonAction') == 1) {
                $modalPosition = $this->get_option('buttonModalPosition');
                !empty($modalPosition) ? $modalPosition = $modalPosition : $modalPosition = 'wp_footer';

                add_action($buttonPosition, array($this, 'store_modal_button'), $this->get_option('buttonPriority'));
                add_action($modalPosition, array($this, 'store_modal'), 10);
            }

            // Go to custom URL
            if ($this->get_option('buttonAction') == 2) {
                add_action($buttonPosition, array($this, 'custom_link'), $this->get_option('buttonPriority'));
            }
        }

        $searchBoxFields = $this->get_option('searchBoxFields');
        if(!is_array($searchBoxFields)) {
            $searchBoxFields = array();
        }
        
        $searchBoxFields = $searchBoxFields['enabled'];
        unset($searchBoxFields['placebo']);
        if(is_array($searchBoxFields) && array_key_exists('contact_all_stores', $searchBoxFields)) {
            add_action('wp_footer', array($this, 'contact_all_stores_modal'), 10);
        }

        add_filter( 'the_content', array($this, 'stores_single_content') );
        add_filter( 'the_excerpt', array($this, 'stores_single_content') );
        add_filter( 'the_title', array($this, 'stores_single_title') );

        return true;
    }

    /**
     * Store Title
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.1.0
     * @link    https://welaunch.io/plugins
     */
    public function stores_single_title($title) 
    {
        global $post;

        if(!isset($post->post_type)) {
            return $title;
        }

        if(!$this->get_option('singleStoreAppendCity')) {
            return $title;   
        }

        if ($post->post_type == 'stores') {
            if(in_the_loop()){
                $prefix = "wordpress_store_locator_";
                $meta = get_post_meta($post->ID);
                if(isset($meta[ $prefix . 'city' ]) && !empty($meta[ $prefix . 'city' ][0])) {
                    $title = $title . ' <span class="wordpress-store-locator-store-in">' . esc_html__('Store in', 'wordpress-store-locator') . ' ' . $meta[ $prefix . 'city' ][0] . '</span>';
                }
            }
        }

        return $title;
    }

    /**
     * Single store page
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.1.0
     * @link    https://welaunch.io/plugins
     */
    public function stores_single_content($content) 
    {
        global $post;

        if(!isset($post->post_type)) {
            return $content;
        }

        if ($post->post_type != 'stores') {
            return $content;
        }

        $title = "";
        if($this->get_option('singleStoreShowTitle'))  {
            $title = '<div class="store_locator_single_title store-locator-col-12"><h1 class="wordpress-store-locator-store-title">' . get_the_title() . '</h1></div>';
        }

        $content = apply_filters('wordpress_store_locator_single_store_content', $content, $post->ID);

        $content = '<div class="store_locator_single_description store-locator-col-12">' . $content . '</div>';

        $args = array('fields' => 'names', 'orderby' => 'name', 'order' => 'ASC');
        $prefix = "wordpress_store_locator_";
        $meta = get_post_meta($post->ID);

        if ($this->get_option('showFilterCategoriesAsImage') ){
            $tmp = array();
            $store_cats = wp_get_object_terms($post->ID, 'store_category');
            if(!empty($store_cats)) {
                foreach ($store_cats as $store_category) {

                    $category_icon = get_term_meta($store_category->term_id, 'wordpress_store_locator_icon');
                    if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                        $tmp[] = '<img src="' . $category_icon[0]['url'] . '">';
                    } else {
                        $tmp[] = '<img src="' . $this->get_option('mapDefaultIcon') . '">';
                    }
                }
            }
            $store_cats = $tmp;
        } else {
            $store_cats = wp_get_object_terms($post->ID, 'store_category', $args);
        }

        $categories = "";
        if(!empty($store_cats)) {
            $categories .= '<div class="store_locator_single_categories store-locator-col-12">';
                $categories .= '<strong class="store_locator_single_categories_title">' . esc_html__('Categories: ', 'wordpress-store-locator') . '</strong>' . implode(', ', $store_cats);
            $categories .= '</div>';
        }

        $store_filter = wp_get_object_terms($post->ID, 'store_filter', array() );
        $filter = "";

        if(!empty($store_filter)) {

            $temp = array();
            $this->sort_terms_hierarchicaly($store_filter, $temp);
            $store_filter = $temp;

            foreach ($store_filter as $single_store_filter) {

                if(isset($single_store_filter->children) && !empty($single_store_filter->children)) {

                    $filter .= '<div class="store_locator_single_filter store-locator-col-12">';
                        $filter .= '<strong class="store_locator_single_filter_title">' . $single_store_filter->name . ': </strong>';

                            $tmp = array();
                            foreach ($single_store_filter->children as $singel_store_child_filter) {
                                $tmp[] = $singel_store_child_filter->name;
                            }
                            
                            $filter .= implode(', ', $tmp);
                                
                    $filter .= '</div>';
                } 
            }

        }

        $address1 = isset($meta[ $prefix . 'address1' ][0]) ? $meta[ $prefix . 'address1' ][0] : '';
        $address2 = isset($meta[ $prefix . 'address2' ][0]) ? $meta[ $prefix . 'address2' ][0] : '';
        $zip = isset($meta[ $prefix . 'zip' ][0]) ? $meta[ $prefix . 'zip' ][0] : '';
        $city = isset($meta[ $prefix . 'city' ][0]) ? $meta[ $prefix . 'city' ][0] : '';
        $region = isset($meta[ $prefix . 'region' ][0]) ? $meta[ $prefix . 'region' ][0] : '';
        $country = isset($meta[ $prefix . 'country' ][0]) ? $meta[ $prefix . 'country' ][0] : '';
        $telephone = isset($meta[ $prefix . 'telephone' ][0]) ? $meta[ $prefix . 'telephone' ][0] : '';
        $mobile = isset($meta[ $prefix . 'mobile' ][0]) ? $meta[ $prefix . 'mobile' ][0] : '';
        $fax = isset($meta[ $prefix . 'fax' ][0]) ? $meta[ $prefix . 'fax' ][0] : '';
        $email = isset($meta[ $prefix . 'email' ][0]) ? $meta[ $prefix . 'email' ][0] : '';
        $email_placeholder = isset($meta[ $prefix . 'email_placeholder' ][0]) ? $meta[ $prefix . 'email_placeholder' ][0] : '';

        $website = isset($meta[ $prefix . 'website' ][0]) ? $meta[ $prefix . 'website' ][0] : '';

        if($this->get_option('showAddressStyle') == "american") {
            $address = '<div class="store_locator_single_address store-locator-col-12 store-locator-col-sm-6">';
                $address .=  '<h2 class="store-locator-single-store-address-title">' . esc_html__('Address ', 'wordpress-store-locator') . '</h2>';
                $address .= !empty($address1) ? $address1 . '<br/>' : '';
                $address .= !empty($address2) ? $address2 . '<br/>' : '';
                $address .= !empty($city) ? $city . ', ' : '';
                $address .= !empty($region) ? $region . ' ' : '';
                $address .= !empty($zip) ? $zip . '<br/>' : '';
                if($this->get_option('showCountry')) {
                    $address .= !empty($country) ? $country : '';
                }

                if($this->get_option('showCustomMetaFieldAfterAddress') && isset($meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0])) {
                    $address .= '<div class="store_locator_single_after_address">' . $meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0] . '</div>';
                }

            if(!$this->get_option('singleStoreShowContanctBelowAddress')) {
            $address .= '</div>';
            }
        } else {
            $address = '<div class="store_locator_single_address store-locator-col-12 store-locator-col-sm-6">';
                $address .=  '<h2 class="store-locator-single-store-address-title">' . esc_html__('Address ', 'wordpress-store-locator') . '</h2>';
                $address .= !empty($address1) ? $address1 . '<br/>' : '';
                $address .= !empty($address2) ? $address2 . '<br/>' : '';
                $address .= !empty($zip) ? $zip . ' ' : '';
                $address .= !empty($city) ? $city . ', ' : '';
                $address .= !empty($region) ? $region . ', ' : '';
                if($this->get_option('showCountry')) {
                    $address .= !empty($country) ? $country : '';
                } else {
                    $address = rtrim($address, ', ');
                }

                if($this->get_option('showCustomMetaFieldAfterAddress') && isset($meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0])) {
                    $address .= '<div class="store_locator_single_after_address">' . $meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0] . '</div>';
                }

            if(!$this->get_option('singleStoreShowContanctBelowAddress')) {
            $address .= '</div>';
            }
        }

        if(!$this->get_option('singleStoreShowContanctBelowAddress')) {
        $contact = '<div class="store_locator_single_contact store-locator-col-12 store-locator-col-sm-6">';
        }
            $contact .=  '<h2 class="store-locator-single-store-contact-title">' . esc_html__('Contact ', 'wordpress-store-locator') . '</h2>';
            $contact .= !empty($telephone) && $this->get_option('showTelephone') ? 
                        $this->get_option('showTelephoneText') . '<a href="tel:' .  $telephone  . '">' . $telephone . '</a><br/>' : '';
            $contact .= !empty($mobile) && $this->get_option('showMobile') ? 
                        $this->get_option('showMobileText') . '<a href="tel:' .  $mobile  . '">' . $mobile . '</a><br/>' : '';
            $contact .= !empty($fax) && $this->get_option('showFax') ? 
                        $this->get_option('showFaxText') . '<a href="tel:' .  $fax  . '">' . $fax . '</a><br/>' : '';

            if(!empty($email) && $this->get_option('showEmail')) {
                if($this->get_option('showEmailPlaceholder') && !empty($email_placeholder)) {
                    $contact .= $this->get_option('showEmailText') . '<a href="mailto:' .  $email  . '">' . $email_placeholder . '</a><br/>';
                } else {
                    $contact .= $this->get_option('showEmailText') . '<a href="mailto:' .  $email  . '">' . $email . '</a><br/>';
                }
            }
            $contact .= !empty($website) && $this->get_option('showWebsite') ? 
                        $this->get_option('showWebsiteText') . '<a href="' .  $website  . '" target="_blank">' . $website . '</a><br/>' : '';
        $contact .= '</div>';

        $additional_information = '';
        $customFields = $this->get_option('showCustomFields');
        if(!empty($customFields)) {
            
            $additional_information .= '<div class="store_locator_single_additional_information store-locator-col-12">';
            $additional_information .=  '<h2>' . esc_html__('Additional Information ', 'wordpress-store-locator') . '</h2>';

            foreach ($customFields as $customFieldKey => $customFieldName) {

                $customFieldKey = $prefix . $customFieldKey;
                $customFieldValue = get_post_meta($post->ID, $customFieldKey, true);

                if(!empty($customFieldValue)) {
                    $additional_information .= '<p class="store_locator_single_additional_information_item ' . $customFieldKey . '"><b>' . $customFieldName . ':</b> ' . $customFieldValue . '</p>';
                }
            }

            $additional_information .= '</div>';
        }

        $map = "";
        $opening_hours = "";
        $opening_hours2 = "";
        $contact_store = "";
        $review = "";
        if(is_single()) {

            if($this->get_option('singleStoreShowOpeningHours')) {

                $weekdays = array(
                    'Monday' => esc_html__('Monday', 'wordpress-store-locator'),
                    'Tuesday' => esc_html__('Tuesday', 'wordpress-store-locator'),
                    'Wednesday' => esc_html__('Wednesday', 'wordpress-store-locator'),
                    'Thursday' => esc_html__('Thursday', 'wordpress-store-locator'),
                    'Friday' => esc_html__('Friday', 'wordpress-store-locator'),
                    'Saturday' => esc_html__('Saturday', 'wordpress-store-locator'),
                    'Sunday' => esc_html__('Sunday', 'wordpress-store-locator'),
                );
                
                foreach ($weekdays as $key => $weekday) {
                    $open = isset($meta[ $prefix . $key . "_open"]) ? $meta[ $prefix . $key . "_open"][0] : '';
                    $close = isset($meta[ $prefix . $key . "_close"]) ? $meta[ $prefix . $key . "_close"][0] : '';
                    
                    if(!empty($open) && !empty($close)) {
                        $opening_hours .= $weekday . ': ' . $open . ' – ' . $close . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                    } elseif(!empty($open)) {
                        $opening_hours .= $weekday . ': ' . $open . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                    } elseif(!empty($close)) {
                        $opening_hours .= $weekday . ': ' . $close . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                    }

                    $open = isset($meta[ $prefix . $key . "_open2"]) ? $meta[ $prefix . $key . "_open2"][0] : '';
                    $close = isset($meta[ $prefix . $key . "_close2"]) ? $meta[ $prefix . $key . "_close2"][0] : '';
                    
                    if(!empty($open) && !empty($close)) {
                        $opening_hours2 .= $weekday . ': ' . $open . ' – ' . $close . ' ' . $this->get_option('showOpeningHours2Clock') . '<br/>';
                    } elseif(!empty($open)) {
                        $opening_hours2 .= $weekday . ': ' . $open . ' ' . $this->get_option('showOpeningHours2Clock') . '<br/>';
                    } elseif(!empty($close)) {
                        $opening_hours2 .= $weekday . ': ' . $close . ' ' . $this->get_option('showOpeningHours2Clock') . '<br/>';
                    }
                }

                if(!empty($opening_hours2)) {                                  

                    $opening_hours = '<div class="store_locator_single_opening_hours">' . 
                        '<h2>' . $this->get_option('showOpeningHours2Text') . '</h2>' .
                        $opening_hours . 
                    '</div>';

                    $opening_hours2 = '<div class="store_locator_single_opening_hours2">' . 
                                        '<h2>' . $this->get_option('showOpeningHours2Text') . '</h2>' .
                                        $opening_hours2 . 
                                    '</div>';

                    $opening_hours = 
                        '<div class="store-locator-col-12 store-locator-col-sm-6">
                            ' . $opening_hours . '
                        </div>
                        <div class="store-locator-col-12 store-locator-col-sm-6">
                            ' . $opening_hours2 . '
                        </div>';
                    $opening_hours2 = "";
                } elseif(!empty($opening_hours)) {
                    $opening_hours = '<div class="store_locator_single_opening_hours store-locator-col-12">' . 
                                        '<h2>' . $this->get_option('showOpeningHours2Text') . '</h2>' .
                                        $opening_hours . 
                                    '</div>';
                }

                // ugly 
                // $opening_hours = '</div><div class="store-locator-row">' . $opening_hours ;
            }

            if($this->get_option('singleStoreContactStore')) {
                $contact_storePage = $this->get_option('showContactStorePage');
                $contact_storeText = $this->get_option('showContactStoreText');
                if(!empty($contact_storePage)) {
                    $contact_storePage = get_permalink($contact_storePage) . '?store_id=' . $post->ID;
                    $contact_store = '<div class="store_locator_single_contact_store store-locator-col-12">' . 
                                    '<a href="' . $contact_storePage . '" class="store_locator_contact_store_button btn button et_pb_button btn-primary theme-button btn-lg center"><i class="fas fa-paper-plane"></i>' . $contact_storeText . '</a>'. 
                                '</div>';
                }
                
            }

            if($this->get_option('singleStoreShowRating')) {

                $storeReviews = get_comments(array('post_id' => $post->ID));
                $storeReviewsCount = count($storeReviews);
                $storeReviewClass = "";
                if(!empty($storeReviews)) {
                    $storeReviewClass = " store-locator-col-md-6";
                }

                $review = 

                '
                <div class="store-locator-col-12">
                <div id="store-locator-review" class="store-locator-row store-locator-review-container">

                    <div class="store-locator-col-sm-12' . $storeReviewClass . '">

                        <div class="store-locator-review-form-container">
                            <form action="' . esc_url($_SERVER['REQUEST_URI']) . '" method="post" class="store-locator-review-form">
                                <input type="hidden" name="store_locator_review_form" value="true">
                                <input type="hidden" name="store_locator_review_post_id" value="' . $post->ID . '">
                                
                                <div class="store-locator-row">
                                    <div class="store-locator-col-sm-12">
                                        <h2 class="store-locator-review-form-title">' . esc_html__('Review Store', 'wordpress-store-locator') . '</h2>
                                    </div>
                                </div>

                                <div class="store-locator-row">
                                    <div class="store-locator-col-sm-6 store-locator-review-form-name-container">
                                        <label for="store_locator_review_name">' . esc_html__('Your Name', 'wordpress-store-locator') . ' *</label>
                                        <input name="store_locator_review_name" class="store-locator-review-field store-locator-review-field-name" type="text" placeholder="' . esc_html__('Your Name', 'wordpress-store-locator') . '" required>
                                    </div>
                                    <div class="store-locator-col-sm-6 store-locator-review-form-email-container">
                                        <label for="store_locator_review_email">' . esc_html__('Your Email', 'wordpress-store-locator') . ' *</label>
                                        <input name="store_locator_review_email" class="store-locator-review-field store-locator-review-field-email" type="email" placeholder="' . esc_html__('Your Email', 'wordpress-store-locator') . '" required>
                                    </div>
                                </div>

                                <div class="store-locator-row">
                                    <div class="store-locator-col-sm-12">
                                        <div class="store-locator-review-form-rating">
                                            <label>
                                                <input type="radio" name="store_locator_rating" value="1" />
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="store_locator_rating" value="2" />
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="store_locator_rating" value="3" />
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>   
                                            </label>
                                            <label>
                                                <input type="radio" name="store_locator_rating" value="4" />
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="store_locator_rating" value="5" />
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                                <span class="store-locator-review-form-rating-icon">★</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="store-locator-row">
                                    <div class="store-locator-col-sm-12 store-locator-review-form-text-container">
                                        <label for="store_locator_review_text">' . esc_html__('Your Review', 'wordpress-store-locator') . ' *</label>
                                        <textarea name="store_locator_review_comment" class="store-locator-review-field store-locator-review-field-text" placeholder="' . esc_html__('Write your review ...', 'wordpress-store-locator') . '" required></textarea>
                                    </div>
                                </div>

                                <div class="store-locator-row">
                                    <div class="store-locator-col-sm-12 store-locator-review-form-text-container">
                                        <input name="submit" type="submit" id="submit" class="submit" value="' . esc_html__('Submit', 'wordpress-store-locator') . '">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>';

                    if(!empty($storeReviews)) {

                        $averageRating = get_post_meta($post->ID, 'wordpress_store_locator_average_rating', true);
                        $review .=  
                        '<div class="store-locator-reviews-container store-locator-col-sm-12' . $storeReviewClass . '">

                            <div class="store-locator-row">
                                <div class="store-locator-col-sm-12">
                                    <h2 class="store-locator-reviews-title">' . esc_html__('Reviews', 'wordpress-store-locator') . ' (' . $averageRating . ' / 5)</h2>
                                </div>
                            </div>

                            <div class="store-locator-row store-locator-reviews-listing">';

                            foreach ($storeReviews as $key => $storeReview) {
                                $id = intval( $storeReview->comment_ID );
                                $author = esc_html( $storeReview->comment_author );
                                $comment = esc_html( $storeReview->comment_content );
                                $rating = intval( get_comment_meta( $id, 'store_locator_rating', true ) );

                                $review .= 
                                '<div class="store-locator-col-sm-12">
                                        <div id="store-locator-review-' . $id . '" class="store-locator-review-listing">
                                            <h3 class="store-locator-reviews-listing-author">' . $author . '</h3>
                                            <div class="store-locator-reviews-listing-icons">';

                                                for ($i=0; $i < $rating; $i++) { 
                                                    $review .= '<span class="store-locator-reviews-listing-rating-icon">★</span>';
                                                }

                                $review .= 
                                        '</div>
                                        <div class="store-locator-reviews-listing-comment">' . $comment . '</div>
                                    </div>
                                </div>';    

                            }
                        
                        $review .=  
                            '</div>
                        </div>';

                    }
                $review .= 
                '</div>
                </div>';
            }

            if($this->get_option('singleStoreShowMap') && isset($meta[ $prefix . 'lat' ]) && isset($meta[ $prefix . 'lng' ])) {

                $map .= '<div id="store_locator_single_map" class="store_locator_single_map store-locator-col-12">';

                if(!empty($this->get_option('singleStoreShowMapHeadline')) ) {

                    if($this->get_option('singleStoreLivePositionHideMapHeadline')) {
                        $liveLat = get_post_meta($post->ID, $this->get_option('singleStoreLivePositionLatField'), true);
                        $liveLng = get_post_meta($post->ID, $this->get_option('singleStoreLivePositionLngField'), true);

                        if(!empty($liveLat) && !empty($liveLng)) {
                            $map .= '<h2 id="#store-locator-map-headline" class="store-locator-map-headline">' . $this->get_option('singleStoreShowMapHeadline') . '</h2>';
                        }
                    } else {
                        $map .= '<h2 id="#store-locator-map-headline" class="store-locator-map-headline">' . $this->get_option('singleStoreShowMapHeadline') . '</h2>';
                    }
                }

                $map .= apply_filters('wordpress_store_locator_single_store_before_map', '', $post->ID);

                $map .= '<div class="store_locator_single_map_render" 
                                data-lat="' . $meta[ $prefix . 'lat' ][0] . '" 
                                data-lng="' . $meta[ $prefix . 'lng' ][0] . '"></div>';


                $map .= '</div>';
            }
        }

        $categories = apply_filters('wordpress_store_locator_single_store_categories', $categories, $post->ID);
        $filter = apply_filters('wordpress_store_locator_single_store_filter', $filter, $post->ID);
        $content = apply_filters('wordpress_store_locator_single_store_content', $content, $post->ID);
        $address = apply_filters('wordpress_store_locator_single_store_address', $address, $post->ID);
        $contact = apply_filters('wordpress_store_locator_single_store_contact', $contact, $post->ID);
        
        $additional_information = apply_filters('wordpress_store_locator_single_store_additional_information', $additional_information, $post->ID);

        $opening_hours = apply_filters('wordpress_store_locator_single_store_opening_hours', $opening_hours, $post->ID);
        $opening_hours2 = apply_filters('wordpress_store_locator_single_store_opening_hours2', $opening_hours2, $post->ID);

        $contact_store = apply_filters('wordpress_store_locator_single_store_contact_store', $contact_store, $post->ID);
        $review = apply_filters('wordpress_store_locator_single_store_review', $review, $post->ID);
        $map = apply_filters('wordpress_store_locator_single_store_map', $map, $post->ID);

        $content = '<div class="store-locator-row">' . $title . $categories . $filter . $content . $address . $contact . $additional_information . $opening_hours . $opening_hours2 . $contact_store;

        if($this->get_option('singleStoreShowRatingMoveBelowMap')) {
            $content .= $map . $review;
        } else {
            $content .= $review . $map;
        }
        $content .= '</div>';

        $content = apply_filters('wordpress_store_locator_single_store_content', $content, $post->ID);

        return $content;
    }

    /**
     * Create the single product button.
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    public function store_modal_button()
    {
        global $product;

        $apply = $this->excludeProductCategories();

        if(!$apply) {
            return false;
        }

        $product_id = 0;
        if($product) {
            $product_id = $product->get_id();
        }


        $buttonText = $this->get_option('buttonText');

        echo 
        '<button id="store_modal_button" type="button" data-product-id="' . $product_id . '" class="btn button et_pb_button btn-primary btn-lg store_modal_button">'
            . $buttonText . 
        '</button>';
    }

    /**
     * Create the store locator modal
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    public function store_modal()
    {
        $modalSize = $this->get_option('buttonModalSize');

        // Only render Maps Plugin on Product Page (Performance)
        if (!is_product()) {
            return false;
        }
        ?>

        <!-- WordPress Store Locator Modal -->
        <div id="store_modal" class="store_modal store-locator-modal store-locator-fade" tabindex="-1" role="dialog">
            <div class="modal-dialog <?php echo $modalSize ?>" role="document">
                <div class="modal-content">
                    <?php echo $this->get_store_locator(); ?>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Create the store locator modal
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    public function contact_all_stores_modal()
    {
        $searchBoxContactAllStoresShortocode = $this->get_option('searchBoxContactAllStoresShortocode');
        ?>

        <!-- WordPress Store Locator Modal -->
        <div id="contact_all_stores_modal" class="contact_all_stores_modal store-locator-modal store-locator-fade" tabindex="-1" role="dialog">
            <div class="modal-dialog normal" role="document">
                <div class="modal-content">
                    <?php echo do_shortcode( $searchBoxContactAllStoresShortocode ) ?>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Create the store locator
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    public function get_store_locator($atts = array())
    {
        $args = shortcode_atts(array(

            'categories' => 'all',
            'default_category' => '',

            'default_lat' => '',
            'default_lng' => '',
            'default_zoom' => '',

            // user has to add parent ID also
            'filters' => 'all',
            'default_filters' => '',

            'show_children' => 'yes',
            'show_all' => 'yes',
            'hide_stores_on_first_view' => 'no',
            'max_radius' => 'no',
            'default_address' => '',
        ), $atts);

        // Categories
        $this->shortcode_default_category = (int) $args['default_category'];
        if($args['categories'] == "all") {
            $this->shortcode_categories = 'all';    
        } else {
            $this->shortcode_categories = array_filter( array_map('intval', explode(',', $args['categories'] ) ) );
        }

        $this->shortcode_default_filters = array_filter( array_map('intval', explode(',', $args['default_filters'] ) ) );
        if($args['filters'] == "all") {
            $this->shortcode_filters = 'all';    
        } else {
            $this->shortcode_filters = array_filter( array_map('intval', explode(',', $args['filters'] ) ) );
        }

        $this->shortcode_show_children = $args['show_children'];
        $this->shortcode_show_all = $args['show_all'];
        $this->shortcode_max_radius = $args['max_radius'];
        $this->shortcode_default_address = $args['default_address'];

        // Layout
        $layout = $this->get_option('layout');
        $resultListPosition = $this->get_option('resultListPosition');
        $searchBoxPosition = $this->get_option('searchBoxPosition');

        // Loading Screen
        $loadingIcon = $this->get_option('loadingIcon');
        $loadingAnimation = $this->get_option('loadingAnimation');
        $loadingIconSize = $this->get_option('loadingIconSize');
        $icon = $loadingIcon . ' ' . $loadingAnimation . ' ' . $loadingIconSize;

        if($this->get_option('useOutputBuffering')) {
            ob_start();
        }

        do_action('wordpress_store_locator_before');

        $extraData = "";
        if(isset($args['default_lat']) && !empty($args['default_lat']) && isset($args['default_lng']) && !empty($args['default_lng'])) {
            $extraData .= ' data-default-lat="' . floatval( $args['default_lat'] ) . '" data-default-lng="' . floatval( $args['default_lng'] ) . '" ';
        }

        if(isset($args['default_zoom']) && !empty($args['default_zoom'])) {
            $extraData .= ' data-default-zoom="' . intval( $args['default_zoom'] ) . '"';
        }

        if(isset($args['hide_stores_on_first_view']) && !empty($args['hide_stores_on_first_view'])) {
            $extraData .= ' data-hide-stores-on-first-view="' . $args['hide_stores_on_first_view'] . '"';
        }

        ?>

        <div id="store_locator" class="store-locator-container-fluid store_locator modal-body " <?php echo $extraData ?>>
            <div class="store-locator-row">
                <?php if($layout == 7) { ?>
                    <div class="store-locator-col-md-4">
                        <div class="store-locator-row">
                            <?php $this->get_search_box(); ?>
                        </div>
                    </div>
                    <div class="store-locator-col-md-8">
                        <div class="store-locator-row">
                            <?php $this->get_map(); ?>
                            <?php $this->get_sidebar_content(); ?>
                        </div>
                    </div>

                <?php } elseif($layout == 8) { ?>

                    <div class="store-locator-col-md-4">
                        <div class="store-locator-row">
                            <?php $this->get_sidebar_content(); ?>
                        </div>
                    </div>
                    <div class="store-locator-col-md-8">
                        <div class="store-locator-row">
                            <?php $this->get_search_box(); ?>
                            <?php $this->get_map(); ?>
                        </div>
                    </div>

                <?php } elseif($layout == 9) { ?>
                    <div class="store-locator-col-md-8">
                        <div class="store-locator-row">
                            <?php $this->get_search_box(); ?>
                            <?php $this->get_map(); ?>
                        </div>
                    </div>
                    <div class="store-locator-col-md-4">
                        <div class="store-locator-row">
                            <?php $this->get_sidebar_content(); ?>
                        </div>
                    </div>
                <?php } elseif($layout == 10 || $layout == 13) {
                    $this->get_map();
                    $this->get_search_box();
                    $this->get_sidebar_content();
                } elseif($layout == 11) {
                    $this->get_sidebar_content();
                    $this->get_search_box();
                    $this->get_map();
                } elseif($layout == 12) {
                    $this->get_search_box();
                    $this->get_sidebar_content();
                    $this->get_map();
                } elseif($layout == 14) {
                    $this->get_search_box();
                    $this->get_sidebar_content();
                    $this->get_map();
                } else {

                    if ($searchBoxPosition == 'above') {
                        $this->get_search_box();
                    }

                    if ($resultListPosition != 'below') {
                        $this->get_sidebar_content();
                    }

                    $this->get_map();

                    if ($resultListPosition == 'below') {
                        $this->get_sidebar_content();
                    }
                    if ($searchBoxPosition == 'below') {
                        $this->get_search_box();
                    }
                }
                ?>
            </div>
            <button type="button" id="store_modal_close" class="store_modal_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="store_locator_loading" class="store_locator_loading store_locator_hidden"><i class="<?php echo $icon ?>"></i></div>
        </div>

    <?php

        do_action('wordpress_store_locator_after');

        if($this->get_option('useOutputBuffering')) {
            $output_string = strtr(ob_get_contents(), array("\t" => "", "\n" => "", "\r" => ""));
            ob_end_clean();
            return $output_string;
        }
    }

    /**
     * Create the sidebar
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    private function get_sidebar_content()
    {
        $searchBoxPosition = $this->get_option('searchBoxPosition');
        $resultListColumns = $this->get_option('resultListColumns');
        $resultListPosition = $this->get_option('resultListPosition');

        do_action('wordpress_store_locator_sidebar');

        ?>
        <div id="store_locator_sidebar" class="store_locator_sidebar store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-<?php echo $resultListColumns ?> <?php echo $resultListPosition ?>">
            <div id="store_locator_sidebar_content" class="store_locator_sidebar_content store-locator-row">
            <?php
            if ($searchBoxPosition == 'before') {
                $this->get_search_box();
                $this->get_result_list();
            } elseif ($searchBoxPosition == 'after') {
                $this->get_result_list();
                $this->get_search_box();
            } else {
                $this->get_result_list();
            }
            ?>
            </div>
        </div>

        <?php

        do_action('wordpress_store_locator_after_sidebar');

    }

    /**
     * Get the Search Box
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    private function get_search_box()
    {
        global $post;
        
        $layout = $this->get_option('layout');

        $searchButtonText = $this->get_option('searchButtonText');
        $searchBoxPosition = $this->get_option('searchBoxPosition');
        $searchBoxColumns = $this->get_option('searchBoxColumns');
        $searchColumns = $this->get_option('searchColumns');

        if ($searchBoxPosition == 'above' || $searchBoxPosition == 'below') {
            $searchBoxColumns = 'store-locator-col-md-' . $searchBoxColumns;
        } else {
            $searchBoxColumns = '';
        }

        do_action('wordpress_store_locator_before_search_box');

        $searchBoxFields = $this->get_option('searchBoxFields');
        $searchBoxFields = $searchBoxFields['enabled'];
        unset($searchBoxFields['placebo']);

        ?>

        <div id="store_locator_search_box" class="store_locator_search_box store-locator-col-12 store-locator-col-sm-12 <?php echo $searchBoxColumns ?>">

            <div class="store-locator-row">

            <?php

            if($layout == 13) {

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-6">';
                        $this->get_address_field();
                        $this->get_my_position();
                    echo '</div>';

                    echo '<div class="store-locator-col-12 store-locator-col-sm-6 store-locator-col-lg-6">';
                        echo '<div class="store-locator-row">';
                            $this->get_radius_filter();
                        echo '</div>';   
                    echo '</div>';   

                    echo '<div class="store-locator-col-12 store-locator-col-sm-6 store-locator-col-lg-6">';
                        echo '<div class="store-locator-row">';
                            $this->get_store_categories();
                        echo '</div>';    
                    echo '</div>';

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-6">';
                        $this->get_store_name_search();
                    echo '</div>';

                    echo '<div class="store-locator-col-6">';
                        $this->get_all_stores();
                    echo '</div>';
                    echo '<div class="store-locator-col-6">';
                        $this->get_search_button();
                    echo '</div>';
            } elseif($layout == 15) {

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-3">';
                        echo '<div class="store-locator-row">';
                            $this->get_store_categories();
                        echo '</div>';    
                    echo '</div>';

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-3">';
                        $this->get_address_field();
                    echo '</div>';

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-3">';
                        echo '<div class="store-locator-row">';
                            $this->get_radius_filter();
                        echo '</div>';   
                    echo '</div>';   

                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-lg-3">';
                        $this->get_search_button();
                    echo '</div>';

            } else {

                do_action('wordpress_store_locator_before_address_field');
                
                $i = 0;
                // $nonBreakingElements = array('search_title', 'active_filter', 'my_position', 'all_stores');

                foreach ($searchBoxFields as $key => $value) {
                    $temp = explode('-', $key);
                    $block = $temp[0];

                    $func = 'get_' . $block;

                    // if(in_array($block, $nonBreakingElements)) {
                    //     call_user_func(array($this, $func));
                    //     continue;
                    // }
                    if($searchColumns == "oneColumn") {
                        echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-12 wordpress-store-locator-block-' . $block . '">';
                    } elseif($searchColumns == "twoColumns") {
                        echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-6 wordpress-store-locator-block-' . $block . '">';
                    } elseif($searchColumns == "threeColumns") {
                        echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-4 wordpress-store-locator-block-' . $block . '">';
                    } elseif($searchColumns == "fourColumns") {
                        echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-3 wordpress-store-locator-block-' . $block . '">';
                    }

                    call_user_func(array($this, $func));

                    echo '</div>';

                    $i++;
                }

                do_action('wordpress_store_locator_after_address_field'); 

            }
            ?>
            </div>

        </div>

        <?php

        do_action('wordpress_store_locator_after_search_box');

    }

    public function get_search_title()
    {
        $modalTitle = $this->get_option('buttonModalTitle');
        ?>

        <h2 class="store_modal_title"><?php echo $modalTitle ?></h2>

        <?php

        $this->get_active_filter();
    }


    public function get_active_filter()
    {
        do_action('wordpress_store_locator_before_active_filters');
        ?>

        <span id="store_locator_filter_active_filter_box" class="store_locator_filter_active_filter_box">
           <small><?php echo esc_html__('Active Filter', 'wordpress-store-locator' ) ?>:</small> <span id="store_locator_filter_active_filter"></span>
        </span>

        <?php
        do_action('wordpress_store_locator_after_active_filters');
    }

    public function get_address_field()
    {   
        $searchBoxAddressText = $this->get_option('searchBoxAddressText');
        $searchBoxAddressPlaceholder = $this->get_option('searchBoxAddressPlaceholder');
        ?>
        <div class="wordpress-store-locator-address-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-12">

                    <?php if(!empty($searchBoxAddressText)) { ?>
                    <h5 class="wordpress-store-locator-address-title"><?php echo $searchBoxAddressText ?></h5>
                    <?php } ?>

                    <input id="store_locator_address_field" class="store_locator_address_field" type="text" name="location" placeholder="<?php echo $searchBoxAddressPlaceholder ?>" value="<?php echo $this->shortcode_default_address ?>">

                    <?php
                    $searchBoxAddressBelowFields = $this->get_option('searchBoxAddressBelowFields');
                    $searchBoxAddressBelowFields = $searchBoxAddressBelowFields['enabled'];
                    unset($searchBoxAddressBelowFields['placebo']);
                    foreach ($searchBoxAddressBelowFields as $key => $value) {
                        $temp = explode('-', $key);
                        $block = $temp[0];

                        $func = 'get_' . $block;

                        call_user_func(array($this, $func));
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }

    // https://medium.com/@yashwantltce/a-simple-way-to-find-places-along-the-route-using-google-maps-api-4237fb452ec2
    public function get_along_route()
    {
        $searchBoxAlongRouteTitle = $this->get_option('searchBoxAlongRouteTitle');
        $searchBoxAlongRouteButtonText = $this->get_option('searchBoxAlongRouteButtonText');
        ?>
        <div class="wordpress-store-locator-along-route-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-12">      
                    
                    <?php if(!empty($searchBoxAlongRouteTitle)) { ?>
                        <h3 class="wordpress-store-locator-along-route-title"><?php echo $searchBoxAlongRouteTitle ?></h3>
                    <?php } ?>

                    <input id="store_locator_from_field" class="wordpress-store-locator-along-route-from-field" type="text" name="from" placeholder="<?php echo __('From', 'wordpress-store-locator') ?>">
                    <input id="store_locator_to_field" class="wordpress-store-locator-along-route-to-field" type="text" name="to" placeholder="<?php echo __('To', 'wordpress-store-locator') ?>">

                    <a href="#" class="wordpress-store-locator-along-route-btn btn button et_pb_button btn-primary theme-button"><?php echo $searchBoxAlongRouteButtonText ?></a>
                </div>
            </div>
        </div>
        <?php
    }

    public function get_contact_all_stores()
    {
        $searchBoxContactAllStoresButtonText = $this->get_option('searchBoxContactAllStoresButtonText');
        ?>
        <div class="wordpress-store-locator-contact-all-stores-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-12">      
                    <a href="#"  id="contact_all_stores_modal_button" class="wordpress-store-locator-contact-all-stores-btn btn button et_pb_button btn-primary theme-button"><?php echo $searchBoxContactAllStoresButtonText ?></a>
                </div>
            </div>
        </div>
        <?php
    }

    

    public function get_my_position()
    {   
        $searchBoxGetMyPositionText = $this->get_option('searchBoxGetMyPositionText');
        ?>
        <a href="#" id="store_locator_get_my_position" class="store_locator_text_actions"><i class="fa fa-crosshairs"></i> <?php echo $searchBoxGetMyPositionText ?></a>
        <?php
    }

    public function get_reset_filters()
    {   
        $searchBoxResetFiltersText = $this->get_option('searchBoxResetFiltersText');
        ?>
        <a href="#" id="store_locator_reset_filters" class="store_locator_text_actions"><i class="fa fa-eraser"></i> <?php echo $searchBoxResetFiltersText ?></a>
        <?php
    }

    public function get_all_stores()
    {   
        $searchBoxShowShowAllStoresText = $this->get_option('searchBoxShowShowAllStoresText');
        ?>
         <a href="#" id="store_locator_get_all_stores" class="store_locator_text_actions"><i class="fa fa-globe"></i> <?php echo esc_html__($searchBoxShowShowAllStoresText, 'wordpress-store-locator' ) ?></a>
        <?php
    }

    public function get_store_name_search()
    {   
        $searchBoxStoreNameSearchText = $this->get_option('searchBoxStoreNameSearchText');
        $searchBoxStoreNameSearchPlaceholder = $this->get_option('searchBoxStoreNameSearchPlaceholder');
        ?>
        <div class="wordpress-store-locator-name-search-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-12">

                    <?php if(!empty($searchBoxStoreNameSearchText)) { ?>
                    <h5 class="wordpress-store-locator-address-title"><?php echo $searchBoxStoreNameSearchText ?></h5>
                    <?php } ?>

                    <input id="store_locator_name_search_field" class="store_locator_name_search_field" type="text" name="store_locator_name_search_field" placeholder="<?php echo $searchBoxStoreNameSearchPlaceholder ?>">
                 </div>
             </div>
         </div>
        <?php
    }

    public function get_search_button()
    {
        $searchButtonText = $this->get_option('searchButtonText');
        ?>
        <div class="wordpress-store-locator-search-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-12">
                    <button id="store_locator_find_stores_button" type="button" class="store_locator_find_stores_button btn button et_pb_button btn-primary btn-lg">
                        <?php echo $searchButtonText ?>
                    </button>
                </div>
            </div>
        </div>
        <?php
    }

    public function get_map()
    {
        $mapColumns = $this->get_option('mapColumns');

        do_action('wordpress_store_locator_before_main');

        ?>

        <div id="store_locator_main" class="store_locator_main  store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-<?php echo $mapColumns ?>">
            <div id="store_locator_map" style="height: 100%;"></div>
            <div id="store_locator_dragged_button" class="btn button et_pb_button button-primary theme-button store_locator_dragged_button">
                <?php echo esc_html__('Search in this Area', 'wordpress-store-locator' ) ?>
            </div>
        </div>

        <?php 

        do_action('wordpress_store_locator_after_main');
    }

    public function get_store_locator_search($atts = array())
    {
        global $post;

        $args = shortcode_atts(array(
            'style' => '1',
            'url' => '',
            'show_filter' => 'yes',
            'show_all' => 'yes',
            'button_text' => $this->get_option('searchButtonText'),
        ), $atts);

        $url = $args['url'];
        $searchBoxShowFilter = $args['show_filter'];
        $searchBoxStyle = $args['style'];
        $searchButtonText = $args['button_text'];

        if(empty($url)) {
            return 'You need a valid store locator URL where this search should redirect to!';
        }

        if($this->get_option('useOutputBuffering')) {
            ob_start();
        }
        ?>

        <form id="store_locator_embedded_search" class="store_locator_embedded_search" action="<?php echo $url ?>" method="GET">
            <div id="store_locator_search_box" class="store_locator store_locator_search_box store-locator-col-12 store-locator-col-sm-12">
                <div id="store_locator_address" class="store-locator-row">
                    <div class="store-locator-col-12 store-locator-col-sm-12">

                        <input id="store_locator_address_field" class="store_locator_address_field" type="text" name="location" placeholder="<?php echo esc_html__('Enter your address', 'wordpress-store-locator') ?>">

                        <?php
                        $searchBoxFields = $this->get_option('searchBoxFields');
                        $searchBoxFields = $searchBoxFields['enabled'];
                        unset($searchBoxFields['placebo']);
                        if(is_array($searchBoxFields) && !in_array('my_position', $searchBoxFields)) {
                            $this->get_my_position();
                        }
                        ?>

                    </div>
                </div>

                <?php if($searchBoxShowFilter == "yes") { ?>
                
                    <?php
                    $this->get_search_box_filter();
                    ?>
                
                <?php } ?>

                <div id="store_locator_action" class="store-locator-row">
                    <div class="store-locator-col-12 store-locator-col-sm-12">
                        <button id="store_locator_find_stores_button" type="submit" class="store_locator_find_stores_button btn button et_pb_button btn-primary btn-lg">
                            <?php echo $searchButtonText ?>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        if($this->get_option('useOutputBuffering')) {
            $outputString = strtr(ob_get_contents(), array("\t" => "", "\n" => "", "\r" => ""));
            ob_end_clean();
            return $outputString;
        }
    }

    public function get_store_locator_nearest_store($atts = array())
    {
        global $post;

        $args = shortcode_atts(array(
            'text_before' => esc_html__('Nearest Store: ', 'wordpress-store-locator'),
            'show_name' => false,
            'show_opening' => true,
            'text_separator' => ' | ',
            'denied_text' => 'Please enable Geolocation',
        ), $atts);

        $textBefore = $args['text_before'];
        $showName = $args['show_name'];
        $showOpening = $args['show_opening'];
        $textSeparator =  esc_html( $args['text_separator'] );
        $deniedText =  esc_html( $args['denied_text'] );

        if($this->get_option('useOutputBuffering')) {
            ob_start();
        }

        ?>

        <div class="store-locator-row">
            <div class="store-locator-col-12 store-locator-col-sm-12">
                <div id="store_locator_nearest_store_container" class="store_locator_nearest_store_container">
                    <span id="store_locator_nearest_store_text" class="store_locator_nearest_store_text"><?php echo $textBefore ?></span>
                    <span id="store_locator_nearest_store" class="store_locator_nearest_store" data-text-separator="<?php echo $textSeparator ?>" data-denied-text="<?php echo $deniedText ?>" data-show-name="<?php echo $showName ?>" data-show-opening="<?php echo $showOpening ?>"></span>
                </div>
            </div>
        </div>
        
        <?php
        if($this->get_option('useOutputBuffering')) {
            $outputString = strtr(ob_get_contents(), array("\t" => "", "\n" => "", "\r" => ""));
            ob_end_clean();
            return $outputString;
        }
    }

    public function store_modal_button_shortcode()
    {
        ob_start();
        $this->store_modal_button();

        $outputString = ob_get_contents();
        ob_end_clean();
        return $outputString;
    }

    public function list_stores($atts, $content = "")
    {
        $args = extract( shortcode_atts(array(
            'title' => 'Our Stores ...',
            'max_results' => 20,
            'tax_relation' => 'AND',
            'store_ids' => '',
            'filter_ids' => '',
            'category_ids' => '',
            'show_name' => 'yes',
            'show_address' => 'yes',
            'show_distance' => 'yes',
            'show_email' => 'yes',
            'show_telephone' => 'yes',
            'show_mobile' => 'yes',
            'show_website' => 'yes',
            'show_opening' => 'yes',

            'columns' => '2',

            'layout' => 'rows',

            'orderby' => 'post_title',
            'order' => 'ASC',
        ), $atts) );

        $max_results_to_show = $max_results;
        if($orderby == "distance") {
            $max_results = 9999;
        }

        $queryArgs = array(
            'post_type' => 'stores',
            'post_status'    => 'publish',
            'orderby' => $orderby,
            'order' => $order,
            'posts_per_page' => $max_results,
            'tax_query' => array(
                'relation' => $tax_relation,
            ),
        );

        if(!empty($store_ids)) {
            $queryArgs['post__in'] = explode(',', $store_ids);
        }

        if(!empty($filter_ids)) {
            $queryArgs['tax_query'][] = array(
                'taxonomy' => 'store_filter',
                'field' => 'id',
                'terms' => explode(',', $filter_ids),
            );
        }

        if(!empty($category_ids)) {
            $queryArgs['tax_query'][] = array(
                'taxonomy' => 'store_category',
                'field' => 'id',
                'terms' => explode(',', $category_ids),
            );
        }

        $stores = get_posts($queryArgs);

        if(empty($stores)) {
            return false;
        }

        $columnsClass = 12 / $columns;

        $html = '<div class="wordpress-store-locator-list-container"  data-max-results="' . $max_results_to_show . '" data-columns="' . $columns . '" data-orderby="' . $orderby . '">';

        if(!empty($title)) {
            $html .= '<h2 class="wordpress-store-locator-list-title">' . $title . '</h2>';
        }

        if(!empty($content)) {
            $html .= '<div class="wordpress-store-locator-list-content">' . wpautop( do_shortcode($content ) ) . '</div>';
        }

        $html .= '<div class="wordpress-store-locator-list-items-container" data-id="' . uniqid() .'">';

            $i = 0;
            foreach($stores as $store) {

                if(empty($store->post_title)) {
                    continue;
                }

                $meta = get_post_meta($store->ID);

                $address1 = isset($meta[ $this->prefix . 'address1' ][0]) ? $meta[ $this->prefix . 'address1' ][0] : '';
                $address2 = isset($meta[ $this->prefix . 'address2' ][0]) ? $meta[ $this->prefix . 'address2' ][0] : '';
                $zip = isset($meta[ $this->prefix . 'zip' ][0]) ? $meta[ $this->prefix . 'zip' ][0] : '';
                $city = isset($meta[ $this->prefix . 'city' ][0]) ? $meta[ $this->prefix . 'city' ][0] : '';
                $region = isset($meta[ $this->prefix . 'region' ][0]) ? $meta[ $this->prefix . 'region' ][0] : '';
                $country = isset($meta[ $this->prefix . 'country' ][0]) ? $meta[ $this->prefix . 'country' ][0] : '';
                $telephone = isset($meta[ $this->prefix . 'telephone' ][0]) ? $meta[ $this->prefix . 'telephone' ][0] : '';
                $mobile = isset($meta[ $this->prefix . 'mobile' ][0]) ? $meta[ $this->prefix . 'mobile' ][0] : '';
                $fax = isset($meta[ $this->prefix . 'fax' ][0]) ? $meta[ $this->prefix . 'fax' ][0] : '';
                $email = isset($meta[ $this->prefix . 'email' ][0]) ? $meta[ $this->prefix . 'email' ][0] : '';
                $email_placeholder = isset($meta[ $this->prefix . 'email_placeholder' ][0]) ? $meta[ $this->prefix . 'email_placeholder' ][0] : '';
                $website = isset($meta[ $this->prefix . 'website' ][0]) ? $meta[ $this->prefix . 'website' ][0] : '';

                $lat = isset($meta[ $this->prefix . 'lat' ][0]) ? $meta[ $this->prefix . 'lat' ][0] : '';
                $lng = isset($meta[ $this->prefix . 'lng' ][0]) ? $meta[ $this->prefix . 'lng' ][0] : '';

                if($i % $columns == 0) {
                    $html .= '<div class="store-locator-row">';
                }

                $html .= '<div class="store-locator-col-sm-' . $columnsClass . '">';

                    $css = '';
                    if($layout == "columns") {
                        $css = ' wordpress-store-locator-list-item-layout-columns';
                    }

                    $html .= '<div class="wordpress-store-locator-list-item ' . $css . '">';

                    if($layout == "columns") {
                        $html .= '<div class="store-locator-row">';
                    }

                    if($layout == "columns") {
                        $html .= '<div class="store-locator-col-sm-12 store-locator-col-md-3">';
                    }
                
                        if($show_name == "yes") {
                            $html .= '<h3 class="wordpress-store-locator-list-item-title"><a href="' . get_permalink($store->ID) . '">' . $store->post_title . '</a></h3>';
                        }

                        if($show_distance == "yes" && !empty($lat) && !empty($lng)) {
                            $html .= '<div data-lat="' . $lat . '" data-lng="' . $lng . '" class="wordpress-store-locator-list-item-distance"></div>';
                        }

                    if($layout == "columns" && $show_address == "yes") {
                        $html .= '</div>';
                        $html .= '<div class="store-locator-col-sm-12 store-locator-col-md-3">';
                    }

                        if($show_address == "yes") {

                            $address = "";

                            if($this->get_option('showAddressStyle') == "american") {
                                $address .= !empty($address1) ? $address1 . '<br/>' : '';
                                $address .= !empty($address2) ? $address2 . '<br/>' : '';
                                $address .= !empty($city) ? $city . ', ' : '';
                                $address .= !empty($region) ? $region . ' ' : '';
                                $address .= !empty($zip) ? $zip . '<br/>' : '';
                                if($this->get_option('showCountry')) {
                                    $address .= !empty($country) ? $country : '';
                                }

                                if($this->get_option('showCustomMetaFieldAfterAddress') && isset($meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0])) {
                                    $address .= '<div class="store_locator_single_after_address">' . $meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0] . '</div>';
                                }
                            } else {
                                $address .= !empty($address1) ? '<span class="wordpress-store-locator-list-item-address1">' . $address1 . '<br/></span>' : '';
                                $address .= !empty($address2) ? '<span class="wordpress-store-locator-list-item-address2">' . $address2 . '<br/></span>' : '';
                                $address .= !empty($zip) ? '<span class="wordpress-store-locator-list-item-zip">' . $zip . ' </span>' : '';
                                $address .= !empty($city) ? '<span class="wordpress-store-locator-list-item-city">' . $city . ', </span>' : '';
                                $address .= !empty($region) ? '<span class="wordpress-store-locator-list-item-region">' . $region . ', </span>' : '';
                                if($this->get_option('showCountry')) {
                                    $address .= !empty($country) ? '<span class="wordpress-store-locator-list-item-country">' . $country . '</span>' : '';
                                } else {
                                    $address = rtrim($address, ', ');
                                }

                                if($this->get_option('showCustomMetaFieldAfterAddress') && isset($meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0])) {
                                    $address .= '<div class="store_locator_single_after_address">' . $meta[ $this->get_option('showCustomMetaFieldAfterAddress') ][0] . '</div>';
                                }
                            }

                            $html .= '<div class="wordpress-store-locator-list-item-address">' . $address . '</div>';
                        }

                    if($layout == "columns") {
                        $html .= '</div>';
                        $html .= '<div class="store-locator-col-sm-12 store-locator-col-md-3">';
                    }

                        if($show_email || $show_telephone || $show_mobile || $show_website) {
                            $html .=  '<h4 class="wordpress-store-locator-list-item-contact-title">' . esc_html__('Contact ', 'wordpress-store-locator') . '</h4>';
                        }

                        if($show_email == "yes" && !empty($email)) {
                            $html .= '<div class="wordpress-store-locator-list-item-email"><span class="wordpress-store-locator-list-item-email-title">' . $this->get_option('showEmailText') . ':</span> <a href="mailto:' . $email . '">' . $email . '</a></div>';
                        }

                        if($show_telephone == "yes" && !empty($telephone)) {
                            $html .= '<div class="wordpress-store-locator-list-item-telephone"><span class="wordpress-store-locator-list-item-phone-title">' . $this->get_option('showTelephoneText') . ':</span> <a href="tel:' . $telephone . '">' . $telephone . '</a></div>';
                        }

                        if($show_mobile == "yes" && !empty($mobile)) {
                            $html .= '<div class="wordpress-store-locator-list-item-mobile"><span class="wordpress-store-locator-list-item-mobile-title">' . $this->get_option('showMobileText') . ':</span> <a href="tel:' . $mobile . '">' . $mobile . '</a></div>';
                        }

                        if($show_website == "yes" && !empty($website)) {
                            $html .= '<div class="wordpress-store-locator-list-item-website"><span class="wordpress-store-locator-list-item-website-title">' . $this->get_option('showWebsiteText') . ':</span> <a href="' . $website . '">' . $website . '</a></div>';
                        }

                    if($layout == "columns" && $show_opening == "yes") {
                        $html .= '</div>';
                        $html .= '<div class="store-locator-col-sm-12 store-locator-col-md-3">';
                    }

                        if($show_opening == "yes") {

                            $weekdays = array(
                                'Monday' => esc_html__('Monday', 'wordpress-store-locator'),
                                'Tuesday' => esc_html__('Tuesday', 'wordpress-store-locator'),
                                'Wednesday' => esc_html__('Wednesday', 'wordpress-store-locator'),
                                'Thursday' => esc_html__('Thursday', 'wordpress-store-locator'),
                                'Friday' => esc_html__('Friday', 'wordpress-store-locator'),
                                'Saturday' => esc_html__('Saturday', 'wordpress-store-locator'),
                                'Sunday' => esc_html__('Sunday', 'wordpress-store-locator'),
                            );
                            
                            $opening_hours = "";


                            foreach ($weekdays as $key => $weekday) {
                                $open = isset($meta[ $this->prefix . $key . "_open"]) ? $meta[ $this->prefix . $key . "_open"][0] : '';
                                $close = isset($meta[ $this->prefix . $key . "_close"]) ? $meta[ $this->prefix . $key . "_close"][0] : '';
                                
                                if(!empty($open) && !empty($close)) {
                                    $opening_hours .= $weekday . ': ' . $open . ' – ' . $close . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                                } elseif(!empty($open)) {
                                    $opening_hours .= $weekday . ': ' . $open . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                                } elseif(!empty($close)) {
                                    $opening_hours .= $weekday . ': ' . $close . ' ' . $this->get_option('showOpeningHoursClock') . '<br/>';
                                }
                            }

                            if(!empty($opening_hours)) {

                                if($show_email || $show_telephone || $show_mobile || $show_website) {
                                    $html .=  '<h4 class="wordpress-store-locator-list-item-opening-hours-title">' . $this->get_option('showOpeningHours2Text') . '</h4>';
                                }
                                $html .= '<div class="wordpress-store-locator-list-item-opening-hours">' . $opening_hours . '</div>';
                            }
                        }

                    if($layout == "columns") {
                        $html .= '</div>';
                        $html .= '</div>';
                    }

                    $html .= '</div>';

                $html .= '</div>';

                $i++;

                if($i % $columns == 0) {
                    $html .= '</div>';
                }

            }

            if($i % $columns != 0) {
                $html .= '</div>';  
            }

        $html .= '</div>';
        
        $html .= '</div>';

        return $html;
    }

    public function get_distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {

        if($this->get_option('mapDistanceUnit') == "km") {
            $earthRadius = 6378.1;
        // miles
        } else {
            $earthRadius = 3963.1676;
        }

      // convert from degrees to radians
      $latFrom = deg2rad($latitudeFrom);
      $lonFrom = deg2rad($longitudeFrom);
      $latTo = deg2rad($latitudeTo);
      $lonTo = deg2rad($longitudeTo);

      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;

      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

      return $angle * $earthRadius;
    }

    /**
     * Get the result list
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    private function get_result_list()
    {
        $resultListShowTitle = $this->get_option('resultListShowTitle');
        $resultListShowTitleText = $this->get_option('resultListShowTitleText');
        $resultListFilterOpen = $this->get_option('resultListFilterOpen');
        $showFilterOpen = "none";

        $fa = 'chevron-down';
        if($resultListFilterOpen) {
            $showFilterOpen = "flex";
            $fa = 'chevron-up';
        }

        ?>
        <div id="store_locator_result_list_box" class="store_locator_result_list_box store-locator-col-12 store-locator-col-sm-12">
            <hr class="grey">

            <?php if($resultListShowTitle) { ?>
                <div id="store_locator_result_open_close" class="store_locator_result_open_close">
                    <h3 class="store_locator_result_list_title"><?php echo $resultListShowTitleText ?></h3>
                    <i class="fas fa-<?php echo $fa ?> text-right"></i>
                </div>
            <?php } ?>
            
            <div id="store_locator_result_list" class="store-locator-row" style="display: <?php echo $showFilterOpen ?>;">
                
            </div>
        </div>
        <?php

    }

    /**
     * Get the filter
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    private function get_filter()
    {
        $filterColumns = $this->get_option('filterColumns');
        $showFilterOpen = "none";

        $fa = 'chevron-down';
        if($this->get_option('searchBoxShowFilterOpen')) {
            $showFilterOpen = "block";
            $fa = 'chevron-up';
        }

        $filterTitle = $this->get_option('filterFilterTitle');

        do_action('wordpress_store_locator_before_filters');

        ?>
        <div class="wordpress-store-locator-filter-container">
            <div class="store-locator-row">
                <div id="store_locator_filter" class="store_locator_filter">

                    <?php if(!empty($filterTitle)) { ?>
                    <div id="store_locator_filter_open_close" class="store_locator_filter_open_close store-locator-col-12 store-locator-col-sm-12">
                        <h3 class="store_locator_filter_title"><?php echo $filterTitle ?></h3> <i class="fas fa-<?php echo $fa ?> text-right"></i>
                    </div>
                    <?php } ?>

                    <div id="store_locator_filter_content" class="store_locator_filter_content" style="display: <?php echo $showFilterOpen ?>;">

                        <div class="store-locator-row">
                            
                            <?php
                            $filterFields = $this->get_option('filterFields');
                            $filterFields = $filterFields['enabled'];
                            unset($filterFields['placebo']);

                            $i = 0;
                            foreach ($filterFields as $key => $value) {
                                $temp = explode('-', $key);
                                $block = $temp[0];

                                $func = 'get_' . $block;

                                if($filterColumns == "oneColumn") {
                                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-12 wordpress-store-locator-block-' . $block . '">';
                                } elseif($filterColumns == "twoColumns") {
                                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-6 wordpress-store-locator-block-' . $block . '">';
                                } elseif($filterColumns == "threeColumns") {
                                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-4 wordpress-store-locator-block-' . $block . '">';
                                }

                                call_user_func(array($this, $func));

                                echo '</div>';

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

        do_action('wordpress_store_locator_after_filters');

    }

    public function get_store_categories()
    {
        global $post;

        $searchBoxCategoriesText = $this->get_option('searchBoxCategoriesText');

        $categories = array();
        $args = array(
            'taxonomy' => 'store_category',
        );
        if($this->get_option('showEmptyFilters')) {
            $args['hide_empty'] = false;
        }

        if($this->shortcode_categories !== "all" && !empty($this->shortcode_categories)) {

            foreach ($this->shortcode_categories as $shortcode_category) {
                $categoryExists = get_term($shortcode_category, 'store_category');
                if($categoryExists) {
                    $categories[] = $categoryExists;
                }

                if($this->shortcode_show_children == "yes") {
                    $args['parent'] = $shortcode_category;
                    $children_categories = get_terms($args);
                    foreach ($children_categories as $child_category) {
                        $categories[] = $child_category;
                    }
                }
            }
            
        } else {
            $categories = get_terms($args);
        }

        $searchBoxDefaultCategory = $this->get_option('searchBoxDefaultCategory');


        $temp = array();
        $this->sort_terms_hierarchicaly($categories, $temp);
        if(!empty($temp)) {
            $categories = $temp;
        }

        // Preselect store category if it is connected to a product category
        $product_categories = array();
        $terms = get_the_terms($post->ID, 'product_cat');
        if (isset($terms) && !empty($terms) && is_array($terms)) {
            foreach ($terms as $term) {
                $product_categories[] = $term->term_id;
            }
        }

        // Preselect store industry if it is connected to a product industry
        $product_industries = array();
        $terms = get_the_terms($post->ID, 'industries');
        if (isset($terms) && !empty($terms) && is_array($terms)) {
            foreach ($terms as $term) {
                $product_industries[] = $term->term_id;
            }
        }

        ?>
        <div class="store-locator-col-12 store-locator-col-sm-12 single_filter store-locator-categories">
            
                <?php 
                if($this->get_option('showFilterCategoriesAsImage')) {

                    $defaultMapMarker = $this->get_option('mapDefaultIcon');

                    if($this->shortcode_show_all == "yes") { 
                        echo    '<a class="store_locator_category_filter_image">' .
                                    '<img src="' . $defaultMapMarker . '" data-category=""><br>' . 
                                    '<span class="store_locator_category_filter_image_name">' . esc_html__('All Stores', 'wordpress-store-locator' ) . '</span>' .
                                '</a>';
                    }
                    foreach ($categories as $category) {
                        
                        $linked_category = get_term_meta($category->term_id, 'wordpress_store_locator_product_category');
                        $linked_industry_category = get_term_meta($category->term_id, 'wordpress_store_locator_industry'); 
                        
                        $category_icon_url = "";
                        $category_icon = get_term_meta($category->term_id, 'wordpress_store_locator_icon');
                        if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                            $category_icon_url = $category_icon[0]['url'];
                        } else {
                            $category_icon_url = $defaultMapMarker;
                        }
                        $selected = '';

                        if(count($categories) == 1) {
                            $selected = 'data-selected="selected"';
                        }

                        if (isset($linked_category[0]) && in_array($linked_category[0], $product_categories)) {
                            $selected = 'data-selected="selected"';
                        }

                        if (isset($linked_industry_category[0]) && in_array($linked_industry_category[0], $product_industries)) {
                            $selected = 'data-selected="selected"';
                        }

                        if (!empty($searchBoxDefaultCategory)) {
                            if($searchBoxDefaultCategory == $category->term_id) {
                                $selected = 'data-selected="selected"';
                            }
                        }

                        if(!empty($this->shortcode_default_category) && $category->term_id == $this->shortcode_default_category) {
                            $selected = 'data-selected="selected"';
                        }

                        echo    '<a class="store_locator_category_filter_image" ' . $selected . ' data-category="' . $category->term_id . '" data-icon="' . $category_icon_url . '">' .
                                    '<img src="' . $category_icon_url . '"><br>' . 
                                    '<span class="store_locator_category_filter_image_name">' .  $category->name . '</span>' .
                                '</a>';

                        if(isset($category->children)) {
                            foreach ($category->children as $childCategory) {
                                $linked_category = get_term_meta($childCategory->term_id, 'wordpress_store_locator_product_category');
                                $linked_industry_category = get_term_meta($childCategory->term_id, 'wordpress_store_locator_industry');

                                $category_icon_url = "";
                                $category_icon = get_term_meta($childCategory->term_id, 'wordpress_store_locator_icon');
                                if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                                    $category_icon_url = $category_icon[0]['url'];
                                } else {
                                    $category_icon_url = $defaultMapMarker;
                                }

                                $selected = '';
                                if (isset($linked_category[0]) && (in_array($linked_category[0], $product_categories))) {
                                    $selected = 'selected="selected"';
                                }

                                if (isset($linked_industry_category[0]) && (in_array($linked_industry_category[0], $product_industries))) {
                                    $selected = 'selected="selected"';
                                }

                                if (!empty($searchBoxDefaultCategory)) {
                                    if($searchBoxDefaultCategory == $childCategory->term_id) {
                                        $selected = 'selected="selected"';
                                    }
                                }

                                if(!empty($this->shortcode_default_category) && $childCategory->term_id == $this->shortcode_default_category) {
                                    $selected = 'data-selected="selected"';
                                }

                                echo    '<a class="store_locator_category_filter_image" ' . $selected . ' data-category="' . $childCategory->term_id . '" data-icon="' . $category_icon_url . '">' .
                                    '<img src="' . $category_icon_url . '"><br>' . 
                                    '<span class="store_locator_category_filter_image_name">' .  $childCategory->name . '</span>' .
                                '</a>';
                            }
                        }
                    }
                } else {
                ?>

                <?php if(!empty($searchBoxCategoriesText)) { ?>
                <h5 class="wordpress-store-locator-categories-title"><?php echo $searchBoxCategoriesText ?></h5>
                <?php } ?>

                <select name="categories" id="store_locator_filter_categories" class="select store_locator_filter_categories">

                    <?php
                    if($this->shortcode_show_all == "yes") { ?>
                    <option value=""><?php echo esc_html__('Select a Category', 'wordpress-store-locator' ) ?></option>
                    <?php
                    }

                    foreach ($categories as $category) {

                        $linked_category = get_term_meta($category->term_id, 'wordpress_store_locator_product_category');
                        $linked_industry_category = get_term_meta($category->term_id, 'wordpress_store_locator_industry'); 

                        $category_icon_url = "";
                        $category_icon = get_term_meta($category->term_id, 'wordpress_store_locator_icon');
                        if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                            $category_icon_url = $category_icon[0]['url'];
                        }
                        $selected = '';

                        if (isset($linked_category[0]) && in_array($linked_category[0], $product_categories)) {
                            $selected = 'selected="selected"';
                        }

                        if (isset($linked_industry_category[0]) && in_array($linked_industry_category[0], $product_industries)) {
                            $selected = 'selected="selected"';
                        }
                        
                        if (!empty($searchBoxDefaultCategory)) {
                            if($searchBoxDefaultCategory == $category->term_id) {
                                $selected = 'selected="selected"';
                            }
                        }

                        if(!empty($this->shortcode_default_category) && $category->term_id == $this->shortcode_default_category) {
                            $selected = 'selected="selected"';
                        }

                        echo '<option value="' . $category->term_id . '" ' . $selected . ' data-icon="' . $category_icon_url . '">' . $category->name . '</option>';

                        if(isset($category->children)) {
                            foreach ($category->children as $childCategory) {
                                $linked_category = get_term_meta($childCategory->term_id, 'wordpress_store_locator_product_category');
                                $linked_industry_category = get_term_meta($childCategory->term_id, 'wordpress_store_locator_industry');

                                $category_icon_url = "";
                                $category_icon = get_term_meta($childCategory->term_id, 'wordpress_store_locator_icon');
                                if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                                    $category_icon_url = $category_icon[0]['url'];
                                }
                                $selected = '';

                                if (isset($linked_category[0]) && (in_array($linked_category[0], $product_categories))) {
                                    $selected = 'selected="selected"';
                                }

                                if (isset($linked_industry_category[0]) && (in_array($linked_industry_category[0], $product_industries))) {
                                    $selected = 'selected="selected"';
                                }

                                if (!empty($searchBoxDefaultCategory)) {
                                    if($searchBoxDefaultCategory == $childCategory->term_id) {
                                        $selected = 'selected="selected"';
                                    }
                                }

                                if(!empty($this->shortcode_default_category) && $childCategory->term_id == $this->shortcode_default_category) {
                                    $selected = 'data-selected="selected"';
                                }

                                echo '<option value="' . $childCategory->term_id . '" ' . $selected . ' data-icon="' . $category_icon_url . '">-- ' . $childCategory->name . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
                <?php 
                }
                ?>
            
        </div> 
    <?php 

    }

    public function get_store_filter()
    {
        global $post;

        $storeFilterColumns = $this->get_option('storeFilterColumns');
        if(empty($storeFilterColumns)) {
            $storeFilterColumns = "oneColumn";
        }

        $args = array(
            'taxonomy' => 'store_filter',
        );
        if($this->get_option('showEmptyFilters')) {
            $args['hide_empty'] = false;
        }

        $filters = get_terms($args);

        // Preselect store category if it is connected to a product category
        $product_categories = array();
        $terms = get_the_terms($post->ID, 'product_cat');
        if (isset($terms) && !empty($terms) && is_array($terms)) {
            foreach ($terms as $term) {
                $product_categories[] = $term->term_id;
            }
        }
        ?>
        <div class="store-locator-col-12 store-locator-col-sm-12  store-locator-filters">
        <div class="store-locator-row">
            <?php
            $temp = array();

            $this->sort_terms_hierarchicaly($filters, $temp);
            $filters = $temp;

            foreach ($filters as $filter) {

                if($this->shortcode_filters !== "all" && !empty($this->shortcode_filters) && !in_array($filter->term_id, $this->shortcode_filters)) {
                    continue;
                }

                $show_for_store_category = get_term_meta($filter->term_id, 'wordpress_store_locator_store_category', true);
                $show_for_store_filter = get_term_meta($filter->term_id, 'wordpress_store_locator_store_filter', true);

                $extraStyle = "";
                $extraClasses = "";
                $extraData = "";

                if(!empty($show_for_store_category) || !empty($show_for_store_filter)) {
                    $extraStyle = ' style="display: none"';
                }

                if(!empty($show_for_store_category)) {
                    $extraClasses .= ' show_for_store_category show_for_store_category_' . $show_for_store_category;
                }

                if(!empty($show_for_store_filter)) {
                    $extraClasses .= ' show_for_store_filter show_for_store_filter_' . $show_for_store_filter;
                    $extraData .= ' data-parent-filter-id="' . $show_for_store_filter . '"';
                }                

                if($storeFilterColumns == "oneColumn") {
                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-12 single_filter single_filter_filter ' . $extraClasses . '" ' . $extraStyle . ' ' . $extraData . '>';
                } elseif($storeFilterColumns == "twoColumns") {
                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-6 single_filter single_filter_filter ' . $extraClasses . '" ' . $extraStyle . ' ' . $extraData . '>';
                } elseif($storeFilterColumns == "threeColumns") {
                    echo '<div class="store-locator-col-12 store-locator-col-sm-12 store-locator-col-md-4 single_filter single_filter_filter ' . $extraClasses . '" ' . $extraStyle . ' ' . $extraData . '>';
                }

                if($this->get_option('showStoreFilterTitle')) {
                    echo '<h5>' . $filter->name . '</h5>';
                }

                $input_type = get_term_meta($filter->term_id, 'wordpress_store_locator_input_type', true);

                if($input_type == "select") {
                    echo '<select name="#" class="select store_locator_filter_select">';
                        echo '<option value="" name="#">' . sprintf( esc_html__('Select %s', 'wordpress-store-locator'), $filter->name ) . '</option>';
                }

                if (isset($filter->children)) {
                    foreach ($filter->children as $filterChild) {

                        if($this->shortcode_filters !== "all" && !empty($this->shortcode_filters) && !in_array($filterChild->term_id, $this->shortcode_filters)) {
                            continue;
                        }

                        $linked_category = get_term_meta($filterChild->term_id, 'wordpress_store_locator_product_category');
                        if ( (isset($linked_category[0]) && (in_array($linked_category[0], $product_categories) )) || (in_array($filterChild->term_id, $this->shortcode_default_filters) ) ) {
                            $checked = 'checked';
                            $selected = 'selected="selected"';
                        } else {
                            $checked = '';
                            $selected = '';
                        }

                        $filterLat = get_term_meta($filterChild->term_id, 'wordpress_store_locator_lat', true);
                        $filterLng = get_term_meta($filterChild->term_id, 'wordpress_store_locator_lng', true);
                        $filterZoom = get_term_meta($filterChild->term_id, 'wordpress_store_locator_zoom', true);
                        $resetFilters = get_term_meta($filterChild->term_id, 'wordpress_store_locator_reset_filters', true);
                        

                        if($input_type == "select") {
                            echo '<option ' . $checked . ' data-zoom="' . $filterZoom . '" data-lat="' . $filterLat . '" data-lng="' . $filterLng . '" data-reset-filters="' . $resetFilters . '" data-filter-id="' . $filterChild->term_id . '" value="' . $filterChild->term_id . '">' . $filterChild->name . '</option>';
                        }  elseif($input_type == "radio") {
                            echo '<label class="single_filter_radio"><input ' . $checked . ' name="' . $filterChild->term_id . '" data-filter-id="' . $filterChild->term_id . '" data-zoom="' . $filterZoom . '" data-lat="' . $filterLat . '" data-lng="' . $filterLng . '" data-reset-filters="' . $resetFilters . '" type="radio" class="store_locator_filter_radio" value="' . $filterChild->name . '">' . $filterChild->name . '</label>';
                        } else {
                            echo '<label class="single_filter_checkbox control control--checkbox">
                            <input ' . $checked . ' name="' . $filterChild->term_id . '" type="checkbox" data-filter-id="' . $filterChild->term_id . '" data-zoom="' . $filterZoom . '" data-lat="' . $filterLat . '" data-lng="' . $filterLng . '" data-reset-filters="' . $resetFilters . '" class="store_locator_filter_checkbox" value="' . $filterChild->name . '">' . $filterChild->name . '<div class="control__indicator"></div></label>';
                        }
                    }
                }

                if($input_type == "select") {
                    echo '</select>';
                }

                echo '</div>';
            }
            ?>
        </div>
        </div>

        <?php
    }

    public function get_online_offline()
    {
        $onlineOfflineAllText = $this->get_option('onlineOfflineAllText');
        $onlineStoreText = $this->get_option('onlineStoreText');
        $offlineStoreText = $this->get_option('offlineStoreText');

        ?>

        <div class="store-locator-col-12 store-locator-col-sm-12 single_filter store-locator-online-offline-filter-container">
            <div class="store-locator-row">
                <div class="store-locator-col-12 store-locator-col-sm-4">
                    <label class="single_filter_radio">
                        <input checked name="store_locator_oneline_offline" type="radio" class="store_locator_filter_radio store-locator-online-offline-filter store-locator-online-offline-all" value="all"><?php echo $onlineOfflineAllText ?>
                    </label>
                </div>
                <div class="store-locator-col-12 store-locator-col-sm-4">
                    <label class="single_filter_radio">
                        <input name="store_locator_oneline_offline" type="radio" class="store_locator_filter_radio store-locator-online-offline-filter store-locator-online-offline-online" value="online"><?php echo $onlineStoreText ?>
                    </label>
                </div>
                <div class="store-locator-col-12 store-locator-col-sm-4">
                    <label class="single_filter_radio">
                        <input name="store_locator_oneline_offline" type="radio" class="store_locator_filter_radio store-locator-online-offline-filter store-locator-online-offline-offline" value="offline"><?php echo $offlineStoreText ?>
                    </label>
                </div>
            </div>
        </div>

        <?php
    }

    public function get_radius_filter()
    {   
        $mapRadiusSteps = $this->get_option('mapRadiusSteps');
        $mapRadius = $this->get_option('mapRadius');
        $mapDistanceUnit = $this->get_option('mapDistanceUnit');
        $searchBoxRadiusText = $this->get_option('searchBoxRadiusText');

        ?>
        <div class="store-locator-col-12 store-locator-col-sm-12 single_filter store-locator-radius-filter">
            
            <?php if(!empty($searchBoxRadiusText)) { ?>
            <h5 class="wordpress-store-locator-radius-title"><?php echo $searchBoxRadiusText ?></h5>
            <?php } ?>
            
            <select name="radius" id="store_locator_filter_radius" class="select store_locator_filter_radius">
            <?php
                $mapRadiusSteps = explode(',', $mapRadiusSteps);
                $maxRadiusStepKey = end($mapRadiusSteps); 
                foreach ($mapRadiusSteps as $mapRadiusStep) {

                    if ($this->shortcode_max_radius == "yes" && $mapRadiusStep == $maxRadiusStepKey) {
                        $selected = 'selected="selected"';
                    } elseif ($mapRadius == $mapRadiusStep && $this->shortcode_max_radius != "yes") {
                        $selected = 'selected="selected"';
                    } else {
                        $selected = '';
                    }
                    echo '<option value="' . $mapRadiusStep . '" ' . $selected . '>' . $mapRadiusStep . ' ' . $mapDistanceUnit . '</option>';
                }
                ?>
            </select>
        </div>

        <?php
    }

    /**
     * Create a Custom Link
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    public function custom_link()
    {
        global $product;

        $product_id = 0;
        if($product) {
            $product_id = $product->get_id();
        }

        $apply = $this->excludeProductCategories();
        if(!$apply) {
            return false;
        }

        $productQuery = "";
        if(!empty($product_id)) {
            $productQuery = '?product-id=' . $product_id;
        }
        
        $buttonText = $this->get_option('buttonText');
        $buttonURL = $this->get_option('buttonActionURL');
        $buttonTarget = $this->get_option('buttonActionURLTarget');

        echo    '<a id="store_locator_custom_bottom" target="' . $buttonTarget . '" href="' . $buttonURL .  $productQuery . '" class="store_locator_custom_bottom button alt">'
                    . $buttonText .
                '</a>';
    }

    /**
     * Sort Wordpress Terms Hierarchicaly
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @param   array                          &$cats
     * @param   array                          &$into
     * @param   integer                        $parentId
     * @return  array
     */
    private function sort_terms_hierarchicaly(array &$cats, array &$into, $parentId = 0)
    {
        foreach ($cats as $i => $cat) {
            if ($cat->parent == $parentId) {
                $into[$cat->term_id] = $cat;
                unset($cats[$i]);
            }
        }

        foreach ($into as $topCat) {
            $topCat->children = array();
            $this->sort_terms_hierarchicaly($cats, $topCat->children, $topCat->term_id);
        }
    }

    /**
     * Get the filter
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     */
    private function get_search_box_filter()
    {
        global $post;

        $args = array(
            'taxonomy' => 'store_filter',
        );
        if($this->get_option('showEmptyFilters')) {
            $args['hide_empty'] = false;
        }

        // Store Categories & Filter
        $filter = get_terms($args);
        $categories = array();

        $args['taxonomy'] = 'store_category';
        $categories = get_terms($args);

        $searchBoxDefaultCategory = $this->get_option('searchBoxDefaultCategory');
        $temp = array();
        $this->sort_terms_hierarchicaly($categories, $temp);
        if(!empty($temp)) {
            $categories = $temp;
        }

        // Preselect store category if it is connected to a product category
        $product_categories = array();
        $terms = get_the_terms($post->ID, 'product_cat');
        if (isset($terms) && !empty($terms) && is_array($terms)) {
            foreach ($terms as $term) {
                $product_categories[] = $term->term_id;
            }
        }
        ?>

        <div id="store_locator_filter" class="store_locator_filter">
            <div id="store_locator_filter_content" class="store-locator-row store_locator_filter_content">

                <?php if(!empty($categories)) { ?>
                <div class="store-locator-col-12 store-locator-col-sm-4 single_filter category_filter">
                    <h5><?php echo esc_html__('Category', 'wordpress-store-locator' ) ?></h5>
                    <select name="category" id="store_locator_filter_categories" class="select store_locator_filter_categories">
                        <option value=""><?php echo esc_html__('Select a Category', 'wordpress-store-locator' ) ?></option>
                        <?php

                        foreach ($categories as $category) {
                            $category_icon_url = "";
                            $category_icon = get_term_meta($category->term_id, 'wordpress_store_locator_icon');
                            if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                                $category_icon_url = $category_icon[0]['url'];
                            }
                            $selected = '';

                            if (!empty($searchBoxDefaultCategory)) {
                                if($searchBoxDefaultCategory == $category->term_id) {
                                    $selected = 'selected="selected"';
                                }
                            }

                            echo '<option value="' . $category->term_id . '" ' . $selected . ' data-icon="' . $category_icon_url . '">' . $category->name . '</option>';

                            if(isset($category->children)) {
                                foreach ($category->children as $childCategory) {

                                    $category_icon_url = "";
                                    $category_icon = get_term_meta($childCategory->term_id, 'wordpress_store_locator_icon');
                                    if(isset($category_icon[0]) && !empty($category_icon[0]['url'])) {
                                        $category_icon_url = $category_icon[0]['url'];
                                    }
                                    $selected = '';

                                     if (!empty($searchBoxDefaultCategory)) {
                                        if($searchBoxDefaultCategory == $childCategory->term_id) {
                                            $selected = 'selected="selected"';
                                        }
                                    }

                                    echo '<option value="' . $childCategory->term_id . '" ' . $selected . ' data-icon="' . $category_icon_url . '">-- ' . $childCategory->name . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <?php } ?>

                <?php
                $temp = array();
                $this->sort_terms_hierarchicaly($filter, $temp);
                $filter = $temp;
                foreach ($filter as $singleFilter) {
                    echo '<div class="store-locator-col-12 store-locator-col-sm-4 single_filter">';
                    echo '<h5>' . $singleFilter->name . '</h5>';  


                    if (isset($singleFilter->children)) {

                        $input_type = get_term_meta($singleFilter->term_id, 'wordpress_store_locator_input_type', true);

                        if($input_type == "select") {
                            echo '<select name="filter[]" class="select store_locator_filter_select">';
                                echo '<option value="" name="#">' . sprintf( esc_html__('Select %s', 'wordpress-store-locator'), $singleFilter->name ) . '</option>';
                        }

                        foreach ($singleFilter->children as $singleFilterChild) {
                            $linked_category = get_term_meta($singleFilterChild->term_id, 'wordpress_store_locator_product_category');

                            if (isset($linked_category[0]) && (in_array($linked_category[0], $product_categories) )) {
                                $checked = 'checked';
                                $selected = 'selected="selected"';
                            } else {
                                $checked = '';
                                $selected = '';
                            }

                            if($input_type == "select") {

                                echo '<option ' . $checked . ' value="' . $singleFilterChild->term_id . '">' . $singleFilterChild->name . '</option>';
                            }  elseif($input_type == "radio") {
                                echo '<label class="single_filter_radio"><input ' . $checked . ' name="' . $singleFilterChild->term_id . '" type="radio" class="store_locator_filter_radio" value="' . $singleFilterChild->name . '">' . $singleFilterChild->name . '</label>';
                            } else {
                                echo '<label class="single_filter_checkbox control control--checkbox"><input ' . $checked . ' name="filter[]" type="checkbox" class="store_locator_filter_checkbox" value="' . $singleFilterChild->term_id . '">' . $singleFilterChild->name . '<div class="control__indicator"></div></label>';
                            }
                        }

                        if($input_type == "select") {
                            echo '</select>';
                        }
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <?php

    }

    public function process_review_form()
    {   

        $valid = true;
        $errors = array();

        if(!isset($_POST['store_locator_review_name']) || empty($_POST['store_locator_review_name'])) {
            $valid = false;
            $errors[] = esc_html__('Name missing', 'wordpress-store-locator');
        }

        if(!isset($_POST['store_locator_review_email']) || empty($_POST['store_locator_review_email'])) {
            $valid = false;
            $errors[] = esc_html__('Email missing', 'wordpress-store-locator');
        }

        if(!isset($_POST['store_locator_review_comment']) || empty($_POST['store_locator_review_comment'])) {
            $valid = false;
            $errors[] = esc_html__('Comment missing', 'wordpress-store-locator');
        }

        if(!isset($_POST['store_locator_rating']) || empty($_POST['store_locator_rating'])) {
            $valid = false;
            $errors[] = esc_html__('Rating missing', 'wordpress-store-locator');
        }

        if(!$valid) {
            wp_die('Could not add rating<br>' . implode('<br>', $errors));
        }

        $filteredData = array(
            'store_locator_review_name' => filter_var($_POST['store_locator_review_name'], FILTER_SANITIZE_STRING),
            'store_locator_review_email' => filter_var( $_POST['store_locator_review_email'], FILTER_SANITIZE_EMAIL),
            'store_locator_rating' => filter_var($_POST['store_locator_rating'], FILTER_SANITIZE_NUMBER_INT),
            'store_locator_review_comment' => filter_var($_POST['store_locator_review_comment'], FILTER_SANITIZE_STRING),
            'store_locator_review_post_id' => filter_var($_POST['store_locator_review_post_id'], FILTER_SANITIZE_NUMBER_INT),
        );
   
        $commentdata = array(
            'comment_post_ID' => $filteredData['store_locator_review_post_id'],
            'comment_author' => $filteredData['store_locator_review_name'],
            'comment_author_email' => $filteredData['store_locator_review_email'],
            'comment_author_url' => '',
            'comment_content' =>  $filteredData['store_locator_review_comment'],
            'comment_type' => '',
            'comment_parent' => 0,
        );

        //Insert new comment and get the comment ID
        $comment_id = wp_insert_comment($commentdata);

        if (is_int($comment_id)) {

            $postId = $_POST['store_locator_review_post_id'];
            
            add_comment_meta( $comment_id, 'store_locator_rating', $filteredData['store_locator_rating'] );

            $reviewsCount = get_comments(array(
                'post_id' => $postId,
                'count' => true,
            ));

            // $filteredData['store_locator_review_post_id']
            $currentRatingsValue = get_post_meta($postId, 'wordpress_store_locator_rating_value', true);
            if(!$currentRatingsValue) {
                $currentRatingsValue = 0;
            }
            $currentRatingsValue += $filteredData['store_locator_rating'];

            $averageRating = round($currentRatingsValue / $reviewsCount, 1);

            update_post_meta($postId, 'wordpress_store_locator_rating_value', $currentRatingsValue);
            update_post_meta($postId, 'wordpress_store_locator_average_rating', $averageRating);

            return true;
        } else {
            $this->errors[] = $comment_id;
            return false;
        }
    }

    /**
     * Exclude Product Categories
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function excludeProductCategories()
    {
        global $post;

        $excludeProductCategories = $this->get_option('buttonExcludeProductCategories');
        if(empty($excludeProductCategories)) {
            return true;
        }

        $excludeProductCategoriesRevert = $this->get_option('buttonExcludeProductCategoriesRevert');
        $productCategories = get_the_terms( $post->ID, 'product_cat' );
        if(empty($productCategories)) {
            return true;
        }

        $categoryIds = wp_list_pluck($productCategories, 'term_id');
        
        $intersection = array_intersect($categoryIds, $excludeProductCategories);
        if($excludeProductCategoriesRevert) {

            if(empty($intersection)) {
                return false;
            }
        } else {
            
            if(!empty($intersection)) {
                return false;
            }
            
        }

        return TRUE;

        
    }
}
