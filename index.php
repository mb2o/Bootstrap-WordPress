<?php
/**
 * @package WordPress
 * @subpackage YOUR_THEME
 */

get_header(); ?>

<?php 
get_sidebar(); ?>

<div class="content">
	
	<?php 
	if (have_posts()) : ?>

		<?php 
		$post_count = 1;
		$row = 1;
		
		while (have_posts()) : the_post(); 
		
			$span = $post_count > 2 ? 4 : 8;
			
			$row_count = array(
				4 => 4,
				8 => 2
			);
			
			if($row == 1){ echo '<div class="row">'; }
			
			$end_row = $row == $row_count[$span] ? TRUE : FALSE; ?>
			
			<div class="span<?php echo $span; ?>">

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

					<?php the_content('Read the rest of this entry &raquo;'); ?>

					<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				</div>

			</div> <!-- span -->

		<?php 

		if($end_row){
			
			echo '</div> <!-- row -->';
			$row = 1;
			
		}else{
			
			$row++;
			
		}

		$post_count++;
		endwhile; ?>

		<?php bootstrap_pagination(); ?>

	<?php 
	else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php 
	endif; ?>
	
</div> <!-- content -->

<?php 
get_footer(); ?>
