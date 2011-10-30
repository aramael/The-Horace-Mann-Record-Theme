<?php
/*						HELP TEXT
****************************************************************/
function custom_help_text($contextual_help,$screen) {
	global $pagenow; // get what file we're on
	switch ($pagenow) {
	case 'profile.php':
		$contextual_help = "<p>Your profile contains information about you that is used and displayed publicly when you write an article.</p><p> You can change your name, and password here. </p><p>If you want to change some additional piece of information please talk to the Online Editor, Aramael Pena-Alcantara or email him at <a href='mailto:Aramael_Pena_Alcantara@horacemann.org'>Aramael_Pena_Alcantara@horacemann.org</a></p>";
		break;
	case 'edit.php':
		$contextual_help ="<p>This is the Articles View. You can see all of your articles that you are working on or that have already been published on the website. </p>

<p>You can customize the display of this screen in a number of ways:</p>
<ul>
	<li>You can hide/display columns based on your needs and decide how many Articles to list per screen using the Screen Options tab.</li>
	<li>You can filter the list of Articles by Article status using the text links in the upper left to show All, Published, Draft, or Trashed Articles. The default view is to show all Articles.</li>
	<li>You can view Articles in a simple title list or with an excerpt. Choose the view you prefer by clicking on the icons at the top of the list on the right.</li>
	<li>You can refine the list to show only Articles in a specific category or from a specific month by using the dropdown menus above the Articles list. Click the Filter button after making your selection. You also can refine the list by clicking on the Article author, category or tag in the Articles list.</li>
</ul>
<p>Hovering over a row in the Articles list will display action links that allow you to manage your Article. You can perform the following actions:</p>
<ul>
	<li>Edit takes you to the editing screen for that Article. You can also reach that screen by clicking on the Article title.</li>
	<li>Quick Edit provides inline access to the metadata of your Article, allowing you to update Article details without leaving this screen.</li>
	<li>Trash removes your Article from this list and places it in the trash, from which you can permanently delete it.</li>
	<li>Preview will show you what your draft Article will look like if you publish it. View will take you to your live site to view the Article. Which link is available depends on your Article’s status.</li>
</ul>
<p>If you need help using any of these actions please talk to the Online Editor, Aramael Pena-Alcantara or email him at <a href='mailto:Aramael_Pena_Alcantara@horacemann.org'>Aramael_Pena_Alcantara@horacemann.org</a></p>";
		break;
	case 'post.php':
		if (current_user_can('edit_others_posts')) {
			$contextual_help ="";
		}else {
			$contextual_help ="";
		}
		break;
	}
	return $contextual_help;
}

add_filter('contextual_help', 'custom_help_text', 10, 3);

//Wordpress Sidebar Support
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'sidebar',
	'before_widget' => '<div class="sidebar-box">',
	'after_widget' => '</div>',
	'before_title' => '<h1>',
	'after_title' => '</h1>',
));

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

/*						CLIENT MODIFICATIONS
****************************************************************/
// Admin footer modification
function remove_footer_admin (){
	echo '<span id="footer-thankyou">Developed by <a href="http://www.pena-alcantara.com" target="_blank">Aramael Pena-Alcantara</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
function example_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'acx_plugin_dashboard_widget', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

//ADD HELP WIDGET DASHBOARD
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Welcome', 'custom_dashboard_help');
}

function custom_dashboard_help() {
	echo '<p>Welcome to The Horace Mann Record\'s new website! Need help? Contact the Online Editor <a href="mailto:Aramael_Pena_Alcantara@horacemann.org">here</a>.</p>';
}

// CUSTOM ADMIN LOGIN LOGO LINK
function change_wp_login_url(){
	echo bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');

// CUSTOM ADMIN LOGIN LOGO & ALT TEXT
function change_wp_login_title(){
	echo get_option('blogname');
}
add_filter('login_headertitle', 'change_wp_login_title');

//CHANGE 'POST' TO 'ARTICLE'
add_filter('gettext', 'change_post_to_article');
add_filter('ngettext', 'change_post_to_article');

function change_post_to_article( $translated ) {
	$translated = str_ireplace('Post','Article', $translated ); // ireplace is PHP5 only
	return $translated;
}

//REMOVE COMMENTS & TOOLS MENU FROM NON-ADMINS
function remove_menus () {
global $menu;
		$restricted = array(__('Comments'), _('Tools'));
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
}

//TINYMCE BUTTOS EDIT

//Remove HTML Editor for Non-Admins

add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
function remove_html_editor() {
	echo '<style type="text/css">#editor-toolbar #edButtonHTML, #quicktags {display: none;}</style>' . "\n";
}

// TinyMCE: First line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
	function base_extended_editor_mce_buttons($buttons) {
		// The settings are returned in this array. Customize to suite your needs.
		return array(
			'bold', 'italic', 'strikethrough', 'separator', 
			'undo', 'redo', 'removeformat', 'separator', 
			'link', 'unlink', 'separator', 
			'fullscreen'
		);
	}
	add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}
 
// TinyMCE: Second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
	function base_extended_editor_mce_buttons_2($buttons) {
		// The settings are returned in this array. Customize to suite your needs. An empty array is used here because I remove the second row of icons.
		return array();
	}
	add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}


