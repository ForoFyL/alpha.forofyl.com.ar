<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Environment parameters - Set custom settings depending on existence if files. ** //
if ( file_exists( $local_config = dirname( __FILE__ ) . '/local-config.php' ) ) {
    
    /** Set your environment to local */
    define( 'WP_LOCAL_DEV', true );

    /** Load your local config file */
    include( $local_config );

} else { // Load info for your remote stages.

	// ** MySQL settings - By now you should know were to get this from ** //
	/** The name of the database for WordPress */
	define( 'DB_NAME', '%%DB_NAME%%' );

	/** MySQL database username */
	define( 'DB_USER', '%%DB_USER%%' );

	/** MySQL database password */
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );

	/** MySQL hostname */
	define( 'DB_HOST', '%%DB_HOST%%' ); // Probably 'localhost'

	/** Load config files for your remote stages. */
	if ( $staging_config = file_exists( dirname( __FILE__ ) . '/staging-config.php' ) ) {
	    
	    /** Load your staging config file */
	    include( $staging_config );

	} elseif ( $production_config = file_exists( dirname( __FILE__ ) . '/production-config.php' ) ) {
	    
	    /** Load your production config file */
	    include( $production_config );

	}

}

/**
 * Custom content directory.
 * 
 * Use a content directory different from the usual wp-content, so it becomes
 * easier to update WordPress versions.
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * Try to get them from a different file, so they can be changed anytime we want.
 * If you dont't want to use it, edit them right here.
 * 
 * @since 2.6.0
 */
if ( file_exists( $wp_salts = dirname( __FILE__ ) . '/wp-salts.php' ) ) {

	/** Load custom salts file */
	include( $wp_salts );

} else {
	
	define('AUTH_KEY',         'put your unique phrase here');
	define('SECURE_AUTH_KEY',  'put your unique phrase here');
	define('LOGGED_IN_KEY',    'put your unique phrase here');
	define('NONCE_KEY',        'put your unique phrase here');
	define('AUTH_SALT',        'put your unique phrase here');
	define('SECURE_AUTH_SALT', 'put your unique phrase here');
	define('LOGGED_IN_SALT',   'put your unique phrase here');
	define('NONCE_SALT',       'put your unique phrase here');

}

/**#@-*/

// ** Global MySQL settings - You almost certainly do not want to change these. ** //
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define( 'STAGING_DOMAIN', 'alpha.forofyl.com.ar' );

/**
 * Post revisions.
 *
 * By default, WordPress keeps a record of every change you make to a post’s 
 * content, excerpt, author and title. While this can be a lifesaver, if you 
 * save a lot of drafts this can create a lot of extra entries in your database.
 * 
 * You can limit the number of revisions to keep by setting WP_POST_REVISIONS 
 * to a number. Of course if you want to disable all revisions except the 
 * autosave, you can always set WP_POST_REVISIONS to false
 */
define( 'WP_POST_REVISIONS', 5 );

/**
 * Empty trash.
 *
 * You can control the number of days before WordPress permanently deletes 
 * posts, pages, attachments, and comments, from the trash bin. The default 
 * is 30 days. To disable trash set the number of days to zero.
 * 
 * @since  2.9.0
 */
define( 'EMPTY_TRASH_DAYS', 1 );

/**
 * Cache settings.
 * 
 * The WP_CACHE setting, if true, includes the WP_CONTENT_DIR/advanced-cache.php 
 * script, when executing wp-settings.php. Here is set to true in case that
 * WP_CONTENT_DIR/advanced-cache.php exists, so you don't have to set it manually.
 * Also, we try to load a cache config file in case we have one, which could be
 * very useful if we're using Memcached, APC or Batcache.
 */
if ( file_exists( WP_CONTENT_DIR . '/advanced-cache.php' ) ) {

	define( 'WP_CACHE', true );

	/** Load a cache config file if we have one. */
	if ( file_exists( $cache_config = dirname( __FILE__ ) . '/cache-config.php' ) ) {
		include( $cache_config );
	}

}

/**
 * Akismet key.
 *
 * One annoying thing about Akismet that you might have experienced is that 
 * whenever you are using it with a multisite network you need to set your API 
 * key separately for every single site. You can set it just once here and then
 * move on. It also works for non-multisite installations.
 */
define( 'WPCOM_API_KEY', '' );

/**
 * Stage WP CDN domain.
 *
 * If you're using Stage WP and the Stage WP CDN plugin, then you need to set
 * your CDN domain here to get it to work. By default it will be your site's
 * domain, so nothing will break, but don't forget to change it if you have a
 * custom CDN domain.
 */
define( 'STAGE_WP_CDN_DOMAIN', '%%STAGE_WP_CDN_DOMAIN%%' );

/**
 * Stage WP settings.
 *
 * The following constants will be programatically set when deploying with 
 * Stage WP, so your Stage WP plugins can know which environment your site is in
 * (e.g. production, staging).
 */
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in Stage WP to handle staging domain rewriting

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', dirname( __FILE__ ) . '/wordpress/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
