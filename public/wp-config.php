<?php

/**
 * Set root path.
 */
$rootPath = realpath( __DIR__ );

/**
 * Include the Composer autoload
 */
if (
	file_exists( $rootPath . '/vendor/autoload.php' ) &&
	file_exists( $rootPath . '/.env' )
) {
	require_once( $rootPath . '/vendor/autoload.php' );
	$dotenv = new Dotenv\Dotenv( $rootPath );
	$dotenv->load();	
}

/*
 * Don't show deprecations.
 */
if ( getenv( 'SHOW_ERRORS' ) && true === getenv( 'SHOW_ERRORS' ) ) {
	error_reporting( E_ALL ^ E_DEPRECATED );
}

/**
 * Disallow on server file edits.
 */
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );

/**
 * Limit post revisions.
 */
define( 'WP_POST_REVISIONS', 3 );

/**
 * Define site and home URLs.
 */
if ( getenv( 'WP_HOME' ) !== false ) {
	$site_url = getenv( 'WP_HOME' );
} elseif ( ! empty( $_SERVER['HTTP_HOST'] ) ) {
	$site_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
} else {
	$site_url = 'localhost/';
}

define( 'WP_HOME', $site_url );
define( 'WP_SITEURL', $site_url . 'wp/' );

/**
 * Set Database Details
 */
define( 'DB_NAME', getenv( 'DB_NAME' ) );
define( 'DB_USER', getenv( 'DB_USER' ) );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) !== false ? getenv( 'DB_PASSWORD' ) : '' );
define( 'DB_HOST', getenv( 'DB_HOST' ) !== false ? getenv( 'DB_HOST' ) : 'localhost' );
define( 'DB_PREFIX', getenv( 'DB_PREFIX' ) !== false ? getenv( 'DB_PREFIX' ) : 'wp_' );
define( 'DB_CHARSET', getenv( 'DB_CHARSET' ) !== false ? getenv( 'DB_CHARSET' ) : 'utf8' );

/**
 * Set debug modes
 */
define( 'WP_DEBUG', getenv( 'WP_DEBUG' ) === 'true' ? true : false );
define( 'IS_LOCAL', getenv( 'IS_LOCAL' ) !== false ? true : false );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'q%JA|!y?pqb@sGflw6-|2~Dm1Q+8C2R&d>rx T}V5[vU&6l>AYW5Bv74VZ|(o)6-');
define('SECURE_AUTH_KEY',  'F05MVaxaRu?WZO6&|T{)q`jSo>l&z=G.v>J1;b}k(..CQH^;b=[GU>+CES3WQGkx');
define('LOGGED_IN_KEY',    'c4uv060QlI8/udm5A3OjsS1i}O,vgZ_`XBl%|rrfiW!PT)-m lv&&(,M*<}a#D*=');
define('NONCE_KEY',        'F2;LjFn0w||GG*nQUp~_cm838{)VPgm0/-,nsLhv{9|^g=ZA~l5BY&td-0v<Vlbq');
define('AUTH_SALT',        'Cri~|Zhh8+)Ef6z-_Y({@W}S-!]h8katK4}gtezEoej}B4h(:<mr/9dU%JZ:>+Ll');
define('SECURE_AUTH_SALT', 'ARJqsxjsDPl|$hWeOQb+IKL.Y(y;uk|7r6d-p3ZHY-e02S.3klqu76`vqn<g(gC;');
define('LOGGED_IN_SALT',   'M^zE9T9P%k/pV+RTNt{NRQ/8oiv1|tPINs]WddGT]tfH}M0)?3}olgknL&-D_FYg');
define('NONCE_SALT',       'Z/usga7rKB6[mI&/J1?mt+D5GoE[9uCp{+/2fkrb7}]K|F$-,LA^7Y[ze5[r +Cj');

/*
* Define wp-content directory outside of WordPress core directory
*/
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', WP_HOME . '/wp-content' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'DB_PREFIX' ) !== false ? getenv( 'DB_PREFIX' ) : 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );