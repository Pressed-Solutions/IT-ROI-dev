<?php
/*
Template Name Posts: ppm boss
*/
get_header(); ?>
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/js/jquery.jplayer.min.js"></script>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="internalcontent" style="padding: 0px 0px 40px 0px;">
    <div class="internalpage clearfix">
      <div class="inside">
        <div class="content_body">
     
  <div class="content_sharepoint">
      <div class="sharepoint_title">
        <h1 style="margin-bottom: 50px;"><?php the_field("title-11"); ?></h1>
        <h1><?php the_field("title"); ?></h1>
        <h2><?php the_field("sub-title");?></h2>
        <?php  if(the_field("sub-title-3")!=""){?>
        <br/><strong><?php the_field("sub-title-3");?></strong>
        <?php
        }
        ?>
        </div>
       <!-- ********************************* 
              Start  Mid Image links 
            ********************************* -->
        <div class="ppmboss_sharepoint_background">
        
             <div class="an1">
        <a href="<?php echo get_site_url(); ?>/sharepoint/sharepoint-to-clarity-document-collaboration-and-portlets/" class="doc_boss"></a>
        </div>
        <div class="an2">
        <a href="<?php echo get_site_url(); ?>/sharepoint/bi-directional-task-and-scrum-clarity-integration//" class="task_boss"></a>
        </div>
        <div class="an3">
        <a href="<?php echo get_site_url(); ?>/sharepoint/sharepoint-to-clarity-document-collaboration-and-portlets/" class="porlet_boss"></a>
        </div>
        <div class="an4">
        <a href="<?php echo get_site_url(); ?>/sharepoint/bi-directional-task-and-scrum-clarity-integration//" class="scrum_boss"></a>
        </div>
        <div class="an5">
        <a  href="<?php echo get_site_url(); ?>/sharepoint/ideation-integrated-solution-for-clarity-ppm/" class="idea_boss"></a>
        </div>
        <div class="an6">
        <a href="<?php echo get_site_url(); ?>/sharepoint/bi-directional-timesheet-integration/" class="timesheet_boss"></a>
        </div>
        
        </div>
       <!-- ********************************* 
              End  Mid Image links 
            ********************************* -->
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

        <!-- ********************************* 
                Start Product Box view list
            *********************************   -->
        <div style="margin-left: 32px; margin-top: 45px;text-align: center;">
        <span style="font-size: 3em;font-weight: bold;text-align: center;">PPM Boss products</span>
        </div>
        
       
        <div class="PPM_Boss_products" style="width: 100%;padding-left: 5%;">
            <?php if(get_field("image")!="")
                    {
                    ?>
                     <img  src="<?php echo trim(get_field("image"));?>"/>
            <?php   } ?>
                     <div class="PPM_Boss_sharepoint_cont1" style="">
            <?php   $id=$post->ID;
            $blockcount=0;
            $border_right="border-right: 1px solid rgb(204, 204, 204);";
            $args =  array( 'post_status' => 'publish','post_type' =>'sharepoint','post__not_in'   => array($id) ,'order' =>'ASC');
            $loop = new WP_Query( $args );
            $blockcountnum = $loop->post_count;
            
            while ( $loop->have_posts() ) : $loop->the_post();
            $showfooter=get_field("add_in_footer_module");
            $blockcount=$blockcount+1;
          
            if($showfooter=="yes")
            {
            ?>
                <div class="assignmet_boss" style=" padding-top: 20px;min-height: 260px;   <?php  if($blockcount==2 || $blockcount==1){  echo " border-bottom: 1px solid rgb(204, 204, 204);";}  if($blockcount%2==1){ echo $border_right;}else{ echo " padding-left: 20px;";} ?>">
                    <div class="an4_inferior_assignment">
                        <a href="<?php the_permalink(); ?>" class="assignment_boss_rollover_inferior"><?php 
                        if ( has_post_thumbnail() ) 
                            { 
                          the_post_thumbnail();
                        } 
                        ?></a>
                    </div>
                    <div class="assignmet_boss_text">
                     <p> <?php  $cont=get_field("footer_text");
                         echo trim($cont);?></p>
                    <p><a href="<?php the_permalink(); ?>">go to page</a> </p>
                    </div>
                    
                </div>
            <?php  } endwhile;?> 
            </div>
         <div style="clear:both"></div>
        </div>
        
        <!-- ********************************* 
                End Product Box view list
            *********************************   -->
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
