<?php

get_header();

/**************** CLAIM LISTING RESULTS *******************/
 
if(isset($GLOBALS['claimlisting_result'])){
 
	if($GLOBALS['claimlisting_result']){
	
	$GLOBALS['error'] 		= 1;
	$GLOBALS['error_type'] 	= "success";
	$GLOBALS['error_msg'] 	= "This listing has successfully been updated and is now listed under your account.";
	
	}else{
	
	$GLOBALS['error'] 		= 1;
	$GLOBALS['error_type'] 	= "error";
	$GLOBALS['error_msg'] 	= "This listing could not be claimed because the email addresss on file does not match the one on your account.";
	
	}

}
$GLOBALS['user_info'] 		= get_userdata($post->post_author);
$GLOBALS['claim_email'] 	= get_post_meta($post->ID, 'email', true);
/**************** CLAIM LISTING RESULTS *******************/

// SETUP GLOBAL VALUES FROM CUSTOM DATA
$GLOBALS['images'] 		= get_post_meta($post->ID, 'images', true);
$GLOBALS['map'] 		= get_post_meta($post->ID, "map_location", true);
$GLOBALS['hits'] 		= get_post_meta($post->ID, "hits", true); 

// GET CUSTOM FIELD DATA
$CustomFields 	= get_option("customfielddata");

// CHECK FOR THE WEBSITE LINK
$link = $PPT->CheckLink($post);	


if (have_posts()) : while (have_posts()) : the_post();  ?>

<div class="col b1 first_col"> 


<?php /*--------------------------- ALERT BOX ------------------------------------------ */ ?>

<?php echo $PPTDesign->GL_ALERT($GLOBALS['error_msg'],$GLOBALS['error_type']); ?>
 

