<?php 

 
 

global $PPT,$PPTDesign;
PremiumPress_Header(); ?>

<div id="premiumpress_box1" class="premiumpress_box premiumpress_box-100"><div class="premiumpress_boxin"><div class="header">
<h3><img src="<?php echo PPT_FW_IMG_URI; ?>/admin/_ad_1.png" align="middle"> Display Setup</h3>	 <a class="premiumpress_button" href="javascript:void(0);" onclick="PPHelpMe()">Help Me</a>  						 
<ul>
	<li><a rel="premiumpress_tab1" href="#" class="active">Layout</a></li>
	<li><a rel="premiumpress_tab6" href="#">Home</a></li>
	<li><a rel="premiumpress_tab2" href="#">Search</a></li>
    <li><a rel="premiumpress_tab3" href="#">Sidebar</a></li>
    <li><a rel="premiumpress_tab4" href="#">Listing</a></li> 
 
     <li><a rel="premiumpress_tab5" href="#">Sliders</a></li>     
</ul>
</div>
<style>
select { border-radius: 0px; -webkit-border-radius: 0px; -moz-border-radius: 0px; }
</style>


 
<div id="DisplayImages" style="display:none;"></div><input type="hidden" id="searchBox1" name="searchBox1" value="" />


<form method="post" name="directorypress" target="_self" >
<input name="admin_page" type="hidden" value="directorypress_setup" />

<input name="submitted" type="hidden" value="yes" />
<input name="setup" type="hidden" value="1" />
<input name="featured" type="hidden" value="1" />
<input name="featured1" type="hidden" value="1" />
<input name="listbox" type="hidden" value="yes" />

<div id="premiumpress_tab1" class="content">
<table class="maintable" style="background:white;">

<tr class="mainrow"><td></td><td class="forminp">

<b>Select theme layout (2 or 3 columns)</b>

<table width="100%" border="1">
  <tr>
    <td style="width:150px;"><img src="<?php echo $GLOBALS['template_url']; ?>/PPT/img/layout2.gif" /><br /><center>
    <input name="display_themecolumns" type="radio" value="2" <?php if(get_option("display_themecolumns") =="2" || get_option("display_themecolumns") =="" ){ print "checked";} ?> />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></td>
    <td style="width:150px;"><img src="<?php echo $GLOBALS['template_url']; ?>/PPT/img/layout3.gif" /><br /><center>
    <input name="display_themecolumns" type="radio" value="3" <?php if(get_option("display_themecolumns") =="3"){ print "checked";} ?>  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
 
    
    </td>
  </tr>
</table> 

	 
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a22.png"></td></tr>



<tr class="mainrow"><td colspan="3">
<center><a href="widgets.php"><img src="<?php echo $GLOBALS['template_url']; ?>/template_directorypress/images/help1/a23.png"></a></center>
</td> <tr>

<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p></td>
</tr>

</table>
</div>

<div id="premiumpress_tab6" class="content">
<table class="maintable" style="background:white;">

 

 

<tr class="mainrow"><td></td><td class="forminp">

        <b>Home Page Image</b>
        
        <p style="width: 240px;"><input type="checkbox" class="checkbox" name="display_featured_image_enable" value="1" <?php if(get_option("display_featured_image_enable") =="1"){ print "checked";} ?> /> Enable Featured Image</p><br />
        <small>Add your own image to the front page</small>
       <?php if(get_option("display_featured_image_enable") =="1"){ ?> 
        
        <b>Featured Image URL</b><br />
        
        <input name="adminArray[display_featured_image_url]" type="text" style="width: 240px;  font-size:14px;" value="<?php echo get_option("display_featured_image_url"); ?>" /><br />
		<small>Enter the full URL for the image you would like to display.</small>
        
        
        <br /><b>Featured Image Link URL</b><br />
        
		<input name="adminArray[display_featured_image_link]" type="text" style="width: 240px;  font-size:14px;" value="<?php echo get_option("display_featured_image_link"); ?>" /><br />
		<small>Enter the link you would like to have when someone clicks on the image.</small>

		<?php } ?>
	 
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a0.png"></td></tr>

<?php /***************************************** */ ?>

<tr class="mainrow"><td></td><td class="forminp">

<p><b>Website Categories Box</b></p>
<select name="adminArray[display_homecats]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_homecats") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_homecats") =="no"){ print "selected";} ?>>Hide</option>
		  </select><br />
			<small>Show/Hide the home page categories area.</small> 

