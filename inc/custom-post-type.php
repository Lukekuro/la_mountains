<?php
/**
 * Custom Post Types registration
 *
 * This is the file where we register all the custom post types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @link https://developer.wordpress.org/resource/dashicons/
 *
 * @package la_mountains
 */

?>
<?php
/**
 * Registering Custom post types
 *
 * @return void
 */
function itm_custom_init() {
	// CPT: Mountain.
	$labels = array(
		'name'          => __( 'Mountains', 'la_mountains' ),
		'singular_name' => __( 'Mountain', 'la_mountains' ),
	);

	$args = array(
		'label'               => __( 'Mountain', 'la_mountains' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'rest_base'           => '',
		'has_archive'         => false,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true, // enable Gutenberg for this CPT.
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array(
			'slug'       => 'mountain',
			'with_front' => true,
		),
		'query_var'           => true,
		'supports'            => array( 'title', 'thumbnail', 'revisions' ),
		// @phpcs:disable // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	);

	register_post_type( 'mountain', $args );
}

add_action( 'init', 'itm_custom_init' );
