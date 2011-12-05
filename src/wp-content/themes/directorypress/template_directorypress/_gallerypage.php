<?php get_header();  ?>

<div class="middleSidebar left">
 

    <?php /*------------------------- TITLE AND ORDERBY BLOCK ----------------------------*/ ?>   
 
	<h1 class="categoryTitle"><?php if(isset($_GET['s'])){ echo SPEC($GLOBALS['_LANG']['_search3']).": ".strip_tags($_GET['s']); }elseif( isset($_GET['search-class'])) { echo SPEC($GLOBALS['_LANG']['_search3']).": ".strip_tags($_GET['cs-all-0']); }else{ echo $GLOBALS['premiumpress']['catName']; } ?></h1>
 
    <?php /*------------------------- ORDER BY BOX DISPLAY ----------------------------*/ ?>   
    
	<?php if($GLOBALS['query_total_num'] > 0 && !isset($GLOBALS['setflag_article']) && !isset($GLOBALS['tag_search']) && !isset($GLOBALS['setflag_faq']) ){  echo $PPTDesign->GL_ORDERBY(); } ?>	
    
    <br /><div class="clearfix"></div>
    
    <em><?php echo $GLOBALS['query_total_num']; ?> <?php echo SPEC($GLOBALS['_LANG']['_gal1']) ?></em>    
    
		<?php /*------------------------- CUSTOM CATEGORY TEXT AND IMAGE ----------------------------*/ ?>   
        
        <?php if(strlen($GLOBALS['catText']) > 1){ ?>
        
        <div class="customCatText" style="padding:10px; padding-left:0px;">
        
        <?php if(strlen($GLOBALS['catImage']) > 2){ ?><img src="<?php echo $GLOBALS['catImage']; ?>" style="float:left; padding-right:20px;" /><?php } ?>
                
        <?php echo $GLOBALS['catText']; ?>
        
        </div>
            
        <?php } ?>        
        
        <div class="clearfix"></div>
    
    
    <?php /*------------------------- sub CATEGORIES BLOCK ----------------------------*/ ?>   
    
    <?php if(isset($GLOBALS['premiumpress']['catID']) && is_numeric($GLOBALS['premiumpress']['catID']) && $PPT->CountCategorySubs($GLOBALS['premiumpress']['catID']) > 0 && get_option('display_sub_categories') =="middle" ){ ?>
    
    <div class="itembox">
    
        <h2 id="sidebar-cats-sub"><?php echo SPEC($GLOBALS['_LANG']['_gal2']) ?></h2>
        
        <div class="itemboxinner">
        
        <?php echo $ThemeDesign->HomeCategories(); ?>
        
        </div>
    
    
    </div>
        
    <?php } ?>
    
    
       
    <?php /*------------------------- DISPLAY GALLERY BLOCK ----------------------------*/ ?>
        
    <div id="SearchContent">  <br /> <div class="clearfix"></div> 
         
	<?php $PPTDesign->GALLERYBLOCK(); ?>
 
	<?php /*NO RESULTS FOUND*/
    
    if($GLOBALS['query_total_num'] == 0 && isset($GLOBALS['GALLERYPAGE']) ){ ?>
   
    <p><?php echo SPEC($GLOBALS['_LANG']['_gal3']) ?></p>
    
    <p><?php wp_tag_cloud('smallest=15&largest=40&number=50&orderby=count'); ?></p>
    
    <?php } ?> 
    
    </div>
    
    
    <?php /*------------------------- PAGE NAVIGATION BLOCK ----------------------------*/ ?>   
 
    <div class="clearfix"> </div><br />
    
	<?php if($GLOBALS['query_total_num'] > 0){ ?>
    
        <ul class="pagination paginationD paginationD10"> 
           
            <?php echo $PPTFunction->PageNavigation(); ?>
             			 
        </ul>
        
	<?php } ?>
 
	<div class="clearfix"> </div><br />
    
 
	<?php /*------------------------- LEFT ADVERTING BLOCK FOR 2 COLUMN LAYOUTS ----------------------------*/ ?>    

    
	<?php if($GLOBALS['premiumpress']['display_themecolumns'] !="3"){ if(get_option("advertising_left_checkbox") =="1"){ echo "<br /><br />".$PPT->Banner("left"); } } ?>
    



</div>


<?php get_footer(); ?>