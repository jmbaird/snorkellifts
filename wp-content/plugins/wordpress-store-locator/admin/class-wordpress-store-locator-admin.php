<?php

class WordPress_Store_Locator_Admin
{
    private $plugin_name;
    private $version;
    protected $options;

    /**
     * Construct Store Locator Admin Class
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
    }

    /**
     * Enqueue Admin Styles
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function enqueue_styles()
    {
        $mapsJS = 'https://maps.google.com/maps/api/js?libraries=places';
        $googleApiKey = $this->get_option('apiKey');
        if (!empty($googleApiKey)) {
            $mapsJS = $mapsJS . '&key=' . $googleApiKey;
        }

        wp_enqueue_script($this->plugin_name . '-gmaps', $mapsJS, array(), $this->version, true);

        wp_enqueue_style($this->plugin_name.'-custom', plugin_dir_url(__FILE__).'css/wordpress-store-locator-admin.css', array(), $this->version, 'all');

        $doNotLoadFontAwesome = $this->get_option('doNotLoadFontAwesome');
        if (!$doNotLoadFontAwesome) {
            wp_enqueue_style('font-awesome-store-locator', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), '5.14.0', 'all');
        }
        
    }

    /**
     * Enqueue Admin Scripts
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script( 'wp-color-picker');
        wp_enqueue_script($this->plugin_name.'-custom', plugin_dir_url(__FILE__).'js/wordpress-store-locator-admin.js', array('jquery', 'wp-color-picker'), $this->version, true);
    }

    /**
     * Load Extensions
     * @author Daniel Barenkamp
     * @version 1.0.0
     * @since   1.0.0
     * @link    https://welaunch.io/plugins
     * @return  boolean
     */
    public function load_extensions()
    {
        if(!is_admin() || !current_user_can('manage_options') || (defined('DOING_AJAX') && DOING_AJAX && (isset($_POST['action']) && !$_POST['action'] == "wordpress_store_locator_options_ajax_save") )) {
            return false;
        }

        // Load the theme/plugin options
        if (file_exists(plugin_dir_path(dirname(__FILE__)).'admin/options-init.php')) {
            require_once plugin_dir_path(dirname(__FILE__)).'admin/options-init.php';
        }
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

        if(!is_admin() || !current_user_can('administrator') || (defined('DOING_AJAX') && DOING_AJAX)){
            $wordpress_store_locator_options = get_option('wordpress_store_locator_options');
        }

        $tmp = array();
        if(isset($wordpress_store_locator_options['showCustomFields']) && is_array($wordpress_store_locator_options['showCustomFields'])) {
            $customFields = array_filter( $wordpress_store_locator_options['showCustomFields'] );
            if(!empty($customFields)) {
                foreach ($customFields as $customField) {
                    $tmp[ $this->slugify($customField) ] = esc_html($customField);
                }
            }
        }
        $wordpress_store_locator_options['showCustomFields'] = $tmp;

        $this->options = $wordpress_store_locator_options;
    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '_', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '_');

        // remove duplicate -
        $text = preg_replace('~-+~', '_', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
        return 'n-a';
        }

        return $text;
    }
}