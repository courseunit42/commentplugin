<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title></title>

<link rel="icon" type="image/png" href="images/favicon.png"/>
<link rel="author" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=author" />
<link rel="publisher" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=publisher" />

<link rel="stylesheet" type="text/css" href="http://ibloggos.com/css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="http://ibloggos.com/css/social.css"/>


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
.btn{
border-radius:0;
}

#comm{
width:80%;
display:none;
}


#comm2{
width:80%;
display:none;
}

-->
</style>

<script type="text/javascript">


</script>

</head>
<body>

<?php
require_once 'commHandle.php';
$comm=new commHandle();
session_start();
$comments='';
$new_comment='';

if(!isset($_GET['usx']) || !isset($_GET['hash'])){
exit;
}else{
$comm->connect();
$usx_comm=htmlspecialchars($_GET['usx']);
$hash=htmlspecialchars($_GET['hash']);

$sql=mysql_query("SELECT *from comments WHERE hash='".$hash."' AND commenter='".$usx_comm."'");
if($sql){
$m=mysql_fetch_array($sql);

$comments=$m["comments"];
$_SESSION['old_comment']=$comments;

$formHandler=htmlspecialchars($_SERVER['PHP_SELF']);
echo '<form action="'.$formHandler.'" method="POST" role="form">';
echo '<input type="text" name="commenter_name" value="'.$_GET['usx'].'" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" />';
echo '<textarea type="text" name="comments" style="width:70%;margin-top:10px;color:#333;margin-bottom:20px;height:120px" placeholder="comments here">'.$comments.'</textarea>';
echo '<input type="hidden" name="page_level_url" value="'.@$_SERVER['HTTP_REFERRER'].'"/>';
//echo '<input type="hidden" name="account_identifier" value="'.@$_SESSION['acct_identifier'].'" />';
echo '<button type="submit" class="btn btn-twitter" style="background-color:#09c;color:#fff;font-size:11px;font-family:Corbel;width:100px;height:30px" name="submit">Modify</button>'; 
echo '</form>';
}
} 



if(isset($_POST['submit'])){
$new_comment=addslashes($_POST['comments']);

if($new_comment!=$comments){
$s=mysql_query("UPDATE comments SET comments='".$new_comment."' WHERE hash='".$_GET['hash']."' AND commenter='".$_GET['hash']."' ");
if($s){
echo 'done';
//header("Location:".@$_SERVER['HTTP_REFERRER']);
}else{
echo 'nothing happens';
}
}else{
echo 'You have not modified your comment(s)';
header("Location:".@$_SERVER['HTTP_REFERRER']);
}
}



?>



</body>
</html>