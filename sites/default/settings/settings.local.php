<?php
// Tell Drupal that we are behind a reverse proxy server
  $conf['reverse_proxy'] = TRUE;

  // List of trusted IPs (IP numbers of our reverse proxies)
  $conf['reverse_proxy_addresses'] = array(
    '127.0.0.1',
    '172.18.7.243',
  );

  #$_SERVER['HTTPS'] = 'on';
  #$_SERVER['SERVER_PORT'] = 443;

/**
 * @file
 * Local development override configuration feature.
 *
 * To activate this feature, copy and rename it such that its path plus
 * filename is 'sites/default/settings.local.php'. Then, go to the bottom of
 * 'sites/default/settings.php' and uncomment the commented lines that mention
 * 'settings.local.php'.
 *
 * If you are using a site name in the path, such as 'sites/example.com', copy
 * this file to 'sites/example.com/settings.local.php', and uncomment the lines
 * at the bottom of 'sites/example.com/settings.php'.
 */

/**
 * Assertions.
 *
 * The Drupal project primarily uses runtime assertions to enforce the
 * expectations of the API by failing when incorrect calls are made by code
 * under development.
 *
 * @see http://php.net/assert
 * @see https://www.drupal.org/node/2492225
 *
 * If you are using PHP 7.0 it is strongly recommended that you set
 * zend.assertions=1 in the PHP.ini file (It cannot be changed from .htaccess
 * or runtime) on development machines and to 0 in production.
 *
 * @see https://wiki.php.net/rfc/expectations
 */
assert_options(ASSERT_ACTIVE, TRUE);
\Drupal\Component\Assertion\Handle::register();

/**
 * Enable local development services.
 */
#$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/settings/local.services.yml';

/**
 * Show all error messages, with backtrace information.
 *
 * In case the error level could not be fetched from the database, as for
 * example the database connection failed, we rely only on this value.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Disable the render cache (this includes the page cache).
 *
 * Note: you should test with the render cache enabled, to ensure the correct
 * cacheability metadata is present. However, in the early stages of
 * development, you may want to disable it.
 *
 * This setting disables the render cache by using the Null cache back-end
 * defined by the development.services.yml file above.
 *
 * Do not use this setting until after the site is installed.
 */
# $settings['cache']['bins']['render'] = 'cache.backend.null';

/**
 * Disable caching for migrations.
 *
 * Uncomment the code below to only store migrations in memory and not in the
 * database. This makes it easier to develop custom migrations.
 */
# $settings['cache']['bins']['discovery_migration'] = 'cache.backend.memory';

/**
 * Disable Dynamic Page Cache.
 *
 * Note: you should test with Dynamic Page Cache enabled, to ensure the correct
 * cacheability metadata is present (and hence the expected behavior). However,
 * in the early stages of development, you may want to disable it.
 */
# $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

/**
 * Allow test modules and themes to be installed.
 *
 * Drupal ignores test modules and themes by default for performance reasons.
 * During development it can be useful to install test extensions for debugging
 * purposes.
 */
# $settings['extension_discovery_scan_tests'] = TRUE;

/**
 * Enable access to rebuild.php.
 *
 * This setting can be enabled to allow Drupal's php and database cached
 * storage to be cleared via the rebuild.php page. Access to this page can also
 * be gained by generating a query string from rebuild_token_calculator.sh and
 * using these parameters in a request to rebuild.php.
 */
#$settings['rebuild_access'] = TRUE;

/**
 * Skip file system permissions hardening.
 *
 * The system module will periodically check the permissions of your site's
 * site directory to ensure that it is not writable by the website user. For
 * sites that are managed with a version control system, this can cause problems
 * when files in that directory such as settings.php are updated, because the
 * user pulling in the changes won't have permissions to modify files in the
 * directory.
 */
$settings['skip_permissions_hardening'] = FALSE;

// Split out dev modules to only be included in local settings.
$config['config_split.config_split.dev_config']['status'] = FALSE;

// Env Indicator color codes
if (isset($_SERVER['HTTP_HOST']) === TRUE) {
	$subdomain = $_SERVER['HTTP_HOST'];

	switch($subdomain) {
		case 'snorkel.lndo.site':
		$config['environment_indicator.indicator']['bg_color'] = '#268800';
		$config['environment_indicator.indicator']['fg_color'] = '#ededed';
		$config['environment_indicator.indicator']['name'] = 'Local Dev';
		break;

		case 'devsnorkel.ahern.com':
		$config['environment_indicator.indicator']['bg_color'] = '#d8ce04';
		$config['environment_indicator.indicator']['fg_color'] = '#0a0a0a';
		$config['environment_indicator.indicator']['name'] = 'Server Dev';
		break;

		case 'stagesnorkel.ahern.com':
		$config['environment_indicator.indicator']['bg_color'] = '#ff9300';
		$config['environment_indicator.indicator']['fg_color'] = '#0a0a0a';
		$config['environment_indicator.indicator']['name'] = 'Stage';
		break;

		case 'www.snorkellifts.com':
		$config['environment_indicator.indicator']['bg_color'] = '#d42200';
		$config['environment_indicator.indicator']['fg_color'] = '#ededed';
		$config['environment_indicator.indicator']['name'] = 'Prod';
		break;
	}
}

$databases['default']['default'] = array (
  'database' => 'snorkelDP',
  'username' => 'snorkelDPUser',
  'password' => 'JFKKZ7LKflDyN0Oy',
  'prefix' => '',
  'host' => 'nv01lnxdb01prd.ahern.com',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
  'init_commands' => [
    'isolation_level' => 'SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED',
  ],
);
$settings['file_public_base_url'] = 'https://snorkellifts.com/sites/default/files';
$settings['memcache']['servers'] = ['127.0.0.1:11211' => 'default'];
$settings['memcache']['bins'] = ['default' => 'default'];
$settings['memcache']['key_prefix'] = 'snorkellifts_com';
#$settings['cache']['bins']['render'] = 'cache.backend.memcache';
#$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.memcache';
#
if (PHP_SAPI === 'cli') {
  ini_set('memory_limit', '4096M');
}
$settings['class_loader_auto_detect'] = FALSE;
ini_set('memory_limit', '2048M');
