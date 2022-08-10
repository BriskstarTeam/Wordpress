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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'onestopdevshop' );

/** MySQL database username */
define( 'DB_USER', 'onestopdev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'J3VeSs0ee3#MConLKqe5' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
//define( 'DB_CHARSET', 'utf8' );

define('DB_CHARSET', 'utf8mb4_unicode_ci');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '5^o*[]D_WPL-uYXhfHR1,Mtk4KY}^N<reSK@&.?c51c>+kq+HRlnJg2hq?Wr=)5,' );
define( 'SECURE_AUTH_KEY',   '5+2?`o_}gQ8MfaZT1TSpkpadd2@j&zwGeRCDl4Me:X)QHQz~l!j4QZkA(rt?.Vm?' );
define( 'LOGGED_IN_KEY',     'jvgAbKm~|1l;vP<a%?)7~eogSIl3H7e-bBG3{-d/|PK4!A}>6<q(&v|S`8}6s{d*' );
define( 'NONCE_KEY',         '35iqj}pnQdb_mw(r[b:!w91qujf:3?Q5.tBLjX;pZpk?eC DKu*/_ QNLYSn&,@c' );
define( 'AUTH_SALT',         'N(3e+~?#aJfu!Y~Ex`6No#, j4u}|#yD&M B`4{I;Caa_olXpXp`cFo-!CJGf9JS' );
define( 'SECURE_AUTH_SALT',  'F7F&x4VUzf2!2u0xG2}rB~DUQA[0]PDyIwhbEqew/Cz{A7Jrv)*sGXl*?Jqzbcu}' );
define( 'LOGGED_IN_SALT',    'na6#?LBp-Om(4wn|EgxKB8FUf,h[tBn[=d%47.V)YAByS`tW8d&!d~aPiYq&QgJd' );
define( 'NONCE_SALT',        '(L8FuPHHZmolLF&lP+Y/ucNKe49[gteHr_6L UQ[;CW$v+7[v*rq>:CQV%>J4zx3' );
define( 'WP_CACHE_KEY_SALT', 'HuIFA(Wd-@MF3)s!IEY[WIX;AA~R`b7hO;r6V5jDTB2t:rD,PCQ`.^5Pt2CtHjY8' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('FS_METHOD', 'direct');
define('DB_CHARSET', 'latin1');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
