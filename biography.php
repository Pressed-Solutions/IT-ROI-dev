<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>
<div class="internalcontent" >
    <div class="internalpage clearfix" style="padding: 0px 0px 16px 0px;" >
        <div class="panel-panel panel-col-first" >
            <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >


                    <div class="pane-content">
                        <div class="view view-latest-articles view-id-latest_articles view-display-id-block_2 view-dom-id-2ce348f08e1407ac8b441212711a46a3">



                            <div class="">

                                <div class="skin-default">

                                    <div id="flexslider_views_slideshow_main_latest_articles-block_2" class="flexslider_views_slideshow_main views_slideshow_main"><div style="">
                                            <div class="careerinternalslider" style="">
                                                <div class="ds-1col node node-article node-promoted view-mode-slide  clearfix">


                                                    <div class="field field-name-field-image-homepage-story field-type-image field-label-hidden">
                                                        <div class="field-vitems">
                                                            <div class="career">
                                                                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/careerhead.png" class="career"/>
                                                            </div>
                                                            <div class="career_title">
                                                                <?php //dynamic_sidebar('integration_bridge'); ?>
                                                                <h10>Meet the Experts</h10>
                                                            </div>
                                                            <div class="career_title"> <?php $custom = get_post_custom($post->ID); ?>
                                                                <?php
                                                                $metatitle = $custom ["metatitle"][0];
                                                                echo "<h9>" . $metatitle . "<h9>";
                                                                ?></div>
                                                        </div>

                                                    </div

                                                </div>
                                            </div>


                                        </div>


                                    </div>

                                </div>

                            </div>






                        </div>  </div>


                </div>

                <div class="panel-separator"></div><div class="panel-pane pane-views-panes pane-recipe-of-the-day-panel-pane-1" >



                    <div class="pane-content">
                        <div class="view view-recipe-of-the-day view-id-recipe_of_the_day view-display-id-panel_pane_1 recipe-of-day view-dom-id-2d6cc28c03c7738e8d31aa702058465b">


                        </div>  </div>


                </div>

                <div class="panel-separator"></div><div class="internalpagecontent">



                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content" style="margin-top:0px;padding: 5px 20px 20px 20px;">

                                                    <?php /* The loop */ ?>
                                                    <?php while (have_posts()) : the_post(); ?>


                                                        <div class="views-row views-row-1">

                                                            <div><h8><?php the_author(); ?></h8></div>                  

                                                            <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">

                                                                <div style="margin-top:20px;">
                                                                    <?php $post_author = $post->post_author; ?>
                                                                    <div style="float:left;margin-right: 10px;">
                                                                        <?php echo get_avatar($post_author, 200, 200); ?>     
                                                                    </div>                                                         <div class="field field-name-title field-type-ds field-label-hidden">
                                                                        <div class="field-items">


                                                                            <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none"><div class="">
                                                                                    <div class="field-items">

                                                                                        <div class="field-item even" property="schema:articleBody content:encoded"><?php the_content(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>  </div>

                                                                    </div>

                                                                </div>

                                                            </div>





                                                        </div> 
                                                    <?php endwhile; ?>

                                                </div>

                                            </div>
                                        </div>  </div>

                                </div>

                            </div>
                        </div>






                    </div>  </div>
                <div class="meetexpert_page_outer_sidebar">
                    <div class="career_page_sidebar" style="margin-bottom: 17px;"> 
                        <?php dynamic_sidebar('career'); ?>
                    </div>
                    <div class="meetexpert_page_sidebar">
                        <?php dynamic_sidebar('meetexperts'); ?>

                    </div>
                </div>

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
</div>
</section>
</div>
<?php get_footer(); ?>