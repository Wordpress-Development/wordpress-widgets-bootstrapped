# Wordpress Widgets Bootstrapped


<img align="right" width="275" src="https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/assets/screenshot.jpg">


Wordpress Widgets Bootstrapped is a Wordpress plugin that applies Bootstrap 3 html to the default wordpress widgets. This plugin was developed for Wordpress sites looking to "Bootstrap" their Wordpress widgets.

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
* search => [Bootstrap styled search](]http://codepen.io/bootstrapped/details/YyZOJe/)
* tag_cloud => [Bootstrap labels](http://getbootstrap.com/components/#labels)

[To see a screenshot of all the supported widgets click here/.](https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/assets/screenshot-widgets.jpg
)



Here are some recomended Bootstrap themes that this should work with:
* [Bootstrap Genesis](https://github.com/salcode/bootstrap-genesis)
* [320press](https://github.com/320press/wordpress-bootstrap)
* [Sage](https://github.com/roots/sage)


Optionally visit the [Bootstrap Live Customizer](http://bootstrap-live-customizer.com/) to download a custom version of Bootstrap for the above themes and then simply download it and enqueue it in your `functions.php`. If there is anoter version of bootstrap that you want to remove, see the examples in the [wordpress-widgets-bootstrapped.php file](https://github.com/Wordpress-Development/wordpress-widgets-bootstrapped/blob/master/wordpress-widgets-bootstrapped.php#L130)







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
