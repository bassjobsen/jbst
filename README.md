Jamedo's Bootstrap Start Theme (JBST)
=====================================

Powerful theme framework that can be used as a standalone website builder or as a framework to create child themes for wordpress build on Twitter's Bootstrap 3.
The original framework is written by [Matt Jones of Rocket Farmer, LLC](http://rocketfarmer.net/) (former Skematik theme framework)
It also has built in support for theme options, metaboxes, BuddyPress and eCommerce (WooCommerce, JigoShop and WPeCommerce).

* [Twitter's Bootstrap 3](http://getboostrap.com/) ready
* E-Commerce ( we recommend WooCommerce )
* Buddy Press

Installation
------------

[Download the latest version as .zip file](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/archive/master.zip). Upload the .zip file to your Wordpress theme directory (wp-content/themes) or use Install theme function in your dashboard.
Activate the theme in your dashboard ( Appearence > themes ).

Migration
---------

1. download from: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/archive/master.zip
2. unzip this file in the wp-content/themes folder (this will create a folder with the name “jamedo-bootstrap-start-theme”)
3. (search and) replace all “span*” classes in your theme files with “col(-sm|lg)-*”, see Grid (below) and also: [http://stackoverflow.com/a/17890898/1596547](http://stackoverflow.com/a/17890898/1596547). Or try [Twitter's Bootstrap Migrator](http://bootstrapmigrator.w3masters.nl/)
4. fix all other points (general issues should be send by email to bass@w3masters.nl, twitter @bassjobsen, or send as a pull request )

[Read more](http://bassjobsen.weblogs.fm/migrate_skematik_to_twitter_bootstrap3/)

Grid
----
The most important changes in Twitter Bootstrap 3 will be the more mobile-first approaching and the grid. From now Twitter’s Bootstrap defines three grids: Tiny grid for Phones (&lt;768px), Small grid for Tablets (&gt=;768px) and the Medium-large grid for Destkops (&gt;=992px). The row class prefixes for these grid are “.col-”, “.col-sm-” and “.col-lg-”. The Medium-large grid will stack below 992 pixels screen width. So does the Small grid below 768 pixels and the tiny grid never stacks. (updated for Twitter's Bootstrap3 RC1). Also read: [Twitter Bootstrap 3 breakpoints and grid](http://bassjobsen.weblogs.fm/twitter-bootstrap-3-breakpoints-and-grid/)

JBST use the Small grid by default. You can change this in the customizer. (Tiny, Small or Large). The large grid will stack below the 992px and be horizontal for desktop (and large tablets) while the Tiny grid never stacks.

More about the grid and examples on: [http://getbootstrap.com/css/#grid](http://getbootstrap.com/css/#grid)

NOTE: Twitter's Bootstrap 3 RC2 intoduced a new grid class (`col-xs-*`). The class is used for mobile phone but only set (or not) the default behavior. `col-xs-*` will always stack (and never become horizontal).

Without Responsive features
---------------------------
The Tiny grid will never stack so use this if you don't want to use responsive features of Twitter's Bootstrap. There is no option to choose between repsonsive and non-responsive at the moment. Beside the Tiny grid setting you will need to add some custom css and an extra class to your templates, see: [Bootstrap 3 - Turn off responsive completely](http://stackoverflow.com/questions/18146476/bootstrap-3-turn-off-responsive-completely/18185520).

Keep in mind this setting don't set the @grid-float-breakpoint. This (Less) setting will be used for the collapsing point of the navbar. The setting is also used for modals, forms and carousels. To (re)set the @grid-float-breakpoint you will have to compile your own copy of the Bootstrap CSS and use this (replace libary/assets/css/bootstrap.min.css). After the final release of TB3 we will add a non-responsive option for this to the customizer too.

To remove all responsive features consider to replace the Bootstrap CSS (replace libary/assets/css/bootstrap.min.css) with the one from
https://github.com/bassjobsen/non-responsive-tb3. Also read: [Compile Twitter’s Bootstrap 3 without responsive features](http://bassjobsen.weblogs.fm/compile-twitters-bootstrap-3-without-responsive-features/).


Recommended Plugins
-------------------

* [Wordpress SEO Plugin](http://yoast.com/wordpress/seo/)
* [WooCommerce](http://www.woothemes.com/woocommerce/), with [WooCommerce Twitter's Bootstrap Plugin](https://github.com/bassjobsen/woocommerce-twitterbootstrap)

Support
-------

We are always happy to help you. If you have any question regarding 
this code. [Send us a message](http://www.jamedowebsites.nl/contact/)
or contact us on twitter [@JamedeoWebsites](http://twitter.com/JamedoWebsites)

Credits
-------

* [Matt Jones of Rocket Farmer](http://rocketfarmer.net/)
* [Bootstrap](http://twitter.github.com/bootstrap/)
* [jQuery](http://www.jquery.com/)

Example
-------
![Screendump theme home](http://bassjobsen.weblogs.fm/wp-content/uploads/2013/07/jamedotheme.png)
