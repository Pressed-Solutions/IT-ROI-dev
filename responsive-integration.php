<?php
/*
Template Name Posts: Pressed-Responsive-Integration
*/

get_header( 'responsive' ); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav-content'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <div class="col-md-12 dmbs-main">

        <?php // the loop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="integration-header-gradient"></div>
            <div class="integration-header-image clearfix"><img src="<?php echo get_stylesheet_directory_uri() . '/images/integrations/' . basename(get_permalink()); ?>.svg" #TODO: png fallback? /></div>

            <?php the_content(); ?>
            <?php wp_link_pages(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

        <div class="row integration-footer">
            <div class="col-lg-8 col-lg-offset-2-5 col-md-10 col-md-offset-2">
                <h3>Integration tools:</h3>
                <?php
                $id=$post->ID;
                $args =  array(
                    'post_status' => 'publish',
                    'post_type' =>'integration',
                    'post__not_in'   => array($id)
                );

                $integration_loop = new WP_Query( $args );

                if ( $integration_loop->have_posts() ) {
                    echo '<ul class="integration-products">';

                    while ( $integration_loop->have_posts() ) : $integration_loop->the_post(); ?>
                        <li class="integration-product">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </li><!-- .integration-product -->
                    <?php endwhile;

                    echo '</ul><!-- .integration-products -->';
                } ?>
            </div>
        </div><!-- .integration-footer -->

    </div><!-- .dmbs-main -->

</div><!-- .row .dmbs-content -->
<!-- end content container -->


<?php get_footer( 'responsive' ); ?>
