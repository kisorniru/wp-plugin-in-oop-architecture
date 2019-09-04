<p align="center">
  <a href="https://nasiddique.com">
  	<img src="creating-a-wp-plugin.jpg">
  </a>
</p>

This plugin is basically doing nothing. I personally develop this for create a plugin skeleton based on **_OOP Architecture_**. This is a learing project, please put constructive comments to help me.

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

### After Installation

* Have fun with it
* Check every corner of the plugin
* Take the maximum taste of it
* make something different from your point of view
* This is open project, so, please improve it
* Happy Coding!

### How to read

* Class name is written in a way so that you can easily understand which one is first and which one is after that i.e first class - ClassA, then second class - ClassB, and so on
* wordpress recommended folder structure (https://developer.wordpress.org/plugins/plugin-basics/best-practices/#folder-structure)
```sh
/plugin-name
  plugin-name.php
  uninstall.php
  /languages
  /includes
  /admin
    /js
    /css
    /images
  /public
    /js
    /css
    /images
```
* `plugin-name` is the plugin folder. You can call it by any name, my case `wp-plugin-in-oop-architecture`.
* `plugin-name.php` is the header declaration file. You can call it by any name, my case `wp-plugin-in-oop-architecture.php`.
* **Here**, you can not change `uninstall.php` this file name. This file name is for uninstall your plugin from wordpress project and name of it should be as it is.


### Owned By
* [Siddique Md. Noor-A-Alam](https://www.nasiddique.com)

### Developed By
* [Siddique Md. Noor-A-Alam](https://www.nasiddique.com)