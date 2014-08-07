<?php
/**
 * The template for displaying all pages.
 * template name:User Restration
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
  



?>
<link type="text/css" rel="stylesheet" href="<?php bloginfo("stylesheet_directory"); ?>/style3.css" media="all"/>
<script type="text/javascript" src="<?php bloginfo("template_directory"); ?>/js/jquery.validate.js"></script>
<script type="text/javascript">
    
jQuery(function() 
{
  /*   jQuery("#loadregister").hide();
     jQuery("#loadregister").delay(1000).fadeIn();
     jQuery('#loading').delay(585).fadeOut(); */
     jQuery("#erroruser_name").hide();
     jQuery("#errorpassword").hide();
     jQuery("#errorcpassword").hide();
     jQuery("#errorconfirmpassword").hide();
     jQuery("#errordisplay_name").hide();
     jQuery("#erroremail").hide();
     jQuery("#error").hide();
     jQuery(".close").hide();
    jQuery(".submit_button").click(function() 
    {
    var user_name = jQuery("#user_name").val();
    var password = jQuery("#password").val();
    var cpassword = jQuery("#cpassword").val();
    var display_name = jQuery("#display_name").val();
    var email = jQuery("#email").val();
    var emailfilter = /(([a-zA-Z0-9\-?\.?]+)@(([a-zA-Z0-9\-_]+\.)+)([a-z]{2,3}))+$/;
    var dataString = 'user_name='+ user_name +'&password='+ password +'&cpassword='+cpassword+'&display_name='+display_name+'&email='+ email;
    if(user_name=='')
        {
        //alert("Please Enter User Name");
        jQuery("#erroruser_name").show();
        jQuery("#user_name").focus();
        
        }
        else
            {
                jQuery("#erroruser_name").hide();
            }
     if(password=='')
        {
            jQuery("#errorpassword").show();
            jQuery("#password").focus();
        }
        else
            {
                jQuery("#errorpassword").hide();
            }
       if(cpassword=='')
        {
           // alert("Please Enter Confirm Password");
            jQuery("#errorcpassword").show();
            jQuery("#cpassword").focus();
        }
        else
            {
                jQuery("#errorcpassword").hide();
            }
        if(password!="" && cpassword!="")
        {

            if(password!=cpassword)
            {
          //  alert("Please Enter Confirm Password");
            jQuery("#errorconfirmpassword").show();
            jQuery("#cpassword").focus();
            }
        }
        else
            {
               jQuery("#errorconfirmpassword").hide(); 
            }
       if(display_name=='')
        {
            jQuery("#errordisplay_name").show();
            jQuery("#display_name").focus();
        }
        else
            {
                jQuery("#errordisplay_name").hide();
            }
    if((email == "") || (!(emailfilter.test(email ) ) )) 
        {
        // alert("Please Enter Valid Email");
          jQuery("#erroremail").show();
         jQuery("#email").focus();
        }
        else
            {
                jQuery("#erroremail").hide();
            }
            if(user_name=="" || password =="" || cpassword=="" || display_name=="" || email=="" || (!(emailfilter.test(email) ) ) || cpassword!=password)
                {
                   // jQuery("#error").show();
                   if(user_name=="")
                       {
                           jQuery("#user_name").focus();
                       }
                else if (password=='')
                        {
                           jQuery("#password").focus();
                        }
               else if (cpassword=='')
                {
                   jQuery("#cpassword").focus();
                }
                else if (cpassword!=password)
                {
                   jQuery("#cpassword").focus();
                }
                else if (display_name=='')
                {
                   jQuery("#display_name").focus();
                }
                else if (email=='' || (!(emailfilter.test(email) ) ))
                {
                   jQuery("#email").focus();
                }
                
                    return false;
                }
    else
        {
            <?php    
  $query="select * from wp_posts where post_type='page' and post_name='process'";
   $qr= mysql_query($query);
                while($qr1=mysql_fetch_array($qr))
                {
                    $url=$qr1['guid'];
                }
                
                ?>
        //jQuery('#showdata').html('<img src="images/loadingimage.gif"> Loading...');
        jQuery.ajax({
        type: "post",
        url:  "<?php echo $url; ?>",
        data: dataString,
        cache: true,
        success: function(html)
        {
            //jQuery("#regform").hide();
            jQuery("#show").html(html);
            if(html=="<p style='color:green;text-align:center;margin-top: 20px;'>You are successfully Registered<p>")
                {
                    jQuery("#regform").hide();
                    jQuery(".close").show();
                }
            document.getElementById('user_name').value='';
            document.getElementById('password').value='';
            document.getElementById('cpassword').value='';
            document.getElementById('display_name').value='';
            document.getElementById('email').value='';
        }});
        }
    return false;
    });
    jQuery("#user_name").click(function() 
    {
        jQuery("#erroruser_name").hide();
    });
    jQuery("#password").click(function() 
    {
        jQuery("#errorpassword").hide();
    });
    jQuery("#cpassword").click(function() 
    {
        jQuery("#errorcpassword").hide();
    });
    jQuery("#cpassword").click(function() 
    {
        jQuery("#errorconfirmpassword").hide();
    });
    jQuery("#display_name").click(function() 
    {
        jQuery("#errordisplay_name").hide();
    });
    jQuery("#email").click(function() 
    {
        jQuery("#erroremail").hide();
    });
    
    
});
</script>
  
 <!------------Slider Start----------->
      

 <!------------Slider Finish----------->
 
 <!------------Page Content Start----------->
 
        
                        <?php while ( have_posts() ) : the_post(); ?>
                    
                        <?php  $custom = get_post_custom($post->ID);?>
    <div class="registration" style="min-height:557px;overflow: hidden;width:1024px;">            

        <div class="field-item even" property="schema:name" style="border-bottom: 1px solid #C2C2C2;">
            <h1 style="color:#000;">IT-ROI SOLUTIONS > <?php the_title(); ?></h1>
        </div>
