<?php

	/*
	
		THIS FILE CREATES THE BACKEND MENU ITEM AND THE REGISTERS THE USED SETTINGS.
	
	*/

function cycle_slideshow_menu(){
    	//register menu element
    	add_options_page('Cycle Slideshow', 'Cycle Slideshow', 'manage_options', 'cycle-slideshow-menu', 'cycle_slideshow_options');
    	
    	//call register settings function
		add_action( 'admin_init', 'cycle_slideshow_register_settings' );
}
add_action('admin_menu','cycle_slideshow_menu');

//thi is the callback function from the menu element
function cycle_slideshow_options(){
    	include(plugin_dir_path( __FILE__ ).'../admin/options-page.php');
}

if(!function_exists('cycle_slideshow_register_settings')){
	function cycle_slideshow_register_settings() {
	//register our settings
		register_setting( 'cycle-settings', 'cycle-image-size' );
		register_setting( 'cycle-settings', 'cycle-animation' );
		register_setting( 'cycle-settings', 'cycle-timeout' );
		register_setting( 'cycle-settings', 'cycle-show-pager');
		register_setting( 'cycle-settings', 'cycle-pause');
	}
}
