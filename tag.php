<?php get_header(); ?>
	<div id="content" class="index">
    	<div class="searchHeader">
    <h2><?php printf( __( '%s Archives', 'toolbox' ), '<span>' . single_tag_title( '', false ) . '</span>' );?></h2>
    </div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="featuredCategory" id="<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
				<p class="categories">Categories: <?php incomplete_cat_list(',');?></p>
                <br/>
                <p class="categories"><?php the_tags(); ?></p>
				<?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		<?php endwhile; else : ?>
		<div class="post">
			<h2>Page Not Found</h2>
			<p>For the Record...your page could not be found. Try browsing the <a href="">categories</a>, <a href="">archives</a>, or using the search box below.</p>
		</div> <!-- .post -->
		<?php endif; ?>
		<div class="navigation">
			<?php search_pagination();?>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>