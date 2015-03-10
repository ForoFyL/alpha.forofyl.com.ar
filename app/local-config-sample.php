<?php
/**
 * WordPress configuration file for local environment only.
 * 
 * You must include here the four main database defines.
 *
 * By default, this file enables debugging, but disables PHP errors. You may
 * edit or remove those settings, and include here any other settings that you
 * only want to be enabled on your local environment.
 */

// ** MySQL settings - By now you should know were to get this from ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'forofyl_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' ); // Probably 'localhost'

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/**
 * Debug settings.
 *
 * It's recommended to have WP_DEBUG and WP_DEBUG_DISPLAY set to true on your
 * local environment, so you can tell if something goes wrong. On the other
 * hand, setting display_errors to 1 may show a lot of PHP errors, depending on
 * your code and your PHP configuration, and that's why is set to 0 by default.
 */
ini_set( 'display_errors', 0 ); // Set this to 1 if you want to see the whole bunch of PHP errors.
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
