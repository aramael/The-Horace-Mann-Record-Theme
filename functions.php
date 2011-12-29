<?php
/*						THEME OPTIONS
****************************************************************/
add_action('admin_menu', 'record_theme_menu');
function record_theme_menu() {
	add_menu_page('Editor Settings', 'Editor Settings', 'edit_pages', 'record_theme_settings', 'record_theme_settings');
	add_submenu_page( 'record_theme_settings', 'Featured Sections', 'Featured Sections', 'edit_pages', 'record-theme-settings', 'record_theme_settings');
}

function record_theme_category_meta($category, $tags_formatted){
?>
    <div id="category-<?php echo $category->slug;?>" class="postbox">
        <div class="handlediv" title="Click to toggle">
            <br>
        </div>
        <h3 class="hndle">
            <span><?php echo $category->name;?></span>
        </h3>
        <div class="inside">
            <div class="versions">
            <?php if($category->slug !== 'lions-den'){?>
            <div>
            <input type="text" id="tags-<?php echo $category->slug;?>" name="category-<?php echo $category->slug;?>" />
            </div>
            <?php
                $name = "record_theme_category_".str_replace("-", "_", $category->slug);
                $data = get_option($name);
                if (!empty($data)){
                    $pre_populate = array();
                    foreach($data as $value){
                        $tag = get_tags(array('include' => $value,'hide_empty' => false ));
                        $pre_populate[] = array('id' => $value, 'name' => $tag[0]->name);
                    }
                    $pre_populate = json_encode($pre_populate);
                }
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery("#tags-<?php echo $category->slug;?>").tokenInput(<?php echo $tags_formatted;?>, {
                    prePopulate: <?php if (isset($pre_populate) && !empty($pre_populate)){echo $pre_populate;}else{echo "[]";}?>,
                    tokenLimit: 5
                });
            });
            </script>
            <?php }else{?>
            <?php $season = get_option("record_theme_category_".str_replace("-", "_", $category->slug));?>
            <select id="tags-<?php echo $category->slug;?>" name="category-<?php echo $category->slug;?>" >
            	<option value="fall" <?php if($season == "fall"){?>selected="selected"<?php }?>>Fall</option>
                <option value="winter" <?php if($season == "winter"){?>selected="selected"<?php }?>>Winter</option>
                <option value="spring" <?php if($season == "spring"){?>selected="selected"<?php }?>>Spring</option>
            </select>
            <?php }?>
            <br class="clear"></div>
        </div>
    </div>
    <?php
	unset($pre_populate);
}

