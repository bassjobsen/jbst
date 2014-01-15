<?php
/**
 * The template for displaying search forms in jbst
 *
 * @package jbst
 * @since jbst 1.0
 */
?>
    
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<div class="form-group">
		<label>
		<span class="sr-only"><?php esc_attr_e( 'Search for:', 'jamedo-bootstrap-start-theme' ); ?></span>
		<input type="search" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'jamedo-bootstrap-start-theme' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'jamedo-bootstrap-start-theme' ); ?>" />
		</label>
	
		<button type="submit" class="btn <?php jbst_button_class();?> searchbutton" name="submit"><?php esc_attr_e( 'Search', 'jamedo-bootstrap-start-theme' ); ?></button>
		</div>
	</form>
