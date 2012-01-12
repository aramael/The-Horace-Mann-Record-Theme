<?php get_header();?>
<?php if (have_posts()) :?>
	<?php while (have_posts()) : the_post();?>
		<div id="content" class="article">
			<h2 class="headline"><?php the_title();?></h2>
			<p class="timestamp">Published on <?php the_time('l, F jS, Y') ?></p>
			<br/>
			<?php edit_post_link('Edit Issue', '<p class="edit">','</p>'); ?>
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
				<script type="text/javascript" src='http://www.scribd.com/javascripts/scribd_api.js'></script>
    
                <div id="embedded_doc">
                </div>
    
                <script type="text/javascript">
                var scribd_doc = scribd.Document.getDoc( <?php echo get_post_meta(get_the_ID(), 'record_print_issues_scribd_doc_id', true);?>, '<?php echo get_post_meta(get_the_ID(), 'record_print_issues_scribd_key', true);?>' );
                var onDocReady = function(e){
                // scribd_doc.api.setPage(3);
                }
                
                scribd_doc.addEventListener( 'docReady', onDocReady );
                scribd_doc.addParam('jsapi_version', 2);
                scribd_doc.addParam('height', 600);
                scribd_doc.addParam('width', 595);
                scribd_doc.addParam('page', 10);
                scribd_doc.addParam('public', true);
                
                scribd_doc.write('embedded_doc');
                </script>
                <div id="printIssueDownload">
                    <a href="<?php echo get_post_meta(get_the_ID(), 'record_print_issues_download', true);?>">
                        Download PDF Here
                    </a>
                </div><!-- #wp_custom_attachment -->
			</div>

	<?php endwhile;?>
<?php endif;?>    
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
