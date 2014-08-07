<?php
/*
  Template Name: Layout XB3
 */
get_header();
?>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">

        <div class="border" style="margin: auto; background-color: rgb(237, 242, 247); width: 660px;">
            <div class="xb3_header" style="">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/XB3_logo.png" />
            </div>
            <div class="integratepagecontent" style="height: 350px; margin: 0px 0px 0px 43px; font-size: 19px;">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $custom = get_post_custom($post->ID);
                    ?>
                    <?php
                    $content = $post->post_content;
                    if ($content != "") {
                        echo $content;
                    }
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>              
</div>
</div>
</div> 
</div>
</section>
</div>
<?php get_footer(); ?>