<?php

/*
LAST UPDATED: 27th March 2011
EDITED BY: MARK FAIL
*/

if(!isset($GLOBALS['nosidebar'])){ get_sidebar(); } ?>
 
    </div> <!-- end CONTENT -->

</div> <!-- end SIDEBAR -->



 

    <div id="footer" class="clearfix full">
    
        <div class="w_960" style="margin:0 auto;"> 
        
        <?php echo example_function_name("_footer.php"); ?>
        
            <div class="b_third_col col first_col" style="padding-left:15px;"> 
             <?php echo stripslashes(get_option("footer_text")); ?>
            </div> 
                            
            <?php $ArticleData = $PPT->Articles(10); if(strlen($ArticleData) > 5){ ?>
            <div class="b_third_col col"> 
                         
                <h3><?php echo SPEC($GLOBALS['_LANG']['_rarticles']) ?></h3>                
                <ul class="recentarticles"><?php echo $ArticleData; ?></ul>
            </div> 
            <?php } ?>
                            
            <div class="b_third_col col last_col">                
               <br />
                <?php echo $PPT->Banner("footer");  ?>             
            </div> 
            
            
        <div class="clearfix"></div>
                        
        <div id="copyright" class="full">
            <p>&copy; <?php echo date("Y"); ?> <?php echo get_option("copyright"); ?> <?php $PPT->Copyright(); ?></p>
        </div> 
                        
    
    </div> 
        
 

</div>  <!-- end WRAPPER -->

        
</div>
 



<?php wp_footer(); ?>



</body>
</html>