<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'snorkellifts_wp_ao3xc' );

/** Database username */
define( 'DB_USER', 'snorkellifts_wp_w6kc3' );

/** Database password */
define( 'DB_PASSWORD', 'J9_u9^hTrsH!BKj6' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '8%ujW+@34@QUEM#T2nHW5C~;9%9#4swfM2U)*:W:q_f!X0b#b0GG5&9F8P!xcAMb');
define('SECURE_AUTH_KEY', 'Q)y|@nmM9!9NHh/(cw50&)C67YS2To;hlwO_35rz2q/4_0%6[fDef#eLaHatJZM*');
define('LOGGED_IN_KEY', 'cz:#T3|(WfuV7Xy;)#vukt~#2;8U)]+V/U6GsgH3y3m-(E*!4_7Uv5O3t//u;#Eh');
define('NONCE_KEY', '&5e_#2S5xZn752~H!a74h4X7ce37H03z|MQ&06D[)-NxEnuGC76%l-8*j)NRrIRB');
define('AUTH_SALT', 'G~Op1T4*3&Rg51st5UTmAWzD80Aa!!ZvjHK947kv9y9&&&C39lh1_i_8H]laZ;%w');
define('SECURE_AUTH_SALT', '468BAk7RP!Avih*fjR8e*6786V*vO-/2[4lJ6;7Uk:M![Q9+VT#H3w17#sG0y1Wp');
define('LOGGED_IN_SALT', 'U2h:XK|9*~*7W85j59oM1G@b6To5C661(A8i4G9)4iVXOo&0&U26HlOv8/H21[R)');
define('NONCE_SALT', '/10:v%_a2t5B9SlFi#MtHX_35z8)25oOh/(O1Pt;t2i1YS3g;h[VRZ*:G76~BGg6');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '3KW4Y6s_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
define( 'DOMAIN_CURRENT_SITE', 'snorkellifts.com' );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
