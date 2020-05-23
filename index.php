<?php
//commentplug

require_once 'handler.php';
@session_start();
$handler=new handler();
?>

<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="keywords" content="Powering your comments | The best commenting system API you can get around is comPlug API" />

<meta name="description" content="CommentPlug is a commenting powering API/plugging  that you can use to power your commenting system without any fear of loss of data should in 
case you decide to ball out, you can export all your comments in a seamless way such that you can reintegrate it back into your existing system | CommPlug" />

<title> CommPlug | Powering Your Comments</title>

<link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
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
<link rel="stylesheet" href="css/social-buttons.css">


<script type="text/javascript" href="bootstrapCss/jquery.js"></script>

<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="social-buttons.js"></script>


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

<div class="row-fluid" style="margin-left:0;margin-right:0;text-align:center">
<div class="social-sharing">
<a href="http://plus.google.com/app/basic/116742251389391729647" style="color:#fff;font-family:Corbel;font-size:85%;width:70px" class="share-google"><i class="fa fa-google-plus fa-2x google"></i>Google+</a>
<a href="http://twitter.com/commplug" style="color:#fff; font-family:Corbel;font-size:85%;width:70px" class="share-twitter" ><i class='fa fa-twitter fa-lg tw'></i>Twitter</a>
<a href="http://facebook.com/commplug" style="color:#fff;font-family:Corbel;font-size:85%;width:70px" class="share-facebook"><i class="fa fa-facebook fa-lg fb"></i>Facebook</a>
<a href="http://www.youtube.com/channel/UCrWAlHrfU6dg39bsW6ix3Ow" style="color:#fff;font-family:Corbel;font-size:85%;width:70px" class="share-google" ><i class="fa fa-google-plus fa-2x google"></i>Youtube</a>
</div>
</div>

</div>

<?php
include 'footer.php';
?>

</div>


</div>
</body>
</html>