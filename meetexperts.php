<?php
/**
 * The template for displaying Author archive  meetexperts pages.
 * template name:ie
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<script type="text/javascript">
jQuery(document).ready(function($)
{
    $(".field-name-author").show();
    $(".field-items").show();
        $(".cat").show();
         $(".share").hide();
        $(".pruena").show();
        $(".close").hide();
    $(".entry-content1").hide('slow');
      $(".entry-title").click(function() 
    {
    $(".field-name-author").hide();
    $(".cat").hide();
    $(".pruena").hide();
    $(".field-items").hide();
    $(".entry-title1").hide();
    $(".entry-content1").hide();
    $(".entry-content").hide();
     $(".share").show();
    $(".close").hide();
    $(this).parent().children(".close").slideToggle(500).show();
    $(this).parent().children(".entry-content1").slideToggle(500);
    $('html, body').animate({
            "scrollTop": $(this).parent().children(".post h1").offset().top
            + $(this).parent().children(".post h1").height()}, 'fast')
    });
    
});
jQuery(document).ready(function($) {
$(".entry-content1").hide('slow');

$(".entry-title1").click(function() 
{   
    
    $(".field-name-author").hide();
    $(".field-items").hide();
    $(".cat").hide();
    $(".pruena").hide();
    $(".entry-content1").hide();
    $(".entry-content").hide();
    $(".entry-title1").hide();
    $(".close").hide();
     $(".share").show();
    $(this).parent().children(".entry-content1").show();
     $(this).parent().children(".close").slideToggle(500).show();
         $('html, body').animate({
            "scrollTop": $(this).parent().children(".post h1").offset().top
            + $(this).parent().children(".post h1").height()}, 'fast')
});
});
jQuery(document).ready(function($) {
$(".close").click(function() 
{   
    
    $(".field-name-author").show();
    $(".field-items").show();
        $(".cat").show();
        $(".pruena").show();
        $(".close").hide();
         $(".share").hide();
        $(".entry-title1").show();
    $(".entry-content1").hide('slow');
    $(".entry-content").show();
});     
});
</script>
 <div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;">
  <div class="panel-panel panel-col-first">
    <div class="inside">
<div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" style="margin-top: 16px;">
  
      
  
  <div class="pane-content">
    <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">

    
  <div class="content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
  
                                                            <div class="view-content" style="margin-top:-5px;">


		<?php if ( have_posts() ) : ?>
			<header class="">
				<h1 class=""><?php// printf( __( 'All posts by %s', 'twentythirteen' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			</header>

			<?php /* The loop */ ?>
                                
                         <?php
                     while ( have_posts() ) : the_post();
                    ?>
                         <div class="post" id="<?php the_ID(); ?>">

                                                   <?php 
        $key='permission';
        $post_id=$post->ID;
       $permission = get_post_meta( $post_id, $key, true ); ?>                    

     <div class="ds-2col node node-article node-promoted node-teaser view-mode-teaser clearfix">
      <div class="">
                                                                               
          <h1 style="font-size:0px;"></h1>
          <br/>
                                                                                  <h2 class="entry-title"  style="width:750px;"><?php  the_title();//echo $post["post_title"]; ?></h2> 
                                         <span class="close" style="z-index:99999;top:0px;display: none;"><img src="<?php bloginfo("stylesheet_directory"); ?>/images/close.jpg" style="float:right;height:30px;margin-top:-43px;margin-right:5px;"/></span>                           
                                                                                       <div class="pruena"> 
                                                                                <div class="field field-name-author"><div class="label-inline">By</div><a href="#" title="View user profile." class="username" xml:lang="" about="#" typeof="sioc:UserAccount" property="foaf:name" datatype="" style="color: rgba(5, 55, 105, 0.8);font-weight: bold;margin-right: 10px;"><?php the_author(); ?></a></div><div class="field field-name-post-date field-type-ds field-label-hidden">
                                                                                    <div class="field-items">
                                                                                       
                                                                                        <div class="field-item even" style="font-weight: bold;">On   <?php $post_date1=$post->post_date;
                                                                                 $post_date = date("F jS, Y", strtotime($post_date1));
                                                                                echo $post_date; ?></div>
                                                                                    </div>
                                                                                </div></div>
                                                                              
                                                                                        
                                                                                            <div class="entry-content" property="schema:articleBody content:encoded"><?php
                                                                $content=apply_filters('the_content',(substr($post->post_content,0,400)));;

                                                                echo trim($content);
                                                                ?>
                                                                        </div>
                                                                                <h3 class="entry-title1" style="font-size:13px;font-weight: lighter;color:#003963;margin-bottom:9px;">Read the rest of entry >></h3> <div class="cat"> <span style="float:left">in [</span><?php the_category();?>] | <?php  comments_number(); ?></div>
                                                             <div class="entry-content1">
                                                                                   <div class="post-meta">Posted @ <?php
                                                                                 $post_date1=$post->post_date;
                                                                                 $post_date = date("m/d/Y", strtotime($post_date1));
                                                                                echo $post_date."&nbsp;&nbsp;";
                                                                                the_time();
                                                                               ?>  By <b><a href="#" title="View user profile." class="username" xml:lang="" about="#" typeof="sioc:UserAccount" property="foaf:name" datatype="" style="color: rgba(5, 55, 105, 0.8);"><?php the_author(); ?></a></b><br/>
                                                                               <span style="float:left"> Posted in [</span><?php the_category();?>] | <a href="#"><?php  comments_number(); ?></a>
                                                                                </div>
                                                                                 <div class="post-content" property="schema:articleBody content:encoded">   <?php if($permission==1 ){
                                          if ( is_user_logged_in() ) { the_content(); }
                                         else {
                                             ?>
                                             <div class="register">
                 <div class="formulario">
           <h2 style="font-family:tahoma;">Please Login or <a href="<?php get_site_url(); ?>" style="background:#F90; padding:4px; border-radius:12px; color:#ffffff;"> Register</a> to access this free solution. </h2>
    </div>
                 </div>                                        
                                             <?php
 }                                  }
 else {the_content();}
                             ?></div>
                                                                                   <div class="post-toolbar">
       <a class="entry_gototop" rel="nofollow" href="#<?php the_ID();?>">Return Top</a><a class="entry_trackback" href="javascript:void(0);">Trackback</a><a  class="entry_print" href="javascript:void(0);">Print</a><a target="_blank" class="entry_permaLink" href="<?php the_permalink();?>">Permalink</a><div style="display:none" class="entry_trackback_url">Trackback URL:<input value="javascript:void(0);" readonly="true" onclick="this.select();"></div>
       
    </div>
                                                                                  <div class="blog-icon post-tags"><strong>Popular tags: </strong> <?php dynamic_sidebar('most-popular-tag'); ?></div>
                                                                                   <div class="share-block bookmarks bookmarks-expand bookmarks-bg-enjoy">
    <h3>Share this post</h3></div>
                                                                                   <div id="nav-below" class="navigation">
    <div class="nav-previous">
        
               <?php previous_post('&laquo;%', '&nbsp;', 'yes'); ?>
                
    </div>
    <div class="nav-next">
        
               <?php next_post('% &raquo;', '&nbsp;', 'yes'); ?>
                
    </div>
                                                                                                   <div style="clear: both;"></div>
