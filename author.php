<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>
<div class="content" >
    <div class="panel-display panel-2col clearfix">
        <div class="panel-panel panel-col-first">
            <div class="inside"><div class="panel-pane pane-block pane-views-latest-articles-block-2" >


                    <div class="pane-content">
                        <div class="view view-latest-articles view-id-latest_articles view-display-id-block_2 view-dom-id-2ce348f08e1407ac8b441212711a46a3">



                            <?php /*                             * ********************************************************** Silder Block ****************************************************************** */ ?>  
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
                            <?php /*                             * ********************************************************** Silder Block ****************************************************************** */ ?>  







                        </div>  </div>


                </div>



                <div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" >



                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content" style="margin-top:-5px;">


                                                    <?php if (have_posts()) : ?>

                                                        <?php
                                                        /* Queue the first post, that way we know
                                                         * what author we're dealing with (if that is the case).
                                                         *
                                                         * We reset this later so we can run the loop
                                                         * properly with a call to rewind_posts().
                                                         */
                                                        the_post();
                                                        ?>

                                                        <header class="archive-header">
                                                            <h1 class="archive-title">Posts by:<?php echo get_the_author(); ?></h1>
                                                        </header><!-- .archive-header -->

                                                        <?php
                                                        /* Since we called the_post() above, we need to
                                                         * rewind the loop back to the beginning that way
                                                         * we can run the loop properly, in full.
                                                         */
                                                        rewind_posts();
                                                        ?>

                                                        <?php
                                                        while (have_posts()) : the_post();
                                                            ?>
                                                            <div class="post" id="<?php the_ID(); ?>">

                                                                <?php
                                                                $key = 'permission';
                                                                $post_id = $post->ID;
                                                                $permission = get_post_meta($post_id, $key, true);
                                                                ?>                    

                                                                <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
                                                                    <div class="">
                                                                        <br/>
                                                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> 

                                                                        <div class="pruena" style="">
                                                                            <div style="float: left;">
                                                                                <div class="name-author_div"> <div class="label-inline">By&nbsp;</div><a href="?author=<?php echo the_author_id(); ?>" title="View user profile." class="username" xml:lang="" about="#" typeof="sioc:UserAccount" property="foaf:name" datatype="" style="color: rgba(5, 55, 105, 0.8);font-weight: bold;"><?php the_author(); ?></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="field-item even" style="float: left;">
                                                                                <div style="font-weight: bold; color: #949B9F;">&nbsp;On <?php
                                                        $post_date1 = $post->post_date;
                                                        $post_date = date("F jS, Y", strtotime($post_date1));
                                                        echo $post_date;
                                                        ?>

                                                                                </div>
                                                                            </div>                                                                       
                                                                        </div>
                                                                        <br/>



                                                                        <div class="entry-content" property="schema:articleBody content:encoded"> 

                                                                            <!-- changes 19_01_2014  -->
                                                                            <?php
                                                                            $short_des = get_field('short_description');

                                                                            if ($short_des != "") {

                                                                                echo "<p>" . $short_des . "</p>";
                                                                            } else {
                                                                                the_content();
                                                                            }
                                                                            ?>

                                                                            <!-- changes finish 19_01_2014 -->

                                                                        </div>
                                                                        <span class="entry-title1" style="font-size:16px;font-weight: lighter;color:#003963;margin-bottom:9px;font-weight:bold;">
        <?php if ($short_des != "") { ?>   
                                                                                <a href="<?php the_permalink(); ?>" > Read the rest of entry >> </a>
                                                                            <?php } ?>
                                                                        </span>
                                                                        <div class="cat categories"> 
                                                                            <span style="float:left">In:&nbsp;<?php
                                                                    foreach ((get_the_category()) as $category) {
                                                                        if ($category->term_id != '1') {

                                                                            echo '<span>[<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . ' >' . $category->name . '</a>]</span>';
                                                                        }
                                                                    }
                                                                            ?></span>&nbsp;|&nbsp;<a href="<?php the_permalink(); ?>"><?php comments_number(); ?> »</a>                                             
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>
        <?php //get_template_part( 'content', get_post_format() );  ?>
        <?php endwhile;
    ?>
    <?php wpbeginner_numeric_posts_nav(); ?>


                                                        <?php //echo twentythirteen_paging_nav(); ?>

                                                    <?php else : ?>
                                                        <?php //get_template_part( 'content', 'none' ); ?>
<?php endif; ?>

                                                </div>





                                            </div>  </div>
                                    </div>
                                </div>  </div>

                        </div>

                    </div>

                </div>
            </div>  </div>

<?php get_sidebar(); ?> 
    </div>


</div>
</section>
</div>
<div style="clear:both;height:18px;"></div>
<?php get_footer(); ?>
	