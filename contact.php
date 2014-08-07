<?php
/**
 * The template for displaying all pages.
 * template name:contact
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>

<script type="text/javascript" >
 $(function() {
     var pos = null;
     if($("#wpcf7-f843-p80-o1 .wpcf7-validation-errors.visible").length > 0)
        pos = $('#errors').offset().top;

     if($("#wpcf7-f843-p80-o1 .wpcf7-mail-sent-ok.visible").length > 0)
        pos = $('#success').offset().top;

     if(pos != null)
         $("html,body").animate({scrollTop:pos-175}, 1000);
  });
</script>


<div class="content" >
    <div class="panel-display panel-2col clearfix">
        <div class="post">
            <div class="inside">

                <div class="panel-pane pane-views-panes pane-recipe-of-the-day-panel-pane-1" >






                </div>

                <div class="panel-separator"></div><div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" >



                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content">

                                                    <?php
                                                    /* The loop */
                                                    echo $_id = $_GET['author'];
                                                    ?>
                                                    <?php while (have_posts()) : the_post(); ?>
                                                        <div class="views-row views-row-1">



                                                            <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
                                                                <div class="">
                                                                    <div class="field field-name-title field-type-ds field-label-hidden">
                                                                        <div class="field-items">
                                                                            <div class="field-item even" property="schema:name">
                                                                                <h1><?php //the_title();   ?></h1></div>


                                                                            <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none"><div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                                                    <div class="field-items">
                                                                                        <div class="field-item even" property="schema:articleBody content:encoded"><table cellspacing="0" cellpadding="10" class="contact_temp_table" style="border-collapse: collapse;margin-top: -30px;width: 1166px;margin-left:3px;">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td style="border-right:none;padding-right: 13px;" valign="top">
                                                                                                            <?php the_content(); ?>
                                                                                                        </td> 
                                                                                                        <td class="contact_sidebar" style="width: 230px;padding-top: 18px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/headerLocationLeftIT.png" width="230" style="margin-bottom: -5px"/><div class="asides"><?php dynamic_sidebar('contact'); ?></div></td>

                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td style="width: 64px; height: 57px;">&nbsp;</td>
                                                                                                        <td>&nbsp;</td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
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

        <?php //get_sidebar();  ?>                                             
    </div>


</div>
</section>
</div>
<div style="clear:both;height:21px;"></div>
<?php get_footer(); ?>