<?php
/*
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */

ini_set( 'session.cookie_httponly', 1 );
ini_set( 'session.cookie_secure', 1 );

header( "X-Frame-Options: deny" );
header( "X-XSS-Protection: 1", "mode=block" );
header( "Cache-Control: no-store, no-cache" );
header( "X-Content-Type-Options: nosniff" );

// calls header from bootstrap-based theme
require_once( 'responsive/header.php' );

?>