<?php /*--------------------------- HEADER SECTION ------------------------------------------ */ ?>

    <div class="append border_r clearfix"> 
    
        <div class="thumbnail-large" style="margin-right:20px;"> 
     
           <img src="<?php echo $PPT->Image($post->ID,"url","&amp;w=180"); ?>"  alt="<?php the_title(); ?>"  style="max-width:180px; max-height:128px"/>
           
            <div class="info"><?php if(function_exists('wp_gdsr_render_article')){ wp_gdsr_render_article(5);}  ?></div>
           
        </div> 
        
        <?php if(isset($GLOBALS['packageIcon']) && strlen($GLOBALS['packageIcon']) > 2){ echo "<img src='".$PPT->ImageCheck($GLOBALS['packageIcon'])."' class='floatr'>"; } ?>    
        
        <h1><?php the_title(); ?> </h1> 
        
        <?php the_excerpt(); ?>
  
        
        <div class="plinks clearfix">
        <?php if(strlen($link) > 2){ ?>
        <a href="<?php echo $link; ?>" target="_blank" title="<?php the_title(); ?>" <?php if($GLOBALS['premiumpress']['nofollow'] =="yes"){ ?>rel="nofollow"<?php } ?>><?php echo SPEC($GLOBALS['_LANG']['_single1']) ?></a>
        <?php } ?>
        <a href="<?php echo get_option('contact_url'); ?>?report=<?php echo $post->ID; ?>" title="report this listing"><?php echo SPEC($GLOBALS['_LANG']['_single2']) ?></a>       
        </div> 
        
        
        <?php /*--------------------------- SOCIAL ICONS ------------------------------------------ */ ?>
        
        
        <?php if(get_option("display_social") =="yes"){ ?>
        
          	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=premiumpress"></script>
			 <div class="addthis_toolbox">
				<div class="hover_effect">
					<div><a class="addthis_button_email"> &nbsp;</a></div>
					<div><a class="addthis_button_print"> &nbsp;</a></div>
					<div><a class="addthis_button_twitter">&nbsp;</a></div>
					<div><a class="addthis_button_facebook">&nbsp;</a></div>
					<div><a class="addthis_button_myspace">&nbsp;</a></div>
					<div><a class="addthis_button_digg">&nbsp;</a></div>
					<div><a class="addthis_button_expanded">&nbsp;</a></div>
					<div style="clear:both; float:none;"></div> 
				</div>
			</div>
         <?php } ?>
            
       
        </div>
 
        <form action="" method="post" name="ClaimListing" id="ClaimListing">
        <input type="hidden" name="action" value="claimlisting" /> 
        <input type="hidden" name="postID" value="<?php echo $post->ID; ?>" /> 
        </form>       

		   
    
		<div class="clearfix"></div>

        <ul class="tabs"> 
        
            <li><a href="#info" id="icon-single-info"><?php echo SPEC($GLOBALS['_LANG']['_single3']) ?></a></li> 
            
            <?php if(strlen($GLOBALS['images']) > 4){ ?><li><a href="#gallery" id="icon-single-images"><?php echo SPEC($GLOBALS['_LANG']['_single4']) ?></a></li><?php } ?>
            
            <?php if(get_option("display_single_comments") =="yes"){ ?><li><a href="#comments" id="icon-single-comment">
			<?php  comments_number($GLOBALS['_LANG']['_nocomments'], $GLOBALS['_LANG']['_1comment'], '% '.$GLOBALS['_LANG']['_comments']); ?></a></li>			
            <?php  } ?> 
            
           <?php if(get_option("display_contactform") =="yes"){ ?> <li><a href="#contact" id="icon-single-contact"><?php echo SPEC($GLOBALS['_LANG']['_single5']) ?></a></li><?php } ?>
            
        </ul> 
    
    
    <div class="tab_container"> 
    
    <?php /*--------------------------- CONTENT TAB ------------------------------------------ */ ?>

    
      <div id="info" class="tab_content entry"> 
      
          <?php the_content(); ?> 
          
          <?php $ThemeDesign->SINGLE_CUSTOMFIELDS($post,$CustomFields); ?>  
           
           <div class="full clearfix box"><p class="f_half left"><br><b><?php echo SPEC($GLOBALS['_LANG']['_categories']) ?></b></p><p class="f_half left"><br><?php the_category(', ') ?></p></div>
           
           <?php the_tags('<div class="full clearfix box"><p class="f_half left"><br><b>'.SPEC($GLOBALS['_LANG']['_tpl_add16']).'</b></p><p class="f_half left"><br>',', ','</p></div>') ?> 
           
      </div> 
        
       <?php /*--------------------------- GALLERY TAB ------------------------------------------ */ ?>
 
      <div id="gallery" class="tab_content">                
                     
            <h2><?php echo SPEC($GLOBALS['_LANG']['_single6']) ?></h2>
        
            <?php echo $ThemeDesign->SINGLE_IMAGEGALLERY($GLOBALS['images']); ?>
    
    	</div>
         
        
      <?php /*--------------------------- COMMENTS TAB ------------------------------------------ */ ?>


      <div id="comments" class="tab_content">                
    
    		<?php comments_template();  ?>
    
      </div> 
 
 
       <?php if(get_option("display_contactform") =="yes"){ ?>
        
        <div id="contact" class="tab_content">                
        
        <form action="#" name="contactForm" method="post" onsubmit="return CheckMessageData(this.message_name.value,this.message_subject.value,this.message_message.value,'Please complete all fields.');"> 
        <input type="hidden" name="action" value="sidebarcontact" />
        <input type="hidden" name="message_name" value="<?php echo the_author_meta('login'); ?>" />
        <input type="hidden" name="author_ID" value="<?php echo get_the_author_id() ?>" />
        
        <?php wp_nonce_field('ContactForm') ?>
        <fieldset> 
                                 
            <div class="full clearfix border_t box"> 
            <p class="f_half left"> 
                <label for="name"><?php echo SPEC($GLOBALS['_LANG']['_single7']) ?><span class="required">*</span></label><br />
                <input type="text" name="message_from" id="message_name"  class="short" tabindex="1" />
            </p> 
            <p class="f_half left"> 
                <label for="email"><?php echo SPEC($GLOBALS['_LANG']['_single8']) ?><span class="required">*</span></label><br /> 
                <input type="text" name="message_subject" id="message_subject" class="short" tabindex="2" />               
            </p> 
            </div> 
     
                  
            <div class="full clearfix border_t box"> 
            <p>
                <label for="comment"><?php echo SPEC($GLOBALS['_LANG']['_single9']) ?><span class="required">*</span></label><br /> 
                <textarea tabindex="3" class="long" rows="4" name="message_message" id="message_message"></textarea> <br />                   
            </p>
            </div>   
            
            <?php $email_nr1 = rand("0", "9");$email_nr2 = rand("0", "9"); ?>
            <div class="full clearfix border_t box"> 
            <p class="f_half left"> 
                <label for="name"><?php echo SPEC(str_replace("%a",$email_nr1,str_replace("%b",$email_nr2,SPEC($GLOBALS['_LANG']['_single10'])))) ?> </label><br /> 
                <input type="text" name="code" value="" class="long" tabindex="4" /><br /> 
                <input type="hidden" name="code_value" value="<?php echo $email_nr1+$email_nr2; ?>" />
            </p> 
             </div>               
            
            <div class="full clearfix border_t box"> 
            <p class="full clearfix"> 
                <input type="submit" name="submit1" class="button blue" tabindex="5" value="<?php echo SPEC($GLOBALS['_LANG']['_single11']) ?>" />  
            </p> 
            </div>	
        
        </fieldset> 
        </form>
        
    	</div>         
        <?php } ?>
        
         
    </div>    
    
    
    
    
     
           

</div>  
		
			
 <?php get_sidebar(); ?>	
 
 <?php endwhile; else :  endif; ?> 


<div class="clearfix"></div>  


<?php get_footer(); ?>