</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a1.png"></td></tr>
    
    
<?php /***************************************** */ ?>

<?php if(get_option("display_homecats") =="yes"){ ?>
    
    <tr class="mainrow"><td></td><td class="forminp">
    
    <p><b>Order Categories By </b></p>
    <select name="adminArray[display_homecats_orderby]" style="width: 240px;  font-size:14px;">
    
                    <option value="id" <?php if(get_option("display_homecats_orderby") =="id"){ print "selected";} ?>>ID (Ascending Order)</option>
                    <option value="id&order=desc" <?php if(get_option("display_homecats_orderby") =="id&order=desc"){ print "selected";} ?>>ID (Descending Order)</option>
                    
                    <option value="name" <?php if(get_option("display_homecats_orderby") =="name"){ print "selected";} ?>>Name (Ascending Order)</option>
                    <option value="name&order=desc" <?php if(get_option("display_homecats_orderby") =="name&order=desc"){ print "selected";} ?>>Name (Descending Order)</option>
                    
                    <option value="slug" <?php if(get_option("display_homecats_orderby") =="slug"){ print "selected";} ?>>Slug (Ascending Order)</option>
                    <option value="slug&order=desc" <?php if(get_option("display_homecats_orderby") =="slug&order=desc"){ print "selected";} ?>>Slug (Descending Order)</option>
    
                    <option value="count" <?php if(get_option("display_homecats_orderby") =="count"){ print "selected";} ?>>Count (Ascending Order)</option>
                    <option value="count&order=desc" <?php if(get_option("display_homecats_orderby") =="count&order=desc"){ print "selected";} ?>>Count (Descending Order)</option>
    
                   <!-- <option value="group" <?php if(get_option("display_homecats_orderby") =="group"){ print "selected";} ?>>Group (Ascending Order)</option>
                    <option value="group&order=desc" <?php if(get_option("display_homecats_orderby") =="group&order=desc"){ print "selected";} ?>>Group (Descending Order)</option>-->
                       
                                    
          </select><br />
                <small>select in what order to display the categories.</small> 
                
    </td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a2.png"></td></tr>
    
        
    <?php /***************************************** */ ?>
        
        <tr class="mainrow">
             <td></td>
            <td class="forminp">
            <p><b>Display Sub Categories</b></p>			
                <select name="adminArray[display_50_subcategories]" style="width: 240px;  font-size:14px;">
                    <option value="yes" <?php if(get_option("display_50_subcategories") =="yes"){ print "selected";} ?>>Show</option>
                    <option value="no" <?php if(get_option("display_50_subcategories") =="no"){ print "selected";} ?>>Hide</option>
                </select><br />
                <small>Show/Hide the list of sub categories under the main category link.</small> 
                
    </td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a3.png"></td></tr>
         
         
<?php } ?>

<?php /***************************************** */ ?>

<tr class="mainrow"><td></td>
<td class="forminp">
<p><b>Recently Added Listings</b></p>

			<select name="adminArray[display_homerecently]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_homerecently") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_homerecently") =="no"){ print "selected";} ?>>Hide</option>
			</select><br />
			<small>Show/Hide the home page recently added listings box.</small> 

</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a4.png"></td></tr>
 
