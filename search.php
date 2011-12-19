<?php get_header();
if ( $is_iphone ){?>
    <div class="mobile sub-header">
        <h4><?php printf( __( '%s', 'toolbox' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
    </div>
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
        <input type="text" class="searchbox" value="Search" onClick="value=''" name="s" id="s"/>
        <input type="submit" value="Submit" />
    </form>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="preview mobile">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
            <div class="info">
                <h3 class="timestamp right"><?php the_time('F j') ?></h3><h3 class="section left"><?php incomplete_cat_list(',');?></h3>
            </div>
        </div>        
    <?php endwhile; else : ?>
        <div class="preview mobile">
            <h2><a>Please Enter a Search Term Above</a></h2>
        </div> 
    <?php endif; ?>
<?php }else{ ?>
	<div id="content" class="index">
    	<div class="searchHeader">
        	<h1>Archive Search</h1>
            <h2><?php printf( __( 'For: %s', 'toolbox' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
        </div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="searchPost" id="<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
    			<p class="categories">Categories: <?php incomplete_cat_list(',');?> <?php the_tags(', ', ', ', '<br />'); ?> </p>
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
<?php get_sidebar();
}
get_footer(); ?>