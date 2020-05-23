<?php @session_start(); 
require_once 'bbcode.php';
?>
<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="stylesheet" type="text/css" href="css/comm.css"/>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/fonts/fontawesome-webfont.ttf" />

<link rel="stylesheet" href="comm_css/css/bootstrap.css">
<link rel="stylesheet" href="comm_css/css/bootstrap.min.css">
<link rel="stylesheet" href="comm_css/js/bootstrap.min.js">
<link rel="stylesheet" href="comm_css/font/glyphicons-halflings-regular.eot" />
<link rel="stylesheet" href="comm_css/font/glyphicons-halflings-regular.woff" />
<link rel="stylesheet" href="comm_css/font/glyphicons-halflings-regular.ttf" />



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
border-radius:2;
}
.share_buttons{ float:right; margin-top:-0.9em;margin-right:3.3em;
-->
</style>
</head>
<body>

<?php
require_once 'commHandle.php';

ob_start();
$handler=new commHandle();
//please explicitly set your account_identifier token
//fetching the site protocol

$protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')===FALSE ? 'http': 'https';
$host=$_SERVER['HTTP_HOST'];	$script=$_SERVER['SCRIPT_NAME'];	$params=$_SERVER['QUERY_STRING'];	
//setting the base url for the blog
$base_url=$protocol.'://'.$_SERVER['SERVER_NAME']. dirname($_SERVER['REQUEST_URI']);

$site_identifier='';

if($params!=''){
$params= '?'.$params;
}

$page_level_url=$protocol.'://'.$host.$script.$params;
$page_level_redirect=$protocol.'://'.$host.$script;

//this methods retrieves the account identifier for the specific account on whose base url we are  working 
$account_identifier=$handler->getIdentifier($base_url);

//setting the account identifier in a session variable
$_SESSION['account_identifier']=$account_identifier;

//this loads the settings based on the specification of the app user
$commArray=$handler->initialComments($account_identifier);


//setting the page_level_url session variable
$_SESSION['page_level_url']=$page_level_url;
//printing the previous messages for this thread

//setting the page level domain in a session variable
$_SESSION['page_level_redirect']=$page_level_redirect;

//inserting this page into the comment_approve first before anything
$handler->setPage($page_level_redirect,$account_identifier);


$status=$handler->showPreviousComments($page_level_url,$account_identifier);
if(isset($status)){			echo $status;		}

$_SESSION['acct_identifier']=$account_identifier;		$_SESSION['page_level_url']=$page_level_redirect;

if(isset($_SESSION['user_notification'])){
echo $_SESSION['user_notification'];
unset($_SESSION['user_notification']);
}

$formHandler=htmlspecialchars($_SERVER['PHP_SELF']);

//flushing the output buffer

$delimiters=array();
$approve=0;
$error='';
$var='';

$handler->mod_rep_forms();

if(isset($_POST['submit']) && (!empty($_POST['comments']) || !empty($_POST['commenter_name']))){

$comments=htmlspecialchars($_POST['comments']);
$commenter=htmlspecialchars($_POST['commenter_name']);
$date='	'.date("m/d/Y");

$spamkeys=$commArray['spam_keys'];
$spamKeysplit=explode(",",$spamkeys);

if($comments!='comments here' || $comments!='' || isset($commenter)){
$error=$handler->spamCheck($spamkeys,$comments);

echo $error;
if($error==' '){

if($commArray['moderate_comments']==1){
$appprove=0;
$comments=nl2br($comments);
$handler->transmit($account_identifier,$page_level_url,$commenter,$comments,$date,$approve);

if(isset($_SESSION['comment_note'])){
echo $_SESSION['comment_note'];
unset($_SESSION['comment_note']);
}

}else if($commArray['moderate_comments']==0){
$approve=1;
$return=$handler->transmit($account_identifier,$page_level_url,$commenter,$comments,$date,$approve);
$_SESSION['comm']=$return;
echo '<span class="help-block" style="font-family:Corbel;font-style:italic">'.$return.'</span>';
echo $_SESSION['comm'];
unset($_SESSION['comm']);

}
}
}

}else if(isset($_POST['submit'])){
if((!isset($commenter)) || !isset($comments)){
$_SESSION['comment_notification']= '<span class="help-block" style="font-family:Corbel;font-size:10px;color:#666">Hey! You missed out the comments.</span>';
echo $_SESSION['comment_notification'];
unset($_SESSION['comment_notification']);

}
}


//for editing the comments here............
if(isset($_GET['edit_new_comment'])){
if(isset($_GET['hash']) && isset($_GET['usx'])){
$hash=htmlspecialchars($_POST['hash']);		$comment=htmlspecialchars($_POST['new_comment']);
$handle->editComment($hash,$comment);
echo $_SESSION['comment_notification'];
}
}




if(isset($_GET['usx']) && isset($_GET['hash']) && isset($_GET['action'])){

$sql=mysql_query("SELECT *from comments WHERE hash='".$_GET['hash']."' AND commenter='".$_GET['usx']."' ");

if($sql && mysql_num_fields($sql)>0){

echo '<form action="components/comm_processor.php" method="POST" role="form">';
while($m=mysql_fetch_array($sql)){
if($_GET['action']=='quote'){
echo '<input type="text" value="'.htmlspecialchars($_SESSION['account_name']).'" name="comm_name" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" />';

}else if($_GET['action']=='modify'){
echo '<input type="text" value="'.htmlspecialchars($_GET['usx']).'" name="comm_name" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" />';
}

if($_GET['action']=='quote'){
echo '<textarea type="text" name="new_comment" style="width:70%;margin-top:10px;color:#333;margin-bottom:20px;height:120px">'.$_GET['usx'].'Quoted as: [quote][br]'.$m["comments"].'[/br][/quote]</textarea>';
}else if($_GET['action']=='modify'){

echo '<textarea type="text" name="new_comment" style="width:70%;margin-top:10px;color:#333;margin-bottom:20px;height:120px">'.$m["comments"].'</textarea>';
}

echo '<input type="hidden" name ="page_level_url" value="'.$page_level_redirect.'"/>';
echo '<input type="hidden" name="hash" value="'.htmlspecialchars($_GET['hash']).'"/>';

if($_GET['action']=='quote'){
echo '<button type="submit" class="btn btn-twitter" style="background-color:#09c;color:#fff;font-family:Corbel;font-size:80%;width:100px;height:30px" name="post_new_comment">Post Comment</button>'; 
}else if($_GET['action']=='modify'){
echo '<button type="submit" class="btn btn-twitter" style="background-color:#09c;color:#fff;font-family:Corbel;font-size:80%;width:100px;height:30px" name="edit_new_comment">Edit Comment</button>'; 
}
}
echo '</form>';
}

}
?>

</body>
</html>