<?php /***************************************** */ ?> 
 

  

 
   <?php  $t=0; while($t < 4){ ?>
   
 <tr class="mainrow"><td></td><td class="forminp">  
    
<p><b>Enable Customizable Box <?php echo $t+1; ?></b></p>
 
<select name="adminArray[home_custombox_<?php echo $t; ?>]" style="width: 240px;  font-size:14px;">
	<option value="yes" <?php if(get_option("home_custombox_".$t) =="yes"){ print "selected";} ?>>Yes, show this box</option>
	<option value="no" <?php if(get_option("home_custombox_".$t) =="no" || get_option("home_custombox_".$t) ==""){ print "selected";} ?>>No, hide it</option>
</select><br />

 <?php if(get_option("home_custombox_".$t) =="yes"){ ?>
 
     <p><b>Box Title</b></p>
    <input name="adminArray[home_custombox_<?php echo $t; ?>_title]" type="text" style="width: 240px;  font-size:14px;" value="<?php echo get_option("home_custombox_".$t."_title"); ?>" /><br />
  
    
    <p><b>Box Width</b></p>
     
    <select name="adminArray[home_custombox_<?php echo $t; ?>_width]" style="width: 240px;  font-size:14px;">
        <option value="half" <?php if(get_option("home_custombox_".$t."_width") =="half"){ print "selected";} ?>>Split Width (50%)</option>
        <option value="full" <?php if(get_option("home_custombox_".$t."_width") =="full"){ print "selected";} ?>>Full Width (100%)</option>
    </select><br />
    
    <p><b>Box Content</b></p>
     
    <select name="adminArray[home_custombox_<?php echo $t; ?>_content]" style="width: 240px;  font-size:14px;">
    <option value="" <?php if(get_option("home_custombox_".$t."_content") ==""){ print "selected";} ?>>-------------</option> 
        <option value="html" <?php if(get_option("home_custombox_".$t."_content") =="html"){ print "selected";} ?>>HTML Content - Add my own text</option> 
        <option value="featured1" <?php if(get_option("home_custombox_".$t."_content") =="featured1"){ print "selected";} ?>>Featured List - featured websites</option> 
        <option value="featured2" <?php if(get_option("home_custombox_".$t."_content") =="featured2"){ print "selected";} ?>>Featured List - recently added websites</option> 
        <option value="featured3" <?php if(get_option("home_custombox_".$t."_content") =="featured3"){ print "selected";} ?>>Featured List - let me choose</option> 
        <option value="articles" <?php if(get_option("home_custombox_".$t."_content") =="articles"){ print "selected";} ?>>Latest Articles</option> 
    </select><br />
      
    <?php if(get_option("home_custombox_".$t."_content") =="html"){ ?>
     <p><b>HTML Description</b></p>
    <textarea name="adminArray[home_custombox_<?php echo $t; ?>_html]" type="text" style="width:240px;height:250px;"><?php echo stripslashes(get_option("home_custombox_".$t."_html")); ?></textarea>
     
     <?php } ?>
     
    <?php if(get_option("home_custombox_".$t."_content") =="featured3"){ ?>
     <p><b>Enter the POST ID for your selected websites.</b></p>
    <input name="adminArray[home_custombox_<?php echo $t; ?>_featured3]" type="text" style="width:240px;font-size:14px;;" value="<?php echo (get_option("home_custombox_".$t."_featured3")); ?>" />
     
     <?php } ?>	 
	 <?php } ?><hr />
     
</td><td class="forminp" valign="top"><img src="<?php echo IMAGE_PATH; ?>/help1/a<?php if(get_option("home_custombox_".$t) =="yes"){ echo "6"; }else{ echo 5;}?>.png"></td></tr>
 <?php $t++; } ?>
            


 







  
  
  
  <?php /***************************************** */ ?>

<tr class="mainrow"><td></td>
<td class="forminp">
<p><b>Footer Text</b></p>
<textarea name="adminArray[footer_text]" type="text" style="width:240px;height:150px;"><?php echo stripslashes(get_option("footer_text")); ?></textarea><br />
<small>This will be added to the bottom of your website.</small>
        
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a16.png"></td></tr>
  
 <?php /***************************************** */ ?> 
  
  
 

 

 

<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p></td>
</tr>
</table>

 

 
 
</div>            










<div id="premiumpress_tab2" class="content">
<table class="maintable" style="background:white;">
 



    
    
<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Search Display Style</b></p>
		<select name="adminArray[display_liststyle]" style="width: 240px;  font-size:14px;">
          <option value="list" <?php if(get_option("display_liststyle") =="list"){ print "selected";} ?> >List View</option>
          <option value="gal" <?php if(get_option("display_liststyle") =="gal"){ print "selected";} ?>>Gallery View</option>
        </select>
          <br />
          <small>Select your display view. </small>
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a11.png"></td></tr>

  <?php /***************************************** */ ?>  
   

<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Show Comments</b></p>
		<select name="adminArray[display_search_comments]" style="width: 240px;  font-size:14px;">
          <option value="yes" <?php if(get_option("display_search_comments") =="yes"){ print "selected";} ?> >Yes</option>
          <option value="no" <?php if(get_option("display_search_comments") =="no"){ print "selected";} ?>>No</option>
        </select>
          <br />
          <small>Show/Hide the comments box on the search pages. </small>
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a12.png"></td></tr>     



