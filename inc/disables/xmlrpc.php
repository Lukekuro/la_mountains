<?php
/**
 * Disable XMLRPC
 *
 * @package la_mountains
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
