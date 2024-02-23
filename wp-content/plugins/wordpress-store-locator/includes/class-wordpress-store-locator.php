<?php

/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://welaunch.io/plugins
 * @since      1.0.0
 */

class WordPress_Store_Locator
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     *
     * @var WordPress_Store_Locator_Loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     *
     * @var string The string used to uniquely identify this plugin.
     */
    protected $plugin_name;
    protected $plugin_i18n;
    protected $plugin_admin;
    protected $plugin_post_type;
    protected $plugin_importer;
    protected $plugin_exporter;
    protected $plugin_public;
    protected $plugin_public_ajax;
    protected $listing;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     *
     * @var string The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct($version)
    {
        $this->plugin_name = 'wordpress-store-locator';
        $this->version = $version;

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - WordPress_Store_Locator_Loader. Orchestrates the hooks of the plugin.
     * - WordPress_Store_Locator_i18n. Defines internationalization functionality.
     * - WordPress_Store_Locator_Admin. Defines all hooks for the admin area.
     * - WordPress_Store_Locator_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-wordpress-store-locator-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-wordpress-store-locator-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wordpress-store-locator-admin.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wordpress-store-locator-post-type.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wordpress-store-locator-importer.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wordpress-store-locator-exporter.php';
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wordpress-store-locator-delete.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'public/class-wordpress-store-locator-public.php';
        require_once plugin_dir_path(dirname(__FILE__)).'public/class-wordpress-store-locator-listing.php';
        require_once plugin_dir_path(dirname(__FILE__)).'public/class-wordpress-store-locator-public-ajax.php';

        if (file_exists(plugin_dir_path(dirname(__FILE__)).'admin/Tax-meta-class/Tax-meta-class.php')) {
            require_once plugin_dir_path(dirname(__FILE__)).'admin/Tax-meta-class/Tax-meta-class.php';
        }

        // Load Vendors
        if (file_exists(plugin_dir_path(dirname(__FILE__)).'vendor/autoload.php')) {
            require_once plugin_dir_path(dirname(__FILE__)).'vendor/autoload.php';
        }

        $this->loader = new WordPress_Store_Locator_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the WordPress_Store_Locator_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     */
    private function set_locale()
    {
        $this->plugin_i18n = new WordPress_Store_Locator_i18n();

        $this->loader->add_action('plugins_loaded', $this->plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function define_admin_hooks()
    {                
        $this->plugin_admin = new WordPress_Store_Locator_Admin($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('init', $this->plugin_admin, 'init', 1);
        $this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_styles', 999);
        $this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_scripts', 999);
        $this->loader->add_action('plugins_loaded', $this->plugin_admin, 'load_extensions');
        
        $this->plugin_post_type = new WordPress_Store_Locator_Post_Type($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('init', $this->plugin_post_type, 'init', 90);
        $this->loader->add_action('add_meta_boxes', $this->plugin_post_type, 'add_custom_metaboxes', 10, 2);
        $this->loader->add_action('save_post', $this->plugin_post_type, 'save_custom_metaboxes', 1, 2);
        $this->loader->add_filter('posts_join', $this->plugin_post_type, 'admin_meta_search_join', 10, 1);
        $this->loader->add_filter('posts_where', $this->plugin_post_type, 'admin_meta_search_where', 10, 1);
        $this->loader->add_filter('posts_groupby', $this->plugin_post_type, 'admin_meta_search_limits', 10, 1);

        $this->plugin_importer = new WordPress_Store_Locator_Importer($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('init', $this->plugin_importer, 'init', 999);

        $this->plugin_exporter = new WordPress_Store_Locator_Exporter($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('init', $this->plugin_exporter, 'init', 999);

        if(isset($_GET['delete-stores']))
        {
            $this->plugin_delete = new WordPress_Store_Locator_Delete($this->get_plugin_name(), $this->get_version());
            $this->loader->add_action( 'init', $this->plugin_delete, 'init' );
        }
        if(isset($_GET['get-import-file']))
        {
            $this->loader->add_action( 'init', $this->plugin_exporter, 'getSampleImportFile', 100 );
        }
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function define_public_hooks()
    {
        $this->plugin_public = new WordPress_Store_Locator_Public($this->get_plugin_name(), $this->get_version());
        $this->plugin_public_ajax = new WordPress_Store_Locator_Public_Ajax($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $this->plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $this->plugin_public, 'enqueue_scripts', 99999);

        $this->loader->add_action('wp_ajax_nopriv_get_stores', $this->plugin_public_ajax, 'get_stores');
        $this->loader->add_action('wp_ajax_get_stores', $this->plugin_public_ajax, 'get_stores');

        $this->loader->add_action('wp_ajax_nopriv_get_along_route_stores', $this->plugin_public_ajax, 'get_along_route_stores');
        $this->loader->add_action('wp_ajax_get_along_route_stores', $this->plugin_public_ajax, 'get_along_route_stores');
        

        $this->loader->add_action('wp_ajax_nopriv_get_all_stores', $this->plugin_public_ajax, 'get_all_stores');
        $this->loader->add_action('wp_ajax_get_all_stores', $this->plugin_public_ajax, 'get_all_stores');

        $this->loader->add_action('wp_ajax_nopriv_get_nearest_store', $this->plugin_public_ajax, 'get_nearest_store');
        $this->loader->add_action('wp_ajax_get_nearest_store', $this->plugin_public_ajax, 'get_nearest_store');

        $this->loader->add_action('wp_ajax_nopriv_get_stores_by_name', $this->plugin_public_ajax, 'get_stores_by_name');
        $this->loader->add_action('wp_ajax_get_stores_by_name', $this->plugin_public_ajax, 'get_stores_by_name');
        
        $this->loader->add_action('wp_ajax_nopriv_get_single_store_live_position', $this->plugin_public_ajax, 'get_single_store_live_position');
        $this->loader->add_action('wp_ajax_get_single_store_live_position', $this->plugin_public_ajax, 'get_single_store_live_position');

        

        $this->loader->add_action('init', $this->plugin_public, 'init');

        $this->listing = new WordPress_Store_Locator_Listing($this->get_plugin_name(), $this->get_version());
        $this->loader->add_action('init', $this->listing, 'init');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     *
     * @return string The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     *
     * @return WordPress_Store_Locator_Loader Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     *
     * @return string The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}
?>