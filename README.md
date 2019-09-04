<p align="center">
  <a href="https://nasiddique.com">
  	<img width="460" height="300" src="creating-a-wp-plugin.jpg">
  </a>
</p>

# README #

This plugin is basically doing nothing. I personally develop this for create a plugin skeleton based on # OOP architecture #. This is a learing project, please put constructive comments to help me.

### Tech

developer uses a number of open source projects to work properly:

* [wordpress 5.2.2] - [Wordpress](https://www.wordpress.org) version in this plugin development period.
* [PHP 7.2.19] - [PHP](https://www.php.net/manual/en/) version in this plugin development period.
* [OOP] -  To know more [OOP - PHP](https://www.php.net/manual/en/language.oop5.php)

### Requirements
* wordpress version >= 4.2.*
* php version >= 7.0.*
* git

### Installation

If you are a lerner like me and want to clone this plugin project to take the taste of [WP Plugin](https://developer.wordpress.org/plugins/) I think, first of all you need [git](https://git-scm.com/) in your machine and definitely [wordpress](https://www.wordpress.org).

```sh
$ cd your-wordpress-project-folder/wp-content/plugins/
$ git clone https://github.com/kisorniru/wp-plugin-in-oop-architecture.git
```

* Additionally I would highly recommend you to turn on your `WP_DEBUG` `true`. For that, go to your `wp-config.php` file and define `WP_DEBUG` value `true` from `false` 

* Again If you face something `Failed to connect to FTP Server your-domain.com:21` when uninstall this plugin, please add the bellow code into your `wp-config.php` file. I not recommend you to always use bellow code in config file except your local host.

```sh
/** 
 * Wordpress Plugin Installation - Failed to connect to FTP Server - Safest Solution?
 * Failed to connect to FTP Server your-domain.com:21
 */
define('FS_METHOD', 'direct');
```

# After Installation

* Have fun with it
* Check every corner of the plugin
* Take the maximum taste of it
* make something different from your point of view
* This is open project, so, please improve it
* Happy Coding!

# Owned By
* [Siddique Md. Noor-A-Alam](https://www.nasiddique.com)

# Developed By
* [Siddique Md. Noor-A-Alam](https://www.nasiddique.com)