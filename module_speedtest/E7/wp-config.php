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
define('DB_NAME', 'module_speedtest_e7');

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
define('AUTH_KEY',         '$C3IfmU74Hkr.%RH+%|1(]ieLG+sdNB$wUv$2B!FlOn?_;90;x$Dg6n:L DVDQd9');
define('SECURE_AUTH_KEY',  'gG/D+}`jj>h|z{QTZq-_xzC!|A^}*AR_0]P|!z/A*K]<RHU[U nT7-[7a7O)9+N(');
define('LOGGED_IN_KEY',    'M-m,)X8=,TA;b#gm[AJC|UPYNe|(I6{)$BGa7RRO(2#NKbKHjnF$b3Q*08V}a|U~');
define('NONCE_KEY',        '#oCz{(*k1G(&BaJ7%T2>k/Kkvx,s<CJ7=q2{y|IqQWM0y$DZ+tur||ttC1>T@UVk');
define('AUTH_SALT',        ' Ot%@x=C@O6Q~ScW`|~@hm$<{FTRv5CEAWD?fC:Nxf=hIq!k!UD!B-uo7H9L21+;');
define('SECURE_AUTH_SALT', '$IXa]A2=RC&An&o-Z*:W8O`6C=)98pfDtKAoc#rAES#nTy/[8b4k|7{.fB2NhFfV');
define('LOGGED_IN_SALT',   '%P<D}ykbu7>zUNIo[CK|;:4L$JoZ>H(0_iS/[_]=nM)2/ktx)iQBE)3H5_<JK>/$');
define('NONCE_SALT',       '[0YDQJ8qTElk5#!@&O1xMIP&l6A3O#jqxWB5SKEFj{sG8y<xSyHS(h=g@aG;$&b;');

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
