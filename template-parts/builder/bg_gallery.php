<?php
/**
 * Background and Gallery builder part
 *
 * @package la_mountainser
 */


$bg_overlay_color = get_sub_field( 'background_overlay_color' );
$bg_image         = get_sub_field( 'background_image' );
?>
<section class="m-bg_gallery">
	<?php if ( $bg_image ) : ?>
		<div class="m-bg_gallery__bg">
			<?php echo wp_get_attachment_image( $bg_image, 'full', false, [ 'class' => 'img-cover' ] ); ?>
		</div>
	<?php endif; ?>

	<?php if ( $bg_overlay_color ) : ?>
		<div class="m-bg_gallery__bg-overlay" style="background-color: <?php echo esc_attr( $bg_overlay_color ); ?>"></div>
	<?php endif; ?>

	<div class="m-bg_gallery__content">
		<div class="container">
			<?php get_template_part( 'template-parts/builder/components/title_text' ); ?>
		</div>
	</div>

	<?php if ( have_rows( 'gallery' ) ) : ?>
		<div class="m-bg_gallery__gallery">
			<div class="container">
				<div class="swiper swiper-gallery">
					<div class="swiper-wrapper">
						<?php while ( have_rows( 'gallery' ) ) : the_row(); 
							$image = get_sub_field( 'image' ); 
							?>
							
							<?php if ( $image ) : ?>
								<div class="swiper-slide" data-fancybox="lightbox" data-src="<?php echo wp_get_attachment_url( $image , '2048x2048' ); ?>" data-content="<?php echo wp_get_attachment_caption( $image ); ?>">
									<?php echo wp_get_attachment_image( $image, 'large' ); ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</section>