<?php
/*
  Template Name Posts: ppm excel interface
 */
get_header();
?>
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/js/jquery.jplayer.min.js"></script>
<script type='text/javascript'>
    
    function check()
    { 
        jQuery("html, body").animate({ scrollTop: 500 }, 600);
    }

</script>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $( '#brief' ).click(function() {

            $('html, body').animate({
                scrollTop: $('#brief').attr('.widget_sp_image').offset().top
            }, 2000);

        });
        $('#brief').click(function(event){
            $('.widget_sp_image').html(event.target.id);
        });
    
    });
    
</script>
<div class="internalcontent" style="padding: 0px 0px 30px 0px;">
    <div class="internalpage clearfix">

        <!------------Slider Start----------->


        <div class="integrationslider" style="">
<?php //dynamic_sidebar('integration_bridge');  ?>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/PPMExcel_interface_header.png" width="1200"/>
        </div>
        <!------------Slider Finish----------->
        <!------------header link start------->
        <div class="border">
            <?php
            $pdf_link = "";
            $pdf_post_title = "";
            $pdf_href = "";
            $register_for_trial = "";


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
                } else if ($k->meta_key == "register_for_free_trial") {
                    $register_for_trial = $k->meta_value;
                    if ($register_for_trial != "") {
                        $register_for_trial_link = $wpdb->get_row("SELECT * FROM wp_posts WHERE ID =" . $register_for_trial);
                        $register_for_trial_title = $register_for_trial_link->post_title;
                        $register_for_trial_href = $register_for_trial_link->post_name;
                    }
                }
            }
            ?>
            <div class="integrationhead" style="padding-right:17px;">
                <div class="headmenu">
                    <div class="integrateheadmenu" style="padding-left:60px;">
                        <a  href="#" onclick="check();" id="webinar_top" style="margin-top: 15px;"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_a.png" class="rollover_effect" alt="See the video" title="See the video" />
                        </a>
                    </div>
                    <div class="integrateheadmenu"  style="margin-left: 35px;">
                        <a  href="<?php if ($pdf_href != "") {
                echo $pdf_href;
            } else {
                echo "#";
            } ?>" title="<?php echo $pdf_post_title; ?>"  <?php if ($pdf_href != "") {
                echo 'target="_blank"';
            } ?>><img style="margin-top: 15px;" style="background:none;" src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_b.png" class="rollover_effect" alt="Download the brief" title="Download the brief" />
                        </a>
                    </div>
                    <!--<div class="integrateheadmenu" style="margin-left: 62px;">
                        <a href="<?php if ($register_for_trial_href != "") {
                echo get_site_url() . "/" . $register_for_trial_href;
            } else {
                echo "#";
            } ?>" title="<?php echo $register_for_trial_title; ?>"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_1.1_d.png" class="rollover_effect" alt="Register for a free trial" title="Register for a free trial"  style="margin-right:14px;"/>
                        </a>

                    </div>-->
                    <div class="integrateheadmenu" style="margin-left: 30px;">
                        <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" title="<?php echo $demo_post_title; ?>"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_c.png" class="rollover_effect" alt="Schedule a demo" title="Schedule a demo"  style="margin-right:14px;margin-top: 15px;"/>
                        </a>
                    </div>
                    <!--<div style="clear: both"></div>-->

                <!--</div>-->
                <div style="margin: auto;width: 222px;float:left;margin-left:20px;">
                    <img src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_d.png" alt="" style="float: left;margin-top: 25px;">
                    <div style="float: left;margin-left: 12px;margin-top: 19px;"><a title="Send us an email" href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" ><img src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_e.png" alt="Send us an email" title="Send us an email" class="rollover_effect" /></a></div>
                    <div style="clear: both"></div>
                </div>
		</div>

            </div>


            <div style="clear: both"></div> 
            <!------------header link finish------->
            <!------------Page Content Start----------->

            <div class="integratepagecontent">
