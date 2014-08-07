<?php
/*
Template Name Posts: Q & A
*/
?>


  
 <!------------Slider Start----------->
      

 <!------------Slider Finish----------->
 
 <!------------Page Content Start----------->
 
        
                        <?php while ( have_posts() ) : the_post(); ?>
                    
                       <?php  $custom = get_post_custom($post->ID);?>
                       <div class="integratecontent">            

<div class="field-item even" property="schema:name" style="border-bottom: 1px solid;">
            <h1 style="color:#000;">IT-ROI SOLUTIONS > <?php the_field('title'); ?></h1></div>
                    
        <div style="clear: both"></div>                                                              
                       <div class="field-item even" property="schema:articleBody content:encoded"><?php the_content(); ?>
                          
                           </div>
                       </div>                                                         
                       <?php endwhile; ?>
                                                        
   
            
 <!------------Page Content finish------>
 <!------------Sidebar start------------->
 

<!---------------Sidebar Finish----------->
     
    
   
