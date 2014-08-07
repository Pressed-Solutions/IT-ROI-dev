<?php
/*
Template Name Posts: ppm excel trail
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
  <div class="internalcontent" style="padding: 0px 0px 50px 0px;">
    <div class="internalpage clearfix">
  
 <!------------Slider Start----------->
      

  <div class="integrationslider" style="">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/PPM_Excel_header.png" width="1200"/>
     <ul><?php $r=mysql_query("select * from wp_posts where post_type='integration' and post_name='q-a' and post_status ='publish'");
       
        while($w=  mysql_fetch_array($r))
        {?>
                <li><a href="<?php echo $w['guid']; ?>" class="fancybox" ><?php echo $w['post_title']; ?></a></li>
        <?php
        }
        ?>
      </ul>
  </div>
 <!------------Slider Finish----------->
 
 <!------------Page Content Start----------->
 
          <div class="integratepagecontent">
                        <?php while ( have_posts() ) : the_post(); ?>
                    
                       <?php  $custom = get_post_custom($post->ID);?>
                       <div class="integratecontent">            

<div class="field-item even" property="schema:name">
            <h1><?php the_field('title'); ?><span style="color:black">- <?php the_title(); ?></span></h1></div>
            <?php 
            $video_demo_link =get_field('video_demo_link');
            $video_demo_file =get_field('video_demo_file');
            $webinar_link=get_field('webinar_link');
            $webinar_file=get_field('webinar_file');
            ?>
         
        <div style="clear: both"></div>                                                              
                      <div class="field-item even" property="schema:articleBody content:encoded">
                          <?php the_content(); ?>
                      </div>
                       </div>                                                         
                       <?php endwhile; ?>
                                                        

            
 <!------------Page Content finish------>
 <!------------Sidebar start------------->
 

<!---------------Sidebar Finish----------->
        </div>
    </div>
     
     </div>
   
   </div> 
        </div>
    </section>
</div>
<?php get_footer(); ?>