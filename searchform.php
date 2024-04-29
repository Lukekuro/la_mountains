<?php
/**
 * The template for displaying search forms
 *
 * @package la_mountainser
 */

?>
<form class="search-form" id="searchform" role="search" action="<?php echo esc_url( home_url() ); ?>">
	<input class="search-form__input" id="s" name="s" type="text" placeholder="<?php esc_html_e( 'Search', 'la_mountains' ); ?>" required>
	<button class="search-form__submit" type="submit">
		<svg>
			<use xlink:href="#search"></use>
		</svg>
	</button>
</form>
