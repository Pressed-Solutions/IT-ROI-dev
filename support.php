<?php
/**
 * The template for displaying all pages.
 * template name:Support
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 
 */

get_header(); ?>
<div class="content" >
    <div class="panel-display panel-2col clearfix">
        <div class="support_wapper">
            <div class="inside">
                <div class="pane-content">
                    <div class="content">
                        <div class="view-content" style="margin-top:0px;">
                            <?php /* The loop */  echo $_id=$_GET['author'];  ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <div class="field-item even" property="schema:articleBody content:encoded">
                                <?php the_content(); ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>

<?php get_footer(); ?>