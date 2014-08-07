<?php
/**
 * The template for displaying Category pages.
 * template name:print
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
$id=$_GET['id']; 
if(!is_numeric($id))
{ ?><script> window.location="<?php echo site_url(); ?>/404";  </script> <?php }
else{
    $fivesdrafts = $wpdb->get_results( "SELECT * FROM wp_posts where ID='".mysql_real_escape_string($id)."'");
     if(count($fivesdrafts)==0)
    { ?><script> window.location="<?php echo site_url(); ?>/404";  </script> <?php }
}
?>
<link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style3.css" media="all"/>
<link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style4.css" media="all"/>
        <style>
            p,span,h1,h1,h3,h4,h5,h6,a
            {
               color:#000;
            }
           span b:before
           {
               content: ',';
           }
           span b:first-child:before
           {
               content: '';
           }
           
           .print_button{
               width: 200px;
               height: 20px;
               text-decoration: underline;
           }
        </style>
<div style="padding: 10px;">
    <div> <a class="print_button" href="#"  onClick="window.print();return false" >Click here to Print</a></div>
<?php


foreach ( $fivesdrafts as $post )
	{
		setup_postdata( $post );
                $post_title=$post->post_title;
                echo "<div class='post-title'><h2 style='font-size:30px;font-weight:bold'>".$post_title."</h2>";
                ?>
   
    <div style="margin-bottom:6px;font-size: 18px;">
        <span style="font-style: italic;">Posted &#64; <?php
                                                                                 $post_date1=$post->post_date;
                                                                                 $post_date = date("m/d/Y", strtotime($post_date1));
                                                                                echo $post_date."&nbsp;&nbsp;";
                                                                                the_time('g:i A');
                                                                               ?> by <?php the_author(); ?></span> | <span> Files in 
                                                                                   <?php 
                                                                                            $category = get_the_category($post->ID );
                                                                                            foreach ($category as $cat)
                                                                                            {
                                                                                                echo "<b>".$cat->cat_name."</b>";
                                                                                            }
                                                                                            ?>
                                                                               </span>
    </div>
    <div style="clear:both"></div>
    <?php
		echo "<p>".the_content()."</p>";
		
}

?>
</div>