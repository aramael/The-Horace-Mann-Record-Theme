<?php include 'links.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" <?php if ( in_category('autofocus') ) {?> class="autofocus fullWidth"<?php }?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php wp_title(" | ",true, right); ?><?php bloginfo('name'); ?></title>
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/article.css" type="text/css" rel="stylesheet"/>
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/author.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/autofocus.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/comment.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/footer.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/offline.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/print.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/search.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/share.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/nav.css" type="text/css" rel="stylesheet" />
        <link href="<?php bloginfo('template_directory'); ?>/css/screen/sidebar.css" type="text/css" rel="stylesheet" />



        <?php wp_head();?>
	</head>
    <body>
		<div id="container">
			<div id="header">
            	<a href="<?php echo get_option('home');?>" class="logo">The Horace Mann Record</a>  
                <div id="secondNav">
                <?php if(current_user_can('read_private_pages')) :?>
                	<ul class="left">
                		<li><a href="<?php echo $editorial_guide_link;?>">Editorial Guide</a></li>
                    	<li><a href="<?php echo $technical_help_link;?>">Technical Help</a></li>
                    	<li class="last"><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a></li>
                	</ul>
                <?php else: ?>
                	<ul class="left">
                		<li><a href="<?php echo $about_link;?>">About us</a></li>
                    	<li><a href="<?php echo $contact_link;?>">Contact</a></li>
                    	<li class="last"><a href="#">Archives</a></li>
                	</ul>
                <?php endif;?>
                	<ul class="right">
                		<li><?php query_posts('showposts=1&post_type=record_print_issues');?><?php while (have_posts()) : the_post(); ?><a href="<?php echo get_post_meta(get_the_ID(), 'record_print_issues_download', true); ?>">Download the latest print issue</a><?php endwhile; wp_reset_query();?></li>
                    	<li class="last"><a href="<?php if(post_type_exists('record_print_issues')){echo get_post_type_archive_link( 'record_print_issues');} ?>">View past issues</a></li>
                	</ul>
              </div><!--END #secondNav-->
            </div><!-- END #header-->
            <div id="page">
            	<div id="page-top"></div><!--END #page-top-->
                <div id="primaryNavLeft"></div>
            	<ul id="primaryNav">
                	<li><a href="<?php echo $news_link; ?>" class="news">News</a></li>
                    <li><a href="<?php echo $oped_link; ?>" class="opEd">Opinions &amp; Editorials</a></li>
                    <li><a href="<?php echo $arts_link; ?>" class="arts">Arts &amp; Entertainment</a></li>
                    <li><a href="<?php echo $features_link;?>" class="features">Features</a></li>
                    <li><a href="<?php echo $md_link; ?>" class="MD">Middle Divsion</a></li>
                    <li><a href="<?php echo $sports_link; ?>" class="LD">Lions Den</a></li>
                    <!--<li><a href="<?php echo $autofocus_link;?>" class="autofocus">Autofocus</a></li>-->
                </ul><!--END ul#primaryNav-->
                <div id="searchwrapper">
					<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
						<input type="text" class="searchbox" value="Search" onClick="value=''" name="s" id="s"/>
						<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/searchButton.png" class="searchbox_submit" id="searchsubmit" value=""  />
					</form>
                </div><!--END #searchwrapper-->
                <div id="primaryNavRight"></div>
                <?php if(get_option("record_theme_offline")){?>
                	<div id="recordOffline">
                        <div class="background">
                            <h1>The Record is Offline</h1>
                            <p>We Will Return to Our Reglular Publishing Schedule on <?php echo date('m / j / Y', get_option('record_theme_offline_time'));?></p>
                        </div>
                    </div>
				<?php }?>
