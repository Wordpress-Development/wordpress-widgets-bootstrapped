# Wordpress Widgets Bootstrapped


<img align="right" width="350" src="https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/assets/screenshot.jpg">


Wordpress Widgets Bootstrapped is a Wordpress plugin that applies Bootstrap 3 html to the default wordpress widgets. 

This plugin was developed for Wordpress sites looking to "Bootstrap" their Wordpress widgets. It's important to note that this plugin is experimental and I have no guarantees. 

To contribute either open a pull request or [join the conversation](https://wordpress.org/support/topic/add-option-for-sidebar-paramater?replies=2) on the Widget Output Filters support forum where we are discussing new features including the ability to apply filters on specific sidebars. Currently the only way to do this is by using a theme like Genesis that lets you add and remove the `widget_output` filter to specific action hooks. See [this example](https://github.com/Wordpress-Development/genesis-bootstrap/blob/master/lib/bootstrap-widgets.php#L416) on how to do that. 

##### How it Works

* Applies [Twitter Bootstrap 3](http://getbootstrap.com) to the default [Wordpress widgets](https://codex.wordpress.org/WordPress_Widgets)
* Uses [Widget Output Fiters](https://wordpress.org/plugins/widget-output-filters/) which includes a very useful filter to override any additional widgets you may have and can be used side by side with [Widget Logic](https://wordpress.org/plugins/widget-logic/)

## Quick start

1. Download this plugin and upload it in your wordpress admin dashboard
2. Activate a Bootstrap theme if you haven't already
3. Add any of the supported widgets to a registered sidebar.


## Core Widgets Support

* archives => [Bootstrap list-group badges](http://getbootstrap.com/components/#list-group-badges)
* calendar => [Bootstrap tables](http://getbootstrap.com/css/#tables)
* categories => [Bootstrap list-group badges](http://getbootstrap.com/components/#list-group-badges)
* meta => [Bootstrap list-group](http://getbootstrap.com/components/#list-group)
* nav_menu => [Bootstrap nav-pills](http://getbootstrap.com/components/#nav-pills)
* pages => [Bootstrap nav-pills](http://getbootstrap.com/components/#nav-pills)
* recent-comments => [Bootstrap list-group](http://getbootstrap.com/components/#list-group)
* recent-posts => [Bootstrap list-group with text-muted small applied](http://getbootstrap.com/components/#list-group)
* search => [Bootstrap styled search](http://codepen.io/bootstrapped/details/YyZOJe/)
* tag_cloud => [Bootstrap labels](http://getbootstrap.com/components/#labels)

[To see a screenshot of all the supported widgets click here.](https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/assets/screenshot-widgets.jpg
) Alternative widget styling and filtering can be found in the [resources folder](https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/tree/master/resources). Just add those to the main plugin file.


## Extra

Here are some recomended Bootstrap themes that this should work with:
* [Bootstrap Genesis](https://github.com/salcode/bootstrap-genesis)
* [320press](https://github.com/320press/wordpress-bootstrap)
* [Sage](https://github.com/roots/sage)


If you're using genesis and want to use your own child theme you can get complete integration for Bootstrap with my other plugin that integrates this as well as all Bootstrap markup necessary for [Genesis support](https://github.com/Wordpress-Development/genesis-bootstrap).


Optionally visit the [Bootstrap Live Customizer](http://bootstrap-live-customizer.com/) to download a custom version of Bootstrap for the above themes and then simply download it and enqueue it in your `functions.php`. If there is anoter version of bootstrap that you want to remove, see the examples in the [wordpress-widgets-bootstrapped.php file](https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/wordpress-widgets-bootstrapped.php#L130).


## Contributing

Full thanks to [Philip Newcomber](https://philipnewcomer.net/2014/06/filter-output-wordpress-widget/) and [his plugin](https://wordpress.org/plugins/widget-output-filters/) that allows this plugin work!