<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Show Publisher Link</b></p>
		<select name="adminArray[display_search_publisher]" style="width: 240px;  font-size:14px;">
          <option value="yes" <?php if(get_option("display_search_publisher") =="yes"){ print "selected";} ?> >Yes</option>
          <option value="no" <?php if(get_option("display_search_publisher") =="no"){ print "selected";} ?>>No</option>
        </select>
          <br />
          <small>Show/Hide the comments box on the search pages. </small>
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a17.png"></td></tr>     

<?php /***************************************** */ ?>  
    
    <!--
<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Allow Duplicate Featured Listings</b></p>
		<select name="adminArray[display_50_featured_twice]" style="width: 240px;  font-size:14px;">
          <option value="yes" <?php if(get_option("display_50_featured_twice") =="yes"){ print "selected";} ?> >Yes</option>
          <option value="no" <?php if(get_option("display_50_featured_twice") =="no"){ print "selected";} ?>>No</option>
        </select>
          <br />
          <small>By default, all featured listings are displayed twice, once at the top and once again during the normal search results, you can disable this here if you only want them to display once at the top and not in normal listings. </small>
          
          
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a13.png"></td></tr>  

-->

<?php /***************************************** */ ?>  


<tr class="mainrow"><td></td><td class="forminp">

<p><b>Custom Text 1</b></p>
<input type="text" name="adminArray[display_custom_display1]" value="<?php echo get_option("display_custom_display1"); ?>" style="width: 200px;  font-size:14px;" class="txt"> <br />
 			
<p><b>Custom Key 1</b></p>

<select name="adminArray[display_custom_value1]" style="width: 200px;  font-size:14px;" ><option value="">--hide field---</option><?php echo $PPT->GetCustomFieldList(get_option("display_custom_value1")); ?></select> <br />
 

<p><b>Custom Text 2</b></p>
<input type="text" name="adminArray[display_custom_display2]" value="<?php echo get_option("display_custom_display2"); ?>" style="width: 200px;  font-size:14px;" class="txt"> <br />
			
<p><b>Custom Key 2</b></p>
<select name="adminArray[display_custom_value2]" style="width: 200px;  font-size:14px;" ><option value="">--hide field---</option><?php echo $PPT->GetCustomFieldList(get_option("display_custom_value2")); ?></select> <br />
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a14.png"><br /><br /><br /><img src="<?php echo IMAGE_PATH; ?>/help1/a15.png"></td></tr>  
 
 
 
 
<tr>
<td colspan="4"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p></td>
</tr>

</table>
</div>


<div id="premiumpress_tab3" class="content">
<table class="maintable" style="background:white;">



<?php /***************************************** */ ?> 
 


 	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b>Display Recent Articles</b></p>						
			<select name="adminArray[display_sidebar_articles]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_sidebar_articles") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_sidebar_articles") =="no"){ print "selected";} ?>>Hide</option>
			</select><br /><small>Show/Hide the sidebar articles box.</small> <br />
			<input name="adminArray[display_sidebar_articles_count]" value="<?php echo get_option("display_sidebar_articles_count"); ?>" class="txt" style="width:50px; font-size:14px;" type="text"> # Articles


</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a7.png"></td></tr>
    
 <?php /***************************************** */ ?> 
 

   
 
	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b>Display Categories</b></p>			
				
			<select name="adminArray[display_categories]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_categories") =="yes"){ print "selected";} ?>>Show</option>
                <?php if(get_option("display_themecolumns") =="3"){ ?><option value="yesleft" <?php if(get_option("display_categories") =="yesleft"){ print "selected";} ?>>Show - Left Sidebar</option><?php } ?>
				<option value="no" <?php if(get_option("display_categories") =="no"){ print "selected";} ?>>Hide</option>
                
			</select><br />
            
            <p><b>Display on which pages</b></p>
 
            <select name="adminArray[display_categories_pages]" style="width: 240px;  font-size:14px;">
				<option value="0" <?php if(get_option("display_categories_pages") =="0"){ print "selected";} ?>>All Pages</option>
				<option value="no-single" <?php if(get_option("display_categories_pages") =="no-single"){ print "selected";} ?>>All BUT Single Pages</option>
                <option value="no-home" <?php if(get_option("display_categories_pages") =="no-home"){ print "selected";} ?>>All BUT Home Page</option>
                <option value="no-page" <?php if(get_option("display_categories_pages") =="no-page"){ print "selected";} ?>>All BUT Pages</option>
                <option value="no-listing" <?php if(get_option("display_categories_pages") =="no-listing"){ print "selected";} ?>>All BUT Listing Page</option>
			</select><br />
			<small>Show/Hide the category box on the right menu.</small>  
            
            
		<p><b>SUB Categories</b></p>			
				
			<select name="adminArray[display_sub_categories]" style="width: 240px;  font-size:14px;">
				<option value="right" <?php if(get_option("display_sub_categories") =="right"){ print "selected";} ?>>Show - Right Sidebar</option>
                <?php if(get_option("display_categories") =="left"){ ?><option value="left" <?php if(get_option("display_categories") =="left"){ print "selected";} ?>>Show - Left Sidebar</option><?php } ?>
                <option value="middle" <?php if(get_option("display_sub_categories") =="middle"){ print "selected";} ?>>Show - Middle Section</option>
				<option value="no" <?php if(get_option("display_sub_categories") =="no"){ print "selected";} ?>>Hide</option>
                
			</select><br />

