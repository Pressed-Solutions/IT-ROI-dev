<?php
/*
Template Name Posts: PPM Excel Interface free trail
*/
get_header(); ?>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">
        <!------------Slider Start----------->
        <div class="integrationslider" style="">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/PPMExcel_interface_header.png" width="1200"/>
        </div>
     <!------------Middle Content start------->
        <div class="border">
            <div class="ppm_excel_trial_wapper" >
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="register_demo" style="width: 100%;">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; ?>
     <!------------Middle Content finish------->
            </div>
        </div>
    </div>
</div>

</div>
</section>
</div>
<?php get_footer(); ?>