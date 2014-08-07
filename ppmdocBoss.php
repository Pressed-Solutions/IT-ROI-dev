<?php
/**

 * Template Name Posts: PPM docBOSS
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/js/jquery.jplayer.min.js"></script>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="internalcontent" style="padding: 0px 0px 40px 0px;">
    <div class="internalpage clearfix">

    <div class="inside">
 
          <div class="content_body">
  <!-- ********************************* 
               Start Top Page Menu Bar links 
       ********************************* -->
      <?php 
$pdf_link ="";
$pdf_post_title=""; 
$pdf_href= ""; 


$id = get_the_ID();
$metarows = $wpdb->get_results( "SELECT * FROM `wp_postmeta` WHERE  post_id =".$id );
foreach($metarows as $row=>$k)
{
     if($k->meta_key=="download_the_product_brief")
         {
            $download_the_product_brief=$k->meta_value;
            if($download_the_product_brief!="")
            {
            $pdf_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =".$download_the_product_brief);
            $pdf_post_title=$pdf_link->post_title; 
            $pdf_href=$pdf_link->guid; 
            }
         }
         else if($k->meta_key=="watch_the_webinar")
         {$watch_the_webinar=$k->meta_value; 
            if($watch_the_webinar!="")
            {
            $webinar_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =".$watch_the_webinar);
            $webinar_post_title=$webinar_link->post_title; 
            $webinar_href=$webinar_link->guid; 
            }
         
         }
         else if($k->meta_key=="schedule_a_demo"){
         $schedule_a_demo=$k->meta_value; 
            if($schedule_a_demo!="")
            {
            $s_demo_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =".$schedule_a_demo);
            $demo_post_title=$s_demo_link->post_title; 
            $demo_href=$s_demo_link->post_name; 
            }
         }
         else if($k->meta_key=="mailto_email_id"){
         $mailto_email_id=$k->meta_value; 
         }
         else if($k->meta_key=="mailto_subject"){
         $mailto_subject=$k->meta_value; 
         }
         else if($k->meta_key=="watch_the_webinar_link"){
         $watch_the_webinar_link=$k->meta_value; 
         }
         else if($k->meta_key=="mailto_subject"){
         $mailto_subject=$k->meta_value; 
         }
}


?>

         <div class="head">
            <div class="headmenu">
                <h3 style="height:0px;position: absolute;"><span> </span> <span> </span><span> </span><span> </span><span> </span><br/></h3>
                <div class="menu-ppm-boss-menu-container">
                    <ul id="menu-ppm-boss-menu" class="menu">
                         <li id="menu-item-1081"  style="margin-right:70px;" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1081"><a  href="#" onclick="webinar_video();" id="webinar_top"><img  style="height:84px;"src="<?php bloginfo("stylesheet_directory");?>/images/RB_3.1_a.png" class="rollover_effect"  alt="See the Video" title="See the Video"/></a></li>
                        <li id="menu-item-1079"  style="margin-right:82px;" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 "><a href="<?php  if($pdf_href!=""){ echo $pdf_href;}else{ echo "#";}  ?>" <?php if($pdf_href!=""){ echo 'target="_blank"';} ?> alt="Download the brief" title="Download the brief"><img  src="<?php bloginfo("stylesheet_directory");?>/images/downloadbrief.png" class="rollover_effect" alt="Download product brief" /></a></li>
                       
                        <li id="menu-item-1082" style="margin-right:71px;" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1082"><a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img  src="<?php bloginfo("stylesheet_directory");?>/images/scheduledemo.png" class="rollover_effect" alt="Schedule a demo" title="Schedule a demo"/></a></li>
                </ul>
                </div>
                 <div><img  src="<?php bloginfo("stylesheet_directory");?>/images/talk.png" alt="">
                     <a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" alt="Send us an email" title="Send us an email"><img src="<?php bloginfo("stylesheet_directory");?>/images/mail.png" alt=""  style="margin-left:-5px;" class="rollover_effect" /></a></div>
            </div>
        </div>
  <div style="clear:both"></div>
   <!-- ********************************* 
                End Top Page Menu Bar links 
       ********************************* -->
   
  <!-- ********************************* 
              Start  Webinar Video Section
            ********************************* -->
        <div id="video_new" style="width: 854px;height: 510px;margin: auto; display:none;margin-top: 20px; margin-bottom: 20px;">
                               
  <!-- *********************************  Start  Webinar Video Section ********************************* -->
       <div  style="text-align: center;display:none;" id="webinar_video">
           <?php // $video_link_1=get_field('video_link-1');
              //  $video_file_1=get_field('video_file-1');
                if($watch_the_webinar_link!='')
                 { ?>
           <input type="hidden" name="webnair_iframe_add" id="webnair_iframe_add" value="<?php echo $watch_the_webinar_link; ?>" />
           <div id="webinar_iframeclose" style="text-align: right;width: 100%;">
                <img src="<?php bloginfo("stylesheet_directory");?>/images/fancy_close.png" alt="">
            </div> 
           <iframe width="854" height="480" frameborder="0" id="webinariframe" name="webinariframe" allowfullscreen="" src="" style="border: solid 1px #CCC;"></iframe>
         
         <?php  }else if($webinar_href!='') { ?>
           <div id="webinar_videoclose" style="text-align: right;width: 100%;">
                <img src="<?php bloginfo("stylesheet_directory");?>/images/fancy_close.png" alt="">
            </div> 
        <script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				m4v: "<?php echo $webinar_href; ?>"
			});
		},
		swfPath: "js",
		solution: "flash, html",
		supplied: "m4v",
		cssSelectorAncestor: "",
                size: {
                  width: "460px",
                  height: "320px"
                },
		smoothPlayBar: true,
		keyEnabled: true
	});
        $('.jp-jplayer').click(function() {
            toggle_playpause();
          });
          $('.jp-video-play-icon').click(function() {
            toggle_playpause();
          });
});
function toggle_playpause()
{
            if ($('#jquery_jplayer_1').data().jPlayer.status.paused == false) {
                 $("#jquery_jplayer_1").jPlayer('pause');
                 $('.jp-video-play').show();
            } else {
                $("#jquery_jplayer_1").jPlayer('play');
                $('.jp-video-play').hide();
            }
}
//]]>
</script>
<div id="jp_container_1" class="jp-video jp-video-360p">
    <div class="jp-type-single">
        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div class="jp-gui">
                <div class="jp-video-play">
                    <a class="jp-video-play-icon" tabindex="0">play</a>
		</div>
		<div class="jp-interface">
                    <div class="jp-progress">
			<div class="jp-seek-bar">
                            <div class="jp-play-bar"></div>
			</div>
                    </div>
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
		</div>
            </div>
    </div>
</div>
         <?php } ?>
        
            
            
        </div>

<script type='text/javascript'>
            
jQuery( "#webinar_top" ).click(function() {
jQuery( "#webinar_video" ).slideToggle( "slow" );
jQuery( "#video_new" ).slideToggle( "slow" );
var val=jQuery( "#webnair_iframe_add" ).val();
jQuery( "#webinariframe" ).attr('src',val);
jQuery("html, body").animate({ scrollTop: 127 }, 600);
});
            
jQuery( "#webinar_videoclose" ).click(function() {
jQuery( "#webinar_video" ).slideToggle("slow");
jQuery( "#video_new" ).slideToggle( "slow" );
});

jQuery( "#webinar_iframeclose" ).click(function() {
jQuery( "#webinar_video" ).slideToggle("slow");
jQuery( "#video_new" ).slideToggle( "slow" );
jQuery( "#webinariframe" ).attr('src',"");

});

function web_down()
{    
    jQuery( "#webinar_video" ).slideToggle( "slow" );
    jQuery( "#video_new" ).slideToggle( "slow" );
    var val=jQuery( "#webnair_iframe_add" ).val();
    jQuery( "#webinariframe" ).attr('src',val);
    jQuery("html, body").animate({ scrollTop: 127 }, 600);
}
function check()
{
jQuery( "#video_new" ).focus();
//jQuery("html, body").animate({ scrollTop: 127 }, 600);
}

           
            </script>
     <!-- ********************************* 
     End   Webinar Video Section
     ********************************* -->
  
                           </div>
     <!-- ********************************* 
     End   Webinar Video Section
     ********************************* -->
     
     
  <div class="content_sharepoint">
        <div class="sharepoint_title">
        <h1><?php the_field("title"); ?></h1>
        <h2><?php the_field("sub-title");?></h2>
        <?php  if(the_field("sub-title-3")!=""){?>
        <br/><strong><?php the_field("sub-title-3");?></strong>
        <?php
        }
        ?>
        </div>
        <div class="docboss_sharepoint_background">
        <div class="an1_sharepoint">
        <span><strong>LEVERAGES&nbsp;</strong><br>
        <strong>SharePoint document&nbsp;</strong><br>
        <strong>collaboration features</strong><br>
        <ul><li>Drag &amp; drop</li>
            <li>Blogs</li>
        <li>Import/export</li>
        <li>Upload/download</li>
        <li>Full search functionality</li>
        <li>Multiple document functionality&nbsp;</li>
        <li>Document repository for projects</li>
        <li>Share documents throughout the </li>
        <li>enterprise</li>
        </ul>
        </span>
        </div>
        <div class="an2_sharepoint">
        <span>Provides enterprise visibility<br>
        to your projects without<br>
        having to login to Clarity</span>
        </div>
        <div class="an3_sharepoint">
        <span>PM's&nbsp;<br>
        become&nbsp;<br>
        SharePoint<br>
        Admins</span>
        </div>
        <div class="an4_sharepoint">
        <span>Integrated team&nbsp;<br>
        and/or collaboration&nbsp;<br>
        security from Clarity&nbsp;<br>
        to SharePoint</span>
        </div>
        <div class="an5_sharepoint"> 
        <span>Enables you to build custom Portlets<br>
         dynamically, using live Clarity data</span>
        </div>
        <div class="an6_sharepoint">
        <span>Faster, Easier<br>
        Progressive</span>
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
        
       <!-- ********************************* 
              Start  Mid Menu Bar links 
            ********************************* -->
       <div class="menu_inferior" style="">
        <div class="headmenu" style="">
        <div class="menu-ppm-boss-menu-container"><ul id="menu-ppm-boss-menu-1" class="menu">
                 <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1081"><a href="javascript::void(0);" onclick="web_down();" id="webinar_down"><img  src="<?php bloginfo("stylesheet_directory");?>/images/RB_3.2_a.png" class="rollover_effect" alt="See the Video" title="See the Video" /></a></li> 
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1079"><a href="<?php  if($pdf_href!=""){ echo $pdf_href;}else{ echo "#";}  ?>"  <?php if($pdf_href!=""){ echo 'target="_blank"';} ?>><img  src="<?php bloginfo("stylesheet_directory");?>/images/RB_3.2_b.png" class="rollover_effect" alt="Download the brief" title="Download the brief" /></a></li>
                
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1082" ><a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" title="<?php echo $demo_post_title;  ?>"><img  src="<?php bloginfo("stylesheet_directory");?>/images/RB_3.2_c.png" class="rollover_effect" alt="Schedule a demo" title="Schedule a demo" /></a></li>
            </ul></div>        
            <div><img src="<?php bloginfo('stylesheet_directory');?>/images/RB_3.2_d.png"><a href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>"  alt="Send us an email" title="Send us an email"><img  style="margin-left:9px;"src="<?php bloginfo('stylesheet_directory');?>/images/RB_3.2_e.png" class="rollover_effect"/></a></div>
       </div>
         </div>
       <div style="clear:both"></div>
       <!-- ********************************* 
              End  Mid Menu Bar links 
            ********************************* -->
     
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
            $args =  array( 'post_status' => 'publish','post_type' =>'sharepoint','post__not_in'   => array($id));
                                                          $loop = new WP_Query( $args );
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                    $showfooter=get_field("add_in_footer_module");
                                    if($showfooter=="yes")
                                    {
                                    ?>
                                   
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
        <p><?php  $cont=get_field("footer_text");

echo trim($cont);?>
          
        <a href="<?php the_permalink(); ?>">go to page</a></p>
        <div style="clear:both"></div>
        </div>
        </div>
       <?php  }
       endwhile;?> 
         </div>
        </div>
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