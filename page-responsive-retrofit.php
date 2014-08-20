<?php
/**
Template Name: Pressed-Responsive-Retrofit
*/

get_header(); ?>

  <div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;">
  <div class="panel-panel panel-col-first">
    <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >


  <div class="pane-content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_2 view-dom-id-2ce348f08e1407ac8b441212711a46a3">



      <?php /************************************************************ Silder Block *******************************************************************/ ?>
        <div class="view-content" style="padding-right: 11px;">
            <div id="flexslider_views_slideshow_main_latest_articles-block_2" class="flexslider_views_slideshow_main views_slideshow_main">
              <div class="flexslider" >
                              <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_directory"); ?>/slidercss.css" media="all"/>
                               <?php if(function_exists('shs_slider_view')){ shs_slider_view(); }else{dynamic_sidebar('sidebar-3');}   ?>
              </div>
              <div id="rss">
                   <p> Home <a href="<?php echo site_url(); ?>/feed/" target="_blank">Rss Feed</a>  </p>
              </div>
            </div>
        </div>
<?php /************************************************************ Silder Block *******************************************************************/ ?>







</div>  </div>


  </div>

<div class="panel-separator"></div><div class="panel-pane pane-views-panes pane-recipe-of-the-day-panel-pane-1" >



  <div class="pane-content">
    <div class="view view-recipe-of-the-day view-id-recipe_of_the_day view-display-id-panel_pane_1 recipe-of-day view-dom-id-2d6cc28c03c7738e8d31aa702058465b">


  </div>  </div>


  </div>

<div class="panel-separator"></div><div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" >



  <div class="pane-content">
    <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


  <div class="content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                            <div class="view-content">

			<?php /* The loop */
                        echo $_id=$_GET['author'];
                        ?>
			<?php while ( have_posts() ) : the_post(); ?>
                                    <div class="views-row views-row-1">



     <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
      <div class="post">
                                                                                <div class="field field-name-title field-type-ds field-label-hidden">
                                                                                    <div class="field-items">
                                                                                        <div class="field-item even" property="schema:name">
                                                                                            <h1><?php //the_title(); ?></h1></div>


                                                                                        <div class="field field-name-post-date field-type-ds field-label-hidden">

                                                                                </div>
                                                                                <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none"><div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                                                        <div class="field-items">
                                                                                            <div class="field-item even" property="schema:articleBody content:encoded"><?php the_content(); ?>
                                                                         </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>  </div>

                                                                        </div>

                                                                    </div>
                                                                 <?php endwhile; ?>
                                                            </div>





                                                        </div>  </div>
                                                </div>
                                            </div>  </div>

                                                                    </div>

                                                                </div>
                                                                <div class="views-row views-row-6">


                                                                </div>
                                                            </div>






                                                        </div>  </div>
    </div>
      </div>

    <?php get_sidebar(); ?>
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
