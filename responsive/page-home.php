<?php
// Template Name: Homepage

?>

<?php get_header(); ?>

<?php get_template_part('responsive/template-part', 'head'); ?>

<?php get_template_part('responsive/template-part', 'topnav'); ?>

<div class="container dmbs-container">
<!-- start content container -->
<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php //get_sidebar( 'left' ); ?>

    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php //the_content(); ?>

        <div class="custom-content">
            <div class="us-map col-md-6">
                <?php echo apply_filters( 'the_content',' [usahtml5map] '); ?>
            </div>

            <div class="contact-details col-md-6">

				<?php
 					// get block title
					if(get_field('block_title'))
					{
						echo '<h3>' . get_field('block_title') . '</h3>';
					}

					// get block text
					if(get_field('block_text'))
					{
						echo '<p>' . get_field('block_text') . '</p>';
					}

					// get phone number
					if(get_field('phone_number'))
					{
						echo '<p class="contact-phone">' . get_field('phone_number') . '</p>';
					}

					// get email address
					if(get_field('email_address'))
					{
						echo '<p class="contact-mail">' . '<a href="mailto://' . get_field('email_address') . '">' . get_field('email_address') . '</a></p>';
					}

				?>

            </div>
        </div>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

    </div>

    <?php //get the right sidebar ?>
    <?php //get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
