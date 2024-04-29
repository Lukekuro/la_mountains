<?php
/**
 * Anchor builder part
 *
 * @package la_mountainser
 */

$anchor_id = get_sub_field( 'anchor_id' ); ?>
<?php if ( $anchor_id ) : ?>
	<div class="anchor" id="<?php echo esc_html( sanitize_title( $anchor_id ) ); ?>"></div>
<?php endif; ?>
