<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php include 'links.php';?>
<?php get_header(); ?>
	<div id="content">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="featuresPost" id="<?php the_ID(); ?>">
            	<?php the_post_thumbnail('features-preview'); ?>
				<h2><span class="timestamp"><?php the_time('M j/y') ?></span>&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    			<p class="categories">Categories: <?php incomplete_cat_list(',');?> <?php the_tags(', ', ', ', '<br />'); ?> </p>
            	<?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		<?php endwhile;?>
		<?php endif; ?>
		<div class="navigation">
			<?php search_pagination();?>
		</div>
<?php get_sidebar(); ?>  
<?php get_footer(); ?>