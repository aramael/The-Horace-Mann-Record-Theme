<div class="column-1">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sliderProperties.js"></script>
    <div id="showcase" class="showcase">
    <?php query_posts('category_name=opinions-editorials-featured&showposts=4');?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="showcase-slide">
            <div class="showcase-content">
                <?php if(has_post_thumbnail()) :?>
                    <?php the_post_thumbnail('slider-preview'); ?>
                <?php else:?>
                    <h1 style="padding:0 40px 0 40px; height:300px; width:595px; display:table-cell; vertical-align:middle; font-size:36px;"><?php the_title(); ?></h1>
                <?php endif;?>
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
        <h1>Most Recent Opinions &amp; Editorial Articles</h1>
    </div>
    <?php query_posts('showposts=5&category_name=opinions-editorials');?>
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
    <?php query_posts('category_name=opinions-editorials-featured&showposts=4');?>
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
        <h1>Opinions</h1>
    </div>
    <?php query_posts('showposts=5&category_name=opinions-editorials&tag=opinions');?>
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
        <h1>Editorials</h1>
    </div>
    <?php query_posts('showposts=5&category_name=opinions-editorials&tag=editorials');?>
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
        <h1>Letters</h1>
    </div>
    <?php query_posts('showposts=5&category_name=opinions-editorials&tag=letters-to-the-editor');?>
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