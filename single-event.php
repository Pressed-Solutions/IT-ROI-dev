<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;">
  <div class="panel-panel panel-col-first">
  <div class="inside">
<div class="panel-pane pane-block pane-quicktabs-homepage-quicktab" >
  
      
  
  <div class="pane-content">
    <div  id="quicktabs-homepage_quicktab" class="quicktabs-wrapper quicktabs-style-nostyle"><div id="quicktabs-container-homepage_quicktab" class="quicktabs_main quicktabs-style-nostyle"><div  id="quicktabs-tabpage-homepage_quicktab-0" class="quicktabs-tabpage "><div id="block-views-latest-articles-block-1" class="block block-views">

    
  <div class="content">
    <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-d2aad2774da5445702cc7a30b6ba6da6">
  
                                                            <div class="view-content"  id="Top">


		<?php  // the loop
                if ( have_posts() ) : 
			 while ( have_posts() ) : the_post(); ?>
                        <div class="views-row views-row-1">

             <style>
                 .post
                 {
                     margin-top: 28px;
                 }
                 .share
                 {
                     display: inline-block;
                 }
             </style>
                            
                            
     <div class="post">
        <?php $key='permission';
        $post_id=$post->ID;
       $permission = get_post_meta( $post_id, $key, true ); ?>
      <div class="">
                                                                                <div class="field field-name-title field-type-ds field-label-hidden">
                                                                                    <div class="field-items">
                                                                                         <h1 style="font-size:0px;"></h1>
          <br/>
                     <div class="post-title" property="schema:name"><h2><?php echo the_title(); ?></h2></div>
                                                                                    </div>                                                             </div>
          <div class="post-meta" style="margin-top: -10px;">Posted &#64; <?php
                                                                                 $post_date1=$post->post_date;
                                                                                 $post_date = date("m/d/Y", strtotime($post_date1));
                                                                                echo $post_date."&nbsp;&nbsp;";
                                                                                the_time('g:i A');
                                                                               ?>  By <b><a href="<?php echo get_site_url();?>?author=<?php echo the_author_id(); ?>" title="View user profile." class="username" xml:lang="" about="#" typeof="sioc:UserAccount" property="foaf:name" datatype="" style="color: rgba(5, 55, 105, 0.8);"><?php the_author(); ?></a></b><br/>
                                                                               <div class="cat categories"> 
                                                                                    <span style="float:left">Posted In&nbsp;<?php
