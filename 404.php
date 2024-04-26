<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mountains
 */

get_header();
?>

<div class="container">

	<section class="not-found">
		<h1 class="h3 not-found__title"><?php esc_html_e( 'Page not found.', 'mountains' ); ?></h1>
		<p class="not-found__text"><?php esc_html_e( 'Sorry, the page you were looking for doesn\'t exist or has been moved.', 'mountains' ); ?></p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to homepage', 'mountains' ); ?></a>
	</section>

</div>

<?php
get_footer();
