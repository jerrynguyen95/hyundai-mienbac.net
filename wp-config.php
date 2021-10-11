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
define('DB_NAME', 'pcstorev_hyundaimienbac');

/** MySQL database username */
define('DB_USER', 'pcstorev_tungnd');

/** MySQL database password */
define('DB_PASSWORD', 'tungnd!!@@##');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Pfn37yi_uTk9Kw3Jk(cu&U@G]+_,1d_GI<=_MJ;XE4`9ZnpVl1dztCN zy-J(>u<');
define('SECURE_AUTH_KEY',  'lQg9n`9P zkzWrB2N^` P-p-]Wj<kyjIENN=@*qc-R{JI!url/|&0E`F!AxXZ4wX');
define('LOGGED_IN_KEY',    '6G4?$Nz;vE4TfJ@u{9bKNO]BJfIWaV< Hz]|.V1k294p6VCG,}i8PG9hI~gEEzI`');
define('NONCE_KEY',        '/;[Y/T-l0CTu~5He<A}RCIHMy[05_4%!AVN4pFA&qhulYWc**=9]BB a-L{_ByQj');
define('AUTH_SALT',        'HFQ[HAfZ?}ds6A}f)[wDbpZ.Xce9&7(Nxvs*D#vFf[M^$4OxT?N7>L=JCN_T=v9K');
define('SECURE_AUTH_SALT', '[1^{V]N86[rrNyqBFX!82AdJ!R6l5@ 55k>n|a/2}NO8C;A!BrM>`%<WqbTw}ArW');
define('LOGGED_IN_SALT',   '~$|ENXd[>-PF_!PRbNXJ=Wc~W#BE0Y--xG-lF|M_ *:&,uE/hR8kPp*#MZs</Wxm');
define('NONCE_SALT',       'HF~{92Qu.Dx@;^XR-:U`Yw@Q>1U]YvbJK.>)62F{<T}cJj?`zB{u=vIQ}H/q}(0:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'oto_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
