<?php
/**
 * The template for displaying all pages.
 * template name:Thanks you
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<?php
if(isset($_POST['sighn']))
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $display_name=$_POST['display_name'];
    $email=$_POST['email'];
    if($user_name != "" && $password !="" &&  $cpassword !="" && $display_name!="" && $email !="")
    {
            if($password == $cpassword)
        {   
                if(preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/',$email))
            {
                    $query1="select * from wp_users where user_login='".$user_name."' or user_email='".$email."'";
                    $w2= mysql_query($query1);
                    $query2=mysql_num_rows($w2);
                   if($query2=='0')
                   {

            $pass=  md5($password);
            $insert="insert into wp_users(user_login,user_pass,display_name,user_email)values('".$user_name."','".$pass."','".$display_name."','".$email."')";
            $w =  mysql_query($insert);
            if($w>0)
            {
                $to=$email;
               
                $message="Dear ".$user_name.",

        You have requested a Password Reminder from IT-ROI SOLUTIONS.

        Please login using the following information:

        Website Address: itroisolutions.com
        Username: ".$user_name."
        Password: ".$password."

        Sincerely,
        IT-ROI SOLUTIONS

        *Note: If you did not request a Password Reminder, please disregard this Message.
        ";
               $subject="IT-ROI SOLUTION New User Registration";
               $email=  mail($to,$subject,$message,"FROM:mlatreille@itroisolutions.com");
                if($email>0)
                {
                $output="<h1 style='color:green'>Thanks You!<h1><p style='color:green'>Thanks For Registration<p>";
                }
                
            }
            }
            else
             {
                      $output = "<h1 style='color:red'>Sorry!<h1><p style='color:red'>Error: User Name Or Email ID Already Registered</p>";
             }
            }
         
                else 
                    {
                        $output="<h1 style='color:red'>Sorry!<h1><p style='color:red'>Error: Invalide Email</p>";
                    }
        }

         else 
             {
             $output="<h1 style='color:red'>Sorry!<h1><p style='color:red'>Error: Password Missmatch</p>";
             }

            }
    
 else 
     {
        $output="<h1 style='color:red'>Sorry!<h1><p style='color:red'>Error: Please Fill Require Fields</p>";
     }
    
    }
?>
  <div class="content" >
    <div class="panel-display panel-2col clearfix" style="padding: 0px 0px 16px 0px;">
  <div class="post">
    
         


			<?php /* The loop */ 
                        echo $_id=$_GET['author'];
                        ?>
			<?php while ( have_posts() ) : the_post(); ?>
                                    <div class="views-row views-row-1">

                                                                       

                                                                                        <div class="field-item even" property="schema:name" style="padding: 50px;">
                                                 
                                                                                            <div class="field-item even" property="schema:articleBody content:encoded">      
                                                                                                         <?php echo $output; ?>
                                                                                                 </div>
                                                                         
                                                                                    </div>
                                                   
                                                                 <?php endwhile; ?>
                                                                
                                                            </div>
                                                </div>
                                      
  

                      
        </div>
    </section>
</div>
<?php get_footer(); ?>