JBST (Jamedo's Bootstrap Start Theme)
=====================================

JBST is a powerful theme framework that can be used as a standalone website builder or as a framework to create child themes for WordPress. JBST build on the top of Twitter's Bootstrap 3 and is full customizable with LESS. Integrated customizer for easy responsive website building. Right-To-Left (RTL) support. It also has built in support for BuddyPress, BBpress and eCommerce (WooCommerce, JigoShop and WPeCommerce).

* [Twitter's Bootstrap 3](http://getboostrap.com/) ready
* E-Commerce ( we recommend WooCommerce )
* Buddy Press
* BBPress

Demo of default install: http://demo.jbst.eu/ (some quick install notes: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/34)

Installation
------------

[Download the latest version as .zip file](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/archive/master.zip). Upload the .zip file to your WordPress theme directory (wp-content/themes) or use Install theme function in your dashboard. Activate the theme in your dashboard ( Appearence > themes ). 

Customization and LESS
----------------------

JBST has a build in customizer and LESS editor.
Also read: [Integrate LESS in JBST WordPress Theme](http://bassjobsen.weblogs.fm/integrate-less-jbst-wordpress-theme/). 
LESS implementation build in with [WP LESS to CSS](https://github.com/bassjobsen/wp-less-to-css) which relies on [less.php](https://github.com/oyejorge/less.php).
Add your mixins, variables and function with the editor `Appearance > WP LESS to CSS`. Check the plugin documentation for advanched options.
Optional add LESS code to library/assets/less/custom.less (less/custom.less for child themes) or wpless2css/wpless2css.less (backup when updating the theme!).

Modify the build in Twitter's Boostrap Code:
Don't edit wpless2css/bootstrap/variables.less but overwrite the variables in the editor mentioned above.

Note: Edit and add LESS code with the editor, unless you understand what you're doing. Modifications with the editor are saved in the database and not over written or lost when you update your theme. Changing less/custom.less in your child theme will also be save.
Cause CSS is valid LESS you could also add CSS code to the LESS editor.

Security issues
---------------

The theme will ask for your FTP credentials when saving your LESS settings or using the customizer. Sending your credentials over a non-secure (http) connection will be a bad idea always.
[Add your credentials to your wp-config.php](http://codex.wordpress.org/Editing_wp-config.php#WordPress_Upgrade_Constants) to make this file saving easy and secure. **Do not forget** to [chmod your wp-config.php](http://codex.wordpress.org/Changing_File_Permissions) to 0600.
More about all this: [Using wp_filesystem in Plugins to store customizer settings](http://wordpress.stackexchange.com/questions/126424/using-wp-filesystem-in-plugins-to-store-customizer-settings/126631)

Grid
----
The most important changes in Twitter Bootstrap 3 will be the more mobile-first approaching and the grid. From now Twitter’s Bootstrap defines three grids: Extra small (xs) grid for Phones (&lt;768px), Small/Medium grid for Tablets (&gt=;768px), the Medium grid for Laptops (&gt;=992px) and the Large grid for Desktops. The row class prefixes for these grid are “.col-xs”, “.col-sm-”,“.col-md-“ and “.col-lg-”. The Large grid will stacks below 1200px pixels screen width. So does the Medium grid below 992px pixels and the small below 768px. The extra small grid never stacks. (updated for Twitter's Bootstrap3 RC1). Also read: [Twitter Bootstrap 3 breakpoints and grid](http://bassjobsen.weblogs.fm/twitter-bootstrap-3-breakpoints-and-grid/)

<strike>JBST use the Small grid by default. You can change this in the customizer. (Tiny, Small or Large). The large grid will stack below the 992px and be horizontal for desktop (and large tablets) while the Tiny grid never stacks.</strike>

More about the grid and examples on: [http://getbootstrap.com/css/#grid](http://getbootstrap.com/css/#grid)

NOTE: Twitter's Bootstrap 3 RC2 intoduced a new grid class (`col-xs-*`). The class is used for mobile phones and `col-xs-*` will never stack). The [new grid classes](http://bassjobsen.weblogs.fm/twitters-bootstrap-3-rc2-important-changes/) are add to the settings now.

Without Responsive features
---------------------------
For a non responsive website set the default grid in the customizer to "Extra Small" and set the Max container width.

To remove all responsive features consider to replace the Bootstrap CSS (replace libary/assets/css/bootstrap.min.css) with the one from
https://github.com/bassjobsen/non-responsive-tb3. Also read: [Compile Twitter’s Bootstrap 3 without responsive features](http://bassjobsen.weblogs.fm/compile-twitters-bootstrap-3-without-responsive-features/).

Internationalizing and Localizing 
---------------------------------

The default language for the theme is English (US). Translation into Dutch and Frensh has been started [Help us Translate](https://poeditor.com/join/project?hash=9e7060d127eef15b8f922b0672380177) 
Localization workflow is managed on [http://poeditor.com/](http://poeditor.com/)

Accessibility / a11y
--------------------

JBST is a11y ready by default. When building your site by changing the settings or creating a child theme a11y checks can be broken. Color settings should check for contrast. Also other installed plugins or settings can influence the accessibility of your site. JBST helps you to meet the a11y standard but you also have to check your site after changing it.
Condsider to install [WP Accessibility](http://wordpress.org/plugins/wp-accessibility/) and check your color settings on [GrayBit](http://gray-bit.com/).

Menu levels
-----------

After installing the number of possible submenu levels is set to 1. Bootstrap 3 support only 1 sub level for navigation. See also: [issue #20](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/20). JBST implements infinite submenu levels, set in the customizer.

Child themes
------------
Use JBST to create child themes for WordPress build on Twitter's Bootstrap 3.
We provide you a [Boilerplate JBST Child Theme](https://github.com/bassjobsen/Boilerplate-JBST-Child-Theme) and an example of a Webshop based on [Twitter Bootstrap Webshop Template with vertical menu](https://github.com/bassjobsen/twitter-bootstrap-webshop-template). 
Download this [Demo Webshop E-commerce Template](https://github.com/bassjobsen/jbst-e-commerce-child-theme) or try the [Demo](http://webshop.w3masters.nl/).

Add and edit wpless2css/wpless2css.less to add or modify your LESS/CSS code. Or use the LESS editor. 
You have to use the save function of the LESS editor after changing wpless2css/wpless2css.less too. The save function generate new CSS from your LESS files.

Twitter's Bootstrap Shortcodes
------------------------------
JBST doesn't integrate Twitter's Bootstrap Shortcodes since version 1.1. In stead of integration we offer support for plugins which provide this functionality. We support these plugins:

* [Twitter's Bootstrap Shortcodes Ultimate Add-on](http://wordpress.org/plugins/twitters-bootstrap-shortcodes-ultimate/), recommended!
* [Easy Bootstrap Shortcode](http://wordpress.org/plugins/easy-bootstrap-shortcodes/)
* [Bootstrap WP Plugin](http://bootstrapwpplugin.com?affiliates=c9f0f895fb98ab9159f51fd0297e236d)

Download the plugin and activate it. Troubles? Post an issue.

Right-To-Left (RTL)
-------------------
Text direction is automatic detected based on the language by WordPress. If you use a RTL language or switch to one you will need to recompile the CSS with the build in LESS compiler. 

Responsive image sliders
------------------------

JBST offers support for the plugin shown below. Slider plugin are not bundled you will have to install them your self.

* [Twitter Bootstrap Slider](https://github.com/bassjobsen/twitter-bootstrap-slider),recommended! 
* [Royal Slider](http://dimsemenov.com/plugins/royal-slider/wordpress/)
* [Flex Slider](http://www.fergusweb.net/software/flex-slider/)


Recommended and Supported Plugins
---------------------------------

* [WordPress SEO Plugin](http://yoast.com/wordress/seo/)
* [WooCommerce](http://www.woothemes.com/woocommerce/), with [WooCommerce Twitter's Bootstrap Plugin](https://github.com/bassjobsen/woocommerce-twitterbootstrap)
* [Stimulate correct headings Plugin](https://github.com/bassjobsen/stimulate-correct-headings) for accessibility and seo
* [WP Defer Loading](https://github.com/bassjobsen/wp-defer-loading), Defer loading javascript for WordPress, see: https://developers.google.com/speed/docs/insights/BlockingJS
* [Twitter Bootstrap Galleries Plugin](https://github.com/bassjobsen/twitter-bootstrap-galleries), Wraps the content of a WordPress media gallery in a Twitter's Bootstrap grid. And make it full responsive.
* [Twitter Bootstrap Slider](https://github.com/bassjobsen/twitter-bootstrap-slider/) responsive image slide show (slider component)
* [Drag & Drop Featured Image](http://wordpress.org/plugins/drag-drop-featured-image/) Drag & Drop Featured Image is a plugin that replaces the default "Set featured image" metabox with a drop zone for faster uploads.
* [Options Framework](http://wordpress.org/plugins/options-framework/) A framework for building theme options. 
* [WP Retina 2x](http://wordpress.org/plugins/wp-retina-2x/) Make your website look beautiful and smooth on Retina (high-DPI) displays such as the MacBook Pro Retina and the iPad.
* [WP Accessibility](http://wordpress.org/plugins/wp-accessibility/) WP Accessibility provides fixes for common accessibility issues in your WordPress site.

Buy and Sell JBST Child themes
------------------------------
In 2014 we opened a [marketplace for JBST](http://themes.jbst.eu/) child themes. Take a look if you don't want to build a child theme you self and still want to profit from all the JBST features.
Are you theme developer? We will happy to sell your theme too! [Send us a message](http://www.jamedowebsites.nl/contact/)

Designers, we could convert psd to JBST for you, so you can sell your designs too.

Knowledge base
--------------
Find answers to faq and other tips and tricks in our [Knowledge base](http://jbst.eu/knowledge-base/).
You will find answers and tips for s.a. LightBox2 integration, using JBST with a Jumbotron.

JBST Expo
---------
[JBST Expo](http://expo.jbst.eu/) is a project to showcase the absolute best projects built on JBST.

The JBST Expo is all hosted on GitHub, meaning recommending new sites is as easy as opening a [new issue](https://github.comb/bassjobsen/jbst-expo/issues/new). It also keeps the primary JBST repo focused on code and documentation, and not dozens of extraneous images.

Support
-------

We are always happy to help you. If you have any question regarding 
this code. [Send us a message](http://www.jamedowebsites.nl/contact/)
or contact us on twitter [@JamedoWebsites](http://twitter.com/JamedoWebsites)

[Migration Skematik to JBST](http://bassjobsen.weblogs.fm/migrate_jbst_to_twitter_bootstrap3/)

Credits
-------

* [Matt Jones of Rocket Farmer](http://rocketfarmer.net/)
* [WordPress](http://wordpress.org/)
* [Bootstrap](http://twitter.github.com/bootstrap/)
* [jQuery](http://www.jquery.com/)
* [Less.js](http://www.lesscss.org/)
* [less.php](http://lessphp.gpeasy.com/)
* [Options Framework](http://wptheming.com/)

Example
-------
![ScreenShot](https://raw.github.com/bassjobsen/jamedo-bootstrap-start-theme/master/screenshot.png)
