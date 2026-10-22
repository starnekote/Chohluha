<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_chehluha' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'MySQL-8.0' );

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
define( 'AUTH_KEY',         'hCU6`dxr_,&MfV~A^?DpVxwAGpL@)N#/~*AtD8aksTB$me^9<3Q`[rFEW!S3*?Ev' );
define( 'SECURE_AUTH_KEY',  'kIzF3o)O|vnWN{UttU7?UVJ~L]/dggy,xnMmMhUVKQR)`sL,GsHKT!+[IKGyLn@A' );
define( 'LOGGED_IN_KEY',    'b_p[?n[$Q$bL#U~{O`6[AfD3+:C=2-6H8x#]?#m[CS3=,)W1#o?HkSLYR!JpVlh1' );
define( 'NONCE_KEY',        '&ITZRp!fvOBWkI=Ht%{j&Oy=]p^_]g%V)BZ>GJB:H31NFRd,53LCd>D,)Hl9ddAp' );
define( 'AUTH_SALT',        '3[sX+c+au/&(Jgq-w<Gu _M?tp4y>3f-CJ0OV|%FL~VUWT0d_[I`9<93k%6DfDbI' );
define( 'SECURE_AUTH_SALT', '%s|+e0PD A*s1|V9IDgtmWK&}RW@P_V>[E$@@oI})cv,<9LNj6u=7@/0$ewDzPV:' );
define( 'LOGGED_IN_SALT',   'aJ{@%gt WV)nta~sPA8uZ.gF_`Q.n[PQ*A0+D}&;[E]]_y)nu:BCEU]My~j7j6V>' );
define( 'NONCE_SALT',       '<uiQAX-[}X<Y7J[[1*WG o]:EM?p1{mKm7g@ xrN9Q9rpUT]YPCtuu7<C6 j+!As' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
