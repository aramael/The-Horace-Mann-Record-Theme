<?php
    // Get the ID of a given category
    $news_id = get_cat_ID( 'News' );
    $sports_id = get_cat_ID( 'Lions Den' );
    $arts_id = get_cat_ID( 'Arts &amp; Entertainment' );
    $md_id = get_cat_ID( 'Middle Division' );
    $oped_id = get_cat_ID( 'Opinions &amp; Editorials' );
    $blog_id = get_cat_ID( 'Record Staff Blog' );
    $autofocus_id = get_cat_ID( 'Autofocus' );
    $features_id = get_cat_ID( 'Features' );

   	// Get the URL of this category
    $news_link = get_category_link( $news_id );
    $arts_link = get_category_link( $arts_id );
    $sports_link = get_category_link( $sports_id );
    $md_link = get_category_link( $md_id );
    $oped_link = get_category_link( $oped_id );
    $blog_link = get_category_link( $blog_id );
	$autofocus_link = get_category_link( $autofocus_id );
    $features_link = get_category_link( $features_id );
	
	//Get the ID of a given page
	$about_id = 37;
	$contact_id = 41;//get_page_id( 'Contact' );
	$policies_id = 45;//get_page_id( 'Policies' );
	$principles_id = 49;//get_page_id( 'Statement of Principles' );
	$technical_help_id = 51;//get_page_id( 'Technical Help' );
	$editorial_guide_id = 43;//get_page_id( 'Editorial Guide' );
	
	//Get the URL of this page
	$about_link = get_page_link($about_id);
	$contact_link = get_page_link($contact_id);
	$policies_link = get_page_link($policies_id);
	$principles_link = get_page_link($principles_id);
	$technical_help_link = get_page_link($technical_help_id);
	$editorial_guide_link = get_page_link($editorial_guide_id);
	
?>