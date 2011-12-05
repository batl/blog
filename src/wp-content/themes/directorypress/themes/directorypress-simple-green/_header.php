<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?></title>    

<?php wp_head(); ?>

</head> 

<body <?php ppt_body_class(); ?>>
 
	<div class="wrapper w_960"> 
	
		<div id="header" class="full">
        
            <div class="f_half left" id="logo"> 
            
                 <a href="<?php echo $GLOBALS['bloginfo_url']; ?>/" title="<?php bloginfo('name'); ?>">
                 
                    <img src="<?php echo $PPT->Logo(); ?>" alt="<?php bloginfo('name'); ?>" />
                    
                 </a>
            
            </div>        
        
            <div class="left padding5" id="banner"> 
            
           	 <?php echo $PPT->Banner("top"); ?>
             
            </div>        
        
       		<div class="clearfix"></div>
        
        </div> 

        <div class="full">
    
        
        <div id="submenubar"> 

       
            <form method="get"  action="<?php echo $GLOBALS['bloginfo_url']; ?>/" name="searchBox" id="searchBox">
              <table width="100%" border="0" id="SearchForm">
              <tr>
                <td><input type="text" value="<?php echo SPEC($GLOBALS['_LANG']['_head1']) ?>" name="s" id="s" onfocus="this.value='';"/></td>
                <td><select id="catsearch" name="cat"><option value="">&nbsp;</option><?php echo $PPT->CategoryList(0,'toponly'); ?></select></td>
                <td><div class="searchBtn" onclick="document.searchBox.submit();"> &nbsp;</div> </td>
                <td>&nbsp;&nbsp;<?php if(get_option("display_advanced_search") ==1){ ?><a href="javascript:void(0);" onClick="jQuery('#AdvancedSearchBox').show();" class="white"><small><?php echo SPEC($GLOBALS['_LANG']['_head2']) ?></small></a><?php } ?></td>
              </tr>
            </table>
            </form>
     
             
            <ul class="submenu_account">            
            <?php  if ( $user_ID ){ ?>
            <li><a href="<?php echo wp_logout_url(); ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head3']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head3']) ?></a></li>
            <li><a href="<?php echo $GLOBALS['premiumpress']['dashboard_url']; ?>" title="<?php echo SPEC($GLOBALS['_LANG']['_head4']) ?>"><?php echo SPEC($GLOBALS['_LANG']['_head4']) ?></a></li>
            <li><b><?php echo $current_user->user_login; ?></b></li>
            <?php  }else{ ?>
            
            <li><a href="<?php echo $GLOBALS['bloginfo_url']; ?>/wp-login.php" title="<?php echo SPEC($GLOBALS['_LANG']['_head5']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head5']) ?></a> |  <a href="<?php echo $GLOBALS['bloginfo_url']; ?>/wp-login.php?action=register" title="<?php echo SPEC($GLOBALS['_LANG']['_head6']) ?>" rel="nofollow"><?php echo SPEC($GLOBALS['_LANG']['_head6']) ?></a></li>
            
            <?php } ?>
            </ul> 
            
            <a href="<?php echo $GLOBALS['premiumpress']['submit_url']; ?>" id="submitButton" title="add directory"><img src="<?php echo $GLOBALS['template_url']; ?>/themes/<?php echo $GLOBALS['premiumpress']['theme']; ?>/images/submitlisting.png" alt="add directory" /></a> 
        
        </div>
        
        
        </div>
        
 
		<div id="page" class="clearfix full">
        
        
        <?php if(get_option("display_advanced_search") ==1 ){  PPT_AdvancedSearch('preset-default');  } ?>
 
  
		<?php if(get_option("PPT_slider") =="s1"  && is_home() && !isset($_GET['s']) && !isset($_GET['search-class']) ){ echo $PPTDesign->SLIDER(); } ?> 
         
         
        
        <div id="content">


		<?php
 
            if($GLOBALS['premiumpress']['display_themecolumns'] =="3" && !isset($GLOBALS['nosidebar']) && !isset($GLOBALS['nosidebar-left']) ){
			
				include(str_replace("functions/","",THEME_PATH)."/template_directorypress/_sidebar1.php");
			
			
			}
        
        ?>