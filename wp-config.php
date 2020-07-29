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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_github_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7Q{HR<rX-#,kmaY;}E>$|NCRz.0:p1YNC^i4EE>Vz`.w:]&,}$$pY]@0,cS9|]=F' );
define( 'SECURE_AUTH_KEY',  'd[5cCaK;z!T?s@NgFE)+S8`,m(.Vhj ?j{M<?Z&Ic:O+w3~}aJs<%P$sl&:Sr0&Y' );
define( 'LOGGED_IN_KEY',    '~]/$9Jg#T,Re162w#vhznMQW`+lN.2:H$dR9t7ob`IT)j:$nFj2@-:N>c0*^@q9W' );
define( 'NONCE_KEY',        ';#K_.8wUr]din/ee1>woj,|3%0c3pHio!t<RS/n,Ix#v{)Jmz_|btC%PMUp/k|#}' );
define( 'AUTH_SALT',        '0Jh`_9^bXi`{V`):[.GApQj[T%QHDrddz:6wK!o/_u%]0NMryrJFOiBf$5##^`pb' );
define( 'SECURE_AUTH_SALT', 'G.K#eff]VL>TH{Mu2vcSV@n9`jSEie{{$X{{XG*|hZW,~_NV~9-`E_VqNpPd&(}{' );
define( 'LOGGED_IN_SALT',   '1L>96&35srY/ C:%g+w-v=HtTsmx}XK55Qyc9[nn!K(^iF]tl eg LWh(HK,e*4:' );
define( 'NONCE_SALT',       'Po7D)fsqG=$B6tU_i82y2Lbf!0YPbY#$d|P+V1_u&{BH3Z?xzX}[&D7+nbHVl6E!' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
