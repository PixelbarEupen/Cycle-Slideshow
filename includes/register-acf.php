<?php
	
		/*
		
			THIS FILE IS REGISTERS THE ACF FIELDS FOR USE WITH THIS PLUGIN.
			IT CHECKS IF THE GALLERY PLUGIN IS ACTIVE - IF YES, THE FIELDS WILL BE REGISTERED. 
			IF NOT, IT SHOW AN ERROR NOTICE FOR ADMINS.
			
		*/
		
	
		//define error notice if gallery plugin is not installed and active
		function gallery_not_found_notice() {
		    ?>
		    <div class="error">
		        <p><?php _e( 'ACHTUNG! Du hast das Cycle Slideshow Plugin installiert. Allerdings wurde das benötigte ACF Gallery Plugin nicht gefunden. Installiere es bitte damit die Cycle Slideshow korrekt funktionieren kann.', 'Cycle-Slideshow' ); ?></p>
		    </div>
		    <?php
		}
	
	
		//main register acf function
		function register_acf(){
						
			//check if gallery plugin is installed and active
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if ( is_plugin_active( 'acf-gallery/acf-gallery.php' ) ) {
				
				//check if function exists to prevent errors
				if(function_exists("register_field_group"))
				{
					register_field_group(array (
						'id' => 'acf_startseite',
						'title' => apply_filters( 'cycle_plugin_backend_name', 'Startseite'),
						'fields' => array (
							array (
								'key' => 'field_5342b82819f01',
								'label' => 'Slideshow',
								'name' => 'start_slideshow',
								'type' => 'gallery',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
						),
						'location' => array (
							array (
								array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'post',
									'order_no' => 0,
									'group_no' => 0,
								),
							),
							array (
								array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'page',
									'order_no' => 0,
									'group_no' => 1,
								),
							),
						),
						'options' => array (
							'position' => 'acf_after_title',
							'layout' => 'default',
							'hide_on_screen' => array (
								0 => 'custom_fields',
								1 => 'discussion',
								2 => 'comments',
								3 => 'slug',
								4 => 'author',
								5 => 'format',
								7 => 'categories',
								8 => 'tags',
								9 => 'send-trackbacks',
							),
						),
						'menu_order' => 0,
					));
				}
			} else {
				//if gallery plugin is not installed, show error notice (defined on top of this filed)
				add_action( 'admin_notices', 'gallery_not_found_notice' );
			}
		}
		add_action('init','register_acf');
	
