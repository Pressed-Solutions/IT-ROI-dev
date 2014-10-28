<?php
/*
 * Template for displaying single events, based on page-responsive.php
 */

get_header( 'responsive' ); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav-content'); ?>

<!-- start content container -->
<div class="row dmbs-content">
<div class="col-md-12 dmbs-main event-page">

    <?php the_post(); ?>

    <div class="main-tt maincon clearfix">
        <h2 class="page-header">Events</h2>
        <?php the_content(); ?>
    </div><!-- .main-tt.maincon -->

</div><!-- .dmbs-main.event-page -->
</div><!-- .row.dmbs-content -->

<div class="col-md-8 col-md-offset-2 main-tt events-list past-events">
    <h3 class="event-list-header">Past Events</h3>

<?php // query to get past events
$past_loop = new WP_Query( array(
        'post_type'      => 'event',
        'posts_per_page' => 5,
        'paged'          => get_query_var( 'paged' ),
        'order'          => 'ASC',
        'orderby'        => 'meta_value',
        'meta_key'       => 'begin_date',
        'meta_compare'   => '<',
        'meta_value'     => date( 'Y-m-d' ),
    ) );

while ( $past_loop->have_posts() ) : $past_loop->the_post();

    $begin_date_raw = strtotime( get_field( 'begin_date' ) );
    $end_date_raw = strtotime( get_field( 'end_date' ) );

    // format date as a nice range
    $full_date = format_event_date($begin_date_raw, $end_date_raw);

    // get custom taxonomy name and image
    $category_array = get_the_terms( $past_loop->ID, 'event_type' );
    foreach ($category_array as $this_category) {
        $category_name = $this_category->name;
        $category_thumb = z_taxonomy_image_url( $this_category->term_id );
    }
?>
    <div class="evt-post" id="post-<?php the_ID(); ?>">
        <div class="col-md-3 evt-thumbnail">
            <img src="<?php echo $category_thumb; ?>" class="category-image" />
        </div>
        <div class="col-md-9 evt-content clearfix">
            <div class="evt-title"><?php the_title(); ?></div>
            <time class="evt-date" datetime="<?php echo $datetime ?>"><?php echo $full_date; ?>
                <?php if ( get_field( 'time' ) ) { ?>
                <span class="evt-time"><?php the_field( 'time' ); ?></span>
                <?php } ?>
            </time>
            <?php if ( get_field( 'location' ) ) { ?>
                <div class="evt-location"><?php echo the_field( 'location'); ?></div>
            <?php } ?>
            <div class="register-button"><?php echo get_post_meta( get_the_ID(), 'register_now', true ); ?></div><!-- .register-button -->
            <?php the_content(); ?>
        </div><!-- .col-md-9.evt-content -->
    </div><!-- .evt-post -->
<?php endwhile; // end $past_loop for past events ?>

    <div class="pagen">
        <div class="navigation clearfix">
        <?php
        // Bring $wp_query into the scope of the function
        global $wp_query;

        // Backup the original property value
        $backup_page_total = $wp_query->max_num_pages;

        // Copy the custom query property to the $wp_query object
        $wp_query->max_num_pages = $past_loop->max_num_pages;
        if ( function_exists( 'pagination_past' ) ) {
            pagination_past( $custom_query->max_num_pages );
        }

        // Finally restore the $wp_query property to its original value
        $wp_query->max_num_pages = $backup_page_total;
        ?>
        </div><!-- .navigation -->
    </div><!-- .pagen -->
</div><!-- .past-events -->

<?php get_footer( 'responsive' ); ?>
