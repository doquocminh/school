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
define( 'DB_NAME', 'school' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']z;e8}3&/fjQ4}CDciMIFdWwk7I$X#~m%JxP>R=}iJWT)Fyp}v1|#}$U|r`8B)mt' );
define( 'SECURE_AUTH_KEY',  '??WGv;QL]h.F/tFlXl6?n/|pQDXvLKqh^-}(xcABC=-}f~IWaAbx_h;s|SNw3{|C' );
define( 'LOGGED_IN_KEY',    'E)&`eTrrk0~m-3-f;NW2T}qtZ#I[>>E9h;rZ[A]qzwh&Qm 3]7lYI(TV>sD+GPl1' );
define( 'NONCE_KEY',        '0%7r.K!.I-K6caW{U_5LL842@j_h&x_P$dFX=le%((L9v`fHfk8FtWd^1<BQ5*32' );
define( 'AUTH_SALT',        '7pob,4VcQ5Sn2|dn!X?G`Wu?V!NM{viB:E8A4}I+4?u^jc},uf0<t7a;(x{6*9zT' );
define( 'SECURE_AUTH_SALT', '.OEI!^rA|?RsK.df/?9![yfWeV.}?C V;#Wh! @*zi%rRRQ/%6S:l1Mi}0MT*mK,' );
define( 'LOGGED_IN_SALT',   '@6@ZS;0f4/f0zqv[B8XE6se&%8v}Cjz7ZWJyW538da6P-`Mk7Evv5X9mF}0(G7/V' );
define( 'NONCE_SALT',       'bWFVg.-190Ds4F8tn+FBjSR<Eu~F]@6EQ}v/=Ii3/}^kjhtjyX/1-M8*jjS.MfE`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
