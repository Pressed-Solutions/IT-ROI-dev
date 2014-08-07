<?php
/*
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
session_start();
checkuserrole();



$iphone = preg_match("/iPhone/i", $_SERVER['HTTP_USER_AGENT']);
$android = preg_match("/Android/i", $_SERVER['HTTP_USER_AGENT']);
$palmpre = preg_match("/webOS/i", $_SERVER['HTTP_USER_AGENT']);
$berry = preg_match("/BlackBerry/i", $_SERVER['HTTP_USER_AGENT']);

$iphone_a = preg_match("/iphone/i", $_SERVER['HTTP_USER_AGENT']);
$android_a = preg_match("/android/i", $_SERVER['HTTP_USER_AGENT']);
$palmpre_a = preg_match("/webos/i", $_SERVER['HTTP_USER_AGENT']);
$berry_a = preg_match("/blackberry/i", $_SERVER['HTTP_USER_AGENT']);

$ipod = preg_match("/iPod/i", $_SERVER['HTTP_USER_AGENT']);
$ipad = preg_match("/iPad/i", $_SERVER['HTTP_USER_AGENT']);

if (!isset($_SESSION['mobile_referer'])) {
    $_SESSION['mobile_referer'] = "";
}

if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "http://m.itroisolutions.com/") {
    $_SESSION['mobile_referer'] = $_SERVER['HTTP_REFERER'];
}

if ($_SESSION['mobile_referer'] != "http://m.itroisolutions.com/") {
    if ($iphone || $android || $palmpre || $ipod || $ipad || $berry || $iphone_a || $android_a || $palmpre_a  || $berry_a == true) {
        echo "<script>window.location='http://m.itroisolutions.com/'</script>";
        $_SESSION['mobile_referer'] = $_SERVER['HTTP_REFERER'];
    }
}


ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);

header("X-Frame-Options: deny");
header("X-XSS-Protection: 1", "mode=block");
header("Cache-Control: no-store, no-cache");
header("X-Content-Type-Options: nosniff");
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<? ob_start("ob_gzhandler"); ?> 
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <title><?php wp_title('', true, 'right'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" >
        <meta content="text/javascript" http-equiv="Content-Script-Type" >
        <meta content="text/css" http-equiv="Content-Style-Type" >
        <meta name="Robots" CONTENT="INDEX,FOLLOW">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=IE9">
       <?php
        /*         * ********************** Custom Meta tags *************************************** */
    /*    $id = get_the_ID();
        $default_keyword = 0;
        $default_description = 0;
        if ($id) {
            $metakeywordsrows = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE meta_key = 'metakeywords'  AND post_id =" . $id);
            foreach ($metakeywordsrows as $row => $k) {
                if ($k->meta_key == "metakeywords" && $k->meta_value != "") {
                    ?> <meta name="KEYWORDS" content="<?php echo $k->meta_value ?>" /> <?php
        } else {
            $default_keyword = 1;
        }
    }
    $metadescriptionsrows = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE meta_key = 'metadescription'  AND post_id =" . $id);
    foreach ($metadescriptionsrows as $row => $k) {
        if ($k->meta_key == "metadescription" && $k->meta_value != "") {
                    ?> <meta name="DESCRIPTION" content="<?php echo $k->meta_value ?>" /> <?php
        } else {
            $default_description = 1;
        }
    }
} else {
    $default_keyword = 1;
    $default_description = 1;
}
/* * ********************** Default Meta tags *************************************** 
if ($default_description == 1) {
            ?>
            <meta  name="KEYWORDS" content="IT-ROI Solutions, itroi, Clarity PPM, SharePoint Customization, Clarity integration, Clarity Knowledge, Clarity PPM Blog, Clarity Business Intelligence, BI, enterprise reporting" />
            <?php
        }
        if ($default_description == 1) {
            ?>
            <meta name="DESCRIPTION" content="We make PPM simpler via Clarity integration adapters, SharePoint connectors, self-serve BI reporting solutions, and through our Clarity PPM knowledge base." />
            <?php
        }
        
        */
        ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <?php
        wp_head();
        check_validhost();
        ?>
       
        <link rel='SHORTCUT ICON' href='<?php bloginfo("template_directory"); ?>/images/favicon.ico' type='image/x-icon' />  
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style1.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style2.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style3.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style4.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style5.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/skin_footer.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/slidercss.css" media="all"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

    </head>
    <?php
    $obj = get_queried_object();
    $custom_post_type = $obj->post_type;
    ?>
    <body class="html front not-logged-in no-sidebars page-home <?php if ($custom_post_type == "services" || $custom_post_type == "about" || $custom_post_type == 'itroiexperts' || $custom_post_type == "casolution") { ?> backgroundimage <?php } else { ?> backgroundwhite <?php } ?> ">
        <header role="banner" class="clearfix" style="height:23px;margin-bottom: 0px;border-bottom: 1px solid #5c5c5c;line-height:20px;background-color: #000000;width:100%;">
            <div class="nav-wrapper" style="width:1268px;margin: auto;">
                <div id="block-menu-menu-itroi-secondary" class="block block-menu" style="line-height: 20px;">
                    <div class="content" style="float: right;">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu' => 'menu1', 'menu_class' => 'menu')); ?>  </div>
                </div>
            </div>
            <div style="float: right;padding-top: 10px;"></div>  
            <div id="block-menu-menu-itroi-secondary" class="block block-menu">
                <div class="content"></div>
            </div> 
            <!-- /nav -->
        </header>
        <header role="banner" class="clearfix" style="background-color:#2B2B2B ">
            <div class="banner-wrapper">
                <div class="nav-wrapper">
                    <div>
                        <a itemprop="url" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  id="logo">
                            <img itemprop="logo" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Home"  style="margin-right: 10px;padding-left: 20px;" >
                        </a>
                    </div>
                    <div id="nav-touch-wrapper">
                        <section id="navigation" class="region region-navigation">
                            <div id="block-nice-menus-1" class="block block-nice-menus">
                                <div class="content" style="">
                                    <div style="width:1060px;float:left;">    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu' => 'menu', 'menu_class' => 'nav-menu')); ?>
                                        <div style="float: right;padding-top:16px;">
                                            <?php if ($_GET['post_type']) { ?>
                                                <form method="get" id="searchform" name="searchform" action="<?php bloginfo('home'); ?>/">
                                                    <input type="text" placeholder="Search Site" value="<?php //echo wp_specialchars($s, 1);   ?>" name="s" id="s" />
                                                    <input type="hidden" value="" name="website" id="website"  />        
                                                    <input type="hidden" value="<?php echo set_cipher("Search_site"); ?>" name="Search_site" id="Search_site"  />        
                                                </form> 
                                            <?php } else { ?>
                                                <form method="get" id="searchform" name="searchform" action="<?php bloginfo('home'); ?>/">
                                                    <input type="text" placeholder="Search Site" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
                                                    <input type="hidden" value="" name="website" id="website"  />        
                                                    <input type="hidden" value="<?php echo set_cipher("Search_site"); ?>" name="Search_site" id="Search_site"  />        
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="block-menu-menu-itroi-secondary" class="block block-menu">
                                        <div class="content"></div>
                                    </div> 
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /nav -->
            </div>
        </header>
        <div role="main">
            <section id="content" class="region region-content">
                <div id="block-system-main" class="block block-system">
