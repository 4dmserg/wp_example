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
define( 'DB_NAME', 'peCLDKJQIeC2' );

/** MySQL database username */
define( 'DB_USER', 'axKVqA6hEJBg' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dvNdP4457cOaHil' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '5fbHd$L2/~b4;63.8hz`];r;HvJP#Yg-iV(xC$wyE|fy~}=6Wm-olCvWe8NXt#zh' );
define( 'SECURE_AUTH_KEY',  'FgLp|Tk4a#c&r0s4[/&psm#Tk;>VXB1H]$4GTfQtlNfb>Q*[OjY(9K7,-Qd;@UOp' );
define( 'LOGGED_IN_KEY',    'aDKBLr1HD9v,=8+rz<S2hmceBjPwA-(i/a+|~qP+{!^A/;2(.ik2YqP5P22betQK' );
define( 'NONCE_KEY',        '9]utuiT|<g@]KA,@+E<Gp2Xi$T0<sHw;bRXFJ8vw$s(,[&5lNC?j<VAG./:haYa?' );
define( 'AUTH_SALT',        'X([R>5xZ/+J/Si|tO;6oRl|cNfZA+grWZowSM%S,^<e:lpIc-e!y(^a/P Z9F}~,' );
define( 'SECURE_AUTH_SALT', '`*B]<K(/b`h|Ec|EO9;~%Agi[Vyuk@@;6Bzx~fZPux;p[)z5J-Kb6@sp$wFd-ot=' );
define( 'LOGGED_IN_SALT',   '6O/6e7R~W@C) !PjU?r=p41B%>euHS~xCUmu=)qfu=?}vi7RwBCOfcW?~-KaoO2{' );
define( 'NONCE_SALT',       'p EHy*r37_NE`XE6Iv|,rCzkF%6~*yzklsaH9+?eC`l)lj.%l8n>=a-9$qWaUq{4' );

define( 'WP_AUTO_UPDATE_CORE', false );
define( 'automatic_updater_disabled', false );
/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
