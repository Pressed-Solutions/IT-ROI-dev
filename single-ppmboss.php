<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="internalcontent" >
    <div class="internalpage clearfix" style="padding: 24px 0px 16px 0px;" >
  <div class="panel-panel panel-col-first" >
    <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >
   
  
  <div class="pane-content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_2 view-dom-id-2ce348f08e1407ac8b441212711a46a3">
        
  
  
      <div class="">
      
<div class="skin-default">
  
  <div id="flexslider_views_slideshow_main_latest_articles-block_2" class="flexslider_views_slideshow_main views_slideshow_main"><div style="">
  <div class="" style="">
      <div class="ds-1col node node-article node-promoted view-mode-slide  clearfix">
          <div class="content_body">
<div class="head">
        <div class="headmenu">
           <?php dynamic_sidebar('ppm_boss');?>
        
        </div>
        <div class="phone"><img src="<?php bloginfo("stylesheet_directory");?>/images/talk_now.png" alt=""></div>
        <div class="mail"><a title="Send us an email" href="mailto:sales@itroisolutions.com?subject=PPM Boss - more information required" class=" mail_boss"></a></div>
        </div>
  
  <div class="content_sharepoint">
        <div class="sharepoint_title">
        <h1><?php the_field("title"); ?>&nbsp;</h1>
        <h2><?php the_field("sub-title");?></h2>
        <?php  if(the_field("sub-title-3")!=""){?>
        <br/><strong><?php the_field("sub-title-3");?></strong>
        <?php
        }
        ?>
        </div>
        <div class="docboss_sharepoint_background">
        <div class="an1_sharepoint">
        <p><strong>LEVERAGES&nbsp;</strong><br>
        <strong>SharePoint document&nbsp;</strong><br>
        <strong>collaboration features</strong><br>
        Drag &amp; drop<br>
        Blogs<br>
        Import/export<br>
        Upload/download<br>
        Full search functionality<br>
        Multiple document functionality&nbsp;<br>
        Document repository for projects<br>
        Share documents throughout the <br>
        enterprise<br>
        <br>
        </p>
        </div>
        <div class="an2_sharepoint">
        <p>Provides enterprise visibility<br>
        to your projects without<br>
        having to login to Clarity</p>
        </div>
        <div class="an3_sharepoint">
        <p>PM’s&nbsp;<br>
        become&nbsp;<br>
        SharePoint<br>
        Admins</p>
        </div>
        <div class="an4_sharepoint">
        <p>Integrated team&nbsp;<br>
        and/or collaboration&nbsp;<br>
        security from Clarity&nbsp;<br>
        to SharePoint</p>
        </div>
        <div class="an5_sharepoint">
        <p>Enables you to build custom&nbsp;<br>
        Portlets, using live Clarity data</p>
        </div>
        <div class="an6_sharepoint">
        <p>Faster, Easier<br>
        Progressive</p>
        </div>
        </div>
        <div class="bot_white"></div>
        </div>
         
          <div class="content_sharepoint_text">
        <div class="top_white"></div>
        <div class="content_sharepoint_text_title">
        <h3><?php the_field("sub-title-2"); ?></h3>
        </div>
        <div class="content_sharepoint_text_body">
        <h4><?php the_field("title-2"); ?></h4>
        
        <?php the_content(); ?>
        
        </div>
        <div class="menu_inferior">
        <div class="headmenu">
         <?php dynamic_sidebar('ppm_boss');?>
        </div>
        <div class="phone"><img src="<?php bloginfo('stylesheet_directory');?>/images/talk_now_inf.png" alt=""></div>
        <div class="mail_inf"><a title="Send us an email" href="mailto:sales@itroisolutions.com?subject=PPM Boss - more information required" class=" mail_boss_inf"></a></div>
        </div>
        <?php if(get_field("title-3")!="")
            {
            ?>
        <div style="margin-left: 32px; margin-top: 45px;">
        <h1 style="font-size: 3em;font-weight: bold;"><?php echo get_field("title-3"); ?></h1>
        </div>
        <?php } ?>
                 <div class="PPM_Boss_products">
                                       <?php if(get_field("image")!="")
            {
            ?>
                     <img  src="<?php echo trim(get_field("image"));?>"/>
             <?php } ?>
               <div class="PPM_Boss_sharepoint_cont">
            <?php   $id=$post->ID;
            $args =  array( 'post_status' => 'publish','post_type' =>'ppmboss','post__not_in'   => array($id));
                                                          $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();?>
        <div class="assignmet_boss">
        <div class="an4_inferior_assignment">
        <a href="<?php the_permalink(); ?>" class="assignment_boss_rollover_inferior"><?php 
if ( has_post_thumbnail() ) 
    { 
  the_post_thumbnail();
} 
?></a>
        </div>
        <div class="assignmet_boss_text">
        <?php $cont=apply_filters('the_content',(substr($post->post_content,0,280)));

echo trim($cont);?>
        <a href="<?php the_permalink(); ?>">go to page</a>
        </div>
        </div>
       <?php endwhile;?> 
         </div>
        </div>
        </div>
</div></div>
  </div>
          
          
</div>
      

  </div>
   
  </div>
          
    </div>
  
  
  
  
  
  
</div>  </div>

  
  </div>
         


  </div>
      </div>
    </div>
     
                                            </div>
<?php endwhile; ?>
        
       
        
    </div></div>  </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>