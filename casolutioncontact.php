<?php
/**
 * The Template for displaying all single posts.
 * Template Name: casolution contact
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header();
?>


<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);">
    <div class="internalpage clearfix">
        <div>
            <div class="inside">
                <div class="cainternalpagecontent casolutionpage" style="margin-top: 16px;">



                    <div class="pane-content" style="padding-top:10px;">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">


                                        <div class="content" style="">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">

                                                <div class="view-content" style="margin-top:0px;">

                                                    <?php /* The loop */ ?>

                                                    <div class="views-row views-row-1">



                                                        <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
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
                                                            <div style="padding: 5px 20px 20px 20px;">
                                                                <div style="margin-top:20px;clear: both">

                                                                    <div class="field field-name-title field-type-ds field-label-hidden">

<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>             

                                                                        <?php endwhile; ?></div>


                                                                </div>




                                                            </div>  </div>
                                                    </div>
                                                </div>  </div>

                                        </div>

                                    </div>
                                </div>






                            </div>  </div>

                    </div>
                </div>
            </div>

        </div>



    </div></div>  </div>


</div>
</div>
</div>

</div>
</div>
</div>
</section>
</div>
<?php get_footer(); ?>
