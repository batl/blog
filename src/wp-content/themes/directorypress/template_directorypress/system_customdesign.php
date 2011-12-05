<?php

class Theme_Design { 

/******************************************************************* DEPRECIATED IN 6.3 (SEE PPT/CLASS/CLASS_DESING.PHP) */
function LAY_NAVIGATION(){

	global $PPTDesign;
	
	return $PPTDesign->LAY_NAVIGATION();
}
function SYS_PAGES(){

	global $PPTDesign;
	
	return $PPTDesign->SYS_PAGES();
}
/*************************************************************************************************/
 	
	
	function HomeCategories(){
	
		$SHOWCATCOUNT = get_option("display_categories_count");
		 
		$SHOW_SUBCATS = get_option("display_50_subcategories");
	
			if(is_home()){ 
	
				$Maincategories = get_categories('orderby='.get_option("display_homecats_orderby").'&pad_counts=1&use_desc_for_title=1&hide_empty=0&hierarchical=0&child_of=0&exclude='.str_replace("-","",$GLOBALS['premiumpress']['excluded_articles'])); 
					
			}elseif( isset($GLOBALS['premiumpress']['catID']) ){
			
			
				$arg= array();
				$arg['child_of'] = $GLOBALS['premiumpress']['catID'];
				$arg['hide_empty'] = false;
				$arg['pad_counts'] = 1;
				$arg['exclude'] = str_replace("-","",$GLOBALS['premiumpress']['excluded_articles']);
				$Maincategories = get_categories( $arg );
	 
				//$Maincategories = get_categories('orderby='.get_option("display_homecats_orderby").'pad_counts=1&use_desc_for_title=1&hierarchical=0&hide_empty=1&child_of='.$GLOBALS['premiumpress']['catID'].'&exclude='.); 
	  
			} 
	 
	
			if(isset($Maincategories)){
	
			$catlist=""; 
			$Maincatcount = count($Maincategories);	
	 
	
			if($Maincatcount > 0){ $catlist .= '<div class="homeCategories"><ul>';}
	 
				foreach ($Maincategories as $Maincat) { if(strlen($Maincat->name) > 1){ 
		 
		 
					if(is_home() && $Maincat->parent ==0){		
							
						$catlist .= '<li><span><a href="'.get_category_link( $Maincat->term_id ).'" title="'.$Maincat->category_nicename.'" style="font-size:16px; color:#454444;"><b>';
						$catlist .= $Maincat->name;
						if($SHOWCATCOUNT =="yes"){ $catlist .= " (".$Maincat->count.')</b></a></span>'; }else{ $catlist .= '</b></a></span>'; }
						//$catlist .= '</span></a>';		
	
							if($SHOW_SUBCATS == "yes"){
							
								$categories= get_categories('child_of='.$Maincat->cat_ID.'&amp;depth=1&hide_empty=0&exclude='.str_replace("-","",$GLOBALS['premiumpress']['excluded_articles'])); 
								$catcount = count($categories);	
								
							 	$stopShow=0;
								$currentcat=get_query_var('cat');	
								if(count($categories) > 0){
								$catlist .= '<div style="margin-left:10px; margin-bottom:30px;">';
									foreach ($categories as $cat) { if($stopShow < 3){
										$catlist .= '<a href="'.get_category_link( $cat->term_id ).'" title="'.$cat->cat_name.'" class="sm">';
										$catlist .= $cat->cat_name;
										//if(get_option("display_categories_count") =="yes"){ $catlist .= " (".$cat->count.")"; }
										$catlist .= '</a> ';
										} $stopShow++;
									}
									$catlist .= '</div>';
								}	 
								
							}
						
						 $catlist .= '</li>';
						
					} elseif(!is_home() && isset($GLOBALS['premiumpress']['catID']) && $Maincat->category_parent == $GLOBALS['premiumpress']['catID']){
			
						$catlist .= '<li><span><a href="'.get_category_link( $Maincat->term_id ).'" title="'.$Maincat->category_nicename.'" style="font-size:16px; color:#454444;"><b>';
						$catlist .= $Maincat->name;
						if($SHOWCATCOUNT =="yes"){ $catlist .= " (".$Maincat->count.')</b></a></span>'; }else{ $catlist .= '</b></a></span>'; }
						//$catlist .= '</span></a>';
						
							if($SHOW_SUBCATS == "yes"){
							
								$categories= get_categories('child_of='.$Maincat->cat_ID.'&amp;depth=1&hide_empty=0&exclude='.str_replace("-","",$GLOBALS['premiumpress']['excluded_articles'])); 
								$catcount = count($categories);	
								
							 
								$currentcat=get_query_var('cat');	
								if(count($categories) > 0){
								$catlist .= '<div style="margin-left:10px; margin-bottom:30px;">';
									foreach ($categories as $cat) {
										$catlist .= '<a href="'.get_category_link( $cat->term_id ).'" class="sm">';
										$catlist .= $cat->cat_name;
										//if(get_option("display_categories_count") =="yes"){ $catlist .= " (".$cat->count.")"; }
										$catlist .= '</a> ';
									}
									$catlist .= '</div>';
								}	 
								
							}					
						
						
						
						
						$catlist .= '</li>';
			
					}
				}
			}
		
	
			if($Maincatcount > 0){ $catlist .= '</ul><div class="clearfix"></div></div>'; }
	
			echo $catlist;
	
			}	
		 
	
	}
	
	
	function SINGLE_CUSTOMFIELDS($post,$FieldValues){

	global $wpdb,$PPT;$row=1;

	if($FieldValues ==""){ 
		$FieldValues = get_option("customfielddata");
	}

	if(is_array($FieldValues)){ 

		foreach($FieldValues as $key => $field){

			if(isset($field['show']) && $field['enable'] == 1 ){ 				 
			
			$imgArray = array('jpg','gif','png');

			$value = $PPT->GetListingCustom($post->ID,$field['key'] );
 
			if(is_array($value) || strlen($value) < 1){   }else{			
		
				print "<div class='full clearfix border_t box'><p class='f_half left'><br />"; 
				print "<b>".$field['name']."</b></p><p class='f_half left'><br />";
		
				switch($field['type']){
				 case "textarea": {			
					print "<br />".nl2br(stripslashes($value));
				 } break;
				 case "list": {
					print  $value;
				 } break;
				 default: {
					
					$pos = strpos($value, 'http://'); 					
					if($field['key'] == "skype"){
						print "<a href='skype:".$value."?add'>" .  $value ."</a>";
					}elseif ($pos === false) {
						print  $value;
					}elseif(in_array(substr($value,-3),$imgArray)){
						print "<img src='".strip_tags($value)."' style='max-width:250px;margin-left:20px;'>";
					}else{
						print "<a href='".$value."' target='_blank'";
						if($GLOBALS['premiumpress']['nofollow'] =="yes"){ print 'rel="nofollow"'; }
						print ">" .  $value ."</a>";				
					} 
					
				 }
		
				}
				$row++;
				print "</p></div>";
				
				}

				} 
			}
		}
	
	}	
		
		
		
