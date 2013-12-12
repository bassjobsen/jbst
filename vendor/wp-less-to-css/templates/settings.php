<?php
if (isset($_POST['SaveCBESettings'])) {
					
		if (!empty($_POST) && check_admin_referer( 'cbe-nonce') ) 
		{
   	
			

			    $this->customlesscode = $_POST['customlesscode'];

			
			
        
                if( !is_dir( $this->folder ) ) wp_mkdir_p( $this->folder );
                if ( is_writable( $this->folder ) ){

       		
				$this->save_options();
				$this->wpless2csssavecss();
		
				
		
				
					
				echo '<div id="message" class="updated"><p><strong>Settings have been saved.</strong></p></div>';
				
			    } 

	    }
}
?>

<?php
		echo '<div class="wrap">'."\n";
?><h2>WP LESS to CSS <?php echo __('Settings','wpless2css');?></h2><?php 
		
		
		// Show Forms
		?>
		<div class="metabox-holder">
		<form id="FeaturedBanners" method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
        <?php wp_nonce_field('cbe-nonce'); ?>
        <div class="postbox" id="flexslider_settings">
        	<h3>Options</h3>
            <div class="inside">
                <fieldset>
				<p><label for="customlesscode"><?php echo __('Custom Less code','wpless2css');?>:</label>
                	<textarea style="width:70%;height:100px;" id="customlesscode" name="customlesscode"><?php
				
						echo $this->customlesscode;
		
					?></textarea></p>
			  </fieldset>
                <p class="submit"><input type="submit" name="SaveCBESettings" value="Save All Changes" class="button-primary" /></p>
            </div>
        </div><!-- postbox -->
        
        

        
        </form>
        </div><!-- metabox holder -->




        <?php
		echo '</div><!-- wrap -->'."\n";
