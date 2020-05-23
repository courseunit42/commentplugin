<?php
session_start();
ob_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/favicon.png"/>
<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>Notification</title>

<link rel="stylesheet" type="text/css" href="css/blogoscss.css"/>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script type="text/javascript" href="bootstrapCss/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap-min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap-theme-min.css"/>

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
h1{
font-family:Corbel;
font-size:20px;
color:#333;
}
-->
</style></head>
<body>
<div class="container-fluid">

<?php
include 'header.php';

?>


<div class="row-fluid" style="margin-bottom: 60px; margin-top:80px">

<?php
if(isset($_SESSION['notification'])){
echo '<span style="color:#333">'.$_SESSION['notification'].'</span>';
}
else{
?>
<h1>Success!</h1>
<span class="help-block" style="color:#ccc;font-size:14px">Success! You have successfully signup, please check your email for a verification link in order 
to verify your email address.<br/>Thank You</span>

<?php
}
?>

</div>


<?php

include 'footer.php';
?>
</div>

</div>

</body>
</html>