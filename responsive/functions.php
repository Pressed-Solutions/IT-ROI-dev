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

        wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/responsive/style.css', array(), '1', 'all' );

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




/*
 * Filter the Gravity Forms button type
 */
add_filter("gform_submit_button", "form_submit_button", 10, 2);

function form_submit_button($button, $form){

    return "<button class='btn btn-lg btn-primary paynow' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";

}

/*
 * Add title back to menu images for responsive pages
 */
function md_nmi_custom_content( $content, $item_id, $original_content ) {
  $content = $content . '<span class="page-title">' . $original_content . '</span>';

  return $content;
}
add_filter( 'nmi_menu_item_content', 'md_nmi_custom_content', 10, 3 );


/*
 * Add shortcode to handle CTA buttons
 */
function display_cta_buttons( $atts ) {
    // get CTA values
    $CTA_array = array();
    $CTA_array['cta_download_product_brief'] = get_post_meta( get_the_ID(), 'cta_download_the_product_brief',  true );
    $CTA_array['cta_replay_webinar']         = get_post_meta( get_the_ID(), 'cta_replay_the_webinar',          true );
    $CTA_array['cta_request_demo']           = get_post_meta( get_the_ID(), 'cta_request_a_demo',              true );
    $CTA_array['cta_talk_now']               = get_post_meta( get_the_ID(), 'cta_talk_now',                    true );

    // count number of available CTAs
    $CTA_count = count( array_filter( $CTA_array ) );
    if ( $CTA_count == 4 ) { $CTA_section_width = 'col-md-12'; }
    elseif ( $CTA_count == 3 ) { $CTA_section_width = 'col-md-9 col-md-offset-1-5'; }
    elseif ( $CTA_count == 2 ) { $CTA_section_width = 'col-md-6 col-md-offset-3'; }
    elseif ( $CTA_count == 1 ) { $CTA_section_width = 'col-md-3 col-md-offset-4-5'; }

    $CTA_width = 'col-md-' . ( 12 / $CTA_count );

    $cta_string = '<section class="cta-buttons ' . $CTA_section_width . ' clearfix">';
    foreach ( $CTA_array as $CTA_key => $CTA ) {
        if ( ! empty( $CTA ) ) { $cta_string .= '<div class="' . $CTA_width . '"><div class="cta-button ' . $CTA_key . '">' . $CTA . '</div></div>'; }
    }
    $cta_string .= '</section>';

    return $cta_string;
}
add_shortcode( 'cta_buttons', 'display_cta_buttons' );

/*
 * Add Events custom post type and taxonomy
 */

add_action('init', 'register_event_type');
function register_event_type() {
    register_post_type('event', array(
    'label' => 'Events',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'event', 'with_front' => true),
    'query_var' => true,
    'taxonomies' => array( 'country' ),
    'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
    'labels' => array (
        'name' => 'Events',
        'singular_name' => 'Event',
        'menu_name' => 'Events',
        'add_new' => 'Add Event',
        'add_new_item' => 'Add New Event',
        'edit' => 'Edit',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'view' => 'View Event',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
        'not_found' => 'No Events Found',
        'not_found_in_trash' => 'No Events Found in Trash',
        'parent' => 'Parent Event',
    )
    ) );

	$tax_labels = array(
		'name'                       => 'Event Types',
		'singular_name'              => 'Event Type',
		'menu_name'                  => 'Event Types',
		'all_items'                  => 'All Event Types',
		'parent_item'                => 'Parent Event Type',
		'parent_item_colon'          => 'Parent Event Type:',
		'new_item_name'              => 'New Event Type Name',
		'add_new_item'               => 'Add New Event Type',
		'edit_item'                  => 'Edit Event Type',
		'update_item'                => 'Update Event Type',
		'separate_items_with_commas' => 'Separate event types with commas',
		'search_items'               => 'Search Event Types',
		'add_or_remove_items'        => 'Add or remove event types',
		'choose_from_most_used'      => 'Choose from the most used event types',
		'not_found'                  => 'Not Found',
        'menu_icon'                  => 'dashicons-calendar'
	);
	$tax_args = array(
		'labels'                     => $tax_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_type', array( 'event' ), $tax_args );
}

/*
 * Pagination (events page)
 */
function pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;

    global $paged;
    if ( empty( $paged ) ) {
        $paged = 1;
    }

    if ( $pages == '' ) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if( ! $pages ) {
            $pages = 1;
        }
    }

    if ( 1 != $pages ) {
        echo "<div class='pagination'>";
        if ( ( $paged > 2 ) && ( $paged > $range + 1 ) && ( $showitems < $pages ) ) {
            echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
        }
        if ( ( $paged > 1 ) && ( $showitems < $pages ) ) {
            echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";
        }

        for ($i=1; $i <= $pages; $i++) {
            if ( ( 1 != $pages ) && ( ! ( ( $i >= $paged + $range + 1 ) || ( $i <= $paged - $range - 1 ) ) || ( $pages <= $showitems ) ) ) {
                echo ( $paged == $i ) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class='inactive' >" . $i . "</a>";
            }
        }

        if ( ( $paged < $pages ) && ( $showitems < $pages ) ) {
            echo "<a href='" . get_pagenum_link( $paged + 1 ) . "'>&rsaquo;</a>";
        }
        if ( ( $paged < $pages - 1 ) && ( $paged + $range - 1 < $pages ) && ( $showitems < $pages ) ) {
            echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
        }
        echo "</div>\n";
    }
}

// pagination - past events
function pagination_past( $pages = '', $range = 2 ) {
     $showitems = ( $range * 2 ) + 1;

     global $paged;
     if( empty( $paged ) ) { $paged = 1; }

     if( $pages == '' ) {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if( !$pages ) {
             $pages = 1;
         }
     }

     if(1 != $pages) {
         echo '<div class="pagination">';
         for ( $i = 1; $i <= $pages; $i++ ) {
             if ( $pages != 1 && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                 if ( $i == 1 ) { $pagination_hyperlink = str_replace( 'events-past/', 'events/', get_pagenum_link( $i ) ); }
                 else { $pagination_hyperlink = str_replace( 'events/', 'events-past/', get_pagenum_link( $i ) ); }
                 echo ( $paged == $i ) ? '<span class="current">' . $i . '</span>' : '<a href="' . $pagination_hyperlink . '" class="inactive" >' . $i . '</a>';
             }
         }

         if ( $paged < $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link( $paged + 1 ) . '">&rsaquo;</a>';
         if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) echo '<a href="' . get_pagenum_link( $pages ) . '">&raquo;</a>';
         echo '</div>';
     }
}

/*
 * Dev site: point search engines at live site
 */

// set subdomain
$subdomain = 'dev';

// test whether or not this is a dev site
if ( strpos( get_site_url(), $subdomain . '.' ) !== false ) {
    remove_action( 'wp_head', 'rel_canonical' );
    add_action( 'wp_head', 'my_rel_canonical' );
}

/*
 * Rebuild canonical link
 * Slightly modified from the original rel_canonical function in /wp-includes/link-template.php
 */
function my_rel_canonical() {
    global $subdomain;

    // original code
    if ( ! is_singular() ) {
        return;
    }
    global $wp_the_query;
    if ( ! $id = $wp_the_query->get_queried_object_id() ) {
        return;
    }

    // new code get current URL and strip dev subdomain
    $URL = str_replace( $subdomain . '.', '', get_permalink( $id ) );
    if( $URL ) {
        echo '<link rel="canonical" href="' . $URL . '" />';
        return;
    }

    // original code
    $link = get_permalink( $id );
    if ( $page = get_query_var( 'cpage' ) ) {
        $link = get_comments_pagenum_link( $page );
        echo '<link rel="canonical" href="' . $link . '" />';
    }
}


/*
 * Format beginning and ending dates nicely (events page)
 */
function format_event_date( $begin_date_raw, $end_date_raw ) {
    /*
     * Parameters:
     * $begin_date_raw = Unix timestamp
     * $end_date_raw = Unix timestamp
     *
     * Output:
     * $full_date: nicely-formatted, human-readable date or date range
     * Examples: October 8, 2014, November 30–December 2, 2014, or December 30, 2014–January 3, 2015
     */
    $begin_date_month = date( 'F', $begin_date_raw );
    $begin_date_day = date( 'j', $begin_date_raw );
    $begin_date_year = date( 'Y', $begin_date_raw );

    $end_date_month = date( 'F', $end_date_raw );
    $end_date_day = date( 'j', $end_date_raw );
    $end_date_year = date( 'Y', $end_date_raw );

    $full_date = $begin_date_month . ' ' . $begin_date_day;
    if ( ! empty( $end_date_raw ) ) {
        if ( $begin_date_year != $end_date_year ) { $full_date .= ', ' . $begin_date_year; }
        $full_date .= '&ndash;';
        if ( $begin_date_month != $end_date_month ) { $full_date .= $end_date_month . ' '; }
        $full_date .= $end_date_day;
    }
    $full_date .= ', ';
    if ( ! empty( $end_date_raw ) ) { $full_date .= $end_date_year; } else { $full_date .= $begin_date_year; }

    return $full_date;

}

/*
 * Include Modernizr custom build
 */
function include_modernizr() {
    wp_deregister_script( 'modernizr' );
    wp_enqueue_script( 'wp_enqueue_scripts', get_stylesheet_directory_uri() . '/responsive/js/modernizr-flexbox-svg.min.js', false, '2.8.3', false );
}
add_action( 'wp_enqueue_scripts', 'include_modernizr' );
