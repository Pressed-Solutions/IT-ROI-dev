<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */



$website=trim($_GET['website']);
if($website!='')
{?>
<script>
window.location='index.php'
</script>
<?php  die();
 }
 
 
$Search_site=trim($_GET['Search_site']);
if($_SESSION['Search_site']!='')
{?>
<script>
window.location='index.php'
</script>
<?php  die();
 }

get_header(); 
if($_GET["post_type"]=="post")
{
?>
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

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for %s', 'twentythirteen' ),"'".get_search_query()."'" ); ?> as follows:</h1>
                                
			</header>
                                                                <div class="searchmiddle">
                                                                        <?php echo  get_search_form( $echo = true ); ?>
                                                                </div>
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
         <h2 class="entry-title" style="margin-top:0px;"><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h2> 
                                                      
                                                    
                                                                                       
                                                                                        
                                                                               <div class="" property="schema:articleBody content:encoded">
                   <!--  changes 19_01_2014  -->
                    <?php 
                            $short_des=get_field('short_description');

                            if($short_des!="")
                            {
                              $short_des= strip_tags($short_des,'');
                             echo "<p>".$short_des."</p>";
                            }
                            else 
                                {
                                   $r=strlen($post->post_content);
                                if($r>200)
                                {
                                     $content1= strip_tags($post->post_content,'');
                                    $content=substr($content1,0,200);
                                    echo "<p>".trim($content)."...</p>";
                                }
                                else
                                {
                                    
                                    $content1= strip_tags($post->post_content,'');
                                    $content=substr($content1,0,200);
                                    echo "<p>".trim($content)."</p>";
                                }   
                                } 
                                
                    ?>
                                                                                           
                <!-- changes finish 19_01_2014 -->
                                                                                   </div>
                                                     
                                                                               <div class="post-meta1">Posted on <?php $post_date1=$post->post_date;
                                                                                 $post_date = date("m/d/Y", strtotime($post_date1));
                                                                                echo $post_date."&nbsp;";
                                                                                the_time('g:i A');?> By  <b><?php the_author(); ?></b>
                                                                               
                                                                               </div>
                                                                       
                     
     </div>
                       </div>
				<?php //get_template_part( 'content', get_post_format() ); ?>
			<?php
                  
                endwhile; ?>
                       <?php wpbeginner_numeric_posts_nav(); ?>

  
			<?php //echo twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>

                                                           



                                                        </div>  </div>
                                                </div>
                                            </div>  </div>

                                                                    </div>

                                                                </div>
                                                                
                                                            </div>
                                                                        </div>  </div>
    <?php get_sidebar(); ?>                                             
   </div>
     
                                          
        </div>
<?php
}
else
{
    ?>
            
<div class="search_site_container">
   <?php $posts=query_posts($query_string . '&posts_per_page=10');
     
        if ( have_posts() ) : ?>
    <p><?php printf( __( 'Search results for %s', 'twentythirteen' ), "<b>'".get_search_query()."'</b>" ); ?></p>
    
    <div style="width:900px;margin:auto;min-height: 400px;">
     
         <?php
          
                 $i=1;
                 while ( have_posts() ) : the_post();
         ?>
        <div <?php  if ($i%2 =='0')  
                     { 
                    ?>
                    class="lightblue"                        
                <?php
                     } 
                else 
                    { 
                    ?>
                                   class="lightgray"                        
                    <?php
                    }
                     ?> style="width:900px;margin:auto; padding-bottom: 5px;padding-top: 5px;">     

   
   <table>
       <tr><td>&nbsp;</td><td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td></tr>
       <tr><td>
           <?php  echo $i; ?>
       </td>
       <td> <span>
                        <?php 
                                $r=strlen($post->post_content);
                                if($r>140)
                                {
                                     $content1= strip_tags($post->post_content,'');
                                    $content=substr($content1,0,140);
                                    echo trim($content)."...";
                                }
                                else
                                {
                                    
                                    $content1= strip_tags($post->post_content,'');
                                    $content=substr($content1,0,140);
                                    echo trim($content);
                                }
                        ?>
                    </span></td></tr>
                    <tr><td>&nbsp;</td><td> <span>
                      <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>-<?php $post_date1=$post->post_date;
                                                                                 $post_date = date("m/d/Y", strtotime($post_date1));
                                                                                echo $post_date."&nbsp;";
                                                                                the_time('h:i:s A');?> 
                    </span></td></tr>
                
   </table>
            </div>
   
        <?php
        $i++;
        endwhile;
        
        ?>
         
        <table align="center" style="margin-top: 10px;"><tr><td><?php wpbeginner_numeric_posts_nav1(); ?></td></tr></table>
    </div>
        <?php else:
            ?>
        <div style="width:900px;margin:auto;min-height: 400px;">
          <p style="font-size:20px;">
              <?php 
                    $searchquery =get_search_query();
                        printf( __( 'Sorry, no results were found for %s', 'twentythirteen' ), "<b>'".get_search_query()."'</b>" ); ?>
          </p>
          <p>
              <a href="<?php echo get_site_url();?>">Go to home</a>
          </p>
          </div>
         <?php
        endif;
        ?>

    </div>
 <div style="clear:both;height:22px;"></div>
<?php
}
?>

    </section>
</div>
<div style="clear:both;height:18px;"></div>
<?php get_footer(); ?>
