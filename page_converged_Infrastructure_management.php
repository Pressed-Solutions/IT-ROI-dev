<?php
/**
 * Template Name Posts: Layout NM-C Infrastructure Management
 */
get_header();
?>
<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);background: white;">
    <div class="internalpage clearfix">
        <div class="casolutionslider">
            <div class="field-vitems" style="float: left; padding-top: 10px;">
                <div> <img src="<?php bloginfo("stylesheet_directory"); ?>/images/casolutionplus.png"/> </div>
                <div class="casolution_title"><h10><?php echo "Services"; ?></h10></div>
                <div class="casolution-subtitle"> <?php $custom = get_post_custom($post->ID); ?> <?php
$metatitle = $custom ["header_footer_data_title"][0];
echo "<h9>IT-ROI Solutions & CA Technologies - Specialty Services Partnership</h9>";
?></div>
            </div>
            <div class="caservices">
                <style> #menu-item-1524 a{color:#468DBD;} </style>
<?php dynamic_sidebar('integration_bridge'); ?>      
            </div>
        </div>
        <div class="cainternalpagecontent casolutionpage">
            <div class="content" style="">
                <div class="view-content" style="margin-top:0px;">
                    <div class="views-row views-row-1">
                        <style> #menu-item-1549 a{color:#468DBD;} </style>                                               
                        <div style="margin-top: -18px;">  <?php dynamic_sidebar("casolution"); ?> </div>
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
                        <div class="casolutioninner" style="padding-left: 20px;">
                            <div style="margin-top:20px;clear: both;">

<?php while (have_posts()) : the_post(); ?>
                                    <div style="margin-top:20px;clear: both">
                                        <h1><?php the_title(); ?></h1>
                                        <p class="clsSVsubtitle"><?php the_field('subtitle'); ?></p>
                                        <div class="field field-name-title field-type-ds field-label-hidden" style=" margin-top: 10px;">
                                            <div class="field-items">
                                                <div class="field-item even" property="schema:articleBody content:encoded">
    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<?php endwhile; ?>

                            </div>
                            <!----------Middle Content Start-------------->

                            <!----------Middle Content Finish-------------->
                            <!----------Footer Resource PDF Start-------------->
<?php
$r1 = get_field('resource_1');
$r2 = get_field("resource_2");
$r3 = get_field("resource_3");
$r4 = get_field("resource_4");
$r5 = get_field("resource_5");
if ($r1 != "" || $r2 != "" || $r3 != "" || $r4 != "" || $r5 != "") {
    ?>
                                <h2 class="tHeader">Featured Resources</h2>
                                <div class="casolutionaccesslist" style="padding-left: 20px;">

                                    <ul>  <?php if ($r1 != "") { ?>
                                            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r1['url']; ?>"><?php echo $r1['title']; ?></a></li>
    <?php } if ($r2 != "") { ?>
                                            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r2['url']; ?>"><?php echo $r2['title']; ?></a></li>
                                        <?php } if ($r3 != "") { ?>
                                            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r3['url']; ?>"><?php echo $r3['title']; ?></a></li>
                                        <?php } if ($r4 != "") { ?>
                                            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r4['url']; ?>"><?php echo $r4['title']; ?></a></li>
                                        <?php } if ($r5 != "") { ?>
                                            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r5['url']; ?>"><?php echo $r5['title']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div> 
<?php } ?>
                        </div>   
                        <!----------Footer Resource PDF Finish-------------->
                        <!----------footer Start-------------->   
                        <div class="cafooter">
                            <div class="cafootercontent"> <img border="0" class="clsSVFloatLeft" alt="" src="<?php bloginfo("stylesheet_directory"); ?>/images/info.gif">
                                <h4>Need More Information?</h4>
                                <p>Contact us today if you have questions about our products and services. A representative from IT-ROI Solutions will respond as soon as possible with answers to your questions.</p>
                                <div class="cafooteractionlink">
<?php
$query = "select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'";
$r = mysql_query($query);
while ($w = mysql_fetch_array($r)) {
    $url = $w['guid'];
    $contact = $w['post_title'];
}
?>
                                    <a href="<?php echo $url; ?>">CONTACT US &raquo;</a>
                                </div>
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