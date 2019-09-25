<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_v1sxv');

/** MySQL database username */
define( 'DB_USER', 'wp_h8m3k');

/** MySQL database password */
define( 'DB_PASSWORD', '5_Vl28beTU');

/** MySQL hostname */
define( 'DB_HOST', '74.208.228.35:3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '864ba796924236a40ad87c2d7a9a1394beca13d5');
define( 'SECURE_AUTH_KEY',  'af44723b592ea4d8134e4faba20def1644a0341a');
define( 'LOGGED_IN_KEY',    '3c4cdab6a0179f605864ad532be9635b2343e9d5');
define( 'NONCE_KEY',        '2eedadac41e43946f4f6ba6a1668e229ca4aae22');
define( 'AUTH_SALT',        'a203934dbcb91c18a99926ad9cb5bdae6cf8a34c');
define( 'SECURE_AUTH_SALT', 'd2e3f75d8aa792682f70c9deee37d07fd43fc0f6');
define( 'LOGGED_IN_SALT',   'f678dab09451e6e8f46a5c4a8de1ce9a3c1d2d05');
define( 'NONCE_SALT',       '5b78e23a4e68b8894a1b26038b01bafc93f8e649');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true);

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
