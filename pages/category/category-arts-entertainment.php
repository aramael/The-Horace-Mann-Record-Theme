<div class="column-1">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sliderProperties.js"></script>
    <div id="showcase" class="showcase">
    <?php query_posts('category_name=arts-entertainment-featured&showposts=4');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="showcase-slide">
            <div class="showcase-content">
                <?php the_post_thumbnail('slider-preview'); ?>
            </div>
            <div class="showcase-caption">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> &#448; <?php incomplete_cat_list(',');?>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<div class="column-1">
    <div class="recent">
        <h1>Most Recent Arts & Entertainment Articles</h1>
    </div>
    <?php query_posts('showposts=5&category_name=arts-entertainment');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="recent">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3 class="timestamp"><?php the_time(F);?>&nbsp;<?php the_time(j);?></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt;&gt; more</div>                                       
</div>
<div class="editorsPick">
    <h1>Editor's Picks</h1>
    <?php query_posts('category_name=arts-entertainment-featured&showposts=4');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="column-4">
            <p><?php incomplete_cat_list(',');?></p>
            <?php the_post_thumbnail('thumbnail'); ?>
            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        </div>
    <?php endwhile; ?>
</div>
<div class="divider" style="clear:both; margin-bottom:10px"></div>
<div class="column-1">
    <div class="featuredCategoryTitle">
        <h1>Visual Arts</h1>
    </div>
    <?php query_posts('showposts=5&category_name=arts-entertainment&tag=visual-arts');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="featuredCategory">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
            <p class="categories">Categories: <?php incomplete_cat_list(',');?></p>
            <?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt;&gt; more</div>                                       
</div>                                            
<div class="column-1">
    <div class="featuredCategoryTitle">
        <h1>Performance Arts</h1>
    </div>
    <?php query_posts('showposts=5&category_name=arts-entertainment&tag=performance-arts');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="featuredCategory">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
            <p class="categories">Categories: <?php incomplete_cat_list(',');?></p>
            <?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt;&gt; more</div>                                       
</div>
<div class="column-1">
    <div class="featuredCategoryTitle">
        <h1>Music</h1>
    </div>
    <?php query_posts('showposts=5&category_name=arts-entertainment&tag=music');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="featuredCategory">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
            <p class="categories">Categories: <?php incomplete_cat_list(',');?></p>
            <?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt;&gt; more</div>                                       
</div>