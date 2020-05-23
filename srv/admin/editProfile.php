<?php
session_start();
require_once '../handler.php';
$handler=new handler();

if(!isset($_SESSION['admin'])){
header("Location : login.php");
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>ibloggos.com | Admin profile update</title>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" charset="utf-8" />
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
	color: #333;
}
a:hover {
	text-decoration: underline;
	color: #CCC;
}
a:active {
	text-decoration: none;
	color: #ccc;
}
body {
	margin-left: 20px;
	margin-top: 15px;
	margin-right: 20px;
	margin-bottom: 15px;
	color:#09c;
}
-->
</style></head>
<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>

<body>

<!--the overall container for all the div tags-->
<div id="contain">


<div id="clear"></div>

<?php
include 'header.php';

?>

<div id="clear"></div>

<div id="accountPanel-admin4">
<form method="POST" action="../upload_rename_ac.php"  enctype="multipart/form-data"/>
Name: <input type="text" id="textfield2" name="fullname" value="<?php echo @$_SESSION['name'];?>" />
Username: <input type="text" id="textfield2" disabled="disable" name="username" value="<?php echo @$_SESSION['admin']; ?>" />
Email: <input type="text" id="textfield2" name="email" disabled="disable" value="<?php echo @$_SESSION['email']; ?>" />
Current Password: <input type="password" id="textfield2" name="oldpassword" value="" />
New Password: <input type="password" id="textfield2" name="password" value="" />
Confirm Password: <input id="textfield2" type="password" name="conf_password" value="" />
If you are changing your password, clear the passwords and enter another one
Biography:<textarea type="text" name="bio" id="textarea"><?php echo @$_SESSION['bio']; ?></textarea>
Please enter your comprehensive biography here!

Upload Image Thumbnail:
<input type="file" name="ufile" id="textfield2" font-family="Corbel"/><br/>
Web Link: <input type="text" id="textfield2" name="weblink" value="<?php echo @$_SESSION['weblink']; ?>" />

<input type="submit" class="button" name="Edit" value="Edit"/>
<br/>
<a href='javascript: hideAccounts();'>Hide Window</a>
</div>

<div id="clear"></div>

<div id="ads">


</div>

<div id="clear"></div>


<?php
include 'copyright.php';

?>

</div>

</div>

</body>
</html>