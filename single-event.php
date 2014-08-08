<?php
/**
* The Template for displaying all single posts.
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
<div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


<div class="content">
<div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

<div class="view-content"  id="Top">
   
    <?php // the loop
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="col-md-8 main-tt maincon">
        <h2 class="page-header">Events</h2>
        <p>We are on a mission to make PPM simpler, and we're telling the world.<br>
        Connect and discover relevant, high-impact insight and innovations to help organizations maximize their IT-ROI for their universe</p>
        <div class="clear"></div>
    </div>

    <div class="dmbs-container">
    <div class="blue-bg"></div>
    <div class="container dmbs-container">
        <div class="col-md-12 main-tt container">
            <div class="col-md-6 mainevt">
                <div class="col-md-4 mainevt">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                        <div class="clear"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 Webinar mainevt">
                    <h1>Webinar</h1>
                </div>
            </div>
            <div class="col-md-6 mainevt">
                <h2 class="page-headerWebinar">
                    <?php the_title(); ?>
                </h2>
                <?php the_content(); ?>
                <div class="evt-date"><?php the_field('date'); ?> <div class="evt-time"><?php the_field('time'); ?></div></div>
                <div class="register-button"><a href="<?php the_field('register_now'); ?>" >Register Now</a></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

    </div>
    </div>

    <div class="container dmbs-container">
        <div class="col-md-8 main-tt">
            <h3 class="UPCOMING-EVENTS">UPCOMING EVENTS</h3>

            <?php $loop = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => 4, 'paged' => get_query_var( 'paged' ) ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="evt-post" id="post-<?php the_ID(); ?>">
                <div class="col-md-3 evt-thumbnail">
                    <?php if ( has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-9 evt-content"><a href="<?php echo get_permalink(); ?>" ><div class="evt-title"><?php the_title(); ?></div></a>
                    <div class="evt-date"><?php the_field('date'); ?> <?php the_field('time'); ?></div>
                    <div class="register-button"><a href="#" >Register Now</a></div><?php the_content(); ?>
                </div>
                <div class="clear"></div>
            </div>
            <?php endwhile; ?>





            <!--<div class="pagen">
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

            <?php
            // Finally restore the $wp_query property to it's original value
            $wp_query->max_num_pages = $backup_page_total;
            ?>
            <div class="clear"></div>
            </div>
            </div>-->

        </div>

    <?php endwhile; ?>
    <?php else: ?>

    <?php get_404_template(); ?>

    <?php endif; ?>

    </div>
</div><!-- div.view_content -->



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
<?php  get_sidebar(); ?>
</div>
</div>
</section><!-- div#content -->
</div><!-- div role="main" -->
<?php get_footer(); ?>