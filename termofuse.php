<?php
/**
 * The template for displaying all pages.
 * template name:term of use
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
    <div class="panel-display panel-2col clearfix">
  <div class="post">
    <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >
   
  

  
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
      <div class="">
                                                                                <div class="field field-name-title field-type-ds field-label-hidden">
                                                                                    <div class="field-items">
                                                                                        <div class="field-item even" property="schema:name">
                                                                                            <h1 style="font-weight: bold;"><?php the_title(); ?></h1></div>
                                                                                        
                                                                                       
                                                                                <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none"><div class="field field-name-body field-type-text-with-summary field-label-hidden">
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
    </div>
      </div>
                                                
    <?php //get_sidebar(); ?>                                             
     </div>
     
          
        </div>
    </section>
</div>
<div style="clear:both;height:21px;"></div>
<?php get_footer(); ?>