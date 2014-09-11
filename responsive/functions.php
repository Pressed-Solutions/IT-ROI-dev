<?php



////////////////////////////////////////////////////////////////////

// Theme Information

////////////////////////////////////////////////////////////////////



    $themename = "pressed";

    $developer_uri = "http://pressedsolutions.com";

    $shortname = "dm";

    $version = '1.29';

    load_theme_textdomain( 'pressed', get_template_directory() . '/responsive/languages' );



////////////////////////////////////////////////////////////////////

// include Theme-options.php for Admin Theme settings

////////////////////////////////////////////////////////////////////



   include 'theme-options.php';





////////////////////////////////////////////////////////////////////

// Enqueue Styles (normal style.css and bootstrap.css)

////////////////////////////////////////////////////////////////////

    function devdmbootstrap3_theme_stylesheets()

    {

        wp_register_style('bootstrap.css', get_template_directory_uri() . '/responsive/css/bootstrap.css', array(), '1', 'all' );

        wp_enqueue_style( 'bootstrap.css');

        wp_enqueue_style( 'stylesheet', 'http://dev.itroisolutions.com/wp-content/themes/twentythirteen/responsive/style.css', array(), '1', 'all' );

    }

    add_action('wp_enqueue_scripts', 'devdmbootstrap3_theme_stylesheets');



//Editor Style

add_editor_style('responsive/css/editor-style.css');


// numbered pagination
if ( ! function_exists( 'pagination' ) )
{
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
}

////////////////////////////////////////////////////////////////////

// Register Bootstrap JS with jquery

////////////////////////////////////////////////////////////////////

    function devdmbootstrap3_theme_js()

    {

        global $version;

        wp_enqueue_script('theme-js', get_template_directory_uri() . '/responsive/js/bootstrap.js',array( 'jquery' ),$version,true );

    }

    add_action('wp_enqueue_scripts', 'devdmbootstrap3_theme_js');



////////////////////////////////////////////////////////////////////

// Add Title Parameters

////////////////////////////////////////////////////////////////////



    function devdmbootstrap3_wp_title( $title, $sep ) { // Taken from Twenty Twelve 1.0

        global $paged, $page;



        if ( is_feed() )

            return $title;



        // Add the site name.

        $title .= get_bloginfo( 'name' );



        // Add the site description for the home/front page.

        $site_description = get_bloginfo( 'description', 'display' );

        if ( $site_description && ( is_home() || is_front_page() ) )

            $title = "$title $sep $site_description";



        // Add a page number if necessary.

        if ( $paged >= 2 || $page >= 2 )

            $title = "$title $sep " . sprintf( __( 'Page %s', 'devdmbootstrap3' ), max( $paged, $page ) );



        return $title;

    }

    add_filter( 'wp_title', 'devdmbootstrap3_wp_title', 10, 2 );



////////////////////////////////////////////////////////////////////

// Register Custom Navigation Walker include custom menu widget to use walkerclass

////////////////////////////////////////////////////////////////////



    require_once('lib/wp_bootstrap_navwalker.php');

    require_once('lib/bootstrap-custom-menu-widget.php');



////////////////////////////////////////////////////////////////////

// Register Menus

////////////////////////////////////////////////////////////////////



        register_nav_menus(

            array(

                'main_menu' => 'Main Menu',

		'top_menu' => 'Top Menu',

                'footer_menu' => 'Footer Menu'

            )

        );



////////////////////////////////////////////////////////////////////

// Register the Sidebar(s)

////////////////////////////////////////////////////////////////////



        register_sidebar(

            array(

            'name' => 'Right Sidebar',

            'id' => 'right-sidebar',

            'before_widget' => '<aside id="%1$s" class="widget %2$s">',

            'after_widget' => '</aside>',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        ));



        register_sidebar(

            array(

            'name' => 'Left Sidebar',

            'id' => 'left-sidebar',

            'before_widget' => '<aside id="%1$s" class="widget %2$s">',

            'after_widget' => '</aside>',

            'before_title' => '<h3>',

            'after_title' => '</h3>',

        ));



////////////////////////////////////////////////////////////////////

// Register hook and action to set Main content area col-md- width based on sidebar declarations

////////////////////////////////////////////////////////////////////



add_action( 'devdmbootstrap3_main_content_width_hook', 'devdmbootstrap3_main_content_width_columns');



function devdmbootstrap3_main_content_width_columns () {



    global $dm_settings;



    $columns = '12';



    if ($dm_settings['right_sidebar'] != 0) {

        $columns = $columns - $dm_settings['right_sidebar_width'];

    }



    if ($dm_settings['left_sidebar'] != 0) {

        $columns = $columns - $dm_settings['left_sidebar_width'];

    }



    echo $columns;

}



function devdmbootstrap3_main_content_width() {

    do_action('devdmbootstrap3_main_content_width_hook');

}



////////////////////////////////////////////////////////////////////

// Add support for a featured image and the size

////////////////////////////////////////////////////////////////////



    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size(300,300, true);



////////////////////////////////////////////////////////////////////

// Adds RSS feed links to for posts and comments.

////////////////////////////////////////////////////////////////////



    add_theme_support( 'automatic-feed-links' );





////////////////////////////////////////////////////////////////////

// Set Content Width

////////////////////////////////////////////////////////////////////



if ( ! isset( $content_width ) ) $content_width = 800;



////////////////////////////////////////////////////////////////////

// Add Homepage Slider Scripts

////////////////////////////////////////////////////////////////////

// filter the Gravity Forms button type

add_filter("gform_submit_button", "form_submit_button", 10, 2);

function form_submit_button($button, $form){

    return "<button class='btn btn-lg btn-primary paynow' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";

}

// add title back to menu images for responsive pages
function md_nmi_custom_content( $content, $item_id, $original_content ) {
  $content = $content . '<span class="page-title">' . $original_content . '</span>';

  return $content;
}
add_filter( 'nmi_menu_item_content', 'md_nmi_custom_content', 10, 3 );


// add shortcode to handle CTA buttons
function display_cta_buttons( $atts ) {
    $cta_string = '<section class="cta-buttons col-md-12">';
    $cta_string .= '<div class="col-md-3"><div class="cta-button background-purple">' . get_post_meta( get_the_ID(), 'download_the_product_brief', true ) . '</div></div>';
    $cta_string .= '<div class="col-md-3"><div class="cta-button background-red">' . get_post_meta( get_the_ID(), 'replay_the_webinar', true ) . '</div></div>';
    $cta_string .= '<div class="col-md-3"><div class="cta-button background-blue">' . get_post_meta( get_the_ID(), 'request_a_demo', true ) . '</div></div>';
    $cta_string .= '<div class="col-md-3"><a class="background-green tel" href="tel:19545183330;ext=104">Talk now <span class="talk-now-number">945.518.330 x104</span></a></div>';
    $cta_string .= '</section>';
$cta_string .= '<!-- ID: ' . get_the_ID() . '-->'; // todo: remove this debugging line

    return $cta_string;
}
add_shortcode( 'cta_buttons', 'display_cta_buttons' );
?>
