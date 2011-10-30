<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php get_header();?>
<div id="content" class="author">
<!-- This sets the $curauth variable -->
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
	<div class="authorPhoto">
		<?php echo get_avatar( $curauth->ID , 400, 'identicon' ); ?>
    </div>
    <div class="authorInfo">
	    <h1><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h1>
		<h2>&mdash; <?php echo $curauth->address;?> &mdash;</h2>
    </div>
    <p><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?> is a  <?php echo $curauth->address;?> and has written <?php total_posts($author, $curauth->user_login); ?> articles for The Horace Mann Record. <?php echo $curauth->first_name; ?> is in the Horace Mann Class of <?php echo $curauth->city; ?>. <?php echo $curauth->description ?>You can contact <?php echo $curauth->first_name; ?> at <a href="mailto:record@horacemann.org">record@horacemann.org</a> and including <strong><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></strong> in the subject line.</p>

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
<?php get_sidebar(); ?>
<?php get_footer(); ?>