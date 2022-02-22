<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       echarissopoulos.herokuapp.com
 * @since      1.0.0
 *
 * @package    Bb_Profile_Tabs
 * @subpackage Bb_Profile_Tabs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bb_Profile_Tabs
 * @subpackage Bb_Profile_Tabs/includes
 * @author     left4dev <echarissopoulos@gmail.com>
 */
class Bb_Profile_Tabs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bb-profile-tabs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
