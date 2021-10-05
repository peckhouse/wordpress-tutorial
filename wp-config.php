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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */


// WP-admin access :  
// User: Ludovic
// Pass: S9vGT@TjXPYGspvr&0
// Mail: ludovic.anthony.prandi@gmail.com

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-tutorial' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'sepultura' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

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
define( 'AUTH_KEY',         '(Wi=NpMaZ73&)bM{(E-R$o^Tz-?dJ,,(|@@{+*`fdm-9^|pA+kmIg6#^UwqPmNOb' );
define( 'SECURE_AUTH_KEY',  'K]kW)OVV#}<+fPS0; qk0DI44b5/8#=GZ_jU99u+Eg<n_iQ<g%q/v+|;S4:bBFel' );
define( 'LOGGED_IN_KEY',    '5c]~D4tM<`:yUrmh61H>VCO_M6~:D[iG!0G+hx,?@;!@&d,JrYk$r$Ll@w!H1|~_' );
define( 'NONCE_KEY',        'd1Zq >TAl$jwejE8j%Ra+Kb0$[4We46x32q&R~yFx&Kiq9q3*L(.X+X<]nK./rb>' );
define( 'AUTH_SALT',        'F)/N.A3Hw0Gb{W6Hq==[s0UAKmfKcFV]L~}>urAk<E675Jq}?mu)iTYIOK_y}yY1' );
define( 'SECURE_AUTH_SALT', 'Sm/P9g68U3:}BbyEb]ZU hkv#WaLQG*]1r;sB(;^j9;Ob4ghmZ_hre9kcs:jn@nu' );
define( 'LOGGED_IN_SALT',   'nyO5=}M=Lo41<]buRlf~#*!IcUM<<&1OgH,LvM&!7R=PVMrg!$x0/ozRLk{1A{#m' );
define( 'NONCE_SALT',       'x0RO;4A-u!=2okb}z,R&lvlrh:TgL&$_rdb96(,]91*Mrs2!L}A@xLb7WzIRt%Vh' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
