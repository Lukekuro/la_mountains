<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package la_mountains
 */

$logo          = get_field( 'logo', 'option' );
$enable_to_top = get_field( 'enable_to_top', 'option' );
?>

</main><!-- /.site-content -->

<footer class="site-footer">
	<div class="container">
		<?php if ( $logo ) : ?>
			<div class="site-block-logo">
				<a href="<?php echo esc_url( home_url() ); ?>" class="site-logo" rel="home">
					<?php echo wp_get_attachment_image( $logo, 'medium' ); ?>
				</a>
				<div class="logo-text">
					<span><?php echo esc_html( 'losangeles' ); ?></span>
					<span><?php echo esc_html( 'mountains' ); ?></span>
				</div>
			</div>
		<?php endif; ?>

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'footer',
				'container_class' => 'footer-links__container',
				'menu_class'      => 'footer-links',
				'fallback_cb'     => false,
			)
		);
		?>
		<span class="site-footer__copyright"><?php echo sprintf( esc_html__( '&copy; %s All rights reserved', 'la_mountains' ), esc_html( date( 'Y' ) ) ); // @phpcs:disable ?></span>
	</div>
</footer>

<?php get_template_part( 'template-parts/svg' ); ?>

<?php if ( $enable_to_top && ! is_404() ) : ?>
	<a id="to-top" href="#top">
		<svg>
			<use xlink:href="#angle-up"></use>
		</svg>
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'la_mountains' ); ?></span>
	</a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
