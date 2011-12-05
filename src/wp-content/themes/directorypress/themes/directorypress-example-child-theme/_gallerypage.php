<?php
/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/

get_header(); ?>

<div class="middleSidebar left"> 


<?php echo example_function_name("_gallerypage.php"); ?>

	<h1 class="categoryTitle"><?php if(isset($_GET['s'])){ ?> <?php echo "Search: ".strip_tags($_GET['s']); ?> <?php }else{ echo $GLOBALS['premiumpress']['catName']; } ?></h1>
 
    <?php echo $PPTDesign->GL_ORDERBY(); ?>
    
    <br /><div class="clearfix"></div>
    
    <em><?php $allsearch = new WP_Query($query_string."&s=$s&showposts=-1");  echo $GLOBALS['query_total_num']; ?> <?php echo SPEC($GLOBALS['_LANG']['_gal1']) ?></em>    
    
	<?php  $STORETEXT =  $PPT->CategoryExtras($GLOBALS['premiumpress']['catID'],"text"); if(strlen($STORETEXT) > 1){  echo $STORETEXT;  }  ?>
  	
    
    
    
    
     <?php if(isset($GLOBALS['premiumpress']['catID']) && is_numeric($GLOBALS['premiumpress']['catID']) && $PPT->CountCategorySubs($GLOBALS['premiumpress']['catID']) > 0 && get_option('display_sub_categories') =="middle" ){ ?>
    
    <div class="itembox">
    
        <h2 id="sidebar-cats-sub"><?php echo SPEC($GLOBALS['_LANG']['_gal2']) ?></h2>
        
        <div class="itemboxinner">
        
        <?php echo $ThemeDesign->HomeCategories(); ?>
        
        </div>
    
    
    </div>
        
    <?php } ?>   
    
    
    
    
    
    
    
    
    <div id="SearchContent"> 
    <br />
    
    <div class="clearfix"></div>
    
    
    
    
    
	<?php 
					 
	// BUILD THE QUERY STRING
	$query_string = $PPT->BuildSearchString($query_string);	 $i = 0; $GLOBALS['counter'] = 1;
	
	if (have_posts()) : 
	
		while (have_posts()) : the_post(); 
		
		// CHECK IF THE LISTING HAS EXPIRED
        $PPT->CheckExpired($post->ID,$post->post_date);
		
		// CHECK IF THE LISTING NEEDS PRUNING
		$PPT->CheckPrune($post);	
		
		// CHECK FOR THE WEBSITE LINK
		$link = $PPT->CheckLink($post);			
		
		// FEATURED
		$featured 	= get_post_meta($post->ID, "featured", true);
		if($featured == ""){ update_post_meta($post->ID, "featured", "no"); }
		
		// LOAD SOME GLOBAL VALUES FOR DISPLAY
		$GLOBALS['directorypress']['vps'] 				= get_option("display_search_publisher");
		$GLOBALS['directorypress']['custom1'] 			= get_option("display_custom_value1");
		$GLOBALS['directorypress']['custom2'] 			= get_option("display_custom_value2");
		if($GLOBALS['directorypress']['custom1'] != ""){
		$custom1 		= get_post_meta($post->ID, $GLOBALS['directorypress']['custom1'], true);
		}
		if($GLOBALS['directorypress']['custom2'] != ""){
		$custom2 		= get_post_meta($post->ID, $GLOBALS['directorypress']['custom2'], true);
		}
		
		
								
		if(get_option('display_liststyle') =="gal"){ 
	
			if(file_exists(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme'].'/_item_gallery.php')){
							
				include(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme'].'/_item_gallery.php');
							
			}else{
						
				include("_item_gallery.php"); 
						
			}
						
		}else{ 
						
			if(file_exists(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme'].'/_item.php')){
							
				include(str_replace("functions/","",THEME_PATH)."/themes/".$GLOBALS['premiumpress']['theme'].'/_item.php');
							
			}else{
						
				include("_item.php"); 
						
			}
						
						
		}
					
	 ?>                    
              

	<?php $i++;  $GLOBALS['counter']++;  ?>
					 
	<?php endwhile; ?>
					 				
	<?php endif; ?>

	<?php /*NO RESULTS FOUND*/
    
    if(count($posts) == 0 && !is_home()){ ?>
   
    <p><?php echo SPEC($GLOBALS['_LANG']['_gal3']) ?></p>
    
    <p><?php wp_tag_cloud('smallest=15&largest=40&number=50&orderby=count'); ?></p>
    
    <?php } ?> 
    
    </div>
 
    <div class="clearfix"> </div>
    
	<?php if($GLOBALS['query_total_num'] > 0){ ?>
    
        <ul class="pagination paginationD paginationD10"> 
           
            <?php echo $PPTFunction->PageNavigation(); ?>
             			 
        </ul>
        
	<?php } ?>
 
	<div class="clearfix"> </div><br />
 
	<?php /*------------------------- LEFT ADVERTING BLOCK FOR 2 COLUMN LAYOUTS ----------------------------*/ ?>    

    
	<?php if($GLOBALS['premiumpress']['display_themecolumns'] !="3"){ if(get_option("advertising_left_checkbox") =="1"){ echo "<br /><br />".$PPT->Banner("left"); } } ?>
    

</div><!-- END Content -->



<?php get_footer(); ?>