</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a8.png"></td></tr>
    
 <?php /***************************************** */ ?> 



 	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b>Display Tabbed Categories</b></p>			
			<select name="adminArray[display_tabbed_cats]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_tabbed_cats") =="yes"){ print "selected";} ?>>Yes</option>
				<option value="no" <?php if(get_option("display_tabbed_cats") =="no"){ print "selected";} ?>>No</option>
			</select><br />
			<small>Turn on/off the tabbed categories in the right menu.</small> 
             
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a9.png"></td></tr>




    
 <?php /***************************************** */ ?> 
 

	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b>Display Categories Count (Inner Section)</b></p>			
			<select name="adminArray[display_categories_count_inner]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_categories_count_inner") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_categories_count_inner") =="no"){ print "selected";} ?>>Hide</option>
			</select><br />
			<small>Show/Hide the category count showing how many items are within each category on the inner page sections.</small>  


</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a10.png"></td></tr>
  
  

    
 	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b>Display Listing Information</b></p>			
			<select name="adminArray[display_listinginfo]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_listinginfo") =="yes"){ print "selected";} ?>>Yes</option>
				<option value="no" <?php if(get_option("display_listinginfo") =="no"){ print "selected";} ?>>No</option>
			</select><br />
			<small>Turn on/off the listing info box display on the listing page.</small> 
             
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a24.png"></td></tr>

 

<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p></td>
</tr>

</table>

 

</div>




 

<div id="premiumpress_tab4" class="content">
<table class="maintable" style="background:white;">

 
<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Show Contact Form</b></p>
		<select name="adminArray[display_contactform]" style="width: 240px;  font-size:14px;">
          <option value="yes" <?php if(get_option("display_contactform") =="yes"){ print "selected";} ?> >Yes</option>
          <option value="no" <?php if(get_option("display_contactform") =="no"){ print "selected";} ?>>No</option>
        </select>
          <br />
          <small>Show/Hide the contact form on the listing page. </small>
          
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a25.png"></td></tr>   
 
 	<tr class="mainrow">
		 <td></td>
		<td class="forminp">
		<p><b> Display Comments Box</b></p>			
				
			
			<select name="adminArray[display_single_comments]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_single_comments") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_single_comments") =="no"){ print "selected";} ?>>Hide</option>
			</select><br />
			<small>Show/Hide the members comments box area at the bottom of the page.</small> 
            
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a20.png"></td></tr>    
 
    
     <?php /***************************************** */ ?> 
     
<tr class="mainrow"><td></td><td class="forminp">

		<p><b>Display Social Booking Tools</b></p>			
			<select name="adminArray[display_social]" style="width: 240px;  font-size:14px;">
				<option value="yes" <?php if(get_option("display_social") =="yes"){ print "selected";} ?>>Show</option>
				<option value="no" <?php if(get_option("display_social") =="no"){ print "selected";} ?>>Hide</option>
			</select><br />
			<small>Show/Hide the social booking tools powered by <a href="http://www.addthis.com" target="_blank">Add This</a></small>  


</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a18.png"></td></tr>     
     
     
      <?php /***************************************** */ ?> 
    

