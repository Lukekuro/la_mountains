<?php
/**
 * Disable XMLRPC
 *
 * @package mountains
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
