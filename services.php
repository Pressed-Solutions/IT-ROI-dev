<?php
/*
Template Name Posts: services
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="internalcontent" style="padding: 0px 0px 40px 0px;">
    <div class="internalslider" style="">
        <img src="<?php the_field("header_image"); ?>" height="208" width="1200"/>
    </div>
    <div class="internalpage clearfix" style="padding-top: 55px;border: 1px solid rgb(198, 198, 198);border-top:none;background-color: white" >
        <div class="panel-separator"></div>
            <div class="internalpagecontent" style="padding-right: 10px;">
                <div class="field-items">
                    <div class="field-item even" property="schema:articleBody content:encoded">
                        <h8 style='margin-bottom: 30px;float:left;'><?php the_field('upper_title');?></h8>
                        <div style="clear:both"></div>
                        <?php the_content(); ?>
                        <div class="plusimage"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/2.png" /></div>
                        
                           <div class="plusmodule">
                                             <h8 style='margin-bottom: 25px;float:left;'><?php the_field('highlight_title');?></h8>
                                              <div style="clear:both"></div>
                               <?php the_field('highlight_description');
                                ?>
                                <div style="margin-top:20px;"><?php      
                               if( class_exists( 'kdMultipleFeaturedImages' ) )
                               {
                                      kd_mfi_the_featured_image( 'featured-image-2', 'services' );
                               }
                            ?> </div>
                            </div>
                    </div>
                </div>
            </div>
                <div class="internal_out_sidebar">
                            <div  id="more"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/more.png" style="margin-bottom: 8px;">
                            </div>
                                <div class="innner_page_sidebar"> 
                                            <?php dynamic_sidebar('integration_bridge'); ?>
                                     <?php $pageurl=get_permalink_by_slug( $slug='sharepoint-to-clarity-integration-suite', $post_type = 'sharepoint' );  ?>
                                  
                                    <a href="<?php echo $pageurl; ?>"><?php 
                                if ( has_post_thumbnail() ) 
                                {
                                    the_post_thumbnail();
                                }  ?>
                                    </a>
                                </div>
                                <div class="internal_contact">
                              <?php dynamic_sidebar('integration_bridge_contact'); ?>
                                </div>
            </div>
        <div style="clear:both;height:117px;"></div>
    </div>
</div>
<?php endwhile; ?>
</div>
</div>  
</section>
</div>
<?php get_footer(); ?>