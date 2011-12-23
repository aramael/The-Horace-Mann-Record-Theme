<?php
include 'links.php';
get_header();
?>
<div id="content">
    <div class="column-1">
        <div id="showcase" class="showcase">
        <?php query_posts('category_name=home-page-featured&showposts=4');?>
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
    <div class="left column-2 border">
        <div class="recent">
            <h1>Most Recent Articles</h1>
        </div>
        <?php query_posts('showposts=4&cat=-7');?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="recent">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <h3 class="timestamp"><?php the_time(M);?>&nbsp;<?php the_time(j);?></h3><h3><?php incomplete_cat_list(',');?></h3>
                <p><?php the_excerpt(); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="right column-2 autofocusPhoto">
        <h1>Autofocus Photo</h1>
        <?php query_posts('category_name=autofocus-featured&showposts=1');?>
        <?php while (have_posts()) : the_post(); ?>
                <?php the_post_thumbnail('autofocus-preview'); ?>
                <h2><?php the_title(); ?></h2>
                <p class="caption"><?php the_excerpt(); ?></p>
                <p class="right more">&gt;&gt; more</p>
        <?php endwhile; ?>
    </div>
    <div class="editorsPick">
        <h1>Editor's Picks</h1>
        <?php query_posts('category_name=home-page-featured&showposts=4');?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="column-4">
                <p><?php incomplete_cat_list(',');?></p>
                <?php the_post_thumbnail('index-thumbnail'); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="divider" style="clear:both; margin-bottom:10px"></div>
    <div class="left column-2 border">
        <div class="blogroll">
            <h1><a href="<?php echo $news_link; ?>">News</a></h1>
            <ul>
                <?php query_posts('category_name=news&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $news_link; ?>">&gt;&gt; more</a></li>
            </ul>
        </div>
        <div class="blogroll">                
            <h1><a href="<?php echo $arts_link;?>">Arts & Entertainment</a></h1>
            <ul>
                <?php query_posts('category_name=arts-entertainment&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $arts_link;?>">&gt;&gt; more</a></li>
            </ul>
        </div>
        <div class="blogroll last">
     
            <h1><a href="<?php echo $sports_link;?>">Lions Den</a></h1>
            <ul>
                <?php query_posts('category_name=lions-den&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $sports_link;?>">&gt;&gt; more</a></li>
            </ul>
        </div>
    </div>
    <div class="right column-2">
        <div class="blogroll">                    
            <h1><a href="<?php echo $autofocus_link;?>">Autofocus</a></h1>
            <ul>
                <?php query_posts('category_name=autofocus&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $blog_link;?>">&gt;&gt; more</a></li>
            </ul>
        </div>
        <div class="blogroll">          
            <h1><a href="<?php echo $oped_link;?>">Opinions &amp; Editorials</a></h1>
            <ul>
                <?php query_posts('category_name=opinions-editorials&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $oped_link;?>">&gt;&gt; more</a></li>
            </ul>
        </div>
        <div class="blogroll last">                   
            <h1><a href="<?php echo $md_link;?>">Middle Division</a></h1>
            <ul>
                <?php query_posts('category_name=middle-division&showposts=5'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <li class="right more"><a href="<?php echo $md_link;?>">&gt;&gt; more</a></li>
            </ul>
        </div>
    </div>
<?php get_sidebar();?>
<?php get_footer();?>