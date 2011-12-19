<?php
global $is_iphone;
get_header();
if ( $is_iphone ){?>
        <?php if (have_posts()) :?>
            <?php while (have_posts()) : the_post();?>
                <div class="article mobile">
                    <h1><?php the_title();?></h1>
                    <p class="byline"><?php if(function_exists('coauthors_posts_links')){ coauthors_posts_links();}else{the_author_posts_link();}?></p>
                    <?php the_content('');?>
                    <div class="info">
                        <h3 class="timestamp right"><?php the_time('F j') ?></h3><h3 class="section left"><?php incomplete_cat_list(',');?></h3>
                    </div>
                </div>
			<?php endwhile;?>
		<?php endif;?>
<?php }else{?>
	<?php if ( in_category('autofocus') ) :?>
        <?php if (have_posts()) :?>
            <?php while (have_posts()) : the_post();?>
                <div id="content">
                    <h2 class="headline"><?php the_title();?></h2>
                    <p class="byline">
                        <?php
                            if(function_exists('coauthors_posts_links'))
                                coauthors_posts_links();
                                    else
                                the_author_posts_link();
                        ?>, <?php //the_author_meta('address');?>
                    </p>
                    <p class="timestamp">Published on <?php the_time('l, F jS, Y g:i a') ?></p>
                    <p class="categories">Categories: <?php incomplete_cat_list(',');?> <?php the_tags(', ', ', ', '<br />'); ?> </p>
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
                            <a href="#disqus_thread"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment.gif"/>&nbsp;<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
                            <a class="addthis_button_email dsq-postid"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/email.gif">&nbsp;Email</a>
                            <a href="javascript:window.print()"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/print.gif">&nbsp;Print</a>
                        </div>
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4f004469bf2e34"></script>
                    <div class="articleText">
                        <?php the_content('');?>
                    </div>
                    <?php comments_template( '', true ); ?> 
                    <div id="commentDisclaimer">
                        <p>The Horace Mann Record intends for this area to be used to foster healthy, thought-provoking discussion. Comments are expected to adhere to our standards and to be respectful and constructive. As such, we do not permit the use of profanity, foul language, personal attacks, or the use of language that might be interpreted as libelous. Comments are reviewed and will be approved by a moderator to ensure that they meet these standards.</p>
                    </div>
            <?php endwhile;?>
        <?php endif;?>    
    <?php else :?>
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
                        <?php
                            if(function_exists('coauthors_posts_links'))
                                coauthors_posts_links();
                                    else
                                the_author_posts_link();
                        ?>, <?php //the_author_meta('address');?>
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
                            <a href="#disqus_thread"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/comment.gif"/>&nbsp;<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a>
                            <a class="addthis_button_email dsq-postid"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/email.gif">&nbsp;Email</a>
                            <a href="javascript:window.print()"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/print.gif">&nbsp;Print</a>
                        </div>
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4f004469bf2e34"></script>
                    <div class="articleText">
                        <?php the_content('');?>
                    </div>
                    <!--<div id="authorBio">
                        <?php echo get_avatar( get_the_author_id() , 81 ); ?>
                        <p class="description"><a href=""><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a> is a  <?php the_author_meta('address');?> and has written <?php the_author_posts(); ?> articles for The Horace Mann Record. <?php the_author_firstname(); ?> is in the Horace Mann Class of <?php the_author_meta('city'); ?>. <?php the_author_description(); ?>You can contact <?php the_author_firstname(); ?> at <a href="mailto:record@horacemann.org">record@horacemann.org</a> and including <strong><?php the_title();?></strong> in the subject line.</p>
                    </div>-->
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
                    <?php //comments_template( '', true ); ?> 
                    <!--<div id="commentDisclaimer">
                        <p>The Horace Mann Record intends for this area to be used to foster healthy, thought-provoking discussion. Comments are expected to adhere to our standards and to be respectful and constructive. As such, we do not permit the use of profanity, foul language, personal attacks, or the use of language that might be interpreted as libelous. Comments are reviewed and will be approved by a moderator to ensure that they meet these standards.</p>
                    </div>-->
            <?php endwhile;?>
        <?php endif;?>    
        <?php get_sidebar(); ?>  
    <?php endif;?>
<?php }?>
<?php get_footer(); ?>