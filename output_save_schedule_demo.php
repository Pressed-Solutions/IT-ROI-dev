<?php
/**
 * The template for displaying all pages.
 * template name:Save Schedule demo
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
      
    $firstname= strip_tags(trim($_POST['first-name']));
    $lastname=strip_tags(trim($_POST['last-name']));
   $phone=strip_tags(trim($_POST['phone']));
    $email=strip_tags(trim($_POST['your-email']));
   $company=strip_tags(trim($_POST['company']));
   $country_list=$_POST['country_list'];
    $Product_list=$_POST['Product_list'];
    $message=strip_tags(trim($_POST['message']));

   $country=$country_list[0];
  $Product=implode(',',$Product_list);


    if($firstname != "" && $lastname !="" &&  $phone !="" && $email!="" && $company !="" && $country!="" && $Product !="" && $message!="" )
    {  
            if(preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/',$email))
            {
                $query_nation="SELECT `country_name` FROM `wp_nation` WHERE `country_id` in (".$country.")";
$w2_nation= mysql_fetch_array(mysql_query($query_nation));
 $country_n=$w2_nation['country_name'];

 $query_productlist="select group_concat(`product`) as product from wp_productlist where id in(".$Product.")";
$w2_productlist= mysql_fetch_array(mysql_query($query_productlist));

$Product_n=$w2_productlist['product'];
 
              $insert="insert into  `wp_sehcduledemo` (firstname,lastname,phone,company,email,country,product,note)values
('".$firstname."','".$lastname."','".$phone."','".$company."','".$email."','".$country_n."','".$Product_n."','".$message."')";
$w =  mysql_query($insert);
 if (mysql_errno()) {
   $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$insert<br>";
 
 }
 

$to_admin="webmaster@itroisolutions.com";
$from_admin  = "do-not-reply@itroisolutions.com";
$site_url=get_site_url();

$message_admin="
Hello Admin,

The person $firstname $lastname have interated in following product: $Product_n and he sent a request to schedule a demo.

Here is the other details:

Firstname: $firstname
Lastname: $lastname
Phone: $phone
Company: $company
Email: $email
Country: $country_n
Product: $Product_n
    
Thank you,
IT-ROI SOLUTIONS";


$headers_admin = "From:" . $from_admin;
$subject_admin="Schedule a demo Request";
$email1= mail($to_admin,$subject_admin,$message_admin,$headers_admin);

 echo $output="1";

        
                
            }
                else 
                    {
                        echo $output="Invalide Email";
                    }
        
    }
else 
{
    echo $output="Please Fill Require Fields";
}
   
?>