</div>
                                                                                  <br/> 
                                                                                            <div id="relatedPosts"><h3>Possibly related posts:</h3><ul><?php
//for use in the loop, list 5 post titles related to first tag on current post
$tags = wp_get_post_tags($post->ID);
if ($tags) {

$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'posts_per_page'=>5,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                                                                                    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>

<?php
endwhile;
}
wp_reset_query();
}
?></ul></div> 
                                                                                  <div id="dnn_ctr1163_MainView_ViewEntry_ctl01_pnlComments">
                                                              
		
    
  

	</div>   <div class="discuss" id="divAddComments">
        <h2><a href="<?php the_permalink(); ?>">Comments</a></h2>  <?php
                                                              if(!is_user_logged_in())
                                                                  {      
                                                                  ?><span> You need to log in to comment.
    </span> <?php
                                                                  }
                                                                  ?></div>
                                                                                  </div>
                                                                                    </div>

                                                                        </div>

                                                                    </div>
				<?php //get_template_part( 'content', get_post_format() ); ?>
			<?php
                  
                endwhile; ?>
                       <?php wpbeginner_numeric_posts_nav(); ?>

  
			<?php //echo twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php //get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div>

                                                           



                                                        </div>  </div>
                                                </div>
                                            </div>  </div>

                                                                    </div>

                                                                </div>
                                                                <div class="views-row views-row-6">
                                                                   

                                                                </div>
                                                            </div>
                                                                        </div>  </div>
    <?php get_sidebar(); ?>                                             
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
