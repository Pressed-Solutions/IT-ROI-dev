
<?php if ( has_nav_menu( 'main_menu' ) ) : ?>

    <div class="row dmbs-top-menu">
        <a itemprop="url" href="<?php echo home_url(); ?>" title="Home" rel="home" id="logo" class="col-md-2 col-sm-12">
            <img itemprop="logo" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Home">
        </a>
        <nav class="navbar navbar-inverse col-md-8 col-sm-12" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        
			<?php
            wp_nav_menu( array(
                    'theme_location'    => 'main_menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse navbar-1-collapse',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </nav><!-- .navbar .navbar-inverse .col-md-8 -->
        <form role="search" method="get" class="search-form topbar col-md-2 col-sm-12" action="<?php echo home_url( '/' ); ?>">
            <label>
                <input type="search" class="search-field" placeholder="Search site" value="" name="s" title="Search for:" />
            </label>
        </form><!-- .search-form .topbar .col-md-2 -->

	</div><!-- div.row.dmbs-top-menu -->

<?php endif; ?>

	</div><!--container dmbs-container end-->

</div><!-- .header-wrapper -->

<div class="container dmbs-container">
