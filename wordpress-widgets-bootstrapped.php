<?php
/**
 * Wordpress Widgets Bootstrapped
 *
 * @package   Wordpress Widgets Bootstrapped
 * @author    Bryan Willis
 * @license   GPL-2.0+
 * @link      http://wordpress.stackexchange.com/a/211634/43806
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Widgets Bootstrapped
 * Plugin URI:        https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped
 * Description:       Add Bootstrap to wordpress widgets. Widget Output Filters plugin included. Requires Widget Output Filters Plugin and theme with Bootstrap 3 support.
 * Version:           1.0.0
 * Author:            Bryan Willis
 * Author URI:        http://profiles.wordpress.org/codecandid
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
/**
 * This plugin does the following on activation:
 * - Checks if Widget Output Filters is activated and if not deactivate itself.
 * - Filters the html markup to support Bootstrap 3 styling. Without Botstrap enqueued it won't appear to do anything.
 */
 
defined( 'WPINC' ) or die;
register_activation_hook( __FILE__, 'activate_wop_bootstrap_register_activation_hook' );
function activate_wop_bootstrap_register_activation_hook() {
	$admin_url = admin_url().'/plugin-install.php?tab=plugin-information&plugin=widget-output-filters';
	if ( ! function_exists('widget_output_filters_dynamic_sidebar_params') ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( sprintf( __( 'This theme requires a bootstrap supported theme and Widget Output Filters to work. You can\'t activate %1$sBootstrap-Widget-Filters%2$s until you install or activate the %3$sWidget Output Filters Plugin%4$s. Go back to the %5$sPlugins Page%4$s.' ), '<em>', '</em>', '<a href="'.$admin_url.'" target="_blank">', '</a>', '<a href="javascript:history.back()">' ) );
	}
}

/** 
 * Bootstrap 3 support for core wordpress widgets
 */
function wop_bootstrap_widget_output_filters( $widget_output, $widget_type, $widget_id ) {
	
	switch( $widget_type ) {
		
		case 'categories' :
      			$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
      			$widget_output = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item cat-item cat-item-', $widget_output);
      			$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
      			$widget_output = str_replace(')', ' </span>', $widget_output);
      			break;
		case 'calendar' :
			$widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
        		$widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
    			break;
		case 'tag_cloud' :    	
			$regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/"; // can probably be cleaned up
			$replace_with = "$1><span class='label label-primary'>$3</span>$4";
			$widget_output = preg_replace( $regex , $replace_with , $widget_output );
    			break;
		case 'archives' :	
      			$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
      			$widget_output = str_replace('<li>', '<li class="list-group-item archive-list-group-item">', $widget_output);
			$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
   			$widget_output = str_replace(')', ' </span>', $widget_output);
    			break;
		case 'meta' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item meta-list-group-item">', $widget_output);
    			break;
		case 'recent-posts' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item recent-posts-list-group-item">', $widget_output);
    			break;
		case 'recent-comments' :   	
        		$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group">', $widget_output);
        		$widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item recent-comments-list-group-item">', $widget_output);
     			break;
		case 'pages' :   	
	        	$widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
	     		break;
		case 'nav_menu' :   	
	        	$widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
	    		break;
    		default:
			$widget_output = $widget_output; // not sure if this is needed...
	}
	
      return $widget_output;
      
}

add_filter( 'widget_output', 'wop_bootstrap_widget_output_filters', 10, 3 ); // not sure if this should be hooked into an action... maybe init or widgets_init
