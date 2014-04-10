<?php
	function register_acf(){
		if(function_exists("register_field_group"))
		{
			register_field_group(array (
				'id' => 'acf_startseite',
				'title' => 'Startseite',
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
						6 => 'featured_image',
						7 => 'categories',
						8 => 'tags',
						9 => 'send-trackbacks',
					),
				),
				'menu_order' => 0,
			));
		}
	}
	add_action('init','register_acf');
