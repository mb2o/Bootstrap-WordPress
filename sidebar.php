<?php
/**
 * @package WordPress
 * @subpackage YOUR_THEME
 */
?>
	<div class="sidebar">

		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_list_categories( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

		<aside id="archives" class="widget">
			<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</aside>

	</div> <!-- sidebar -->