function record_theme_settings(){
	wp_enqueue_script( 'dashboard' );
	wp_enqueue_script( 'jquery' );
	
	wp_register_script('tokeninput', get_bloginfo('stylesheet_directory').'/js/jquery.tokeninput.js', __FILE__, false, '1.6.0' );
	wp_enqueue_script( 'tokeninput' );
	
	wp_register_style('token-input', get_bloginfo('stylesheet_directory').'/css/token-input.css', false, '1.6.0', 'screen');  
	wp_enqueue_style( 'token-input' );
	
	/**
	 * JSON Encode Tags
	 */
	$tags = get_tags(array('hide_empty' => false ));
	$tags_formatted = array();
	foreach($tags as $tag){
		$tags_formatted[] = array('id' => $tag->term_id,'name' => $tag->name);
	}
	$tags_formatted = json_encode($tags_formatted);
	
	/**
	 * Save the Theme Options
	 *
	 */
	if (isset($_POST['update'])){
		foreach($_POST as $key => $value){
			if (preg_match("/^category-/", $key) && preg_match("^([0-9],){1,4}|[0-9]{1}^", $value)){
				$newvalue = explode(",", $value);
				$option_name = "record_theme_".str_replace("-", "_", $key);
				if ( get_option( $option_name ) != $newvalue ) {
					update_option( $option_name, $newvalue );
				} else {
					$deprecated = ' ';
					$autoload = 'no';
					add_option( $option_name, $newvalue, $deprecated, $autoload );
				}
			}elseif (preg_match("/^category-/", $key) && preg_match("^fall|winter|spring^", $value)){
				$option_name = "record_theme_".str_replace("-", "_", $key);
				if ( get_option( $option_name ) != $value ) {
					update_option( $option_name, $value );
				} else {
					$deprecated = ' ';
					$autoload = 'no';
					add_option( $option_name, $value, $deprecated, $autoload );
				}
			}
		}
		?>
        <div id="message" class="updated"><p>Settings saved</p></div>
        <?php
	}
	
	
	?>
    <div class="wrap">
		<?php screen_icon('themes');?><h2>Featured Section Settings</h2>
        <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
			<?php
            $categories = get_categories( array('orderby' => 'name', 'hide_empty' => 0, 'category_parent' => 0, 'exclude' => '1' ) );
            if (sizeof($categories) % 2 == 0 ){
                ?>
                <form method="post" action="">
                <div id="postbox-container-1" class="postbox-container" style="width:50%;">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        <?php
                        for ($i = 0; $i < sizeof($categories)/2; $i++) {
                            record_theme_category_meta($categories[$i], $tags_formatted);
                        }
                        ?>
                    </div>
                </div>
                <div id="postbox-container-2" class="postbox-container" style="width:50%;">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        <?php
                        for ($i = $i; $i < sizeof($categories); $i++){
							record_theme_category_meta($categories[$i], $tags_formatted);
                        }
                        ?>
                    </div>
                </div>
                <input type="submit" name="update" id="update" class="button-primary" value="Update">
                </form>
                <?php
            }else{
                ?>
                <div id="postbox-container-1" class="postbox-container" style="width:50%;">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        <?php
                        for ($i = 0; $i < round(sizeof($categories)/2); $i++) {
                            record_theme_category_meta($categories[$i], $tags_formatted);
                        }
                        ?>
                    </div>
                </div>
                <div id="postbox-container-2" class="postbox-container" style="width:50%;">
                    <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                        <?php
                        for ($i = $i; $i < sizeof($categories); $i++){
                            record_theme_category_meta($categories[$i], $tags_formatted);
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
		</div>
        </div>
    </div>
    <?php
}

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
        wp_register_script('jquery', get_bloginfo('stylesheet_directory').'/js/libs/jquery-1.5.2.min.js', __FILE__, false, '1.5.2', true); // register the local file  
        wp_enqueue_script('jquery'); // enqueue the local file
    }  
	add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function  
}

//Load Javascript Files
function record_load_scripts(){
	global $is_iphone;
	wp_register_script('awkShowcase', get_bloginfo('stylesheet_directory').'/js/jquery.aw-showcase.js', __FILE__, false, '1.1.1', true);  
	wp_register_script('home_awkShowcase_properties', get_bloginfo('stylesheet_directory').'/js/home.aw-showcase.properties.js', __FILE__, false, '1.0' ); 
	wp_register_script('iphone_nav', get_bloginfo('stylesheet_directory').'/js/iphone.nav.js', __FILE__, false, '1.0' );

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
	wp_register_style('record_main', get_bloginfo('stylesheet_directory').'/css/main.css', false, '1.1.1', 'screen');  
	wp_register_style('record_reset', get_bloginfo('stylesheet_directory').'/css/reset.css', false, '2.0', 'screen');  
	wp_register_style('record_print', get_bloginfo('stylesheet_directory').'/css/print.css', false, '1.1.1', 'print');  
	wp_register_style('record_iphone', get_bloginfo('stylesheet_directory').'/css/iphone.css', false, '1.0', 'screen');  
	wp_register_style('aw-showcase', get_bloginfo('stylesheet_directory').'/css/aw-showcase.css', false, '1.1.1', 'screen');  

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
****************************************************************
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