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
define('DB_NAME', 'module_speedtest_e4');

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
define('AUTH_KEY',         'F},u^|dBh?>}l2dmyTW3;sU2>dn!zZ!nPpCyIUW^8,oMB(#ZQ~1oTeSW(;zgPfKy');
define('SECURE_AUTH_KEY',  'l,YHTv%=W*6P x{]s;0CZZpY+*uJZqUU-a=N6dV{1pj,%&Vuoj*TI1]||]zDFRZG');
define('LOGGED_IN_KEY',    '6JpPOr6(,gGlf<]p:8fy9!lu0}2<Ztw},<+k-o{d6#*&q:2L=&JL(D%dmhAv0xtd');
define('NONCE_KEY',        '!&5 +_Ee*w8(z^Ei%55GV`/9K+ygZp6dCg.k`jach,]c(Td6_=Ez]D<v%*LV|AfM');
define('AUTH_SALT',        'DUfT0WVM:@zO{$KD}N:5wiqKQl9*Csg.!(#;;`FwTk:P0?CFck;T]yPGS>F$<nEl');
define('SECURE_AUTH_SALT', 'aeGK<lS{,K.4vFk$!B=xI+/` 8q)#v2O]^ d, XbTSu;Tyrakd`HD9|m[#iI$Ks7');
define('LOGGED_IN_SALT',   'Jaoy0V^[q~;N<sPlH)K^I+K)thNCT_T.w 8toBPR}%688A^]>^uTMVGAIj9_8M(J');
define('NONCE_SALT',       'c~y(d:?n,zaNdp27#][~EV7D50I*Rq9.S<kf<A+Riq_}%)l7PflY(lZiI(C}*UG5');

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
