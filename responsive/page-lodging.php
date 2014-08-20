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

            <div class="lodging">
				<?php if( have_rows('hotels') ): ?>

                    <div>

                    <?php while( have_rows('hotels') ): the_row(); ?>

                        <div class="col-md-4">
							<div class="hotel-name"><h3><a style="color:#000;" href="<php the_sub_field('hotel_website_url'); ?>"><?php the_sub_field('hotel_name'); ?></a></h3></div>
                            <div class="hotel-address"><?php the_sub_field('price_info'); ?></div>
                             <div class="hotel-address"><strong>Click: </strong><?php the_sub_field('click'); ?></div>
                            <div class="discount-code"><strong>Group Code: </strong><?php the_sub_field('discount_code'); ?></div>
                            <div class="hotel-address"><strong>Phone: </strong> <?php the_sub_field('phone_number'); ?></div>
                            <div class="driving-distance"><strong>Address:</strong> <?php the_sub_field('hotel_address'); ?></div>
                            <div class="shuttle"><strong>Transportation:</strong> <?php the_sub_field('transportation'); ?></div>
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
