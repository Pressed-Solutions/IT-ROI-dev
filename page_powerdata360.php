<?php
/*
  Template Name: Layout Power Data360
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <!-- ********************************* 
        Start Top Page Menu Bar links 
    ********************************* -->
    <?php
    $pdf_link = "";
    $pdf_post_title = "";
    $pdf_href = "";


    $id = get_the_ID();

    $metarows = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE  post_id =" . $id);
    foreach ($metarows as $row => $k) {
        if ($k->meta_key == "download_the_product_brief") {
            $download_the_product_brief = $k->meta_value;
            if ($download_the_product_brief != "") {
                $pdf_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =" . $download_the_product_brief);
                $pdf_post_title = $pdf_link->post_title;
                $pdf_href = $pdf_link->guid;
            }
        } else if ($k->meta_key == "watch_the_webinar") {
            $watch_the_webinar = $k->meta_value;
            if ($watch_the_webinar != "") {
                $webinar_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =" . $watch_the_webinar);
                $webinar_post_title = $webinar_link->post_title;
                $webinar_href = $webinar_link->guid;
            }
        } else if ($k->meta_key == "schedule_a_demo") {
            $schedule_a_demo = $k->meta_value;
            if ($schedule_a_demo != "") {
                $s_demo_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =" . $schedule_a_demo);
                $demo_post_title = $s_demo_link->post_title;
                $demo_href = $s_demo_link->post_name;
            }
        } else if ($k->meta_key == "mailto_email_id") {
            $mailto_email_id = $k->meta_value;
        } else if ($k->meta_key == "mailto_subject") {
            $mailto_subject = $k->meta_value;
        } else if ($k->meta_key == "watch_the_webinar_link") {
            $watch_the_webinar_link = $k->meta_value;
        } else if ($k->meta_key == "mailto_subject") {
            $mailto_subject = $k->meta_value;
        }
    }

    $video_link = "";
    if ($watch_the_webinar_link != '') {
        $video_link = $watch_the_webinar_link;
    } else {
        $video_link = $webinar_href;
    }
    ?>
    <?php
    $watch_the_webinar_link = get_field('watch_the_webinar_link');
    $watch_the_webinar_filearray = get_field("watch_the_webinar_file");
    $imagelink = $watch_the_webinar_filearray['url'];
    ?>
    <script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/js/jquery.jplayer.min.js"></script>
    <div class="Powerdata_MainContainer" style="border: 1px solid rgb(236,236,236);border-top:none;margin-bottom:34px;">
        <div class="Powerdata_Header">
    <?php $headerarray = get_field("headerimage"); ?>
            <img src="<?php echo $headerarray['url']; ?>" height="<?php echo $headerarray['height']; ?>" width="<?php echo $headerarray['width']; ?>"/>
        </div>
    <?php /*     * ********************************************************************************************************
     * Top Menu bar Inner page
     * ******************************************************************************************************** */ ?>
        <div class="Powerdata_Topmenu" style="">
            <div>
                <div class="Powerdata_Topmenu_link">
                    <ul class="menu">
                        <li ><a  href="#" onclick="webinar_video();" id="webinar_top"><img  style="height:84px;"src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_d.png"   alt="See the Video" title="See the Video" class="rollover_effect"/></a></li>
                        <li class="Powerdata_Link"><a href="<?php if ($pdf_href != "") {
        echo $pdf_href;
    } else {
        echo "#";
    } ?>" <?php if ($pdf_href != "") {
        echo 'target="_blank"';
    } ?> alt="Download the brief" title="Download the brief"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_c.png"  alt="Download product brief" class="rollover_effect"/></a></li>
                        <li class="Powerdata_Link"><a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_b.png"  alt="Schedule a demo" title="Schedule a demo" class="rollover_effect"/></a></li>
                    </ul>
                </div>
                <div class="Powerdata_Link"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_f.png" alt="">
                    <a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" alt="Send us an email" title="Send us an email"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_e.png" alt=""  class="rollover_effect"></a>
                </div>
            </div>
        </div>
        <!-- *********************************  Start  Webinar Video Section ********************************* -->
        <div style="width: 100%;">
            &nbsp;&nbsp;
            <div id="video_new" style="width: 854px;height: 510px;display:none;margin: auto; margin-top: 10px; margin-bottom: 20px;">
                <div  style="text-align: center;display:none;" id="webinar_video">
    <?php
    if ($watch_the_webinar_link != '') {
        ?>
                        <input type="hidden" name="webnair_iframe_add" id="webnair_iframe_add" value="<?php echo $watch_the_webinar_link; ?>" />
                        <div id="webinar_iframeclose" style="text-align: right;width:100%;">
                            <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt="">
                        </div> 
                        <iframe width="854" height="480" frameborder="0" id="webinariframe" name="webinariframe" allowfullscreen="" src="" style="border: solid 1px #CCC;"></iframe>
    <?php
    } else if ($watch_the_webinar_filearray['url'] != '') {
        if (preg_match("/image/i", $watch_the_webinar_filearray['mime_type'])) {
            ?>
                            <div id="webinar_videoclose" style="text-align: right;width: 88%;">
                                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt="">
                            </div> 
                            <img src="<?php echo $imagelink; ?>" alt="" onclick="check();"  style="border: solid 1px #CCC;"> <?php
            } else {
                ?>
                            <div id="webinar_videoclose" style="text-align: right;width: 88%;">
                                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt="">
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
            <?php
        }
    }
    ?>
                </div>
            </div> 
        </div>

        <script type='text/javascript'>
                
            jQuery( "#webinar_top" ).click(function() {
                jQuery("html, body").animate({ scrollTop: 340 }, 600);
                jQuery( "#webinar_video" ).slideToggle( "slow" );
                jQuery( "#video_new" ).slideToggle( "slow" );
                var val=jQuery( "#webnair_iframe_add" ).val();
                jQuery( "#webinariframe" ).attr('src',val);

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
                jQuery("html, body").animate({ scrollTop: 340 }, 600);
                jQuery( "#webinar_video" ).slideToggle( "slow" );
                jQuery( "#video_new" ).slideToggle( "slow" );
                var val=jQuery( "#webnair_iframe_add" ).val();
                jQuery( "#webinariframe" ).attr('src',val);
            }
            function check()
            {
                jQuery( "#video_new" ).focus();
                //jQuery("html, body").animate({ scrollTop: 127 }, 600);
            }

               
        </script>            
        <!-- *********************************  End   Webinar Video Section  ********************************* -->
    <?php /*     * ********************************************************************************************************
     * Mid Main Content in the page
     * ******************************************************************************************************** */ ?>

        <div class="Powerdata_internalpagecontent" style="">
    <?php the_content(); ?>

    <?php /*     * ********************************************************************************************************
     * Mid Menu bar Inner page
     * ******************************************************************************************************** */ ?>
            <div class="Powerdata_Midmenu" >

                <div class="Powerdata_Midmenu_link" >
                    <span style="margin-right: 77px;"> <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_b.png"  alt="Schedule a demo" title="Schedule a demo" class="rollover_effect"/></a></span>
                    <span><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_f.png" alt="" style="margin-right: 5px;"><a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" alt="Send us an email" title="Send us an email"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/PowerData360_topmenubar_e.png" alt=""  class="rollover_effect"></a></span>
                </div>
            </div>
            <?php /*             * ********************************************************************************************************
             * bottom Content in the page
             * ******************************************************************************************************** */ ?>
            <div style="margin-top: -20px;"> 
                <div ><h2 class="Powerdata_Title"><?php $reporting_titlearray = get_field("reporting_title");
        echo $reporting_titlearray; ?></h2></div>
                <div class="Powerdata_SubTitle" style="margin-top: -30px;"><?php $reporting_sub_titlearray = get_field("reporting_sub_title");
        echo $reporting_sub_titlearray; ?></div>
                <div class="Powerdata_contentdata">
    <?php $reporting_imagearray = get_field("reporting_image"); ?>
                    <img src="<?php echo $reporting_imagearray['url']; ?>" height="<?php echo $reporting_imagearray['height']; ?>" width="<?php echo $reporting_imagearray['width']; ?>"/></div>

            </div> 
            <div class="Powerdata_bottom" style=""> 

                <div>
    <?php $reporting_imagearray = get_field("reporting_footer_image"); ?>
    <?php $reporting_footer_linkarray = get_field("reporting_footer_link"); ?>
                    <?php $reporting_footer_link_labelarray = get_field("reporting_footer_link_label"); ?>
                    <span style="" class="Powerdata_bottom_poweredby"> powered by </span> <span class="Powerdata_bottom_image"> <img src="<?php echo $reporting_imagearray['url']; ?>" height="<?php echo $reporting_imagearray['height']; ?>" width="<?php echo $reporting_imagearray['width']; ?>"/></span>
                    <span class="Powerdata_bottom_link"> <a  href="<?php echo $reporting_footer_linkarray; ?>"><?php echo $reporting_footer_link_labelarray; ?></a></span>
                </div> 

            </div>
        </div>
                <?php endwhile; ?>
</div>
</div>  
</section>
</div>
<?php get_footer(); ?>