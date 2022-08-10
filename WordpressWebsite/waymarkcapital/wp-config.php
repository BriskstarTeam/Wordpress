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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i8125093_wp1' );

/** MySQL database username */
define( 'DB_USER', 'i8125093_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'N.1eBaaxqKFv3oypFnl45' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'u0cQwgglkwYZ7CDY1fASbaiXUGZyAWIvZ5zpXCO6cOzic9Z17T0EMnuEc3oe1TFF');
define('SECURE_AUTH_KEY',  'vapjVMB8NDw3XhoqD9mLq1QdiOvfLAsW2l8R7ateuCYaht10rea5R7QnsOgv2OU8');
define('LOGGED_IN_KEY',    'CM21z93l2Ez5maqvLam97GjvrFkFDTfRkt4vl19IIZwfWfMCS3aJMxV3pNddJ2lm');
define('NONCE_KEY',        'INUOUQSOPiG9FvLFxgFI9NpwmiVkRIhgBMUMzyvaJCbe8jL2PU9oSVvOaWZO6l93');
define('AUTH_SALT',        'b00ggiBX9cn141tCuMfMdpFKDppsJK5wrJixga6CZeQJtJe3ozb2dOIkvsxjS1G9');
define('SECURE_AUTH_SALT', 'fA5JWbqXfgMG6Z9aYLALaI5J40kuFD9yWidZqwCS3S7zZnKpYljVJ1KhqAsVCvzZ');
define('LOGGED_IN_SALT',   'YoiCuy0tDdIoG5JYyspgR9KPAIHvPLGwhRJ0LAT5HcHKsDbuEM8OEMOxIzj57WJV');
define('NONCE_SALT',       'DKCMSMz8pXLRXNup6dSdkI6RQd9tReWYdvTOmNVRhQbxgveFwujNYuagtIbyeppD');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

define('ALLOW_UNFILTERED_UPLOADS', true);




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

define('WPCF7_AUTOP', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
