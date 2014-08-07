<?php
/*
  Template Name Posts: Layout CA Products & Solutions
 */
get_header();
?>


<div class="internalcontent casolution">
    <div class="  " style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);background: #FFFFFF;" >
<?php /* * ************************************************************************** */ ?>
        <div class="clearfix" style="padding: 40px 30px 0;">
            <div class="" style="float: left; padding-top: 10px;">
                <div>
                    <img src="<?php bloginfo("stylesheet_directory"); ?>/images/casolutionplus.png"/>
                </div>
                <div class="casolution_title">
<?php //dynamic_sidebar('integration_bridge');  ?>
                    <h10><?php echo "Services"; ?></h10>
                </div>
                <div class="casolution-subtitle"> 
                    <?php $custom = get_post_custom($post->ID); ?>
                    <?php
                    $metatitle = $custom ["header_footer_data_title"][0];
                    echo "<h9>IT-ROI Solutions & CA Technologies - Specialty Services Partnership</h9>";
                    ?></div>
            </div>
            <div class="caservices" style="">
                <style>
                    #menu-item-1524 a{color:#468DBD;}
                </style>
<?php dynamic_sidebar('integration_bridge'); ?>      
            </div>
        </div>
            <?php /*             * ************************************************************************** */ ?>
        <div style="margin-top: -18px;padding: 0px 30px 0;">
<?php dynamic_sidebar("casolution"); ?>
        </div>
        <div style="float:right;padding: 0px 30px 0;">
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

<?php /* * *******************Featured CA Products & Solutions******************************************************* */ ?>

        <div class="" style="padding: 40px 30px 0;">
            <p><?php echo $post->post_content; ?> </p>
            <div id="container">
                <h2 class="head_h1">Featured CA Products & Solutions </h2>
                <br/>   <?php
$console_categories = get_terms('console', array('orderby' => 'id', 'order' => 'ASC'));
$count_c = count($console_categories);
$j = 1;
foreach ($console_categories as $cat) :
    $custom_field = get_field('addfeature', 'console_' . $cat->term_id);
    if ($custom_field == '1') {
        $term_relationships = $wpdb->get_results("SELECT * FROM `wp_term_relationships` AS t INNER JOIN wp_postmeta AS p ON t.`object_id` = p.post_id WHERE p.meta_key = 'artical_type' AND p.meta_value = 'yes' AND t.term_taxonomy_id =".$cat->term_taxonomy_id." ORDER BY p.post_id DESC limit 1");
        $post_7 = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE id =".$term_relationships[0]->post_id." limit 1");
        $postmeta_7 = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE post_id=".$post_7[0]->ID." order by meta_key desc");
        $permalink = "";
        ?>
                        <div>
                            <table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="80" valign="top"><img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" /></td>
                                        <td> 
                                            <div style="padding-left: 30px;"> 

        <?php
        foreach ($post_7 as $rowpost => $postk) {
            $permalink = get_permalink($postk->ID);
            ?> 
                                                    <span class="clsSVBoldHeader"><a href="<?php echo $permalink; ?>"><?php echo $postk->post_title; ?></a></span>   <br>  
                                                    <?php
                                                }
                                                foreach ($postmeta_7 as $rowpostmeta => $postmetak) {
                                                    if ($postmetak->meta_key == "subtitle") {
                                                        ?><span class="clsSVsubtitle"><?php echo $postmetak->meta_value; ?></span><br><br> <?php
                                    }
                                    if ($postmetak->meta_key == "featured_ca_products_text") {
                                                        ?><?php echo $postmetak->meta_value; ?><?php
                                    }
                                }
                                                ?>
                                                <br><div class="clsSVQuickView" style="color:#0085CB;padding:0px 0px 0px 0px;"><a href="<?php echo $permalink; ?>">learn more</a></div>
                                            </div> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>    
                        </div>
        <?php if ($j < 4) { ?>  <div class="clsSVSectionBreakSolid"></div> <?php } $j++; ?>

    <?php } ?>
<?php endforeach; ?>
            </div><!-- #container -->

                <?php /*                 * ************************************************************************** */ ?>
            <div class="cafooter" style="padding: 0px 30px 0;">
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
<?php /* * ************************************************************************* */ ?>
</div>
</section>
</div>

<?php get_footer(); ?>