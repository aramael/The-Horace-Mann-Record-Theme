<?php
global $is_iphone;
get_header();
if ( $is_iphone ){
	if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="preview mobile" id="<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
            <div class="info">
                <h3 class="timestamp right"><?php the_time('F j');?></h3><h3 class="section left"><?php incomplete_cat_list(',');?></h3>
            </div>
        </div>
    <?php
    endwhile;
	endif;?>
		<div class="navigation">
			<?php search_pagination();?>
		</div>
<?php }else{ ?>
	<div id="content" class="index">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="searchPost" id="<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
    			<p class="categories">Categories: <?php incomplete_cat_list(',');?> <?php the_tags(', ', ', ', '<br />'); ?> </p>
                <br/>
				<?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		<?php endwhile; else : ?>
		<div class="post">
			<h2>Page Not Found</h2>
			<p>Looks like the page you're looking for isn't here anymore. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
		</div> <!-- .post -->
		<?php endif; ?>
		<div class="navigation">
			<?php search_pagination();?>
		</div>
<?php
	get_sidebar();
}
get_footer(); ?>