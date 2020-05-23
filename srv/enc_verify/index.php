<?php
ob_start();
$body='';

if(!isset($_GET['encrypt'])){
header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../../images/favicon.png"/>
<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


<title>Verification Notification</title>


<link rel="stylesheet" type="text/css" href="../../css/blogoscss.css"/>

<link rel="stylesheet" type="text/css" href="../../css/blogoscss.css"/>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script type="text/javascript" href="../../bootstrapCss/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="../../bootstrapCss/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../bootstrapCss/css/bootstrap-min.css"/>
<link rel="stylesheet" type="text/css" href="../../bootstrapCss/css/bootstrap-theme.css"/>

<style type="text/css">
<!--
.links {
	font-family: "Corbel", Arial, Helvetica, sans-serif;
	font-size: 13px;
	letter-spacing: normal;
	text-align: center;
	vertical-align: middle;
	word-spacing: normal;
	white-space: normal;
	
}
body,td,th {
	font-family: Corbel, Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #09c;
}
a:link {
	color: #666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666;
}
a:hover {
	text-decoration: underline;
	color: #CCC;
}
a:active {
	text-decoration: none;
	color: #666;
}
body {
	margin-left: 20px;
	margin-top: 15px;
	margin-right: 20px;
	margin-bottom: 15px;
}
-->
</style></head>

<body>
<div class="container-fluid">

<?php

include '../../header.php';
?>


<div class="row-fluid" style="margin: 30px; padding:10px">


<?php
require_once '../../handler.php';

ob_start();

$handler=new handler();

$handler->connect();
$msg='';

// Select registration database.

if (isset($_GET ['encrypt' ]) && !empty( $_GET ['encrypt' ])){
// Verify data
$hash = addslashes( $_GET ['encrypt' ]);
 // Set hash variable
$search = @mysql_query( "SELECT *FROM profile WHERE encryption_key='".$hash."' " );
$match = @mysql_num_rows( $search );


if($res=@mysql_fetch_array($search))
$email=$res['email_addr'];

if (($match > 0) && ($res["active"]==0)){

// We have a match, activate the account
mysql_query( "UPDATE profile SET active='1' WHERE  encryption_key='".$hash."' AND active='0' " );

//navigate to the successful validation


$link="http://commentplug.com/admin/login.php";

$msg="Your account has been successfully activated\r\n";
$msg.="In order to login please go here:  ".'<a href="http://commentplug.com/controller.php?action=admin" id="linka">to Login</a>';
$msg.="\r\nThank You".'.';
	
	
	
$header= "From: Comment Plug"."<noreply@commentplug.com>\r\n";
			$header.= "X-Sender: <Comment Plug>\r\n";
			$header.= "X-Priority: 1\r\n";
			$header.= "Return-Path: " ."<admin@commentplug.com>\r\n";
			$subj='Successful Account Activation ';

			//sending message to the new user
			$sendmail=@mail($email,$subj,$msg,$header);

				
			echo '<div class="row-fluid" style="color:#333">';
			echo '<h1 class="linka">Hey!'.'</h1>';
			echo $msg;
			echo '</div>';

			$header= "From: Comment Plug"."<noreply@commentplug.com>\r\n";
			$header.= "X-Sender: <iCloud Bloggos>\r\n";
			$header.= "X-Priority: 1\r\n";
			
			$subj='New User Signup';
			
			$body .="Another user registration for you to moderate";
			$body .="user email:".$email."\r\n"; 
			$body .="Regards";	

			$row=@mysql_num_rows($sql);

			$email='admin@commentplug.com';
			//sending message to the admin of this site
			$sendemail=@mail($email,$subj,$body,$header);

}else if(($match>0) && ($res["active"]==1)){

$msg='Your email address has been previously activated'.' ';
$msg.='Please go to this link to <a href="http://commentplug.com/controller.php?action=admin" id="linka"> Login </a> ';
$msg.='Thank You'.'<br/>';

echo '<div class="row-fluid" style="color:#333">';
echo '<h1 class="linka">Hey!'.'</h1>';
echo $msg;
echo '</div>';

}else if($match==0){

$msg='Your email address has not been registered in our database ';
$msg .='Please follow this link to <a href="http://commentplug.com/controller.php?action=signup" id="linka">Sign Up</a><br/>Thank You';

echo '<div class="row-fluid" style="color:#333">';
echo '<h1 class="linka">Hey!'.'</h1>';
echo $msg;
echo '</div>';
}
}
echo '</div>';

?>

</div>


<?php

include '../../footer.php';

?>
</div>

</body>
</html>
