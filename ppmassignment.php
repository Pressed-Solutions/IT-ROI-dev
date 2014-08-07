<?php
/**
 * The template for displaying all pages.
 * template name:ppm assignment
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
  <div class="internalcontent" style="padding: 0px 0px 16px 0px;">
    <div class="internalpage clearfix">
  <div class="panel-panel panel-col-first" >
    <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >
   
  <div class="head">
        <div class="headmenu">
        <a title="Download product brief" href="#" class="download_boss"></a>
        <a title="Watch the webinar " onclick="javascript: return dnnModal.show('http://www.youtube.com/embed/wFQzhTdtxW0?popUp=true',/*showReturn*/true, 300, 600, true, '')" href="#" class="watch_boss rollover_effect"></a>
        <a title="Shedule a demo" target="_self" href="/contactus.aspx" class="schedule_boss rollover_effect"></a>
        </div>
      <div class="phone"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/talk_now.png" alt="" class="rollover_effect"></div>
        <div class="mail"><a title="Send us an email" href="mailto:sales@itroisolutions.com?subject=PPM Boss - more information required" class="mail_boss rollover_effect"></a></div>
        </div>  
  </div>
         

<div class="integratepagecontent">
  
      
  
  <div class="pane-content">
    <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">

    
  <div class="content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
  
                                                            <div class="view-content" style="margin-top:0px;padding:5px 0 20px 20px;">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                                                                
  
                                    <div class="views-row views-row-1">

                                                                       

     <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
      <div class="">
                                                                                <div class="field field-name-title field-type-ds field-label-hidden">
                                                                                    <div class="field-items">
                                                                                        <div class="field-item even" property="schema:name">
                                                                                            <h8><?php 
                                                                                            $headingtitle = $custom ["page_heading"][0];
                                                                                           echo $headingtitle;  ?></h8></div>
                                                                                   
                                                                                        
                                                                                        <div class="field field-name-post-date field-type-ds field-label-hidden">
                                                                                   
                                                                                </div>
                                                                                <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none"><div class="">
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
