
<footer class="it-new-content">
    
<?php $obj = get_queried_object(); $custom_post_type = $obj->post_type; ?>
<div class="social-links container">
    <ul>
        <li><a class="linkedin" href="<?php the_author_meta( 'linkedin', 1 ); ?>"><span class="hidden">LinkedIn</span></a></li>
        <li><a class="facebook" href="<?php the_author_meta( 'facebook', 1 ); ?>"><span class="hidden">Facebook</span></a></li>
        <li><a class="twitter" href="<?php the_author_meta( 'twitter', 1 ); ?>"><span class="hidden">Twitter</span></a></li>
        <li><a class="youtube" href="<?php the_author_meta( 'youtube', 1 ); ?>"><span class="hidden">YouTube</span></a></li>
    </ul>
</div>

<div class="medium container">
    <div class="left">
    <?php   $arg=array('numberposts'=>1 , 'post_type' => 'footercontant');
            $posts=get_posts($arg);
            foreach($posts as $post) : setup_postdata($post);
                $footercontent= trim($post->post_content);
                echo "<div>".$footercontent."</div>";
            endforeach;
            ?>
    </div>
    <div class="right">
        <div class="youtube-links">
            <h2 class="video-header">IT-ROI VIDEOS</h2>
            <ul>
                <?php $arg=array('numberposts'=>4 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC');
                $posts=get_posts($arg);
                foreach($posts as $post) : setup_postdata($post);
                $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                $content=$post->post_content
                ?>
                    <?php if($content!=""){ ?>
                        <li><a href="<?php echo $content; ?>?autoplay=1" target="iframe"><?php echo $post->post_title;?></a></li>
                    <?php } else {  ?>
                        <li> <?php  echo $content; ?></li>
                       <?php }
                endforeach;
                ?>
            </ul>
            <h2 class="video-header">POPULAR WEBINARS</h2>
            <ul>
                <?php $arg=array('numberposts'=>6 , 'post_type' => 'popularvideo','post_status' => 'publish','order' =>'ASC');
                $posts=get_posts($arg);
                foreach($posts as $post) : setup_postdata($post);
                $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                ?>
                    <li><a href="<?php echo $post->post_content;?>?autoplay=1" target="iframe"><?php echo $post->post_title;?></a></li>
                       <?php
                endforeach;
                ?>
            </ul>
        </div>

        <div class="youtube-player" >
        <?php   $arg=array('numberposts'=>1 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC');
                $posts=get_posts($arg);
                foreach($posts as $post) : setup_postdata($post);
                $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                $content=$post->post_content;
                endforeach;
        ?>
            <iframe width="100%" height="100%" name="iframe" src="<?php echo $content;?>"></iframe>
        </div>
        <div style="clear: both;"></div>
    </div><!-- div.right -->

    <div class="bottom">
        <a class="small-logo" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" ></a>
            <?php wp_nav_menu( array( 'theme_location' => '', 'menu' => 'footer-1', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled', 'container' => 'div', 'container_class' => 'collapse navbar-collapse navbar-1-collapse', 'menu_class' 'nav navbar-nav', 'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker()) );?>
    </div><!-- div.bottom -->

    <div class="copyright">
        <?php wp_nav_menu( array( 'theme_location' => '','menu' =>'footer-2', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?> <div class="itroi">&copy;<?php if ( date( 'Y') > 2014 ) { echo '2014&ndash;' . date( 'Y' ); } else { echo '2014'; } ?> IT-ROI Solutions</div>
    </div>
</div><!-- div.medium.container -->

<div style="clear: both;"></div>
</footer>
