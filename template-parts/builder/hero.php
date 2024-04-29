<?php
/**
 * Hero builder part
 *
 * @package la_mountainser
 */

$disable_lazyload = ( $args['index'] < 2 ? ' no-lazyload' : '' );

$text             = get_sub_field( 'text' );
$bg_overlay_color = get_sub_field( 'background_overlay_color' );
$bg_image         = get_sub_field( 'background_image' );
$bg_image_mob      = get_sub_field( 'background_image_mobile' );
?>
<section class="m-hero">
	<?php if ( $bg_image ) : ?>
		<div class="m-hero__bg">
			<?php echo wp_get_attachment_image( $bg_image, 'full', false, [ 'class' => 'img-cover m-hero__bg__lg' . $disable_lazyload ] ); ?>
			<?php echo wp_get_attachment_image( $bg_image_mob, 'full', false, [ 'class' => 'img-cover m-hero__bg__md' . $disable_lazyload ] ); ?>
		</div>
	<?php endif; ?>

	<?php if ( $bg_overlay_color ) : ?>
		<div class="m-hero__bg-overlay" style="background-color: <?php echo esc_attr( $bg_overlay_color ); ?>"></div>
	<?php endif; ?>

	<div class="container">
		<div class="m-hero__content">
			<div class="row">
				<div class="col-lg-8">
					<?php if ( $text ) : ?>
						<div class="editor">
							<?php echo wp_kses_post( $text ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
