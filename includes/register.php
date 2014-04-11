<?php 
	
	/*
	
		THIS FILE REGISTERS THE NECESSARY JS AND CSS FILES FOR USE WITH THIS PLUGIN.
		ADDITIONALLY, IT ENQUEUES THE JQUERY PLUGIN, IF IT ISNT ALREADY
	
	*/
	
	
	//REGISTER NECESSARY FILES
	function register_files(){
		global $gallery_field_name; 
		
		wp_enqueue_script('jquery');
		
		if(count(get_field($gallery_field_name)) > 1):
			wp_register_script( 'cycle', plugins_url( '../js/cycle.js' , __FILE__ ));
			wp_enqueue_script( 'cycle' );
		endif;
		
		wp_register_style( 'slideshow-css', plugins_url( '../css/slideshow.css' , __FILE__ ));
		wp_enqueue_style( 'slideshow-css' );
	}
	add_action( 'wp_enqueue_scripts', 'register_files', 100 );