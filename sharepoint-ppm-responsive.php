<?php
/*
Template Name Posts: Pressed-Responsive-PPM
*/

get_header( 'responsive' ); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav-content'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <div class="col-md-12 dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
            <?php wp_link_pages(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>


</div><!-- .row .dmbs-content -->
<!-- end content container -->

<div class="row ppm-suite">
    <h2 class="sharepoint">More solutions in the PPM Boss suite</h2>
    <section class="ppm-links clearfix">
        <?php
        $id=$post->ID;
        $args =  array(
            'post_status' => 'publish',
            'post_type' =>'sharepoint',
            'post__not_in'   => array($id)
        );

        $ppm_loop = new WP_Query( $args );

        while ( $ppm_loop->have_posts() ) : $ppm_loop->the_post();
            $showfooter = get_field( "add_in_footer_module" );
            if ( $showfooter == "yes" ) {
                $this_product = get_field('this_products_name'); ?>

                <section class="<?php echo strtolower($this_product) ?> col-md-6">
                    <a href="<?php the_permalink(); ?>" class="rollover">
                        <span class="hidden"><?php echo $this_product; ?></span>
                    </a>
                    <p><?php echo get_field( "footer_text" ); ?></p>
                    <p><a href="<?php the_permalink(); ?>">Go to <?php echo $this_product ?> page</a></p>
                </section><!-- .col-md-6 -->
            <?php  }
        endwhile; ?>
    </section><!-- .ppm-links -->
</div><!-- .ppm-suite -->

<?php get_footer( 'responsive' ); ?>
