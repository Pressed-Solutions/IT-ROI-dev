<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<!--<header class="page-header">
	<h1 class="page-title"><?php // _e( 'Nothing Found', 'twentythirteen' ); ?></h1>
</header> -->

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentythirteen' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

	<p><?php //_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'twentythirteen' ); 
        _e( '<h3 style="font-size: 2.1em;font-weight: 400;color:#333333">There are no results for this search. Please try again with different search criteria.</h3>', 'twentythirteen' );?></p>
<?php 
        if($_GET['post_type'])
             { 
                 get_search_form(); 
             }
        else 
            {
              ?>
        <form class="search-form" method="get" id="searchform" action="<?php bloginfo('home'); ?>"/>
<input type="search" placeholder="Search Site" value="<?php echo wp_specialchars($s, 1); ?>" name="s"  class="search-field" />
 <img  src="<?php echo get_template_directory_uri();?>/images/search.png" alt="search"  style="height: 44px;margin-left: -36px;margin-top: 0px;"/>
</form>
        <?php
            }
        ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentythirteen' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
