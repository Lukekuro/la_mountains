<?php
/**
 * Hero builder part
 *
 * @package mountainser
 */

$disable_lazyload = ( $args['index'] < 2 ? ' no-lazyload' : '' );

$text             = get_sub_field( 'text' );
$bg_overlay_color = get_sub_field( 'background_overlay_color' );
$bg_image         = get_sub_field( 'background_image' );
?>
<section class="m-hero c-block"<?php echo esc_attr( $bg_color_html ); ?>>
	<?php if ( 'image' === $bg_type && $bg_image ) : ?>
		<div class="m-hero__bg">
			<?php echo wp_get_attachment_image( $bg_image, 'full', false, [ 'class' => 'img-cover' . $disable_lazyload ] ); ?>
		</div>
	<?php endif; ?>

	<?php if ( in_array( $bg_type, [ 'image', 'video' ], true ) && $bg_overlay_color ) : ?>
		<div class="m-hero__bg-overlay" style="background-color: <?php echo esc_attr( $bg_overlay_color ); ?>"></div>
	<?php endif; ?>

	<div class="container">
		<div class="m-hero__content">
			<div class="row">
				<div class="col-lg-8">
					<?php if ( $text ) : ?>
						<div class="editor"><?php echo wp_kses_post( $text ); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