$i=1;
foreach((get_the_category()) as $category) 
{
    if ($category->term_id != '1') 
                
        {

                        echo '<span>[<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . ' >' . $category->name.'</a>]</span>';
                
        }
                $i++;
}
?></span> | <a href="<?php the_permalink(); ?>"><?php  comments_number(); ?> »</a>                                             
                                                                                </div>
                                                                                </div>
                                               <div class="group_teaser_wrapper  group-teaser-wrapper speed-none effect-none">
                                                   <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                       <div class="field-items">
                                                           <div class="post-content" property="schema:articleBody content:encoded">
                                                       <?php
                                                               if($permission==1 )
                                                            {
                                                                if ( is_user_logged_in() ) 
                                                              { 
                                                                    the_content(); 
                                                                    
                                                              }
                                                                else 
                                                              { 
                                                                   
                                       /*    function registerurl()
                                        {   
                                       $query1="select * from wp_posts where post_type='page' and post_name='registration'";
                                       $result1 =  mysql_query($query1);
                                       while($w1 =  mysql_fetch_array($result1))
                                       {
                                          $register1=$w1['guid'];
                                       } 
                                       return $register1;
                                       }*/
                                       $query1="select * from wp_posts where post_type='page' and post_name='registration'";
                                       $result1 =  mysql_query($query1);
                                       while($w1 =  mysql_fetch_array($result1))
                                       {
                                          $register1=$w1['guid'];
                                       } 
                                           ?> 
                                                               <div class="register">
                                                                    <div class="formulario">
                                                                        <h2>Please Login or <a href="<?php echo $register1; ?>" style="background:#F90; padding:4px; border-radius:12px; color:#ffffff;" class="fancybox">Register</a> to access this free solution. </h2>
                                                                    </div>
                                                                </div>     
                                                                    <?php
                                                                }                                                           
                                                            }
                                                                else                               
                                                                    {
     
                                                                            $post_type=    get_post_type( $post->ID );
                                                                       if($post_type=="popularvideo" || $post_type=="itroivideo")
                                                                       {
                                                                           ?>
                                                                                                 <iframe width="80%" height="400px" name="iframe" src="<?php  echo $post->post_content;?>"></iframe>                                    <?php 
                                                                       }  else 
                                                                           {
                                                                                the_content();
                                                                           
                                                                           }
                                                                       
                                                                       }
                             ?>
                                                               </div>
                                                                                            
                                     <?php   
         if(!$biography)
    {
             ?>
                    <div class="post-toolbar">
                      <a class="entry_gototop" rel="nofollow" href="#Top">Return Top</a>
<!--                      <a class="entry_trackback" href="javascript:void(0);">Trackback</a>-->
                      <?php $r=mysql_query("select * from wp_posts where post_type='page' and post_name='print'");
                            while($result=  mysql_fetch_array($r))
                            {
                                $url =$result['guid'];
                            }
                        ?>
                        <a  class="entry_print" target="_blank" href="<?php echo $url; ?>&id=<?php echo $post->ID;  ?>" >Print</a>
                        <a target="_blank" class="entry_permaLink" href="<?php the_permalink();?>">Permalink</a>
                        <div style="display:none" class="entry_trackback_url">Trackback URL:<input value="javascript:void(0);" readonly="true" onclick="this.select();">
                        </div>

                   </div>
                    <div class="blog-icon post-tags"  ><strong>Popular tags: </strong>
                    <span> <?php the_tags(); ?></span>


                  </div>
<div class="share-block bookmarks bookmarks-expand bookmarks-bg-enjoy">
                        <h3 style="float:left">Share this post</h3>
                                                       <div style="float: right;margin-right: 100px;margin-top: 20px;">
                                                           <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Facebook'></span>
                <span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Twitter'></span>
                <span class='st_linkedin_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Linkedin'></span>
                <span class='st_googleplus_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Google+'></span>
                <span class='st_sharethis_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='ShareThis'></span>
                <span class='st_email_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Email'></span>
                                                       </div>
</div>
 <div id="nav-below" class="navigation" style=" margin-bottom: 20px;">
    <div class="nav-previous">
        
               <?php previous_post('&laquo;%', '&nbsp;', 'yes'); ?>
                
    </div>
    <div class="nav-next">
        
               <?php next_post('% &raquo;', '&nbsp;', 'yes'); ?>
                
    </div>
                                                                                                   <div style="clear: both;"></div>
</div>
                                                                                       <br/> 
                                        <div id="relatedPosts">
                                            <h3>Possibly related posts:</h3>
                                           <?php  wpapi_more_from_cat(); ?>
                                        
                                        </div>   
                                                                                       <?php
    }
    ?>
                    
                                                                                                                                                  </div>
                                                                                    </div>
                                                                                    
                                                                                </div>  </div>
   <div style="clear: both;"></div>
                                                                        </div>

                                                                    </div>
                                                                <?php
                                                              if(!$biography)
                                                    {   
                                                                  if(is_user_logged_in())
                                                                  {
                                                                        comments_template(); 
                                                                  }
                                                                  else 
                                                                  {
                                                                    ?>
                                                                <div id="dnn_ctr1163_MainView_ViewEntry_ctl01_pnlComments">
		
    <a name="Comments"></a>
    <div class="discuss" id="divAddComments">
        <h2>Comments</h2><span> You need to log in to comment.
    </span></div>

	</div>
                                                                <?php
                                                                  }
                                                    
                                                    }
                                                    ?>
				<?php //get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php //twentythirteen_paging_nav(); ?>

		<?php //else : ?>
			<?php //get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

	</div>

                                                           



                                                        </div>  </div>
                                                </div>
                                            </div>  </div>

                                                                    </div>

                                                                </div>
                                                            
                                                            </div>
                                                                        </div>  </div>
     <?php  
                                                                          if(!$biography){ 
     get_sidebar();
                                                                          }
 else {
     ?>
        <div class="panel-panel panel-col-last" style="border-radius:37px 37px 0 0;">
    <div class="inside">
        <?php
if ( is_active_sidebar( 'bigraphy' ) ) : ?>
	<div id="tertiary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
                          <!--  <div class="right_top">
     <div class="content-pane DNNEmptyPane" id="dnn_RightTopPane"></div>  
    </div>-->
				<?php dynamic_sidebar( 'bigraphy' ); ?>
                               
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>
        </div>
        </div>
 <?php
        }
      ?>                                                                                                              
    </div>
     
          
        </div>
    </section>
</div>
<?php get_footer(); ?>