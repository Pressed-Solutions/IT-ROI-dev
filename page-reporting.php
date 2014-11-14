<?php
/*
Template Name: Pressed-Responsive Reporting
*/

get_header( 'responsive' ); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav-content'); ?>

<!-- start content container -->
<div class="row dmbs-content">

    <div class="col-md-12 dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="integration-header-gradient"></div>
        <div class="integration-header-image clearfix"><?php
            include('images/reporting/powerdata.svg');
            include('images/integrations/powered-by-ib3.svg'); ?>
        </div>
        <?php the_content(); ?>
        <div class="row integration-footer ib3-color">
            <div class="wrapper">
                <a href="/integration/integration-bridge/"><?php include('images/integrations/powered-by-ib3.svg'); ?></a>
                <a href="/integration/integration-bridge/" class="powered-by-ib3">Integration Bridge</a>
            </div><!-- .wrapper -->
        </div>
        <?php wp_link_pages(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>


</div><!-- .row .dmbs-content -->
<!-- end content container -->

<?php get_footer( 'responsive' ); ?>
