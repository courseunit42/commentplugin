<?php
require_once '../handler.php';
$handler=new handler();

session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
}

?>

<!DOCTYPE html>
<!Administrators home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>iCloud Blogspot | View Post</title>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" charset="utf-8" />
		<link rel="stylesheet" href="../css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if lt IE 7]>
			<link rel="stylesheet" href="../css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->


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
	color:#09c;
}
-->
</style>

<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>
</head>

<body>

<!--the overall container for all the div tags-->
<div id="contain">

<div id="clear"></div>

<?php
include 'header.php';
?>

<div id="clear"></div>

<div id="main-container2">
<div id="inner-window2">


<div id="viewport">

<?php
if(isset($_GET['postid'])){
$postid=addslashes($_GET['postid']);

$handler->getPost($postid);
}

?>

</div>


</div>
</div>

<div id="clear"></div>

<?php

include 'copyright.php';
?>

</div>

</body>
</html>