wp-lesscss
==========

LESS Wordpress Plugin
---------------------

Implementation of LESS (Leaner CSS) in order to make themes development easier. This code is a fork of 
[WP LESS](http://wordpress.org/plugins/wp-less/). Use the documentation of the original plugin for now.

This code replaced LESSPHP 0.4.0 with [less.php](https://github.com/oyejorge/less.php).

The main reason to replace LESSPHP will be it doesn't support Twitter's Bootstrap > 3.0.0, see: https://github.com/leafo/lessphp/issues/503.

You will find all modification of the original plugin in Compiler.class.php now. This first version will only be a proof of 
concept. Caching and file paths should be test further.

The resulting CSS will be saved in the same folder as the original LESS file. Caching files are saved in /wp-content/uploads/wp-less/.
Make sure these folders are writeable.


