<?php
	
	/*	
	Plugin Name: ACF Cycle Slideshow
	Author: Adrian Lambertz
	Description: Wordpress Cycle Slideshow Plugin based on the popular Wordpress Plugin "Advanced Custom Field". Needs the ACF-Addon "Gallery Field". This plugin just provides the function. You have to output it by yourself!
	Plugin URI: https://github.com/PixelbarEupen/Cycle-Slideshow
	Version: 0.1
	GitHub Plugin URI: https://github.com/PixelbarEupen/Cycle-Slideshow
	*/
	
	
	/* 	CONFIGURATION */
	$use_with_hook	 	=	false;
	$hook_name			=	'genesis_before_entry_content';
	$gallery_field_name	=	'start_slideshow';
	$image_size_name	=	'start_slide';
	
	
	
	
	/******************************************************************************************/
	/************************* DO NOT CHANGE ANYTHING AFTER THIS LINE *************************/
	
	//REGISTER NECESSARY FILES
	function register_files(){
		if(count(get_field('start_slideshow')) > 1 OR count(get_field('slider')) > 1):
			wp_register_script( 'cycle', plugins_url( 'js/cycle.js' , __FILE__ ));
			wp_enqueue_script( 'cycle' );
		endif;
		
		wp_register_style( 'fancybox-css', plugins_url( 'css/slideshow.js' , __FILE__ ));
		wp_enqueue_style( 'fancybox-css' );
	}
	add_action( 'wp_enqueue_scripts', 'register_scripts', 100 );
	
	
	
	
	
	if($use_with_hook ):
		add_action( $hook_name, 'start_slideshow' );
	endif;
	function start_slideshow() { ?>
		
		<?php
		
			global $use_with_hook, $hook_name, $gallery_field_name, $image_size_name;
		
		?>
		
		<?php if(get_field($gallery_field_name)): ?>
			<div class="home-slider">
			<?php $images = get_field($gallery_field_name); ?>
			<?php if(count($images) > 1): ?>
				<div 
					class="cycle-slideshow"
					data-cycle-fx=scrollHorz
					data-cycle-timeout=0
					data-cycle-prev="#prev"
					data-cycle-next="#next"
				>
			<?php endif; ?>
			
			<?php foreach($images as $image): ?>
				<img 
					src="<?php echo $image['sizes'][$image_size_name]; ?>" 
					width="<?php echo $image['sizes'][$image_size_name.'-width']; ?>" 
					height="<?php echo $image['sizes'][$image_size_name.'-height']; ?>" 
					alt="Suite 36 - Smart Lodging" 
				/>
			<?php endforeach; ?>
			
			<?php if(count($images) > 1): ?>
				</div>
				<div class="pager">
				    <a href=# id="prev"><span class="icon-arrow-left"></span></a> 
				    <a href=# id="next"><span class="icon-arrow-right"></span></a>
				</div>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	
	<?php }
?>