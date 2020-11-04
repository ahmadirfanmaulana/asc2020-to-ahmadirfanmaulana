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
define('DB_NAME', 'module_speedtest_e1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '>1<,mAX6!Mdq pZ(N8Rwvc O.M Ut>xkM_(:B:<9/.?-xBo(t]-9mrXM}yVRG@(P');
define('SECURE_AUTH_KEY',  '|s^V[2a)6eJZxKuWGw*9[%p/OeXDZW=kn*r]j3>dy6JZ0X.c$LcN>gEn9y,O7zu?');
define('LOGGED_IN_KEY',    'pdMKm8%caPE }kS2hg*m#GWO)0~=[,jStSX0c+A*I+*l]o}NP2zSz.&, rEo_}@=');
define('NONCE_KEY',        'h_XGA*G4aI UywF$8)KKvm{fQyK6;8S)Cj*eSglW6;/T[tv~h=3A}6Kc|fj,E:&:');
define('AUTH_SALT',        'U}Lnvg<%.sLaCl:R[s^X~&uNzvu*vOlHJGE%*Z[*|zYl`An5j[VV[4aa;o-xY(yH');
define('SECURE_AUTH_SALT', '?r4C.=9Z,TJecDu^$2 Ac=3U1JiM[DB?>0.f)(2Y+KP98^|i?wYRV):LSJig&kOK');
define('LOGGED_IN_SALT',   'dUR]]CAS=&d`CE`0,:0;45%%^@jjR-nAO$m9G8vOwTW?Fip5Yu45FKWlmfFGK49m');
define('NONCE_SALT',       'J9nk_JGr?B`5eq(Ym3;n)+ $aZ]}NIEte$u|E8ir>{VhL&*HPL@3`2hUc$xXBcUi');

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
