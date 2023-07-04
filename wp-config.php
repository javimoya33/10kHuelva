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

/** The name of the database for WordPress */
define( 'DB_NAME', 'khuelvae_4HmRyOEz' );

/** MySQL database username */
define( 'DB_USER', 'khuelvae_4HmRyOEz' );

/** MySQL database password */
define( 'DB_PASSWORD', 'TYpxT9q1HSpnufir' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
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
define( 'AUTH_KEY',         'e471#J&-g;=}(UT8O&b``n5[WEu(.2+[1] 02:9dzV]QaI%,/9H31bZ#G@yWl&+<' );
define( 'SECURE_AUTH_KEY',  'rcn52O|kWT+xj*dyPT@k%5U)(.l}AGLxVvNLXw[H8G5uK%ZubE!7~Zn%,jm]mq]z' );
define( 'LOGGED_IN_KEY',    '5VjH1xCRJa+$xHr#f6o1eqowr|%c=1k2&)#:#j%$~M{:T~,mO|r&lBs!!SU^x<C9' );
define( 'NONCE_KEY',        'ct{Ei%-&nNjT `BH739pFgBW[m}Z4M:PDV=Y/wW2ubkRG8/@d|w= _[8$q}N`Ji3' );
define( 'AUTH_SALT',        '@@8V)#3K#cn3=HKW,8o3$4A(H]vy8q{?nOqadZ6TI=u+)fNNWBfjj(Lg>Y:<`wMv' );
define( 'SECURE_AUTH_SALT', '08G_`r85H(O1P76@}Smkcl;)n9 -0,$x%iA5lx)oD)R>h,$0dZ_|ggD.r,cc.OC ' );
define( 'LOGGED_IN_SALT',   'D+z#smFk6,e{X]~:1[Sg W<nZ>RuIhh&HbiKJYYurwDbL1.H{cGjb`EM[3XPo52B' );
define( 'NONCE_SALT',       'lE+|Ht8*zS!0)9j.xfOZ$F$YI9kV&hf>=Xt%l8~vmpo<R5}547k0S<J4#/C(!OXy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '10k_';

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
