<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

        
        
get_header(); ?>
<div class="meetexpert" style="padding: 0px 0px 40px 0px;">
    <div class="internalpage clearfix" style="border: 1px solid rgb(198, 198, 198);background:white;">
        <div class="panel-panel panel-col-first" >
            <div class="inside">
                <div class="panel-pane pane-block pane-views-latest-articles-block-2" >
                <div class="careerinternalslider">
                    <div class="career"> <img src="<?php bloginfo("stylesheet_directory");?>/images/careerhead.png"/> </div>
                    <div class="career_title"> <h10>Meet the Experts</h10> </div>
                    <div class="careersubtitle"> <?php $custom = get_post_custom($post->ID);?> <h9><?php the_field('subtitle')?></h9> </div>
                </div> 
                <div class="meetexpertcontent">
                    <div class="pane-content">
                        <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle">
                            <div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle">
                                <div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage ">
                                    <div id="block-views-latest-articles-block-1" class="block block-views">
                                        <div class="content">
                                            <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
                                                <div class="view-content" style="margin-top:0px;padding: 30px 20px 20px 35px;">
                                                    <?php while ( have_posts() ) : the_post(); ?>
                                                    <div class="views-row views-row-1">
                                                        <div><h8 style="color:#7c9120"><?php the_field('title'); ?></h8></div> 
                                                        <h2 style="margin:15px 0 30px!important;"><?php the_field('name'); ?></h2>
                                                        <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
                                                            <div style="margin-top:20px;">
                                                                
          
                                                                <div class="field field-name-title field-type-ds field-label-hidden meetexpert">
                                                                    <?php  $post_author=$post->post_author;
                                                                    $postid_new = get_the_ID(); ?>
                                                                <div style="width: 205px;float: left;margin-right: 15px; <?php if($postid_new=="1640"){echo "height:290px;";} ?>">
                                                                    <?php 
                                                                    $image=get_field("image");
                                                                    $imageurl=$image[url];
                                                                    if($imageurl!="") {  ?>  <img src="<?php echo $imageurl; ?>" width="202" height="253"/> <?php }  else { echo get_avatar($post_author,205,254); }
                                                                    ?>
                                                                </div> 
                                                                <?php
                                                                $videolink=get_field('about_video_link');
                                                                $videofile=get_field('about_video_file');
                                                                $videofile_path=$videofile[url];
                                                                $video_link="";
                                                                if($videolink!='') {  $video_link=$videolink; }else {   $video_link=$videofile_path; }
                                                                $video_link;
                                                                if($video_link!="") { ?>
                                                                <div style="float:left;height: 254px;margin-bottom: 20px;width: 590px;padding-left:97px;">
                                                                <!-- ********************************* Start  Webinar Video Section ********************************* -->
                                                                <iframe  width="420" height="254" frameborder="0" id="webinariframe" name="webinariframe" allowfullscreen="" src="<?php echo $video_link; ?>" style="border: solid 1px #CCC;"></iframe>
                                                                <!-- ********************************* End   Webinar Video Section  ********************************* -->
                                                                </div>
                                                                <br/><br/>
                                                                <?php } ?>
                                                               <?php /*------css for selected meet my expert  --- */ ?>
                                                               <div class="field-item even divbottom1 postcontentdiv"  >
                                                                <?php the_content(); ?>
                                                                </div>
                                                                <?php /*-----------Education start------*/ ?>
                                                                <?php $education=get_field('education'); 
                                                                if($education!="")
                                                                { ?>
                                                                <div style="" class="divbottom">
                                                                <h2>Education</h2>
                                                                <p><?php the_field('education'); ?></p>
                                                                </div>
                                                                <?php } ?>
                                                                <?php /*-----------Education finish-------->
                                                                <!-------------Certificate Image start----- */ ?>
                                                                <?php $certificate_image=get_field('certification_image'); 
                                                                $certificate=get_field('certification'); 
                                                                if($certificate_image!="" || $certificate!="")
                                                                {?>
                                                                <div style=""class="divbottom">
                                                                <h2>Certifications</h2>
                                                                <div style="float:left;">
                                                                <p><?php echo $certificate=get_field('certification'); ?></p>
                                                                </div> 
                                                                <div style="float:left;<?php if($post->ID==1647){ echo "margin: -157px 0 0 148px;";} ?>">
                                                                <?php $certificate_image=get_field('certification_image'); ?>
                                                                <img src="<?php echo $certificate_image['url']; ?>" />
                                                                </div> 
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                               <?php /*-----------Certificate Image finish------->
                                                                <!-------------Certificate start------->
                                                                <!-------------Certificate finish------->
                                                                <!-------------Technical start------- */ ?>
                                                                <?php $technical=get_field('technical_summary'); 
                                                                if($technical!="")
                                                                {?>
                                                                <div style="" class="divbottom">
                                                                <h2>Technical Summary</h2>
                                                                <?php echo $technical=get_field('technical_summary'); ?>
                                                                </div>
                                                                <?php 
                                                                }?>
                                                               <?php /*------------Technical finish-------->
                                                                <!-------------Specification start----------- */ ?>
                                                                <?php $specialties=get_field('specialties');
                                                                if($specialties!="")
                                                                {?>
                                                                <div style="" class="divbottom">
                                                                <h2>Specialties</h2>
                                                                <?php echo $specialties=get_field('specialties'); ?>
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php /*-----------Specification finish----------->
                                                                <!-------------What People are Saying start--------- */?>
                                                                <?php $what_people_are_saying=get_field('what_people_are_saying');
                                                                if($what_people_are_saying!="")
                                                                {
                                                                ?>     
                                                                <div style="" class="divbottom">
                                                                <h2>What People are Saying</h2>
                                                                <?php echo $what_people_are_saying=get_field('what_people_are_saying'); ?>
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php //-----------What People are Saying finish--------- ?>
                                                                </div>
                                                            </div>
                                                        </div>
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
                </div>
                <div class="meetexpert_page_outer_sidebar">
                    <div class="career_page_sidebar" style="margin-bottom: 17px;"> 
                        <?php dynamic_sidebar('career'); ?>
                    </div>
                    <div class="meetexpert_page_sidebar">
                        <?php dynamic_sidebar('meetexperts'); ?>
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