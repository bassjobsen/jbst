<?php
if (isset($_POST['SaveCBESettings'])) {
					
		if (!empty($_POST) && check_admin_referer( 'cbe-nonce') ) 
		{
			
			    $SaveCBESettings = 1;
				$in = true;
				$url = wp_nonce_url('themes.php?page=wp-less-to-css','cbe-nonce');
				if (false === ($creds = request_filesystem_credentials($url, '', false, false, array('SaveCBESettings','customlesscode')) ) ) {
					$in = false;
				}
				if ($in && ! WP_Filesystem($creds) ) {
					// our credentials were no good, ask the user for them again
					request_filesystem_credentials($url, '', true, false,array('SaveCBESettings','customlesscode'));
					$in = false;
				}
				if($in)
				{
					
					$this->customlesscode = stripslashes($_POST['customlesscode']);
					$this->save_options();
				    $this->wpless2csssavecss($creds);
					unset($_POST);
					echo '<div id="message" class="updated"><p><strong>Settings have been saved.</strong></p></div>';
				    
				}
			
			
			
			


	    }
}
if(empty($_POST))
{
	

echo '<div class="wrap">'."\n";
?><h2><?php echo __('LESS Compiler','wpless2css');?></h2><?php 
		
		
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
                <p class="submit"><input type="submit" name="SaveCBESettings" value="Recompile LESS code" class="button-primary" /></p>
            </div>
        </div><!-- postbox -->
        
        

        
        </form>
        </div><!-- metabox holder -->




        <?php
		echo '</div><!-- wrap -->'."\n";
}
