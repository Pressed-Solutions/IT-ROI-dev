<?php
/**
 * The template for displaying all pages.
 * template name:Process
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */


    $Search_site=trim($_POST['register']);
    if($_SESSION['register']!='')
    {?>
    <script>
    window.location='index.php'
    </script>
    <?php  die();
     }
     
    $user_name= strip_tags(trim($_POST['user_name']));
    $password=strip_tags(trim($_POST['password']));
    $cpassword=strip_tags(trim($_POST['cpassword']));
    $display_name=strip_tags(trim($_POST['display_name']));
    $email=strip_tags(trim($_POST['email']));

    if($user_name != "" && $password !="" &&  $cpassword !="" && $display_name!="" && $email !="")
    {
        
        
        if($password == $cpassword)
        {   
            if(preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/',$email))
            {
                $query1="select * from wp_users where user_login='".$user_name."'";
                $w3= mysql_query($query1);
                $query3=mysql_num_rows($w3);
                $query2="select * from wp_users where user_email='".$email."'";
                $w2= mysql_query($query2);
                 $query4=mysql_num_rows($w2);

                 
        
                if($query3 =='0' && $query4=='0')
                {
                  
                    $pass=md5($password);
                     $insert1="INSERT INTO `itroidev`.`wp_users` (`user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`, `boi`, `Position`, `knr_author_order`) VALUES ( '".$user_name."', '".$pass."', '".$display_name."', '".$email."', '', '0000-00-00 00:00:00', '', '0', '', '', '', '0');";
                     $w11 =  mysql_query($insert1);
                     $lastid=mysql_insert_id();
          
                    if($lastid>0)
                    {
$to_admin="webmaster@itroisolutions.com";
$from_admin  = "do-not-reply@itroisolutions.com";

$to=$email;
$site_url=get_site_url();

$message="
Dear ".$display_name.",
    
Thank you for registering at IT-ROI SOLUTIONS. Please read the following informaion carefully and be sure to save this message in a safe location for future reference.

Website Address: ".$site_url."
Username: ".$user_name."

Your account detail will be reviewed by the website Administartor and you will receive a notification upon account activation.
Thank you,we appreciate your support...

IT-ROI SOLUTIONS";


$headers = "From:" . $from_admin;
$subject="IT-ROI SOLUTIONS New User Registration";
$emailcheck= mail($email,$subject,$message,$headers);


$site_url=get_site_url();

$message_admin="
Dear Admin,
    
You have received new account registration request by the new user.

Here is the other details:

Username: ".$user_name."
Display Name: ".$display_name."
Email: ".$email."

Currently the user is inactive. Check the details and set users role. It will automatically active.

IT-ROI SOLUTIONS";


$headers_admin = "From:" . $from_admin;
$subject_admin="IT-ROI SOLUTIONS New User Registration";
$email1= mail($to_admin,$subject_admin,$message_admin,$headers_admin);

echo $output="<p style='color:green;text-align:center;margin-top: 20px;'>You Are Successfully Registered<p>";

                        
                    }
                }
                else if($query4!='0' && $query3 =='0')
                {
                      echo $output = "<p style='color:red;text-align:center;margin-top: 20px;'>Email Address Already Registered<p>";
                }
                else if($query3 !='0' && $query4 =='0')
                {
                      echo $output = "<p style='color:red;text-align:center;margin-top: 20px;'>User Name Already Registered<p>";
                }
                else
                {
                 echo $output = "<p style='color:red;text-align:center;margin-top: 20px;'>Email Address And User Name Already Registered<p>";
             }
            }
                else 
                    {
                        echo $output="<p style='color:red;text-align:center;margin-top: 20px;'>Invalide Email</p>";
                    }
        }
        else 
        {
                echo $output="<p style='color:red;text-align:center;margin-top: 20px;'>Password Missmatch</p>";
        }
    }
else 
{
    echo $output="<p style='color:red;text-align:center;margin-top: 20px;'>Please Fill Require Fields</p>";
}
   
?>