<!--            <div id="loading" style="min-height: 267px;margin-top: 200px;text-align: center;width:1200px;overflow:hidden;">
                <img src="<?php // bloginfo("stylesheet_directory"); ?>/images/loading.gif" style="text-align: center; height: 100px;"/>
            </div>-->
<div id="loadregister" style="min-width:1000px;">
                    <div class="dnnFormMessage dnnFormInfo">
                        <span id="dnn_ctr_Register_userHelpLabel">
                            <strong>*Note:</strong> Membership to this website is Private. Once your account information has been submitted, the Website Administrator will be notified and your application will be subjected to a screening procedure. If your application is authorized, you will receive notification of your access to the website environment. All fields marked with a red asterisk are required. - 
                            <em>(<strong>Note:</strong> - Registration may take several seconds. Once you click the Register button please wait until the system responds.)</em>
                        </span>
                    </div>
        <div style="clear: both"></div> 
   <?php    
  $query="select * from wp_posts where post_type='page' and post_name='process'";
   $qr= mysql_query($query);
                while($qr1=mysql_fetch_array($qr))
                {
                    $url=$qr1['guid'];
                }
                
                ?>
                       <div id="show">
                           
                       </div>
                       <div class="close" style="text-align: center;">
                           <a href="">Back</a>
                       </div>
                       <div id="error">
                           Please fill required Fields
                       </div>
                       <div class="field-item even" property="schema:articleBody content:encoded" style=" margin: 45px auto;width:500px;" id="regform">
                           <form  method="post" name="form" action="">
                               <table cellpadding="5" style="width:500px;" class="regformtable">
                               <tr><td class="registationbox">User Name <span class="errorContactUsIT">*</span>:</td><td><input type="text" name="user_name" required="required" id="user_name" autocomplete="off"/><div id="erroruser_name" class="errorregister">Please Enter User Name</div></td></tr>
                               <tr><td class="registationbox">Password <span class="errorContactUsIT">*</span>:</td><td><input type="password" id="password" name="password" required="required" autocomplete="off"/><div id="errorpassword" class="errorregister">Please Enter Password</div></td></tr>
                               <tr><td class="registationbox">Confirm Password <span class="errorContactUsIT">*</span>:</td><td><input type="password" name="cpassword" required="required" id="cpassword" autocomplete="off"/><div id="errorcpassword" class="errorregister">Please Enter  Confirm Password</div><div id="errorconfirmpassword" class="errorregister">Please Enter  same Password</div></td></tr>
                               <tr><td class="registationbox">Display Name <span class="errorContactUsIT">*</span>:</td><td><input type="text" name="display_name" required="required"  id="display_name" autocomplete="off"/><div id="errordisplay_name" class="errorregister">Please Enter display name</div></td></tr>
                               <tr><td class="registationbox">Email Address <span class="errorContactUsIT">*</span>:</td><td><input type="email" name="email" required="required" id="email" autocomplete="off"/><div id="erroremail" class="errorregister">Please Enter a valid Email Address</div></td></tr>
                               <tr><td colspan="2" style="text-align: center;algin:center;">
                                        <input type="hidden" value="<?php echo set_cipher("register"); ?>" name="register" id="register"  />       
                                       <input type="submit" name="sighn" value="Register" style="margin-right: 21px;margin-top: 25px;" id="portal" class="submit_button"/>
                                       <input type="reset" value="Reset" style="margin-top: 25px;" id="portal"/></td></tr>
                           </table>
                           </form>
                                                  
                    </div>
        </div>   
      
        </div>
                       <?php endwhile; ?>
                                                        
   
            
 <!------------Page Content finish------>
 <!------------Sidebar start------------->
 

<!---------------Sidebar Finish----------->