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
<div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" >
<div class="pane-content">
<div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle">
<div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle">
<div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage ">
<div id="block-views-latest-articles-block-1" class="block block-views">
<div class="content">
<div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
<div class="view-content">

<?php
    // set flag to disable footer
    $GLOBALS['no_footer'] = true;

    // the loop
    if ( have_posts() ) : while ( have_posts() ) : the_post();

        // single post
        if ( is_single() ) : ?>

            <div <?php post_class(); ?>>

                <h2 class="page-header"><?php the_title() ;?></h2>

                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail(); ?>
                    <div class="clear"></div>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php get_template_part('template-part', 'postmeta'); ?>
                <?php comments_template(); ?>

            </div>
        <?php
        // list of posts
        else : ?>
           <div <?php post_class(); ?>>

            <div class="col-md-8 main-tt maincon">
                <h2 class="page-header">
                    WEBINAR - <?php the_title(); ?>
                </h2>

                <?php if ( has_post_thumbnail() ) : ?>
                   <?php the_post_thumbnail(); ?>
                    <div class="clear"></div>
                <?php endif; ?>
                <?php the_content(); ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <hr>
            <div class="col-md-8 main-tt">
                <h3 class="UPCOMING-EVENTS">UPCOMING EVENTS</h3>

                <?php $loop = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => 4, 'paged' => get_query_var( 'paged' ) ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="evt-post"> <div class="col-md-3 evt-thumbnail">
                        <?php if ( has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                        <?php endif; ?></div>
                        <div class="col-md-9 evt-content">
                            <a href="<?php echo get_permalink(); ?>" ><div class="evt-title"><?php the_title(); ?></div></a>
                            <div class="evt-date"><?php the_field('date'); ?> <?php the_field('time'); ?></div>
                            <div class="register-button"><a href="<?php the_field('register_now'); ?>" >Register Now</a></div><?php the_content(); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                <?php endwhile; ?>


                <div class="pagen">
                <div class="navigation">
                    <?php
                    // Bring $wp_query into the scope of the function
                    global $wp_query;

                    // Backup the original property value
                    $backup_page_total = $wp_query->max_num_pages;

                    // Copy the custom query property to the $wp_query object
                    $wp_query->max_num_pages = $loop->max_num_pages;
                    ?>
                <?php if (function_exists("pagination")) {
                    pagination($custom_query->max_num_pages);
                } ?>
                    <!-- now show the paging links -->

                    <?php
                    // Finally restore the $wp_query property to it's original value
                    $wp_query->max_num_pages = $backup_page_total;
                    ?>
                    <div class="clear"></div>
                </div>
                </div>

            </div>

            </div>

            <?php  endif; ?>

            <?php endwhile; ?>
            <?php posts_nav_link(); ?>
            <?php else: ?>

            <?php get_404_template(); ?>

            <?php endif; ?>

            </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- div.content -->
</div><!-- div#block-system-main -->
</section><!-- section#content -->
</div>
<?php get_footer(); ?>