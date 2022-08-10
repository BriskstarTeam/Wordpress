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
define( 'DB_NAME', 'petit' );

/** MySQL database username */
define( 'DB_USER', 'wp7662' );

/** MySQL database password */
define( 'DB_PASSWORD', 'qYUrMdj0z00' );

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
define( 'AUTH_KEY',          'R*kp:U<R8sF|&@-U8l?edS_3lwgVr:y1jsQW>MeYQv<4d4;G@hy &vqQje2e-)2s' );
define( 'SECURE_AUTH_KEY',   'ub2&4H3,+ ]dI^F3(,%O+&>/V4OFx-_PT`q,8J,jN4Z:X!H{Y$9?z*VLy>j*f=DL' );
define( 'LOGGED_IN_KEY',     'X6.MtUId~0AvA|[uo:nAYgl&`&Ywdc<bBS&OYg/6F6loLQfb=X@<$#ReJV<;SsnV' );
define( 'NONCE_KEY',         'tGdc%l,)%C1I$CNA!xt,cG9(k.KazDG4l$tYy5a=!x<,Sa]=+M/Y<]dW4 5,wX/s' );
define( 'AUTH_SALT',         '.(RR`~Jxis +R>0hJv~c<X4A,y8Q:h)YuK 4xCZ?_XZ:;FlH(%pdjPdp)#=qV@6h' );
define( 'SECURE_AUTH_SALT',  '%>4$0oxdYi{ly}$om/D_PIy:p:aGdNZc-Z5~o*/B%4LE#a@JfpiAHFX<K8Nx!BzJ' );
define( 'LOGGED_IN_SALT',    'o /.a:{?TwXJVcKW?@#3st.PVeOg?s*;,!<&s{Sd]IDq<na2fhM&).Cof&FO$oZ%' );
define( 'NONCE_SALT',        'B[Fbuy1{UKE5kIJd4QT{<8KT8xz0$_gu~h}TbO88<?Pt<LM3Wrlpa7kX]Tjp_J0|' );
define( 'WP_CACHE_KEY_SALT', '!O!kiAkSuz2`mzW}.6bl5BE~N9/Bu<as:L{hy7AJR5K!~#-x#H$ezy6|9Sjcv{HX' );

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
