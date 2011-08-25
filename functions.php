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
	
	wp_register_script('application', get_bloginfo('template_url') . '/inc/js/application.js', false, '1.0');
	wp_enqueue_script('application');
	
	wp_register_script('main', get_bloginfo('template_url') . '/inc/js/main.js', false, '1.0', true);
	wp_enqueue_script('main');
	
}

add_action('init', 'envex_scripts');

/*

	Display any flash messages we may need to show

*/

function show_messages(){
			
	if(isset($_COOKIE['bootstrap_message'])){
		
		$cookie = $_COOKIE['bootstrap_message'];
		$cookie = stripslashes($cookie);
		
		$options = json_decode($cookie);
		
		$message_big = $options->message_big ? ' block-message' : null;
		
		echo '<div class="alert-message' . $message_big . ' ' . $options->message_type . '">
		        <a href="#" class="close">×</a>
		        <p><strong>' . $options->message_title . '</strong> ' . $options->message_body . '</p>';
		
		if($options->message_show_nav){
			
			echo '<p><a href="#" class="btn small">Take this action</a> <a href="#" class="btn small">Or do this</a></p>';
						
		}
		
		echo '</div>';
		
	}
		
}

/*

	Page Navigation
	
	Original function: wp-includes/general-template.php
	
	Taken from http://dimox.net/wordpress-pagination-without-a-plugin-wp-pagenavi-alternative/

*/

function custom_paginate_links( $args = '' ) {
	$defaults = array(
		'base' => '%_%', // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
		'format' => '?page=%#%', // ?page=%#% : %#% is replaced by the page number
		'total' => 1,
		'current' => 0,
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => __('&laquo; Previous'),
		'next_text' => __('Next &raquo;'),
		'end_size' => 1,
		'mid_size' => 2,
		'type' => 'plain',
		'add_args' => false, // array of query args to add
		'add_fragment' => ''
	);

	$args = wp_parse_args( $args, $defaults );
	extract($args, EXTR_SKIP);

	// Who knows what else people pass in $args
	$total = (int) $total;
	if ( $total < 2 )
		return;
	$current  = (int) $current;
	$end_size = 0  < (int) $end_size ? (int) $end_size : 1; // Out of bounds?  Make it the default.
	$mid_size = 0 <= (int) $mid_size ? (int) $mid_size : 2;
	$add_args = is_array($add_args) ? $add_args : false;
	$r = '';
	$page_links = array();
	$n = 0;
	$dots = false;

	if ( $prev_next && $current && 1 < $current ) :
		$link = str_replace('%_%', 2 == $current ? '' : $format, $base);
		$link = str_replace('%#%', $current - 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<li class="prev"><a href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $prev_text . '</a></li>';
	
	else:	
	
		$page_links[] = '<li class="prev disabled"><a href="#">' . $prev_text . '</a></li>';
	
	endif;
	for ( $n = 1; $n <= $total; $n++ ) :
		$n_display = number_format_i18n($n);
		if ( $n == $current ) :
			$page_links[] = "<li><a href=\"#\" class='page-numbers active'>$n_display</a></li>";
			$dots = true;
		else :
			if ( $show_all || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
				$link = str_replace('%_%', 1 == $n ? '' : $format, $base);
				$link = str_replace('%#%', $n, $link);
				if ( $add_args )
					$link = add_query_arg( $add_args, $link );
				$link .= $add_fragment;
				$page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>$n_display</a></li>";
				$dots = true;
			elseif ( $dots && !$show_all ) :
				$page_links[] = '<li class="disabled"><a href="#">...</a></li>';
				$dots = false;
			endif;
		endif;
	endfor;
	if ( $prev_next && $current && ( $current < $total || -1 == $total ) ) :
		$link = str_replace('%_%', $format, $base);
		$link = str_replace('%#%', $current + 1, $link);
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $add_fragment;
		$page_links[] = '<li class="next"><a href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $next_text . '</a></li>';
	else:
		$page_links[] = '<li class="next disabled"><a href="#">' . $next_text . '</a></li>';
	endif;
	switch ( $type ) :
		case 'array' :
			return $page_links;
			break;
		case 'list' :
			$r .= "<ul class='page-numbers'>\n\t<li>";
			$r .= join("</li>\n\t<li>", $page_links);
			$r .= "</li>\n</ul>\n";
			break;
		default :
			$r = join("\n", $page_links);
			break;
	endswitch;
	return $r;
}

function bootstrap_pagination() {
	
	global $wp_query, $wp_rewrite;
	
	$pages = '';
	
	$max = $wp_query->max_num_pages;
	
	if (!$current = get_query_var('paged')){
		$current = 1;
	}
		
	$a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
	
	if( !empty($wp_query->query_vars['s']) ){
		 $a['add_args'] = array( 's' => get_query_var( 's' ) );
	}
	
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - display the text "Page N of N", 0 - not display
	$a['mid_size'] = 5; //how many links to show on the left and right of the current
	$a['end_size'] = 1; //how many links to show in the beginning and end
	$a['prev_text'] = '&larr; Previous'; //text of the "Previous page" link
	$a['next_text'] = 'Next &rarr;'; //text of the "Next page" link

	if($max > 1){
		
		echo '<div class="pagination"><ul>';
		
	}
	
	if($total == 1 && $max > 1){
		
		 //$pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
		
	}
	
	echo $pages . custom_paginate_links($a);
	
	if ($max > 1){
		
		echo '</ul></div>';
		
	}
	
}