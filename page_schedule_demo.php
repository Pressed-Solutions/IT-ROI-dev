<?php

/**
 * The template for displaying all pages.
 * template name:Layout Schedule a demo
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 session_start();
checkuserrole(); 
//get_header();
$nation_rows = $wpdb->get_results( "SELECT * FROM `wp_nation` ");
$productlist_rows = $wpdb->get_results( "SELECT * FROM `wp_productlist` " );
?>
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <title><?php wp_title('', true, 'right'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <meta content="text/javascript" http-equiv="Content-Script-Type" />
        <meta content="text/css" http-equiv="Content-Style-Type" />
        <meta name="Robots" CONTENT="INDEX,FOLLOW">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel='SHORTCUT ICON' href='<?php bloginfo("template_directory"); ?>/images/favicon.ico' type='image/x-icon' />  
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style1.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style2.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style3.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style4.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style5.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/skin_footer.css" media="all"/>
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_directory"); ?>/slidercss.css" media="all"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        
    </head>
<body class="html front not-logged-in no-sidebars page-home <?php if ($custom_post_type == "services" || $custom_post_type == "about" || $custom_post_type == 'itroiexperts' || $custom_post_type == "casolution") { ?> backgroundimage <?php } else { ?> backgroundwhite <?php } ?> ">
        <header role="banner" class="clearfix" style="height:23px;margin-bottom: 0px;border-bottom: 1px solid #5c5c5c;line-height:20px;background-color: #000000;width:100%;">
            <div class="nav-wrapper" style="width:1268px;margin: auto;">
                <div id="block-menu-menu-itroi-secondary" class="block block-menu" style="line-height: 20px;">
                    <div class="content" style="float: right;">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu' => 'menu1', 'menu_class' => 'menu')); ?>  </div>
                </div>
            </div>
            <div style="float: right;padding-top: 10px;"></div>  
            <div id="block-menu-menu-itroi-secondary" class="block block-menu">
                <div class="content"></div>
            </div> 
            <!-- /nav -->
        </header>
        <header role="banner" class="clearfix" style="background-color:#2B2B2B ">
            <div class="banner-wrapper">
                <div class="nav-wrapper">
                    <div>
                        <a itemprop="url" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  id="logo">
                            <img itemprop="logo" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="Home"  style="margin-right: 10px;padding-left: 20px;"/>
                        </a>
                    </div>
                    <div id="nav-touch-wrapper">
                        <section id="navigation" class="region region-navigation">
                            <div id="block-nice-menus-1" class="block block-nice-menus">
                                <div class="content" style="">
                                    <div style="width:1060px;float:left;">    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu' => 'menu', 'menu_class' => 'nav-menu')); ?>
                                        <div style="float: right;padding-top:16px;">
                                            <?php if ($_GET['post_type']) { ?>
                                                <form method="get" id="searchform" name="searchform" action="<?php bloginfo('home'); ?>/">
                                                    <input type="text" placeholder="Search Site" value="<?php //echo wp_specialchars($s, 1);   ?>" name="s" id="s" />
                                                    <input type="hidden" value="" name="website" id="website"  />        
                                                    <input type="hidden" value="<?php echo set_cipher("Search_site"); ?>" name="Search_site" id="Search_site"  />        
                                                </form> 
                                            <?php } else { ?>
                                                <form method="get" id="searchform" name="searchform" action="<?php bloginfo('home'); ?>/">
                                                    <input type="text" placeholder="Search Site" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
                                                    <input type="hidden" value="" name="website" id="website"  />        
                                                    <input type="hidden" value="<?php echo set_cipher("Search_site"); ?>" name="Search_site" id="Search_site"  />        
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="block-menu-menu-itroi-secondary" class="block block-menu">
                                        <div class="content"></div>
                                    </div> 
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /nav -->
            </div>
        </header>
        <div role="main">
            <section id="content" class="region region-content">
                <div id="block-system-main" class="block block-system">

<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/multiselect/jquery.multiSelect.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/multiselect/jquery-validate.js"></script>
<link href="<?php bloginfo("template_directory"); ?>/multiselect/jquery.multiSelect.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/multiselect/jquery.placeholder.js"></script>
<script type="text/javascript">


     
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 
			jQuery(document).ready( function() {
                       
				// Options displayed in comma-separated list   jQuery("#location").multiSelect({ oneOrMoreSelected: '*' },'','Select Location');
                                
				jQuery("#Product_list").multiSelect({ oneOrMoreSelected: '*' },'','Product(s):');
                                jQuery("#country_list").multiSelect({ oneOrMoreSelected: '*' },'','Country:');
				// Show test data
                                  
                                  jQuery('#contact_sub').click(function() {
                                    jQuery("#Schedule_contactdiv").css("height", "585px"); 
                                     var ph=jQuery("#phone").val();
                                     var your_email=jQuery("#your_email").val();
                                     if(your_email=="Enter valid email"){ your_email="";}
                                      jQuery("#mes_result").css("color", "red");
                                     // jQuery("#mes_result").css("border", "1px solid red");  
                                      
                                    if(jQuery("#first_name").val()=="")
                                    {
                                        jQuery("#mes_result").html("Please enter first name."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#first_name").css("color", "red");
                                        jQuery("#first_name").css("border", "1px solid red"); 
                                        return false;
                                    }else if(ph=="")
                                    {
                                        jQuery("#mes_result").html("Please enter phone."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#first_name").css("color", "rgb(14,109,173)");
                                        jQuery("#first_name").css("border-style", "none");  
                                        jQuery("#phone").css("color", "red");
                                        jQuery("#phone").css("border", "1px solid red"); 
                                        return false;
                                    }else if(isNaN(ph))
                                    {
                                        jQuery("#mes_result").html("Please enter numeric value in phone."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#first_name").css("color", "rgb(14,109,173)");
                                        jQuery("#first_name").css("border-style", "none");  
                                        jQuery("#phone").css("color", "red");
                                        jQuery("#phone").css("border", "1px solid red"); 
                                        return false;
                                    }else{
                                        jQuery("#phone").css("color", "rgb(14,109,173)");
                                        jQuery("#phone").css("border-style", "none");  
                                        jQuery("#mes_result").html(""); 
                                        jQuery("#mes_result").css("display", "none"); 
                                    }
                                    
                                    if(your_email=="")
                                    {   jQuery("#mes_result").html("Please enter email."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#your_email").css("color", "red");
                                        jQuery("#your_email").css("border", "1px solid red"); 
                                        return false;
                                    }else if (!validateEmail(your_email)) 
                                    {
                                        jQuery("#mes_result").html("Please enter valid email."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#your_email").css("color", "red");
                                        jQuery("#your_email").css("border", "1px solid red");
                                        return false;
                                    }
                                    
                                    if (validateEmail(your_email)) 
                                    {  jQuery("#mes_result").html(""); 
                                       jQuery("#mes_result").css("display", "none"); 
                                       jQuery("#your_email").css("color", "rgb(14,109,173)");
                                       jQuery("#your_email").css("border-style", "none");  
                                    }
                                   
                                    
                                    if(jQuery("#country_listmultisel").html()=="Country:")
                                    {   jQuery("#mes_result").html("Please enter country."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#country_list").css("color", "red");
                                        jQuery("#country_list").css("border", "1px solid red"); 
                                        return false;
                                    }else{
                                        jQuery("#mes_result").html(""); 
                                       jQuery("#mes_result").css("display", "none"); 
                                        jQuery("#country_list").css("color", "rgb(14,109,173)");
                                        jQuery("#country_list").css("border-style", "none"); 
                                    }
                                    
                                     if(jQuery("#Product_listmultisel").html()=='Product(s):')
                                    { 
                                         jQuery("#mes_result").html("Please select products."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#Product_list").css("color", "red");
                                        jQuery("#Product_list").css("border", "1px solid red"); 
                                        return false;
                                    }else{
                                        jQuery("#mes_result").html(""); 
                                       jQuery("#mes_result").css("display", "none"); 
                                        jQuery("#Product_list").css("color", "rgb(14,109,173)");
                                        jQuery("#Product_list").css("border-style", "none"); 
                                    }
                                    
                                     if(jQuery("#message").val()=="")
                                    { 
                                        
                                        jQuery("#mes_result").html("Please enter note."); 
                                        jQuery("#mes_result").css("display", "block"); 
                                        jQuery("#message").css("color", "red");
                                        jQuery("#message").css("border", "1px solid red"); 
                                        return false;
                                    }else { 
                                        jQuery("#mes_result").html(""); 
                                        jQuery("#mes_result").css("display", "none"); 
                                        jQuery("#message").css("color", "rgb(14,109,173)");
                                        jQuery("#message").css("border-style", "none"); 
                                    }
                                    
                                     var form=jQuery("#sehcduledemo");
                                     var postData=form.serialize();
                                     jQuery("#first_name").css("border-style", "none");
                                     jQuery("#phone").css("border-style", "none");
                                     jQuery("#your_email").css("border-style", "none");
                                     jQuery("#country_list").css("border-style", "none");
                                     jQuery("#Product_list").css("border-style", "none");
                                      
            <?php    
            // select * from wp_posts where post_name='Save Schedule a demo'
 $query="select * from wp_posts where post_type='page' and post_name='2973'";
   $qr= mysql_query($query);
                while($qr1=mysql_fetch_array($qr))
                {
                    $url=$qr1['guid'];
                }
                
                ?>
        //jQuery('#showdata').html('<img src="images/loadingimage.gif"> Loading...');
        $.ajax({
        type: "post",
        url:  "<?php echo $url; ?>",
        data : postData,
        cache: true,
        success: function(html)
        {   
                                                            if(html==1)
                                                            {
                                                                
                                                                jQuery("#Schedule_contactdiv").css("height", "585px"); 
                                                                jQuery("#mes_result").html("Request Submitted successfully."); 
                                                                jQuery("#mes_result").css("color", "green");
                                                                jQuery("#mes_result").css("display", "block"); 
                                                                jQuery( '#sehcduledemo' ).each(function(){
                                                                    this.reset();
                                                                });
                                                                jQuery("#country_listmultisel").html("Country:");
                                                                jQuery("#Product_listmultisel").html('Product(s):');
                                                            }else
                                                            {
                                                               
                                                            }
                                                   }});
         
                                      
                                                                jQuery("#Schedule_contactdiv").css("height", "585px"); 
                                                               jQuery("#mes_result").html("Request Submitted successfully."); 
                                                                jQuery("#mes_result").css("color", "green");
                                                                jQuery("#mes_result").css("display", "block"); 
                                                                jQuery( '#sehcduledemo' ).each(function(){
                                                                   this.reset();
                                                                });
                                                                jQuery("#country_listmultisel").html("Country:");
                                                                jQuery("#Product_listmultisel").html('Product(s):'); 
                                   
                                });
        });
        
       
            
</script>
<style>
    
#wpcf7-f2412-p2413-o1 span input{
    color:rgb(14,109,173) !important;
   
}
::-webkit-input-placeholder { /* WebKit browsers */
    color:rgb(14,109,173) !important;
    padding-left: 2px;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:rgb(14,109,173) !important;
    padding-left: 2px;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:rgb(14,109,173) !important;
    padding-left: 2px;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
    color:rgb(14,109,173) !important;
    padding-left: 2px;
}
 input.s::-webkit-input-placeholder {  color:red !important;}
 input.s:-moz-placeholder{  color:red !important;}
 input.s::-moz-placeholder {  color:red !important;}
 input.s:-ms-input-placeholder { color:red !important; }

