# [Wordpress Widgets Bootstrapped](http://gb3.wpengine.com/hello-world/)


<img align="right" width="300" src="https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/assets/screenshot.jpg">


Wordpress Widgets Bootstrapped is a Wordpress plugin that applies Bootstrap 3 html to the default wordpress widgets. This plugin was developed for Wordpress sites looking to "Bootstrap" their Wordpress widgets.

##### How it Works

* Applies [Twitter Bootstrap 3](http://getbootstrap.com) to the default [Wordpress widgets](https://codex.wordpress.org/WordPress_Widgets)
* Uses [Widget Output Fiters](https://wordpress.org/plugins/widget-output-filters/) which includes a very useful filter to override any additional widgets you may have and can be used side by side with [Widget Logic](https://wordpress.org/plugins/widget-logic/)




Note the demo in the above link is a sandbox site that I'm frequently changing so it may not reflect the widgets in this plugin.

Here are some reccomended Bootstrap themes that this should work with:
* [Bootstrap Genesis](https://github.com/salcode/bootstrap-genesis)
* [320press](https://github.com/320press/wordpress-bootstrap)
* [Sage](https://github.com/roots/sage)


Optionally visit the [Bootstrap Live Customizer](http://bootstrap-live-customizer.com/) to download a custom version of Bootstrap for the above themes and then simply download it and enqueue it in your `functions.php`. If there is anoter version of bootstrap that you want to remove, see the following example on how to do with the [Bootstrap Genesis](https://github.com/salcode/bootstrap-genesis) theme.

```php
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
```


## Quick start

Choose one of the following options:

1. Download the latest stable release from
   [html5boilerplate.com](https://html5boilerplate.com/) or create a
   custom build using [Initializr](http://www.initializr.com).
2. Clone the git repo — `git clone
   https://github.com/h5bp/html5-boilerplate.git` - and checkout the
   [tagged release](https://github.com/h5bp/html5-boilerplate/releases)
   you'd like to use.





## Core Widgets Chages

* archives - 
* calendar
*categories
* meta
* nav_menu
* pages
* recent-comments
* recent-posts - 
* search -
* tag_cloud - [Bootstrap labels](http://getbootstrap.com/components/#labels)


_No changes made to `rss` or `text` widgets_

*This doesn't mean that HTML5 Boilerplate cannot be used in older browsers,
just that we'll ensure compatibility with the ones mentioned above.*

If you need legacy browser support (IE 6+, Firefox 3.6+, Safari 4+) you
can use [HTML5 Boilerplate v4](https://github.com/h5bp/html5-boilerplate/tree/v4),
but is no longer actively developed.





## Contributing

Hundreds of developers have helped make the HTML5 Boilerplate what it is
today. Anyone and everyone is welcome to [contribute](CONTRIBUTING.md),
however, if you decide to get involved, please take a moment to review
the [guidelines](CONTRIBUTING.md):

* [Bug reports](CONTRIBUTING.md#bugs)
* [Feature requests](CONTRIBUTING.md#features)
* [Pull requests](CONTRIBUTING.md#pull-requests)


## License

The code is available under the [MIT license](LICENSE.txt).
