<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/jamiedruce/
 * @since             1.0.0
 * @package           Content_Ignite
 *
 * @wordpress-plugin
 * Plugin Name:       Content Ignite
 * Plugin URI:        https://contentignite.com
 * Description:       Add your Content Ignite publisher tag to your site in just a few clicks.
 * Version:           1.1.0
 * Author:            Content Ignite
 * Author URI:        https://contentignite.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       content-ignite
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
define( 'CONTENT_IGNITE_VERSION', '1.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-content-ignite-activator.php
 */
function activate_content_ignite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-content-ignite-activator.php';
	Content_Ignite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-content-ignite-deactivator.php
 */
function deactivate_content_ignite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-content-ignite-deactivator.php';
	Content_Ignite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_content_ignite' );
register_deactivation_hook( __FILE__, 'deactivate_content_ignite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-content-ignite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_content_ignite() {

	$plugin = new Content_Ignite();
	$plugin->run();

}
run_content_ignite();
