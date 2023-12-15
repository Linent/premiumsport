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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'premiumsport_bd' );

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
define( 'AUTH_KEY',         '//Wj0v;,k,qUh,e?.R*U}4vh.p3he>:z*-Q?$U.P)QtRpnLQyKG@[g+=hkk#]_9m' );
define( 'SECURE_AUTH_KEY',  'EZpn/RYlmN%4?>Np[M4<.x?1uw9QHMZCuA5Q6)gpVH&,iGInTZF^HMTLkSP1G&_)' );
define( 'LOGGED_IN_KEY',    'r{$LDnv9YUVlr_#vLd2.jYAXa=Zk2>U{T1Jg$D,moC2d[tMAsKIgU7Ejq_xX@uw_' );
define( 'NONCE_KEY',        'Ya}p/C`ndktTY6`y-},U_XCmqaxz8|)p/A3!+;hf0o{9ppX(-yfj/%1,KJfve!Iq' );
define( 'AUTH_SALT',        ')cpBt[MzD Y>BCvYyt](s<El6~ d-I+JG9>RsiF$C.lqeEsHIbAq&?+M1by#sgJk' );
define( 'SECURE_AUTH_SALT', '7!aC<sLMnmT<H[MSC`!u`nO?G$Y.$/FAuz1[^+i9sVQ-@WKgMX=`l_DxhM,q3+c}' );
define( 'LOGGED_IN_SALT',   'Br4u?lM/-B8WQ8):T~r=0R=PSm03J(aT((XedgR9 {QIQdJ5cX)-J5u`##K)D{F:' );
define( 'NONCE_SALT',       'O?u`Leq2O^>5+hW(C`mWWR1nF5=dDaVi)SHkl=XpO3U;(B`iJ*MgaULID^);< uD' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
