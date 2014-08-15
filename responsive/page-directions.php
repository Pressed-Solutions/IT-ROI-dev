<?php
// Template Name: Directions

?>

<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<?php get_template_part('template-part', 'topnav-content'); ?>

<!-- start content container -->
<div class="row dmbs-content">


    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="custom-content">
            
            <div class="page-title col-md-12">
                <h2 class="page-header"><?php the_title() ;?></h2>
            </div>
 
            <div class="directions col-md-6">
				
				<?php if( have_rows('directions') ): ?>
 
                    <div>
                 
                    <?php while( have_rows('directions') ): the_row(); ?>
                 
                        <div class="directions-set clearfix">
							<div class="title"><h4><?php the_sub_field('title'); ?></h4></div>
                            <div class="directions-list"><?php the_sub_field('directions_list'); ?></div>
                        </div>
                        
                    <?php endwhile; ?>
                 
                    </div>
                 
                <?php endif; ?>

            </div>
                       
            <div class="location col-md-6">
				<address>
					<?php
                        // get block title
                        if(get_field('title'))
                        {
                            echo '<h4>' . get_field('title') . '</h4>';
                        }
                     
                        // get block descruption
                        if(get_field('description'))
                        {
                            echo '<p>' . get_field('description') . '</p>';
                        }
                        
                    ?>
				</address> 
                <div class="map">
                	<?php
                        // get block title
                        if(get_field('map_title'))
                        {
                            echo '<h4>' . get_field('map_title') . '</h4>';
                        }
                     
                        // get block descruption
                        if(get_field('embed_code'))
                        {
                            echo '<div>' . get_field('embed_code') . '</div>';
                        }
                        
                    ?>
                </div>     
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
