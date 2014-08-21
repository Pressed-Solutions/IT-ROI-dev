<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php
        add_action( 'wp_enqueue_styles', 'add_bootstrap_styles' );
        function add_bootstrap_styles() {
            wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/responsive/style.css' );
        add_action( 'wp_enqueue_scripts', 'add_bootstrap_dropdown_script' );
        function add_bootstrap_dropdown_script() {
            wp_enqueue_style( 'bootstrap-hover-dropdown', get_template_directory_uri() . '/responsive/js/bootstrap-hover-dropdown.min.js' );
        }
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
