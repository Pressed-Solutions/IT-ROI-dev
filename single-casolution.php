<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="internalcontent casolution" style="padding: 0px 0px 16px 0px;border: 1px solid rgb(198, 198, 198);background: white;">
    <div class="internalpage clearfix">
        <div>
            <div class="cainternalpagecontent casolutionpage" style="margin-top: 16px;">
                <div class="pane-content" style="padding-top:10px;">
                    <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle">
                        <div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle">
                            <div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage ">
                                <div id="block-views-latest-articles-block-1" class="block block-views">
                                    <div class="content">
                                        <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
                                            <div class="view-content" style="margin-top:0px;">
                                                <div class="views-row views-row-1">
                                                    <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
                                                        <div style="margin-top: -18px;"> <?php dynamic_sidebar("casolution"); ?> </div>
                                                           <div style="float:right;">
                                                                <?php $query="select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'"; 
                                                                $r=  mysql_query($query);
                                                                while($w=mysql_fetch_array($r))
                                                                {
                                                                    $url=$w['guid'];
                                                                    $contact=$w['post_title'];
                                                                }
                                                                $query1="select * from wp_posts where post_type='page' and post_name='resources'"; 
                                                                $r1=  mysql_query($query1);
                                                                while($rw=mysql_fetch_array($r1))
                                                                {
                                                                    $url1=$rw['guid'];
                                                                    $resources=$rw['post_title'];
                                                                }?>
                                                                <a href="<?php echo $url; ?>"><?php echo $contact; ?></a> | <a href="<?php echo $url1; ?>"><?php echo $resources; ?></a> 
                                                           </div> 
                                                                <div class="casolutioninner">
                                                                   <div style="margin-top:20px;clear: both">
                                                                       <h1><?php the_title(); ?></h1>
                                                                       <p class="clsSVsubtitle"><?php the_field('subtitle');?></p>
                                                                       <div class="field field-name-title field-type-ds field-label-hidden" style=" margin-top: 10px;">
                                                                           <div class="field-items">
                                                                               <div class="field-item even" property="schema:articleBody content:encoded">
                                                                               <?php the_content(); ?>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                     </div>
         <br/><br/>
         
        <?php
         $r1=get_field('resource_1'); 
         $r2=get_field("resource_2");
         $r3=get_field("resource_3");
         $r4=get_field("resource_4");
         $r5=get_field("resource_5");
         if($r1!="" || $r2!="" || $r3!="" || $r4!="" || $r5!="")
         { ?>
         <h2 class="tHeader">Featured Resources</h2>
         <div class="casolutionaccesslist" style="padding-left: 20px;">
          
          <ul>  <?php   if($r1!="") { ?>
            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r1['url']; ?>"><?php echo $r1['title'];?></a></li>
                <?php } if($r2!="") {?>
            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r2['url']; ?>"><?php echo $r2['title'];?></a></li>
                <?php } if($r3!="") {?>
            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r3['url']; ?>"><?php echo $r3['title'];?></a></li>
                <?php } if($r4!="") {?>
            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r4['url']; ?>"><?php echo $r4['title'];?></a></li>
                <?php } if($r5!="") {?>
            <li class="clsSVAssetType_application_pdf clsSVAsset_Solution_Brief"><a target="_blanck" href="<?php echo $r5['url']; ?>"><?php echo $r5['title'];?></a></li>
                <?php } ?>
          </ul>
        </div> 
         <?php } ?>
         <div style="clear: both"></div>      
		 <div class="cafooter" style="height: 152px;">
            <div class="cafootercontent"> <img border="0" class="clsSVFloatLeft" alt="" src="<?php bloginfo("stylesheet_directory");?>/images/info.gif">
                <h4>Need More Information?</h4>
                <p>Contact us today if you have questions about our products and services. A representative from IT-ROI Solutions will respond as soon as possible with answers to your questions.</p>
                <div class="cafooteractionlink">
                <?php $query="select * from wp_posts where post_type='page' and post_name='casolutioncontact_us'"; 
                $r=  mysql_query($query);
                 while($w=mysql_fetch_array($r))
                 { $url=$w['guid'];
                   $contact=$w['post_title'];
                 }?><a href="<?php echo $url; ?>">CONTACT US &raquo;</a>
                 </div>
            </div>
         </div>

        </div>
    </div>
</div> 
</div>
</div>
    <?php endwhile; ?> 
</div>
</section>
</div>
<?php get_footer(); ?>
