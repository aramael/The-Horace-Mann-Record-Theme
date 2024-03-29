<?php
/**
 *Require all of the Links used in the navigation menus
 */
include 'links.php';
get_header();
	if (have_posts()) {
		while (have_posts()) : the_post();?>
			<div id="content" class="article">
				<h2 class="headline"><?php the_title();?></h2>
				<p class="timestamp">Last Updated on <?php the_time('l, F jS, Y g:i a') ?></p>
				<?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
				<div class="articleText">
					<?php the_content('');?>
				</div>
		<?php endwhile;
	}
	get_sidebar();
get_footer(); ?>