//Remove Extra Meta Boxes for Authors & Contributors
function remove_meta_author_contrib() {
	remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box( 'postimagediv' , 'post' , 'normal' );
	remove_meta_box( 'coauthorsdiv' , 'post' , 'normal' );
}

//Display Only Posts by Author in Admin
function posts_for_current_author($query) {
	if($query->is_admin && !current_user_can('edit_others_posts')) {
		global $user_ID;
		$query->set('author',  $user_ID);
		unset($user_ID);
	}
	return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

//Filter Featured Category from Authors & Contributors
add_filter('list_terms_exclusions', 'yoursite_list_terms_exclusions', 10, 2);
function yoursite_list_terms_exclusions( $exclusions, $args ) {
  global $pagenow;
  if (in_array($pagenow,array('post.php','post-new.php')) && 
     !current_user_can('edit_others_posts')) {
    $exclusions = " {$exclusions} AND t.slug NOT IN ('arts-entertainment-featured','autofocus', 'autofocus-featured', 'home-page-featured', 'lions-den-featured', 'middle-division-featured', 'news-featured', 'opinions-editorials-featured', 'uncategorized')";
  }
  return $exclusions;
}

/*						USER PROFILE
****************************************************************/

//REMOVE EXTRA CONTACT INFO
function remove_extra_info( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
}

// Callback function to remove default bio field from user profile page
function remove_plain_bio($buffer) {
	$titles = array('#<h3>About Yourself</h3>#','#<h3>About the user</h3>#');
	$buffer=preg_replace($titles,'<h3>Password</h3>',$buffer,1);
	$biotable='#<h3>Password</h3>.+?<table.+?/tr>#s';
	$buffer=preg_replace($biotable,'<h3>Password</h3> <table class="form-table">',$buffer,1);
	return $buffer;
}

function profile_admin_buffer_start() { ob_start("remove_plain_bio"); }

function profile_admin_buffer_end() { ob_end_flush(); }

add_action('admin_head', 'profile_admin_buffer_start');
add_action('admin_footer', 'profile_admin_buffer_end');
add_action('admin_head', 'hide_profile_info');
function hide_profile_info() {
global $pagenow; // get what file we're on

if(!current_user_can('edit_users')) { // we want admins and editors to still see it
	switch($pagenow) {
		case 'profile.php':
			$output = "\n\n" . '<script type="text/javascript">' . "\n";
			$output .= 'jQuery(document).ready(function() {' . "\n";
			$output .= 'jQuery("form#your-profile > h3:first").hide();' . "\n"; // hide "Personal Options" header
			$output .= 'jQuery("form#your-profile > table:first").hide();' . "\n"; // hide "Personal Options" table
			$output .= 'jQuery("table.form-table:eq(1) tr:first").hide();' . "\n"; // hide "username"
			$output .= 'jQuery("table.form-table:eq(1) tr:eq(3)").hide();' . "\n"; // hide "nickname"
			$output .= 'jQuery("table.form-table:eq(1) tr:eq(4)").hide();' . "\n"; // hide "display name publicly as"
			$output .= 'jQuery("table.form-table:eq(1)+h3").hide();' . "\n"; // hide "Contact Info" header
			$output .= 'jQuery("table.form-table:eq(2)").hide();' . "\n"; // hide "Contact Info" table
			$output .= 'jQuery("table.form-table:eq(3)+h3").hide();' . "\n"; // hide "Extra Profile Information" header
			$output .= 'jQuery("table.form-table:eq(4)").hide();' . "\n"; // hide "Extra Profiel Information" table
			$output .= '});' . "\n";
			$output .= '</script>' . "\n\n";
			add_filter('user_contactmethods','remove_extra_info',10,1);
			remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
			break;
		default:
			$output = '';
		}
	}
	echo $output;
}
if(!current_user_can('edit_others_posts')){
	add_action('admin_init','remove_meta_author_contrib');
}

if ( !current_user_can( 'edit_users' ) ) {
	//CUSTOM DASHBOARD WIDGET
	add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
	// DISABLE SHOWING UPGRADE TO EVERYONE BUT ADMIN
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
	//REMOVE COMMENTS & TOOLS
	add_action('admin_menu', 'remove_menus');
	add_action('admin_head', 'remove_html_editor');
}

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

/*					ADDITIONAL USER INFORMATION
****************************************************************/
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Extra profile information", "blank"); ?></h3>
 
<table class="form-table">
<tr>
<th><label for="address"><?php _e("Horace Mann Record Title"); ?></label></th>
<td>
<input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("For Record Editorial Board Use Only."); ?></span>
</td>
</tr>
<tr>
<th><label for="city"><?php _e("Class Year"); ?></label></th>
<td>
<input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" /><br />
<span class="description"><?php _e("Please enter your Class Year."); ?></span>
</td>
</tr>
</table>
<?php }
 
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
 
function save_extra_user_profile_fields( $user_id ) {
 
if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
 
update_usermeta( $user_id, 'address', $_POST['address'] );
update_usermeta( $user_id, 'city', $_POST['city'] );
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

/*						SEARCH PAGINATION
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
?>