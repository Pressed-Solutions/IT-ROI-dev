<?php
/*
 * The template for displaying all pages.
 * template name:partner request
 */
get_header(); ?>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">
        <!------------Slider Start----------->
         <div class="integrationslider" style="">
        <img src="<?php bloginfo("stylesheet_directory");?>/images/all_header_products.png" width="1280" height="72"/>
        </div>
     <!------------Middle Content start------->
        <div class="border" style="margin-top: -31px;">
           
            <div class="integratepagecontent" style="width: 100%;padding:30px 0 0 20px;margin: 28px auto 28px 0px;">
                <div ><h1 style="color:#7C9120"><?php the_title(); ?></h1></div>
                <div style="margin-top: -22px;"><?php 
                $custom = get_post_custom($post->ID);
                 $metatitle = $custom ["subtitle"][0];
                 echo $metatitle;
                 ?></div>
                <div>
               <?php while ( have_posts() ) : the_post(); ?>
                <div class="partner_request_demo" style="width:400px;">
                    <div><?php the_content(); ?></div>
                </div>
                <?php endwhile; ?>
                </div>
  
               
     <!------------Middle Content finish------->
               


     
    </div>
</div> 
</div>
</section>
</div>
<?php get_footer(); ?>