		 function SINGLE_IMAGEGALLERY($images){	
	 
	 global $PPT;
	 
	 if($images == ""){ return; } 
	 
	 
		$imgBits = explode("/",get_permalink());	
		$tt = count($imgBits)-2; $it=0;
		
		while($tt > 0){  
			$imagePath .= $imgBits[$it]."/";
			$tt--;$it++;		 
		 }
			 
		 $string = "";
		 $image_array = explode(",",$images); 
	
			foreach($image_array as $image){ $image = trim($image); if(strlen($image) > 2){ 
			 
				switch(substr($image,-3)){
						
					case "pdf": {
							$class="";
							$pic1 = "".$imagePath."wp-content/themes/".strtolower(PREMIUMPRESS_SYSTEM)."/PPT/img/icon-pdf.gif";
							
					} break;
							
					case "": {
							
					} break;	
							
					default: {
							$pic1 = $image;
							$class='class="lightbox"';
					}			
						
				}
				
				$string .= '<a '.$class.' href="'.$PPT->ImageCheck($image,"t","&amp;w=400").'" rel="group"><img class="small" src="'.$PPT->ImageCheck($pic1,"t","&amp;w=150").'" alt="img" /></a>';
				
				
				
			} }	
			
			return $string;
	 
	 }
	
 
}	



/* ============================= PREMIUM PRESS REGISTER WIDGETS ========================= */
 

