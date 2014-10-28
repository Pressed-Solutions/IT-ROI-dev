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

    <?php
    // the loop
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="main-tt maincon clearfix">
        <h2 class="page-header">Events</h2>
        <?php the_content(); ?>
    </div><!-- .main-tt.maincon -->

</div><!-- .dmbs-main.event-page -->
</div><!-- .row.dmbs-content -->
</div><!-- .dmbs-container -->

<?php
$loop = new WP_Query( array(
        'post_type'      => 'event',
        'posts_per_page' => 5,
        'paged'          => get_query_var( 'paged' ),
        'order'          => 'ASC',
        'orderby'        => 'meta_value',
        'meta_key'       => 'begin_date',
    ) );
$counter = 1;

if ( $loop->have_posts()) {
    if ( ! is_paged() ) { echo '<h3 class="event-list-header">Next Event</h3>'; }
}

while ( $loop->have_posts() ) : $loop->the_post();

    $begin_date_raw = strtotime( get_field( 'begin_date' ) );
    $end_date_raw = strtotime( get_field( 'end_date' ) );

    // check whether this is past or future event; skip to next item if this is a past event
    if ( ( empty( $end_date_raw ) AND ( date( 'Y-m-d', $begin_date_raw ) <= date( 'Y-m-d' ) ) ) OR ( ! empty( $end_date_raw ) AND ( date( 'Y-m-d', $end_date_raw ) <= date( 'Y-m-d' ) ) ) ) {
        continue;
    }

    // format date as a nice range
    $full_date = format_event_date( $begin_date_raw, $end_date_raw );
    $datetime = date( 'c', $begin_date_raw );

    // get custom taxonomy name and image
    $category_array = get_the_terms( $loop->ID, 'event_type' );
    foreach ($category_array as $this_category) {
        $category_name = $this_category->name;
        $category_thumb = z_taxonomy_image_url( $this_category->term_id );
    }

    if ( ( $counter == 1 ) && ( ! is_paged() ) ) { // first item on first page ?>
    <div class="dmbs-container">
        <div class="event-blue-bg"></div>
        <div class="container dmbs-container main-event">
            <div class="col-md-12 main-tt container clearfix">
                <div class="col-sm-6">
                    <div class="col-md-4 clearfix">
                        <img src="<?php echo $category_thumb; ?>" class="category-image" />
                    </div>
                    <div class="col-md-6 event-type">
                        <h1><?php echo $category_name; ?></h1>
                    </div>
                </div><!-- .col-sm-6 -->
                <div class="col-sm-6 clearfix">
                    <h2 class="page-header-event-type">
                        <?php the_title(); ?>
                    </h2>
                    <?php the_content(); ?>
                    <time class="evt-date" datetime="<?php echo $datetime ?>"><?php echo $full_date; ?>
                        <?php if ( get_field( 'time' ) ) { ?>
                        <span class="evt-time"><?php the_field( 'time' ); ?></span>
                        <?php } ?>
                    </time>
                    <?php if ( get_field( 'location' ) ) { ?>
                        <div class="evt-location"><?php echo the_field( 'location'); ?></div>
                    <?php } ?>
                    <div class="register-button"><?php echo get_post_meta( get_the_ID(), 'register_now', true ); ?></div><!-- .register-button -->
                </div><!-- .col-sm-6 -->
            </div><!-- .col-md-12.main-tt.container -->

        </div><!-- .container.dmbs-container.main-event -->
    </div><!-- .dmbs-container -->
    <?php } // end first item, non-paged

    if ( ( ( $counter == 2 ) && ( ! is_paged() ) ) || ( ( $counter == 1 ) && ( is_paged() ) ) ) { // second item on page 1 or first item on paged ?>
    <div class="container dmbs-container">
        <div class="col-md-8 col-md-offset-2 main-tt events-list upcoming-events">
            <h3 class="event-list-header">Upcoming Events</h3>
    <?php } // end second item on page 1 or first item on paged
    if ( ( $counter > 1 ) || ( is_paged() ) ) { // all other items or all items on pages after the first
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
    <?php
          $counter = $counter + 1; // increment counter
    }; // end list of other 4 items
    $counter = $counter + 1; // increment counter
    endwhile; ?>

        <div class="pagen">
            <div class="navigation clearfix">
            <?php
            // Bring $wp_query into the scope of the function
            global $wp_query;

            // Backup the original property value
            $backup_page_total = $wp_query->max_num_pages;

            // Copy the custom query property to the $wp_query object
            $wp_query->max_num_pages = $loop->max_num_pages;
            if ( function_exists("pagination") ) {
                pagination( $custom_query->max_num_pages );
            }

            // Finally restore the $wp_query property to its original value
            $wp_query->max_num_pages = $backup_page_total;
            ?>
            </div><!-- .navigation -->
        </div><!-- .pagen -->

    </div><!-- .upcoming-events -->
</div><!-- .container.dmbs-container -->

<?php
endwhile; // end $loop for upcoming events

if ( ! is_paged() ) { // show past events only on first page ?>

<div class="container dmbs-container">
    <div class="col-md-8 col-md-offset-2 main-tt events-list past-events">
        <h3 class="event-list-header">Past Events</h3>

<?php // rewind the loop to get past events
rewind_posts();

while ( $loop->have_posts() ) : $loop->the_post();

    $begin_date_raw = strtotime( get_field( 'begin_date' ) );
    $end_date_raw = strtotime( get_field( 'end_date' ) );

    // check whether this is past or future event; skip to next item if this is a past event
    if ( ( empty( $end_date_raw ) AND ( date( 'Y-m-d', $begin_date_raw ) > date( 'Y-m-d' ) ) ) OR ( ! empty( $end_date_raw ) AND ( date( 'Y-m-d', $end_date_raw ) > date( 'Y-m-d' ) ) ) ) {
        continue;
    }

    // format date as a nice range
    $full_date = format_event_date($begin_date_raw, $end_date_raw);

    // get custom taxonomy name and image
    $category_array = get_the_terms( $loop->ID, 'event_type' );
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
    <?php endwhile; // end $loop for past events ?>

    </div><!-- .past-events -->
<?php } // end is_paged check ?>
<?php else: // if check for original page content ?>

<?php endif; // end original loop for page content ?>

<?php get_footer( 'responsive' ); ?>
