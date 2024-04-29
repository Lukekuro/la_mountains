<?php
/**
 * Title and text component builder part
 *
 * @package la_mountainser
 */

$title_class         = isset( $args['class'] ) ? $args['class'] : 'h2';
$title_text          = get_sub_field( 'title' );
$title_tag           = ! empty( get_sub_field( 'title_tag' ) ) ? get_sub_field( 'title_tag' ) : 'h2'; // possible values: h1-h6, span.
$set_column_content  = get_sub_field( 'set_column_content' ) ? ' is-column' : '';
$text                = get_sub_field( 'text' );
$number              = get_sub_field( 'number' );
?>

<div class="c-number_title_text<?php echo $set_column_content; ?>">

	<div class="number-title">
		<?php if ( $number ) : ?>
			<span class="number">
				<?php echo sprintf( '%s.', esc_html( $number ) ); ?>
			</span>
		<?php endif; ?>
		
		<?php if ( $title_text ) : ?>
			<?php echo sprintf(
				'<%s class="c-title color-primary %s">%s</%s>',
				esc_attr( $title_tag ),
				esc_attr( $title_class ),
				wp_kses_post( $title_text ),
				esc_attr( $title_tag )
			); ?>
		<?php endif; ?>
	</div>
	
	<?php if ( $text ) : ?>
		<div class="container-editor">
			<div class="editor">
				<?php echo wp_kses_post( $text ); ?>
			</div>
		</div>
	<?php endif; ?>
	
</div>
