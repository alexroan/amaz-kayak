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

include '.env.php';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fP&Rd<w^!7p:Y`c2axtN_g6FIa`$#y]ub$*k/z_]WB.Cz)aSM6^:MgiAQhb+wWNP');
define('SECURE_AUTH_KEY',  't5NT0*Fnk#e(D0%TlE(DSu,cJJ_EqeimeYol8qK0ruh)zm]{95`lnn[^~:TFXIeK');
define('LOGGED_IN_KEY',    'M1n|D_-gO6 w>ZyM?c0Dl*$oyb)GJ)`UKt{3}:w3cR|rCYUWr{Ip/O]ZQ#3S3c]M');
define('NONCE_KEY',        '_<<K<ezs{kWd}Sm=1g!SlMfb(? K&w^tvnSiF:Dm=]=ofVbX6>V#Ko?cha}3E#]&');
define('AUTH_SALT',        'E5D?fN R|Q`7]6{`/2+nN(/%,~Car{1BLPhM?/)~U7)4%O zH9b#$7=.Ld*Ec u;');
define('SECURE_AUTH_SALT', '=4]+iC`E/7Q~kT5cMm,Ar&.lk+&}E;2(s;a(p?u>$G#!LZUoZ+yH;`V,PYc@b&v#');
define('LOGGED_IN_SALT',   'ZObGDxJI,hG5S=+wI4o=Tl2ib6$t&TZxd)xx*9QnhuUo@Zlh_0QBM@EmATD$BJtx');
define('NONCE_SALT',       '8nYWx@qu?zu#@_gf^>-B>`(yS0r6FsKeF_`aYGco@bdt~4-?8Sf2zr,YHm@4-ia ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
