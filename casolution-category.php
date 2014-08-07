<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>


<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);">
    <div class="internalpage clearfix">

        <div class="casolutionslider">


            <div class="field-vitems" style="float: left; padding-top: 10px;">
                <div>
                    <img src="<?php bloginfo("stylesheet_directory"); ?>/images/casolutionplus.png"/>
                </div>
                <div class="casolution_title">
                    <?php //dynamic_sidebar('integration_bridge'); ?>
                    <h10><?php echo "Services"; ?></h10>
                </div>
                <div class="casolution-subtitle"> 
                    <?php $custom = get_post_custom($post->ID); ?>
                    <?php
                    $metatitle = $custom ["header_footer_data_title"][0];
                    echo "<h9>IT-ROI Solutions & CA Technologies - Specialty Services Partnership</h9>";
                    ?></div>

            </div>
            <div class="caservices">
                <style>
                    #menu-item-1524 a{color:#468DBD;}
                </style>
                <?php dynamic_sidebar('integration_bridge'); ?>      
            </div>





        </div>






        <div class="cainternalpagecontent casolutionpage">

            <div class="content" style="">


                <div class="view-content" style="margin-top:0px;">

                    <?php /* The loop */ ?>

                    <div class="views-row views-row-1">

                        <style>
                            #menu-item-1549 a{color:#468DBD;}
                        </style>                                               


                        <div style="margin-top: -18px;">
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
                        <div class="casolutioninner">
                            <div style="margin-top:20px;clear: both">

                                <h1><?php $cattitle = single_cat_title(); ?></h1>
<?php
wp_reset_query();
$i = 1;
query_posts($query_string . '&cat=' . $current_cat . '&order=ASC');
if (have_posts()) : while (have_posts()) : the_post();
        $artical_type = get_field("artical_type");

        if ($artical_type == 'yes' && $i == '1') {
            ?>

                                            <!----------Category Post Content Start-------------->

                                            <p class="clsSVsubtitle">
            <?php
            the_field('subtitle');
            ?>
                                            </p>
                                            <p style="margin-bottom: 10px;margin-top: 10px;">
                                                <?php
                                                the_field('featured_ca_products_text');
                                                ?>
                                            </p>
                                            <div class="field field-name-title field-type-ds field-label-hidden">

                                                <div class="field-item even" property="schema:articleBody content:encoded">
            <?php
            the_content();
            ?><br/>
                                                    <p><?php the_field('bottom_know_more_title'); ?><a class="contactlink"style="font-weight:normal;" href="<?php echo get_site_url(); ?>/casolutioncontact_us/"><?php the_field("contact_us_bottom_title"); ?></a></p>                                                             

                                                </div>





                                            </div>
                                            <!----------Category Content finish-------------->
                                            <!----------Category PDF Start-------------->
                                        </div>
            <?php
            $r1 = get_field('resource_pdf_1');
            $r2 = get_field("resource_pdf_2");
            $r3 = get_field("resource_pdf_3");
            if ($r1 != "" || $r2 != "" || $r3 != "") {
                ?>

                                            <?php
                                            if ($r1 != "") {
                                                ?>
                                                <div class="cafeaturedasset"><a target="_blanck" href="<?php echo $r1['url']; ?>"><?php echo $r1['title']; ?></a></div>

                                                <?php
                                            }
                                            if ($r2 != "") {
                                                ?>
                                                <div class="cafeaturedasset"><a target="_blanck" href="<?php echo $r2['url']; ?>"><?php echo $r2['title']; ?></a></div>
                                                <?php
                                            }
                                            if ($r3 != "") {
                                                ?>
                                                <div class="cafeaturedasset"><a target="_blanck" href="<?php echo $r3['url']; ?>"><?php echo $r3['title']; ?></a></div>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        }
                                        ?>  
                                        <!----------Category PDF Finish-------------->
                                        <?php
                                        $i++;
                                    } else {
                                        
                                    }
                                endwhile;
                            endif;
                            wp_reset_query();
                            ?>
                            <!----------Middle Content Start-------------->
                            <br/><br/>



                            <div>
                                <h2>Featured <?php single_cat_title(); ?></h2>
<?php query_posts($query_string . '&cat=' . $current_cat . '&order=ASC&showposts=10');
?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="caposts">
                                        <div class="clsSVProductTab"></div>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div id="quickviewdv"><a href="<?php the_permalink(); ?>" style="float: right;" id="quickview" >Quick View</a></div>
    <?php the_field('subtitle'); ?> </div>  
<?php endwhile; ?>
                            </div>

                            <br/>
                            <br/>
                            <!----------Middle Content Finish-------------->
                            <!----------Footer Resource PDF Start-------------->

<?php
$i = 1;
query_posts($query_string . '&paged=' . $paged . '&cat=' . $current_cat . '&order=ASC');
if (have_posts()) : while (have_posts()) : the_post();
        $artical_type = get_field("artical_type");
        if ($artical_type == "yes" && $i == '1') {
            ?>
                                        <?php
                                        $r1 = get_field("resource_pdf_1");
                                        $r2 = get_field("resource_pdf_2");
                                        $r3 = get_field("resource_pdf_3");
                                        if ($r1 != "" || $r2 != "" || $r3 != "") {
                                            ?>
                                            <h2 class="tHeader">Featured Resources</h2>
                                            <div class="casolutionaccesslist">
                                                <ul>
                <?php
                if ($r1 != "") {
                    ?>
                                                        <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r1['url']; ?>"><?php echo $r1['title']; ?></a></li>
                                                        <?php
                                                    }
                                                    if ($r2 != "") {
                                                        ?>
                                                        <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r2['url']; ?>"><?php echo $r2['title']; ?></a></li>
                                                        <?php
                                                    }
                                                    if ($r3 != "") {
                                                        ?>
                                                        <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r3['url']; ?>"><?php echo $r3['title']; ?></a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div> 
                                                    <?php
                                                }
                                                ?>
                                        <?php
                                    }
                                endwhile;
                            endif;
                            wp_reset_query();
                            ?>                                                         
                        </div>   
                        <!----------Footer Resource PDF Finish-------------->
                        <!----------footer Start-------------->   

                        <div class="cafooter">
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





                    </div>  </div>

            </div>





        </div>


    </div>



</div>

</section>
</div>
<?php get_footer(); ?>