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


if( !class_exists('WepoAddon') ){
	class WepoAddon {

		function __construct(){
			add_action('init', array($this, 'custom_post_type'));
		}

		function register(){
			add_action('admin_enqueue_scripts', array($this, 'enqueue'));
			add_action('admin_menu', array($this, 'add_admin_pages'));
		}

		public function add_admin_pages(){
			add_menu_page('WepoAddon Plugin', 'Wepo Addon', 'manage_options', 'wepoaddon_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
		}

		public function admin_index(){
			// require template
		}

		function custom_post_type(){
			register_post_type('book', ['public' => true, 'label' => 'Books']);
		}

		function enqueue(){
			wp_enqueue_style('mypluginstyle', plugins_url('assets/mystyle.css', __FILE__));
			wp_enqueue_script('mypluginscript', plugins_url('assets/myscript.js', __FILE__));
		}

		function activate(){
			require_once plugin_dir_path(__FILE__) . 'inc/wepo-addon-activate.php';
			WepoAddonActivate::activate();
		}

	}


	$wepoAddon = new WepoAddon();
	$wepoAddon->register();

	//activation
	register_activation_hook(__FILE__, array($wepoAddon, 'activate'));

	//deactivation
	require_once plugin_dir_path(__FILE__) . 'inc/wepo-addon-deactivate.php';
	register_deactivation_hook(__FILE__, array('WepoAddonDeactivate', 'deactivate'));
}


