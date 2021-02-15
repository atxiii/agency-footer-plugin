<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mrcatdev.com
 * @since             1.0.0
 * @package           Af_mrcat
 *
 * @wordpress-plugin
 * Plugin Name:       MrCat Agency Footer
 * Plugin URI:        https://mrcatdev.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            hossein shourabi
 * Author URI:        https://mrcatdev.com
 * License:           MIT License
 * Text Domain:       af_mrcat
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AF_MRCAT_VERSION', '1.0.0' );
define('TEXT_DOMAIN','af_mrcat');
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-af_mrcat-activator.php
 */
function activate_af_mrcat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-af_mrcat-activator.php';
	Af_mrcat_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-af_mrcat-deactivator.php
 */
function deactivate_af_mrcat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-af_mrcat-deactivator.php';
	Af_mrcat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_af_mrcat' );
register_deactivation_hook( __FILE__, 'deactivate_af_mrcat' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-af_mrcat.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_af_mrcat() {

	$plugin = new Af_mrcat();
	$plugin->run();

}
run_af_mrcat();
