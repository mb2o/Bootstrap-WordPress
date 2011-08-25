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

function bootstrap_settings() {
	

}

function bootstrap_home_settings(){
	
	include TEMPLATEPATH . '/inc/php/option_templates/home_settings.php';
	
}