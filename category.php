<?php
/**
 * Categories Page
 *
 * This page handels the unique dependencies on category pages
 * to fix archive pages, and consolidate code.
 */

$category = get_queried_object();
$sub_categories = get_option("record_theme_category_".str_replace("-", "_", $category->slug));
/**
 *Require all of the Links used in the navigation menus
 */
include 'links.php';
get_header();
?>
<div id="content">
<div class="column-1">
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sliderProperties.js"></script>
    <div id="showcase" class="showcase">
    <?php query_posts('category_name='.$category->category_nicename.'-featured&showposts=4');?>
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
        <h1>Most Recent <?php echo $category->name;?> Articles</h1>
    </div>
    <?php query_posts('showposts=5&category_name='.$category->category_nicename);?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="recent">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <h3 class="timestamp"><?php the_time(F);?>&nbsp;<?php the_time(j);?></h3>
            <p><?php the_excerpt(); ?></p>
        </div>
    <?php endwhile; ?>
    <div class="more">&gt; &gt; more</div>                                       
</div>
<div class="editorsPick">
    <h1>Editor's Picks</h1>
    <?php query_posts('category_name='.$category->category_nicename.'-featured&showposts=4');?>
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
<?php foreach($sub_categories as $sub_category){
	$sub_category = get_tags(array('include' => $sub_category,'hide_empty' => false ));
	$sub_category = $sub_category[0];
	?>
    <div class="featuredCategoryTitle">
        <h1><?php echo $sub_category->name;?></h1>
    </div>
    <?php query_posts('showposts=5&category_name='.$category->category_nicename.'&tag='.$sub_category->slug);?>
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
<?php }?>                               
</div>
<?php
get_sidebar();
get_footer();
?>