<?php while (have_posts()) : the_post(); ?>

    <?php
    $custom = get_post_custom($post->ID);

    /*   start first section */
    ?>


                    <div class="field-item even" property="schema:name" style="text-align:center;padding-top: 4px">

                        <div id="video_new" style="width: 854px;height: 510px;margin: auto;  display:none;margin-bottom: 20px;">

                            <!-- *********************************  Start  Webinar Video Section ********************************* -->
                            <div  style="text-align: center;display:none;" id="webinar_video">

    <?php
    $video_link_1 = get_field('watch_the_webinar_link');
    $video_file_1 = get_field('watch_the_webinar');

    if ($video_link_1 != '') {
        ?>
                                    <input type="hidden" name="webnair_iframe_add" id="webnair_iframe_add" value="<?php echo $video_link_1; ?>" />
                                    <div id="webinar_iframeclose" style="text-align: right;width: 100%;">
                                        <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt="">
                                    </div> 
                                    <iframe width="854" height="480" frameborder="0" id="webinariframe" name="webinariframe" allowfullscreen="" src="" style="border: solid 1px #CCC;"></iframe>
                                <?php } else if ($video_file_1 != '') { ?>
                                    <div id="webinar_videoclose" style="text-align: right;width: 100%;">
                                        <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt="">
                                    </div>
                                    <script type="text/javascript">
                                        //<![CDATA[
                                        $(document).ready(function(){

                                            $("#jquery_jplayer_1").jPlayer({
                                                ready: function () {
                                                    $(this).jPlayer("setMedia", {
                                                        m4v: "<?php echo $video_file_1; ?>"
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
                                    jQuery("html, body").animate({ scrollTop: 500 }, 600);
                                });
                

         
                                jQuery( "#webinar_videoclose" ).click(function() {
                                    jQuery( "#webinar_video" ).slideToggle("slow");
                                    jQuery( "#video_new" ).slideToggle( "slow" );
                                });

                                jQuery( "#webinar_iframeclose" ).click(function() {
                                    jQuery( "#webinariframe" ).attr('src',"");
                                    jQuery( "#webinar_video" ).slideToggle("slow");
                                    jQuery( "#video_new" ).slideToggle( "slow" );
                                });

                                function web_down()
                                {    
                                    jQuery( "#webinar_video" ).slideToggle( "slow" );
                                    jQuery( "#video_new" ).slideToggle( "slow" );
                                    var val=jQuery( "#webnair_iframe_add" ).val();
                                    jQuery( "#webinariframe" ).attr('src',val);
                                    jQuery("html, body").animate({ scrollTop: 500 }, 600);
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
    <?php
    $section_1_title_1 = get_field('section_1_title-1');
    if ($section_1_title_1 != "") {
        ?> <div style="height:5px; "></div> 
                            <h1 style="font-weight:bold;font-size: 2.2em;letter-spacing: -0.02em;"><?php the_field('section_1_title-1'); ?> </h1>
    <?php } ?>
    <?php
    $section_1_title_2 = get_field('section_1_title-2');
    if ($section_1_title_2) {
        ?>

                            <h2 style="" ><?php the_field('section_1_title-2'); ?>  </h2>
                            <?php
                        }
                        ?>
                        <?php
                        $section_1_title_3 = get_field('section_1_title-3');
                        if ($section_1_title_3) {
                            ?>
                            <h3 style="font-size: 18px;margin-top: -4px;margin-bottom:32px;font-weight:bold;"><?php the_field('section_1_title-3'); ?></h3>
        <?php
    }
    ?>
                    </div>
                        <?php
                        $video_file_1 = get_field('video_file-1');
                        if ($video_file_1 != '') {
                            ?>
                        <div id="video" style="width: 854px;height: 480px;margin: auto;">

                            <!-- ********************************* 
                                        Start  Webinar Video Section
                                      ********************************* -->
                            <div  style="text-align: center; display:none;" id="webinar_video111">

                                <div id="playerfvxmwCNhFUWE11111" style="text-align: center;">
                                </div>
                            </div>  

                            <script type='text/javascript'>
                                /*    
                            $( "#webinar_top" ).click(function() {
         
                            $( "#webinar_video" ).slideToggle( "slow" );
                            $("html, body").animate({ scrollTop: 127 }, 600);
                            });

                            $( "#webinar_down" ).click(function() {
           

                            $( "#webinar_video" ).slideToggle( "slow" );
                            $( "#webinar_focus" ).focus();
                            });

                            $( "#webinar_close" ).click(function() {
                            $( "#webinar_video" ).slideToggle("slow");
                            jwplayer('playerfvxmwCNhFUWE11').stop();

                            });
                            function check()
                            {   
                            $("html, body").animate({ scrollTop: 127 }, 600);
                            }

                    
                                            jwplayer('playerfvxmwCNhFUWE11').setup({
                                                file: '<?php echo $video_file_1; ?>',
                                                width: '854',
                                                height: '480',
                                                fallback: 'false',
                                                primary: 'flash'
                                            }); */
                            </script>
                            <!-- ********************************* 
                            End   Webinar Video Section
                            ********************************* -->

                        </div>
        <?php
    }
    $image1 = get_field("image-1");
    if ($image1 != "") {
        ?>
                        <div style="text-align: center;">
                            <img src="<?php echo $image1; ?>"/>
                        </div>
        <?php
    }
    ?>
    <?php
    $content = $post->post_content;
    if ($content != "") {
        echo "<p>" . $content . "</p>";
    }

    /*   finish first section */

    /*   start second section */
    ?>
                    <?php
                    $title = get_field('title');
                    if ($title != "") {
                        ?>
                        <h1 style="text-align:center;margin-top: 56px;font-weight: bold;"></h1>
                        <?php
                    }

                    $title4 = get_field('section_2_title-1');
                    $title7 = get_field('section_2_title-2');
                    if ($title4 != "") {
                        ?>
                        <h1 style="text-align:center;"><?php echo $title4; ?></h1>
                        <?php
                    }
                    if ($title5 != "") {
                        ?>
                        <h1 style="text-align:center"><?php echo $title5; ?></h1>
                        <?php
                    }
                    ?>
                    <div class="headmenu">
                        <div class="integrateheadmenu"  style="float:left;margin-left:-17px;padding-left:155px;">
                            <a  href="<?php if ($pdf_href != "") {
                    echo $pdf_href;
                } else {
                    echo "#";
                } ?>" title="<?php echo $pdf_post_title; ?>"  <?php if ($pdf_href != "") {
                    echo 'target="_blank"';
                } ?>><img  style="background:none;" src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_1.2_a.png" class="rollover_effect" alt="Download the brief" title="Download the brief"/>
                            </a>
                        </div>
                        <div class="integrateheadmenu" style="margin-left: 47px;float:left">
                            <a  href="#" onclick="web_down();" id="webinar_down" style=""><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_1.2_b.png" class="rollover_effect" alt="See the video" title="See the video"/>
                            </a>
                        </div>

                        <!--<div class="integrateheadmenu" style="margin-left: 48px;float:left">
                            <a href="<?php if ($register_for_trial_href != "") {
                    echo get_site_url() . "/" . $register_for_trial_href;
                } else {
                    echo "#";
                } ?>" ><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_1.2_c.png" class="rollover_effect"  style="margin-right:14px;" alt="Register for a free trial" title="Register for a free trial" />
                            </a>

                        </div>-->
                        <div class="integrateheadmenu" style="margin-left: 34px;float:left">
                            <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_1.2_d.png" class="rollover_effect" alt="Schedule a demo" title="Schedule a demo" />
                            </a>
                        </div>





                    </div>
                    <div style="clear: both"></div>                                                              
                    <div class="field-item even" style="text-align: justify;padding-top: 5px;" property="schema:articleBody content:encoded">
    <?php
    $video_link_2 = get_field('video_link-2');
    $video_file_2 = get_field('video_file-2');
    $image2 = get_field('image-2');
    if ($video_file_2 != "") {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video1">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top1" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_link_2; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                });*/
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($video_file_2 != "") {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video2">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_file_2; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                });*/
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image2 != "") {
        ?>
                            <img src="<?php echo $image2; ?>"/>
        <?php
    }
    ?>
                        <div style="clear: both;"></div>
                        <?php
                        $sectiondescription_2 = get_field('section-2_description');
                        if ($sectiondescription_2 != "") {
                            echo $sectiondescription_2;
                        }

                        /*   finish second section */

                        /*   start third section */

                        $title6 = get_field('section_3_title-1');
                        $title7 = get_field('section_3_title-2');
                        $title8 = get_field('section_3_title-3');
                        $section_3_description = get_field('section-3_description');
                        $video_link_3 = get_field('video_link-3');
                        $video_file_3 = get_field('video_file-3');
                        $image_3 = get_field('image-3');
                        $title9 = get_field('section_4_title-1');
                        $title10 = get_field('section_4_title-2');
                        $title11 = get_field('section_4_title-3');
                        $video_link_4 = get_field('video_link-4');
                        $video_file_4 = get_field('video_file-4');
                        $image_4 = get_field('image-4');
                        $section_4_description = get_field('section-4_description');
                        ?>  
                        <?php
                        if ($title6 != "") {
                            ?>
                            <h1 style="font-weight:bold;font-size: 2.2em;letter-spacing: -0.02em;text-align: center;"><?php echo $title6; ?></h1>
                            <?php
                        }
                        if ($title7 != "") {
                            ?>
                            <h2 style="text-align:center;margin-top:-17px;font-size: 2.0em;"><?php echo $title7; ?></h2>
                            <?php
                        }
                        if ($video_link_3 != "") {
                            ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video3">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_link_3; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                });*/
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($video_file_3 != "") {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video4">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_file_3; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                });*/
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image_3 != "") {
        ?>
                            <div style="text-align: center;">
                                <img src="<?php echo $image_3; ?>"/>
                            </div>
        <?php
    }
    ?>
                        <div style="clear: both"></div>
    <?php
    if ($section_3_description != "") {
        ?>
                            <div style="padding-left: 27.5%">

                                <p><?php echo strip_tags($section_3_description, '<div><span><li><ul><ol><a><br/><br>'); ?></p>

                            </div>
                            <?php
                        }

                        /*   finish third section */

                        /*   start footer menu section */
                        ?>
                        <div class="integrationmanamenu_inferior" style="">
                            <div style="margin: auto;width: 222px;">
                                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_d.png"  style="float: left;margin-top: 25px;">
                                <div style="float: left;margin-left: 12px;margin-top: 19px;"><a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" ><img src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_e.png" alt="Send us an email" title="Send us an email" class="rollover_effect"/></a></div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
    <?php
    /*   finish footer menu section */

    /*   start fourth section */

    if ($title9 != "") {
        ?>
                            <div >
                                <h1 style="text-align:center;font-weight: bold; margin-top: 52px;"><?php echo $title9; ?></h1>
                            </div>
        <?php
    }
    if ($title11 != "") {
        ?>
                            <div >
                                <h2 style="text-align:center"><?php echo $title11; ?></h2>
                            </div>
                            <?php
                        }
                        if ($video_link_4 != "") {
                            ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video5">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_link_4; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                });*/
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($video_file_4 != "") {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video7">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                                    /*
                                $( "#webinar_top" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                });

                                $( "#webinar_down" ).click(function() {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_focus" ).focus();
                                });

                                $( "#webinar_close" ).click(function() {
                                $( "#webinar_video" ).slideToggle("slow");
                                jwplayer('playerfvxmwCNhFUWE11').stop();

                                });
                                function check()
                                {
                                $( "#webinar_video" ).slideToggle( "slow" );
                                $( "#webinar_video" ).focus();
                                $("html, body").animate({ scrollTop: 127 }, 600);
                                }

                    
                                                jwplayer('playerfvxmwCNhFUWE11').setup({
                                                    file: '<?php echo $video_file_4; ?>',
                                                    width: '854',
                                                    height: '480',
                                                    fallback: 'false',
                                                    primary: 'flash'
                                                }); */
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image_4 != "") {
        ?>
                            <div style="text-align: center;">
                                <img src="<?php echo $image_4; ?>"/>
                            </div>
        <?php
    }
    ?>
                        <div style="clear: both"></div>
    <?php
    if ($section_4_description != "") {
        ?>
                            <div style="padding-top: 5px;"><?php echo $section_4_description; ?></div>
        <?php
    }
    /*   finish fourth section */
    ?>

                    </div>

                    <?php endwhile; ?>
            </div>
            <div style="clear: both"></div>
                    <?php ?>

            <div class="integration_bottom" style="height:101px;padding-left: 227px;">
                <div style="">
                    <ul>
                        <li>
                            <h3>Integration tools: </h3>
                        </li> <?php
                    $query = "select * from wp_posts where post_type='integration' and post_name='integration-bridge'";
                    $w = mysql_query($query);
                    while ($result = mysql_fetch_array($w)) {
                        ?>

                            <li>
                                <a href="<?php echo  $permalink = get_permalink( $result['ID']); ?>" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>"> <?php echo $result['post_title']; ?> 
                                </a>
                            </li>

                        <?php
                    }
                    $query = "select * from wp_posts where post_type='integration' and post_name='integration-manager'";
                    $w = mysql_query($query);
                    while ($result = mysql_fetch_array($w)) {
                        ?>

                            <li>
                                <a href="<?php echo  $permalink = get_permalink( $result['ID']); ?>" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>"> <?php echo $result['post_title']; ?> 
                                </a>
                            </li>

    <?php
}
$query = "select * from wp_posts where post_type='integration' and post_name='migration-bridge'";
$w = mysql_query($query);
while ($result = mysql_fetch_array($w)) {
    ?>

                            <li>
                                <a href="<?php echo  $permalink = get_permalink( $result['ID']); ?>" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>"> <?php echo $result['post_title']; ?> 
                                </a>
                            </li>

    <?php
}
?>
                    </ul>
                </div>
            </div>
            <div style="clear: both"></div>                  
        </div>

        <!------------Page Content finish------>
        <!------------Sidebar start------------->

        <div class="integrate_out_sidebar">
                        <?php //dynamic_sidebar('integration_bridge_ib3'); ?>

        </div>
        <!---------------Sidebar Finish----------->
    </div>
</div>

</div> 
</div>
</section>
</div>
                        <?php get_footer(); ?>