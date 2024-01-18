<?php
/**
 * @package WEPOAddon
*/
/*
Plugin Name: WEPO Addon
Plugin URI: https://themehigh.com/plugin
Description: This is a addon plugin for the WEPO Plugin
Version: 1.0.0
Author: Themehigh
Author URI: https://themehigh.com
License: GPLv2 or later
Text Domain: wepo-addon
*/

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class WepoAddon {

	function __construct(){
		add_action('init', array($this, 'custom_post_type'));
	}

	public static function register(){
		// add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		echo 'this is a test teso of tesing the test';
	}

	function activate(){
		//generated a Custom Post Type
		$this->custom_post_type();
		//flush rewrite rules
		flush_rewrite_rules();

	}

	function deactivate(){
		//flush rewrite rules
		flush_rewrite_rules();

	}

	function custom_post_type(){
		register_post_type('book', ['public' => true, 'label' => 'Books']);
	}

	function enqueue(){
		wp_enqueue_style('mypluginstyle', plugins_url('assets/mystyle.css', __FILE__));
		wp_enqueue_script('mypluginscript', plugins_url('assets/myscript.js', __FILE__));
	}

}

if(class_exists('WepoAddon')){
	// $wepoAddon = new WepoAddon();
	// $wepoAddon->register();
	WepoAddon::register();
}

//activation
register_activation_hook(__FILE__, array($wepoAddon, 'activate'));

//deactivation
register_deactivation_hook(__FILE__, array($wepoAddon, 'deactivate'));


