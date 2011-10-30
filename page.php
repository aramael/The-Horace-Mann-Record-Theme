<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php get_header(); ?>
	<?php if (have_posts()) :?>
    	<?php while (have_posts()) : the_post();?>
			<div id="content" class="article">
    			<h2 class="headline"><?php the_title();?></h2>
    			<p class="timestamp">Last Updated on <?php the_time('l, F jS, Y g:i a') ?></p>
                <?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
                <div class="articleText">
					<?php the_content('');?>
                </div>
        <?php endwhile;?>
	<?php endif;?>    
<?php get_sidebar(); ?>  
<?php get_footer(); ?>