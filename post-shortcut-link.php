<?php

/**
* Plugin Name: Post Shortcut Link
* Plugin URI: dalebeaumont.com
* Description: Add link with hashtag to post / page type
*
* Author: July Cabigas - BB
* Text Domain: post-shortcut
**/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

Class DB_Post_Shortcut_Link {


	private $version = '1.0';
	private $shortcode = '';


	public function __construct() {

			$this->setup_const();
			$this->loader();
			add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts') );

	}


	public function setup_const() {

		// Plugin Folder URL
		if( ! defined( 'DB_POST_SHORTCUT_DIR' ) ) {
			define( 'DB_POST_SHORTCUT_DIR', plugin_dir_path( __FILE__ ) );	
		} 

		if( ! defined( 'DB_POST_SHORTCUT_DIR_URL' ) ) {
			define( 'DB_POST_SHORTCUT_DIR_URL', plugin_dir_path( __FILE__ ) );	
		} 
	}

	/**
	* Load all default initialization
	*/
	private function loader() {

		require_once DB_POST_SHORTCUT_DIR . 'inc/shortcode.php';

		$this->shortcode = new Shortcode_Post();

		//Use [db_shortcut_link]
		$this->shortcode->get_shortcode();


	}

	function enqueue_scripts() {
	    wp_enqueue_style('db-post-shortcut-link', plugins_url('assets/style.css', __FILE__));

	    wp_enqueue_script('db-shortcut-link', plugins_url('assets/postlink.js', __FILE__), '', '', true);

	}

}

new DB_Post_Shortcut_Link();