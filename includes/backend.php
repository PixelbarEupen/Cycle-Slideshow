<?php


function cycle_slideshow_menu(){
    	//register menu element
    	add_options_page('Cycle Slideshow', 'Slideshow Settings', 'manage_options', 'cycle-slideshow-menu', 'cycle_slideshow_options');
    	
    	//call register settings function
		add_action( 'admin_init', 'register_mysettings' );
}
add_action('admin_menu','cycle_slideshow_menu');

//thi is the callback function from the menu element
function cycle_slideshow_options(){
    	include('admin/options-page.php');
}


function register_mysettings() {
//register our settings
	register_setting( 'super-settings-group', 'new_option_name' );
	register_setting( 'super-settings-group', 'some_other_option' );
	register_setting( 'super-settings-group', 'option_etc' );
}