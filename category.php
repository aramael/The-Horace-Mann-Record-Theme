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

get_header();
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
get_footer();
?>