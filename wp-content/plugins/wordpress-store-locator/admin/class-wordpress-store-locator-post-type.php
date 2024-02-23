<?php
/**
 * Custom Post Type for Stores and Taxonomies.
 */
class WordPress_Store_Locator_Post_Type 
{
    private $plugin_name;
    private $version;
    protected $prefix;
    protected $options;

    /**
     * Constructor.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @param string $plugin_name
     * @param string $version
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->prefix = 'wordpress_store_locator_';

        add_filter('manage_stores_posts_columns', array($this, 'columns_head'));
        add_action('manage_stores_posts_custom_column', array($this, 'columns_content'), 10, 1);
    }

    /**
     * Init.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @return bool
     */
    public function init()
    {
        global $wordpress_store_locator_options;
        $this->options = $wordpress_store_locator_options;

        $this->register_store_locator_post_type();
        $this->register_store_locator_taxonomy();
        
        if(is_admin()) {
            $this->add_custom_meta_fields();
        }
    }

    /**
     * Register Store Post Type.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @return bool
     */
    public function register_store_locator_post_type()
    {
        $singular = esc_html__('Store', 'wordpress-store-locator');
        $plural = esc_html__('Stores', 'wordpress-store-locator');

        $public = true;
        if($this->get_option('singleStorePage') === "0") {
            $public = false;
        }

        $labels = array(
            'name' => esc_html__('Store Locator', 'wordpress-store-locator'),
            'all_items' => sprintf( esc_html__('All %s', 'wordpress-store-locator'), $plural),
            'singular_name' => $singular,
            'add_new' => sprintf( esc_html__('New %s', 'wordpress-store-locator'), $singular),
            'add_new_item' => sprintf( esc_html__('Add New %s', 'wordpress-store-locator'), $singular),
            'edit_item' => sprintf( esc_html__('Edit %s', 'wordpress-store-locator'), $singular),
            'new_item' => sprintf( esc_html__('New %s', 'wordpress-store-locator'), $singular),
            'view_item' => sprintf( esc_html__('View %s', 'wordpress-store-locator'), $singular),
            'search_items' => sprintf( esc_html__('Search %s', 'wordpress-store-locator'), $plural),
            'not_found' => sprintf( esc_html__('No %s found', 'wordpress-store-locator'), $plural),
            'not_found_in_trash' => sprintf( esc_html__('No %s found in trash', 'wordpress-store-locator'), $plural),
        );

        $args = array(
            'labels' => $labels,
            'public' => $public,
            'exclude_from_search' => false,
            'show_ui' => true,
            'menu_position' => 57,
            'rewrite' => array(
                'slug' => 'store',
                'with_front' => FALSE
            ),
            'query_var' => 'stores',
            'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-location-alt',
            'taxonomies' => array(),
        );

        if(class_exists('WooCommerce_Product_Retailers')) {
            $args['taxonomies'][] = 'retailers';
        }

        if(class_exists('WooCommerce_Multi_Inventory')) {
            $args['taxonomies'][] = 'inventories';
        }

        register_post_type('stores', $args);

    }

    /**
     * Register Store Categories and Store Filter Taxonomies.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @return bool
     */
    public function register_store_locator_taxonomy()
    {
    	// Store Category
        $singular = esc_html__('Store Category', 'wordpress-store-locator');
        $plural = esc_html__('Store Categories', 'wordpress-store-locator');

        $labels = array(
            'name' => sprintf( '%s', $plural),
            'singular_name' => sprintf( '%s', $singular),
            'search_items' => sprintf( esc_html__('Search %s', 'wordpress-store-locator'), $plural),
            'all_items' => sprintf( esc_html__('All %s', 'wordpress-store-locator'), $plural),
            'parent_item' => sprintf( esc_html__('Parent %s', 'wordpress-store-locator'), $singular),
            'parent_item_colon' => sprintf( esc_html__('Parent %s:', 'wordpress-store-locator'), $singular),
            'edit_item' => sprintf( esc_html__('Edit %s', 'wordpress-store-locator'), $singular),
            'update_item' => sprintf( esc_html__('Update %s', 'wordpress-store-locator'), $singular),
            'add_new_item' => sprintf( esc_html__('Add New %s', 'wordpress-store-locator'), $singular),
            'new_item_name' => sprintf( esc_html__('New %s Name', 'wordpress-store-locator'), $singular),
            'menu_name' => sprintf( '%s', $plural),
        );

        $args = array(
                'labels' => $labels,
                'public' => true,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array(
                    'slug' => 'store-categories',
                    'with_front' => FALSE
                ),
        );

        register_taxonomy('store_category', 'stores', $args);

        // Store Filter
        $singular = esc_html__('Store Filter', 'wordpress-store-locator');
        $plural = esc_html__('Store Filter', 'wordpress-store-locator');
        $labels = array(
            'name' => sprintf( esc_html__('%s', 'wordpress-store-locator'), $plural),
            'singular_name' => sprintf( esc_html__('%s', 'wordpress-store-locator'), $singular),
            'search_items' => sprintf( esc_html__('Search %s', 'wordpress-store-locator'), $plural),
            'all_items' => sprintf( esc_html__('All %s', 'wordpress-store-locator'), $plural),
            'parent_item' => sprintf( esc_html__('Parent %s', 'wordpress-store-locator'), $singular),
            'parent_item_colon' => sprintf( esc_html__('Parent %s:', 'wordpress-store-locator'), $singular),
            'edit_item' => sprintf( esc_html__('Edit %s', 'wordpress-store-locator'), $singular),
            'update_item' => sprintf( esc_html__('Update %s', 'wordpress-store-locator'), $singular),
            'add_new_item' => sprintf( esc_html__('Add New %s', 'wordpress-store-locator'), $singular),
            'new_item_name' => sprintf( esc_html__('New %s Name', 'wordpress-store-locator'), $singular),
            'menu_name' => sprintf( esc_html__('%s', 'wordpress-store-locator'), $plural),
        );

        $args = array(
                'labels' => $labels,
                'public' => false,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'store-filter'),
        );

