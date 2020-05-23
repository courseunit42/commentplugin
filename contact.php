<?php

session_start();
if(!isset($_SESSION['user_client'])){
header("Location: client/login/");

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/favicon.png"/>
<link rel="alternate" type="application/rss+xml" title="iBloggos RSS Feeds" href="http://ibloggos.com/testfds.php"/>

<title>Resolution Center | commentPlug.com</title>

<link rel="stylesheet" type="text/css" href="css/blogoscss.css"/>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

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

h1{
font-family:Corbel;
font-size:25px; 
//font-style:italic;
color:#333;
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

<!--parent div container for different sections-->
<div class="row-fluid">

<h1>Oops! You Have Issues?</h1>

<div class="row-fluid" style="text-align:justify;color:#666"> 
Kindly fill the form below to send your enquiries, complaints/suggestions.<br/> Thank you.
<p/>
<p/>
<p/>
<div class="row-fluid" style="text-align:justify;color:#666;max-width:88%"> 
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" role="form">
<input type="text" name="name" class="form-control" placeholder="Name" style="font-size:11px;width:88%;margin-bottom:5px" />
<input type="text" name="email" placeholder="Email address" class="form-control" style="font-family:Corbel;font-size:11px;width:88%;margin-bottom:5px" />
<textarea type="text" name="enquire" class="form-control" placeholder="Enquiries & complaints here" style="width:88%;font-family:Corbel;font-size:11px;margin-bottom:5px"></textarea>
<button type="submit" name="submit" class="btn btn-twitter" style="color:#fff;width:140px;height:38px">Submit</button>

</form>
</div>

<?php
require_once 'handler.php';
$handler=new handler();
$email='';

if(isset($_POST['submit'])){
$name=addslashes($_POST['name']);
$email=addslashes($_POST['email']);
$enq=addslashes($_POST['enquire']);

$handler->connect();

$sql=mysql_query("INSERT into contacts VALUES (NULL,'".$name."','".$email."','".$enq."')");
echo mysql_error();

if($sql){

			//$header=include('header2.php');			
			$header= "From: Comment Plug"."<admin@commentplug.com>\r\n";
			$header.= "X-Sender: <Comment Plug Inc.>\r\n";
			$header.= "X-Priority: 1\r\n";
			$header.= "Return-Path: " ."<admin@commentplug.com>\r\n";

			$subj='Email in Processing....';
			
	$body="\r\n Thank you for your enquiries/complaints, We shall respond to them within the next 24 hours, do stay tuned \r\n";
	$body.='Thank You.';	

	$sendmail=@mail($email,$subj,$body,$header);

echo '<span class="help-block">Thank you, your enquiries is in processing!</span>';
}
mysql_close();
}
?>
</div>
<div id="clear"></div>

</div>
<?php
include 'footer.php';
?>

</div>

</body>
</html>