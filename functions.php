<?php
/**
 * @package WordPress
 * @subpackage YOUR_THEME
 */

include TEMPLATEPATH . '/inc/php/options.php';

add_theme_support('automatic-feed-links');

/*
	
	Remove the admin bar

*/

add_filter( 'show_admin_bar', '__return_false' );

/*

	Add some menu areas

*/

register_nav_menus(array(
	'main' => 'Main Nav Area',
	'footer' => 'Footer Nav Area'
));

/*

	Load up the scripts

*/

function envex_scripts(){
	
	if(is_admin()){ return; }
	
	wp_deregister_script('jquery');
	
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', false, '1.6.2');
	wp_enqueue_script('jquery');
	
	wp_register_script('application', 'http://twitter.github.com/bootstrap/assets/js/application.js', false, '1.0');
	wp_enqueue_script('application');
	
	wp_register_script('main', get_bloginfo('template_url') . '/inc/js/main.js', false, '1.0', true);
	wp_enqueue_script('main');
	
}

add_action('init', 'envex_scripts');