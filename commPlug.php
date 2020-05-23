<?php
//iCloud Bloggos website index page

require_once 'handler.php';
session_start();
$handler=new handler();
?>

<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="keywords" content="" />

<meta name="description" content="" />

<title> CommentsPlug.com | Powering Your Comments</title>

<link rel="icon" type="image/png" href="images/favicon.png"/>
<link rel="author" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=author" />

<link rel="publisher" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=publisher" />

<link rel="stylesheet" type="text/css" href="css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="css/social.css"/>

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/fonts/fontawesome-webfont.ttf" />


<script type="text/javascript" href="bootstrapCss/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap.css"/>



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
include 'header.php';
?>

<div class="row-fluid" style="background-color:#fff; color:#000">
<div class="row-fluid" style="margin-left:40%;margin-right:40%;"><img src="images/man.jpg" class="img-circle" width="auto" height="auto" alt="commentplug.com imageS" />
</div>

<h1>
<span class="help-block" style="color:#f30;font-family:corbel;margin-left:15%;margin-right:15%;text-align:center;font-size:20px">
We Power Your Commenting System, Archive Your Comments and Manage Your Spams
</span>
</h1>
</div>

<div class="row-fluid" style="background-color:#ff3300;padding:10px; color:#ffffff;-moz-border-radius:7px;-webkit-border-radius:7px;border:1px solid #fff">
<h2>
<span class="help-block" style="color:#ffffff;height:auto; font-family:corbel;margin-left:15%;margin-right:15%;text-align:center;font-size:20px">
Fast Archiving & Indexing, Mobile Device Support & Desktop Friendly
</span>
</h2>
</div>


<div class="row-fluid" style="background-color:#fff; color:#333">
<h1>
<span class="help-block" style="color:#333;font-family:corbel;margin-left:15%;margin-right:15%;text-align:center;font-size:20px">

<div class="row-fluid" style="margin-left:40%;margin-right:40%;"><img src="images/dbs_mysql.png" class="img-responsive" width="auto" height="auto" alt="commentplug.com imageS"/>
</div>
<span class="help-block" style="color:#ff3300; font-family:corbel;margin-left:15%;margin-right:15%;text-align:center;font-size:20px">
Powered by MySQL
</span>
</h2>

</div>


<div class="row-fluid" style="background-color:#fff;margin-top:40px; margin-bottom:40px">
<!--<a href="http://youtube.com/"><img src="images/newyoutube2.png" width="70px" height="60px" alt="youtube follow"/></a>
<a href="http://twitter.com/danyl007O"><img src="images/newtwit2.png"  width="70px" height="60px" alt="follow on twitter"/></a>
<a href="http://facebook.com/ibloggos"><img src="images/newfb.png"  width="70px" height="60px" alt="follow on twitter"/></a>
-->
<div class="row-fluid" style="margin-left:15%;margin-right:10%;padding:2%">
<a href="http://plus.google.com/app/basic/116742251389391729647" style="color:#fff;width:auto;font-family:Corbel;font-size:90%" class="btn btn-google-plus">Follow us on Google+</a>
<a href="http://twitter.com/danyl007O" style="color:#fff; width:auto; font-family:Corbel;font-size:90%" class="btn btn-twitter">Follow us on Twitter</a>
<a href="http://facebook.com/ibloggos" style="color:#fff; width:auto;font-family:Corbel;font-size:90%" class="btn btn-facebook">Follow us on facebook</a>
<a href="http://www.youtube.com/channel/UCrWAlHrfU6dg39bsW6ix3Ow" style="color:#fff;width:auto;font-family:Corbel;font-size:90%" class="btn btn-youtube">Follow us on Youtube</a>

</div>

</div>


<?php
include 'footer.php';
?>

</div>


</div>
</body>
</html>