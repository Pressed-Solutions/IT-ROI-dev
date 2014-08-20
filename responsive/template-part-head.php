<?php global $dm_settings; ?>

<!--custom wrapper for header elements-->
<div class="header-wrapper">
<!--header-wrapper start-->

	<div class="container dmbs-container">
    
        <div class="row dmbs-header">
    
            <?php if ( get_header_image() != '' || get_header_textcolor() != 'blank') : ?>
    
            <?php if ( get_header_image() != '' ) : ?>
                <div class="col-md-4 dmbs-header-img text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
                </div>
            <?php endif; ?>
        
            <?php endif; ?>
            
        </div>
