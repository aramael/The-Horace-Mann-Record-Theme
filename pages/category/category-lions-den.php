<div class="column-1">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sliderProperties.js"></script>
    <div id="showcase" class="showcase">
    <?php query_posts('category_name=lions-den-featured&showposts=4');?>
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
        <h1>Most Recent Lions Den Articles</h1>
    </div>
    <?php query_posts('showposts=5&category_name=lions-den');?>
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
    <?php query_posts('category_name=lions-den-featured&showposts=4');?>
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
        <h1>Fall Sports</h1>
    </div>
</div>
<div class="left column-2">
    <div class="blogroll">
        <h1><a href="#">Field Hockey</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=girls-field-hockey'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $lions-den_link; ?>">&gt;&gt; more</a></li>
        </ul>
    </div>
    <div class="blogroll">                
        <h1><a href="#">Football</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=boys-football'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $arts_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
    <div class="blogroll">                
        <h1><a href="#">Girls Tennis</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=girls-tennis'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $arts_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
    <div class="blogroll last">
        <h1><a href="#">Girls Soccer</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=girls-soccer'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $sports_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
</div>
<div class="right column-2 border">
    <div class="blogroll">                    
        <h1><a href="#">Girls Vollyball</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=girls-volleyball'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="timestamp">-<?php the_time('m/d/Y - g:i a') ?></span></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $blog_link;?>">&gt;&gt; more</a></li>
        </ul>                
    </div>
    <div class="blogroll">          
        <h1><a href="#">Water Polo</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=water-polo'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $oped_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
    <div class="blogroll">          
        <h1><a href="#">Cross Country</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=boys-cross-country,girls-cross-country'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $oped_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
    <div class="blogroll last">                   
        <h1><a href="#">Boys Soccer</a></h1>
        <ul>
            <?php query_posts('category_name=lions-den&showposts=5&tag=boys-soccer'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            <li class="right more"><a href="<?php echo $md_link;?>">&gt;&gt; more</a></li>
        </ul>
    </div>
</div>