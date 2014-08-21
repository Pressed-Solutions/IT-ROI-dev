
<footer class="it-new-content">
    
<?php $obj = get_queried_object(); $custom_post_type = $obj->post_type; ?>
<div class="footerITnew_content">
    <div class="social-links">
        <ul>
            <li><a class="linkedin" href="<?php the_author_meta( 'linkedin', 1 ); ?>"></a></li>
            <li><a class="facebook" href="<?php the_author_meta( 'facebook', 1 ); ?>"></a></li>
            <li><a class="twitter" href="<?php the_author_meta( 'twitter', 1 ); ?>"></a></li>
            <li class="youtube"><a href="<?php the_author_meta( 'youtube', 1 ); ?>"></a></li>
        </ul>
    </div>
  <div class="medium">
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
        <div class="uno">
            <div class="newtopmenu">
                <span style="color: white;font-size: 10pt;margin-bottom: 7px; margin-top: 0px;"><strong>IT-ROI VIDEOS</strong></span>
                <ul style="list-style-position: outside!important;margin-top: 3px;margin-bottom: 3px;">
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
                    <div style="clear: both"></div>
                </ul>
                <span style=" color: white;font-size: 10pt;margin-bottom: 7px;margin-top: 7px;"><strong>POPULAR WEBINARS</strong></span>
                <ul style="list-style-position: outside!important;margin-top: 3px;">
                    <?php $arg=array('numberposts'=>6 , 'post_type' => 'popularvideo','post_status' => 'publish','order' =>'ASC');
                    $posts=get_posts($arg);
                    foreach($posts as $post) : setup_postdata($post);
                    $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                    ?>
                        <li><a href="<?php echo $post->post_content;?>?autoplay=1" target="iframe"><?php echo $post->post_title;?></a></li>
                           <?php
                    endforeach;
                    ?>
                    <div style="clear: both"></div>
                </ul>
            </div>
        </div>
        <div class="footer-youtube" >
        <?php   $arg=array('numberposts'=>1 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC');
                $posts=get_posts($arg);
                foreach($posts as $post) : setup_postdata($post);
                $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                $content=$post->post_content;
                endforeach;
        ?>
        <iframe width="100%" height="100%" name="iframe" src="<?php echo $content;?>"></iframe>
    </div>
</div>
<div class="bottom">
    <div style="width:166px;float:left"><a itemprop="url" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" ></a></div>
        <?php wp_nav_menu( array( 'theme_location' => '','menu' =>'footer-1', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?>
</div>
<div class="title">
    <?php wp_nav_menu( array( 'theme_location' => '','menu' =>'footer-2', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?> <div class="itroi">&copy;<?php if ( date( 'Y') > 2014 ) { echo '2014&ndash;' . date( 'Y' ); } else { echo '2014'; } ?> IT-ROI Solutions</div>
</div>
</div>
</div>
<div style="clear: both;"></div>
</footer>
