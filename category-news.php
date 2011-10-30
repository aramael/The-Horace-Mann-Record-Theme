<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php include 'links.php';?>
<?php get_header(); ?>
<div id="content">
                	<div class="column-1">
               			<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sliderProperties.js"></script>
                    	<div id="showcase" class="showcase">
                        <?php query_posts('category_name=news-featured&showposts=4');?>
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
                        	<h1>Most Recent News Articles</h1>
                        </div>
                        <?php query_posts('showposts=5&category_name=news');?>
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
                        <?php query_posts('category_name=news-featured&showposts=4');?>
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
                        	<h1>School News</h1>
                        </div>
                        <?php query_posts('showposts=5&category_name=news&tag=school-news');?>
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
                        	<h1>Community Council</h1>
                        </div>
                        <?php query_posts('showposts=5&category_name=news&tag=community-council');?>
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
<?php get_sidebar(); ?>  
<?php get_footer(); ?>