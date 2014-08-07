<?php
/*
  Template Name Posts: Migration Bridge
 */
get_header();
?>
<script src="http://jwpsrv.com/library/oJkaMmiaEeOoySIACi0I_Q.js"></script>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">

        <!------------Slider Start----------->


        <div class="integrationslider" style="">
<?php //dynamic_sidebar('integration_bridge');  ?>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/migration_bridge.png" width="1200"/>
        </div>
        <!------------Slider Finish----------->
        <!------------header link start------->
        <div class="border">
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
                $video_link = $watch_the_webinar_link;
            }
            ?>
            <div class="integrationhead">
                <div class="headmenu">

                    <div class="integrateheadmenu"  style="margin-left: 78px;">
                        <a  href="<?php if ($pdf_href != "") {
                echo $pdf_href;
            } else {
                echo "#";
            } ?>" title="<?php echo $pdf_post_title; ?>"  <?php if ($pdf_href != "") {
                echo 'target="_blank"';
            } ?>><img style="margin-top: 15px;" style="background:none;" src="<?php bloginfo("stylesheet_directory"); ?>/images/11_a.png" class="rollover_effect" alt="Download product brief" title="Download product brief" />
                        </a>
                    </div>
                    <div class="integrateheadmenu" style="margin-left: 77px;">
                        <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" title="<?php echo $demo_post_title; ?>"><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/12_b.png" class="rollover_effect"  style="margin-right:14px;margin-top: 15px;"  alt="Schedule a demo" title="Schedule a demo"/>
                        </a>
                    </div>
                    <div class="integrateheadmenu" style="margin-left: 62px;">
                        <img src="<?php bloginfo("stylesheet_directory"); ?>/images/12_c.png"  style="float: left;margin-top: 23px;">
                        <div style="float: left;margin-left: 12px;margin-top: 19px;"><a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" ><img src="<?php bloginfo("stylesheet_directory"); ?>/images/12_d.png" alt="Send us an email" title="Send us an email" class="rollover_effect"/></a></div>
                    </div>


                    <div style="clear: both"></div>

                </div>
            </div>
            <!------------header link finish------->
            <!---- video section start------------->
            <div  style="text-align: center; padding-left: 25%;display:none;" id="webinar_video">
                <div id="webinar_close" style="text-align: right;width: 72%;">
                    <img src="<?php bloginfo("stylesheet_directory"); ?>/images/fancy_close.png" alt=""></div>
                <div id="playerfvxmwCNhFUWE" style="text-align: center;">
                </div>
            </div>  
            <script src="http://jwpsrv.com/library/oJkaMmiaEeOoySIACi0I_Q.js"></script>
            <script type='text/javascript'>
            
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
                    jwplayer('playerfvxmwCNhFUWE').stop();

                });
                function check()
                {
                    $( "#webinar_video" ).slideToggle( "slow" );
                    $( "#webinar_video" ).focus();
                    $("html, body").animate({ scrollTop: 127 }, 600);
                }

            
                jwplayer('playerfvxmwCNhFUWE').setup({
                    file: '<?php echo $video_link; ?>',
                    width: '640',
                    height: '360',
                    fallback: 'false',
                    primary: 'flash'
                });
            </script>
            <!-------------finish video div------------>
            <!------------Page Content Start----------->

            <div class="integratepagecontent">
