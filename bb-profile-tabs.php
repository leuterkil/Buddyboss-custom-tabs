<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              echarissopoulos.herokuapp.com
 * @since             1.0.0
 * @package           Bb_Profile_Tabs
 *
 * @wordpress-plugin
 * Plugin Name:       Profile Tabs for Buddyboss
 * Plugin URI:        bb-profile-tabs
 * Description:       With this plugin you can add custom profile tabs and content to buddyboss user profiles.
 * Version:           1.0.0
 * Author:            left4dev
 * Author URI:        echarissopoulos.herokuapp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bb-profile-tabs
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
define( 'BB_PROFILE_TABS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bb-profile-tabs-activator.php
 */
function activate_bb_profile_tabs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bb-profile-tabs-activator.php';
	Bb_Profile_Tabs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bb-profile-tabs-deactivator.php
 */
function deactivate_bb_profile_tabs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bb-profile-tabs-deactivator.php';
	Bb_Profile_Tabs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bb_profile_tabs' );
register_deactivation_hook( __FILE__, 'deactivate_bb_profile_tabs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bb-profile-tabs.php';
require plugin_dir_path( __FILE__ ) . 'php/buddybosstab.php';



	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	add_action( 'init', 'buddyboss_tab_post_type', 0 );
	require plugin_dir_path( __FILE__ ) . 'php/buddybossTabCustomTypes.php';
	add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'buddyboss_tabs') return false;
    return $current_status;
}
	require plugin_dir_path( __FILE__ ) . 'php/buddybossTabClass.php';
	require plugin_dir_path( __FILE__ ) . 'php/createBuddybossTab.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bb_profile_tabs() {

	$plugin = new Bb_Profile_Tabs();
	$plugin->run();

}
run_bb_profile_tabs();
