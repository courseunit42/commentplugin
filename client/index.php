
<?php
session_start();
require_once '../handler.php';
$handler=new handler();


ob_start();

if(isset($_SESSION['user_client']) && isset($_GET['action']) && $_GET['action']=='home'){
header("Location: login/");
}

$erroraccount='';
$errorPass='';
$erroremail='';
$errorpassword='';
$error_conf='';
$errorpaginate='';
$errorurl='';
$errorclosing='';
$errorspam='';
$errornotification='';
$errormoderate='';


?>

<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>Users Dashboard | CommentsPlug.com </title>

<link rel="icon" type="image/png" href="../images/favicon.png"/>

<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="../css/social.css"/>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 


<script type="text/javascript" href="../bootstrapCss/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="../bootstrapCss/css/bootstrap.css"/>



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
	color:#09c;
	
}
body,td,th {
	font-family: Corbel, Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #ccc;
}
.btn{ border-radius:0;}	a:link {
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
	color:#09c;
}
-->
</style>

</head>

<body>

<!--the overall container for all the div tags-->
<div class="container-fluid">

<div class="row-fluid" style="width:100%;padding:5px; -moz-border-radius:10px; -webkit-border-radius: 10px;
border-radius: 10px; border: 1px solid # ccc">

<?php
include '../header.php';
?>

<div class="row-fluid">

<div class="row-fluid" style="-moz-border-radius:10px;height:100px;margin-bottom:40px;-webkit-border-radius:10px;border-radius: 10px; border: 1px solid #ccc">

<div class="col-md-10" style="margin-top:6px">

<?php	
$file='vector.jpg';
echo ($handler->showImage($file));
//echo 'company:'.$_SESSION['company_name'].' l';
?>

<?php 
//displaying welcome message
if(!isset($_SESSION['account_name'])){

echo 'Welcome Dear Client'." . ".'<a href="auth/logout.php" class="" style="color:#f30;width:100px; height:35px;font-size:100%;font-family:Corbel"> Logout </a>';

}else{

echo '<span style="color:#333;margin-left:10px;font-size:11px">Welcome '.$_SESSION['account_name']." . ".'<a href="auth/logout.php" style="color:#f30;font-size:15px;font-family:Corbel">Logout</a>';

if(isset($_SESSION['notification'])){
echo $_SESSION['notification'];
unset($_SESSION['notification']);
}
}
?>
</div>





</div>
</div>

<div id="clear">
</div>

<div class="row-fluid">
<!--this window is for displaying all the variables for the different parameterized urls-->
<?php
if(isset($_GET['action'])){

$action=htmlspecialchars($_GET['action']);
if($action=='paymentSettings'){

	echo '<span class="help-block">Your Trial Phase Has Expired, kindly Activate your payment clicking 
	<a href="http://voguepay.com/pay" style="color:#fff;width:100px;height:35px" class="btn btn-linkedin"> Here</a></span>';


		if(isset($_SESSION['payment_status'])){
	if($_SESSION['payment_status']==0 && $_SESSION['activation']==2){
	
	echo '<span class="help-block">Your Trial Phase Has Expired, kindly Activate your payment clicking 
	<a href="http://voguepay.com/pay" style="color:#fff;width:100px;height:35px" class="btn btn-linkedin"> Here</a></span>';

	
	}else if($_SESSION['payment_status']=='1' && $_SESSION['activation']=='1'){
	
echo 'Status: Active';	
			}
			}

}else if($action=='profile'){
$form_url='editprofile.php';

echo '<form action="'.$form_url.'" method="POST" role="form">';
include 'form_plug.php';
echo '</form>';


}else if($action=='commSettings'){

$form_url='commentSettings.php';
echo '<form action="'.$form_url.'" method="POST" role="form">';
include 'comments.php';
echo '</form>';

}
}
?>

</div>

<div id="clear"></div>

<?php
include '../footer.php';
?>

</div>


</div>

</body>
</html>