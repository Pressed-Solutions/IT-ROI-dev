<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

  <div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;">
  <div class="panel-panel panel-col-first">
    <div class="inside">
        <div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" style="margin-top: 16px;">
  
      
  
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
