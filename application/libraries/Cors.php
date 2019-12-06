<?php
// Note, this cannot be namespaced for the time being due to how CI works

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Format class
 * Help convert between various formats such as XML, JSON, CSV, etc.
 *
 * @author    Phil Sturgeon, Chris Kacerguis, @softwarespot
 * @license   http://www.dbad-license.org/
 */
class Cors {
// ------------------------------------------------------------------------

protected function _authenticate_CORS( )
{
    // -----------------------------------------
    // check if this referer has CORS access
    // -----------------------------------------

    // TODO for now allow all origins

    // -----------------------------------------
    // Insert the CORS headers
    // -----------------------------------------

    header( 'Access-Control-Allow-Origin: *' );

    if ( $_SERVER[ 'REQUEST_METHOD' ] == "OPTIONS" )
    {
        log_message( 'debug', 'Configure webserver to handle OPTIONS-request without invoking this script' );
        header( 'Access-Control-Allow-Credentials: true' );
        header( 'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS' );
        header( 'Access-Control-Allow-Headers: ACCEPT, ORIGIN, X-REQUESTED-WITH, CONTENT-TYPE, AUTHORIZATION' );
        header( 'Access-Control-Max-Age: 86400' );
        header( 'Content-Length: 0' );
        header( 'Content-Type: text/plain' );
        exit ;
    }
}
}