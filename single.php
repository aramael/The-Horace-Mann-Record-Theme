<?php get_header();?>
<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post();?>
		<div id="content" class="article">
			<div class="print">
				<p class="weeklyFlag">Horace Mann School &#124; Weekly Since 1913</p>
				<center><img src="<?php bloginfo('stylesheet_directory'); ?>/images/printLogo.png" /></center>
				<p class="flagInfo"><?php the_time('F j, Y') ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;http://record.horacemann.org&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Volume 109</p>
			</div>
			<h2 class="headline"><?php the_title();?></h2>
			<p class="byline">
				<?php if(function_exists('coauthors_posts_links')){ coauthors_posts_links(); }else{ the_author_posts_link(); }?>
			</p>
			<p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
			<p class="categories">Categories: <?php incomplete_cat_list(',');?> <?php the_tags(', ', ', ', '<br />'); ?> </p>
			<br/>
			<?php edit_post_link('Edit Article', '<p class="edit">','</p>'); ?>
			<div class="shareBar">
				<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<g:plusone size="medium"></g:plusone>
					<script type="text/javascript">
						(function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/plusone.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						})();
					</script>
				</div>
				<div class="right">
					<a class="addthis_button_email dsq-postid"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/email.gif">&nbsp;Email</a>
					<a href="javascript:window.print()"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/print.gif">&nbsp;Print</a>
				</div>
			</div>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4f004469bf2e34"></script>
			<div class="articleText">
				<?php the_content('');?>
			</div>
			<div id="printBar">
				<table width="100%%" border="0">
					<tr>
						<td>
							<h1><?php wp_title("",true); ?></h1>
							<h2 class="longLink"><?php echo curPageURL(); ?></h2>
							<h2 class="shortLink"><?php echo wp_get_shortlink();?></h2>
						</td>
						<td>
							<?php echo qrcode_show(); ?>
						</td>
					</tr>
				</table>
			</div>
	<?php endwhile;?>
<?php endif;?>    
<?php get_sidebar(); ?>  
<?php get_footer(); ?>