        register_taxonomy('store_filter', 'stores', $args);
    }

    /**
     * Add Custom Meta Fields to Store Categories and Filters.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @return bool
     */
    public function add_custom_meta_fields()
    {
        $custom_taxonomy_meta_config = array(
            'id' => 'stores_meta_box',
            'title' => 'Stores Meta Box',
            'pages' => array('store_category', 'store_filter'),
            'context' => 'side',
            'fields' => array(),
            'local_images' => false,
            'use_with_theme' => false,
        );

        $custom_taxonomy_meta_fields = new Tax_Meta_Class($custom_taxonomy_meta_config);
        // $custom_taxonomy_meta_fields->addImage($prefix . 'image', array('name' => esc_html__('Map Icon ', 'wordpress-store-locator')));
        // No ID!
        // $custom_taxonomy_meta_fields->addTaxonomy($prefix . 'product_category',array('taxonomy' => 'product_cat'),array('name'=> esc_html__('Link to Product Category ','wordpress-store-locator')));

        $options = array('' => 'Select Category');
        $categories = get_terms('product_cat');
        if(is_array($categories)) {
            foreach ($categories as $category) {
                $options[$category->term_id] = $category->name;
            }
            $custom_taxonomy_meta_fields->addSelect($this->prefix . 'product_category', $options, array('name' => esc_html__('Link to Product Category ', 'wordpress-store-locator')));
        }

        $options = array('' => 'Select Industry');
        $categories = get_terms('industries');
        if(is_array($categories)) {
            foreach ($categories as $category) {
                $options[$category->term_id] = $category->name;
            }
            $custom_taxonomy_meta_fields->addSelect($this->prefix . 'industry', $options, array('name' => esc_html__('Link to Product Industry ', 'wordpress-store-locator')));
        }

        $custom_taxonomy_meta_fields->addImage($this->prefix . 'icon', array('name'=> esc_html__('Custom Icon ','wordpress-store-locator')));

        $term = new stdClass();

        if(isset($_GET['tag_ID']) && !empty($_GET['tag_ID'])) {
            $term = get_term($_GET['tag_ID']);
        }

        if(isset($_POST['tag_ID']) && !empty($_POST['tag_ID'])) {
            $term = get_term($_POST['tag_ID']);   
        }

        if(isset($term->taxonomy) && $term->taxonomy == "store_filter") {

            if(isset($term->parent) && $term->parent != 0) {

                $options = array(
                    'default' => 'Default',
                    'OR' => 'OR',
                    'AND' => 'AND',
                );
                $custom_taxonomy_meta_fields->addSelect($this->prefix . 'query_operator', $options, array('name' => esc_html__('Query Operator ', 'wordpress-store-locator')));
                $custom_taxonomy_meta_fields->addText($this->prefix . 'lat', array('name' => esc_html__('Lat', 'wordpress-store-locator')));
                $custom_taxonomy_meta_fields->addText($this->prefix . 'lng', array('name' => esc_html__('Lng', 'wordpress-store-locator')));
                $custom_taxonomy_meta_fields->addText($this->prefix . 'zoom', array('name' => esc_html__('Zoom', 'wordpress-store-locator')));
                $custom_taxonomy_meta_fields->addCheckbox($this->prefix . 'reset_filters', array('name' => esc_html__('Reset Filters', 'wordpress-store-locator')));
            }

            if(isset($term->parent) && $term->parent == 0) {

                // $custom_taxonomy_meta_fields = new Tax_Meta_Class($custom_taxonomy_meta_config);

                $options = array(
                    'checkbox' => 'Checkboxes',
                    'select' => 'Select Field',
                    // 'radio' => 'Radio Buttons',
                );
                $custom_taxonomy_meta_fields->addSelect($this->prefix . 'input_type', $options, array('name' => esc_html__('Input Type ', 'wordpress-store-locator')));

                $options = array('' => 'Select Store Category');
                $categories = get_terms('store_category');
                if(is_array($categories)) {
                    foreach ($categories as $category) {
                        $options[$category->term_id] = $category->name;
                    }
                    $custom_taxonomy_meta_fields->addSelect($this->prefix . 'store_category', $options, array('name' => esc_html__('Show for Store Category', 'wordpress-store-locator')));
                }

                $options = array('' => 'Select Filter');
                $parentFilters = get_terms(array(

                    'taxonomy' => 'store_filter',
                    'parent'        => 0,
                    'number'        => 999,
                    'hide_empty'    => false    
                ));
                if(!empty($parentFilters)) {

                    $options = array('' => 'Select Filter');

                    foreach($parentFilters as $parentFilter) {

                        $childFilters = get_terms(array(

                            'taxonomy'      => 'store_filter',
                            'parent'        => $parentFilter->term_id,
                            'number'        => 999,
                            'hide_empty'    => false    
                        ));

                        if(!empty($childFilters)) {

                            
                            if(is_array($categories)) {
                                foreach ($childFilters as $childFilter) {
                                    $options[$childFilter->term_id] = $parentFilter->name . ' > ' . $childFilter->name;
                                }
                            }
                        }
                    }

                    $custom_taxonomy_meta_fields->addSelect($this->prefix . 'store_filter', $options, array('name' => esc_html__('Show only when filtered by ', 'wordpress-store-locator')));
                }
            }
        }

        $custom_taxonomy_meta_fields->Finish();
    }

    /**
     * Columns Head.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @param string $columns Columnd
     *
     * @return string
     */
    public function columns_head($columns)
    {
        $output = array();
        foreach ($columns as $column => $name) {
            $output[$column] = $name;

            if ($column === 'title') {
                $output['address'] = esc_html__('Address', 'wordpress-store-locator');
                $output['contact'] = esc_html__('Contact', 'wordpress-store-locator');
                $output['coordinates'] = esc_html__('Coordinates', 'wordpress-store-locator');
            }
        }

        return $output;
    }

    /**
     * Columns Content.
     *
     * @author Daniel Barenkamp
     *
     * @version 1.0.0
     *
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     *
     * @param string $column_name Column Name
     *
     * @return string
     */
    public function columns_content($column_name)
    {
        global $post;

        if ($column_name == 'address') {
            $address = array();
            $address['address1'] = get_post_meta($post->ID, 'wordpress_store_locator_address1', true);
            $address['address2'] = get_post_meta($post->ID, 'wordpress_store_locator_address2', true);
            $address['city'] = get_post_meta($post->ID, 'wordpress_store_locator_zip', true) . ', ' . get_post_meta($post->ID, 'wordpress_store_locator_city', true);
            $address['country'] = get_post_meta($post->ID, 'wordpress_store_locator_region', true) . ', ' . get_post_meta($post->ID, 'wordpress_store_locator_country', true);

            echo implode('<br/>', array_filter($address));
        }

        if ($column_name == 'contact') {
            $contact = array();
            $contact['telephone'] = esc_html__('Tel.:', 'wordpress-store-locator') . ' ' . get_post_meta($post->ID, 'wordpress_store_locator_telephone', true);
            $contact['mobile'] = esc_html__('Mobile:', 'wordpress-store-locator') . ' ' . get_post_meta($post->ID, 'wordpress_store_locator_mobile', true);
            $contact['email'] = esc_html__('Email:', 'wordpress-store-locator') . ' <a href="mailto' . get_post_meta($post->ID, 'wordpress_store_locator_email', true) . '"> ' . get_post_meta($post->ID, 'wordpress_store_locator_email', true) . '</a>';
            $contact['website'] = esc_html__('Website:', 'wordpress-store-locator')  . ' <a href="' . get_post_meta($post->ID, 'wordpress_store_locator_website', true) . '"> ' . get_post_meta($post->ID, 'wordpress_store_locator_website', true) . '</a>';

            echo implode('<br/>', array_filter($contact));
        }

        if ($column_name == 'coordinates') {
            $coordinates = array();
            $coordinates['lat'] = esc_html__('Lat:', 'wordpress-store-locator') . ' ' . get_post_meta($post->ID, 'wordpress_store_locator_lat', true);
            $coordinates['lng'] = esc_html__('Lng:', 'wordpress-store-locator') . ' ' . get_post_meta($post->ID, 'wordpress_store_locator_lng', true);

            echo implode('<br/>', array_filter($coordinates));
        }
    }

    /**
     * Add custom ticket metaboxes
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @param   [type]                       $post_type [description]
     * @param   [type]                       $post      [description]
     */
    public function add_custom_metaboxes($post_type, $post)
    {
        add_meta_box('wordpress-store-locator-address', 'Address', array($this, 'address'), 'stores', 'normal', 'high');
        add_meta_box('wordpress-store-locator-contact', 'Contact Information', array($this, 'contact'), 'stores', 'normal', 'high');
        add_meta_box('wordpress-store-locator-additional', 'Additional', array($this, 'additional'), 'stores', 'normal', 'high');
        add_meta_box('wordpress-store-locator-opening', 'Opening Hours', array($this, 'opening'), 'stores', 'normal', 'high');

        add_meta_box('wordpress-store-locator-opening2', 'Opening Hours 2', array($this, 'opening2'), 'stores', 'normal', 'high');
    }

    /**
     * Display Metabox Address
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function address()
    {
        global $post, $wordpress_store_locator_options;

        wp_nonce_field(basename(__FILE__), 'wordpress_store_locator_meta_nonce');

        if($this->is_new_store()) {
            $address1 = $wordpress_store_locator_options['defaultAddress1'];
            $address2 = $wordpress_store_locator_options['defaultAddress2'];
            $zip = $wordpress_store_locator_options['defaultZIP'];
            $city = $wordpress_store_locator_options['defaultCity'];
            $region = $wordpress_store_locator_options['defaultRegion'];
            $lat = '';
            $lng = '';

            $country = $wordpress_store_locator_options['defaultCountry'];

        } else {
            $address1 = get_post_meta($post->ID, $this->prefix . 'address1', true);
            $address2 = get_post_meta($post->ID, $this->prefix . 'address2', true);
            $zip = get_post_meta($post->ID, $this->prefix . 'zip', true);
            $city = get_post_meta($post->ID, $this->prefix . 'city', true);
            $region = get_post_meta($post->ID, $this->prefix . 'region', true);
            $country = get_post_meta($post->ID, $this->prefix . 'country', true);
            $lat = get_post_meta($post->ID, $this->prefix . 'lat', true);
            $lng = get_post_meta($post->ID, $this->prefix . 'lng', true);
        }

        echo '<div class="wordpress-store-locator-container">';
            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'address1">' . esc_html__( 'Address Line 1', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'address1" value="' . $address1 . '" type="text">';
                echo '</div>';
            
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'address2">' . esc_html__( 'Address Line 2', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'address2" value="' . $address2 . '" type="text">';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'zip">' . esc_html__( 'ZIP', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'zip" value="' . $zip . '" type="text">';
                echo '</div>';
            
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'city">' . esc_html__( 'City', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'city" value="' . $city . '" type="text">';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'region">' . esc_html__( 'State / Province / Region', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'region" value="' . $region . '" type="text">';
                echo '</div>';
            
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'country">' . esc_html__( 'Country', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<select name="' . $this->prefix . 'country" class="wordpress-store-locator-input-field">';
                    $countries = $this->get_countries();
                    foreach ($countries as $code => $countryName) {
                        $selected = "";
                        if($country == $code) {
                            $selected = 'selected="selected"';
                        }
                        echo '<option value="' . $code . '" ' . $selected . '>' . $countryName . '</option>';
                    }
                    echo '</select>';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-12">';
                    echo '<a href="#" id="wordpress-store-locator-get-position" class="btn button">Get Position</a>';
                    echo '<div class="wordpress-store-locator-map" data-lat="' . $lat . '" data-lng="' . $lng . '">';
                        echo '<div id="wordpress-store-locator-map-container"></div>';
                    echo '</div>';
                echo '</div>';    
            echo '</div>';
            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'lat">' . esc_html__( 'Latitude', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input id="wordpress-store-locator-lat" class="wordpress-store-locator-input-field" name="' . $this->prefix . 'lat" value="' . $lat . '" type="text">';
                echo '</div>';
            
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'lng">' . esc_html__( 'Longitude', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input id="wordpress-store-locator-lng" class="wordpress-store-locator-input-field" name="' . $this->prefix . 'lng" value="' . $lng . '" type="text">';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }

    /**
     * Display Metabox Address
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function contact()
    {
        global $post, $wordpress_store_locator_options;

        wp_nonce_field(basename(__FILE__), 'wordpress_store_locator_meta_nonce');

        if($this->is_new_store()) {
            $telephone = $wordpress_store_locator_options['defaultTelephone'];
            $mobile = $wordpress_store_locator_options['defaultMobile'];
            $fax = $wordpress_store_locator_options['defaultFax'];
            $chat = $wordpress_store_locator_options['defaultChat'];
            $email = $wordpress_store_locator_options['defaultEmail'];
            $website = $wordpress_store_locator_options['defaultWebsite'];
            $email_placeholder = "";
        } else {
            $telephone = get_post_meta($post->ID, $this->prefix . 'telephone', true);
            $mobile = get_post_meta($post->ID, $this->prefix . 'mobile', true);
            $fax = get_post_meta($post->ID, $this->prefix . 'fax', true);
            $chat = get_post_meta($post->ID, $this->prefix . 'chat', true);
            $email = get_post_meta($post->ID, $this->prefix . 'email', true);
            $email_placeholder = get_post_meta($post->ID, $this->prefix . 'email_placeholder', true);
            $website = get_post_meta($post->ID, $this->prefix . 'website', true);
        }

        echo '<div class="wordpress-store-locator-container">';
            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'telephone">' . esc_html__( 'Telephone', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'telephone" value="' . $telephone . '" type="text">';
                echo '</div>';
            
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'mobile">' . esc_html__( 'Mobile', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'mobile" value="' . $mobile . '" type="text">';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';

                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'website">' . esc_html__( 'Website', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'website" value="' . $website . '" type="text">';
                echo '</div>';

                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'fax">' . esc_html__( 'Fax', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'fax" value="' . $fax . '" type="text">';
                echo '</div>';                
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'email">' . esc_html__( 'Email', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'email" value="' . $email . '" type="text">';
                echo '</div>';

                if(isset($wordpress_store_locator_options['showEmailPlaceholder']) && $wordpress_store_locator_options['showEmailPlaceholder'] == "1") {
                    echo '<div class="wordpress-store-locator-col-sm-6">';
                        echo '<label for="' . $this->prefix . 'email_placeholder">' . esc_html__( 'Email Placeholder', 'wordpress-store-locator' ) . '</label><br/>';
                        echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'email_placeholder" value="' . $email_placeholder . '" type="text">';
                    echo '</div>';
                }
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'chat">' . esc_html__( 'Chat URL', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'chat" value="' . $chat . '" type="text">';
                echo '</div>';
            echo '</div>';

        echo '</div>';
    }

    /**
     * Display Metabox Address
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function additional()
    {
        global $post, $wordpress_store_locator_options;

        if($this->is_new_store()) {
            $ranking = $wordpress_store_locator_options['defaultRanking'];
        } else {
            $ranking = get_post_meta($post->ID, $this->prefix . 'ranking', true);
        }

        $online = get_post_meta($post->ID, $this->prefix . 'online', true) == "1" ? 'checked="checked"' : '';
        $offline = get_post_meta($post->ID, $this->prefix . 'offline', true) == "1" ? 'checked="checked"' : '';
        $premium = get_post_meta($post->ID, $this->prefix . 'premium', true) == "1" ? 'checked="checked"' : '';
        $icon = get_post_meta($post->ID, $this->prefix . 'icon', true);
        $customerId = get_post_meta($post->ID, $this->prefix . 'customerId', true);

        echo '<div class="wordpress-store-locator-container">';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-4">';
                    echo '<label for="' . $this->prefix . 'premium">' . esc_html__( 'Premium Store', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'premium" value="1" ' . $premium . ' type="checkbox">';
                echo '</div>';
                echo '<div class="wordpress-store-locator-col-sm-4">';
                    echo '<label for="' . $this->prefix . 'online">' . esc_html__( 'Online Store', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'online" value="1" ' . $online . ' type="checkbox">';
                echo '</div>';
                echo '<div class="wordpress-store-locator-col-sm-4">';
                    echo '<label for="' . $this->prefix . 'offline">' . esc_html__( 'Offline Store', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'offline" value="1" ' . $offline . ' type="checkbox">';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';

                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'ranking">' . esc_html__( 'Ranking', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'ranking" value="' . $ranking . '" type="number">';
                echo '</div>';

                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . 'customerId">' . esc_html__( 'Customer Id', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'customerId" value="' . $customerId . '" type="text">';
                echo '</div>';
            echo '</div>';

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-12">';
                    echo '<label for="' . $this->prefix . 'icon">' . esc_html__( 'Custom Icon (URL)', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . 'icon" value="' . $icon . '" type="url">';
                echo '</div>';
            echo '</div>';

            $customFields = $wordpress_store_locator_options['showCustomFields'];
            if(!empty($customFields)) {

                echo '<div class="wordpress-store-locator-row">';

                foreach ($customFields as $customFieldKey => $customFieldName) {

                    $customFieldKey = $this->prefix . $customFieldKey;
                    $customFieldValue = get_post_meta($post->ID, $customFieldKey, true);

                    echo '<div class="wordpress-store-locator-col-sm-6">';
                        echo '<label for="' . $customFieldKey . '">' . $customFieldName . '</label><br/>';
                        echo '<input class="wordpress-store-locator-input-field" name="' . $customFieldKey . '" value="' . $customFieldValue . '" type="text">';
                    echo '</div>';

                }

                echo '</div>';
            }


        echo '</div>';
    }

    /**
     * Display Metabox Address
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function opening()
    {
        global $post, $wordpress_store_locator_options;

        $weekdays = array(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        );

        echo '<div class="wordpress-store-locator-container">';
        $openingHours = array();
        foreach ($weekdays as $weekday) {
            $open = "";
            $close = "";

            if($this->is_new_store() && ($weekday != "Saturday" && $weekday != "Sunday")) {
                $open = $wordpress_store_locator_options['defaultOpen'];
                $close = $wordpress_store_locator_options['defaultClose'];
            } else {
                $open = get_post_meta($post->ID, $this->prefix . $weekday . '_open', true);
                $close = get_post_meta($post->ID, $this->prefix . $weekday . '_close', true);
            }

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . $weekday . '_open">' . esc_html__( $weekday . ' (open)', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . $weekday . '_open" value="' . $open  . '" type="text">';
                echo '</div>';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . $weekday . '_close">' . esc_html__( $weekday . ' (close)', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . $weekday . '_close" value="' . $close  . '" type="text">';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    /**
     * Display Metabox Address
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @return  [type]                       [description]
     */
    public function opening2()
    {
        global $post, $wordpress_store_locator_options;

        $weekdays = array(
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        );

        echo '<div class="wordpress-store-locator-container">';
        $openingHours = array();
        foreach ($weekdays as $weekday) {
            $open = "";
            $close = "";

            if($this->is_new_store() && ($weekday != "Saturday" && $weekday != "Sunday")) {
                $open = $wordpress_store_locator_options['defaultOpen'];
                $close = $wordpress_store_locator_options['defaultClose'];
            } else {
                $open = get_post_meta($post->ID, $this->prefix . $weekday . '_open2', true);
                $close = get_post_meta($post->ID, $this->prefix . $weekday . '_close2', true);
            }

            echo '<div class="wordpress-store-locator-row">';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . $weekday . '_open2">' . esc_html__( $weekday . ' (open)', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . $weekday . '_open2" value="' . $open  . '" type="text">';
                echo '</div>';
                echo '<div class="wordpress-store-locator-col-sm-6">';
                    echo '<label for="' . $this->prefix . $weekday . '_close2">' . esc_html__( $weekday . ' (close)', 'wordpress-store-locator' ) . '</label><br/>';
                    echo '<input class="wordpress-store-locator-input-field" name="' . $this->prefix . $weekday . '_close2" value="' . $close  . '" type="text">';
                echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    /**
     * Save Custom Metaboxes
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://www.welaunch.io
     * @param   [type]                       $post_id [description]
     * @param   [type]                       $post    [description]
     * @return  [type]                                [description]
     */
    public function save_custom_metaboxes($post_id, $post)
    {
        global $wordpress_store_locator_options;

        if($post->post_type !== "stores") {
            return false;
        }

        // Is the user allowed to edit the post or page?
        if (!current_user_can('edit_post', $post->ID)) {
            return $post->ID;
        }

        if ($post->post_type == 'revision') {
            return false;
        }

        if (!isset($_POST['wordpress_store_locator_meta_nonce']) || !wp_verify_nonce($_POST['wordpress_store_locator_meta_nonce'], basename(__FILE__))) {
            return false;
        }

        $possible_inputs = array(
            'wordpress_store_locator_address1',
            'wordpress_store_locator_address2',
            'wordpress_store_locator_zip',
            'wordpress_store_locator_city',
            'wordpress_store_locator_region',
            'wordpress_store_locator_country',
            'wordpress_store_locator_lat',
            'wordpress_store_locator_lng',
            'wordpress_store_locator_meta_nonce',
            'wordpress_store_locator_telephone',
            'wordpress_store_locator_mobile',
            'wordpress_store_locator_fax',
            'wordpress_store_locator_chat',
            'wordpress_store_locator_email',
            'wordpress_store_locator_email_placeholder',
            'wordpress_store_locator_website',
            'wordpress_store_locator_premium',
            'wordpress_store_locator_online',
            'wordpress_store_locator_offline',
            'wordpress_store_locator_ranking',
            'wordpress_store_locator_icon',
            'wordpress_store_locator_customerId',

            // Opening Hours 1
            'wordpress_store_locator_Monday_open',
            'wordpress_store_locator_Monday_close',
            'wordpress_store_locator_Tuesday_open',
            'wordpress_store_locator_Tuesday_close',
            'wordpress_store_locator_Wednesday_open',
            'wordpress_store_locator_Wednesday_close',
            'wordpress_store_locator_Thursday_open',
            'wordpress_store_locator_Thursday_close',
            'wordpress_store_locator_Friday_open',
            'wordpress_store_locator_Friday_close',
            'wordpress_store_locator_Saturday_open',
            'wordpress_store_locator_Saturday_close',
            'wordpress_store_locator_Sunday_open',
            'wordpress_store_locator_Sunday_close',

            // Opening Hours 2
            'wordpress_store_locator_Monday_open2',
            'wordpress_store_locator_Monday_close2',
            'wordpress_store_locator_Tuesday_open2',
            'wordpress_store_locator_Tuesday_close2',
            'wordpress_store_locator_Wednesday_open2',
            'wordpress_store_locator_Wednesday_close2',
            'wordpress_store_locator_Thursday_open2',
            'wordpress_store_locator_Thursday_close2',
            'wordpress_store_locator_Friday_open2',
            'wordpress_store_locator_Friday_close2',
            'wordpress_store_locator_Saturday_open2',
            'wordpress_store_locator_Saturday_close2',
            'wordpress_store_locator_Sunday_open2',
            'wordpress_store_locator_Sunday_close2',
        );

        $customFields = $wordpress_store_locator_options['showCustomFields'];
        if(!empty($customFields)) {
            foreach ($customFields as $customFieldKey => $customFieldName) {
                $possible_inputs[] = $this->prefix . $customFieldKey;
            }
        }

        // Add values of $ticket_meta as custom fields
        foreach ($possible_inputs as $possible_input) {
            $val = isset($_POST[$possible_input]) ? $_POST[$possible_input] : '';

            if(empty($val) && !in_array($possible_input, array('wordpress_store_locator_premium', 'wordpress_store_locator_online', 'wordpress_store_locator_offline', 'wordpress_store_locator_ranking'))) {
                delete_post_meta($post->ID, $possible_input);    
                continue;
            }
            update_post_meta($post->ID, $possible_input, $val);
        }
    }

    private function is_new_store()
    {
        global $pagenow;

        if (!is_admin()) return false;

        return in_array( $pagenow, array( 'post-new.php' ) );
    }

    private function get_countries()
    {
        $countries = array( 
            "AF" => esc_html__("Afghanistan", 'wordpress-store-locator'),"AL" => esc_html__("Albania", 'wordpress-store-locator'),"DZ" => esc_html__("Algeria", 'wordpress-store-locator'),"AS" => esc_html__("American Samoa", 'wordpress-store-locator'),"AD" => esc_html__("Andorra", 'wordpress-store-locator'),"AO" => esc_html__("Angola", 'wordpress-store-locator'),"AI" => esc_html__("Anguilla", 'wordpress-store-locator'),"AQ" => esc_html__("Antarctica", 'wordpress-store-locator'),"AG" => esc_html__("Antigua and Barbuda", 'wordpress-store-locator'),"AR" => esc_html__("Argentina", 'wordpress-store-locator'),"AM" => esc_html__("Armenia", 'wordpress-store-locator'),"AW" => esc_html__("Aruba", 'wordpress-store-locator'),"AU" => esc_html__("Australia", 'wordpress-store-locator'),"AT" => esc_html__("Austria", 'wordpress-store-locator'),"AZ" => esc_html__("Azerbaijan", 'wordpress-store-locator'),"BS" => esc_html__("Bahamas", 'wordpress-store-locator'),"BH" => esc_html__("Bahrain", 'wordpress-store-locator'),"BD" => esc_html__("Bangladesh", 'wordpress-store-locator'),"BB" => esc_html__("Barbados", 'wordpress-store-locator'),"BY" => esc_html__("Belarus", 'wordpress-store-locator'),"BE" => esc_html__("Belgium", 'wordpress-store-locator'),"BZ" => esc_html__("Belize", 'wordpress-store-locator'),"BJ" => esc_html__("Benin", 'wordpress-store-locator'),"BM" => esc_html__("Bermuda", 'wordpress-store-locator'),"BT" => esc_html__("Bhutan", 'wordpress-store-locator'),"BO" => esc_html__("Bolivia", 'wordpress-store-locator'),"BA" => esc_html__("Bosnia and Herzegovina", 'wordpress-store-locator'),"BW" => esc_html__("Botswana", 'wordpress-store-locator'),"BV" => esc_html__("Bouvet Island", 'wordpress-store-locator'),"BR" => esc_html__("Brazil", 'wordpress-store-locator'),"BQ" => esc_html__("British Antarctic Territory", 'wordpress-store-locator'),"IO" => esc_html__("British Indian Ocean Territory", 'wordpress-store-locator'),"VG" => esc_html__("British Virgin Islands", 'wordpress-store-locator'),"BN" => esc_html__("Brunei", 'wordpress-store-locator'),"BG" => esc_html__("Bulgaria", 'wordpress-store-locator'),"BF" => esc_html__("Burkina Faso", 'wordpress-store-locator'),"BI" => esc_html__("Burundi", 'wordpress-store-locator'),"KH" => esc_html__("Cambodia", 'wordpress-store-locator'),"CM" => esc_html__("Cameroon", 'wordpress-store-locator'),"CA" => esc_html__("Canada", 'wordpress-store-locator'),"CT" => esc_html__("Canton and Enderbury Islands", 'wordpress-store-locator'),"CV" => esc_html__("Cape Verde", 'wordpress-store-locator'),"KY" => esc_html__("Cayman Islands", 'wordpress-store-locator'),"CF" => esc_html__("Central African Republic", 'wordpress-store-locator'),"TD" => esc_html__("Chad", 'wordpress-store-locator'),"CL" => esc_html__("Chile", 'wordpress-store-locator'),"CN" => esc_html__("China", 'wordpress-store-locator'),"CX" => esc_html__("Christmas Island", 'wordpress-store-locator'),"CC" => esc_html__("Cocos [Keeling] Islands", 'wordpress-store-locator'),"CO" => esc_html__("Colombia", 'wordpress-store-locator'),"KM" => esc_html__("Comoros", 'wordpress-store-locator'),"CG" => esc_html__("Congo - Brazzaville", 'wordpress-store-locator'),"CD" => esc_html__("Congo - Kinshasa", 'wordpress-store-locator'),"CK" => esc_html__("Cook Islands", 'wordpress-store-locator'),"CR" => esc_html__("Costa Rica", 'wordpress-store-locator'),"HR" => esc_html__("Croatia", 'wordpress-store-locator'),"CU" => esc_html__("Cuba", 'wordpress-store-locator'),"CY" => esc_html__("Cyprus", 'wordpress-store-locator'),"CZ" => esc_html__("Czech Republic", 'wordpress-store-locator'),"CI" => esc_html__("Côte d’Ivoire", 'wordpress-store-locator'),"DK" => esc_html__("Denmark", 'wordpress-store-locator'),"DJ" => esc_html__("Djibouti", 'wordpress-store-locator'),"DM" => esc_html__("Dominica", 'wordpress-store-locator'),"DO" => esc_html__("Dominican Republic", 'wordpress-store-locator'),"NQ" => esc_html__("Dronning Maud Land", 'wordpress-store-locator'),"DD" => esc_html__("East Germany", 'wordpress-store-locator'),"EC" => esc_html__("Ecuador", 'wordpress-store-locator'),"EG" => esc_html__("Egypt", 'wordpress-store-locator'),"SV" => esc_html__("El Salvador", 'wordpress-store-locator'),"GQ" => esc_html__("Equatorial Guinea", 'wordpress-store-locator'),"ER" => esc_html__("Eritrea", 'wordpress-store-locator'),"EE" => esc_html__("Estonia", 'wordpress-store-locator'),"ET" => esc_html__("Ethiopia", 'wordpress-store-locator'),"FK" => esc_html__("Falkland Islands", 'wordpress-store-locator'),"FO" => esc_html__("Faroe Islands", 'wordpress-store-locator'),"FJ" => esc_html__("Fiji", 'wordpress-store-locator'),"FI" => esc_html__("Finland", 'wordpress-store-locator'),"FR" => esc_html__("France", 'wordpress-store-locator'),"GF" => esc_html__("French Guiana", 'wordpress-store-locator'),"PF" => esc_html__("French Polynesia", 'wordpress-store-locator'),"TF" => esc_html__("French Southern Territories", 'wordpress-store-locator'),"FQ" => esc_html__("French Southern and Antarctic Territories", 'wordpress-store-locator'),"GA" => esc_html__("Gabon", 'wordpress-store-locator'),"GM" => esc_html__("Gambia", 'wordpress-store-locator'),"GE" => esc_html__("Georgia", 'wordpress-store-locator'),"DE" => esc_html__("Germany", 'wordpress-store-locator'),"GH" => esc_html__("Ghana", 'wordpress-store-locator'),"GI" => esc_html__("Gibraltar", 'wordpress-store-locator'),"GR" => esc_html__("Greece", 'wordpress-store-locator'),"GL" => esc_html__("Greenland", 'wordpress-store-locator'),"GD" => esc_html__("Grenada", 'wordpress-store-locator'),"GP" => esc_html__("Guadeloupe", 'wordpress-store-locator'),"GU" => esc_html__("Guam", 'wordpress-store-locator'),"GT" => esc_html__("Guatemala", 'wordpress-store-locator'),"GG" => esc_html__("Guernsey", 'wordpress-store-locator'),"GN" => esc_html__("Guinea", 'wordpress-store-locator'),"GW" => esc_html__("Guinea-Bissau", 'wordpress-store-locator'),"GY" => esc_html__("Guyana", 'wordpress-store-locator'),"HT" => esc_html__("Haiti", 'wordpress-store-locator'),"HM" => esc_html__("Heard Island and McDonald Islands", 'wordpress-store-locator'),"HN" => esc_html__("Honduras", 'wordpress-store-locator'),"HK" => esc_html__("Hong Kong SAR China", 'wordpress-store-locator'),"HU" => esc_html__("Hungary", 'wordpress-store-locator'),"IS" => esc_html__("Iceland", 'wordpress-store-locator'),"IN" => esc_html__("India", 'wordpress-store-locator'),"ID" => esc_html__("Indonesia", 'wordpress-store-locator'),"IR" => esc_html__("Iran", 'wordpress-store-locator'),"IQ" => esc_html__("Iraq", 'wordpress-store-locator'),"IE" => esc_html__("Ireland", 'wordpress-store-locator'),"IM" => esc_html__("Isle of Man", 'wordpress-store-locator'),"IL" => esc_html__("Israel", 'wordpress-store-locator'),"IT" => esc_html__("Italy", 'wordpress-store-locator'),"JM" => esc_html__("Jamaica", 'wordpress-store-locator'),"JP" => esc_html__("Japan", 'wordpress-store-locator'),"JE" => esc_html__("Jersey", 'wordpress-store-locator'),"JT" => esc_html__("Johnston Island", 'wordpress-store-locator'),"JO" => esc_html__("Jordan", 'wordpress-store-locator'),"KZ" => esc_html__("Kazakhstan", 'wordpress-store-locator'),"KE" => esc_html__("Kenya", 'wordpress-store-locator'),"KI" => esc_html__("Kiribati", 'wordpress-store-locator'),"KW" => esc_html__("Kuwait", 'wordpress-store-locator'),"KG" => esc_html__("Kyrgyzstan", 'wordpress-store-locator'),"LA" => esc_html__("Laos", 'wordpress-store-locator'),"LV" => esc_html__("Latvia", 'wordpress-store-locator'),"LB" => esc_html__("Lebanon", 'wordpress-store-locator'),"LS" => esc_html__("Lesotho", 'wordpress-store-locator'),"LR" => esc_html__("Liberia", 'wordpress-store-locator'),"LY" => esc_html__("Libya", 'wordpress-store-locator'),"LI" => esc_html__("Liechtenstein", 'wordpress-store-locator'),"LT" => esc_html__("Lithuania", 'wordpress-store-locator'),"LU" => esc_html__("Luxembourg", 'wordpress-store-locator'),"MO" => esc_html__("Macau SAR China", 'wordpress-store-locator'),"MK" => esc_html__("Macedonia", 'wordpress-store-locator'),"MG" => esc_html__("Madagascar", 'wordpress-store-locator'),"MW" => esc_html__("Malawi", 'wordpress-store-locator'),"MY" => esc_html__("Malaysia", 'wordpress-store-locator'),"MV" => esc_html__("Maldives", 'wordpress-store-locator'),"ML" => esc_html__("Mali", 'wordpress-store-locator'),"MT" => esc_html__("Malta", 'wordpress-store-locator'),"MH" => esc_html__("Marshall Islands", 'wordpress-store-locator'),"MQ" => esc_html__("Martinique", 'wordpress-store-locator'),"MR" => esc_html__("Mauritania", 'wordpress-store-locator'),"MU" => esc_html__("Mauritius", 'wordpress-store-locator'),"YT" => esc_html__("Mayotte", 'wordpress-store-locator'),"FX" => esc_html__("Metropolitan France", 'wordpress-store-locator'),"MX" => esc_html__("Mexico", 'wordpress-store-locator'),"FM" => esc_html__("Micronesia", 'wordpress-store-locator'),"MI" => esc_html__("Midway Islands", 'wordpress-store-locator'),"MD" => esc_html__("Moldova", 'wordpress-store-locator'),"MC" => esc_html__("Monaco", 'wordpress-store-locator'),"MN" => esc_html__("Mongolia", 'wordpress-store-locator'),"ME" => esc_html__("Montenegro", 'wordpress-store-locator'),"MS" => esc_html__("Montserrat", 'wordpress-store-locator'),"MA" => esc_html__("Morocco", 'wordpress-store-locator'),"MZ" => esc_html__("Mozambique", 'wordpress-store-locator'),"MM" => esc_html__("Myanmar [Burma]", 'wordpress-store-locator'),"NA" => esc_html__("Namibia", 'wordpress-store-locator'),"NR" => esc_html__("Nauru", 'wordpress-store-locator'),"NP" => esc_html__("Nepal", 'wordpress-store-locator'),"NL" => esc_html__("Netherlands", 'wordpress-store-locator'),"AN" => esc_html__("Netherlands Antilles", 'wordpress-store-locator'),"NT" => esc_html__("Neutral Zone", 'wordpress-store-locator'),"NC" => esc_html__("New Caledonia", 'wordpress-store-locator'),"NZ" => esc_html__("New Zealand", 'wordpress-store-locator'),"NI" => esc_html__("Nicaragua", 'wordpress-store-locator'),"NE" => esc_html__("Niger", 'wordpress-store-locator'),"NG" => esc_html__("Nigeria", 'wordpress-store-locator'),"NU" => esc_html__("Niue", 'wordpress-store-locator'),"NF" => esc_html__("Norfolk Island", 'wordpress-store-locator'),"KP" => esc_html__("North Korea", 'wordpress-store-locator'),"VD" => esc_html__("North Vietnam", 'wordpress-store-locator'),"MP" => esc_html__("Northern Mariana Islands", 'wordpress-store-locator'),"NO" => esc_html__("Norway", 'wordpress-store-locator'),"OM" => esc_html__("Oman", 'wordpress-store-locator'),"PC" => esc_html__("Pacific Islands Trust Territory", 'wordpress-store-locator'),"PK" => esc_html__("Pakistan", 'wordpress-store-locator'),"PW" => esc_html__("Palau", 'wordpress-store-locator'),"PS" => esc_html__("Palestinian Territories", 'wordpress-store-locator'),"PA" => esc_html__("Panama", 'wordpress-store-locator'),"PZ" => esc_html__("Panama Canal Zone", 'wordpress-store-locator'),"PG" => esc_html__("Papua New Guinea", 'wordpress-store-locator'),"PY" => esc_html__("Paraguay", 'wordpress-store-locator'),"YD" => esc_html__("People's Democratic Republic of Yemen", 'wordpress-store-locator'),"PE" => esc_html__("Peru", 'wordpress-store-locator'),"PH" => esc_html__("Philippines", 'wordpress-store-locator'),"PN" => esc_html__("Pitcairn Islands", 'wordpress-store-locator'),"PL" => esc_html__("Poland", 'wordpress-store-locator'),"PT" => esc_html__("Portugal", 'wordpress-store-locator'),"PR" => esc_html__("Puerto Rico", 'wordpress-store-locator'),"QA" => esc_html__("Qatar", 'wordpress-store-locator'),"RO" => esc_html__("Romania", 'wordpress-store-locator'),"RU" => esc_html__("Russia", 'wordpress-store-locator'),"RW" => esc_html__("Rwanda", 'wordpress-store-locator'),"RE" => esc_html__("Réunion", 'wordpress-store-locator'),"BL" => esc_html__("Saint Barthélemy", 'wordpress-store-locator'),"SH" => esc_html__("Saint Helena", 'wordpress-store-locator'),"KN" => esc_html__("Saint Kitts and Nevis", 'wordpress-store-locator'),"LC" => esc_html__("Saint Lucia", 'wordpress-store-locator'),"MF" => esc_html__("Saint Martin", 'wordpress-store-locator'),"PM" => esc_html__("Saint Pierre and Miquelon", 'wordpress-store-locator'),"VC" => esc_html__("Saint Vincent and the Grenadines", 'wordpress-store-locator'),"WS" => esc_html__("Samoa", 'wordpress-store-locator'),"SM" => esc_html__("San Marino", 'wordpress-store-locator'),"SA" => esc_html__("Saudi Arabia", 'wordpress-store-locator'),"SN" => esc_html__("Senegal", 'wordpress-store-locator'),"RS" => esc_html__("Serbia", 'wordpress-store-locator'),"CS" => esc_html__("Serbia and Montenegro", 'wordpress-store-locator'),"SC" => esc_html__("Seychelles", 'wordpress-store-locator'),"SL" => esc_html__("Sierra Leone", 'wordpress-store-locator'),"SG" => esc_html__("Singapore", 'wordpress-store-locator'),"SK" => esc_html__("Slovakia", 'wordpress-store-locator'),"SI" => esc_html__("Slovenia", 'wordpress-store-locator'),"SB" => esc_html__("Solomon Islands", 'wordpress-store-locator'),"SO" => esc_html__("Somalia", 'wordpress-store-locator'),"ZA" => esc_html__("South Africa", 'wordpress-store-locator'),"GS" => esc_html__("South Georgia and the South Sandwich Islands", 'wordpress-store-locator'),"KR" => esc_html__("South Korea", 'wordpress-store-locator'),"ES" => esc_html__("Spain", 'wordpress-store-locator'),"LK" => esc_html__("Sri Lanka", 'wordpress-store-locator'),"SD" => esc_html__("Sudan", 'wordpress-store-locator'),"SR" => esc_html__("Suriname", 'wordpress-store-locator'),"SJ" => esc_html__("Svalbard and Jan Mayen", 'wordpress-store-locator'),"SZ" => esc_html__("Swaziland", 'wordpress-store-locator'),"SE" => esc_html__("Sweden", 'wordpress-store-locator'),"CH" => esc_html__("Switzerland", 'wordpress-store-locator'),"SY" => esc_html__("Syria", 'wordpress-store-locator'),"ST" => esc_html__("São Tomé and Príncipe", 'wordpress-store-locator'),"TW" => esc_html__("Taiwan", 'wordpress-store-locator'),"TJ" => esc_html__("Tajikistan", 'wordpress-store-locator'),"TZ" => esc_html__("Tanzania", 'wordpress-store-locator'),"TH" => esc_html__("Thailand", 'wordpress-store-locator'),"TL" => esc_html__("Timor-Leste", 'wordpress-store-locator'),"TG" => esc_html__("Togo", 'wordpress-store-locator'),"TK" => esc_html__("Tokelau", 'wordpress-store-locator'),"TO" => esc_html__("Tonga", 'wordpress-store-locator'),"TT" => esc_html__("Trinidad and Tobago", 'wordpress-store-locator'),"TN" => esc_html__("Tunisia", 'wordpress-store-locator'),"TR" => esc_html__("Turkey", 'wordpress-store-locator'),"TM" => esc_html__("Turkmenistan", 'wordpress-store-locator'),"TC" => esc_html__("Turks and Caicos Islands", 'wordpress-store-locator'),"TV" => esc_html__("Tuvalu", 'wordpress-store-locator'),"UM" => esc_html__("U.S. Minor Outlying Islands", 'wordpress-store-locator'),"PU" => esc_html__("U.S. Miscellaneous Pacific Islands", 'wordpress-store-locator'),"VI" => esc_html__("U.S. Virgin Islands", 'wordpress-store-locator'),"UG" => esc_html__("Uganda", 'wordpress-store-locator'),"UA" => esc_html__("Ukraine", 'wordpress-store-locator'),"SU" => esc_html__("Union of Soviet Socialist Republics", 'wordpress-store-locator'),"AE" => esc_html__("United Arab Emirates", 'wordpress-store-locator'),"GB" => esc_html__("United Kingdom", 'wordpress-store-locator'),"US" => esc_html__("United States", 'wordpress-store-locator'),"ZZ" => esc_html__("Unknown or Invalid Region", 'wordpress-store-locator'),"UY" => esc_html__("Uruguay", 'wordpress-store-locator'),"UZ" => esc_html__("Uzbekistan", 'wordpress-store-locator'),"VU" => esc_html__("Vanuatu", 'wordpress-store-locator'),"VA" => esc_html__("Vatican City", 'wordpress-store-locator'),"VE" => esc_html__("Venezuela", 'wordpress-store-locator'),"VN" => esc_html__("Vietnam", 'wordpress-store-locator'),"WK" => esc_html__("Wake Island", 'wordpress-store-locator'),"WF" => esc_html__("Wallis and Futuna", 'wordpress-store-locator'),"EH" => esc_html__("Western Sahara", 'wordpress-store-locator'),"YE" => esc_html__("Yemen", 'wordpress-store-locator'),"ZM" => esc_html__("Zambia", 'wordpress-store-locator'),"ZW" => esc_html__("Zimbabwe", 'wordpress-store-locator'),"AX" => esc_html__("Åland Islands", 'wordpress-store-locator'));

        return $countries;
    }

    /**
     * Join postmeta in admin stores search
     *
     * @return string SQL join
     */
    public function admin_meta_search_join($join)
    {
        global $pagenow, $wpdb;
        if ( is_admin() && $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'stores' && ! empty( $_GET['s'] ) ) {
            $join .= 'LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
        }
        return $join;
    }

    /**
     * Filtering the where clause in admin stores search query
     *
     * @return string SQL WHERE
     */
    function admin_meta_search_where( $where ){
        global $pagenow, $wpdb;
        if ( is_admin() && $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] == 'stores' && ! empty( $_GET['s'] ) ) {
            $where = preg_replace(
           "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
           "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where );
        }
        return $where;
    }


    /**
     * Limit by one
     *
     * @return string SQL WHERE
     */    
    function admin_meta_search_limits($groupby) {
        global $pagenow, $wpdb;
        if ( is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type']=='stores' && isset($_GET['s']) && $_GET['s'] != '' ) {
            $groupby = "$wpdb->posts.ID";
        }
        return $groupby;
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
}