<tr class="mainrow"> <td></td><td class="forminp">

		<p><b> Google Maps Box</b></p>			
				
			
			<select name="adminArray[display_googlemaps]" style="width: 240px;  font-size:14px;">
				
				<option value="yes2" <?php if(get_option("display_googlemaps") =="yes2"){ print "selected";} ?>>Show - Interactive Map</option>
                <option value="no" <?php if(get_option("display_googlemaps") =="no"){ print "selected";} ?>>Hide Google Maps</option>
			</select><br />
			<small><b>Remember</b> Google maps will only display for listings that have a map_location custom field value entered. The interactive map requires long/Lat coordinates and is not recommended for inexperienced users.</small>
            
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a19.png"></td></tr>    
    
    
      <?php /***************************************** */ ?> 
     
    
  
<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p></td>
</tr>  

</table>
</div>






<div id="premiumpress_tab5" class="content">

<table class="maintable" style="background:white;">


<?php /***************************************** */ ?> 


<tr class="mainrow"> <td></td><td class="forminp">

		<p><b> Enable Home Page Slider </b></p>
			
			<select name="adminArray[PPT_slider]" style="width: 240px;  font-size:14px;">
				<option value="off" <?php if(get_option("PPT_slider") =="off"){ print "selected";} ?>>Disable All Sliders</option> 
                <option value="s1" <?php if(get_option("PPT_slider") =="s1"){ print "selected";} ?>>Featured Content Slider (Full Width)</option> 
                <option value="s2" <?php if(get_option("PPT_slider") =="s2"){ print "selected";} ?>>Half Content Slider</option> 
			</select> 
                          
            <p><b> Slider Style</b></p> 
            <select name="adminArray[PPT_slider_style]" style="width: 240px;  font-size:14px;">
				<option value="1" <?php if(get_option("PPT_slider_style") =="1"){ print "selected";} ?>>Style 1 (image size: 650x X 265px)</option> 
                <option value="2" <?php if(get_option("PPT_slider_style") =="2"){ print "selected";} ?>>Style 2 (image size: 960x X 360px)</option> 
                 <option value="3" <?php if(get_option("PPT_slider_style") =="3"){ print "selected";} ?>>Style 3 (image size: 960x X 360px)</option> 
                  <option value="4" <?php if(get_option("PPT_slider_style") =="4"){ print "selected";} ?>>Style 4 (image size: 960x X 360px)</option> 
                   <option value="5" <?php if(get_option("PPT_slider_style") =="5"){ print "selected";} ?>>Style 5 (image size: 960x X 360px)</option> 
			</select><br />
            
            <p><b> Slider Content Source</b></p> 
            <select name="adminArray[PPT_slider_items]" style="width: 240px;  font-size:14px;">
				<option value="manual" <?php if(get_option("PPT_slider_items") =="manual"){ print "selected";} ?>>Manually Configure Slides</option> 
                <option value="featured" <?php if(get_option("PPT_slider_items") =="featured"){ print "selected";} ?>>Use Featured Posts</option>  
			</select><br />
            
</td><td class="forminp"><img src="<?php echo IMAGE_PATH; ?>/help1/a21.png"></td></tr>  


<?php /***************************************** */ ?> 

<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="<?php _e('Save changes','cp')?>" style="color:white;" /></p>


</td>
</tr>  
</table>
</form>	








<div id="PPT-sliderbox"></div>
<div id="PPT-sliderboxAdd" style="margin-left:20px;display:none">
 
 
  
 
 <form method="post" target="_self" >
<input name="admin_slider" type="hidden" value="slider" />

 
 <input type="hidden" id="ppsedit" value="0">
 <table width="100%" border="0">
  <tr>
  
    <td valign="top"><b>Slider Title</b> <br /> <input type="text" name="s1" id="pps1"  style="width: 200px;  font-size:14px;" class="txt" /> </td>
    <td><b>Title Description</b> <small>(max. 10 words)</small> <br /> <textarea name="s3" id="pps3" style="width: 200px;  font-size:14px; height:70px;" class="txt"></textarea> </td>
    <td><b>Main Description</b> <small>(max. 250 words)</small> <br /> <textarea name="s4" id="pps4" style="width: 200px;  font-size:14px; height:70px;" class="txt"></textarea></td>
  </tr>
  
  <tr>
    <td><b>Slider Image</b>  <br/> <input type="text" name="s2" id="pps2"  style="width: 200px;  font-size:14px;" class="txt" />
   <br/><br/>
     
     
<input type="hidden" value="" name="imgIdblock" id="imgIdblock" />
<script type="text/javascript">

