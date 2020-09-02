<?php
define('WP_AUTO_UPDATE_CORE', 'minor'); // This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
define('DB_NAME', 'wordpress_1');

/** MySQL database username */
define('DB_USER', 'wordpress_4');

/** MySQL database password */
define('DB_PASSWORD', 'S6E!Q8p9od');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'teT&vp^h%1pRE(CU((JY54%idEORcDmC22eaQ4YUHHo*1Tw3B0ZOorYe&SurocAV');
define('SECURE_AUTH_KEY',  '3#JtZ4grz7IZW9WjMAmx3uZ52or3WD0XH6EbXQ!DFd#yzu1dBfjm&iMG01!^EHA&');
define('LOGGED_IN_KEY',    'BD@j5*TeqMJonaa28aXDrZsvc!z2A2j*f1qp3Lj(Wm9ujLZ@T5P!K4Xy1%9jnhec');
define('NONCE_KEY',        'trC4fAqRjRy0vyz4rm*bHJ0#AuF*Wrfx2CxQd#Vzm(PcermcZvoGkDQ7k#ytOd#E');
define('AUTH_SALT',        'iF!O28TCr5W!@7efbj%A)Ged*Gs^3GoB2ib0qn)SqNobCP#M%AEQeFm73u9czM9k');
define('SECURE_AUTH_SALT', 'n!%fH8uNJ%#JLVJ4OScEWX(ZIY)xs)X3jHrECTnT342GVF5YLH2HrrlqAGtX^8EJ');
define('LOGGED_IN_SALT',   'Q#0p4S0JmzXqymAk6@Tj4v)PlFYEdGzWX&Iv4f)5z^mxf^4pxcIUj3FWw0J(6Y)w');
define('NONCE_SALT',       'L@A5i&ufDELJ*dMJ#d68qlJWW*hAKsHvH2BX#m9ijjw7%VWtbw!lSs%V(SIYMQGo');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '4J08jPi_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_ALLOW_MULTISITE', true);

define('FS_METHOD', 'direct');
