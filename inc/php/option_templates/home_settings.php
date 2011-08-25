<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/css/bootstrap_custom_admin.css" />



<div class="wrap">

	<div id="icon-edit" class="icon32"></div><h2>Bootstrap Home Page Options</h2>
	
	<form method="post" action="options.php">
	
	    <?php settings_fields('bootstrap_settings'); ?>
	    		    
		<h3>Hero</h3>
	    		    
		<p>Use this area to promote posts or any other content</p>

		<div class="clearfix">
			<label for="">Hero Title</label>
			<div class="input">
				<input type="text" size="30" name="xlInput" id="xlInput" class="xlarge">
			</div>
		</div>

		<div class="clearfix">
			<label for="textarea">Hero Text</label>
			<div class="input">
				<textarea name="textarea" id="textarea" class="xxlarge"></textarea>
				<span class="help-block">
					Block of help text to describe the field above if need be.
				</span>
			</div>
		</div>
		
		<div class="clearfix">
			<label for="">Hero Link</label>
			<div class="input">
				<input type="text" size="30" name="xlInput" id="xlInput" class="xlarge">
			</div>
		</div>		
		<!-- <td><input type="text" name="twitter_id" value="<?php echo get_option('twitter_id'); ?>" /></td> -->
    

		<div class="actions">
			<button class="btn primary" type="submit">Save Changes</button>&nbsp;
			<button class="btn" type="reset">Cancel</button>
		</div>
		
	    <!-- <p class="submit">
	    	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	    </p> -->
	
	</form>
		
</div> <!-- wrap -->