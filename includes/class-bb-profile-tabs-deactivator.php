<?php

/**
 * Fired during plugin deactivation
 *
 * @link       echarissopoulos.herokuapp.com
 * @since      1.0.0
 *
 * @package    Bb_Profile_Tabs
 * @subpackage Bb_Profile_Tabs/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Bb_Profile_Tabs
 * @subpackage Bb_Profile_Tabs/includes
 * @author     left4dev <echarissopoulos@gmail.com>
 */
class Bb_Profile_Tabs_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		unregister_post_type( 'buddyboss_tabs' );
	}

}
