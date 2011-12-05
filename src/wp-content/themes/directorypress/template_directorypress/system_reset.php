<?php

if(!function_exists("wp_create_category1")){function wp_create_category1( $cat_name, $parent = 0 ) {
	if ( $id = category_exists1($cat_name) )
		return $id;

	return wp_insert_category1( array('cat_name' => $cat_name, 'category_parent' => $parent) );
}}
if(!function_exists("category_exists1")){function category_exists1($cat_name, $parent = 0) {
	$id = term_exists($cat_name, 'category', $parent);
 
	if ( is_array($id) )
		$id = $id['term_id'];
	return $id;
}}
if(!function_exists("wp_insert_category1")){ function wp_insert_category1($catarr, $wp_error = false) {
	$cat_defaults = array('cat_ID' => 0, 'cat_name' => '', 'category_description' => '', 'category_nicename' => '', 'category_parent' => '');
	$catarr = wp_parse_args($catarr, $cat_defaults);
	extract($catarr, EXTR_SKIP);

	if ( trim( $cat_name ) == '' ) {
		if ( ! $wp_error )
			return 0;
		else
			return new WP_Error( 'cat_name', __('You did not enter a category name.') );
	}

	$cat_ID = (int) $cat_ID;

	// Are we updating or creating?
	if ( !empty ($cat_ID) )
		$update = true;
	else
		$update = false;

	$name = $cat_name;
	$description = $category_description;
	$slug = $category_nicename;
	$parent = $category_parent;

	$parent = (int) $parent;
	if ( $parent < 0 )
		$parent = 0;

	if ( empty($parent) || !category_exists1( $parent ) || ($cat_ID && cat_is_ancestor_of($cat_ID, $parent) ) )
		$parent = 0;

	$args = compact('name', 'slug', 'parent', 'description');

	if ( $update )
		$cat_ID = wp_update_term($cat_ID, 'category', $args);
	else
		$cat_ID = wp_insert_term($cat_name, 'category', $args);

	if ( is_wp_error($cat_ID) ) {
		if ( $wp_error )
			return $cat_ID;
		else
			return 0;
	}

	return $cat_ID['term_id'];
} }

