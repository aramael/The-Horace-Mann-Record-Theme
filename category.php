<?php
/**
 * Categories Page
 *
 * This page handels the unique dependencies on category pages
 * to fix archive pages, and consolidate code.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php
/**
 *Require all of the Links used in the navigation menus
 */
include 'links.php';
global $is_iphone;
get_header();
if ( $is_iphone ){?>
    <div class="mobile sub-header">
        <h4><?php single_cat_title(); ?></h4>
    </div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="preview mobile">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
            <div class="info">
                <h3 class="timestamp right"><?php the_time('F j');?></h3><h3 class="section left"><?php incomplete_cat_list(',');?></h3>
            </div>
        </div>
	<?php endwhile;
	endif; ?>

<?php }else{
	echo '<div id="content">';
	if (is_category("arts-entertainment")){
		include "pages/category/category-arts-entertainment.php";
	}elseif (is_category("features")){
		include "pages/category/category-features.php";
	}elseif (is_category("lions-den")){
		include "pages/category/category-lions-den.php";
	}elseif (is_category("middle-division")){
		include "pages/category/category-middle-division.php";
	}elseif (is_category("news")){
		include "pages/category/category-news.php";
	}elseif (is_category("opinions-editorials")){
		include "pages/category/category-opinions-editorials.php";
	}
	get_sidebar();
}
get_footer();
?>