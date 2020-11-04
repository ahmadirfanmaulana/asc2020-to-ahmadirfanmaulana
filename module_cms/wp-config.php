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
define('DB_NAME', 'module_cms');

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
define('AUTH_KEY',         'NssHbH.r}Sda|4A7x/Oj67sZ-^C,xjlK${jLI+QVP,x+*Q[v y8-50y7#9`<.P6.');
define('SECURE_AUTH_KEY',  't`i<Qaufa4no(Q&N:0lJo<xd9$3TB0jlMgIQ/s/v~p+xtW{e,.P!%9*1hTw]7?r+');
define('LOGGED_IN_KEY',    'MWtR~jZ[AvJ|<%.CM(6TAj+=iw~R3Zlan&%?.3zMOM-UlY?V$[YvsqMzXFLUy/vI');
define('NONCE_KEY',        'wywoZqFp?Jy{pHqZ8WvKRZ@;bdEeQ!*Igogil_{w?5miM+Oc#}>x9u kj#WPkSNG');
define('AUTH_SALT',        '@GvO![dniITE&IQEedan6s&eAiPY[_{X=8Sss*d>y*|yBb Z%Y8P|v]rd43/0e2-');
define('SECURE_AUTH_SALT', ':s+q4dy}Q}6*syyDmYL?]Vcue`}u{z&UP6.7u2$|Po+_gH4TREq=D(%=g9T)I?#}');
define('LOGGED_IN_SALT',   'u].nqd0+,-N%XDq8YpZN/s`G$:m8T6g,Pm}U<)@,jokexS&PvXm]<Br1AnYemm<{');
define('NONCE_SALT',       'N,k(N^.`r!7*O!bWG$nu%7XhakB]!+$2EI@KO7h:dZwg^]wW;^@ZQYv#xud4#~.%');

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
