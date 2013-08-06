<?php
/**
 * The template for displaying search forms in skematik
 *
 * @package skematik
 * @since skematik 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'jamedo-bootstrap-start-theme' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'jamedo-bootstrap-start-theme' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'jamedo-bootstrap-start-theme' ); ?>" />
	</form>
