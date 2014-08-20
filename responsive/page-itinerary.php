<?php
// Template Name: Itinerary

?>

<?php get_header(); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav-content'); ?>

<div class="container dmbs-container">
<!-- start content container -->
<div class="row dmbs-content">


    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="custom-content">
            
            <div class="page-title col-md-12">
                <h2 class="page-header"><?php the_title() ;?></h2>
            </div>
            
            <div class="schedule col-md-12">
                
                <?php if( have_rows('schedule') ): ?>
 
                    <div>
                 
                    <?php while( have_rows('schedule') ): the_row(); ?>
                 
                        <div class="activity clearfix">
							<div class="day"><?php the_sub_field('day'); ?>,</div>
                            <div class="starting-hour"><?php the_sub_field('starting_at'); ?>:</div>
                            <div class="description"><?php the_sub_field('description'); ?></div>
                        </div>
                        
                    <?php endwhile; ?>
                 
                    </div>
                 
                <?php endif; ?>

            </div>

            <div class="page-notes col-md-12">
                <?php the_content(); ?>
            </div>

        </div>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>

</div>
<!-- end content container -->

<?php get_footer(); ?>
