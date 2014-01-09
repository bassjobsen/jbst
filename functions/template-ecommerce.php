<?php
global $jbstecommerce;
/* Initially set jbstecommerce to false */
$jbstecommerce = false;

/*
===============================================================
WOOCOMMERCE FUNCTIONS
===============================================================
*/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
global $jbstecommerce;
$jbstecommerce = true;

	function jbst_cart_dropdown() {
	global $current_user;
	get_currentuserinfo();
	global $woocommerce;
			?>
			
				<div class="btn-group navbar-right" id="nav-cart-dropdown">
				  <button type="button" class="btn <?php jbst_nav_shop_button_class();?> navbar-btn  dropdown-toggle" data-toggle="dropdown">
					<i class="glyphicon glyphicon-shopping-cart"></i> <span class="cart-contents"><?php echo sprintf(_n('%d item &ndash; ', '%d items &ndash; ', $woocommerce->cart->get_cart_contents_count(), 'woothemes'), $woocommerce->cart->get_cart_contents_count()) . $woocommerce->cart->get_cart_total();?></span>
		     		<span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
					  <li><a href="<?php echo $woocommerce->cart->get_cart_url();?>">View Cart</a></li>
					  <li class="divider"></li>
					  <li><a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Checkout</a></li>
				  </ul>
				</div>	
			
			
			
			
			

			<?php
	}
	
	// apply the response grid
    //add_filter('woocommerce_before_main_content', 'woocommerce_before_main_content_grid');
    


	// Handle cart in header fragment for ajax add to cart
	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	
		ob_start();
	
		echo '<span class="cart-contents">'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total().'</span>'; 
		$fragments['.cart-contents'] = ob_get_clean();
	
		return $fragments;
	}
	

	
	// Define the WooCommerce content wrappers
	function jbst_open_woocommerce_content_wrappers() {
			jbst_open_content_wrappers();
	
	}
	
	function jbst_close_woocommerce_content_wrappers() {
			jbst_close_content_wrappers();

	}
	
	function jbst_prepare_woocommerce_wrappers()
	{
	   
	    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
	    add_action( 'woocommerce_before_main_content', 'jbst_open_woocommerce_content_wrappers', 10 );
	    add_action( 'woocommerce_after_main_content', 'jbst_close_woocommerce_content_wrappers', 10 );
	}
	
	add_action( 'wp_head', 'jbst_prepare_woocommerce_wrappers',50);
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	
	// Redefine woocommerce_output_related_products()
	function woocommerce_output_related_products() {
	woocommerce_related_products(3,3); // Display 3 products in rows of 3
	}
	
	/* Account Profile Button
	----------------------------------------------- */
	function jbst_woo_account_profile_link() {    
		echo '<li><a href="';
		$id = get_option('woocommerce_myaccount_page_id');
		echo get_permalink( $id );
		echo '">';
		echo _e( 'My Account', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';
		
		echo '<li><a href="';
		$passid = get_option('woocommerce_change_password_page_id');
		echo get_permalink( $passid );
		echo '">';
		echo _e( 'Change Password', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';

		echo '<li><a href="';
		$editid = get_option('woocommerce_edit_address_page_id');
		echo get_permalink( $editid );
		echo '">';
		echo _e( 'Edit Address', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';
	}
	add_action( 'jbst_nav_profile_dropdown', 'jbst_woo_account_profile_link', 10);
	
	
	/* Add custom WOO styling
	----------------------------------------------- */
	function jbst_woo_css() {    
		wp_register_style( 'jbst-woo-css', get_stylesheet_directory_uri() . '/assets/css/woo.css', array(), '20121008', 'all' );
	    wp_enqueue_style( 'jbst-woo-css' );
	}
	add_action( 'wp_enqueue_scripts', 'jbst_woo_css', 99 );
	
}

/*
===============================================================
JIGOSHOP FUNCTIONS
===============================================================
*/
elseif ( in_array( 'jigoshop/jigoshop.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
global $jbstecommerce;
$jbstecommerce = true;
	function jbst_cart_dropdown() {
	global $current_user;
	get_currentuserinfo();
	global $jigoshop;
			?>
			  <div class="btn-group pull-right" id="nav-cart-dropdown">
			    <a class="btn dropdown-toggle <?php jbst_nav_shop_button_class();?>" data-toggle="dropdown" href="#">
			      <i class="glyphicon glyphicon-shopping-cart"></i> <span class="cart-contents"><?php echo sprintf(_n('%d item &ndash; ', '%d items &ndash; ', jigoshop_cart::$cart_contents_count, 'jigoshop'), jigoshop_cart::$cart_contents_count) .jigoshop_cart::get_cart_total();?></span>
			      <span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu">
			      <li><a href="<?php echo jigoshop_cart::get_cart_url(); ?>">View Cart</a></li>
			      <li class="divider"></li>
			      <li><a href="<?php echo jigoshop_cart::get_checkout_url(); ?>">Checkout</a></li>
			    </ul>
			  </div>
			<?php
	}



	// Handle cart in header fragment for ajax add to cart
	add_filter('add_to_cart_fragments', 'jigoshop_header_add_to_cart_fragment');
	
	function jigoshop_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	
		ob_start();
	
		echo '<span class="cart-contents">'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total().'</span>'; 
		$fragments['.cart-contents'] = ob_get_clean();
	
		return $fragments;
	}


	
// Define the Jigosohp content wrappers
	function jbst_open_jigoshop_content_wrappers() {?>
			<div id="primary" class="site-content <?php do_action('jbstmaingridclass'); ?>">
				<div id="content" role="main">
	<?php
	}
	
	function jbst_close_jigoshop_content_wrappers() {?>
				</div><!-- #content -->
			</div><!-- #primary .site-content -->
	<?php
	}
	
	function jbst_prepare_jigoshop_wrappers()
	{
	    remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10 );
	    remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10);
	
	    add_action( 'jigoshop_before_main_content', 'jbst_open_jigoshop_content_wrappers', 10 );
	    add_action( 'jigoshop_after_main_content', 'jbst_close_jigoshop_content_wrappers', 10 );
	}
	add_action( 'wp_head', 'jbst_prepare_jigoshop_wrappers' );

	// Remove the Jigosohp content wrappers
	remove_action( 'jigoshop_sidebar', 'jigoshop_get_sidebar', 10);

	/* Add custom JigoShop styling
	----------------------------------------------- */
	function jbst_jigo_css() {    
		wp_register_style( 'jbst-jigo-css', get_stylesheet_directory_uri() . '/assets/css/jigo.css', array(), '20121008', 'all' );
	    wp_enqueue_style( 'jbst-jigo-css' );
	}
	add_action( 'wp_enqueue_scripts', 'jbst_jigo_css', 99 );

	/* Account Profile Button
	----------------------------------------------- */
	function jbst_jigo_account_profile_link() {    
		echo '<li><a href="';
		$id = get_option('jigoshop_myaccount_page_id');
		echo get_permalink( $id );
		echo '">';
		echo _e( 'My Account', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';
		
		echo '<li><a href="';
		$passid = get_option('jigoshop_change_password_page_id');
		echo get_permalink( $passid );
		echo '">';
		echo _e( 'Change Password', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';

		echo '<li><a href="';
		$editid = get_option('jigoshop_edit_address_page_id');
		echo get_permalink( $editid );
		echo '">';
		echo _e( 'Edit Address', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';
	}
	add_action( 'jbst_nav_profile_dropdown', 'jbst_jigo_account_profile_link', 10);

} 


/*
===============================================================
WPECOMMERCE FUNCTIONS
===============================================================
*/
elseif ( in_array( 'wp-e-commerce/wp-shopping-cart.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	/* Ajax Update Cart
	----------------------------------------------- */
	function jbst_wpec_cat_template() {
	    if(wpsc_is_viewable_taxonomy()) {get_template_part( 'pagewpec' );exit();}
	}
	add_action('jbst_before_index', 'jbst_wpec_cat_template');

	global $jbstecommerce;
	$jbstecommerce = true;
	global $wpsc_cart, $wpdb, $wpsc_checkout, $wpsc_gateway, $wpsc_coupons;
	
	/* Reset the following functions since woocommerce and jigoshop aren't active
	----------------------------------------------- */
	function is_shop() {return is_a_page_containing_products();}
	function is_product() {return is_singular( array( 'wpsc-product' ) );}
	
	/* Check for WPEC page. Used in 'is_shop()' above
	----------------------------------------------- */
	function is_a_page_containing_products(){
		global $post;
		$is_a_page_containing_products = false;
		 
		if(get_post_type($post) == 'wpsc-product') {$is_a_page_containing_products = true;}
		
		if ( function_exists( 'is_products_page' ) && !$is_a_page_containing_products){
			if(is_products_page()){$is_a_page_containing_products = true;}
		}
		
		return $is_a_page_containing_products;
	}
	
	/* Cart drop down
	----------------------------------------------- */
	function jbst_cart_dropdown() {
	global $current_user;
	get_currentuserinfo();
	global $jigoshop;
			?>
			  <div class="btn-group pull-right" id="nav-cart-dropdown">
			    <a class="btn dropdown-toggle <?php jbst_nav_shop_button_class();?>" href="<?php echo get_option('shopping_cart_url');?>">
			      <i class="glyphicon glyphicon-shopping-cart"></i> <span class="cart-contents"><?php if(wpsc_cart_item_count() > 0) {echo wpsc_cart_item_count().' item(s) - '.wpsc_cart_total_widget();} else {echo wpsc_cart_total_widget();}?></span>
			    </a>
			  </div>
			<?php
	}

	/* Ajax Update Cart
	----------------------------------------------- */
	function jbst_wpec_cart_update() {
	    $cart_count = wpsc_cart_item_count();
	    $total = wpsc_cart_item_count().' item(s) - '.wpsc_cart_total_widget();
	    echo 'jQuery(".cart-contents").html("'.$total.'");';
	}
	add_action('wpsc_alternate_cart_html', 'jbst_wpec_cart_update');

	/* Deregister WPEC scripts and styles
	----------------------------------------------- */
	add_action('wp_enqueue_scripts',
	'deregister_wp_e_commerce_dynamic_style', 30);
	
	function deregister_wp_e_commerce_dynamic_style() {
		wp_deregister_style( 'wpsc-theme-css' );
		wp_deregister_style( 'wpsc-theme-css-compatibility' );
		wp_deregister_style( 'wp-e-commerce-dynamic' );
		wp_deregister_style( 'wpsc-thickbox' );
		wp_deregister_script( 'wpsc_colorbox' );
	}
	
	/* Use jQuery to add bootstrap classes to stuff
	----------------------------------------------- */
	function jbst_wpec_add_classes() {?>
	<script>
	jQuery(document).ready(function($) {
	  /* Add to cart buttons */
	  $(".wpsc_buy_button").addClass("btn btn-success");
	  /* Delete/Remove buttons */
	  $("a.emptycart,form.adjustform.remove input[type='submit']").addClass("btn btn-danger");
	  /* Update buttons */
	  $("form.adjustform.qty input[type='submit'],.wpsc-user-account input[type='submit']").addClass("btn btn-warning");
	  /* Checkout buttons */
	  $("a.gocheckout, .make_purchase").addClass("btn btn-success");
	  /* Small buttons */
	  $("a.gocheckout,a.emptycart,form.adjustform.remove input[type='submit'],form.adjustform.qty input[type='submit']").addClass("btn-small");
	  /* Large buttons */
	  $(".make_purchase").addClass("btn-large");
	  /* Checkout Table */
	  $(".checkout_cart").addClass("table table-striped");
	  /* Account Table */
	  $(".logdisplay").addClass("table table-striped logdisplay");
	  /* Thumbnails */
	  $("a.preview_link").addClass("preview_link thumbnail");
	  $(".wpsc-breadcrumbs").addClass("breadcrumb");	  
	  	  

	  
	  var highestCol = Math.max($('.single_product_display .imagecol').height(),$('.single_product_display .productcol').height());
	  $('.single_product_display .imagecol').height(highestCol);
	  var highestCol = Math.max($('.prodtitle').height(),$('.prodtitle').height());
	  $('.prodtitle').height(highestCol);
	  <?php $columns = get_theme_mod('wpec_columns', 'four-column');$layout = get_theme_mod('wpec_layout', 'list-view');?>
	  $("#default_products_page_container").addClass("<?php echo $columns;?>");
	  <?php if($layout == 'grid-view') {echo '
	  $("#default_products_page_container").addClass("jbst-grid-view");
	  $("#product-grid-view").addClass("active");
	  $("#product-list-view").removeClass("active");
	  ';}?> 
	});
	</script>
	<?php
	}
	add_action('wp_head','jbst_wpec_add_classes', 30);
	
	/* Add images beneath the product description
	----------------------------------------------- */
	add_action('wpsc_theme_footer','jbst_wpec_image_gallery', 30);
	function jbst_wpec_image_gallery() {
	$tabs = 0;
	if(wpsc_is_single_product()) {
		global $wp_query;
		global $post;
		$id = $post->ID;
		$tabs = 0;
		$featured_image = get_post_thumbnail_id($id);
		$args = array( 'post_type' => 'attachment', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_mime_type' => 'image' ,'post_status' => null, 'post_parent' => $post->ID, 'exclude' => $featured_image,'numberposts' => -1 );
		$attachments = get_posts($args);
		?>
		<ul id="myTab" class="nav nav-tabs">
              <?php if ($attachments) :?>
              <li class="active"><a href="#addimages" data-toggle="tab"><?php _e( 'Additional Images', 'jamedo-bootstrap-start-theme' );?></a></li>
              <?php endif;?>
              <?php if ( wpsc_the_product_additional_description() ) : ?>
              	<li class="<?php if (!$attachments) {echo 'active';}?>"><a href="#proddesc" data-toggle="tab"><?php _e( 'Additional Description', 'jamedo-bootstrap-start-theme' );?></a></li>
              <?php endif;?>
              <?php do_action( 'jbst_wpec_prod_add_tabs' );?>
        </ul>
		<div id="myTabContent" class="tab-content">
              
                
                <?php
			if ($attachments) {
			$tabs = 1;
			echo '<div class="tab-pane fade active in" id="addimages">';
			echo '<div class="jbst-wpec-product-add-images"><h3>';
			//_e( 'Additional Images', 'jamedo-bootstrap-start-theme' );
			echo '</h3>';
			$thumbwidth = 125;
			$thumbheight = 125;
			foreach ( $attachments as $attachment ) { 
					$thumbnail = wp_get_attachment_url( $attachment->ID , false );
			$image = jbst_resize( $attachment->ID, '', $thumbwidth, $thumbheight, true );
			
			?>
		     	      <a rel="<?php echo wpsc_the_product_title(); ?>" class="preview_link thumbnail" href="<?php echo wp_get_attachment_url( $attachment->ID , false ); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumbwidth;?>" height="<?php echo $thumbwidth;?>" border="0" /></a>
			<?php
				}
				echo "<div class='clear'></div></div>";
                 ?>
                
              </div>
		<?php

			} ?>
			              <?php if ( wpsc_the_product_additional_description() ) : $tabs = 1;?>
	              <div class="tab-pane fade<?php if (!$attachments) {echo ' active in';}?>" id="proddesc">
	                <?php echo wpsc_the_product_additional_description(); ?>
	              </div>
              <?php endif;?>
              <?php do_action( 'jbst_wpec_prod_add_tab_containers' );?>
            </div><?php
			
			
		}
		
		if ($tabs == 0) {echo '<style>ul#myTab {display:none;}</style>';}
		
	}//END jbst_wpec_image_gallery()
	
	/* Clear end of product form
	----------------------------------------------- */
	add_action('wpsc_product_form_fields_end','jbst_wpec_after_default_product_image', 30);
	function jbst_wpec_after_default_product_image() {echo '<div class="clear"></div>';}

	/* Add custom WPEC styling
	----------------------------------------------- */
	function jbst_wpec_css() {    
		wp_register_style( 'jbst-wpec-css', get_stylesheet_directory_uri() . '/assets/css/wpec.css', array(), '20121004', 'all' );
	    wp_enqueue_style( 'jbst-wpec-css' );
	}
	add_action( 'wp_enqueue_scripts', 'jbst_wpec_css', 99 );

	/* Account Profile Button
	----------------------------------------------- */
	function jbst_wpec_account_profile_link() {    
		echo '<li><a href="';
		echo get_option('user_account_url');
		echo '">';
		echo _e( 'My Account', 'jamedo-bootstrap-start-theme' );
		echo '</a></li>';
	}
	add_action( 'jbst_nav_profile_dropdown', 'jbst_wpec_account_profile_link', 11);
	remove_action( 'jbst_nav_profile_dropdown','jbst_account_profile_link');

	/* Products Page View Switch Button
	----------------------------------------------- */
	
	add_action('wpsc_top_of_products_page', 'jbst_wpec_view_switch_button');
	
	function jbst_wpec_view_switch_button() {
	if (!is_product()){
		echo '
		<div id="product-view-switch" class="btn-group pull-right">
			<a id="product-list-view" class="btn btn-default btn-large active" rel="tooltip" title="List View"><i class="glyphicon glyphicon-list"></i></a>
			<a id="product-grid-view" class="btn btn-default btn-large" rel="tooltip" title="Grid View" ><i class="glyphicon glyphicon-th"></i></a>
		</div>
		<div class="clear"></div>
		<script>
		jQuery(document).ready(function($) {
		$("#product-list-view").click(function() {
		  $("#default_products_page_container").addClass("jbst-list-view");
		  $("#default_products_page_container").removeClass("jbst-grid-view");

		  $("#product-list-view").addClass("active");
		  $("#product-grid-view").removeClass("active");
		});
		$("#product-grid-view").click(function() {
		  $("#default_products_page_container").addClass("jbst-grid-view");
		  $("#product-grid-view").addClass("active");
		  $("#product-list-view").removeClass("active");
		  	  var highestCol = Math.max($(".jbst-grid-view .prodtitle").height(),$(".jbst-grid-view .prodtitle").height());
	  $(".jbst-grid-view .prodtitle").height(highestCol);
		});
		});
		</script>
		<style>
		#product-view-switch {margin-bottom:30px;}
		.jbst-grid-view .default_product_display .imagecol {float:none;margin-left:0;}
		
		.jbst-grid-view .default_product_display {width:32%;margin-right:2%;float:left;border-bottom:0px;}
		.jbst-grid-view .default_product_display:nth-child(3n+3) {margin-right:0;float:left;}

		.jbst-grid-view.two-column .default_product_display {width:49%;margin-right:2%;float:left;border-bottom:0px;}
		.jbst-grid-view.two-column .default_product_display:nth-child(2n+2) {margin-right:0;float:left;}
		
		.jbst-grid-view.four-column .default_product_display {width:23.5%;margin-right:2%;float:left;border-bottom:0px;}
		.jbst-grid-view.four-column .default_product_display:nth-child(4n+4) {margin-right:0;float:left;}
		
		.jbst-grid-view.five-column .default_product_display {width:18.4%;margin-right:2%;float:left;border-bottom:0px;}
		.jbst-grid-view.five-column .default_product_display:nth-child(5n+5) {margin-right:0;float:left;}

		.jbst-grid-view .productcol {display:none;}
		.jbst-grid-view .default_product_display h2.prodtitle {margin-bottom: 10px;margin-left: 4px;font-size:16px;margin-bottom:6px;line-height:1;}
		</style>
		';
		}
	}

} // END OF WP E-COMMERCE CHECK

/*
===============================================================
WELL…I GUESS ECOMMERCE ISN'T ACTIVE!
===============================================================
*/
else {
	/* RESET THE CART */
	function jbst_cart_dropdown() {
	/* Nothing here since ecommerce is not activated */
	}
}
