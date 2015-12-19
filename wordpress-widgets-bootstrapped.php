<?php
/**
 * Wordpress Widgets Bootstrapped (for Widget Output Filters Plugin)
 *
 * @package   Wordpress Widgets Bootstrapped
 * @author    Bryan Willis
 * @link      http://wordpress.stackexchange.com/a/211634/43806
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Widgets Bootstrapped (Widget Output Filters)
 * Plugin URI:        https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped
 * Description:       Submodule for widget output filters to add Twitter Bootstrap markup to wordpress widgets. Widget Output Filters plugin included. Requires Widget Output Filters Plugin and theme with Bootstrap 3 support.
 * Version:           1.0.0
 * Author:            Bryan Willis
 * Author URI:        http://profiles.wordpress.org/codecandid
 */
 
/**
 * This plugin does the following on activation:
 * - Checks if Widget Output Filters is activated and if not deactivate itself.
 * - Filters the html markup to support Bootstrap 3 styling. Without Botstrap enqueued it won't appear to do anything.
 * - Supports - categories, calendar, tag cloud, archives, meta, recent-posts, recent-comments, pages, nav-menu, search
 */
 
defined( 'WPINC' ) or die;
register_activation_hook( __FILE__, 'activate_wop_bootstrap_register_activation_hook' );
function activate_wop_bootstrap_register_activation_hook() {
	$admin_url = admin_url().'/plugin-install.php?tab=plugin-information&plugin=widget-output-filters';
	if ( ! function_exists('widget_output_filters_dynamic_sidebar_params') ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( sprintf( __( 'This plugin REQUIRES a bootstrap supported theme and Widget Output Filters to work. To activate %1$sBootstrap-Widget-Filters%2$s please make sure you have Bootstrap 3 enqueued and either %3$sinstall Widget Output Filters%4$s or optionally back to the %5$sPlugins Page%4$s. to activate it' ), '<em>', '</em>', '<a href="'.$admin_url.'" target="_blank">', '</a>', '<a href="javascript:history.back()">' ) );
	}
}




/******************************************************************************************/
/*   Bootstrap 3 Widget Filters                                                           */
/******************************************************************************************/

//*
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
			$regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/"; //clean up
			$replace_with = "$1><span class='label label-primary'>$3</span>$4";
			$widget_output = preg_replace( $regex , $replace_with , $widget_output );
    			break;
		case 'archives' :	
      			$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
      			$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
			$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
   			$widget_output = str_replace(')', ' </span>', $widget_output);
    			break;
		case 'meta' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
    			break;
		case 'recent-posts' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
			$widget_output = str_replace('class="post-date"', 'class="post-date text-muted small"', $widget_output);
    			break;
		case 'recent-comments' :   	
        		$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group">', $widget_output);
        		$widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item">', $widget_output);
     			break;
		case 'pages' :   	
	        	$widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
	     		break;
		case 'nav_menu' :   	
	        	$widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
	    		break;
    		default:
			$widget_output = $widget_output; // not sure if this is needed
	}
      return $widget_output;
}
add_filter( 'widget_output', 'wop_bootstrap_widget_output_filters', 10, 3 ); // not sure if this should be hooked into an action... maybe init or widgets_init




/******************************************************************************************/
/*   Search Form - Using native in wordpress filter                                       */
/******************************************************************************************/

//*
add_filter( 'get_search_form', 'wop_bootstrap_search_form', 100);
function wop_bootstrap_search_form() {
    $value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';
    $label = 'Search';
    $search_text = 'Search this website...';
    $button_text = 'Search';
$form = '<form method="get" class="search-form form-inline" action="'.home_url( '/' ).'" role="search">
    <div class="form-group">
        <label class="sr-only sr-only-focusable" for="bsg-search-form">'.esc_html( $label ).'</label>
        <div class="input-group">
            <input type="search" class="search-field form-control" id="search" name="s" '.$value_or_placeholder.'="'.esc_attr( $search_text ).'">
            <span class="input-group-btn">
                <button type="submit" class="search-submit btn btn-default">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <span class="sr-only">'.esc_attr( $button_text ).'</span>
                </button>
            </span>
        </div>
    </div>
</form>';
    return $form;
}
// */




/******************************************************************************************/
/*   Removes a version of Bootstrap included with your theme and add your own local copy  */
/******************************************************************************************/

/*
function mytheme_custom_bootstrap() {
    // if bootstrap is already registered...
    if( wp_script_is( 'bsg_combined_css', 'enqueued' ) ) {
        // ...dequeue it...
        wp_dequeued_style( 'bsg_combined_css' );
        // ...and re-register and enqueue it with our own, modified bootstrap...
        wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/custom-bootstrap.css' );
        // ...and enqueue it!
        wp_enqueue_style( 'bootstrap' );
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_custom_bootstrap' );
// */




/******************************************************************************************/
/*   Enqueue latest bootstrap stylesheet and javascript from Bootstrap CDN                */
/******************************************************************************************/

/*
function mytheme_custom_bootstrap_cdn() {

	// Register and Enqueue Style
	wp_register_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css', false, false, 'all' );
	wp_enqueue_style( 'bootstrap-css' );
	
	// Register and Enqueue Script
	wp_register_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bootstrap-js' );
	
}
add_action( 'wp_enqueue_scripts', 'mytheme_custom_bootstrap_cdn' );
// */
