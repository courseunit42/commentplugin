<?php
require_once '../handler.php';
@session_start();
$handler=new handler();

ob_start();

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

if(!isset($_SESSION['admin_client']) || $_SESSION['admin_client']=='' || $_SESSION['admin_client']==' '){
header("Location: login.php");
}
?>

<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>Clients Dashboard | CommentsPlug </title>

<link rel="icon" type="image/x-icon" href="../images/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="../css/comm.css"/>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<link rel="stylesheet" href="../comm_css/css/bootstrap.css">
<link rel="stylesheet" href="../comm_css/css/bootstrap.min.css">
<link rel="stylesheet" href="../comm_css/js/bootstrap.min.js">
<link rel="stylesheet" href="../comm_css/font/glyphicons-halflings-regular.eot" />
<link rel="stylesheet" href="../comm_css/font/glyphicons-halflings-regular.woff" />
<link rel="stylesheet" href="../comm_css/font/glyphicons-halflings-regular.ttf" />


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
	color:#f30;
}
-->
</style>

</head>

<body>
<!--the overall container for all the div tags-->
<div class="container-fluid">

<?php
include 'header.php';
?>

<div class="row-fluid" style="margin-bottom:40px;">

<?php	
if(isset($_SESSION['image_file'])){
$file=$_SESSION['image_file'];
echo ($handler->showImage($file));	}	?>

<?php 
//displaying welcome message
if(isset($_SESSION['account_name'])){
echo 'Welcome <span style="color:#ccc;font-size:12px"> '.$_SESSION['account_name'].'</span>';
}else{
echo 'Welcome <span style="color:#ccc;font-size:12px"> to your Admin Dashboard</span>';
}
?>

<br/>
<hr/>
<a href= "?action=profile" style="color:#666;font-size:12px;font-family:Corbel">Client Profile</a>   .   <a style="color:#666;font-size:12px;font-family:Corbel" href= "?action=commSettings">Comment Settings</a>       

<?php if(isset($_SESSION['account_name'])){?>
.	<a href= "?action=mod_comments">Comments (<?php echo '<span style="font-size:11px">'.($num=$handler->getUnmoderatedComments($_SESSION['account_name'])).'</span>';?>)</a>
<?php	}		?>

   .   <a href="logout.php" style="color:#666;font-size:12px;font-family:Corbel">Logout</a>
<br/>
<?php if(isset($_SESSION['notifications'])){
echo $_SESSION['notifications'];
unset($_SESSION['notifications']);
}

?>
</div>

<div class="row-fluid">
<!--this window is for displaying all the variables for the different parameterized urls-->
<?php
if(isset($_GET['action'])){

$action=htmlspecialchars($_GET['action']);
if($action=='home'	&& isset($_SESSION['account_name'])){

$handler->getLinkProfile($_SESSION['account_name']);

}else if($action=='mod_comments'){

$handler->getUnmoderatedComment(@$_SESSION['account_name']);

}else if($action=='profile'){
$form_url='cpconfig/editprofile.php';
echo '<form action="'.$form_url.'" enctype="multipart/form-data" method="POST" role="form">';
include 'cpconfig/form_plug.php';
echo '</form>';


}else if($action=='commSettings'){
include 'cpconfig/comments.php';
}
}
?>
</div>

<?php
//including the footer script
include 'footer.php';
?>

</div>
</div>
</body>
</html>