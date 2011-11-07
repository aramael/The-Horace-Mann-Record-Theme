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