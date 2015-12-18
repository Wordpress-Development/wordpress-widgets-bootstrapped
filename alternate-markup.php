<?php
/**
 * This is alternate markpup options for current setup. Replace these in the main plugin if you want them
 */
   
  // recent-posts  (change from list group with small date to list group with label date)
	$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
	$widget_output = str_replace('<li>', '<li class="list-group-item recent-posts-list-group-item">', $widget_output);
  	$widget_output = str_replace('class="post-date"', 'class="post-date label label-primary"', $widget_output);


/**
 * These are alternate options for the footer with future setup (when new paramater is added for sidebar filtering).
 * Read blog for more details - https://philipnewcomer.net/2014/06/filter-output-wordpress-widget/#comment-77098
 * Support - https://wordpress.org/support/topic/add-option-for-sidebar-paramater?replies=2
 */

  // categories  (list unstyled with badge)
	$widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
	$widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
	$widget_output = str_replace(')', ' </span>', $widget_output);

  // meta  (list unstyled)
	$widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);

  // nav_menu  (list unstyled)
	$widget_output = str_replace(' class="menu"', 'class="menu list-unstyled"', $widget_output);

 // recent-posts  (list unstyled)
	$widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);

  // recent-comments (list-unstyled)
	$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-unstyled">', $widget_output);

  // pages (list-unstyled)
	$widget_output = str_replace('<ul>', '<ul class="list-unstyled">', $widget_output);
