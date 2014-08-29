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

<div class="dmbs-container">
<!-- start content container -->
<div class="row dmbs-content">
<div class="col-md-12 dmbs-main event-page">
   
    <?php
    // set flag to disable footer
    $GLOBALS['no_footer'] = true;

    // the loop
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="col-md-8 main-tt maincon container">
        <h2 class="page-header">Events</h2>
        <p>We are on a mission to make PPM simpler, and we're telling the world.<br>
        Connect and discover relevant, high-impact insight and innovations to help organizations maximize their IT-ROI for their universe</p>
        <div class="clear"></div>
    </div>
</div>
</div>
</div>

    <?php $loop = new WP_Query( array( 'post_type' => 'event', 'posts_per_page' => 5, 'paged' => get_query_var( 'paged' ) ) ); ?>
    <?php $counter = 1; ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php if ($counter == 1) { // first item ?>
        <div class="dmbs-container">
            <div class="blue-bg"></div>
             <div class="container dmbs-container this-event">
                <div class="col-md-12 main-tt container clearfix">
                    <div class="col-md-6 mainevt">
                        <div class="col-md-4 mainevt">
                            <?php if ( has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full'); ?>
                            <?php endif; ?>
                            <div class="clear"></div>
                        </div>
                        <div class="col-md-6 Webinar mainevt">
                            <h1>Webinar</h1>
                        </div>
                    </div><!-- .mainevt -->
                    <div class="col-md-6 mainevt maincont clearfix">
                        <h2 class="page-headerWebinar">
                            <?php the_title(); ?>
                        </h2>
                        <?php the_content(); ?>
                        <div class="evt-date"><?php the_field('date'); ?> <div class="evt-time"><?php the_field('time'); ?></div></div>
                        <div class="register-button"><?php echo get_post_meta( get_the_ID(), 'register_now', true ); ?></div><!-- .register-button -->
                    </div><!-- .mainevt.maincont -->
                </div><!-- .col-md-12.main-tt.container -->

            </div>
        </div>
        <div class="container dmbs-container">
            <div class="col-md-8 main-tt">
                <h3 class="upcoming-events">UPCOMING EVENTS</h3>

    <?php
        $counter = $counter + 1; // increment counter
    } // end first item
    else { // all other items?>
        <div class="evt-post" id="post-<?php the_ID(); ?>">
            <div class="col-md-3 evt-thumbnail">
                <?php if ( has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full'); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-9 evt-content"><div class="evt-title"><?php the_title(); ?></div>
                <div class="evt-date"><?php the_field('date'); ?> <?php the_field('time'); ?></div>
                <div class="register-button"><?php echo get_post_meta( get_the_ID(), 'register_now', true ); ?></div><!-- .register-button -->
            </div>
            <div class="clear"></div>
        </div>
    <?php
          $counter = $counter + 1; // increment counter
    }; // end list of other items
    endwhile; ?>





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

        <?php
        // Finally restore the $wp_query property to it's original value
        $wp_query->max_num_pages = $backup_page_total;
        ?>
        <div class="clear"></div>
        </div>
        </div>

    </div>

<?php endwhile; ?>
<?php else: ?>

<?php get_404_template(); ?>

<?php endif; ?>

</div>
</div>
</div>
</div>
<?php get_footer(); ?>
