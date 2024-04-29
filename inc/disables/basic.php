<?php
/**
 * General recommended updates
 *
 * @package la_mountains
 */

/**
 * Remove WordPress version from head tag
 */
remove_action( 'wp_head', 'wp_generator' );
