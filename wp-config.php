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
define( 'DB_NAME', 'travelmonster' );

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
define( 'AUTH_KEY',         'NnIw*RN4=4w*/+v.CGjR,u?.:a/+>BY$Ml.AZRNhss69|-ksVyGp%G0(=xV9UA,-' );
define( 'SECURE_AUTH_KEY',  '5MqGv_I6jm >X3D;?D]#mE7=kl/~#a~GA*(t>kYaq>qtS?jWNRk6k#`gEwJ_|tu/' );
define( 'LOGGED_IN_KEY',    'BzX|3+Ubz`E)W])QoVG_K+p5mZw e!bw$(^9Ku%yvcP>/8|)sJkH|=%uA?uI,I5h' );
define( 'NONCE_KEY',        'HQ#iC*4<oS&d/gty(4e1CK-F`@UPI|}oB16l0pa`.~(?EkS4-oZwn3?V[hb8mcy8' );
define( 'AUTH_SALT',        '4wwjFU)=[a,:;6D+y HO;y|?$VQGWVTd45Z CL;OU?w3Mf5)rgaIAe3!+ON*QP1m' );
define( 'SECURE_AUTH_SALT', 'wn$hABroc^CYYiHi/_o?`jM:?LrcDXvlZwW#d|>a_)&xO`[a~7KpfFaFC:{`<zv:' );
define( 'LOGGED_IN_SALT',   '/>r:|2oqM<U#;z)QCjK1(dJYdy3qgKJ*&hnm8Wu4;yU<~rYHf7$+a?53I%i)O69M' );
define( 'NONCE_SALT',       'D^AJWedl2o{k866r# [.>CRp;`s^*vE?6uGw GqcYXhybXFho+0LJWEL.HA6cQ;[' );

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