if ( function_exists('register_sidebar') ){


register_sidebar(array('name'=>'Right Sidebar',
	'before_widget' => '<div class="itembox">',
	'after_widget' 	=> '</div></div>',
	'before_title' 	=> '<h2>',
	'after_title' 	=> '</h2><div class="itemboxinner widget">',
));

register_sidebar(array('name'=>'Left Sidebar (3 Column Layouts Only)',
	'before_widget' => '<div class="itembox">',
	'after_widget' 	=> '</div></div>',
	'before_title' 	=> '<h2>',
	'after_title' 	=> '</h2><div class="itemboxinner widget">',
));

register_sidebar(array('name'=>'Listing Page Sidebar',
	'before_widget' => '<div class="itembox">',
	'after_widget' 	=> '</div></div>',
	'before_title' 	=> '<h2>',
	'after_title' 	=> '</h2><div class="itemboxinner widget">',
));

register_sidebar(array('name'=>'Pages Sidebar',
	'before_widget' => '<div class="itembox">',
	'after_widget' 	=> '</div></div>',
	'before_title' 	=> '<h2>',
	'after_title' 	=> '</h2><div class="itemboxinner widget">',
));

register_sidebar(array('name'=>'Article/FAQ Page Sidebar',
	'before_widget' => '<div class="itembox">',
	'after_widget' 	=> '</div></div>',
	'before_title' 	=> '<h2>',
	'after_title' 	=> '</h2><div class="itemboxinner widget">',
));
  
} 
 
 
 
 
 
 /* ============================= OLD DIRECTORYPRESS FUNCTIONS ========================= */

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


 

function CheckTrackingID($tracking_id=""){ 

	global $wpdb;

	$SQL = "SELECT count($wpdb->postmeta.meta_key) AS total
			FROM $wpdb->postmeta
			WHERE $wpdb->postmeta.meta_key='tracking_id' AND $wpdb->postmeta.meta_value = '".$tracking_id."'
			LIMIT 1";
 
 	$result = mysql_query($SQL);
	$array = mysql_fetch_assoc($result);

	return $array['total'];

}



function checkDomainAvailability($domain){

$arWhoisServer = array(
    'com'         => array('whois.crsnic.net', 'No match for'),
	    'gov'         => array('whois.crsnic.net', 'No match for'),
    'net'         => array('whois.crsnic.net', 'No match for'),   
    'org'         => array('whois.pir.org', 'NOT FOUND'),
    'biz'         => array('whois.biz', 'Not found'),
    'mobi'        => array('whois.dotmobiregistry.net', 'NOT FOUND'),
    'tv'         => array('whois.nic.tv', 'No match for'),
    'in'         => array('whois.inregistry.net', 'NOT FOUND'),
    'info'         => array('whois.afilias.net', 'NOT FOUND'),   
    'co.uk'     => array('whois.nic.uk', 'No match'),       
    'co.ug'     => array('wawa.eahd.or.ug', 'No entries found'),   
    'or.ug'     => array('wawa.eahd.or.ug', 'No entries found'),
    'nl'         => array('whois.domain-registry.nl', 'not a registered domain'),
    'ro'         => array('whois.rotld.ro', 'No entries found for the selected'),
    'com.au'    => array('whois.ausregistry.net.au', 'No data Found'),
    'ca'         => array('whois.cira.ca', 'AVAIL'),
    'org.uk'    => array('whois.nic.uk', 'No match'),
    'name'         => array('whois.nic.name', 'No match'),
    'us'         => array('whois.nic.us', 'Not Found'),
    'ac.ug'     => array('wawa.eahd.or.ug', 'No entries found'),
    'ne.ug'     => array('wawa.eahd.or.ug', 'No entries found'),
    'sc.ug'     => array('wawa.eahd.or.ug', 'No entries found'),
    'ws'        => array('whois.website.ws', 'No Match'),
    'be'         => array('whois.ripe.net', 'No entries'),
    'com.cn'     => array('whois.cnnic.cn', 'no matching record'),
    'net.cn'     => array('whois.cnnic.cn', 'no matching record'),
    'org.cn'     => array('whois.cnnic.cn', 'no matching record'),
    'no'        => array('whois.norid.no', 'no matches'),
    'se'         => array('whois.nic-se.se', 'No data found'),
    'nu'         => array('whois.nic.nu', 'NO MATCH for'),
    'com.tw'     => array('whois.twnic.net', 'No such Domain Name'),
    'net.tw'     => array('whois.twnic.net', 'No such Domain Name'),
    'org.tw'     => array('whois.twnic.net', 'No such Domain Name'),
    'cc'         => array('whois.nic.cc', 'No match'),
    'nl'         => array('whois.domain-registry.nl', 'is free'),
    'pl'         => array('whois.dns.pl', 'No information about'),
    'pt'         => array('whois.dns.pt', 'No match'),
    '.co.nz'         => array('whois.dns.pt', 'No match'),
	'.edu'         => array('whois.edu', 'No match'),
	'.co.il'         => array('whois.edu', 'No match'),
		'.org.il'         => array('whois.edu', 'No match'),	
		'uk'         => array('whois.edu', 'No match'),
'ie'         => array('whois.edu', 'No match'),
); 
    

    // Get the domain without http:// and www.
    $domain = trim($domain);
    preg_match('@^(http://www\.|http://|www\.)?([^/]+)@i', $domain, $matches);
    $domain = $matches[2];
    // Get the tld
    $tld = explode('.', $domain);
	 
	if(isset($tld[2])){
	$tld = strtolower(trim($tld[2]));
	}else{
	$tld = strtolower(trim($tld[1]));
	}
    
	//die($tld." -- ".$domain);
    // If the domain name is valid and we have an entry corresponding to our tld
    if(strlen($domain) <= strlen($tld) + 1){

          return '(Invalid Domain) <b style="color:red;">'.$domain.'</b>';

	}elseif(!array_key_exists($tld, $arWhoisServer)){

		return '(Invalid TLD) <b style="color:red;">'.$domain.'</b>';

    }else{

		return 1;

    }
}
 


 


 


