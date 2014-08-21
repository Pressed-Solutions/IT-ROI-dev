<?php if ( has_nav_menu( 'main_menu' ) ) : ?>

   



    <div class="row dmbs-top-menu">

    

        <nav class="navbar navbar-inverse" role="navigation">

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

        </nav>

	<form role="search" method="get" class="search-form topbar" action="<?php echo home_url( '/' ); ?>">

	<label>

		<input type="search" class="search-field" placeholder="Search site" value="" name="s" title="Search for:" />

	</label>

</form>

	</div>



<?php endif; ?>



	</div>

    <!--container dmbs-container end-->



<!--<div class="homepage-slider">

    <div class="col-md-6" style="margin: 0 auto; float: none;"><?php echo do_shortcode('[smartslider2 slider="1"]'); ?></div>

</div>-->



</div>

<!--header-wrapper end-->


