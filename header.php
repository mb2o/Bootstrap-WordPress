<?php
/**
 * @package WordPress
 * @subpackage YOUR_THEME
 */
?>

<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
	
		<meta charset="utf-8">
		
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap-1.1.0.min.css">
				
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<div class="topbar">
			<div class="fill">
				<div class="container fixed">
					<h3><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h3>
					
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main',
						'container' => ''
					));
					?>
					
					<form action="<?php bloginfo('home'); ?>">
						<input type="text" placeholder="Search" name="s">
					</form>
					
					<ul class="nav secondary-nav">
			            <li class="menu">
			              <a href="#" class="menu">Dropdown</a>
			              <ul class="menu-dropdown">
			                <li><a href="#">Secondary link</a></li>
			                <li><a href="#">Something else here</a></li>
			                <li class="divider"></li>
			                <li><a href="#">Another link</a></li>
			              </ul>
			            </li>
			          </ul>
					
				</div>
			</div>
		</div>

		<div class="container-fluid">
			
			<div class="hero-unit">
	        <h1>Hello, world!</h1>
	        <p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
	        <p><a class="btn primary large">Learn more &raquo;</a></p>
	      </div>