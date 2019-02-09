<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://github.com/ggroenendale/port_gallery
 * @since             1.0.0
 * @package           Port_Gallery
 *
 *
 * @wordpress-plugin
 * Plugin Name: GSquared Concepts Gallery Plugin
 * Plugin URI: https://github.com/ggroenendale/portgallery
 * Description: This plugin handles all of the galleries in the portfolio by use of custom post types
 * Version: 1.0.0
 * Author: Geoff Groenendale
 * Author URI: http://www.gsquaredconcepts.com/
 * License: GPL2
 * Text-Domain: port_gallery
 */

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PORT_GALLERY_VERSION', '1.0.0' );
if(!defined('PORT_GALLERY_URL')){
 define('PORT_GALLERY_URL', plugin_dir_url(__FILE__));
}

if(!defined('PORT_GALLERY_URL')){
 define('PORT_GALLERY_URL', plugin_dir_url(__FILE__));
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/port_gallery_activator.php';
	Port_Gallery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/port_gallery_deactivator.php';
	Port_Gallery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_port_gallery' );
register_deactivation_hook( __FILE__, 'deactivate_port_gallery' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class_port_gallery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_port_gallery() {

	$plugin = new Port_Gallery();
	$plugin->run();

}
run_port_gallery();
