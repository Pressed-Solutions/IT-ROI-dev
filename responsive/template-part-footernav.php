
<footer class="it-new-content container dmbs-container clearfix">
    
<?php $obj = get_queried_object(); $custom_post_type = $obj->post_type; ?>
<div class="social-links row">
    <ul>
        <li><a target="_blank" class="linkedin" href="<?php the_author_meta( 'linkedin', 1 ); ?>"><span class="hidden">LinkedIn</span></a></li>
        <li><a target="_blank" class="facebook" href="<?php the_author_meta( 'facebook', 1 ); ?>"><span class="hidden">Facebook</span></a></li>
        <li><a target="_blank" class="twitter" href="<?php the_author_meta( 'twitter', 1 ); ?>"><span class="hidden">Twitter</span></a></li>
        <li><a target="_blank" class="youtube" href="<?php the_author_meta( 'youtube', 1 ); ?>"><span class="hidden">YouTube</span></a></li>
    </ul>
</div>

<div class="itroi-info row">
    <div class="about col-md-6">
    <?php   $arg=array('numberposts'=>1 , 'post_type' => 'footercontant');
            $posts=get_posts($arg);
            foreach($posts as $post) : setup_postdata($post);
                $footercontent= trim($post->post_content);
                echo "<div>".$footercontent."</div>";
            endforeach;
            ?>
    </div><!-- .about -->
    <div class="youtube-player-wrapper col-md-6 clearfix">
        <div class="youtube-player">
        <?php   $arg=array('numberposts'=>1 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC');
                $posts=get_posts($arg);
                foreach($posts as $post) : setup_postdata($post);
                $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                $content=$post->post_content;
                endforeach;
        ?>
            <iframe width="100%" height="100%" name="iframe" class="youtube-iframe" src="<?php echo $content;?>"></iframe>
        </div><!-- .youtube-player -->
    </div><!-- .youtube-player-wrapper -->
</div><!-- .itroi-info -->

<div class="bottom-nav row">
    <nav class="navbar navbar-inverse" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div><!-- div.navbar-header -->

        <a class="small-logo col-md-2" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" ></a>

    <?php wp_nav_menu( array(
            'theme_location' => '',
            'menu' => 'footer-1',
            'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled',
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse navbar-1-collapse col-md-10',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker()) ); ?>
    </nav><!-- nav.navbar.navbar-inverse -->
</div><!-- div.bottom -->

<div class="copyright row">
    <?php wp_nav_menu( array(
        'theme_location' => '',
        'menu' =>'footer-2',
        'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?>
    <div class="itroi">&copy;<?php if ( date( 'Y') > 2014 ) { echo '2014&ndash;' . date( 'Y' ); } else { echo '2014'; } ?> IT-ROI Solutions</div>
</div><!-- div.copyright -->


</footer><!-- .it-new-content .container .dmbs-container -->