</style>
<div class="internalcontent" style="padding: 0px 0px 32px 0px;">
    <div class="internalpage clearfix">
        <div class="border" style="margin-top: -31px;">
            <div class="integratepagecontent" style="padding:30px 0px 0px 0px;margin: 0px 0px 0px 31.5%;margin-bottom: 117px;">
                <div class="Schedule_contact" id="Schedule_contactdiv">
                        <div class="Schedule_head">  <h3>Schedule a demo</h3>
                        <span class="subtitle">We promise to not share your information with any outside organization.</span>
                        </div>
                        <div class="wpcf7" id="wpcf7-f2412-p2413-o1">
                            <form id="sehcduledemo" name="sehcduledemo" method="post" class="wpcf7-form" >
                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                    <div style="display: none;">
                                        <input type="hidden" name="_wpcf7" value="2412" />
                                        <input type="hidden" name="_wpcf7_version" value="3.5.3" />
                                        <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f2412-p2413-o1" />
                                        <input type="hidden" name="_wpnonce" value="" />
                                    </div>
                                <div class="schedule_phone_block"> </div>
                                <div id="mes_result" class="mesg_result"></div>
                                <div class="float_left_maindiv">
                                    <div class="float_left_adiv"><p class="messageimage"></p></div>
                                    <div  class="float_left_bdiv" id="native-example" >
                                         <table>
                                            <tr>
                                                <td>
                                                    <span class="wpcf7-form-control-wrap first-name"><input type="text" name="first-name" id="first_name" value="" size="40" class="fname wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-name"  placeholder="First name:" autocomplete="off"/></span></td>
                                                <td><span class="wpcf7-form-control-wrap last-name"><input type="text" name="last-name" value="" size="40" class="wpcf7-form-control wpcf7-text form-name" placeholder="Last name:" autocomplete="off"autocomplete="off"/></span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="wpcf7-form-control-wrap phone"><input type="text" name="phone" id="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-name"  placeholder="Phone:" autocomplete="off"/></span></td>
                                                <td><span class="wpcf7-form-control-wrap company"><input type="text" name="company" value="" size="40" class="wpcf7-form-control wpcf7-text form-name" placeholder="Company:" autocomplete="off"/></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><span class="wpcf7-form-control-wrap your-email"><input type="text" name="your-email" id="your_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"  placeholder="Your work email:" autocomplete="off" /></span></td>
                                            </tr>

                                            <tr>

                                                <td colspan="2"><span class="wpcf7-form-control-wrap menu-840">

                                                        <select id="country_list" name="country_list[]" size="5" multiple="multiple">   
                                                    <option value="">Country:</option>
                                                     <?php  foreach($nation_rows as $nrow=>$k1)
                                                            {
                                                            echo "<option value='$k1->country_id' >$k1->country_name</option>";

                                                            }
                                                 ?>                                 
                                                 </select>
                                                    </span></td>
                                           </tr>
                                             <tr>
                                                 <td colspan="2"><span class="wpcf7-form-control-wrap menu-840">
                                               <select id="Product_list" multiple="multiple" size="5" name="Product_list[]">   
                                                    <option value="">Product(s):</option>
                                                                 <?php  foreach($productlist_rows as $prow=>$k)
                                                            {
                                                                echo "<option value='$k->id' >$k->product</option>";
                                                            }
                                                 ?>                                   
                                                 </select>
                                                </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                  
                                                    <span class="wpcf7-form-control-wrap message"><textarea name="message" id="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Note:"></textarea></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" id="contact_sub" value=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                  </div>
                <script>
			$('input[type=text], input[type=password], textarea', $('#native-example')).placeholder();
		</script>
            </div>
        </div>
    </div>
