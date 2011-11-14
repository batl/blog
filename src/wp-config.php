<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cmd_personal_blog');

/** MySQL database username */
define('DB_USER', 'cmd_root');

/** MySQL database password */
define('DB_PASSWORD', 'iKv1cDUl0l');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'yNksoN]551&oaq~}BGUhY i+0#0eKD=pRU0P,BU.?99bi[y,ud)bCLvtd#(k}.1l');
define('SECURE_AUTH_KEY',  ':CE6ku#5BW.q]*8jm=a6K$AE08J:y#4q%iV/`b,vCaM+vB2;X1 -u.^1qt1Tc`C(');
define('LOGGED_IN_KEY',    '-wHk>t><K?nnpL#4gjQUQ{})3%nuh.kh&DI0}$v}$CwBf[K[*9#lkLj$FXk2vmCR');
define('NONCE_KEY',        'WBo3hhL?;&N(IbuSy-{ Sf%Md5SO8O^/ve.b05f1:qOtneg-%8w#xy}N~J`j<!]/');
define('AUTH_SALT',        '8+bG7E#G?2u/pLhW.`YNI1@CCq+lT$-_.Qph#Iuap:!>vF-py>#lBeK%yKP7B)w<');
define('SECURE_AUTH_SALT', '*+%yLkTped/LDu*qZeIA-<zk|7dT=<6hZOE>Kt,rCaeDC #+$|OVg[l!E]%Fv#vM');
define('LOGGED_IN_SALT',   'h(zge~O}lzcg30?SQLVa8v@@Rz}2k5c5bebsl5RHM#$^nJwxc5F]E!]C MN!SgQ.');
define('NONCE_SALT',       's5&*A}d83i RkZ{p4PG?,mh2JEv -$jaE|3BJR`[X.@pBqkz_#fT2%<Ak<4{{#Is');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pb_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
