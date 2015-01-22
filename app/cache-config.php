<?php
/**
 * Cache configuration file.
 *
 * The following code is only valid for Batcache. Feel free to modify it to your
 * own needs. 
 */
global $batcache;
$batcache = array(
	'max_age'           => 300,
	'remote'            => 0,
	'times'             => 1,
	'seconds'           => 0,
	'group'             => 'batcache',
	'unique'            => array(),
	'headers'           => array(),
	'cache_redirects'   => false,
	'redirect_status'   => false,
	'redirect_location' => false,
	'uncached_headers'  => array( 'transfer-encoding' ),
	'debug'             => true,
	'cache_control'     => true,
	'cancel'            => false,
);
