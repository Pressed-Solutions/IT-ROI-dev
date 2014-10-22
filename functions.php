<?php
/**
 * Twenty Thirteen functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/**
 * Sets up the content width value based on the theme's design.
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Adds support for a custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueues scripts and styles for front end.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Add Open Sans and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Registers two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        register_sidebar( array(
		'name'          => __( 'Slider Widget', 'rtwentythirteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears slider on home page.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        register_sidebar( array(
		'name'          => __( 'Most Popular Tag Widget', 'rtwentythirteen' ),
		'id'            => 'most-popular-tag',
		'description'   => __( 'Appears most popular tag.', 'twentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
       /* register_sidebar( array(
		'name'          => __( 'Share Post Widget', 'rtwentythirteen' ),
		'id'            => 'share-this',
		'description'   => __( 'share post.', 'twentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
        register_sidebar( array(
		'name'          => __( 'User Login Widget', 'twentythirteen' ),
		'id'            => 'userlogin',
		'description'   => __( 'user login sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) ); */
         register_sidebar( array(
		'name'          => __( 'About Us Sidebar', 'twentythirteen' ),
		'id'            => 'career',
		'description'   => __( 'About us Sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        /* register_sidebar( array(
		'name'          => __( 'Biography Sidebar', 'twentythirteen' ),
		'id'            => 'bigraphy',
		'description'   => __( 'Biography sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );*/
          register_sidebar( array(
		'name'          => __( 'Meet Experts Sidebar', 'twentythirteen' ),
		'id'            => 'meetexperts',
		'description'   => __( 'Meet Experts sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
          register_sidebar( array(
		'name'          => __( 'Services Sidebar', 'twentythirteen' ),
		'id'            => 'integration_bridge',
		'description'   => __( 'services sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
         register_sidebar( array(
		'name'          => __( 'Services Contact Form Sidebar', 'twentythirteen' ),
		'id'            => 'integration_bridge_contact',
		'description'   => __( 'services sidebar contact form.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
         register_sidebar( array(
		'name'          => __( 'Business Service Assurance Contact Form Sidebar', 'twentythirteen' ),
		'id'            => 'business_service_assurance',
		'description'   => __( 'business service assurance sidebar contact form.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
         
          register_sidebar( array(
		'name'          => __( 'CA Solution Sidebar', 'twentythirteen' ),
		'id'            => 'casolution',
		'description'   => __( 'CA solution sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '',
		'after_title'   => '',
	) );
            register_sidebar( array(
		'name'          => __( 'Ebook Resource Widget', 'twentythirteen' ),
		'id'            => 'ebook_resource',
		'description'   => __( 'ebook resource widget.', 'tmwentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 style="height:0px;position: absolute;display: none;">',
		'after_title'   => '</h3>',
	) );
            register_sidebar( array(
		'name'          => __( 'Solution Brief Resource Widget', 'twentythirteen' ),
		'id'            => 'solution_resource',
		'description'   => __( 'Solution Resource Widget.', 'tmwentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 style="height:0px;position: absolute;display: none;">',
		'after_title'   => '</h3>',
	) );
            register_sidebar( array(
		'name'          => __( 'Product Brief Resource Widget', 'twentythirteen' ),
		'id'            => 'product_resource',
		'description'   => __( 'Product Brief Resource Widget.', 'tmwentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 style="height:0px;position: absolute;display: none;">',
		'after_title'   => '</h3>',
	) );
          
         
           register_sidebar( array(
		'name'          => __( 'Contact Us Sidebar', 'twentythirteen' ),
		'id'            => 'contact',
		'description'   => __( 'contact us sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        /*     register_sidebar( array(
		'name'          => __( 'B2B Service Sidebar', 'twentythirteen' ),
		'id'            => 'b2bservice',
		'description'   => __( 'b2b service sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
              register_sidebar( array(
		'name'          => __( 'Integration Bridge Sidebar', 'twentythirteen' ),
		'id'            => 'integration_bridge_ib3',
		'description'   => __( 'Integration bridge sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widg3et-title">',
		'after_title'   => '</h3>',
	) );
          
              register_sidebar( array(
		'name'          => __( 'Migration Bridge Sidebar', 'twentythirteen' ),
		'id'            => 'migration_bridge_mb3',
		'description'   => __( 'Migration bridge sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widg3et-title">',
		'after_title'   => '</h3>',
	) );
               register_sidebar( array(
		'name'          => __( ' Integration Manager Sidebar', 'twentythirteen' ),
		'id'            => 'integration_manager_im',
		'description'   => __( ' Integration manager sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widg3et-title">',
		'after_title'   => '</h3>',
	) );
                register_sidebar( array(
		'name'          => __( 'PPM Excel Interface Sidebar', 'twentythirteen' ),
		'id'            => 'ppmexcel',
		'description'   => __( 'Ppm excel manager sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widg3et-title">',
		'after_title'   => '</h3>',
	) );
                 register_sidebar( array(
		'name'          => __( 'PPM Document Boss Sidebar', 'twentythirteen' ),
		'id'            => 'ppm_document',
		'description'   => __( 'Ppm document sidebar.', 'tmwentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widg3et-title">',
		'after_title'   => '</h3>',
	) );
                    register_sidebar( array(
		'name'          => __( 'PPM Boss Menu Widget', 'twentythirteen' ),
		'id'            => 'ppm_boss',
		'description'   => __( 'ppm boss menu widget.', 'tmwentythirteen' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 style="height:0px;position: absolute;">',
		'after_title'   => '</h3>',
	) );
                 */   
          
        
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) );
                        ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php  previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); 
                                               ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extends the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjusts content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

function my_cpt_post_types( $post_types ) 
{
    $post_types[] = 'sharepoint';
    $post_types[] = 'about';
    $post_types[] = 'services';
    $post_types[] = 'itroiexperts';
    $post_types[] = 'integration';
    $post_types[] = 'reporting';
    $post_types[] = 'casolution';
    return $post_types;
}
add_filter( 'cpt_post_types', 'my_cpt_post_types' );

function extra_contact_info($contactmethods) 
{

unset($contactmethods['aim']);

unset($contactmethods['yim']);

unset($contactmethods['jabber']);

$contactmethods['facebook'] = 'Facebook';

$contactmethods['twitter'] = 'Twitter';

$contactmethods['linkedin'] = 'LinkedIn';

$contactmethods['googleplus'] = 'Google+';

$contactmethods['youtube'] ='youtube'; 

return $contactmethods;

}

add_filter('user_contactmethods', 'extra_contact_info');

add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
$args['smallest'] = 8;
$args['largest'] = 14;
return $args; }


add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

function custom_nextpage_links($defaults) 
{
$args = array(
'before' => '<div class="my-paginated-posts"><p>' . __('Sections &#151;'),
'after' => '</p></div>',
);
$r = wp_parse_args($args, $defaults);
return $r;
}
add_filter('wp_link_pages_args','custom_nextpage_links');

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
      
        echo '<div class="navigation" style="float:right;text-align:right;"> <ul>' . "\n";
        
	/**	Previous Post Link */
 	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 4, $links ))
			echo '<li> ... </li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			

		$class = $paged == $max ? ' class="active"' : '';
	//	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
       
        if ( ! in_array( $max, $links )  ) {
            if ( ! in_array( $max, $links ) )
			echo '<li> ... </li>';
            
		$class = $max == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );
        echo '<li><a href="#">Return Top</a></li>';

	echo '</ul></div>' . "\n";
        echo "<div style='float:right;text-align:right;'><p>Pages: </p></div>";
}
function wpbeginner_numeric_posts_nav1() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
      
        echo '<div class="navigation1" style="float:right;text-align:right;"> <ul>' . "\n";
        if($paged!=1)
        {
            printf( '<li%s><a href="%s">First</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        }
        else 
        {
              printf( '<li>First</li>');
        }
            ?>
        <?php
	/**	Previous Post Link */
 	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 4, $links ))
			echo '<li> ... </li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			

		$class = $paged == $max ? ' class="active"' : '';
	//	printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
       
        if ( ! in_array( $max, $links )  ) {
            if ( ! in_array( $max, $links ) )
			echo '<li> ... </li>';
            
		$class = $max == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );
        if($paged!=$max)
        {
        echo '<li><a href="'.get_pagenum_link( $max ).'">Last</a></li>';
        }
 else 
     {
        echo '<li>Last</li>';
     }

	echo '</ul></div>' . "\n";
        echo "<div style=' float: right;font-size: 15px;margin-right: 10px;'>Page ".$paged." of ".$max."</div>";
}
function twentythirteen_get_archives_callback($item, $index, $currYear) {
    global $wp_locale;

    if ( $item['year'] == $currYear ) {
        $url = get_month_link( $item['year'], $item['month'] );
        // translators: 1: month name, 2: 4-digit year
        $text = sprintf(__('%1$s %2$d'), $wp_locale->get_month($item['month']), $item['year']);
        echo get_archives_link($url, $text);
    }
}

/*function twentythirteen_get_archives() {
    global $wpdb;

    $query = "SELECT YEAR(post_date) AS `year` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year` ORDER BY `year` DESC";
    $arcresults = $wpdb->get_results($query);
    $years = array();

    if ($arcresults) {
        foreach ( (array)$arcresults as $arcresult ) {
            array_push($years, $arcresult->year);
        }
    }

    $query = "SELECT YEAR(post_date) as `year`, MONTH(post_date) as `month` FROM $wpdb->posts WHERE `post_type` = 'post' AND `post_status` = 'publish' GROUP BY `year`, `month` ORDER BY `year` DESC, `month` ASC";
    $arcresults = $wpdb->get_results($query, ARRAY_A);
    $months = array();

    if ( $arcresults ) {
        foreach ($years as $year) {
                    //My Display
            //echo "\t<li>\n\t\t<a href=\"#\">$year</a>\n\t\t<ul>\n";
            //array_walk($arcresults, "twentyeleven_get_archives_callback", $year);
            //echo "\t\t</ul>\n\t</li>\n";

                    //Your Display
            echo "\t<h2>$year</h2>\n\t<ul>\n";
            array_walk($arcresults, "twentythirteen_get_archives_callback", $year);
            echo "\t</ul>\n";
        }
    }
}*/
/*function somefunction($content) {
        if ( !is_user_logged_in() )
                echo "...put something here if not logged in";
        else
                return $content;
}

add_filter('the_content', 'somefunction');*/

/*function register_post_assets(){
    add_meta_box('login-post', __('ADD Login permission on this post'), 'add_login_meta_box', 'post', 'advanced', 'high');
}
add_action('admin_init', 'register_post_assets', 1);

function add_login_meta_box($post){
    $login = get_post_meta($post->ID, '_login-post', true);
    echo "<label for='_login-post'>".__('Not Show this post without login?', 'foobar')."</label>";
    echo "<input type='checkbox' name='_login-post' id='login-post' value='".$post_id."' ".checked(1, $login)." />";
} 

function save_login_meta($post_id){
    // Do validation here for post_type, nonces, autosave, etc...
    if (isset($_REQUEST['login-post']))
        
    echo    update_post_meta(esc_attr($post_id, '_login-post', esc_attr($_REQUEST['login-post']))); 
        // I like using _ before my custom fields, so they are only editable within my form rather than the normal custom fields UI
}
add_action('save_post', 'save_login_meta');
*/

/* Define the custom box */
add_action( 'add_meta_boxes', 'wpse_61041_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'wpse_61041_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function wpse_61041_add_custom_box() {
    add_meta_box( 
        'wpse_61041_sectionid',
        'Permission show post',
        'wpse_61041_inner_custom_box',
        'post',
        'side',
        'high'
    );
}

/* Prints the box content */
function wpse_61041_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'wpse_61041_wpse_61041_field_nonce', 'wpse_61041_noncename' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $post->ID, 'permission', true);
    if( !$saved )
        $saved = '0';

    $fields = array(
        '0'       => __('Show full post', 'wpse'),
        '1'     => __('not show full post without login', 'wpse'),
        
    );

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="permission" value="%1$s" id="permission[%1$s]" %3$s />'.
            '<label for="permission[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
}

/* When the post is saved, saves our custom data */
function wpse_61041_save_postdata( $post_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['wpse_61041_noncename'], 'wpse_61041_wpse_61041_field_nonce' ) )
          return;

      if ( isset($_POST['permission']) && $_POST['permission'] != "" ){
            update_post_meta( $post_id, 'permission', $_POST['permission'] );
      } 
}
function custom_search_form( $form, $value = "Search", $post_type = 'post' ) {
    $form_value = (isset($value)) ? $value : attribute_escape(apply_filters('the_search_query', get_search_query()));
    $form = '<form method="get" id="searchform" action="' . get_option('home') . '/" >
    <div>
        <input type="hidden" name="post_type" value="'.$post_type.'" />
        <input type="text" value="' . $form_value . '" name="s" id="s" />
        <input type="hidden" value="" name="website" id="website"  />        
        <input type="submit" id="searchsubmit" value="'.attribute_escape(__('Search')).'" />
    </div>
    </form>';
    return $form;
}
function ajaxify() 
{
    $post_id = $_POST['post_id'];
    $post_data = get_post($post_id);
    echo json_encode($post_data);
}

//-> Do NOT include the opening php tag
 
// Wrap first word of widget title into a span tag
function child_span_widgets( $old_title ) {
$title = explode( " ", $old_title, 6 );
$titleNew = "<span>$title[0] </span> <span>$title[1] </span><span>$title[2] </span><span>$title[3] </span><span>$title[4] </span><br/>$title[5]";
return $titleNew;
}
add_filter ( 'widget_title', 'child_span_widgets' );

// add featured image 2nd


if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'services',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Left bottom image ',
                    'set'       => 'Set Left bottom image ',
                    'remove'    => 'Remove Left bottom image ',
                    'use'       => 'Use as Left bottom image ',
                )
        );

        new kdMultipleFeaturedImages( $args );
}
//integration post type

add_action('init', 'integration_register');

function integration_register() {

	$labels = array(
		'name' => _x('Integration', 'post type general name'),
		'singular_name' => _x('Integration', 'post type singular name'),
		'add_new' => _x('Add New', 'integration'),
		'add_new_item' => __('Add New Integration'),
		'edit_item' => __('Edit Integration'),
		'new_item' => __('Integration'),
		'view_item' => __('View Integration'),
		'search_items' => __('Search Integration'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
        

/**  
 * 		'rewrite' => 'integration',

 *  */	
        $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'integration',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'integration' , $args );
}

// sharepoint solution
add_action('init', 'sharepoint_register');

function sharepoint_register() {

	$labels = array(
		'name' => _x('Sharepoint', 'post type general name'),
		'singular_name' => _x('Sharepoint', 'post type singular name'),
		'add_new' => _x('Add New', 'sharepoint'),
		'add_new_item' => __('Add New Sharepoint'),
		'edit_item' => __('Edit Sharepoint'),
		'new_item' => __('New Sharepoint'),
		'view_item' => __('View Sharepoint'),
		'search_items' => __('Search Sharepoint'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'sharepoint',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'sharepoint' , $args );
}
/******************************************************************************
*************************** Start Reporting Menu Post Page ***************
/******************************************************************************/
/*
add_action('init', 'reporting_register');

function reporting_register() {

	$labels = array(
		'name' => _x('Reporting', 'post type general name'),
		'singular_name' => _x('Reporting', 'post type singular name'),
		'add_new' => _x('Add New', 'reporting'),
		'add_new_item' => __('Add New Reporting'),
		'edit_item' => __('Edit Reporting'),
		'new_item' => __('Reporting'),
		'view_item' => __('View Reporting'),
		'search_items' => __('Search Reporting'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'reporting',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type( 'reporting' , $args );
}
*/
/******************************************************************************
*************************** End of the Reporting Menu Post Page ***************
/******************************************************************************/

//services 

add_action('init', 'services_register');

function services_register() {

	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('Services', 'post type singular name'),
		'add_new' => _x('Add New', 'services'),
		'add_new_item' => __('Add New Services'),
		'edit_item' => __('Edit Services'),
		'new_item' => __('Services'),
		'view_item' => __('View Services'),
		'search_items' => __('Search Services'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'services',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'services' , $args );
}

// CA Solution Post type

add_action('init', 'review_register');

function review_register() {

	$labels = array(
		'name' => _x('CA Solutions Article', 'post type general name'),
		'singular_name' => _x('CA Solutions', 'post type singular name'),
		'add_new' => _x('Add New Article', 'Solutions'),
		'add_new_item' => __('Add New Article'),
		'edit_item' => __('Edit Articles'),
		'new_item' => __('New CA Solutions'),
		'view_item' => __('View CA Solutions'),
		'search_items' => __('Search CA Solutions'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'casolution' , $args );
}

// Custom Taxonomy

function add_console_taxonomies() 
{

	register_taxonomy('console', 'casolution', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'CA Solutions Category', 'taxonomy general name' ),
			'singular_name' => _x( 'CA Solutions', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search CA Solutions Categories' ),
			'all_items' => __( 'All CA Solutions Categories' ),
			'parent_item' => __( 'Parent CA Solutions Category' ),
			'parent_item_colon' => __( 'Parent CA Solutions Category:' ),
			'edit_item' => __( 'Edit CA Solutions Category' ),
			'update_item' => __( 'Update CA Solutions Category' ),
			'add_new_item' => __( 'Add New CA Solutions Category' ),
			'new_item_name' => __( 'New CA Solutions Category Name' ),
			'menu_name' => __( 'CA Solutions Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'console', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_console_taxonomies', 0 );

/********************************************************************************************************************************************************/
/*********************************** Featured CA Solutions Sub menu create in CA Solutions Section in  Admin ********************************************/
/********************************************************************************************************************************************************/
/*
$labels = array(
		'name' => _x('CA Solutions Featured Article', 'post type general name'),
		'singular_name' => _x('CA Solutions Featured Article', 'post type singular name'),
		'add_new' => _x('Add New', 'FeaturedCASolutions'),
		'add_new_item' => __('Add New Featured Article'),
		'edit_item' => __('Edit Featured Article'),
		'new_item' => __('New Featured Article'),
		'view_item' => __('View Featured Article'),
		'search_items' => __('Search Featured Article'),
		'not_found' =>  __('No Featured CA Solutions Article(s) found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

        $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => null,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'revisions' ),
        'show_in_menu' => 'edit.php?post_type=casolution',
        'public' => true
        );
        register_post_type( 'featuredcasolutions', $args );
 */

/********************************************************************************************************************************************************/
/********************************************************************************************************************************************************/
/********************************************************************************************************************************************************/

//about landing page

add_action('init', 'about_register');

function about_register() {

	$labels = array(
		'name' => _x('About', 'post type general name'),
		'singular_name' => _x('About', 'post type singular name'),
		'add_new' => _x('Add New', 'about'),
		'add_new_item' => __('Add New About'),
		'edit_item' => __('Edit About'),
		'new_item' => __('New About'),
		'view_item' => __('View About'),
		'search_items' => __('Search About'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'about',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'about' , $args );
}
//itroi experts

add_action('init', 'itroiexperts_register');

function itroiexperts_register() {

	$labels = array(
		'name' => _x('ITROI Experts', 'post type general name'),
		'singular_name' => _x('ITROI Experts', 'post type singular name'),
		'add_new' => _x('Add New', 'itroiexperts'),
		'add_new_item' => __('Add New ITROI Experts'),
		'edit_item' => __('Edit ITROI Experts'),
		'new_item' => __('New ITROI Experts'),
		'view_item' => __('View ITROI Experts'),
		'search_items' => __('Search ITROI Experts'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => 'itroiexperts',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail'),
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
	  ); 

	register_post_type( 'itroiexperts' , $args );
}

// template for ca solution 
/*
add_filter( 'template_include', 'include_template_function', 1 );
function include_template_function( $template_path ) {
    if ( get_post_type() == 'casolution' ) {
        if ( is_single() ) 
            {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-casolution.php' ) ) ) 
                {
                $template_path = $theme_file;
                } 
           else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-casolution.php';
                }
        }
        
            
 else 
     {
     if ( $theme_file = locate_template( array ( 'casolution-category.php' ) ) ) 
         {
                $template_path = $theme_file;
         } 
    else {
                $template_path = plugin_dir_path( __FILE__ ) . '/casolution-category.php';
         }
         
    }
    }
    return $template_path;
   
}
*/
add_action( 'init', 'footercontant' );
function footercontant() {
  $labels = array(
    'name' => _x('Footer Content', 'post type general name'),
    'singular_name' => _x('footercontant', 'post type singular name'),
    'add_new' => _x('Add New', 'Footer Content'),
    'add_new_item' => __('Add New Footer Content'),
    'edit_item' => __('Edit Footer Content'),
    'new_item' => __('New Footer Content'),
    'view_item' => __('View Footer Content'),
    'search_items' => __('Search Footer Content'),
    'not_found' =>  __('No Footer Content found'),
    'not_found_in_trash' => __('No Footer Content found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title','editor','excerpt',	'trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');
  register_post_type( 'footercontant', 
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'rewrite' => false,
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
    )
  );
}
add_action( 'init', 'create_itroivideo' );
function create_itroivideo() {
  $labels = array(
    'name' => _x('ITROI Videos', 'post type general name'),
    'singular_name' => _x('itroivideo', 'post type singular name'),
    'add_new' => _x('Add New', 'ITROI Videos'),
    'add_new_item' => __('Add New ITROI Videos'),
    'edit_item' => __('Edit ITROI Videos'),
    'new_item' => __('New ITROI Videos'),
    'view_item' => __('View ITROI Videos'),
    'search_items' => __('Search ITROI Videos'),
    'not_found' =>  __('No ITROI Videos found'),
    'not_found_in_trash' => __('No It-roi Videos found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title','editor','excerpt',	'trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');
  register_post_type( 'itroivideo', 
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'rewrite' => false,
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
        
    )
  );
}

add_action( 'init', 'create_popularvideo' );
function create_popularvideo() {
  $labels = array(
    'name' => _x('Popular Webinars', 'post type general name'),
    'singular_name' => _x('popularvideo', 'post type singular name'),
    'add_new' => _x('Add New', 'Popular Webinars'),
    'add_new_item' => __('Add New Popular Webinars'),
    'edit_item' => __('Edit Popular Webinars'),
    'new_item' => __('New Popular Webinars'),
    'view_item' => __('View Popular Webinars'),
    'search_items' => __('Search Popular Webinars'),
    'not_found' =>  __('No Popular Webinars found'),
     'not_found_in_trash' => __('No Popular Webinars found in Trash'),
    'parent_item_colon' => ''
  );
  $supports = array('title','editor','excerpt',	'trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');
  register_post_type( 'popularvideo', 
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
	  'rewrite' => false,
                'capabilities' => array(
                'edit_post'          => 'update_core',
                'read_post'          => 'update_core',
                'delete_post'        => 'update_core',
                'edit_posts'         => 'update_core',
                'edit_others_posts'  => 'update_core',
                'publish_posts'      => 'update_core',
                'read_private_posts' => 'update_core')
       
    )
  );
}
//
//
////b2b solution
//
//add_action( 'init', 'create_b2bsolution' );
//
//function create_b2bsolution() {
//  $labels = array(
//    'name' => _x('B2B Solution', 'post type general name'),
//    'singular_name' => _x('b2bsolution', 'post type singular name'),
//    'add_new' => _x('Add New', 'b2bsolution'),
//    'add_new_item' => __('Add New b2bsolution'),
//    'edit_item' => __('Edit b2bsolution'),
//    'new_item' => __('New b2bsolution'),
//    'view_item' => __('View b2bsolution'),
//    'search_items' => __('Search b2bsolution'),
//    'not_found' =>  __('No User b2bsolution found'),
//     'not_found_in_trash' => __('No User b2bsolution found in Trash'),
//    'parent_item_colon' => ''
//  );
//  $supports = array('title','editor','excerpt',	'trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes');
//  register_post_type( 'b2bsolution', 
//    array(
//      'labels' => $labels,
//      'public' => true,
//      'supports' => $supports,
//	  'rewrite' => false,
//        'capability_type' => 'post',
//       
//    )
//  );
//}
//get category id by category name

function get_category_id($cat_name)
{
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}
add_action( 'add_meta_boxes', 'c3m_sponsor_meta' );
        function c3m_sponsor_meta() 
{
                add_meta_box( 'c3m_meta', 'Sponsor URL Metabox', 'c3m_sponsor_url_meta', 'post', 'side', 'high' );
}

            function c3m_sponsor_url_meta( $post ) {
                $c3m_sponsor_url = get_post_meta( $post->ID, '_c3m_sponsor_url', true);
                echo 'Please enter the sponsors website link below';
                ?>
                <input type="text" name="c3m_sponsor_url" value="<?php echo esc_attr( $c3m_sponsor_url ); ?>" />
                <?php
        }
add_action( 'save_post', 'c3m_save_project_meta' );
        function c3m_save_project_meta( $post_ID ) {
            global $post;
            if( $post->post_type == "biography" ) {
            if (isset( $_POST ) ) {
                update_post_meta( $post_ID, '_c3m_sponsor_url', strip_tags( $_POST['c3m_sponsor_url'] ) );
            }
        }
        }
        add_action('init', 'renameCategory');
function renameCategory() {
    global $wp_taxonomies;

    $cat = $wp_taxonomies['category'];
    $cat->label = 'Knowledge & Insight';
    $cat->labels->singular_name = 'Knowledge & Insight';
    $cat->labels->name = $cat->label;
    $cat->labels->menu_name = $cat->label;
    //�
}
function change_category_taxonomy_label() {
    global $wp_taxonomies;
 
    $labels = $wp_taxonomies['category']->labels;
 
    if(!empty($labels)){
        $search = array('Categories', 'Category', 'category');
        $replace = array('Knowledge & Insight', 'Knowledge & Insight', 'knowledge & insight');
 
        foreach ($labels as $key => $label) {
            //search and replace category with new TAX labels
            $label = str_replace($search, $replace, $label);
 
            //Update the labels with new values
            $wp_taxonomies['category']->labels->$key = $label;
        }
    }
    //lastly, update label
    $wp_taxonomies['category']->label = 'Knowledge & Insight';
 
 }
 
 function jwh_manage_columns( $columns ) {
 
    $columns['categories'] = 'Knowledge & Insight';
       return $columns;
}
 
function jwh_column_init() 
{
  add_filter( 'manage_posts_columns' , 'jwh_manage_columns' );
}
add_action( 'admin_init' , 'jwh_column_init' );
// "Similier Articles"
function wpapi_more_from_cat() {
    global $post;
    // We should get the first category of the post
    $categories = get_the_category( $post->ID );
    $first_cat = $categories[0]->cat_ID;
    // Let's start the $output by displaying the title and opening the <ul>
   // $output = '<h3>' . $title . '</h3>';
    // The arguments of the post list!
    $args = array(
        // It should be in the first category of our post:
        'category__in' => array( $categories ),
        // Our post should NOT be in the list:
        'post__not_in' => array( $post->ID ),
        // ...And it should fetch 5 posts - you can change this number if you like:
        'posts_per_page' => 5
    );
    // The get_posts() function
    $posts = get_posts( $args );
    if( $posts ) {
        $output = '<ul style="margin-bottom: 20px;padding-right: 5px;width: 400px;">';
        // Let's start the loop!
        foreach( $posts as $post ) 
        {
            setup_postdata( $post );
            $post_title = get_the_title();
            $permalink = get_permalink();
            $output .= '<li><a href="' . $permalink . '" title="' . esc_attr( $post_title ) . '">' . $post_title . '</a></li>';
        }
        $output .= '</ul>';
    } else {
        // If there are no posts, we should return something, too!
        $output .= '';
    }
    echo $output;
}
function get_permalink_by_slug( $slug, $post_type = '' ) 
{

	// Initialize the permalink value
	$permalink = null;

	// Build the arguments for WP_Query
	$args =	array(
		'name' 			=> $slug,
		'max_num_posts' => 1
	);

	// If the optional argument is set, add it to the arguments array
	if( '' != $post_type ) {
		$args = array_merge( $args, array( 'post_type' => $post_type ) );
	} // end if

	// Run the query (and reset it)
	$query = new WP_Query( $args );
	if( $query->have_posts() ) {
		$query->the_post();
		$permalink = get_permalink( get_the_ID() );
	} // end if
	wp_reset_postdata();

	return $permalink;

}
function filter_value($value)
{
    $value = stripslashes($value);
    $value = mysql_real_escape_string($value);
    $value=  strip_tags($value);
    return $value;
}

/******************check valid host name **************************************/
function check_validhost()
{
   if ( isset( $_SERVER['HTTP_REFERER'] ) ) 
    {
        $refer = trim( $_SERVER['HTTP_REFERER'] );
        if (empty($refer))  
        {
                 wp_redirect( home_url() );
                exit();
        }
    }
} 

/******************check valid host name **************************************/
function set_cipher($name)
{
     $rnd=md5(uniqid(rand(), true));
    $_SESSION["'".$name."'"]=$rnd;
    return $rnd;
   
} 
/******************************************************************************/
//add_action('after_setup_theme', 'remove_admin_bar');
//
//function remove_admin_bar() {
//if (!current_user_can('administrator') && !is_admin()) {
//  show_admin_bar(false);
//}
//
//}
add_action('after_setup_theme', 'checkuserrole');
function checkuserrole()
{
    global $current_user;
    $current_user = wp_get_current_user();
    if($current_user)
    {
            if ( is_user_logged_in() ) {
                $check='0';
                $user = new WP_User( $current_user );
                if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
                        foreach ( $user->roles as $role )
                            switch($role) 
                            {
                                    case ('administrator'||'editor'||'contributor'||'author'):$check='1';
                                    break;
                                    default:$check='0';
                                    break;
                            }
                            
                }
                if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
                        foreach ( $user->roles as $role )
                            switch($role) 
                            {
                                    case ('administrator'||'editor'||'author'):show_admin_bar(true);
                                    break;
                                    default:show_admin_bar(false);
                                    break;
                            }
                            
                }
                if($check)
                {

                }else
                {
                   wp_logout();
                   $_SESSION["checkactive"]="1";
                }
        }
        
    }
        
    
}
   

/*
Validate Numbers in Contact Form 7
This is for 10 digit numbers
*/

function is_number( $result, $tag ) {
$type = $tag['type'];
$name = $tag['name'];

if ($name == 'phone' || $name == 'fax') { // Validation applies to these textfield names. Add more with || inbetween
$stripped = preg_replace( '/\D/', '', $_POST[$name] );
$_POST[$name] = $stripped;
if( strlen( $_POST[$name] ) != 10 ) { // Number string must equal this
$result['valid'] = false;
$result['reason'][$name] = $_POST[$name] = 'Please enter a 10 digit phone number.';
}
}
return $result;
}

add_filter( 'wpcf7_validate_text', 'is_number', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'is_number', 10, 2 );

// test URL against whitelist to determine whether to load responsive functions and styles or not
// TODO: remove this test when site conversion is complete
$uri_whitelist = array(
    '/integration/integration-bridge/',
    '/integration/ppm-excel-interface/',
    '/sharepoint/ideation-integrated-solution-for-clarity-ppm/',
    '/events/',
    '/events/page/1/',
    '/events/page/2/',
    '/events/page/3/'
);

$requested_uri = $_SERVER["REQUEST_URI"];

if ( in_array( $requested_uri, $uri_whitelist ) || is_admin() ) {
    require_once('responsive/functions.php');
}

// modify Author Avatar plugin output
// NOTE: move to responsive functions.php
function modify_avatar_list( $postcount ) {
    // modify post count display
    $postcount = str_replace( '(', '', $postcount );
    $postcount = str_replace( ')', '', $postcount );
    $output = sprintf( '<span class="post-count">%s posts</span>', $postcount );

    return $output;
}
add_filter( 'aa_post_count', 'modify_avatar_list' );
