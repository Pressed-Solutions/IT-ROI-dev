<?php
/*
Template Name Posts: ppm document boss
*/
get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function($)
{
  $( '#brief' ).click(function() {

    $('html, body').animate({
        scrollTop: $('#brief').attr('img').offset().top
    }, 2000);

});
     $("#video").click(function() 
    {
         $('html, body').animate({
            "scrollTop": $(this).parent().children(".integrate_out_sidebar img").offset().top
            + $(this).parent().children(".integrate_out_sidebar img").height()}, 'fast')
    });
    });
    </script>
  <div class="internalcontent" style="padding: 0px 0px 40px 0px;">
    <div class="internalpage clearfix">
  
 <!------------Slider Start----------->
      

  <div class="integrationslider" style="">
             <?php //dynamic_sidebar('integration_bridge'); ?>
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/DocBoss_Header.png" width="1200"/>
  </div>
 <!------------Slider Finish----------->
 
 <!------------Page Content Start----------->
 
          <div class="integratepagecontent">
                        <?php while ( have_posts() ) : the_post(); ?>
                    
                       <?php  $custom = get_post_custom($post->ID);?>
                       <div class="integratecontent">            

            <div class="field-item even" property="schema:name">
            <h1><?php the_field('title'); ?></h1></div>
            <?php 
            $video_demo_link =get_field('video_demo_link');
            $video_demo_file =get_field('video_demo_file');
            $webinar_link=get_field('webinar_link');
            $webinar_file=get_field('webinar_file');
            ?>
        <div class="menu_boton_registrarse">
        <ul>
           <?php
             if($video_demo_link!="" || $video_demo_file!="" || $webinar_link!="" || $webinar_file!="")     
             {
            ?>
            <li><a href="#video" target="_top"> <img alt="video" src="<?php bloginfo("stylesheet_directory");  ?>/images/see_video.jpg" class="rollover_effect"></a></li>
            <?php 
            }
            ?>
            <li><a href="#brief" target="_top" id="brief"> <img alt="briefs" src="<?php bloginfo("stylesheet_directory");  ?>/images/briefs.jpg" class="rollover_effect"></a></li>
        </ul>
        </div>    
        <div style="clear: both"></div>                                                              
                        <div class="field-item even" property="schema:articleBody content:encoded"><?php the_content(); ?>
                           <?php 
                           $highlight_title=get_field('highlight_title');
                           $highlight_description=get_field('highlight_description');
                           $video_demo_title = get_field('video_demo_title');
                           $video_demo_link =get_field('video_demo_link');
                           $video_demo_file =get_field('video_demo_file');
                           $video_demo_message=get_field('video_demo_message');
                           $webinar_title=get_field('webinar_title');
                           $webinar_message=get_field('webinar_message');
                           $webinar_link=get_field('webinar_link');
                           $webinar_file=get_field('webinar_file');
                           $mb_itroi_title = get_field('mb3_itroi_title');
                           $mb_itroi_description = get_field('mb3_itroi_description');
                           ?>  
                           <?php
                           if($mb_itroi_title!="")
                           {
                           ?>
                           <h3><?php echo $highlight_title;  ?>:</h3>
                           <?php
                           }
                            if($highlight_description!="")
                           {
                                ?>
                           <div><?php echo $highlight_description; ?></div>
                           <?php
                            }
                           if($mb_itroi_title!="")
                           {
                           ?>
                           <h3><?php echo $highlight_title;  ?>:</h3>
                           <?php
                           }
                            if($mb_itroi_description!="")
                           {
                                ?>
                           <div><?php echo $highlight_description; ?></div>
                           <?php
                            }
                            if($video_demo_title!="")
                            {
                            ?>
                           <h3><?php echo $video_demo_title; ?></h3>
                           <?php 
                            }
                            if($video_demo_message!="")
                            {
                            ?>
                           <p><?php echo $video_demo_message; ?></p>
                           <?php 
                            }
                            if($video_demo_file!="")
                            {
                            ?>
                           <div id="video" style="width:600px;height:400px;border:solid 1px black;"></div>
                           <?php
                            }
                            if($video_demo_link!="")
                            {
                            ?>
                           <div id="video" style="width:600px;height:400px;border:solid 1px black;"></div>
                           <?php
                            }
                            if($webinar_title!="")
                            {
                            ?>
                           <h3><?php echo $webinar_title;  ?></h3>
                           <?php
                            }
                            if($webinar_message!="")
                            {
                            ?>
                           <p><?php echo $webinar_message;  ?></p>
                           <?php
                            }
                            if($webinar_link!="")
                            {
                            ?>
                           <div id="video" style="width:600px;height:400px;border:solid 1px black;"></div>
                           <?php
                            }
                            if($webinar_file!="")
                            {
                            ?>
                           <div id="video" style="width:600px;height:400px;border:solid 1px black;"></div>
                           <?php
                            }
                            ?>
                           </div>
                              </div>                                                         
                       <?php endwhile; ?>
                                                        

            
 <!------------Page Content finish------>
 <!------------Sidebar start------------->
 
<div class="integrate_out_sidebar">
       <?php dynamic_sidebar('ppm_document'); ?>

  </div>
<!---------------Sidebar Finish----------->
        </div>
    </div>
     
     </div>
   
   </div> 
        </div>
    </section>
</div>
<?php get_footer(); ?>