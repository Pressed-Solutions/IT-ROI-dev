<?php
/*
Template Name: Posts from Category
*/
?>
<?php get_header(); ?>
        <div class="container">
            <div class="block-1">
             
                <?php
                 
                query_posts( 'category_name = products-and-solutions' );
                 
                if ( have_posts() ) while ( have_posts() ) : the_post();
                 
                        echo '<li>';
                         
                            the_title();
                             
                        echo '</li>';
                         
                 endwhile;
                 
                wp_reset_query(); ?>
                     
            </div>
           
        </div>
<?php get_footer(); ?>