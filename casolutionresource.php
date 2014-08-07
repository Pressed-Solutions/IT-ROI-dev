<?php
/**
 * The Template for displaying all single posts.
 * Template Name: casolution resource
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>
<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);">
    <div class="internalpage clearfix">
        <div class="inside">
            <div class="pane-content">
                <div class="casolutionslider" style="">
                    <div class="field-vitems" style="float: left; padding-top: 10px;">
                        <div>
                            <img src="<?php bloginfo("stylesheet_directory"); ?>/images/casolutionplus.png" />
                        </div>
                        <div class="casolution_title">
                            <?php //dynamic_sidebar('integration_bridge');  ?>
                            <h10><?php echo "Services"; ?></h10>
                        </div>
                        <div class="casolution-subtitle"> 
                            <?php
                            $custom = get_post_custom($post->ID);
                            $metatitle = $custom ["header_footer_data_title"][0];
                            echo "<h9>IT-ROI Solutions & CA Technologies - Specialty Services Partnership</h9>";
                            ?>
                        </div>
                    </div>
                    <div class="caservices" style="">
                        <style>
                            #menu-item-1524 a{color:#468DBD;}
                        </style>
                        <?php dynamic_sidebar('integration_bridge'); ?>      
                    </div>
                </div>
            </div>  
        </div>

        <div class="cainternalpagecontent casolutionpage">
            <div class="pane-content" style="padding-top:10px;">
                <div class="content">
                    <div class="view-content" style="margin-top:0px;">
                        <div style="margin-top: -18px; ">
                            <?php dynamic_sidebar("casolution"); ?>
                        </div>
                        <div style="float:right;">
                            <?php
                            $permalinkcasol_cnt = "";
                            $permalinkcasol_resources = "";
                            $query = "select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'";
                            $r = mysql_query($query);
                            while ($w = mysql_fetch_array($r)) {
                                $url = $w['guid'];
                                $contact = $w['post_title'];
                                $permalinkcasol_cnt = get_permalink($w['ID']);
                            }
                            ?>
                            <a href="<?php echo $permalinkcasol_cnt; ?>"><?php echo $contact; ?></a> 
                            | 
<?php
$query1 = "select * from wp_posts where post_type='page' and post_name='resources'";
$r1 = mysql_query($query1);
while ($rw = mysql_fetch_array($r1)) {
    $url1 = $rw['guid'];
    $resources = $rw['post_title'];
    $permalinkcasol_resources = get_permalink($rw['ID']);
}
?><a href="<?php echo $permalinkcasol_resources; ?>"><?php echo $resources; ?></a> 
                        </div>
                        <div style="margin-top:20px;clear: both"></div>
                    </div>
                </div>
                <div class="resource" style="padding-left:20px;">
                    <h1>Resources</h1>
                    <h2>eBook</h2>
<?php dynamic_sidebar('ebook_resource'); ?>
                    <div style="clear: both"></div>
                    <h2>Solution Brief</h2>
                    <?php dynamic_sidebar('solution_resource'); ?>
                    <div style="clear: both"></div>
                    <h2>Product Brief</h2>
                    <?php dynamic_sidebar('product_resource'); ?>
                </div>
                <div style="clear: both"></div>
                <div class="cafooter" style="">
                    <div class="cafootercontent"> <img border="0" class="clsSVFloatLeft" alt="" src="<?php bloginfo("stylesheet_directory"); ?>/images/info.gif">
                        <h4>Need More Information?</h4>
                        <p>Contact us today if you have questions about our products and services. A representative from IT-ROI Solutions will respond as soon as possible with answers to your questions.</p>
                        <div class="cafooteractionlink"><?php
                    $query = "select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'";
                    $r = mysql_query($query);
                    while ($w = mysql_fetch_array($r)) {
                        $url = $w['guid'];
                        $contact = $w['post_title'];
                    }
                    ?><a href="<?php echo $url; ?>">CONTACT US &raquo;</a>
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