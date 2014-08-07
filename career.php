<?php
/*
  Template Name Posts: career
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <div class="internalcontent careerpagemakeup">
        <div class="careerinternalslider">
            <div class="career">
                <img src="<?php bloginfo("stylesheet_directory"); ?>/images/careerhead.png"/>
            </div>
            <div class="career_title">
                <h10><?php the_title(); ?></h10>
            </div>
            <div class="careersubtitle"> <?php $custom = get_post_custom($post->ID); ?>
                <h9><?php the_field('subtitle') ?></h9> 
            </div>
        </div>
        <div class="internalpage clearfix">

            <div class="careerpagecontent"style="">
    <?php the_content(); ?>

            </div>
            <div>
                <div class="career_page_sidebar"> 
    <?php dynamic_sidebar('career'); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endwhile; ?>
</div>  
</section>
</div>
<?php get_footer(); ?>