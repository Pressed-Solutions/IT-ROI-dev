<?php
/*
Template Name Posts: meetexpert
*/
get_header(); ?>
<?php  $auid=$_GET['id'];
                           $args = array( 'post_type'=>'biography', 'posts_per_page' => 1 ,'paged' => $paged ,'post_status' => 'publish','author'=> $auid );
                                  $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    
                                                    ?>
<div class="internalcontent" style="padding: 0px 0px 16px 0px;">
    <div class="careerinternalslider">
        <div class="career">
            <img src="<?php bloginfo("stylesheet_directory");?>/images/careerhead.png"/>
        </div>
        <div class="career_title">
            <h10>Meet the Experts</h10>
        </div>
        <div class="careersubtitle">
     <h9><?php the_field('subtitle')?><h9> 
      
        </div>
    </div>
    <div class="internalpage clearfix">
        <div class="panel-separator"></div>
            <div class="careerpagecontent">
                                  
          <?php  $post_author=$post->post_author; ?>
          <div style="float:left;margin-right: 15px;">
                  <?php echo get_avatar($post_author,200,200); ?>     
          </div>    
                        <?php the_content(); ?>
               
          </div>
         <div>
                    <div class="career_page_sidebar"> 
                            <?php dynamic_sidebar('career'); ?>
                    </div>
            </div>
        <div class="meetexpert_page_outer_sidebar">
           
     <div class="meetexpert_page_sidebar">
            <?php dynamic_sidebar('meetexperts'); ?>
    
    </div>
            </div>
        </div>     
    
    </div>
</div>
<?php endwhile; ?>
</div>  
</section>
</div>
<?php get_footer(); ?>