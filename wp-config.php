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
define('DB_NAME', 'jm_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '1+B^?dCjs8_!]]*)9s;KAw!g;9U-ilsxsRh/]]@:j!$bC]`NcXV{J;n;QYsb<^==');
define('SECURE_AUTH_KEY',  'v*Tsd{ x#Nk*u3R_3ya t2|XY+bpG%h3IMI]GcjTb@Jm~&7C4l >68t,y<o>QN&g');
define('LOGGED_IN_KEY',    'o6+tzuV]>Y6:^/2b%rM!j59f}8p0DaQTrDRegf?y-fWH.BW}4ca!{p*wG,ApxdMy');
define('NONCE_KEY',        'j$aWYo^_=pZ^RzTOf^}74,MD@laF]Ey21hGmyIWt_*4,wPBV4nJ<Z3=nTn@Nb?ob');
define('AUTH_SALT',        'm7D;Qjqfc^ X|0^Noygh!|#EM(FDCr^>HAA {aq$k_p 1v-w6$SGp;V.O6ClKXN0');
define('SECURE_AUTH_SALT', '=6?X=:Vo#6^~1@9P`)4&s+O;P=uc0lnFQN[W^w/|A1QWdFDRCL(`1*X.6qg.V0SX');
define('LOGGED_IN_SALT',   '(mF4S_0I@J14z;xE/eDwUc|UP{x`:JEkA sR|-Do.?(^V]0l5D&+Jj`jfc;;@PE=');
define('NONCE_SALT',       'Tt&G=Gsdz=,g67Uv~oBGR>PIjau^@4RMa!y~P!QR~aZ/(R^C()TB3#0U@12R:#+ ');

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