</div>

<!--=============================================-->
</div>
</section>
</div>
<?php //get_footer(); ?>
<div id="footerITnew">
    
    <?php $obj = get_queried_object(); $custom_post_type = $obj->post_type; ?>
    <div class="footerITnew_content">
        <div class="footerITnew_conten_top <?php if($custom_post_type=="services" || $custom_post_type=="about" || $custom_post_type=="itroiexperts" || $custom_post_type=="casolution" ){ ?> backgroundimage<?php } else {?> backgroundwhite<?php }?>">
            <div class="footerITnew_conten_top_menu">
                <div class="a1">
                    <UL>
                        <li><a class="first" href="<?php the_author_meta( 'linkedin', 1 );?>" target="_blank"></a></li>
                        <li><a class="facebook" href="<?php the_author_meta( 'facebook', 1 );?>" target="_blank"></a></li>
                        <li><a class="twitter" href="<?php the_author_meta( 'twitter', 1 );?>" target="_blank"></a></li>
                        <li class="youtube"><a href="<?php the_author_meta( 'youtube', 1 );?>" target="_blank"></a></li>
                        <li class="footer-youtube-left"></li>
                    </UL>
                </div>
            </div>
          </div>
          <div class="medium">
            <div class="left">
            <?php   $arg=array('numberposts'=>1 , 'post_type' => 'footercontant'); 
                    $posts=get_posts($arg);
                    foreach($posts as $post) : setup_postdata($post);
                        $footercontent= trim($post->post_content);
                        echo "<div>".$footercontent."</div>";
                    endforeach;
                    ?>
            </div>
            <div class="right">
                <div class="uno">
                    <div class="newtopmenu">
                        <span style="color: white;font-size: 10pt;margin-bottom: 7px; margin-top: 0px;"><strong>IT-ROI VIDEOS</strong></span>
                        <ul style="list-style-position: outside!important;margin-top: 3px;margin-bottom: 3px;">
                            <?php $arg=array('numberposts'=>4 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC'); 
                            $posts=get_posts($arg);
                            foreach($posts as $post) : setup_postdata($post);
                            $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                            $content=$post->post_content
                            ?>
                                <?php if($content!=""){ ?>
                                    <li><a href="<?php echo $content; ?>?autoplay=1" target="iframe"><?php echo $post->post_title;?></a></li>
                                <?php } else {  ?>
                                    <li> <?php  echo $content; ?></li>
                                   <?php }
                            endforeach;
                            ?>
                            <div style="clear: both"></div>
                        </ul>
                        <span style=" color: white;font-size: 10pt;margin-bottom: 7px;margin-top: 7px;"><strong>POPULAR WEBINARS</strong></span>
                        <ul style="list-style-position: outside!important;margin-top: 3px;">
                            <?php $arg=array('numberposts'=>6 , 'post_type' => 'popularvideo','post_status' => 'publish','order' =>'ASC'); 
                            $posts=get_posts($arg);
                            foreach($posts as $post) : setup_postdata($post);
                            $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                            ?>
                                <li><a href="<?php echo $post->post_content;?>?autoplay=1" target="iframe"><?php echo $post->post_title;?></a></li>
                                   <?php
                            endforeach;
                            ?>
                            <div style="clear: both"></div>
                        </ul>
                    </div>
                </div>
                <div class="footer-youtube" >
                <?php   $arg=array('numberposts'=>1 , 'post_type' => 'itroivideo','post_status' => 'publish','order' =>'DESC'); 
                        $posts=get_posts($arg);
                        foreach($posts as $post) : setup_postdata($post);
                        $cont=apply_filters('the_content',(substr($post->post_content,0,300)));
                        $content=$post->post_content;
                        endforeach;
                ?>                                                                                 
                <iframe width="100%" height="100%" name="iframe" src="<?php echo $content;?>"></iframe>
            </div> 
        </div>
        <div class="bottom">
            <div style="width:166px;float:left"><a itemprop="url" href="<?php echo get_site_url(); ?>" title="Home" rel="home"  id="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1.png" /></a></div>
                <?php wp_nav_menu( array( 'theme_location' => '','menu' =>'footer-1', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?>
        </div>  
        <div class="title">
            <?php wp_nav_menu( array( 'theme_location' => '','menu' =>'footer-2', 'menu_class' => 'menu-item nice-menu-down nice-menus-processed sf-js-enabled') );?> <div class="itroi">&copy;2014 IT-ROI Solutions</div>
       </div>                  
  </div>
</div>
<div style="clear: both;"></div>
</div>

</body>
</html>