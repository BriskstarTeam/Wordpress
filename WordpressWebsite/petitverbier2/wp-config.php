<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
define( 'DB_NAME', 'petitverbier2' );

/** MySQL database username */
define( 'DB_USER', 'wp8081' );

/** MySQL database password */
define( 'DB_PASSWORD', 'kRiJXao' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '+}5Y:kk2/D-n$Y^eg[=bc/T?;6BPh5$[:6;A-]bPKCXC+-#R64~,mM!}?#g?X.or' );
define( 'SECURE_AUTH_KEY',   '/4D@{;CrT,S8SzOF08z>x;XNJ5sEOt[v`_cxxOR$,h#GMAOOu+3:ZCy;&N4eSQs#' );
define( 'LOGGED_IN_KEY',     'Hm[X4e5&Fa}Jn8R1z-VzQKs]&L[,X6QU^IK7pD`uKT(JieKwouyLNu4ngyS.W{<6' );
define( 'NONCE_KEY',         'pA@K&0D+B~vqCk<zo:I3v$^}e9pk;13?:#t.m >26vG_6Av0e!VI#_w7,q&[:X+U' );
define( 'AUTH_SALT',         'J&)V6I[jm<a;)99+GeT~vU;/;cggfez`RmA1=Bu~&nr<wO)f?-2j)sLzmlVAfy!_' );
define( 'SECURE_AUTH_SALT',  '|Tb6s^cU8&#ctqbuZ!H62nm}Po1#|r7&1AuNlP+`@w)}0{9Lg);>B4 l8|H,aX_1' );
define( 'LOGGED_IN_SALT',    'j[(@J4=%[aaO:AIa2z!;6HA=xCqww:7H+O#oXhA@p+khg59N1uf~b9swD[0r;&1Y' );
define( 'NONCE_SALT',        'r bbIa~$`!nKV4_{u6IC1#Flvn{bcK`U`S<xZRs1]Tn~<e&L848WqoKeza8@bbKA' );
define( 'WP_CACHE_KEY_SALT', '<xvsGold:[]++u%1-YP:Z365G5=rB_JNSzYZ55(6ljVUa{B7(H0Yyi~D;`>6w&Ia' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
