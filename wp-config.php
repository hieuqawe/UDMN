<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hatdieu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'mf:1:/Ka_S/efHn{uyI_bw_~/![p7+/i3U9zPSua6k[_$ZwPn0&spnpuXpl9|*J}' );
define( 'SECURE_AUTH_KEY',  'ov*kSzfI L/kja#WTXBi;uMNX(PDrf;}l0:up1j=g,Is./UTKE)3y-u(6cXFT(9e' );
define( 'LOGGED_IN_KEY',    '@35q-UF.YnYt}MH[@7O[l;n&SnF1Bs>o=h/b-V3?KEI:Vnpk]Udh+:6:::#DLI^#' );
define( 'NONCE_KEY',        '%:31J}^3*=uW%C[4VKCF{<dj+E$nT8Y]aMpvD>fW32ee;o5_.sL=kuW-1sP1:tz]' );
define( 'AUTH_SALT',        '3AnMJ).mY!wt-nPn,}yu`sN->@]jK#UbZG>{}z*_Mq0 @J(7,Ce77ypEv.CJJfYA' );
define( 'SECURE_AUTH_SALT', 'I^#QwEdctNzVGbqqat{p _. Ka=#YSLrr,pf]VF,`g7yB`[,Ov.mdN[jI04Dln;v' );
define( 'LOGGED_IN_SALT',   'c0/K4X{?J[u4l[iVf^0ZMlU2KjDI#r5k}JAn^5/S&t.1m,r1P6p%N[L97sW=+t0m' );
define( 'NONCE_SALT',       'zP@}8;%qG=pA7Cg/9Pd5?nk$5>Bqm)EBwJ-F_%3RP#+@qS&eZ7gVBTo5YQlj-SfC' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'bz_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
