<?php

    global $wpdb;

    if ( ! class_exists( 'weLaunch' ) && ! class_exists( 'Redux' ) ) {
        return;
    }

    if( class_exists( 'weLaunch' ) ) {
        $framework = new weLaunch();
    } else {
        $framework = new Redux();
    }

    $weekdays = array(
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    );

    $store_categories = array();
    if(isset($_GET['page']) && $_GET['page'] == "wordpress_store_locator_options_options") {
        // Get Store categories
        $sql = "SELECT *
        FROM " . $wpdb->prefix . "term_relationships
        LEFT JOIN " . $wpdb->prefix . "term_taxonomy
           ON (" . $wpdb->prefix . "term_relationships.term_taxonomy_id = " . $wpdb->prefix . "term_taxonomy.term_taxonomy_id)
        LEFT JOIN " . $wpdb->prefix . "terms on " . $wpdb->prefix . "term_taxonomy.term_taxonomy_id = " . $wpdb->prefix . "terms.term_id
        WHERE " . $wpdb->prefix . "term_taxonomy.taxonomy = 'store_category'
        GROUP BY " . $wpdb->prefix . "term_taxonomy.term_id";

        $store_categories = $wpdb->get_results($sql);
        $temp = array('' => 'None');
        foreach ($store_categories as $store_category) {
            $temp[$store_category->term_id] = $store_category->name;
        }
        $store_categories = $temp;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "wordpress_store_locator_options";

    $args = array(
        'opt_name' => 'wordpress_store_locator_options',
        'use_cdn' => TRUE,
        'dev_mode' => FALSE,
        'display_name' => __('WordPress Store Locator', 'wordpress-store-locator'),
        'display_version' => '2.2.1',
        'page_title' => __('WordPress Store Locator', 'wordpress-store-locator'),
        'update_notice' => TRUE,
        'intro_text' => '',
        'footer_text' => '&copy; '.date('Y').' weLaunch',
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => __('Settings', 'wordpress-store-locator'),
        'allow_sub_menu' => TRUE,
        'page_parent' => 'edit.php?post_type=stores',
        'page_parent_post_type' => 'stores',
        'customizer' => FALSE,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    global $weLaunchLicenses;
    if( (isset($weLaunchLicenses['wordpress-store-locator']) && !empty($weLaunchLicenses['wordpress-store-locator'])) ) {
        $args['display_name'] = '<span class="dashicons dashicons-yes-alt" style="color: #9CCC65 !important;"></span> ' . $args['display_name'];
    } else {
        $args['display_name'] = '<span class="dashicons dashicons-dismiss" style="color: #EF5350 !important;"></span> ' . $args['display_name'];
    }

    $framework::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */


    $framework::setSection( $opt_name, array(
        'title'  => __( 'Store Locator', 'wordpress-store-locator' ),
        'id'     => 'general',
        'desc'   => __( 'Need support? Please use the comment function on codecanyon.', 'wordpress-store-locator' ),
        'icon'   => 'el el-home',
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'General', 'wordpress-store-locator' ),
        'desc'       => __( 'To get auto updates please <a href="' . admin_url('tools.php?page=welaunch-framework') . '">register your License here</a>.', 'wordpress-store-locator' ),
        'id'         => 'general-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'enable',
                'type'     => 'switch',
                'title'    => __( 'Enable', 'wordpress-store-locator' ),
                'subtitle' => __( 'Enable store locator.', 'wordpress-store-locator' ),
                'default'  => '1',
            ),
            array(
                'id'       => 'apiKey',
                'type'     => 'text',
                'title'    => __( 'Google Api Key', 'wordpress-store-locator' ),
                'subtitle' => __( 'No key? <a href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">Get it now!</a>', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'serverApiKey',
                'type'     => 'text',
                'title'    => __( 'Google Api Key (Server Side)', 'wordpress-store-locator' ),
                'subtitle' => __( 'This will be used to fetch Lat / Lng when you import stores. It should not be your public key and have no http heder restrictions!', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'buttonModalTitle',
                'type'     => 'text',
                'title'    => __('Store locator Title', 'wordpress-store-locator'),
                'subtitle' => __('The title of the Store locator', 'wordpress-store-locator'),
                'default'  => 'Find in Store',
            ),
            array(
                'id'       => 'excel2007',
                'type'     => 'checkbox',
                'title'    => __( 'Use Excel 2007', 'wordpress-store-locator' ),
                'subtitle' => __( 'If you can not work with xlsx (Excel 2007 and higher) files, check this. You then can work with normal .xls files.', 'wordpress-store-locator' ),
                'default'  => '0',
            ),
            array(
                'id'   => 'importer',
                'type' => 'info',
                'desc' => __('<div style="text-align:center;">
                    <p>To import stores use the template you get when clicking on "Get Sample Import File" button below. If you want to fetch lat / lng automatically make sure you set a server side API key above.</p>
                    <a href="' . get_admin_url() . 'edit.php?post_type=stores&page=wordpress-store-locator-exporter" class="button button-success">Export Stores</a>
                    <a href="' . get_admin_url() . 'edit.php?post_type=stores&page=wordpress-store-locator-importer" class="button button-primary">Import Stores</a>  
                    <a href="' . get_admin_url() . 'edit.php?post_type=stores&page=wordpress_store_locator_options_options&get-import-file" class="button button-primary">Get Sample Import File</a>
                    <a id="delete-stores" href="' . get_admin_url() . 'edit.php?post_type=stores&page=wordpress_store_locator_options_options&delete-stores" class="button button-danger">Delete all Stores</a> 
                    </div>', 'wordpress-store-locator')
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Layout', 'wordpress-store-locator' ),
        // 'desc'       => __( '', 'wordpress-store-locator' ),
        'id'         => 'layout-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'layout',
                'type'     => 'image_select',
                'title'    => __( 'Select Layout', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Select a general layout. Under advanced settings you can cusotmize the layout on an advanced level.', 'wordpress-store-locator' ),
                'options'  => array(
                    '1'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/1.jpg'),
                    '2'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/2.jpg'),
                    '3'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/3.jpg'),
                    '4'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/4.jpg'),
                    '5'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/5.jpg'),
                    '6'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/6.jpg'),
                    '7'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/7.jpg'),
                    '8'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/8.jpg'),
                    '9'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/9.jpg'),
                    '10'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/10.jpg'),
                    '11'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/11.jpg'),
                    '12'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/12.jpg'),
                    '13'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/13.jpg'),
                    '14'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/14.png'),
                    '15'      => array('img'   => plugin_dir_url( __FILE__ ) . 'img/15.jpg'),
                ),
                'default' => '1',
            ),

            array(
                'id'       => 'advancedLayout',
                'type'     => 'checkbox',
                'title'    => __( 'Advanced Layout', 'wordpress-store-locator' ),
                'subtitle' => __( 'Check this to customize the layout yourself.', 'wordpress-store-locator' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'searchBoxColumns',
                'type'     => 'spinner',
                'title'    => __( 'Search Box Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '6',
                'required' => array('advancedLayout','equals','1'),
            ),
            array(
                'id'       => 'resultListColumns',
                'type'     => 'spinner',
                'title'    => __( 'Result List Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '3',
                'required' => array('advancedLayout','equals','1'),
            ),
            array(
                'id'       => 'mapColumns',
                'type'     => 'spinner',
                'title'    => __( 'Map Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '9',
                'required' => array('advancedLayout','equals','1'),
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Map', 'wordpress-store-locator' ),
        'desc'       => __( 'Default Map Settings', 'wordpress-store-locator' ),
        'id'         => 'map',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mapEnabled',
                'type'     => 'switch',
                'title'    => __( 'Enable Map', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'mapAutoHeight',
                'type'     => 'checkbox',
                'title'    => __( 'Map Auto Height', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Will set the map height automatically based on sidebar (search + result list) height.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'mapHeight',
                'type'     => 'spinner',
                'title'    => __( 'Map Height', 'wordpress-store-locator' ),
                'subtitle' => __( 'Set a map height.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '99999999',
                'default' => '400',
                'required' => array('mapAutoHeight','equals','0'),
            ),
            array(
                'id'       => 'mapFullHeight',
                'type'     => 'checkbox',
                'title'    => __( 'Full Height Map', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDistanceUnit',
                'type'     => 'select',
                'title'    => __( 'Distance Unit', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the Distance Unit.', 'wordpress-store-locator' ),
                'options'  => array(
                    'km' => __('Kilometer (KM)', 'wordpress-store-locator'),
                    'mi' => __('Miles', 'wordpress-store-locator'),
                ),
                'default' => 'km',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultLat',
                'type'     => 'text',
                'title'    => __( 'Default Latitude', 'wordpress-store-locator' ),
                'default'  => '48.8620722',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultLng',
                'type'     => 'text',
                'title'    => __( 'Default Longitude', 'wordpress-store-locator' ),
                'default'  => '41.352047',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultType',
                'type'     => 'select',
                'title'    => __( 'Default Map Type', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the default Map Type.', 'wordpress-store-locator' ),
                'options'  => array(
                    'ROADMAP' => __('Roadmap', 'wordpress-store-locator'),
                    'SATELLITE' => __('Satellite', 'wordpress-store-locator'),
                    'HYBRID' => __('Hybrid', 'wordpress-store-locator'),
                    'TERRAIN' => __('Terrain', 'wordpress-store-locator'),
                ),
                'default' => 'ROADMAP',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultZoom',
                'type'     => 'spinner',
                'title'    => __( 'Default Map Zoom', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the default Zoom Level.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '16',
                'default' => '10',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapRadiusSteps',
                'type'     => 'text',
                'title'    => __( 'Radius Select Steps', 'wordpress-store-locator' ),
                'subtitle' => __( 'Split the values by comma.', 'wordpress-store-locator' ),
                'default' => '5,10,25,50,100',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapRadius',
                'type'     => 'spinner',
                'title'    => __( 'Default Radius', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the default Radius. The default value must be available in the radius steps above.', 'wordpress-store-locator' ),
                'default' => '25',
                'min'      => '1',
                'step'     => '5',
                'max'      => '9999',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDrawRadiusCircle',
                'type'     => 'checkbox',
                'title'    => __( 'Draw Radius Circle', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Disable this to disable the automatic zoom level adjustments based on radius.', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('mapEnabled','equals','1'),
            ),
                array(
                    'id'     =>'mapDrawRadiusCircleFillColor',
                    'type'  => 'color',
                    'title' => __('Radius Circle Fill Color', 'wordpress-store-locator'), 
                    'validate' => 'color',
                    'default' => '#004de8',
                    'required' => array('mapDrawRadiusCircle','equals','1'),
                ),
                array(
                    'id'       => 'mapDrawRadiusCircleFillOpacity',
                    'type'     => 'spinner',
                    'title'    => __( 'Radius Circle Fill Opacity', 'wordpress-store-locator' ),
                    'default' => '27',
                    'min'      => '0',
                    'step'     => '1',
                    'max'      => '100',
                    'required' => array('mapDrawRadiusCircle','equals','1'),
                ),
                array(
                    'id'     =>'mapDrawRadiusCircleStrokeColor',
                    'type'  => 'color',
                    'title' => __('Radius Circle Stroke Color', 'wordpress-store-locator'), 
                    'validate' => 'color',
                    'default' => '#004de8',
                    'required' => array('mapDrawRadiusCircle','equals','1'),
                ),
                array(
                    'id'       => 'mapDrawRadiusCircleStrokeOpacity',
                    'type'     => 'spinner',
                    'title'    => __( 'Radius Circle Stroke Opacity', 'wordpress-store-locator' ),
                    'default' => '62',
                    'min'      => '0',
                    'step'     => '1',
                    'max'      => '100',
                    'required' => array('mapDrawRadiusCircle','equals','1'),
                ),
            array(
                'id'       => 'mapRadiusToZoom',
                'type'     => 'checkbox',
                'title'    => __( 'Adjust zoom level to Radius automatically', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('mapDrawRadiusCircle','equals','0'),
            ),
            array(
                'id'       => 'mapExtendRadius',
                'type'     => 'checkbox',
                'title'    => __( 'Extend map radius.', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Automatically extend the search radius if no stores were found.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapPanToOnHover',
                'type'     => 'checkbox',
                'title'    => __( 'Pan to Marker on Mouse Hover.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapMarkerClusterer',
                'type'     => 'checkbox',
                'title'    => __( 'Enable Marker Clusterer.', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Use this when you have many stores on the same location.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
                array(
                    'id'       => 'mapMarkerClustererMaxZoom',
                    'type'     => 'spinner',
                    'title'    => __( 'Marker Cluster Max Zoom Level', 'wordpress-store-locator' ),
                    'min'      => '-1',
                    'step'     => '1',
                    'max'      => '16',
                    'default'  => '-1',
                    'required' => array('mapMarkerClusterer','equals','1'),
                ),
                array(
                    'id'       => 'mapMarkerClustererSize',
                    'type'     => 'spinner',
                    'title'    => __( 'Marker Cluster Size', 'wordpress-store-locator' ),
                    'min'      => '-1',
                    'step'     => '1',
                    'max'      => '999',
                    'default'  => '-1',
                    'required' => array('mapMarkerClusterer','equals','1'),
                ),

            array(
                'id'       => 'mapDefaultIcon',
                'type'     => 'text',
                'title'    => __( 'Default Store Icon', 'wordpress-store-locator' ),
                'default'  => 'https://maps.google.com/mapfiles/marker_grey.png',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultIconHover',
                'type'     => 'text',
                'title'    => __( 'Default Store Icon on Hover', 'wordpress-store-locator' ),
                'default'  => 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDefaultUserIcon',
                'type'     => 'text',
                'title'    => __( 'Default User / Home Icon', 'wordpress-store-locator' ),
                'default'  => 'https://demos.welaunch.io/wordpress-store-locator/wp-content/uploads/sites/11/2021/03/home2.png',
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDisablePanControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Pan Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDisableZoomControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Zoom Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),
            array(
                'id'       => 'mapDisableScaleControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Scale Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),    
            array(
                'id'       => 'mapDisableStreetViewControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable StreetView Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),  
            array(
                'id'       => 'mapDisableFullscreenControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Fullscreen Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),  
            array(
                'id'       => 'mapDisableMapTypeControl',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Map Type Control', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('mapEnabled','equals','1'),
            ),  
            array(
                'id'       => 'mapStyling',
                'type'     => 'ace_editor',
                'mode'     => 'json',
                'title'    => __( 'Map Styling (JSON format)', 'wordpress-store-locator' ),
                'subtitle' => __( 'You can use <a href="https://mapstyle.withgoogle.com" target="_blank">https://mapstyle.withgoogle.com</a> OR <a href="https://snazzymaps.com" target="_blank">https://snazzymaps.com</a> for that.'),
                'default'  => '',
                'required' => array('mapEnabled','equals','1'),
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Infowindow ', 'wordpress-store-locator' ),
        'desc'       => __( 'Maps Infowindow settings', 'wordpress-store-locator' ),
        'id'         => 'infowindow',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'infowindowEnabled',
                'type'     => 'switch',
                'title'    => __( 'Enable Infowindow', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'infowindowCheckClosed',
                'type'     => 'checkbox',
                'title'    => __( 'Check if Infowindow is closed', 'wordpress-store-locator' ),
                'subtitle'    => __( 'This prevents infowindow twiches when hovering on a map icon again.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowOpenOnMouseover',
                'type'     => 'checkbox',
                'title'    => __( 'Open Infowindow on Mouseover', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Open the infowindow when a user hover over the marker.', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowLinkAction',
                'type'     => 'select',
                'title'    => __( 'Store Link Action', 'wordpress-store-locator' ),
                'subtitle' => __( 'What happens when store name is clicked in infowindow.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'storepage' => __('Single Store Page', 'wordpress-store-locator'),
                    'web' => __('Website', 'wordpress-store-locator'),
                    'tel' => __('Telephone', 'wordpress-store-locator'),
                    'email' => __('Email', 'wordpress-store-locator'),
                    'none' => __('None', 'wordpress-store-locator'),
                    'chat' => __('chat', 'wordpress-store-locator'),
                ),
                'default'  => 'storepage',
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowLinkActionNewTab',
                'type'     => 'checkbox',
                'title'    => __( 'Open Store Link Action in new Tab', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowwindowWidth',
                'type'     => 'spinner',
                'title'    => __( 'Width (in pixel)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '999',
                'default'  => '350',
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowDetailsColumns',
                'type'     => 'spinner',
                'title'    => __( 'Details Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '12',
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowImageColumns',
                'type'     => 'spinner',
                'title'    => __( 'Image Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '6',
                'required' => array('infowindowEnabled','equals','1'),
            ),
            array(
                'id'       => 'infowindowOpeningHoursColumns',
                'type'     => 'spinner',
                'title'    => __( 'Opening Hours Width (in Columns)', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '6',
                'required' => array('infowindowEnabled','equals','1'),
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Result List', 'wordpress-store-locator' ),
        'desc'       => __( 'Default Map Settings', 'wordpress-store-locator' ),
        'id'         => 'resultList',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'resultListEnabled',
                'type'     => 'switch',
                'title'    => __( 'Enable Result List', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'resultListItemColumns',
                'type'     => 'spinner',
                'title'    => __( 'Result list Item Columns', 'wordpress-store-locator' ),
                'subtitle'    => __( 'How many stores per row.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '12',
                'default'  => '12',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListItemLayout',
                'type'     => 'select',
                'title'    => __( 'Result list item content layout', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose how a result item should be shown.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'oneColumn' => __('One Column', 'wordpress-store-locator'),
                    'threeColumns' => __('Three Columns', 'wordpress-store-locator'),
                ),
                'default'  => 'oneColumn',
                'required' => array('resultListEnabled','equals','1'),
            ),

            array(
                'id'       => 'resultListOrder',
                'type'     => 'select',
                'title'    => __( 'Sort Results by', 'wordpress-store-locator' ),
                'options'  => array(
                    'distance' => __('Distance', 'wordpress-store-locator'),
                    'post_title' => __('Alphabetically', 'wordpress-store-locator'),
                    'premium' => __('Premium Stores First', 'wordpress-store-locator'),
                    'ranking' => __('Store Ranking', 'wordpress-store-locator'),
                    'rand()' => __('Random', 'wordpress-store-locator'),
                ),
                'default' => 'distance',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListOrderAllStores',
                'type'     => 'select',
                'title'    => __( 'All Stores Sort Results by', 'wordpress-store-locator' ),
                'options'  => array(
                    'distance' => __('Distance', 'wordpress-store-locator'),
                    'post_title' => __('Alphabetically', 'wordpress-store-locator'),
                    'premium' => __('Premium Stores First', 'wordpress-store-locator'),
                    'ranking' => __('Store Ranking', 'wordpress-store-locator'),
                    'rand()' => __('Random', 'wordpress-store-locator'),
                ),
                'default' => 'distance',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListScrollTo',
                'type'     => 'checkbox',
                'title'    => __( 'Scroll to Result List Item on Marker hover', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
            
            array(
                'id'       => 'resultListAllHideDistance',
                'type'     => 'checkbox',
                'title'    => __( 'All stores Hide Distance', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListShowTitle',
                'type'     => 'checkbox',
                'title'    => __( 'Show a Results title', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
                array(
                    'id'       => 'resultListShowTitleText',
                    'type'     => 'text',
                    'title'    => __('Results Title', 'wordpress-store-locator'),
                    'default'  => __('Results', 'wordpress-store-locator' ),
                    'required' => array('resultListShowTitle','equals','1'),
                ),
                array(
                    'id'       => 'resultListFilterOpen',
                    'type'     => 'checkbox',
                    'title'    => __( 'Result List open by default', 'wordpress-store-locator' ),
                    'subtitle'    => __( 'Check this to disable the result list accordion.', 'wordpress-store-locator' ),
                    'default'  => 1,
                    'required' => array('resultListShowTitle','equals','1'),
                ),

            array(
                'id'       => 'resultListAutoHeight',
                'type'     => 'checkbox',
                'title'    => __( 'Result list Auto Height', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Will set the result list same height as the map is.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'resultListHover',
                'type'     => 'checkbox',
                'title'    => __( 'Enable Result List Hover', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListNoResultsText',
                'type'     => 'text',
                'title'    => __('No Results Text', 'wordpress-store-locator'),
                'default'  => 'No Stores found ... try again!',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListMax',
                'type'     => 'spinner',
                'title'    => __( 'Maximum Results', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '99999',
                'default'  => '100',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListMin',
                'type'     => 'spinner',
                'title'    => __( 'Minimum Results', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Show at least X stores. 0 means disabled and it will show no results found message.', 'wordpress-store-locator' ),
                'min'      => '0',
                'step'     => '1',
                'max'      => '99999',
                'default'  => '0',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListLinkAction',
                'type'     => 'select',
                'title'    => __( 'Store Link Action', 'wordpress-store-locator' ),
                'subtitle' => __( 'What happens when store name is clicked.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'storepage' => __('Single Store Page', 'wordpress-store-locator'),
                    'web' => __('Website', 'wordpress-store-locator'),
                    'tel' => __('Telephone', 'wordpress-store-locator'),
                    'email' => __('Email', 'wordpress-store-locator'),
                    'none' => __('None', 'wordpress-store-locator'),
                    'chat' => __('Chat', 'wordpress-store-locator'),
                ),
                'default'  => 'storepage',
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListLinkActionNewTab',
                'type'     => 'checkbox',
                'title'    => __( 'Open Store Link Action in new Tab', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListIconEnabled',
                'type'     => 'checkbox',
                'title'    => __( 'Show Result List Icon', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListIcon',
                'type'     => 'text',
                'title'    =>  __('Result List Icon', 'wordpress-store-locator'),
                'required' => array('resultListIconEnabled','equals','1'),
                'default'  => 'fas fa-map-marker',
            ),
            array(
                'id'       => 'resultListIconSize',
                'type'     => 'select',
                'title'    =>  __('Result List Icon Size', 'wordpress-store-locator'),
                'options'  => array(
                    '' => 'Normal',
                    'fa-lg' => 'Large',
                    'fa-2x' => '2x',
                    'fa-3x' => '3x',
                    'fa-4x' => '4x',
                    'fa-5x' => '5x',
                    ), 
                'default' => 'fa-3x',
                'required' => array('resultListIconEnabled','equals','1'),
            ),
            array(
                'id'     =>'resultListIconColor',
                'type'  => 'color',
                'title' => __('Result List Icon Color', 'wordpress-store-locator'), 
                'validate' => 'color',
                'default' => '#000000',
                'required' => array('resultListIconEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListPremiumIconEnabled',
                'type'     => 'checkbox',
                'title'    => __( 'Show Result List Premium Icon', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('resultListEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListPremiumIcon',
                'type'     => 'text',
                'title'    =>  __('Result List Premium Icon', 'wordpress-store-locator'),
                'required' => array('resultListPremiumIconEnabled','equals','1'),
                'default'  => 'fas fa-star'
            ),
            array(
                'id'       => 'resultListPremiumIconSize',
                'type'     => 'select',
                'title'    =>  __('Result List Premium Icon Size', 'wordpress-store-locator'),
                'options'  => array(
                    '' => 'Normal',
                    'fa-lg' => 'Large',
                    'fa-2x' => '2x',
                    'fa-3x' => '3x',
                    'fa-4x' => '4x',
                    'fa-5x' => '5x',
                    ), 
                'default' => 'fa-3x',
                'required' => array('resultListPremiumIconEnabled','equals','1'),
            ),
            array(
                'id'     =>'resultListPremiumIconColor',
                'type'  => 'color',
                'title' => __('Result List Premium Icon Color', 'wordpress-store-locator'), 
                'validate' => 'color',
                'default' => '#ffff00',
                'required' => array('resultListPremiumIconEnabled','equals','1'),
            ),
            array(
                'id'       => 'resultListSlider',
                'type'     => 'checkbox',
                'title'    => __( 'Display results as Slider', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('resultListEnabled','equals','1'),
            ),
                // array(
                //     'id'       => 'testResultListSliderSlidesToShow',
                //     'type'     => 'spinner',
                //     'title'    => __( 'Slides to Show', 'wordpress-store-locator' ),
                //     'min'      => '1',
                //     'step'     => '1',
                //     'max'      => '10',
                //     'default'  => '4',
                //     'required' => array('resultListSlider','equals','1'),
                // ),
                // array(
                //     'id'       => 'testResultListSliderSlidesToScroll',
                //     'type'     => 'spinner',
                //     'title'    => __( 'Slides to Scroll', 'wordpress-store-locator' ),
                //     'min'      => '1',
                //     'step'     => '1',
                //     'max'      => '10',
                //     'default'  => '1',
                //     'required' => array('resultListSlider','equals','1'),
                // ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Search Box', 'wordpress-store-locator' ),
        'desc'       => __( 'Search Box Settings', 'wordpress-store-locator' ),
        'id'         => 'searchBox',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'searchColumns',
                'type'     => 'select',
                'title'    => __( 'Search Layout', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose how a Search box layout.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'oneColumn' => __('One Column', 'wordpress-store-locator'),
                    'twoColumns' => __('Two Columns', 'wordpress-store-locator'),
                    'threeColumns' => __('Three Columns', 'wordpress-store-locator'),
                    'fourColumns' => __('Four Columns', 'wordpress-store-locator'),
                ),
                'default'  => 'oneColumn',
            ),
            array(
                'id'      => 'searchBoxFields',
                'type'    => 'sorter',
                'title'   => __('Search Box Fields.', 'wordpress-store-locator'),
                'options' => array(
                    'enabled'  => array(
                        'search_title' => __('Title & Active Filter', 'wordpress-store-locator'),
                        // 'active_filter' => __('Active Filter', 'wordpress-store-locator'),
                        'address_field' => __('Address Field', 'wordpress-store-locator'),
                        'search_button' => __('Search Button', 'wordpress-store-locator'),
                        'filter' => __('Filters', 'wordpress-store-locator'),

                    ),
                    'disabled' => array(
                        'along_route' => __('Along Route', 'wordpress-store-locator'),
                        'contact_all_stores' => __('Contact all Stores', 'wordpress-store-locator'),
                        'store_name_search' => __('Store Name Search', 'wordpress-store-locator'),
                    )
                ),
            ),
            array(
                'id'      => 'searchBoxAddressBelowFields',
                'type'    => 'sorter',
                'title'   => __('Below Address Fields.', 'wordpress-store-locator'),
                'options' => array(
                    'enabled'  => array(
                        'my_position' => __('My Position', 'wordpress-store-locator'),
                        'reset_filters' => __('Reset Filters', 'wordpress-store-locator'),
                        'all_stores' => __('Get All Stores', 'wordpress-store-locator'),

                    ),
                    'disabled' => array(
                    )
                ),
            ),
            array(
                'id'       => 'searchBoxEmptyAddressByDefault',
                'type'     => 'checkbox',
                'title'    => __( 'Empty address field by default', 'wordpress-store-locator' ),
                'subtitle' => __( 'Enable to leave the address field empty by default.', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'searchBoxAutolocate',
                'type'     => 'checkbox',
                'title'    => __( 'Enable Auto Geolocation', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'searchBoxAutolocateIP',
                'type'     => 'checkbox',
                'title'    => __( 'Enable IP Geolocation Fallback', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('searchBoxAutolocate','equals','1'),
            ),
            array(
                'id'       => 'searchBoxSaveAutolocate',
                'type'     => 'checkbox',
                'title'    => __( 'Save Auto Geolocation in Cookie?', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('searchBoxAutolocate','equals','1'),
            ),
            array(
                'id'       => 'searchBoxAutolocateShowAlert',
                'type'     => 'checkbox',
                'title'    => __( 'Show alert when User has disabled Geolocation', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('searchBoxAutolocate','equals','1'),
            ),
            array(
                'id'       => 'searchBoxAutocomplete',
                'type'     => 'checkbox',
                'title'    => __( 'Enable Autocomplete', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
                array(
                    'id'       => 'searchBoxAutocompleteFirstResultOnEnter',
                    'type'     => 'checkbox',
                    'title'    => __( 'Select first autocomplete result on Enter', 'wordpress-store-locator' ),
                    'subtitle'    => __( 'When user enters an address and presses enter it will use first autocomplete result instead of free search.', 'wordpress-store-locator' ),
                    'default'  => 1,
                    'required' => array('searchBoxAutocomplete','equals','1'),
                ),
                array(
                    'id'       => 'autocompleteType',
                    'type'     => 'select',
                    'title'    => __( 'Restrict Types', 'wordpress-store-locator' ),
                    'subtitle'     => __('You may restrict results from a Place Autocomplete request to be of a certain type. If for example you want to hide the street from autocomplete search, you have to select the "Regions". <a href="https://developers.google.com/places/supported_types?hl=en" target="_blank">Learn More</a>!'),
                    'options'  => array(
                        'geocode' => __('Geocode', 'wordpress-store-locator'),
                        '(regions)' => __('Regions', 'wordpress-store-locator'),
                        '(cities)' => __('Cities', 'wordpress-store-locator'),
                        'address' => __('Address', 'wordpress-store-locator'),
                        'establishment' => __('Establishment', 'wordpress-store-locator'),
                    ),
                    'default' => 'geocode',
                    'required' => array('searchBoxAutocomplete','equals','1'),
                ),
                array(
                    'id'       => 'autocompleteCountryRestrict',
                    'type'     => 'text',
                    'title'    => __('Restrict Autocomplete to a country', 'wordpress-store-locator'),
                    'subtitle'     => '2 character ISO-Codes only! You can insert for example US to limit the autocomplete to only search in United States. For multiple use comma separator like US,DE',
                    'default'  => '',
                    'required' => array('searchBoxAutocomplete','equals','1'),
                ),

            array(
                'id'       => 'searchBoxAddressText',
                'type'     => 'text',
                'title'    => __( 'Address Field Name', 'wordpress-store-locator' ),
                'subtitle' => __( 'Address Field Name label text.', 'wordpress-store-locator'),
                'default'  =>__('Address', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxAddressPlaceholder',
                'type'     => 'text',
                'title'    => __( 'Address Field Name Placeholder', 'wordpress-store-locator' ),
                'subtitle' => __( 'Address Field Name placeholder text.', 'wordpress-store-locator'),
                'default'  => __('Enter your address', 'wordpress-store-locator'),
            ),

            array(
                'id'       => 'searchBoxStoreNameSearchText',
                'type'     => 'text',
                'title'    => __( 'Search by Store Name Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Search by Store Name label text.', 'wordpress-store-locator'),
                'default'  =>__('Store name', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxStoreNameSearchPlaceholder',
                'type'     => 'text',
                'title'    => __( 'Search by Store Name Placeholder', 'wordpress-store-locator' ),
                'subtitle' => __( 'Search by Store Name placeholder text.', 'wordpress-store-locator'),
                'default'  =>__('Ener a Store name', 'wordpress-store-locator' ),
            ),

            array(
                'id'       => 'searchBoxAlongRouteTitle',
                'type'     => 'text',
                'title'    => __( 'Along Route - Title', 'wordpress-store-locator' ),
                'subtitle' => __( 'Text for along the Route button.', 'wordpress-store-locator'),
                'default'  =>__('Search Along Route', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxAlongRouteButtonText',
                'type'     => 'text',
                'title'    => __( 'Along Route - Button Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Text for along the Route button.', 'wordpress-store-locator'),
                'default'  =>__('Search', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxAlongRouteRadius',
                'type'     => 'spinner',
                'title'    => __( 'Along Route - Radius for each waypoint', 'wordpress-store-locator' ),
                'subtitle' => __( 'The higher, more stores around the route will show.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '999',
                'default' => '2',
            ),
            array(
                'id'       => 'searchBoxAlongRouteWaypointsInterval',
                'type'     => 'spinner',
                'title'    => __( 'Along Route - Waypoints Interval', 'wordpress-store-locator' ),
                'subtitle' => __( 'The lower the more accurate is the results, but it costs more performance. Background: Google returns more than 200 waypoints (lat / lng) for each route and we have to query each waypoint. Interval of 20 will only fetch each 20s waypoint and not all 200.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '100',
                'default' => '15',
            ),

            array(
                'id'       => 'searchBoxGetMyPositionText',
                'type'     => 'text',
                'title'    => __( 'Get my Position Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Get my position link text.', 'wordpress-store-locator'),
                'default'  => __('Get my Position', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxResetFiltersText',
                'type'     => 'text',
                'title'    => __( 'Reset Filters Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Reset Filters link text.', 'wordpress-store-locator'),
                'default'  => __('Reset all Filters', 'wordpress-store-locator' ),
            ),


            array(
                'id'       => 'searchButtonText',
                'type'     => 'text',
                'title'    => __('Button Text', 'wordpress-store-locator'),
                'subtitle' => __('Text for the search button.', 'wordpress-store-locator'),
                'default'  => __('Find in Store', 'wordpress-store-locator' ),
            ),

            array(
                'id'       => 'searchBoxShowShowAllStoresKeepFilter',
                'type'     => 'checkbox',
                'title'    => __( 'Get All Stores Keep Filter', 'wordpress-store-locator' ),
                'subtitle' => __( 'Keep category + filters when clicking on get all stores.', 'wordpress-store-locator'),
                'default'  => 0
            ),

            array(
                'id'       => 'searchBoxShowShowAllStoresText',
                'type'     => 'text',
                'title'    => __( 'Get All Stores Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Text for the all stores button.', 'wordpress-store-locator'),
                'default'  => __('Show all Stores', 'wordpress-store-locator' ), 
            ),

            array(
                'id'       => 'searchBoxShowShowAllStoresZoom',
                'type'     => 'spinner',
                'title'    => __( 'Get All Stores Zoom Level', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the Zoom Level when you want to show all stores.', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '16',
                'default' => '10',
            ),
            array(
                'id'       => 'searchBoxShowShowAllStoresLat',
                'type'     => 'text',
                'title'    => __( 'Get All Stores Latitude', 'wordpress-store-locator' ),
                'default'  => '48.8620722',
            ),
            array(
                'id'       => 'searchBoxShowShowAllStoresLng',
                'type'     => 'text',
                'title'    => __( 'Get All Stores Longitude', 'wordpress-store-locator' ),
                'default'  => '41.352047',
            ),

            array(
                'id'       => 'searchBoxContactAllStoresButtonText',
                'type'     => 'text',
                'title'    => __( 'Contact all Stores - Button text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Text for contact all stores button.', 'wordpress-store-locator'),
                'default'  =>__('Contact all Stores', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxContactAllStoresShortocode',
                'type'     => 'editor',
                'title'    => __( 'Contact all Stores - Shortcode', 'wordpress-store-locator' ),
                'subtitle' => __( 'Put your form shortcode in. In your form should be a input field with the name "email_tos".', 'wordpress-store-locator'),
                'default'  => __('<h2>Contact all stores</h2><p>[your_form_shortcode]</p>', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxContactAllStoresNoStoresText',
                'type'     => 'text',
                'title'    => __( 'Contact all Stores - No Stores Text', 'wordpress-store-locator' ),
                'subtitle' => __( 'Text when somebody clicks on contact all stores button, but not stores are searched.', 'wordpress-store-locator'),
                'default'  => __( 'Please search for stores first', 'wordpress-store-locator'),
            ),
            array(
                'id'       => 'searchBoxContactAllStoresFieldName',
                'type'     => 'text',
                'title'    => __( 'Contact all Stores - To FIeld Name', 'wordpress-store-locator' ),
                'subtitle' => __( 'This field will be filled with all stores emails seperated with comma.', 'wordpress-store-locator'),
                'default'  => 'email_tos',
            ),
        )
    ) );


    $framework::setSection( $opt_name, array(
        'title'      => __( 'Filter', 'wordpress-store-locator' ),
        'desc'       => __( 'Default Filtering Settings', 'wordpress-store-locator' ),
        'id'         => 'filter',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'filterColumns',
                'type'     => 'select',
                'title'    => __( 'Filter Columns', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the columns for each container filter.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'oneColumn' => __('One Column', 'wordpress-store-locator'),
                    'twoColumns' => __('Two Column', 'wordpress-store-locator'),
                    'threeColumns' => __('Three Columns', 'wordpress-store-locator'),
                ),
                'default'  => 'oneColumn',
            ),
            array(
                'id'      => 'filterFields',
                'type'    => 'sorter',
                'title'   => 'Filter Fields.',
                'options' => array(
                    'enabled'  => array(
                        'radius_filter' => __('Radius Filter', 'wordpress-store-locator'),
                        'store_categories' => __('Store Categories', 'wordpress-store-locator'),
                        'store_filter' => __('Store filter', 'wordpress-store-locator'),
                    ),
                    'disabled' => array(
                        'online_offline' => __('Online / Offline Stores', 'wordpress-store-locator'),
                    )
                ),
            ),
            array(
                'id'       => 'searchBoxShowFilterOpen',
                'type'     => 'checkbox',
                'title'    => __( 'Filtering open by default', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'searchBoxDefaultCategory',
                'type'     => 'select',
                'title'    =>  __('Default filter category', 'wordpress-store-locator'),
                'subtitle' =>  __('Set a default filter category', 'wordpress-store-locator'),
                'options'  => $store_categories,
                'default' => '',
            ),
            array(
                'id'       => 'showFilterCategoriesAsImage',
                'type'     => 'checkbox',
                'title'    => __( 'Display Category Filters as Image', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'searchBoxShowRadius',
                'type'     => 'checkbox',
                'title'    => __( 'Show Search Radius', 'wordpress-store-locator' ),
                'subtitle' => __( 'Enable to show search Radius.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'searchBoxShowFilter',
                'type'     => 'checkbox',
                'title'    => __( 'Show Search Filters', 'wordpress-store-locator' ),
                'subtitle' => __( 'Enable to show search filters.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'filterFilterTitle',
                'type'     => 'text',
                'title'    => __('Filter text', 'wordpress-store-locator'),
                'subtitle' => __('Text above all filters. Leave blank to show all filters without title.', 'wordpress-store-locator'),
                'default'  => esc_html__('Filter', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'searchBoxCategoriesText',
                'type'     => 'text',
                'title'    => __('Categories text', 'wordpress-store-locator'),
                'subtitle' => __('Text above the Categories filter.', 'wordpress-store-locator'),
                'default'  => __('', 'wordpress-store-locator')
            ),
            array(
                'id'       => 'searchBoxRadiusText',
                'type'     => 'text',
                'title'    => __('Radius text', 'wordpress-store-locator'),
                'subtitle' => __('Text above the radius filter.', 'wordpress-store-locator'),
                'default'  => __('', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'storeFilterColumns',
                'type'     => 'select',
                'title'    => __( 'Store Filter Columns', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the column for each single filter.', 'wordpress-store-locator' ),
                'options'  => array( 
                    'oneColumn' => __('One Column', 'wordpress-store-locator'),
                    'twoColumns' => __('Two Column', 'wordpress-store-locator'),
                    'threeColumns' => __('Three Columns', 'wordpress-store-locator'),
                ),
                'default'  => 'oneColumn',
            ),
            array(
                'id'       => 'showStoreFilterTitle',
                'type'     => 'checkbox',
                'title'    => __( 'Store Filter Show Title', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'onlineOfflineAllText',
                'type'     => 'text',
                'title'    => __('Online / Offline All Text', 'wordpress-store-locator'),
                'subtitle' => __('Used when Online Offline filtering is enabled.', 'wordpress-store-locator'),
                'default'  => __('All', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'onlineStoreText',
                'type'     => 'text',
                'title'    => __('Online Store Text', 'wordpress-store-locator'),
                'subtitle' => __('Used when Online Offline filtering is enabled.', 'wordpress-store-locator'),
                'default'  => __('Online Store', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'offlineStoreText',
                'type'     => 'text',
                'title'    => __('Offline Store Text', 'wordpress-store-locator'),
                'subtitle' => __('Used when Online Offline filtering is enabled.', 'wordpress-store-locator'),
                'default'  => __('Local Retailer', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'onlineOfflineZoom',
                'type'     => 'spinner',
                'title'    => __( 'Online Filter Zoom Level', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose the Zoom Level when online is searched', 'wordpress-store-locator' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '16',
                'default' => '4',
            ),
            array(
                'id'       => 'onlineOfflineLat',
                'type'     => 'text',
                'title'    => __( 'Online Filter Latitude', 'wordpress-store-locator' ),
                'default'  => '52.520008',
            ),
            array(
                'id'       => 'onlineOfflineLng',
                'type'     => 'text',
                'title'    => __( 'Online Filter Longitude', 'wordpress-store-locator' ),
                'default'  => '13.404954',
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Loading', 'wordpress-store-locator' ),
        'desc'       => __( 'Loading Settings', 'wordpress-store-locator' ),
        'id'         => 'loading',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'loadingIcon',
                'type'     => 'text',
                'title'    =>  __('Loading Icon', 'wordpress-store-locator'),
                'default'  => 'fas fa-spinner'
            ),
            array(
                'id'       => 'loadingAnimation',
                'type'     => 'select',
                'title'    =>  __('Loading Animation', 'wordpress-store-locator'),
                'options'  => array(
                    '' => 'None',
                    'fa-spin' => 'Spin',
                    'fa-pules' => 'Pules'
                    ), 
                'default' => 'fa-spin'
            ),
            array(
                'id'       => 'loadingIconSize',
                'type'     => 'select',
                'title'    =>  __('Loading Icon Size', 'wordpress-store-locator'),
                'options'  => array(
                    '' => 'Normal',
                    'fa-lg' => 'Large',
                    'fa-2x' => '2x',
                    'fa-3x' => '3x',
                    'fa-4x' => '4x',
                    'fa-5x' => '5x',
                    ), 
                'default' => 'fa-3x'
            ),
            array(
                'id'     =>'loadingIconColor',
                'type'  => 'color',
                'title' => __('Loading Icon Color', 'wordpress-store-locator'), 
                'validate' => 'color',
                'default' => '#000000'
            ),
            array(
                'id'     =>'loadingOverlayColor',
                'type'  => 'color',
                'title' => __('Overlay Color', 'wordpress-store-locator'), 
                'validate' => 'color',
                'default' => '#FFFFFF'
            ),
            array(
                'id'     =>'loadingOverlayTransparency',
                'type'  => 'text',
                'title' => __('Overlay Transparency', 'wordpress-store-locator'), 
                'subtitle' => __('Enter 0 to 1. Example: 0.8', 'wordpress-store-locator'), 
                'default'  => '0.8',
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Data to Show', 'wordpress-store-locator' ),
        'desc'       => __( 'Data you want to show.', 'wordpress-store-locator' ),
        'id'         => 'fields',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'showName',
                'type'     => 'checkbox',
                'title'    => __( 'Show Name', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showRating',
                'type'     => 'checkbox',
                'title'    => __( 'Show Rating', 'wordpress-store-locator' ),
                'subtitle'    => __( 'This will show average rating in listing (if available). Also will show rating form on single store page.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
                array(
                    'id'       => 'showRatingLinkToForm',
                    'type'     => 'checkbox',
                    'title'    => __( 'Link Rating Icons to Single Store Rating Form', 'wordpress-store-locator' ),
                    'default'  => 1,
                    'required' => array('showRating','equals','1'),
                ),
            array(
                'id'       => 'showExcerpt',
                'type'     => 'checkbox',
                'title'    => __( 'Show Excerpt', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showDescription',
                'type'     => 'checkbox',
                'title'    => __( 'Show Description', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
                array(
                    'id'       => 'showDescriptionStripShortcodes',
                    'type'     => 'checkbox',
                    'title'    => __( 'Strip Shortcodes', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('showDescription','equals','1'),
                ),
                array(
                    'id'       => 'showDescriptionVisualComposer',
                    'type'     => 'checkbox',
                    'title'    => __( 'Visual Composer Support', 'wordpress-store-locator' ),
                    'default'  => 1,
                    'required' => array('showDescription','equals','1'),
                ),
            array(
                'id'       => 'showStreet',
                'type'     => 'checkbox',
                'title'    => __( 'Show Street', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showZip',
                'type'     => 'checkbox',
                'title'    => __( 'Show ZIP', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showCity',
                'type'     => 'checkbox',
                'title'    => __( 'Show City', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showRegion',
                'type'     => 'checkbox',
                'title'    => __( 'Show Region', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showCountry',
                'type'     => 'checkbox',
                'title'    => __( 'Show Country', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showAddressStyle',
                'type'     => 'select',
                'title'    =>  __('Address Format', 'wordpress-store-locator'),
                'options'  => array(
                    'standard' => 'Standard',
                    'american' => 'American / Australian'
                    ), 
                'default' => 'europe'
            ),
            array(
                'id'       => 'showCustomMetaFieldAfterAddress',
                'type'     => 'text',
                'title'    => __('Custom Meta Field after Address', 'wordpress-store-locator'),
                'subtitle'    => __('Enter the meta key field name here', 'wordpress-store-locator'),
                'default'  => '',
            ),

            array(
                'id'       => 'showWebsite',
                'type'     => 'checkbox',
                'title'    => __( 'Show Website', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showWebsiteText',
                'type'     => 'text',
                'title'    => __('Website Text', 'wordpress-store-locator'),
                'default'  => __('Website: ', 'wordpress-store-locator'),
                'required' => array('showWebsite','equals','1'),
            ),
            array(
                'id'       => 'showEmail',
                'type'     => 'checkbox',
                'title'    => __( 'Show Email', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showEmailText',
                'type'     => 'text',
                'title'    => __('Email Text', 'wordpress-store-locator'),
                'default'  => __('Email: ', 'wordpress-store-locator'),
                'required' => array('showEmail','equals','1'),
            ),
            array(
                'id'       => 'showEmailPlaceholder',
                'type'     => 'checkbox',
                'title'    => __( 'Show Email Placeholder', 'wordpress-store-locator' ),
                'subtitle'    => __( 'For each store you can set a email placeholder text. So instead of support@asd.de it will use the placeholder value instead.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('showEmail','equals','1'),
            ),
            array(
                'id'       => 'showTelephone',
                'type'     => 'checkbox',
                'title'    => __( 'Show Telephone', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showTelephoneText',
                'type'     => 'text',
                'title'    => __('Telephone Text', 'wordpress-store-locator'),
                'default'  => __('Tel: ', 'wordpress-store-locator'),
                'required' => array('showTelephone','equals','1'),
            ),
            array(
                'id'       => 'showMobile',
                'type'     => 'checkbox',
                'title'    => __( 'Show Mobile Phone', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showMobileText',
                'type'     => 'text',
                'title'    => __('Mobile Text', 'wordpress-store-locator'),
                'default'  => __('Mobile: ', 'wordpress-store-locator'),
                'required' => array('showMobile','equals','1'),
            ),
            array(
                'id'       => 'showFax',
                'type'     => 'checkbox',
                'title'    => __( 'Show Fax', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showFaxText',
                'type'     => 'text',
                'title'    => __('Fax Text', 'wordpress-store-locator'),
                'default'  => __('Fax: ', 'wordpress-store-locator'),
                'required' => array('showFax','equals','1'),
            ),
            array(
                'id'       => 'showDistance',
                'type'     => 'checkbox',
                'title'    => __( 'Show Distance', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showDistanceText',
                'type'     => 'text',
                'title'    => __('Distance Text', 'wordpress-store-locator'),
                'default'  => __('Distance', 'wordpress-store-locator'),
                'required' => array('showDistance','equals','1'),
            ),
            array(
                'id'       => 'showStoreCategories',
                'type'     => 'checkbox',
                'title'    => __( 'Show Stores Categories', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showStoreFilter',
                'type'     => 'checkbox',
                'title'    => __( 'Show Stores Filter', 'wordpress-store-locator' ),
                'default'  => 0,
            ),

            array(
                'id'       => 'showContactStore',
                'type'     => 'checkbox',
                'title'    => __( 'Show Contact Store', 'wordpress-store-locator' ),
                'subtitle' => __( 'Contact dealer via a contact form on a new page.', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showContactStoreText',
                'type'     => 'text',
                'title'    => __('Contact Store Text', 'wordpress-store-locator'),
                'default'  => __('Contact Store', 'wordpress-store-locator'),
                'required' => array('showContactStore','equals','1'),
            ),
            array(
                'id'       => 'showContactStorePage',
                'type'     => 'select',
                'title'    => __('Contact Page', 'wordpress-store-locator'),
                'subtitle' => __('Make sure a form is embedded on the site. A tutorial how to create a form can be found here.', 'wordpress-store-locator'),
                'data'     => 'pages',
                'ajax'     => 'true',
                'required' => array('showContactStore','equals','1'),
            ),
            array(
                'id'       => 'showGetDirection',
                'type'     => 'checkbox',
                'title'    => __( 'Show Get Direction', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
                array(
                    'id'       => 'showGetDirectionText',
                    'type'     => 'text',
                    'title'    => __('Get Directions Text', 'wordpress-store-locator'),
                    'default'  => __('Get Directions', 'wordpress-store-locator'),
                    'required' => array('showGetDirection','equals','1'),
                ),
                array(
                    'id'       => 'showGetDirectionEmptySource',
                    'type'     => 'checkbox',
                    'title'    => __( 'Leave source address empty in Google Maps.', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('showGetDirection','equals','1'),
                ),
            array(
                'id'       => 'showChooseInventory',
                'type'     => 'checkbox',
                'title'    => __( 'Show Choose Inventory ', 'wordpress-store-locator' ),
                'subtitle'    => __( 'This requires our <a href="https://www.welaunch.io/en/product/woocommerce-multi-inventory/" target="_blank">WooCommerce Multi Inventory plugin</a>. Assign a store to ONE inventory when you edit a store in backend. ', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
                array(
                    'id'       => 'showChooseInventoryText',
                    'type'     => 'text',
                    'title'    => __('Choose Inventory Text', 'wordpress-store-locator'),
                    'default'  => __('Choose Inventory', 'wordpress-store-locator'),
                    'required' => array('showChooseInventory','equals','1'),
                ),
                array(
                    'id'       => 'showGetDirectionEmptySource',
                    'type'     => 'checkbox',
                    'title'    => __( 'Leave source address empty in Google Maps.', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('showGetDirection','equals','1'),
                ),
            array(
                'id'       => 'showCallNow',
                'type'     => 'checkbox',
                'title'    => __( 'Show Call Now Button', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'showCallNowText',
                'type'     => 'text',
                'title'    => __('Call Now Text', 'wordpress-store-locator'),
                'default'  => __('Call Now', 'wordpress-store-locator'),
                'required' => array('showCallNow','equals','1'),
            ),
            array(
                'id'       => 'showVisitWebsite',
                'type'     => 'checkbox',
                'title'    => __( 'Show Visit Website Button', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showVisitWebsiteText',
                'type'     => 'text',
                'title'    => __('Visit Website Text', 'wordpress-store-locator'),
                'default'  => __('Visit Website', 'wordpress-store-locator'),
                'required' => array('showVisitWebsite','equals','1'),
            ),
            array(
                'id'       => 'showWriteEmail',
                'type'     => 'checkbox',
                'title'    => __( 'Show Write Email Button', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showWriteEmailText',
                'type'     => 'text',
                'title'    => __('Write Email Text', 'wordpress-store-locator'),
                'default'  => __('Write Email', 'wordpress-store-locator'),
                'required' => array('showWriteEmail','equals','1'),
            ),
            array(
                'id'       => 'showShowOnMap',
                'type'     => 'checkbox',
                'title'    => __( 'Show Show on Map Button', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showShowOnMapText',
                'type'     => 'text',
                'title'    => __('Show on Map Text', 'wordpress-store-locator'),
                'default'  => __('Show on Map', 'wordpress-store-locator'),
                'required' => array('showShowOnMap','equals','1'),
            ),
            array(
                'id'       => 'showVisitStore',
                'type'     => 'checkbox',
                'title'    => __( 'Show Visit Store Button', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showVisitStoreText',
                'type'     => 'text',
                'title'    => __('Show Visit Store Text', 'wordpress-store-locator'),
                'default'  => __('Visit Store', 'wordpress-store-locator'),
                'required' => array('showVisitStore','equals','1'),
            ),
            array(
                'id'       => 'showRetailers',
                'type'     => 'checkbox',
                'title'    => __( 'Show Retailers Button', 'wordpress-store-locator' ),
                'subtitle'    => __( 'You need our <a href="https://www.welaunch.io/en/product/woocommerce-product-retailers/" target="_blank">WooCommerce retailer plugin</a>. See here <a href="https://www.welaunch.io/en/knowledge-base/faq/show-online-where-to-buy-in-physical-stores/" target="_blank">how to assign retailers to stores</a>.', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showChat',
                'type'     => 'checkbox',
                'title'    => __( 'Show Chat Button', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
                array(
                    'id'       => 'showChatText',
                    'type'     => 'text',
                    'title'    => __('Show Chat Store Text', 'wordpress-store-locator'),
                    'default'  => __('Chat Store', 'wordpress-store-locator'),
                    'required' => array('showChat','equals','1'),
                ),
            array(
                'id'       => 'showImage',
                'type'     => 'checkbox',
                'title'    => __( 'Show Image', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showImageSize',
                'type'     => 'text',
                'title'    => __('Image Size (thumbnail, medium, large or full)', 'wordpress-store-locator'),
                'default'  => 'medium',
                'required' => array('showImage','equals','1'),
            ),
            array(
                'id'       => 'imageDimensions',
                'type'     => 'dimensions',
                'units'    => array('px'),
                'title'    => __('Image Dimensions', 'wordpress-store-locator'),
                'default'  => array(
                    'width'   => '150', 
                    'height'   => '100', 
                ),
                'required' => array('showImage','equals','1'),
            ),
            array(
                'id'       => 'imagePosition',
                'type'     => 'select',
                'title'    => __( 'Image Position', 'wordpress-store-locator' ),
                'options'  => array(
                    'store-locator-image-top' => __('Top', 'wordpress-store-locator'),
                    'store-locator-order-first' => __('Left', 'wordpress-store-locator'),
                    'store-locator-order-last' => __('Right', 'wordpress-store-locator'),
                ),
                'default' => 'store-locator-order-first',
                'required' => array('showImage','equals','1'),
            ),
            array(
                'id'       => 'showCustomFields',
                'type'     => 'multi_text',
                'title'    => esc_html__('Custom Fields', 'wordpress-store-locator'),
                'subtitle' => esc_html__('Create custom fields here.'),
                'default'  => array(),
            ),
            array(
                'id'       => 'showOpeningHours',
                'type'     => 'checkbox',
                'title'    => __( 'Show Opening Hours', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showOpeningHoursText',
                'type'     => 'text',
                'title'    => __('Opening Hours Text', 'wordpress-store-locator'),
                'default'  => __('Opening Hours', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursClock',
                'type'     => 'text',
                'title'    => __('Opening Hours Clock', 'wordpress-store-locator'),
                'default'  => __("o'Clock", 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursMonday',
                'type'     => 'text',
                'title'    => __('Monday Text', 'wordpress-store-locator'),
                'default'  => 'Monday',
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursTuesday',
                'type'     => 'text',
                'title'    => __('Tuesday Text', 'wordpress-store-locator'),
                'default'  => __('Tuesday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursWednesday',
                'type'     => 'text',
                'title'    => __('Wednesday Text', 'wordpress-store-locator'),
                'default'  => __('Wednesday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursThursday',
                'type'     => 'text',
                'title'    => __('Thursday Text', 'wordpress-store-locator'),
                'default'  => __('Thursday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursFriday',
                'type'     => 'text',
                'title'    => __('Friday Text', 'wordpress-store-locator'),
                'default'  => __('Friday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursSaturday',
                'type'     => 'text',
                'title'    => __('Saturday Text', 'wordpress-store-locator'),
                'default'  => __('Saturday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHoursSunday',
                'type'     => 'text',
                'title'    => __('Sunday Text', 'wordpress-store-locator'),
                'default'  => __('Sunday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours','equals','1'),
            ),

            array(
                'id'       => 'showOpeningHours2',
                'type'     => 'checkbox',
                'title'    => __( 'Show Opening Hours 2', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'showOpeningHours2Text',
                'type'     => 'text',
                'title'    => __('Opening Hours Text', 'wordpress-store-locator'),
                'default'  => __('Opening Hours', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Clock',
                'type'     => 'text',
                'title'    => __('Opening Hours Clock', 'wordpress-store-locator'),
                'default'  => __("o'Clock", 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Monday',
                'type'     => 'text',
                'title'    => __('Monday Text', 'wordpress-store-locator'),
                'default'  => __('Monday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Tuesday',
                'type'     => 'text',
                'title'    => __('Tuesday Text', 'wordpress-store-locator'),
                'default'  => __('Tuesday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Wednesday',
                'type'     => 'text',
                'title'    => __('Wednesday Text', 'wordpress-store-locator'),
                'default'  => __('Wednesday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Thursday',
                'type'     => 'text',
                'title'    => __('Thursday Text', 'wordpress-store-locator'),
                'default'  => __('Thursday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Friday',
                'type'     => 'text',
                'title'    => __('Friday Text', 'wordpress-store-locator'),
                'default'  => __('Friday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Saturday',
                'type'     => 'text',
                'title'    => __('Saturday Text', 'wordpress-store-locator'),
                'default'  => __('Saturday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
            array(
                'id'       => 'showOpeningHours2Sunday',
                'type'     => 'text',
                'title'    => __('Sunday Text', 'wordpress-store-locator'),
                'default'  => __('Sunday', 'wordpress-store-locator'),
                'required' => array('showOpeningHours2','equals','1'),
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Single Store Page', 'wordpress-store-locator' ),
        'desc'       => __( 'Default Single Store Page Settings', 'wordpress-store-locator' ),
        'id'         => 'single-store-page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'singleStorePage',
                'type'     => 'switch',
                'title'    => __( 'Enable Single Store Pages', 'wordpress-store-locator' ),
                'default'  => 1,
            ),
            array(
                'id'       => 'singleStorenMapIcon',
                'type'     => 'text',
                'title'    => __( 'Single Store Map Icon', 'wordpress-store-locator' ),
                'default'  => 'https://maps.google.com/mapfiles/marker_grey.png',
                'required' => array('singleStorePage','equals','1'),
            ),
            array(
                'id'       => 'singleStoreShowTitle',
                'type'     => 'checkbox',
                'title'    => __( 'Show Title', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Normally themes show the store title automatically (keep this disabled).', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('singleStorePage','equals','1'),
            ),
            array
            (
                'id'       => 'singleStoreAppendCity',
                'type'     => 'checkbox',
                'title'    => __( 'Append City to Store Names', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('singleStorePage','equals','1'),
            ),
            array(
                'id'       => 'singleStoreShowOpeningHours',
                'type'     => 'switch',
                'title'    => __( 'Show Opening Hours', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('singleStorePage','equals','1'),
            ),
            array(
                'id'       => 'singleStoreContactStore',
                'type'     => 'switch',
                'title'    => __( 'Show Contact Store', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('singleStorePage','equals','1'),
            ),
                array(
                    'id'       => 'singleStoreShowContanctBelowAddress',
                    'type'     => 'checkbox',
                    'title'    => __( 'Show Contact below address', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreContactStore','equals','1'),
                ),
            array(
                'id'       => 'singleStoreShowRating',
                'type'     => 'switch',
                'title'    => __( 'Show Rating Form', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('singleStorePage','equals','1'),
            ),
                array(
                    'id'       => 'singleStoreShowRatingMoveBelowMap',
                    'type'     => 'checkbox',
                    'title'    => __( 'Move Rating form to Bottom', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowRating','equals','1'),
                ),

            array(
                'id'       => 'singleStoreShowMap',
                'type'     => 'switch',
                'title'    => __( 'Show Map', 'wordpress-store-locator' ),
                'default'  => 1,
                'required' => array('singleStorePage','equals','1'),
            ),
                array(
                    'id'       => 'singleStoreShowMapHeadline',
                    'type'     => 'text',
                    'title'    => __( 'Map Headline', 'wordpress-store-locator' ),
                    'default'  => __('Find on Map', 'wordpress-store-locator'),
                    'required' => array('singleStoreShowMap','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreShowMapZoom',
                    'type'     => 'spinner',
                    'title'    => __( 'Map Zoom', 'wordpress-store-locator' ),
                    'min'      => '1',
                    'step'     => '1',
                    'max'      => '16',
                    'default' => '10',
                    'required' => array('singleStoreShowMap','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreShowMapDisablePanControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable Pan Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreShowMapDisableZoomControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable Zoom Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreShowMapDisableScaleControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable Scale Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),    
                array(
                    'id'       => 'singleStoreShowMapDisableStreetViewControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable StreetView Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),  
                array(
                    'id'       => 'singleStoreShowMapDisableFullscreenControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable Fullscreen Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),  
                array(
                    'id'       => 'singleStoreShowMapDisableMapTypeControl',
                    'type'     => 'checkbox',
                    'title'    => __( 'Map - Disable Map Type Control', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStoreShowMap','equals','1'),
                ),  
            array(
                'id'       => 'singleStoreLivePosition',
                'type'     => 'switch',
                'title'    => __( 'Enable Live Position', 'wordpress-store-locator' ),
                'subtitle'    => __( 'Will display a 2nd icon on single store maps with live position data.', 'wordpress-store-locator' ),
                'default'  => 0,
                'required' => array('singleStoreShowMap','equals','1'),
            ),
                array(
                    'id'       => 'singleStoreLivePositionActionButton',
                    'type'     => 'checkbox',
                    'title'    => __( 'Live Position Result List & Infowindow Button', 'wordpress-store-locator' ),
                    'default'  => 1,
                    'required' => array('singleStorePage','equals','1'),
                ),
                    array(
                        'id'       => 'singleStoreLivePositionActionButtonText',
                        'type'     => 'text',
                        'title'    => __('Live Position - Button Text', 'wordpress-store-locator'),
                        'default'  => __('Live Location', 'wordpress-store-locator'),
                        'required' => array('singleStoreLivePositionResultListButton','equals','1'),
                    ),
                array(
                    'id'       => 'singleStoreLivePositionHideMapHeadline',
                    'type'     => 'checkbox',
                    'title'    => __( 'Live Position - Hide Map Headline when Live data Empty', 'wordpress-store-locator' ),
                    'default'  => 0,
                    'required' => array('singleStorePage','equals','1'),
                ),

                array(
                    'id'       => 'singleStoreLivePositionLatField',
                    'type'     => 'text',
                    'title'    => __('Live Positon Lat Field', 'wordpress-store-locator'),
                    'subtitle' => __('The custom field name, that you save on singe store level.', 'wordpress-store-locator'),
                    'default'  => 'wordpress_store_locator_live_lat',
                    'required' => array('singleStoreLivePosition','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreLivePositionLngField',
                    'type'     => 'text',
                    'title'    => __('Live Positon Lng Field', 'wordpress-store-locator'),
                    'subtitle' => __('The custom field name, that you save on singe store level.', 'wordpress-store-locator'),
                    'default'  => 'wordpress_store_locator_live_lng',
                    'required' => array('singleStoreLivePosition','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreLivePositionMapIcon',
                    'type'     => 'text',
                    'title'    => __( 'Live Position Store Icon', 'wordpress-store-locator' ),
                    'default'  => 'https://maps.google.com/mapfiles/marker_grey.png',
                    'required' => array('singleStoreLivePosition','equals','1'),
                ),
                array(
                    'id'       => 'singleStoreLivePositionInterval',
                    'type'     => 'spinner',
                    'title'    => __( 'Update Interval (miliseconds)', 'wordpress-store-locator' ),
                    'min'      => '1',
                    'step'     => '1',
                    'max'      => '999999999999',
                    'default' => '2000',
                    'required' => array('singleStoreLivePosition','equals','1'),
                ),


        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'WooCommerce', 'wordpress-store-locator' ),
        'id'         => 'woocommerce',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'buttonEnabled',
                'type'     => 'switch',
                'title'    => __( 'Enable', 'wordpress-store-locator' ),
                'subtitle' => __( 'Enables the single product custom button.', 'wordpress-store-locator' ),
                'default'  => '1',
            ),
            array(
                'id'       => 'buttonText',
                'type'     => 'text',
                'title'    => __('Button Text', 'wordpress-store-locator'),
                'subtitle' => __('Text inside the custom button.', 'wordpress-store-locator'),
                'default'  => 'Find in Store',
                'required' => array('buttonEnabled','equals','1'),
            ),
            array(
                'id'       => 'buttonPosition',
                'type'     => 'select',
                'title'    => __('Button Position', 'wordpress-store-locator'),
                'subtitle' => __('Specify the positon of the Button.', 'wordpress-store-locator'),
                'default'  => 'woocommerce_single_product_summary',
                'options'  => array( 
                    'woocommerce_before_single_product' => __('Before Single Product', 'woocommerce-catalog-mode'),
                    'woocommerce_before_single_product_summary' => __('Before Single Product Summary', 'woocommerce-catalog-mode'),
                    'woocommerce_single_product_summary' => __('In Single Product Summary', 'woocommerce-catalog-mode'),
                    'woocommerce_before_add_to_cart_form' => __('Before Add To Cart Form', 'woocommerce-catalog-mode'),
                    'woocommerce_before_add_to_cart_quantity' => __('Before Add To Cart Quantity', 'woocommerce-catalog-mode'),
                    'woocommerce_after_add_to_cart_quantity' => __('After Add To Cart Quantity', 'woocommerce-catalog-mode'),
                    'woocommerce_after_add_to_cart_button' => __('After Add To Cart Button', 'woocommerce-catalog-mode'),
                    'woocommerce_after_add_to_cart_form' => __('After Add To Cart Form', 'woocommerce-catalog-mode'),
                    'woocommerce_product_meta_start' => __('Before Meta Information', 'woocommerce-catalog-mode'),
                    'woocommerce_product_meta_end' => __('After Meta Information', 'woocommerce-catalog-mode'),
                    'woocommerce_after_single_product_summary' => __('After Single Product Summary', 'woocommerce-catalog-mode'),
                    'woocommerce_after_single_product' => __('After Single Product', 'woocommerce-catalog-mode'),
                    'woocommerce_after_main_content' => __('After Main Product', 'woocommerce-catalog-mode'),
                ),
                'required' => array('buttonEnabled','equals','1'),
            ),
           array(
                'id'       => 'buttonPriority',
                'type'     => 'spinner',
                'title'    => __( 'Button Priority', 'woocommerce-catalog-mode' ),
                'min'      => '1',
                'step'     => '1',
                'max'      => '999',
                'default'  => '30',
                'required' => array('buttonEnabled','equals','1'),
            ),
            array(
                'id'       => 'buttonAction',
                'type'     => 'select',
                'title'    => __('Button Action', 'wordpress-store-locator'), 
                'subtitle' => __('What happens when the User clicks the button.', 'wordpress-store-locator'),
                'options'  => array(
                    '1' => __('Open Store Locator Modal', 'wordpress-store-locator' ),
                    '2' => __('Go to custom URL', 'wordpress-store-locator' ),
                ),
                'default'  => '1',
                'required' => array('buttonEnabled','equals','1'),
            ),
            array(
                'id'       => 'buttonActionURL',
                'type'     => 'text',
                'title'    => __('Button custom URL', 'wordpress-store-locator'),
                'subtitle' => __('The URL where the user will be sent to when he clicked the button.', 'wordpress-store-locator'),
                'validate' => 'url',
                'required' => array('buttonAction','equals','2'),
            ),
            array(
                'id'       => 'buttonActionURLTarget',
                'type'     => 'select',
                'title'    => __('Custom Button URL target', 'wordpress-store-locator'),
                'subtitle' => __('The target attribute of the link.', 'wordpress-store-locator'),
                'options'  => array(
                    '_self' => __('_self (same Window)', 'wordpress-store-locator'),
                    '_blank' => __('_blank (new Window)', 'wordpress-store-locator'),
                    '_parent' => __('_parent (parent Window)', 'wordpress-store-locator'),
                    '_top' => __('_top (full body of the Window)', 'wordpress-store-locator'),
                ),
                'default'  => '_self',
                'required' => array('buttonAction','equals','2'),
            ),
            array(
                'id'       => 'buttonModalPosition',
                'type'     => 'select',
                'title'    => __('Modal Code Position', 'wordpress-store-locator'),
                'subtitle' => __('The position of the Store locator.', 'wordpress-store-locator'),
                'default'  => 'wp_footer',
                'options'  => array(
                    'wp_footer' => __('Footer', 'wordpress-store-locator'),      
                    'woocommerce_before_main_content' => __('Before Main Content', 'wordpress-store-locator'),
                    'woocommerce_before_single_product' => __('Before Single Product', 'wordpress-store-locator'),
                    'woocommerce_before_single_product_summary' => __('Before Single Product Summary', 'wordpress-store-locator'),
                    'woocommerce_single_product_summary' => __('In Single Product Summary', 'wordpress-store-locator'),
                    'woocommerce_product_meta_start' => __('Before Meta Information', 'wordpress-store-locator'),
                    'woocommerce_product_meta_end' => __('After Meta Information', 'wordpress-store-locator'),
                    'woocommerce_after_single_product_summary' => __('After Single Product Summary', 'wordpress-store-locator'),
                    'woocommerce_after_single_product' => __('After Single Product', 'wordpress-store-locator'),
                    'woocommerce_after_main_content' => __('After Main Product', 'wordpress-store-locator'),
                ),
                'required' => array('buttonAction','equals','1'),
            ),
            array(
                'id'       => 'buttonModalSize',
                'type'     => 'select',
                'title'    => __('Modal size', 'wordpress-store-locator'),
                'subtitle' => __('Size of the modal.', 'wordpress-store-locator'),
                'options'  => array(
                    'normal' => __('Normal', 'wordpress-store-locator'),
                    'modal-sm' => __('Small', 'wordpress-store-locator'),
                    'modal-lg' => __('Large', 'wordpress-store-locator'),
                ),
                'default'  => '',
                'required' => array('buttonAction','equals','1'),
            ),
            array(
                'id'     =>'buttonExcludeProductCategories',
                'type' => 'select',
                'data' => 'categories',
                'args' => array('taxonomy' => array('product_cat')),
                'ajax' => true,
                'multi' => true,
                'title' => __('Exclude Product Categories', 'wordpress-store-locator'), 
                'subtitle' => __('Which product categories should be excluded by the catalog mode.', 'wordpress-store-locator'),
                'required' => array('buttonEnabled','equals','1'),
            ),
            array(
                'id'       => 'buttonExcludeProductCategoriesRevert',
                'type'     => 'checkbox',
                'title'    => __( 'Revert Categories Exclusion', 'wordpress-store-locator' ),
                'subtitle' => __( 'Instead of exclusion it will include.', 'wordpress-store-locator' ),
                'required' => array('buttonEnabled','equals','1'),
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Defaults', 'wordpress-store-locator' ),
        'id'         => 'defaults',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'defaultAddress1',
                'type'     => 'text',
                'title'    => __('Default Address 1', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultAddress2',
                'type'     => 'text',
                'title'    => __('Default Address 2', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultZIP',
                'type'     => 'text',
                'title'    => __('Default ZIP', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultCity',
                'type'     => 'text',
                'title'    => __('Default City', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultRegion',
                'type'     => 'text',
                'title'    => __('Default Region', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultCountry',
                'type'     => 'select',
                'title'    => __('Default Country', 'wordpress-store-locator'),
                'options' => array( "AF" => "Afghanistan", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "BQ" => "British Antarctic Territory", "IO" => "British Indian Ocean Territory", "VG" => "British Virgin Islands", "BN" => "Brunei", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CT" => "Canton and Enderbury Islands", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos [Keeling] Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo - Brazzaville", "CD" => "Congo - Kinshasa", "CK" => "Cook Islands", "CR" => "Costa Rica", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "CI" => "Côte d’Ivoire", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "NQ" => "Dronning Maud Land", "DD" => "East Germany", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "FQ" => "French Southern and Antarctic Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island and McDonald Islands", "HN" => "Honduras", "HK" => "Hong Kong SAR China", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JT" => "Johnston Island", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau SAR China", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "FX" => "Metropolitan France", "MX" => "Mexico", "FM" => "Micronesia", "MI" => "Midway Islands", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar [Burma]", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NT" => "Neutral Zone", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "KP" => "North Korea", "VD" => "North Vietnam", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PC" => "Pacific Islands Trust Territory", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territories", "PA" => "Panama", "PZ" => "Panama Canal Zone", "PG" => "Papua New Guinea", "PY" => "Paraguay", "YD" => "People's Democratic Republic of Yemen", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn Islands", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RO" => "Romania", "RU" => "Russia", "RW" => "Rwanda", "RE" => "Réunion", "BL" => "Saint Barthélemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "CS" => "Serbia and Montenegro", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and the South Sandwich Islands", "KR" => "South Korea", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "ST" => "São Tomé and Príncipe", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UM" => "U.S. Minor Outlying Islands", "PU" => "U.S. Miscellaneous Pacific Islands", "VI" => "U.S. Virgin Islands", "UG" => "Uganda", "UA" => "Ukraine", "SU" => "Union of Soviet Socialist Republics", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "ZZ" => "Unknown or Invalid Region", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VA" => "Vatican City", "VE" => "Venezuela", "VN" => "Vietnam", "WK" => "Wake Island", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe", "AX" => "Åland Islands" ),
            ),
            array(
                'id'       => 'defaultTelephone',
                'type'     => 'text',
                'title'    => __('Default Telephone', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultMobile',
                'type'     => 'text',
                'title'    => __('Default Mobile', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultFax',
                'type'     => 'text',
                'title'    => __('Default Fax', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultEmail',
                'type'     => 'text',
                'title'    => __('Default Email', 'wordpress-store-locator'),
                'default'  => 'info@',
            ),
            array(
                'id'       => 'defaultWebsite',
                'type'     => 'text',
                'title'    => __('Default Website', 'wordpress-store-locator'),
                'default'  => 'http://',
            ),
            array(
                'id'       => 'defaultChat',
                'type'     => 'text',
                'title'    => __('Default Chat', 'wordpress-store-locator'),
                'default'  => '',
            ),
            array(
                'id'       => 'defaultRanking',
                'type'     => 'text',
                'title'    => __('Default Ranking', 'wordpress-store-locator'),
                'default'  => '10',
            ),
            array(
                'id'       => 'defaultOpen',
                'type'     => 'text',
                'title'    => __('Default Open (Mo - Fr)', 'wordpress-store-locator'),
                'default'  => '08:00',
            ),
            array(
                'id'       => 'defaultClose',
                'type'     => 'text',
                'title'    => __('Default Close (Mo - Fr)', 'wordpress-store-locator'),
                'default'  => '17:00',
            ),
        )
    ) );

    $framework::setSection( $opt_name, array(
        'title'      => __( 'Advanced settings', 'wordpress-store-locator' ),
        'desc'       => __( 'Custom stylesheet / javascript.', 'wordpress-store-locator' ),
        'id'         => 'advanced',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'filterQueryOperator',
                'type'     => 'select',
                'title'    => __( 'Filter Query Operator', 'wordpress-store-locator' ),
                'subtitle' => __( 'Choose if filters should show stores matching all (AND) filter or just one filter (OR)', 'wordpress-store-locator' ),
                'options'  => array(
                    'AND' => __('AND', 'wordpress-store-locator'),
                    'OR' => __('OR', 'wordpress-store-locator'),
                ),
                'default' => 'AND',
            ),
            array(
                'id'       => 'disableReplaceState',
                'type'     => 'checkbox',
                'title'    => __( 'Disable Replace State', 'wordpress-store-locator' ),
                'subtitle' => __( 'Check this to stop adding query parameters to URLs.', 'wordpress-store-locator' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'useOutputBuffering',
                'type'     => 'checkbox',
                'title'    => __( 'Use Output Buffering', 'wordpress-store-locator' ),
                'subtitle' => __( 'Uncheck this if you see blank strings.', 'wordpress-store-locator' ),
                'default'  => '1',
            ),
            array(
                'id'       => 'doNotLoadBootstrap',
                'type'     => 'checkbox',
                'title'    => __( 'Do Not load Bootstrap', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'doNotLoadFontAwesome',
                'type'     => 'checkbox',
                'title'    => __( 'Do Not load Font Awesome', 'wordpress-store-locator' ),
                'default'  => 0,
            ),
            array(
                'id'       => 'performanceRenderOnThesePages',
                'type'     => 'select',
                'title'    => __('Performance (Render only on these pages)', 'wordpress-store-locator'),
                'multi'    => true,
                'data'     => 'pages',
                'ajax'     => 'true',
            ),
            array(
                'id'       => 'showEmptyFilters',
                'type'     => 'checkbox',
                'title'    => __( 'Show empty filters', 'wordpress-store-locator' ),
                'subtitle' => __( 'Show filters where no store is attached in the frontend.', 'wordpress-store-locator' ),
                'default'  => '0',
            ),
            array(
                'id'       => 'customCSS',
                'type'     => 'ace_editor',
                'mode'     => 'css',
                'title'    => __( 'Custom CSS', 'wordpress-store-locator' ),
                'subtitle' => __( 'Add some stylesheet if you want.', 'wordpress-store-locator' ),
            ),
            array(
                'id'       => 'customJS',
                'type'     => 'ace_editor',
                'mode'     => 'javascript',
                'title'    => __( 'Custom JS', 'wordpress-store-locator' ),
                'subtitle' => __( 'Add some javascript if you want.', 'wordpress-store-locator' ),
            ),           
        )
    ));


    /*
     * <--- END SECTIONS
     */
