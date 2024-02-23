<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://welaunch.io/plugins
 * @since             1.0.0
 * @package           WordPress_Store_Locator
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Store Locator
 * Plugin URI:        https://www.welaunch.io/en/product/wordpress-store-locator/
 * Description:       Add a Store Locator to your WordPress!
 * Version:           2.2.1
 * Author:            weLaunch
 * Author URI:        https://welaunch.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordpress-store-locator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordpress-store-locator-activator.php
 */
function activate_WordPress_Store_Locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-store-locator-activator.php';
	WordPress_Store_Locator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordpress-store-locator-deactivator.php
 */
function deactivate_WordPress_Store_Locator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-store-locator-deactivator.php';
	WordPress_Store_Locator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WordPress_Store_Locator' );
register_deactivation_hook( __FILE__, 'deactivate_WordPress_Store_Locator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordpress-store-locator.php';

/**
 * Run the Plugin
 * @author Daniel Barenkamp
 * @version 1.0.0
 * @since   1.0.0
 * @link    https://welaunch.io/plugins
 */
function run_WordPress_Store_Locator() {

	$plugin_data = get_plugin_data( __FILE__ );
	$version = $plugin_data['Version'];

	$plugin = new WordPress_Store_Locator($version);
	$plugin->run();

	return $plugin;

}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('welaunch-framework/welaunch-framework.php') || is_plugin_active('redux-framework/redux-framework.php') || is_plugin_active('redux-dev-master/redux-framework.php') ){
	$WordPress_Store_Locator = run_WordPress_Store_Locator();
} else {
	add_action( 'admin_notices', 'run_WordPress_Store_Locator_Not_Installed' );
}

function run_WordPress_Store_Locator_Not_Installed()
{
	?>
    <div class="error">
      <p><?php _e( 'WordPress Store Locator requires the weLaunch Framework plugin. Please install or activate it before: https://www.welaunch.io/updates/welaunch-framework.zip', 'wordpress-store-locator'); ?></p>
    </div>
    <?php
}

function file_not_writeable()
{
	?>
    <div class="error">
      <p><?php _e( 'The custom CSS file in our plugin folder is not writeable! Please change file permissions of wp-content/plugins/wordpress-store-locator/public/css/wordpress-store-locator-custom.css to chmod 0777.', 'wordpress-store-locator'); ?></p>
    </div>
    <?php
}
