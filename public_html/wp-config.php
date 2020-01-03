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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'restoran' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '#IU_.f(<VAC6OMO*[?B]w)B`S>6Oe+2,_!FBoBH:kSB%Bmt}q`C/mDY aNEAlI},' );
define( 'SECURE_AUTH_KEY',  '1g7<qp?~_}7KE4TE81{/!]F-gK%gaUpDc4`RMp90>2(&iK[)LptKq5(P,[vQ;@rQ' );
define( 'LOGGED_IN_KEY',    'FAoXjZsVP^-eUnal&sbcU@ )F5vC[}j4dx_Z0$@X%n1tM^4#(t=$++Q~6|[-?=h0' );
define( 'NONCE_KEY',        'EM:Ix0eB28EB4oa:8F>#.2{-X$i|bdh:37WN)<.SqiMA0,<o]s..U9ZY/%V4.x69' );
define( 'AUTH_SALT',        'R&B,kwa^33a:HaC8g%< <D-_sCc*4~9SJ<Pq(<W:W1o92D]A)qq?t~dOfFF+]F*Q' );
define( 'SECURE_AUTH_SALT', 'vGeg+iP~~su[l7I7xH&Q6E|1Q|yy.|l!k8i/QWq 5h89hpmNMj!2?KJNDIB1`$(M' );
define( 'LOGGED_IN_SALT',   '=CLz^_ul{[9|eL%NJdN N+ss/%F`V2P_]T=<5tlh&?6$+U3?8[]^txs_?>PA{A&n' );
define( 'NONCE_SALT',       'P=i/s$:lesw>l/q6+45XK$Y)hOG5=6Aa[Tcuu8(}.k&{4~#~m[Np}`V/^9>]Si0d' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
