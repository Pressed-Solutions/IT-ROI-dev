<?php
/**
 * The template for displaying all pages.
 * template name:Layout Partner Portal
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 */

get_header();
?>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">
        <!------------Slider Start----------->
         <div class="integrationslider" style="">
        <img src="<?php bloginfo("stylesheet_directory");?>/images/all_header_products.png" width="1280" height="72"/>
        </div>
     <!------------Middle Content start------->
        <div class="border" style="margin-top: -31px;">
            <div class="integratepagecontent" style="width: 100%;padding:30px 0 0 0px;margin: 28px auto 28px 0px;">
                <div class="partnerportal_content" style="">
                     <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
                </div>
     <!------------Middle Content finish------->
    </div>
</div> 
</div>
</section>
</div>
<?php get_footer(); ?>
