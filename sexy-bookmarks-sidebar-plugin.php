<?php
/*
Plugin Name: Sexy Bookmarks Sidebar Widget
Plugin URI: http://wakeless.net/
Description: Add Sexy Bookmarks to the sidebar
Author: Michael Gall
Version: 0.1
Author URI: http://terroir.me/
*/


class Sexy_Bookmarks_Sidebar_Widget extends WP_Widget {
	function Sexy_Bookmarks_Sidebar_Widget() {
    	parent::WP_Widget(false, $name = "Sexy Bookmarks");
	}

	function widget($args, $instance) {		
    	extract( $args );
    	$title = apply_filters('widget_title', $instance['title']);
        ?>
        	<?php echo $before_widget; ?>
            <?php if ( $title )
            	echo $before_title . $title . $after_title; ?>
            <?php selfserv_sexy(); ?>
            <?php echo $after_widget; ?>
        <?php
    }
    
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Sexy_Bookmarks_Sidebar_Widget");'));