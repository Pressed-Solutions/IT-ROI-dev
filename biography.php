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
            <div class="inside">
                <div class="internalpagecontent" style="margin-top: 16px;">



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
