<?php
/**
 * The template for displaying Category pages.
 * template name:autherpost
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
     
        $(".field-name-author").show();
        $(".field-items").show();
        $(".cat").show();
        $(".pruena").show();
        $(".close").hide();
        $(".entry-content1").hide('slow');
        $(".entry-title").click(function() 
        {
            $(".field-name-author").hide();
            $(".cat").hide();
            $(".pruena").hide();
            $(".field-items").hide();
            $(".entry-title1").hide();
            $(".entry-content1").hide();
            $(".entry-content").hide();
            $(".close").hide();
            $(this).parent().children(".close").slideToggle(500).show();
            $(this).parent().children(".entry-content1").slideToggle(500);
            $('html, body').animate({
                "scrollTop": $(this).parent().children(".post h1").offset().top
                    + $(this).parent().children(".post h1").height()}, 'fast')
        });
    
    });
    jQuery(document).ready(function($) {
        $(".entry-content1").hide('slow');

        $(".entry-title1").click(function() 
        {   
    
            $(".field-name-author").hide();
            $(".field-items").hide();
            $(".cat").hide();
            $(".pruena").hide();
            $(".entry-content1").hide();
            $(".entry-content").hide();
            $(".entry-title1").hide();
            $(".close").hide();
            $(this).parent().children(".entry-content1").show();
            $(this).parent().children(".close").slideToggle(500).show();
            $('html, body').animate({
                "scrollTop": $(this).parent().children(".post h1").offset().top
                    + $(this).parent().children(".post h1").height()}, 'fast')
        });
    });
    jQuery(document).ready(function($) {
        $(".close").click(function() 
        {   
    
            $(".field-name-author").show();
            $(".field-items").show();
            $(".cat").show();
            $(".pruena").show();
            $(".close").hide();
            $(".entry-title1").show();
            $(".entry-content1").hide('slow');
            $(".entry-content").show();
        });     
    });
</script>

<?php
sleep(3);
$id = $_GET['id'];
$args = array('post_status' => 'publish', 'author' => $id, 'post_type' => 'post');
$loop = new WP_Query($args);
while ($loop->have_posts()) : $loop->the_post();
    ?>
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
    <?php
endwhile;
?>                                    