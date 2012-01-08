<?php get_header();?>
<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post();?>
		<div id="content" class="article">
			<h2 class="headline"><?php the_title();?></h2>
			<p class="timestamp">Published on <?php the_time('l, F jS, Y') ?></p>
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

                		<?php 
		$doc = get_post_meta(get_the_ID(), 'record_print_issues_upload_meta_box', true);
		if(strlen(trim($doc['url'])) > 0) {
		?>

            <div id="wp_custom_attachment">
                <a href="<?php echo $doc['url']; ?>">
                    Download PDF Here
                </a>
            </div><!-- #wp_custom_attachment -->
		<?php }?>
			</div>

	<?php endwhile;?>
<?php endif;?>    
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
