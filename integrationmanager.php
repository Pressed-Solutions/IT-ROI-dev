<?php
/*
  Template Name Posts: Integration Manager
 */
get_header();
?>
<div class="internalcontent" style="padding: 0px 0px 40px 0px;">
    <div class="internalpage clearfix">

        <!------------Slider Start----------->


        <div class="integrationslider" style="">
<?php //dynamic_sidebar('integration_bridge');  ?>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/IM.png" width="1200"/>
        </div>
        <!------------Slider Finish----------->
        <!------------header link start------->


        <!------------header link finish------->
        <!------------Page Content Start----------->
        <div class="border" style="margin-top: -61px;padding-top: 61px;">
            <div class="integratepagecontent">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $custom = get_post_custom($post->ID);

                    /*   start first section */
                    ?>
                    <div class="field-item even" property="schema:name" style="text-align:center">
                        <h1 style="font-weight: bold;margin-top: 73px;text-align: center;"><?php the_field('section_1_title-1'); ?></h1>
                        <h2 style="text-align: center;"><?php the_field('section_1_title-2'); ?></h2>
                        <h3 style="font-size: 18px;text-align: center;"><?php the_field('section_1_title-3'); ?></h3>
                    </div>
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
                        <div style="text-align: center;">
                            <img src="<?php echo $image1; ?>"/>
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
    /*   finish  first section */

    /*   start  second section */
    ?>
    <?php
    $title = get_field('title');
    if ($title != "") {
        ?>   
                        <h1 style="text-align:center;margin-top: 56px;font-weight: bold;"><?php echo $title; ?></h1>
                        <?php
                    }

                    $title4 = get_field('section_2_title-1');
                    $title7 = get_field('section_2_title-2');
                    if ($title4 != "") {
                        ?>
                        <h1 style="text-align:center"><?php echo $title4; ?></h1>
                        <?php
                    }
                    if ($title5 != "") {
                        ?>
                        <h1 style="text-align:center"><?php echo $title5; ?></h1>
                        <?php
                    }
                    ?>
                    <div style="clear: both"></div>                                                              
                    <div class="field-item even" style="text-align: center;padding-top: 7px;" property="schema:articleBody content:encoded">
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
                            <div style="text-align: center;margin-top:30px;">
                                <img src="<?php echo $image2; ?>"/>
                                <div>
        <?php
    }
    ?>
                                <div style="clear: both;"></div>
    <?php
    $sectiondescription_2 = get_field('section-2_description');
    if ($sectiondescription_2 != "") {
        echo $sectiondescription_2;
    }
    /*   finish  second section */

    /*   start  third section */

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
                                    <h1 style="text-align:center;"><?php echo $title6; ?></h1>
                                    <?php
                                }
                                if ($title7 != "") {
                                    ?>
                                    <h2 style="text-align:center;margin-top: -5px;"><?php echo $title7; ?></h2>
                                    <?php
                                }
                                if ($video_link_3 != "") {
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
    if ($video_file_3 != "") {
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
                                    <div style="text-align: center;">
                                        <img src="<?php echo $image_3; ?>"/>
                                    </div>
        <?php
    }
    ?>
                                <div style="clear: both;"></div>
    <?php
    if ($section_3_description != "") {
        ?>
                                    <div style="padding-top: 5px;"><?php echo $section_3_description; ?></div>
        <?php
    }

    /*   finish  third section */

    /*   start  footer menu section */
    ?>

                                <div class="integrationmenu_inferior" style="width:514px;margin-top: 60px;margin-bottom: 65px;">
                                    <div>

                                        <div style="float:left;">
                                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/RB_2.1_d.png"  style="margin-right:5px;margin-top: 6px;float: left;">
                                            <a  href="mailto:<?php echo $mailto_email_id; ?>?subject=<?php echo $mailto_subject; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/RB_2.1_e.png" alt="Send us an email" title="Send us an email" class="rollover_effect"/></a></div>
                                        <div style=" float: left;margin-left: 53px;">
                                            <a href="<?php echo get_site_url(); ?>/<?php echo $demo_href; ?>" ><img src="<?php bloginfo("stylesheet_directory"); ?>/images/RB_2.1_c.png" class="rollover_effect"  alt="Schedule a demo" title="Schedule a demo" />
                                            </a>
                                        </div>
                                    </div>

                                </div>

                                <div style="clear:both"></div>
                                <?php
                                /* finish footer menu section */

                                /*   start fourth section */

                                if ($title9 != "") {
                                    ?>
                                    <h1 style="text-align:center"><?php echo $title9; ?></h1>
                                    <?php
                                }
                                if ($title10 != "") {
                                    ?>
                                    <h2 style="text-align:center"><?php echo $title10; ?></h2>
        <?php
    }
    if ($video_link_4 != "") {
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
    if ($video_file_4 != "") {
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
                                    <div style="text-align: center;">
                                        <img src="<?php echo $image_4; ?>"/>
                                    </div>
        <?php
    }
    ?>
                                <div style="clear: both;"></div>
    <?php
    if ($section_4_description != "") {
        ?>
                                    <div style="padding-top: 5px;"><?php echo $section_4_description; ?></div>
        <?php
    }
    /*   finish  fourth section */
    ?>

                            </div>

<?php endwhile; ?>
                    </div>
                    <div style="clear: both"></div>
<?php ?>

                    <div class="integration_bottom" style="height:101px;padding-left: 227px;">
                        <div style="">

                            <ul><li>
                                    <h3>Integration tools: </h3>
                                </li>
                            <?php
                            $query = "select * from wp_posts where post_type='integration' and post_name='ppm-excel-interface'";
                            $w = mysql_query($query);
                            while ($result = mysql_fetch_array($w)) {
                                ?>

                                    <li>
                                        <a href="<?php echo  $permalink = get_permalink( $result['ID']); ?>" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>"><?php echo $result['post_title']; ?> 
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
                        <div style="clear:both;"></div>
                    </div>

                </div>                   


                <!------------Page Content finish------>
                <!------------Sidebar start------------->


                <!---------------Sidebar Finish----------->
            </div>
        </div>

    </div> 
</div>
</section>
</div>
<?php get_footer(); ?>