<?php while (have_posts()) : the_post(); ?>

    <?php
    $custom = get_post_custom($post->ID);
    /*   start section first section */
    ?>


                    <div class="field-item even" property="schema:name" style="text-align:center">
                        <h1 style="font-weight:bold;margin-top:43px;"><?php the_field('section_1_title-1'); ?></h1>
                        <h2 style="text-align: center;margin-top: -3px;"><?php the_field('section_1_title-2'); ?></h2>
                        <h3 style="font-size: 18px;text-align: center;"><?php the_field('section_1_title-3'); ?></h3>
                    </div>
    <?php
    $video_link_1 = get_field('video_link-1');
    if ($video_link_1 != '') {
        ?>
                        <div id="video" style="width: 854px;height: 480px;margin: auto;">

                            <!-- ********************************* 
                                        Start  Webinar Video Section
                                      ********************************* -->
                            <div  style="text-align: center; display:block;" id="webinar_video">

                                <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                </div>
                            </div>  

                            <script type='text/javascript'>
                    
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
                                    file: '<?php echo $video_link_1; ?>',
                                    width: '854',
                                    height: '480',
                                    fallback: 'false',
                                    primary: 'flash'
                                });
                            </script>
                            <!-- ********************************* 
                            End   Webinar Video Section
                            ********************************* -->

                        </div>
        <?php
    }
    $video_file_1 = get_field('video_file-1');
    if ($video_file_1 != '') {
        ?>
                        <div id="video" style="width: 854px;height: 480px;margin: auto;">

                            <!-- ********************************* 
                                        Start  Webinar Video Section
                                      ********************************* -->
                            <div  style="text-align: center; display:block;" id="webinar_video">

                                <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                </div>
                            </div>  

                            <script type='text/javascript'>
                    
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
                                    file: '<?php echo $video_file_1; ?>',
                                    width: '854',
                                    height: '480',
                                    fallback: 'false',
                                    primary: 'flash'
                                });
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
                        <div style="text-align: center;margin-top:20px;">
                            <img src="<?php echo $image1; ?>" style="margin-bottom: 57px; margin-top: 33px;"/>
                        </div>
                        <?php
                    }
                    ?>
                    <div style="clear: both;"></div>
                    <?php
                    $content = $post->post_content;
                    if ($content != "") {
                        echo $content;
                    }

                    /*   finish section first section */

                    /*   start section second section */


                    $title = get_field('title');
                    if ($title != "") {
                        ?>   
                        <h1 style="text-align:center;margin-top: 56px;font-weight: bold;"><?php echo $title; ?></h1>
                        <?php
                    }
                    $title4 = get_field('section_2_title-1');
                    if ($title4 != "") {
                        ?>
                        <h2 style="font-size: 30px; font-weight:bold;text-align:center;"><?php echo $title4; ?> </h2>
                    <?php
                    }
                    $title5 = get_field('section_2_title-2');
                    if ($title5 != "") {
                        ?>
                        <h3 style="font-size: 18px;"><?php echo $title5; ?></h3>
                    <?php } ?>

                    <div style="clear: both"></div>                                                              
                    <div class="field-item even" style="text-align: justify;padding-top: 6px;" property="schema:articleBody content:encoded">
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
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                        file: '<?php echo $video_link_2; ?>',
                                        width: '854',
                                        height: '480',
                                        fallback: 'false',
                                        primary: 'flash'
                                    });
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
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                    });
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image2 != "") {
        ?>
                            <div style="text-align: center;margin-top: 30px;">
                                <img src="<?php echo $image2; ?>"/>
                            </div>
        <?php
    }
    ?>
                        <div style="clear: both;"></div>

                        <?php
                        $sectiondescription_2 = get_field('section-2_description');
                        if ($sectiondescription_2 != "") {
                            echo $sectiondescription_2;
                        }

                        /*   finish section second section */

                        /*   start section third section */

                        $title6 = get_field('section_3_title-1');
                        $title7 = get_field('section_3_title-2');
                        $title8 = get_field('section_3_title-3');
                        $section_3_description = get_field('section-3_description');
                        $video_link_3 = get_field('video_link-3');
                        $video_file_3 = get_field('video_file-3');
                        $image_3 = get_field('image-3');
                        $title_9 = get_field('section_4_title-1');
                        $title_10 = get_field('section_4_title-2');
                        $title_11 = get_field('section_4_title-3');
                        $video_link_4 = get_field('video_link-4');
                        $video_file_4 = get_field('video_file-4');
                        $image_4 = get_field('image-4');
                        $section_4_description = get_field('section-4_description');
                        ?>  
                        <?php
                        if ($title6 != "") {
                            ?>
                            <h1 style="text-align:center;font-weight: bold"><?php echo $title6; ?></h1>
                            <?php
                        }
                        ?>
                        <?php
                        if ($title7 != "") {
                            ?>
                            <h2 style="text-align:center"><?php echo $title7; ?></h2>
                            <?php
                        }
                        if ($title8 != "") {
                            ?>
                            <h3 style="text-align:center"><?php echo $title8; ?></h3>
                            <?php
                        }
                        if ($video_link_3 != '') {
                            ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                    });
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($video_file_3 != '') {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                    });
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image_3 != "") {
        ?>
                            <div style="padding-top: 30px;text-align: center;">
                                <img src="<?php echo $image_3; ?>"/>
                            </div>
        <?php
    }
    ?>
                        <div style="clear:both"></div>
    <?php
    if ($section_3_description != "") {
        ?>
                            <div style="padding-top: 5px;"><?php echo $section_3_description; ?></div>
                            <?php
                        }
                        /*   finish third section */

                        /* start footer menu section   */
                        ?>

                        <div class="" style="margin-top: -6px;">
                            <div style="margin: auto;">
                                <div class="">

                                    <div class="integrateheadmenu"  style="float: left">
                                        <a  href="<?php if ($pdf_href != "") {
                        echo $pdf_href;
                    } else {
                        echo "#";
                    } ?>"  <?php if ($pdf_href != "") {
                        echo 'target="_blank"';
                    } ?>><img style="margin-top: 15px;margin-left:-17px;" style="background:none;" src="<?php bloginfo("stylesheet_directory"); ?>/images/21_a.png" class="rollover_effect" alt="Download product brief" title="Download product brief"/>
                                        </a>
                                    </div>
                                    <div class="integrateheadmenu" style="margin-left: 37px;float: left">
                                        <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img  src="<?php bloginfo("stylesheet_directory"); ?>/images/21_b.png" class="rollover_effect" style="margin-right:14px;margin-top: 15px;" alt="Schedule a demo" title="Schedule a demo"/>
                                        </a>
                                    </div>
                                    <div class="integrateheadmenu" style="margin-left: 39px;float: left">
                                        <img src="<?php bloginfo("stylesheet_directory"); ?>/images/21_c.png" style="float: left;margin-top: 22px;">
                                        <div style="float: left;margin-left: 14px;margin-top: 19px;"><a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>" ><img src="<?php bloginfo("stylesheet_directory"); ?>/images/21_d.png" alt="Send us an email" title="Send us an email" class="rollover_effect" /></a></div>
                                    </div>




                                </div>
                            </div>
                        </div>

    <?php
    /* finish footer menu section */
    /*   start fourth section */


    if ($title_9 != "") {
        ?>
                            <h1 style="text-align:center;margin-bottom: 0px;font-weight: bold;"><?php echo $title_9; ?></h1>
        <?php
    }
    if ($title_10 != "") {
        ?>
                            <h2 style="text-align:center;margin-bottom: 0px;"><?php echo $title_10; ?></h2>
                            <?php
                        }
                        if ($title_11 != "") {
                            ?>
                            <h3 style="text-align:center;margin-top: 6px;"><?php echo $title_11; ?></h3>
                            <?php
                        }
                        if ($video_link_4 != '') {
                            ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                    });
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($video_file_4 != '') {
        ?>
                            <div id="video" style="width: 854px;height: 480px;margin: auto;">

                                <!-- ********************************* 
                                            Start  Webinar Video Section
                                          ********************************* -->
                                <div  style="text-align: center; display:block;" id="webinar_video">

                                    <div id="playerfvxmwCNhFUWE11" style="text-align: center;">
                                    </div>
                                </div>  

                                <script type='text/javascript'>
                    
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
                                    });
                                </script>
                                <!-- ********************************* 
                                End   Webinar Video Section
                                ********************************* -->

                            </div>
        <?php
    }
    if ($image_4 != "") {
        ?>
                            <div style="padding-top: 30px;text-align: center;">
                                <img src="<?php echo $image_4; ?>"/>
                            </div>
        <?php
    }
    ?>
                        <div style="clear:both;"></div>
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
                    <?php
                    ?>

            <div class="integration_bottom" style="height:101px;padding-left: 227px;">
                <div style="">
                    <ul>
                        <li>
                            <h3>Integration tools: </h3>
                        </li><?php
                    $query = "select * from wp_posts where post_type='integration' and post_name='ppm-excel-interface'";
                    $w = mysql_query($query);
                    while ($result = mysql_fetch_array($w)) {
                        ?>

                            <li>
                                <a href="<?php echo  $permalink = get_permalink( $result['ID']); ?>" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>"> <?php echo $result['post_title']; ?> 
                                </a>
                            </li>

                <?php
            }
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