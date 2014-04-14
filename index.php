<?php
	
	/*	
	Plugin Name: ACF Cycle Slideshow
	Author: Adrian Lambertz
	Description: Wordpress Cycle Slideshow Plugin based on the popular Wordpress Plugin "Advanced Custom Field". Needs the ACF-Addon "Gallery Field". This plugin just provides the function. You have to output it by yourself!
	Plugin URI: https://github.com/PixelbarEupen/Cycle-Slideshow
	Version: 0.1.7.12
	GitHub Plugin URI: https://github.com/PixelbarEupen/Cycle-Slideshow
	GitHub Access Token: 6ca583973da0e33ee1a6c90c3e4920e6143369ca
	*/
	
	
	/* 	CONFIGURATION */
	$hook_name			=	'genesis_before_entry_content';
	$gallery_field_name	=	'start_slideshow';
	
	$image_size_name 	= (get_option('cycle-image-size') == '') ? 'large' : get_option('cycle-image-size');
	$animation			= (get_option('cycle-animation') == '') ? 'fade' : get_option('cycle-animation');
	$timeout			= (get_option('cycle-timeout') == '') ? 0 : get_option('cycle-timeout');
	$show_pager			= (get_option('cycle-show-pager')) ? true : false;
	$pause_on_hover		= (get_option('cycle-pause')) ? 'true' : 'false';
	
	/******************************************************************************************/
	/************************* DO NOT CHANGE ANYTHING AFTER THIS LINE *************************/
	
	include('includes/register.php');
	include('includes/register-acf.php');
	include('includes/backend.php');
	
	
	//THE MAIN FUNCTION
	function start_slideshow() { ?>
		
		<?php global	$use_with_hook, 
						$hook_name,
						$gallery_field_name,
						$image_size_name,
						$animation,
						$timeout,
						$show_pager,
						$pause_on_hover;	
		?>
		
		<?php if(get_field($gallery_field_name)): ?>
			<div class="home-slider">
			<?php $images = get_field($gallery_field_name); ?>
			<?php if(count($images) > 1): ?>
				<div 
					class="cycle-slideshow"
					data-cycle-fx=<?php echo $animation; ?>
					data-cycle-timeout=<?php echo $timeout; ?>
					<?php if($show_pager): ?>
					data-cycle-prev="#prev"
					data-cycle-next="#next"
					<?php endif; ?>
					data-cycle-pause-on-hover="<?php echo $pause_on_hover; ?>"
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
				<?php if($show_pager): ?>
					<div class="pager">
					    <a href=# id="prev"><span class="cycle-icon-arrow-left"></span></a> 
					    <a href=# id="next"><span class="cycle-icon-arrow-right"></span></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	
	<?php }
	add_shortcode('cycle-slideshow','start_slideshow');
?>