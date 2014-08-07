<?php
/**
 * The Template for displaying all single posts.
 * Template Name: casolution contact
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>


<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);">
    <div class="internalpage clearfix">
        <div>
            <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >


                    <div class="pane-content">
                        <div class="view view-latest-articles view-id-latest_articles view-display-id-block_2 view-dom-id-2ce348f08e1407ac8b441212711a46a3">



                            <div class="">

                                <div class="skin-default">

                                    <div id="flexslider_views_slideshow_main_latest_articles-block_2" class="flexslider_views_slideshow_main views_slideshow_main"><div style="">
                                            <div class="casolutionslider" style="">

                                                <div class="ds-1col node node-article node-promoted view-mode-slide  clearfix">


                                                    <div class="field field-name-field-image-homepage-story field-type-image field-label-hidden">
                                                        <div class="field-vitems" style="float: left; padding-top: 10px;">
                                                            <div>
                                                                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/casolutionplus.png"/>
                                                            </div>
                                                            <div class="casolution_title">
                                                                <?php //dynamic_sidebar('integration_bridge'); ?>
                                                                <h10><?php echo "Services"; ?></h10>
                                                            </div>
                                                            <div class="casolution-subtitle"> 
                                                                <?php $custom = get_post_custom($post->ID); ?>
                                                                <?php
                                                                $metatitle = $custom ["header_footer_data_title"][0];
                                                                echo "<h9>IT-ROI Solutions & CA Technologies - Specialty Services Partnership</h9>";
                                                                ?></div>

                                                        </div>
                                                        <div class="caservices">
                                                            <style>
                                                                #menu-item-1524 a{color:#468DBD;}
                                                            </style>
                                                            <?php dynamic_sidebar('integration_bridge'); ?>      
                                                        </div>



                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </div>






                        </div>  </div>


                </div>

                <div class="cainternalpagecontent casolutionpage">



                    <div class="pane-content" style="padding-top:10px;">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content" style="">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content" style="margin-top:0px;">

                                                    <?php /* The loop */ ?>

                                                    <div class="views-row views-row-1">



                                                        <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
                                                            <div style="margin-top: -18px;">
                                                                <?php dynamic_sidebar("casolution"); ?>
                                                            </div>
                                                            <div style="float:right;">
                                                                <?php
                                                                $permalinkcasol_cnt = "";
                                                                $permalinkcasol_resources = "";
                                                                $query = "select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'";
                                                                $r = mysql_query($query);
                                                                while ($w = mysql_fetch_array($r)) {
                                                                    $url = $w['guid'];
                                                                    $contact = $w['post_title'];
                                                                    $permalinkcasol_cnt = get_permalink($w['ID']);
                                                                }
                                                                ?>
                                                                <a href="<?php echo $permalinkcasol_cnt; ?>"><?php echo $contact; ?></a> 
                                                                | 
<?php
$query1 = "select * from wp_posts where post_type='page' and post_name='resources'";
$r1 = mysql_query($query1);
while ($rw = mysql_fetch_array($r1)) {
    $url1 = $rw['guid'];
    $resources = $rw['post_title'];
    $permalinkcasol_resources = get_permalink($rw['ID']);
}
?><a href="<?php echo $permalinkcasol_resources; ?>"><?php echo $resources; ?></a> 
                                                            </div>
                                                            <div style="padding: 5px 20px 20px 20px;">
                                                                <div style="margin-top:20px;clear: both">

                                                                    <div class="field field-name-title field-type-ds field-label-hidden">

<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>             

                                                                        <?php endwhile; ?></div>


                                                                </div>




                                                            </div>  </div>
                                                    </div>
                                                </div>  </div>

                                        </div>

                                    </div>
                                </div>






                            </div>  </div>

                    </div>
                </div>
            </div>

        </div>



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