<?php
/*
==========================================================
jbst MENU WIDGET
==========================================================
*/
class jbst_Menu_Widget extends WP_Widget {

  function jbst_Menu_Widget()
  {
    $widget_ops = array('classname' => 'jbst_Menu_Widget', 'description' => 'Displays one of your custom menus using Bootstrap\'s stacked tabs or stacked pills markup.' );
    $this->WP_Widget('jbst_Menu_Widget', 'JBST Custom Menu', $widget_ops);
  }
 
  function widget($args, $instance)
  {
	
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		$show_info = '';
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;


		echo $args['before_widget'];

		if ( !empty($instance['title']) )
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
	           global $wp_query;     

		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'link_before' => '<i class="glyphicon glyphicon-chevron-right"></i>', 'menu_class' => 'nav jbst_custom_nav '.$show_info.' nav-stacked', 'walker' => new wp_bootstrap_navwalker()) );

		echo $args['after_widget'];
  } 
 
  function update($new_instance, $old_instance)
  {
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
  }
 
  function form($instance)
  {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'jamedo-bootstrap-start-theme') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:', 'jamedo-bootstrap-start-theme'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
			}
		?>
			</select>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id('show_info'); ?>"><?php _e('Select Style:', 'jamedo-bootstrap-start-theme'); ?></label>
		<select id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>">
		<option <?php if ($instance['show_info'] == 'nav-tabs') {echo 'selected="selected" ';}?>value="nav-tabs">Tabs</option>
		<option <?php if ($instance['show_info'] == 'nav-pills') {echo 'selected="selected" ';}?>value="nav-pills">Pills</option>
		</select>
		</p>

		
		<?php
  }
 
}
register_widget('jbst_Menu_Widget');


/*
==========================================================
jbst MENU WIDGET
==========================================================
*/
