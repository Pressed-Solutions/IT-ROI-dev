<?php
/**
 * The template for displaying all pages.
 * template name:save_Schedule_Demo
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */


     
$refer=$_SERVER['HTTP_REFERER'];
$refer=str_replace('http://','',$refer);
$refer=str_replace('https://','',$refer);
$refer=explode('/',$refer);


if($refer[0]!=$_SERVER['HTTP_HOST'])
{
	
	die();
}


if($_POST['_wpnonce']=="")
{
$firstname=($_POST['first-name']);
$lastname=($_POST['last-name']);
$phone=($_POST['phone']);
$company=($_POST['company']);
$email=($_POST['your-email']);
$country_list=($_POST['country_list']);
$Product_list=($_POST['Product_list']);
$country=$country_list[0];
$Product=implode(',',$Product_list);
$country=($country);
$Product=($Product);
$message=($_POST['message']);


if($firstname!="" && $phone!="" && $email!="" && $country_list!="" && $Product_list!="" && $message!="")
{

 $query_nation="SELECT `country_name` FROM `wp_nation` WHERE `country_id` in (".$country.")";
$w2_nation= mysql_fetch_array(mysql_query($query_nation));
 $country_n=$w2_nation['country_name'];

$query_productlist="select group_concat(`product`) as product from wp_productlist where id in(".$Product.")";
$w2_productlist= mysql_fetch_array(mysql_query($query_productlist));

 $Product_n=$w2_productlist['product'];


$insert="insert into  `wp_sehcduledemo` (firstname,lastname,phone,company,email,country,product,note)values
('".$firstname."','".$lastname."','".$phone."','".$company."','".$email."','".$country."','".$Product."','".$message."')";
$w =  mysql_query($insert);
 if (mysql_errno()) {
   $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$insert<br>";
 
 }

$timedata = function_exists('microtime') ? microtime(true) : time();
$parametrizedQuery1 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Firstname', '".$firstname."','0')";
mysql_query($parametrizedQuery1);

$parametrizedQuery2 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Lastname', '".$lastname."','0')";
mysql_query($parametrizedQuery2);

$parametrizedQuery3 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Phone', '".$phone."','0')";
mysql_query($parametrizedQuery3);

$parametrizedQuery4 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Company', '".$company."','0')";
mysql_query($parametrizedQuery4);

$parametrizedQuery5 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Email', '".$email."','0')";
mysql_query($parametrizedQuery5);

$parametrizedQuery6 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Country', '".$country_n."','0')";
mysql_query($parametrizedQuery6);

$parametrizedQuery7 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Product', '".$Product_n."','0')";
mysql_query($parametrizedQuery7);            

$parametrizedQuery7 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Submitted Login', '','0')";
mysql_query($parametrizedQuery7);            

$parametrizedQuery7 = "INSERT INTO `wp_cf7dbplugin_submits` (`submit_time`, `form_name`, `field_name`, `field_value`, `field_order`) VALUES ('$timedata','Schedule a Demo', 'Submitted From', '".$_SERVER['REMOTE_ADDR']."','0')";
mysql_query($parametrizedQuery7);            

$mail_subject="Schedule a demo";
 $mail_message="
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
mail( "webmaster@itroisolutions.com",$mail_subject,$mail_message ); 
       
    
echo 0;
    
}else{
    echo 1;
}

}else{
    echo 2;
}
?>