<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
            <div class="inside">
                <div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" style="margin-top: 16px;">



                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content">


                                                    <?php if (have_posts()) : ?>
                                                        <header class="archive-header">
                                                            <?php //printf( __( 'From the category archives: %s', 'twentythirteen' ),single_cat_title( '', false ) ); ?>
                                                            <!-- .archive-header --><h1 class="archive-title"><?php
                                                        if (is_day()) :
                                                            printf(__('From the daily archives: %s', 'twentythirteen'), get_the_date());
                                                        elseif (is_month()) :
                                                            printf(__('From the monthly archives: %s', 'twentythirteen'), get_the_date(_x('F Y', 'monthly archives date format', 'twentythirteen')));
                                                        elseif (is_year()) :
                                                            printf(__('From the yearly archives: %s', 'twentythirteen'), get_the_date(_x('Y', 'yearly archives date format', 'twentythirteen')));
                                                        else :
                                                            _e('Archives', 'twentythirteen');
                                                        endif;
                                                            ?></h1>
                                                        </header>
                                                        <?php /* The loop */ ?>

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
                                                                        <h2 class="entry-title">
                                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                        </h2> 

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
                                                                            <!-- changes 19_01_2014 -->
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
    <?php //get_template_part( 'content', 'none' );  ?>
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
