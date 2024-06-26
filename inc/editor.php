<?php
/**
 * Editor modification
 *
 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
 *
 * @package la_mountains
 */

/**
 * Registers an editor stylesheet for the theme.
 */
function itm_wpdocs_theme_add_editor_styles() {
	add_editor_style( ITM_CSS . 'editor-styles.css' );
}
add_action( 'admin_init', 'itm_wpdocs_theme_add_editor_styles' );

/**
 * Add TinyMCE style formats.
 *
 * @param array $styles - array of the styles URLs.
 */
function itm_tiny_mce_style_formats( $styles ) {
	array_unshift( $styles, 'styleselect' );

	return $styles;
}
add_filter( 'mce_buttons_2', 'itm_tiny_mce_style_formats' );

/**
 * Tiny MCE formats setup.
 *
 * @param array $settings - The array of the formats.
 *
 * @return mixed
 */
function itm_tiny_mce_before_init_formats( $settings ) {
	// Define the style_formats array.
	$style_formats = [
		[
			'title' => 'Titles',
			'items' => [
				[
					'title'    => 'H1',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h1',
				],
				[
					'title'    => 'H2',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h2',
				],
				[
					'title'    => 'H3',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h3',
				],
				[
					'title'    => 'H4',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h4',
				],
				[
					'title'    => 'H5',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h5',
				],
				[
					'title'    => 'H6',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'h6',
				],
			],
		],
		[
			'title' => 'Text',
			'items' => [
				[
					'title'    => 'Text (lg)',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'text-lg',
				],
				[
					'title'    => 'Text (sm)',
					'selector' => 'p,h1,h2,h3,h4,h5,h6',
					'classes'  => 'text-sm',
				],
			],
		],
		[
			'title' => 'Buttons',
			'items' => [
				[
					'title'    => 'Button (primary)',
					'selector' => 'a',
					'classes'  => 'btn',
					'wrapper'  => false,
				],
				[
					'title'    => 'Button (outline)',
					'selector' => 'a',
					'classes'  => 'btn btn-outline',
					'wrapper'  => false,
				],
				[
					'title'    => 'Button Group',
					'classes'  => 'btn-group', // custom admin styles for this class added in editor-style.scss.
					'selector' => 'p',
				],
			],
		],
		[
			'title' => 'Lists',
			'items' => [
				[
					'title'    => 'List (checked)',
					'classes'  => 'list-check',
					'selector' => 'ul',
					'wrapper'  => false,
				],
				[
					'title'    => 'List (dotted)',
					'classes'  => 'list-dot',
					'selector' => 'ul',
					'wrapper'  => false,
				],
				[
					'title'    => 'List (numbered)',
					'classes'  => 'list-number',
					'selector' => 'ol',
					'wrapper'  => false,
				],
			],
		],
	];

	if ( isset( $settings['style_formats'] ) ) {
		$orig_style_formats = json_decode( $settings['style_formats'], true );
		$style_formats      = array_merge( $orig_style_formats, $style_formats );
	}

	$settings['style_formats'] = wp_json_encode( $style_formats );

	return $settings;
}
add_filter( 'tiny_mce_before_init', 'itm_tiny_mce_before_init_formats' );

/**
 * Add custom colors to TinyMCE editor text color selector
 *
 * @param array $init - init colors list.
 *
 * @return array $init
 */
function itm_tiny_mce_before_init_colors( $init ) {
	// By using the same array keys as the default values you'll override (replace) them.
	$custom_colors = [
		'Black'     => '000',
		'White'     => 'fff',
		'Grey'      => 'B0B4BE',
		'Primary'   => '414F6B',
		'Secondary' => '63769d',
		'Dark Grey' => '4D4D4D',

	];

	$textcolor_map = [];
	foreach ( $custom_colors as $name => $color ) {
		$textcolor_map[] = "\"$color\", \"$name\"";
	}

	if ( ! empty( $textcolor_map ) ) {
		$init['textcolor_map']  = '[' . implode( ', ', $textcolor_map ) . ']';
		$init['textcolor_rows'] = 6; // expand color grid to 6 rows.
	}

	return $init;
}
add_filter( 'tiny_mce_before_init', 'itm_tiny_mce_before_init_colors' );
