<?php

/*

	South Paw Custom Options

*/

add_action('admin_menu', 'bootstrap_create_menu');

function bootstrap_create_menu() {

	//create new top-level menu
	add_menu_page('Bootstrap', 'Bootstrap', 'administrator', __FILE__, 'bootstrap_settings', get_bloginfo('template_url') . '/img/twitter_icon.png');
	add_submenu_page(__FILE__, 'Home Options', 'Home Options', 'administrator', 'bootstrap_home_settings', 'bootstrap_home_settings');

	//call register settings function
	add_action( 'admin_init', 'register_bootstrap_settings' );
}

function register_bootstrap_settings() {
	
	// register_setting( 'bootstrap_settings', 'twitter_id' );
	// register_setting( 'bootstrap_settings', 'show_archives' );
	// 
	// register_setting( 'bootstrap_settings', 'main_font_color' );
	// register_setting( 'bootstrap_settings', 'link_color' );
	// register_setting( 'bootstrap_settings', 'link_hover_color' );
	// register_setting( 'bootstrap_settings', 'font' );

}

function bootstrap_settings() { ?>
	
	<div class="wrap">
	
		<div id="icon-edit" class="icon32"></div><h2>Bootstrap Options</h2>
		
		<form method="post" action="options.php">
		
		    <?php settings_fields('bootstrap_settings'); ?>
		    		    
			<h3>Social Options</h3>
		    		    
		    <table class="form-table">

				<p>Enter your twitter ID to show your recent tweets at the end of your navigation bar along with a follow me link.</p>

		        <tr valign="top">
		        	<th scope="row">Twitter ID</th>
		        	<td><input type="text" name="twitter_id" value="<?php echo get_option('twitter_id'); ?>" /></td>
		        </tr>

			</table>

			<h3>Site Options</h3>
		    		    
		    <table class="form-table">
		        <tr valign="top">
		        	<th scope="row">Show Archives in Navigation</th>
		        	<td>
		        		
		        		<?php
		        		$checked = get_option('show_archives') == 'on' ? ' checked' : ''; ?>
		        	
		        		<input type="checkbox" name="show_archives"<?php echo $checked; ?> /> Show Archives? 
		        	</td>
		        </tr>
			</table>

			<h3>Site Style Options</h3>
			
			<p>You can control the colors of your site below by adding the HEX values (#000000) in the fields below. If these options are left blank, the default values are used.</p>

			<table class="form-table">

		        <tr valign="top">
		        	<th scope="row">Main Font Color</th>
		        	<td>
		        		<input type="text" name="main_font_color" class="color" value="<?php echo get_option('main_font_color'); ?>" />
		        	</td>
		        </tr>

		        <tr valign="top">
		        	<th scope="row">Link Color</th>
		        	<td>
		        		<input type="text" name="link_color" class="color" value="<?php echo get_option('link_color'); ?>" />
		        	</td>
		        </tr>

		        <tr valign="top">
		        	<th scope="row">Link Hover Color</th>
		        	<td>
		        		<input type="text" name="link_hover_color" class="color" value="<?php echo get_option('link_hover_color'); ?>" />
		        	</td>
		        </tr>

				<?php
				
				$font_list = array(
					"Arial, Helvetica, sans-serif",
					"'Arial Black', Gadget, sans-serif",
					"'Bookman Old Style', serif",
					"'Comic Sans MS', cursive",
					"Courier, monospace",
					"'Courier New', Courier, monospace",
					"Garamond, serif",
					"Georgia, serif",
					"Impact, Charcoal, sans-serif",
					"'Lucida Console', Monaco, monospace",
					"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
					"'MS Sans Serif', Geneva, sans-serif",
					"'MS Serif', 'New York', sans-serif",
					"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
					"Symbol, sans-serif",
					"Tahoma, Geneva, sans-serif",
					"'Times New Roman', Times, serif",
					"'Trebuchet MS', Helvetica, sans-serif",
					"Verdana, Geneva, sans-serif",
					"Webdings, sans-serif",
					"Wingdings, 'Zapf Dingbats', sans-serif"
				);				
				?>

		        <tr valign="top">
		        	<th scope="row">Site Font</th>
		        	<td>
		        		<select name="font">
		        			<option value="">Select a font</option>
			        		<?php
			        		foreach($font_list as $font): 
			        		
			        			$selected = get_option('font') == $font ? ' selected': null;?>
			        			
			        			<option style="font-family: <?php echo $font; ?>" value="<?php echo $font; ?>"<?php echo $selected; ?>><?php echo $font; ?></option>
			        		<?php
			        		endforeach; ?>
		        		</select>
		        		<p><a href="http://www.ampsoft.net/webdesign-l/WindowsMacFonts.html" target="_blank">Why isn't my favorite font in the list?</a></p>
		        	</td>
		        </tr>



			</table>
			
		    <p class="submit">
		    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		    </p>
		
		</form>
		
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/inc/js/options.js"></script>
	
	</div> <!-- wrap -->

<?php 

function bootstrap_home_settings(){}
} ?>