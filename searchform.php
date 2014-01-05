<?php
/**
 * The template for displaying search forms in jbst
 *
 * @package jbst
 * @since jbst 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="form-group">
		<label for="s" class="sr-only"><?php _e( 'Search', 'jamedo-bootstrap-start-theme' ); ?></label>
		<input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'jamedo-bootstrap-start-theme' ); ?>" />
		</div>
		<input type="submit" class="btn <?php jbst_button_class();?>" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'jamedo-bootstrap-start-theme' ); ?>" />
	</form>