function ChangeImgBlock(divname){
document.getElementById("imgIdblock").value = divname;
}
jQuery(document).ready(function() {
 
 jQuery('#upload_sliderimage').click(function() {
 ChangeImgBlock('pps2');
 formfield = jQuery('#pps2').attr('name');
 tb_show('', <?php if(defined('MULTISITE') && MULTISITE != false){ ?>'admin.php?page=images&amp;tab=nw&amp;TB_iframe=true'<?php }else{ ?>'media-upload.php?type=image&amp;TB_iframe=true'<?php } ?>);
 return false;
});
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src'); 
 jQuery('#'+document.getElementById("imgIdblock").value).val(imgurl);
 tb_remove();
} 
});
</script>
<input id="upload_sliderimage" type="button" size="36" name="upload_sliderimage" value="Upload Image"  />
<input onClick="toggleLayer('DisplayImages'); add_image_next(0,'<?php echo get_option("imagestorage_path"); ?>','<?php echo get_option("imagestorage_link"); ?>','pps2');" type="button"   value="View Images"  />


     
     </p>	
    </td>
    <td valign="top"><b>Slider Clickable Link</b> <br /> <input type="text" name="s5" id="pps5"  style="width: 200px;  font-size:14px;" class="txt" value="http://" /> </td>
    <td valign="top"><b>Display Order</b><br /><select id="pps6" name="s6" style="width: 100px;  font-size:14px;"><?php $i=1; while($i<20){ echo '<option>'.$i.'</option>'; $i++; } ?></select></td>
  </tr>

<tr>
<td colspan="3"><p><input class="premiumpress_button" type="submit" value="Create New Slide" style="color:white;" /></p></td>
</tr>
</table>

</form> 
 
 </div>
 
 
<div id="addBtn1" style="display:visible"><a href="javascript:void();" onClick="jQuery('#PPT-sliderboxAdd').show();jQuery('#addBtn1').hide();" class="premiumpress_button" style=" float:right; margin-right:10px;" >Add Slider Item</a></div>

<h2 style="margin-left:10px;">Website Slider Items</h2>
<p style="margin-left:10px;">Here you can setup and create new items for your website slider.</p> 

     
 <?php  $sliderData = get_option("slider_array");   if(is_array($sliderData) && count($sliderData) > 0 ){  ?>


  
					  
					      <table id="ct"><thead><tr id="ct_sort">
                          
                          <th width="90" class="first">Title</th>
                          <th width="100">Short Description</th>
                          <th width="40"class="last">Display Order</th> 
                          <th width="40"class="last">Actions</th>
                          
                          </tr></thead><tbody>
                          <?php 
						  
						  $sortedSlider = $PPTDesign->array_sort($sliderData, 'order', SORT_ASC);
						  
						  $i=-1; foreach($sortedSlider as $hh => $slide){   ?>                          
                          
                          
                          <tr id="srow<?php echo $i; ?>">
                          
                          <td width="90" class="first"><?php echo $slide['s1']; ?></td>
					      <td width="80"><?php echo $slide['s3']; ?></td>   
                           <td width="50"><?php echo $slide['order']; ?></td>                          
                          <td width="80" class="last">
                          
                          <a href='#' Onclick="EditsliderItem('<?php echo $hh; ?>');jQuery('#PPT-sliderbox').show();" style="padding:5px; background:#dcffe1; border:1px solid #57b564; color:green;"><img src="<?php echo $GLOBALS['template_url']; ?>/images/premiumpress/led-ico/find.png" align="middle"> Edit &nbsp;&nbsp;</a> 
                          
                          - <a href='#' Onclick="DeleteSliderItem('<?php echo $hh; ?>');jQuery('#PPT-sliderbox').show();jQuery('#srow<?php echo $i; ?>').hide();" style="padding:5px; background:#ffb9ba; border:1px solid #bd2e2f; color:red;"><img src="<?php echo $GLOBALS['template_url']; ?>/images/premiumpress/led-ico/delete.png" align="middle"> Delete&nbsp;</a></td>
                          
                          </tr>
                          
                          
                          <?php $i++; } ?>
                          
                          
                         </tbody> </table>
                         
<br />
<form method="post" target="_self" >
<input name="admin_slider" type="hidden" value="reset" />
<input class="premiumpress_button" type="submit" value="Reset Slider (Delete All Slides)" style="color:white;" />
</form>                    
<?php } ?>


 

</div>
 
 
 </div>