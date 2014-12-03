<?php
/**
 * The template for displaying all pages.
 * template name:home
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$url404 = site_url() . '/404/';
$url = site_url() . '/404/';
$url = str_replace("http://", "", $url);
$url = str_replace("https://", "", $url);
if ($pageURL != $url) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $url404 . "");
    ?>
    <!--<script> window.location="<?php echo $url404; ?>";</script>-->
    <?php
}


get_header();
?>
<div>
    <div class="topcr_change" style="text-align: center; color: #838383; font-size:35pt; font-weight: bold; padding-bottom: 20px;"> 
        404 Page not found. Sorry! 
    </div>
    <div class="topcr_change" style="text-align: center; color: #949494;font-size:11pt; font-weight: bold; padding-bottom: 20px;">
        This probably means the your content you were looking for is now deleted. You can search for other content below.
    </div>
</div>

<div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;" >
        <div class="panel-panel panel-col-first">
            <div class="inside">
                <div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" style="margin-top: 16px;">



                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content" id="view-content">
<?php
//    get_post();                  
//      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//   query_posts('paged=' . $paged.'&orderby=date&order=desc');
//   query_posts( array('orderby' => 'post_date', 'order' => 'DESC' ) );
?>

                                                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                                    query_posts('paged=' . $paged);
                                                    ?>
                                                    <div id="content">
                                                    <?php
                                                    if (have_posts()) :

                                                        while (have_posts()) : the_post();
                                                            /*        $show_posts = '2';
                                                              $tag = 'itroi';
                                                              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                                                              $loop = new WP_query('tag=' . $tag . '&showposts=' . $show_posts . '&paged=' . $paged);

                                                              while ( $loop->have_posts() ) : $loop->the_post(); */
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
                                                                            <h2 class="entry-title">
                                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); //echo $post["post_title"];  ?></a></h2> 


                                                                            <div class="pruena" style="">
                                                                                <div style="float: left;">
                                                                                    <div class="name-author_div"> <div class="label-inline">By&nbsp;</div><a href="?author=<?php echo the_author_id(); ?>" title="View user profile." class="username" xml:lang="" about="#" typeof="sioc:UserAccount" property="foaf:name" datatype="" style="color: rgba(5, 55, 105, 0.8);font-weight: bold;"><?php the_author(); ?></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="field-item even" style="float: left;">
                                                                                    <div style="font-weight: bold; color: #949B9F;">&nbsp;&nbsp;On <?php
                                                            $post_date1 = $post->post_date;
                                                            $post_date = date("F jS, Y", strtotime($post_date1));
                                                            echo $post_date;
                                                                ?>

                                                                                    </div>
                                                                                </div>                                                                       
                                                                            </div>
                                                                            <br/>



                                                                            <div class="entry-content" property="schema:articleBody content:encoded">
                                                                            <!--      changes 19_01_2014 -->
                                                                                <?php
                                                                                $short_des = get_field('short_description');

                                                                                if ($short_des != "") {

                                                                                    echo $short_des;
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
                                                                                <span style="float:left">In:&nbsp;[<?php the_category('], ['); ?>]</span>&nbsp;|&nbsp;<a href="<?php the_permalink(); ?>"><?php comments_number(); ?> »</a>                                             
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

        <?php
    endwhile;
endif;
?>

                                                        <?php wpbeginner_numeric_posts_nav(); ?>
                                                    </div>
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

<?php get_sidebar(); ?>                                             
</div>


</div>
</section>
</div>
<?php get_footer(); ?>