if(!function_exists("selfURL1")){ function selfURL1() {
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = "http".$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? ""
			: (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port;
	}
}
if(!function_exists("FilterPath")){

	function FilterPath(){
		$path=dirname(realpath($_SERVER['SCRIPT_FILENAME']));
		$path_parts = pathinfo($path);
		return $path;
	}
}
if(function_exists("get_option")){ 

	// DELETE DEFAULT LINKS
	if(isset($_POST['RESETME']) && $_POST['RESETME'] =="yes"){
	
	mysql_query("DELETE FROM $wpdb->links");
	mysql_query("DELETE FROM $wpdb->posts");
	mysql_query("DELETE FROM $wpdb->postmeta");
	mysql_query("DELETE FROM $wpdb->terms");
	mysql_query("DELETE FROM $wpdb->term_taxonomy");
	mysql_query("DELETE FROM $wpdb->term_relationships");
	mysql_query("DELETE FROM $wpdb->comments");
	mysql_query("DELETE FROM $wpdb->commentmeta");

// CATEGORY SETUP
//$args = array('cat_name' => "Articles" ); 
//$cat_id = wp_insert_term("Articles", 'category', $args);
//$ARTID = $cat_id['term_id'];

$args = array('cat_name' => "Arts" ); 
$cat_id = wp_insert_term("Arts", 'category', $args);
	wp_create_category1('Movies', $cat_id['term_id']);
	wp_create_category1('Television', $cat_id['term_id']);
	wp_create_category1('Music', $cat_id['term_id']);
 

$args = array('cat_name' => "Business" ); 
$cat_id = wp_insert_term("Business", 'category', $args);
$bizID = $cat_id['term_id'];
	wp_create_category1('Jobs', $cat_id['term_id']);
	wp_create_category1('Real Estate', $cat_id['term_id']);
	wp_create_category1('Investing', $cat_id['term_id']);
 
$args = array('cat_name' => "Computers" ); 
$cat_id = wp_insert_term("Computers", 'category', $args);
	wp_create_category1('Internet', $cat_id['term_id']);
	wp_create_category1('Software', $cat_id['term_id']);
	wp_create_category1('Hardware', $cat_id['term_id']);
 
$args = array('cat_name' => "Games" ); 
$cat_id = wp_insert_term("Games", 'category', $args);
	wp_create_category1('Video Games', $cat_id['term_id']);
	wp_create_category1('RPGs', $cat_id['term_id']);
	wp_create_category1('Gambling', $cat_id['term_id']);

$args = array('cat_name' => "Health" ); 
$cat_id = wp_insert_term("Health", 'category', $args);
	wp_create_category1('Fitness', $cat_id['term_id']);
	wp_create_category1('Medicine', $cat_id['term_id']);
	wp_create_category1('Alternative', $cat_id['term_id']);
 
$args = array('cat_name' => "Home" ); 
$cat_id = wp_insert_term("Home", 'category', $args);
	wp_create_category1('Family', $cat_id['term_id']);
	wp_create_category1('Consumers', $cat_id['term_id']);
	wp_create_category1('Cooking', $cat_id['term_id']); 

$args = array('cat_name' => "Kids and Teens" ); 
$cat_id = wp_insert_term("Kids and Teens", 'category', $args);
	wp_create_category1('Family', $cat_id['term_id']);
	wp_create_category1('School Time', $cat_id['term_id']);
	wp_create_category1('Teen Life', $cat_id['term_id']);
 

$args = array('cat_name' => "News" ); 
$cat_id = wp_insert_term("News", 'category', $args);
	wp_create_category1('Media', $cat_id['term_id']);
	wp_create_category1('Newspapers', $cat_id['term_id']);
	wp_create_category1('Weather', $cat_id['term_id']);
 

$args = array('cat_name' => "Recreation" ); 
$cat_id = wp_insert_term("Recreation", 'category', $args);
	wp_create_category1('Travel', $cat_id['term_id']);
	wp_create_category1('Food', $cat_id['term_id']);
	wp_create_category1('Outdoors', $cat_id['term_id']);
 
$args = array('cat_name' => "Regional" ); 
$cat_id = wp_insert_term("Regional", 'category', $args);
	wp_create_category1('US', $cat_id['term_id']);
	wp_create_category1('Canada', $cat_id['term_id']);
	wp_create_category1('UK', $cat_id['term_id']);
	wp_create_category1('Europe', $cat_id['term_id']);
 

$args = array('cat_name' => "Shopping" ); 
$cat_id = wp_insert_term("Shopping", 'category', $args);
	wp_create_category1('Clothing', $cat_id['term_id']);
	wp_create_category1('Foods', $cat_id['term_id']);
	wp_create_category1('Gifts', $cat_id['term_id']);

$args = array('cat_name' => "Society" ); 
$cat_id = wp_insert_term("Society", 'category', $args);
	wp_create_category1('People', $cat_id['term_id']);
	wp_create_category1('Religion', $cat_id['term_id']);
	wp_create_category1('Issues', $cat_id['term_id']);

 
/*$args = array('cat_name' => "Sports" ); 
$cat_id = wp_insert_term("Sports", 'category', $args);
	wp_create_category1('Baseball', $cat_id['term_id']);
	wp_create_category1('Soccer', $cat_id['term_id']);
	wp_create_category1('Basketball', $cat_id['term_id']);
*/
 

$pages_array = "";
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Submit';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$my_post['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$pages_array .= $page1_id.",";
update_post_meta($page1_id , '_wp_page_template', 'tpl-add.php');
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Messages';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$my_post['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$pages_array .= $page1_id.",";
update_post_meta($page1_id , '_wp_page_template', 'tpl-messages.php');
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Manage';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$my_post['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$pages_array .= $page1_id.",";
update_post_meta($page1_id , '_wp_page_template', 'tpl-edit.php');
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Articles';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$page1['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$articles_page = $page1_id;
update_post_meta($page1_id , '_wp_page_template', 'tpl-articles.php');
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Contact';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$page1['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
update_post_meta($page1_id , '_wp_page_template', 'tpl-contact.php');
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'My Account';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$page1['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$pages_array .= $page1_id.",";
update_post_meta($page1_id , '_wp_page_template', 'tpl-myaccount.php');
 
// CREATE PAGES
$page1 = array();
$page1['post_title'] = 'Callback';
$page1['post_content'] = '';
$page1['post_status'] = 'publish';
$page1['post_type'] = 'page';
$page1['post_author'] = 1;
$page1['post_category'] = array($ARTID);
$page1_id = wp_insert_post( $page1 );
$pages_array .= $page1_id.",";
update_post_meta($page1_id , '_wp_page_template', 'tpl-callback.php');


wp_delete_term( $cat_id['term_id']+4, 'category' );
//die($page1_id ."<--".$cat_id['term_id']);
// PAGE STOPPERS
update_option("excluded_pages",$pages_array);
update_option("article_cats","-".$ARTID);

update_option("submit_url",selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."submit/");

// PAGES SETUP
update_option("dashboard_url",selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."my-account/");

update_option("dashboard_submiturl", selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."submit/");
update_option("manage_url", selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."manage/");


// IMAGE STORAGE PATHS
update_option("imagestorage_link",selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."wp-content/themes/directorypress/thumbs/");
update_option("imagestorage_path",str_replace("wp-admin","wp-content/themes/directorypress/thumbs/",str_replace("\\","/",FilterPath())));
update_option("image_item_w", "120");
update_option("image_item_h", "90");

// POST PRUN SETTINGS
update_option("post_prun","no");
update_option("prun_period","30");

// DEFAULT SETTINGS
update_option("directorypress_system", "dir"); // do not remove
update_option("theme", "directorypress-default"); // do not remove
update_option("language", "language_english"); // do not remove
update_option("copyright", "Your Copyright Text Here");
 
update_option("logo_url","");
update_option("display_sliderbox_items", "");
update_option("submit_price", "0");
update_option("submit_text1", "");
update_option("submit_text2", "<p>Your website will be added once payment has been recieved.</p></br>");
update_option("submit_text3", "Your listing has been submitted for review by one of our team, if accepted it will be visible on our website within 48 hours.");
update_option("display_nofollow", "yes");
update_option("display_recentpost", "yes");
update_option("display_recommended", "yes");
update_option("display_account", "yes");
update_option("display_categories", "yes");
update_option("display_categories_count", "yes");
update_option("display_single_preview", "yes");
update_option("dashboard_c1", "Website URL**url");

update_option("listbox_display", "1");
update_option("display_previewimage", "yes");
update_option("display_categories_count_inner", "no");
update_option("display_homecats", "yes");
update_option("display_homerecently", "yes");
update_option("display_homeimage_title", "Wordpress Directory Theme");
update_option("display_homeimage", "http://demo.directorypress.net/directorypress_small.gif");
update_option("display_homeimage_desc", "<p>DirectoryPress is a fully featured directory theme for Wordpress, it allows you to turn your standard wordpress blog into a powerful online link directory.</p><br />
<p>Not only does DirectoryPress come with great directory plugin features but also it comes with a range of changeable themes and designs, you can easily switch between any of the designs available with a click of the button!</p><br />
<p>Download our free directory script right now and within minutes you could have a beautiful wordpress directory powered by DirctoryPress. <br /> <a href='http://directorypress.net' title='Download DirectoryPress'>Download DirectoryPress</a></p>");
update_option("advertising_top_checkbox", "1");
update_option("advertising_top_adsense", '<a href="http://www.'.''.'premiumpress.com/?source=free-directorypress"><img src="http://www.premiumpress.com/banner/468x60_1.gif" alt="premium wordpress themes" /></a>');
update_option("advertising_left_checkbox", "0");
update_option("advertising_left_adsense", '');
update_option("display_custom_display1", "Hits");
update_option("display_custom_value1", "hits");
update_option("display_custom_display2", "/ Link Bid ($)");
update_option("display_custom_value2", "bid");

update_option("display_featured_image_enable", "0");
//update_option("display_featured_image_url", "http://demo.directorypress.net/directorypress_featured.gif");
//update_option("display_featured_image_link", "http://www.directorypress.net");
update_option("display_categories_count_inner", "yes");
// submit link
update_option("display_submit", "1");
update_option("display_listingLogin", "yes");
update_option("display_listing_status", "publish"); // do not remove

$FA = "";
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "PremiumPress";
$my_post['post_content'] 	= "PremiumPress design and develop quality, feature rich Premium Wordpress Themes for small, medium and large businesses.";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "12");	
add_post_meta($POSTID, "url", "http://www.premiumpress.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "yes");
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "ShopperPress";
$my_post['post_content'] 	= "ShopperPress is a fully featured shopping cart plugin for wordpress, suitable for selling any types of products, services, and digital downloads online.";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "9");	
add_post_meta($POSTID, "url", "http://www.shopperpress.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "yes");
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "DirectoryPress";
$my_post['post_content'] 	= "DirectoryPress is a fully featured directory theme for Wordpress, it allows you to turn your standard wordpress blog into a powerful online link directory.";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "8");	
add_post_meta($POSTID, "url", "http://www.directorypress.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "yes");
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "CouponPress";
$my_post['post_content'] 	= "CouponPress turns a normal Wordpress blog into a professional looking coupon code or voucher code website in minutes";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "7");	
add_post_meta($POSTID, "url", "http://www.couponpress.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "no");
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "ClassifiedsTheme";
$my_post['post_content'] 	= "Turn a standard Wordpress blog into a powerful, feature rich classifieds website easily with lots of great featured!";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "6");	
add_post_meta($POSTID, "url", "http://www.classifiedstheme.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "no");
// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "Mark Fail";
$my_post['post_content'] 	= "I am a e-commerce business professional and thriving entrepreneur specializing in niche market businesses, Wordpress Development and SEO advice.";
$my_post['post_excerpt'] 	= "This is an example search description for displaying this product";
$my_post['post_status'] 	= "publish";
$my_post['post_type'] 		= "post";
$my_post['post_category'] 	= array($bizID);
$my_post['tags_input'] 		= "tag1,tag2,United Kingdom";
$POSTID 					= wp_insert_post( $my_post );
$FA .= $POSTID.",";
add_post_meta($POSTID, "bid", "5");	
add_post_meta($POSTID, "url", "http://www.markfail.com");	
add_post_meta($POSTID, "hits", "0");	
add_post_meta($POSTID, "map_location", "New York");
add_post_meta($POSTID, "packageID", "1");
add_post_meta($POSTID, "featured", "no");
// featured
update_option("display_listbox_title", "Example Featured Websites");
update_option("display_listbox_items", $FA);
update_option("display_featuredbox", "0");
update_option("display_featuredbox_items",$FA);


/* ================ EXAMPLE ARTICLE ===================== */

// ADD NEW PRODUCTS
$my_post = array();
$my_post['post_title'] 		= "Example Website Article 1";
$my_post['post_content'] 	= "<h1>This is an example h1 title</h1> <h2>This is an example h2 title</h2> <h3>This is an example h3 title</h3> <br /> <p>This is an example paragraph of text added via the admin area.</p> <p>This is an example paragraph of text added via the admin area.</p> <p>This is an example paragraph of text added via the admin area.</p> <ul><li>example list item 1</li><li>example list item 2</li><li>example list item 3</li><li>example list item 4</li><li>example list item 5</li></ul> <p>This is an example paragraph with a link in it, click here to the <a href='http://www.premiumpress.com' title='premium wordpress themes'>premium wordpress themes website.</a></p>";
$my_post['post_excerpt'] 	= "This is an example article that you can create for your website just like any normal Wordpress blog post. You can use the 'image' custom field to attach a prewview picture also!";
$my_post['post_status'] 	= "publish";
$my_post['post_type'] 		= "article_type";
$my_post['post_category'] 	= array($ARTID);
$my_post['tags_input'] 		= "example tag1, example tag2";
$POSTID 					= wp_insert_post( $my_post );
add_post_meta($POSTID, "type", "article");	
add_post_meta($POSTID, "image", "article.jpg");	

$my_post = array();
$my_post['post_title'] 		= "Example Website Article 2";
$my_post['post_content'] 	= "<h1>This is an example h1 title</h1> <h2>This is an example h2 title</h2> <h3>This is an example h3 title</h3> <br /> <p>This is an example paragraph of text added via the admin area.</p> <p>This is an example paragraph of text added via the admin area.</p> <p>This is an example paragraph of text added via the admin area.</p> <ul><li>example list item 1</li><li>example list item 2</li><li>example list item 3</li><li>example list item 4</li><li>example list item 5</li></ul> <p>This is an example paragraph with a link in it, click here to the <a href='http://www.premiumpress.com' title='premium wordpress themes'>premium wordpress themes website.</a></p>";
$my_post['post_excerpt'] 	= "This is an example article that you can create for your website just like any normal Wordpress blog post. You can use the 'image' custom field to attach a prewview picture also!";
$my_post['post_status'] 	= "publish";
$my_post['post_type'] 		= "article_type";
$my_post['post_category'] 	= array($ARTID);
$my_post['tags_input'] 		= "example tag1, example tag2";
$POSTID 					= wp_insert_post( $my_post );
add_post_meta($POSTID, "type", "article");	
add_post_meta($POSTID, "image", "article.jpg");	

}
}

$pack = array (
	'1' => array (
		'enable' => '1',
		'name' => '<b>Free Listing</b> <br /> Package',
		'price' => '0',
	),
	'2' => array (
		'enable' => '1',
		'name' => '<b>Basic Listing</b> <br /> Package',
		'price' => '10',
		'expire' => '30',
		'rec' => '0',
		'a1' => '1',
		'a2' => '0',
		'a3' => '0',
	),
	'3' => array (
		'enable' => '1',
		'name' => '<b>Silver Listing</b> <br /> Package',
		'price' => '25',
		'expire' => '30',
		'rec' => '0',
		'a1' => '1',
		'a2' => '1',
		'a3' => '0',
	),
	'4' => array (
		'enable' => '1',
		'name' => '<b>Gold Listing</b> <br /> Package',
		'price' => '50',
		'expire' => '30',
		'rec' => '0',
		'a1' => '1',
		'a2' => '1',
		'a3' => '1',
		'a4' => '1',
	),
);

update_option("packages",$pack);	
update_option("pak_text","<h3>Introduce your package with a 'punchy' headline here!</h3><p>You can edit this description via the admin area and add <b>HTML code</b> also to make it look better.");	

// DEFAULT SETTINGS
update_option("theme", "directorypress-default"); // do not remove
update_option("language", "language_english"); // do not remove
update_option("copyright", "Your Copyright Text Here");
update_option("logo_url","");
update_option("display_previewimage_type","directory");

update_option("listbox_custom_title","Order Results By");	
update_option("footer_text","<h3>Welcome to our website!</h3><p><strong>Your introduction goes here!</strong><br /><strong>You can customize and edit this text via the admin area to create your own introduction text for your website.</strong></p><p>You can customize and edit this text via the admin area to create your own introduction text for your website.</p>  ");	

// ENABLE PAYPAL TEST
$cb = selfURL1().str_replace("wp-admin/","",str_replace("admin.php?page=setup","",str_replace("themes.php?activated=true","",$_SERVER['REQUEST_URI'])))."callback/";

update_option("gateway_paypal","yes");
update_option("paypal_email","example@paypal.com");
update_option("paypal_return",$cb);
update_option("paypal_cancel",$cb);
update_option("paypal_notify",$cb);
update_option("paypal_currency","USD");
?>