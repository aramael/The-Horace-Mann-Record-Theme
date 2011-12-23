<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
get_header();
?>
<div id="content" class="author">
<!-- This sets the $curauth variable -->
	<div class="authorPhoto">
		<?php echo get_avatar( $curauth->ID , 400, 'identicon' ); ?>
    </div>
    <div class="authorInfo">
	    <h1><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
    </div>
    <div class="column-1">
		<?php display_author_media($curauth->ID, $sidebar = false, $limit = 250, $link_without_parent = false, $header = "<div class='featuredCategoryTitle'><h1>Photos</h1></div>", $exclude_unattached = false); ?>
    <div style="clear:both;"></div>
<!-- The Loop -->
    <?php if ( have_posts() ) :?>
    		<div class="featuredCategoryTitle">
        		<h1>Articles</h1>
        	</div>
			<?php full_post_list($author, $curauth->user_login) ; ?>
    <?php endif; ?>
    </div>
<!-- End Loop -->
<?php get_sidebar();?>
<?php get_footer(); ?>