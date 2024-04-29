<?php
/**
 * Pagination
 *
 * @link https://developer.wordpress.org/reference/functions/paginate_links/
 * @package la_mountainser
 */

?>
<div class="pagination">
	<?php
	echo wp_kses_post(
		paginate_links(
			array(
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'total'        => $wp_query->max_num_pages,
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'format'       => '?paged=%#%',
				'show_all'     => false,
				'type'         => 'list',
				'end_size'     => 2,
				'mid_size'     => 1,
				'prev_next'    => true,
				'prev_text'    => __( '&larr; Prev', 'la_mountains' ),
				'next_text'    => __( 'Next &rarr;', 'la_mountains' ),
				'add_args'     => false,
				'add_fragment' => '',
			)
		)
	);
	?>
</div>
