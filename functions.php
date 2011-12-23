<?php
/*					  LOAD SCRIPTS & STYLES
****************************************************************/

//Load jQuery from CDN with local fallback
$url = 'http://ajax.googleapis.com/ajax/libssss/jquery/1.5.2/jquery.min.js'; // the URL to check against  
$test_url = @fopen($url,'r'); // test parameters  
if($test_url !== false) { // test if the URL exists  
    function load_external_jQuery() { // load external file  
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'); // register the external file  
        wp_enqueue_script('jquery'); // enqueue the external file  
    }  
    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function  
} else {  
    function load_local_jQuery() {  
        wp_deregister_script('jquery'); // initiate the function  
        wp_register_script('jquery', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/js/libs/jquery-1.5.2.min.js', __FILE__, false, '1.5.2', true); // register the local file  
        wp_enqueue_script('jquery'); // enqueue the local file
    }  
	add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function  
}

//Load Javascript Files
function record_load_scripts(){
	global $is_iphone;
	wp_register_script('awkShowcase', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/js/jquery.aw-showcase.js', __FILE__, false, '1.1.1', true);  
	wp_register_script('home_awkShowcase_properties', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/js/home.aw-showcase.properties.js', __FILE__, false, '1.0' ); 
	wp_register_script('iphone_nav', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/js/iphone.nav.js', __FILE__, false, '1.0' );

	if ((is_home() || is_category()) && $is_iphone == false){
		wp_enqueue_script('awkShowcase');
		wp_enqueue_script('home_awkShowcase_properties');
	}
	if($is_iphone){
		wp_enqueue_script('iphone_nav');
	}
}
add_action('wp_enqueue_scripts', 'record_load_scripts'); // initiate the function

//Load CSS Style Sheets
function record_load_styles(){
	global $is_iphone;
	wp_register_style('record_main', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/css/main.css', false, '1.1.1', 'screen');  
	wp_register_style('record_reset', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/css/reset.css', false, '2.0', 'screen');  
	wp_register_style('record_print', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/css/print.css', false, '1.1.1', 'print');  
	wp_register_style('record_iphone', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/css/iphone.css', false, '1.0', 'screen');  
	wp_register_style('aw-showcase', 'http://record.horacemann.org/wp-content/themes/horaceMannRecord/css/aw-showcase.css', false, '1.1.1', 'screen');  
	if ($is_iphone){
		wp_enqueue_style('record_reset');
		wp_enqueue_style('record_iphone');
	}else{
		wp_enqueue_style('record_reset');
		wp_enqueue_style('record_main');
		wp_enqueue_style('record_print');
		if (is_home()|| is_category()){
			wp_enqueue_style('aw-showcase');
		}
	}
}

add_action('wp_enqueue_scripts', 'record_load_styles');

/*						POST THUMBNAILS
****************************************************************/

//Add Post Thumbnail Support
add_theme_support( 'post-thumbnails' );

//Home Page Index Thumbnails
add_image_size( 'index-thumbnails', 138, 138, true );

//Add Post Thumbnail Size for Features Article
add_image_size( 'slider-preview', 595 );

//Add Post Thumbnail Size for Autofocus Photo of Week
add_image_size( 'autofocus-preview', 285, 427, true );

//Add Post Thumbnail Size for Autofocus Photo of Week
add_image_size( 'autofocus-thumbnails', 267, 178, true );

//Add Post Thumbnail Size for Autofocus Full-Size Photos
add_image_size( 'autofocus-full-size', 895);

//Add Post Thumbnail Size for Features Article
add_image_size( 'features-preview', 590, 180, true );

//Link All Thumbnail Images to Their Parent Post
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
function my_post_image_html( $html, $post_id, $post_image_id ) {
  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;
}

/*						GOO.GL SHORT LINK
****************************************************************/
function googl_shortlink($url, $post_id) {
	global $post;
	if (!$post_id && $post) $post_id = $post->ID;

	if ($post->post_status != 'publish')
		return "";

	$shortlink = get_post_meta($post_id, '_googl_shortlink', true);
	if ($shortlink)
		return $shortlink;

	$permalink = get_permalink($post_id);

	$http = new WP_Http();
	$headers = array('Content-Type' => 'application/json');
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 'method' => 'POST', 'body' => '{"longUrl": "' . $permalink . '"}', 'headers' => $headers));
	$result = json_decode($result['body']);
	$shortlink = $result->id;

	if ($shortlink) {
		add_post_meta($post_id, '_googl_shortlink', $shortlink, true);
		return $shortlink;
	}
	else {
		return $url;
	}
}

add_filter('get_shortlink', 'googl_shortlink', 9, 2);

/*						DYNAMIC EXCERPTS
****************************************************************/

//Control Excerpt Length from 55 words to n words
function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Remove [...] from Post Automatically Generated Excerpts
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*						WORDPRESS CATEGORIES
****************************************************************/

//Return Incomplete Category List
function incomplete_cat_list($separator) {
  $first_time = 1;
  foreach((get_the_category()) as $category) {
	//Exclued All Featured Categories From View
    if ($category->cat_name != 'Home Page Featured' && $category->cat_name != 'Middle Division Featured' && $category->cat_name != 'Arts &amp; Entertainment Featured' && $category->cat_name != 'Opinions &amp; Editorials Featured' && $category->cat_name != 'Autofocus Featured' && $category->cat_name != 'Lions Den Featured' && $category->cat_name != 'News Featured' && $category->cat_name != 'Features Featured') {
      if ($first_time == 1) {
        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
        $first_time = 0;
      } else {
        echo $separator . '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
      }
    }
  }
}

/*						CURRENT URL
****************************************************************/
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

/*						Page ID
****************************************************************/

function get_page_id($page_slug)
{
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

/*						SEARCH PAGINATION
****************************************************************/

function search_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/*					    SECURITY FEATURES
****************************************************************/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'index_rel_link' ); // index link
remove_action('wp_head', 'start_post_rel_link'); // start link
remove_action( 'wp_head', 'feed_links_extra', 3 );


// Custom Login Logo //

function record_custom_login_logo() {
    echo '<style> h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }</style>';
}

add_action('login_head', 'record_custom_login_logo');
?>