<?php
/**
 * @package WordPress
 * @subpackage YOUR_THEME
 */

/*

	Instead of a 404 page, we're going to set a cookie and display the message
	on the home page

*/

$message_options = array(
	'message_title' => 'Oh snap! The page you were looking for could not be found :(',
	'message_body' => 'There is a good chance this is just a one-time error.',
	'message_type' => 'error',
	'message_big' => false,
	'message_show_nav' => false
);

setcookie("bootstrap_message", json_encode($message_options), time() + 5);

header('Location: ' . get_bloginfo('home'));