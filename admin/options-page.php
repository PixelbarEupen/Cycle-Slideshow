	<?php
	
	/*
		
		THIS FILE GENERATES THE OUTPUT OF THE SETTINGS PAGE.
	
	*/
	
	?>


<div class="wrap">
	<h2>Cycle Slideshow</h2>
	<h3>Grundeinstellungen</h3>
	<form method="post" action="options.php">
		<?php settings_fields( 'cycle-settings' ); ?>
		<?php //do_settings( 'super-settings-group' ); ?>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Auszugebende Bildgröße</th>
				<td>
					<select name="cycle-image-size">
					  <?php global $_wp_additional_image_sizes; ?>
					  <option value="">Default (large)</option>
					  <?php foreach ($_wp_additional_image_sizes as $size_name => $size_attrs): ?>
					    <?php if( $size_name == get_option('cycle-image-size')){ $sel = 'selected'; } else { $sel = ''; } ?>
					    <option <?php echo $sel; ?> value="<?php echo $size_name ?>"><?php echo $size_name ?></option>
					  <?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>
		<hr />
		<h3>Slideshow Einstellungen</h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">Animation</th>
				<td>
					<select name="cycle-animation">
					  <?php $animations = array('fade','scrollHorz'); ?>
					  <?php foreach ($animations as $animation): ?>
					    <?php if( $animation == get_option('cycle-animation')){ $sel = 'selected'; } else { $sel = ''; } ?>
					    <option <?php echo $sel; ?> value="<?php echo $animation ?>"><?php echo $animation ?></option>
					  <?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Timeout</th>
				<td>
					<input value="<?php echo get_option('cycle-timeout'); ?>" name="cycle-timeout" />
					<label for="cycle-timeout">Zeit die zwischen den einzelnen Slides vergeht. In Millisekunden. (1000 = 1 Sekunde) 0 stoppt den Slider.</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Zeige vor und zurück Buttons</th>
				<td>
					<input type="checkbox" value="true" <?php if ( get_option('cycle-show-pager')) echo 'checked="checked"'; ?> name="cycle-show-pager" />
					<label for="cycle-show-pager">Sollen die Pager angezeigt werden? Beachte, dass wenn kein Pager aktiv ist die Slideshow dann zumindest keinen Timeout von 0 hat.</label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Pause beim Hovern</th>
				<td>
					<input type="checkbox" value="true" <?php if ( get_option('cycle-pause')) echo 'checked="checked"'; ?> name="cycle-pause" />
					<label for="cycle-pause">Soll die Slideshow anhalten, sobald mit der Maus über sie gehovert wird?</label>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>