if(!function_exists('fetch_URL')){
function fetch_URL($URL)
{

$URL = str_replace("http://http://","http://",$URL);
	$handle = @fopen ($URL, "r");
	if ($handle === false) return false;

	$buffer = "";
	while (!feof ($handle)) {
	    $buffer .= fgets($handle, 4096);
	}
	fclose ($handle);

	return $buffer;
}}


 


	/*
	
	Comment: This function is used to generate the pages on the top navigation bar

	*/


 
 
 function Directory_CatList($id=0,$showExtraPrice){
 
 $SHOWCATSID = get_option("display_categories_count_inner");
 $CCode = get_option("currency_code");

		$catlist="";
 		$Maincategories = get_categories('use_desc_for_title=1&hide_empty=0&hierarchical=0&exclude='.str_replace("-","",$GLOBALS['premiumpress']['excluded_articles']));		
		$Maincatcount = count($Maincategories);	 
		foreach ($Maincategories as $Maincat) { 
		if($Maincat->parent ==0){
		
			if(strlen($Maincat->cat_name) > 1){		


			if($showExtraPrice == 1){ $price  = get_option('CatPrice_'.$Maincat->cat_ID); }else{ $price  = ""; }
			if($price == ""){ $extra1 = ""; }else{ $extra1 = " + ".$CCode.$price; }			
 
 
			if($id == $Maincat->cat_ID){ $extra="selected"; }else{ $extra=""; }

			$catlist .= '<option value="'.$Maincat->cat_ID.'" '.$extra.'>';
			$catlist .= $Maincat->cat_name;
			if($SHOWCATSID == "yes"){ $catlist .= " (".$Maincat->count.')'; }
			$catlist .= $extra1."";
			$catlist .=  '</option>';
				
				$currentcat=get_query_var('cat');
				$categories= get_categories('child_of='.$Maincat->cat_ID.'&amp;depth=1&hide_empty=0'); 
				$catcount = count($categories);		
				$i=1;
 
				if(count($categories) > 0){
				$catlist .="<ul>";
					foreach ($categories as $cat) {		
					
					if($showExtraPrice == 1){ $price  = get_option('CatPrice_'.$cat->cat_ID); }else{ $price  = ""; }
					if($price == ""){ $extra1 = ""; }else{ $extra1 = " + ".$CCode.$price; }	

					 if($cat->cat_ID == $id){ $extra ="selected"; }else{ $extra =""; }

						$catlist .= '<option value="'.$cat->cat_ID.'" '.$extra.'> ---> ';
						$catlist .= $cat->cat_name;
						$catlist .= $extra1.'</option>';
						 
						$i++;		
					}
				 
				}		
		} }
 }

return $catlist;

}
 

 
?>