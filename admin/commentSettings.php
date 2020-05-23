<?php
require_once '../handler.php';
$handler=new handler();
@session_start();
ob_start();

//$handler->connect();
$acct_identifier=@$_SESSION['account_name'];

//retrieving field details
$paginate='';
$url='';
$closing='';
$moderate='';
$key='';
$commnotify='';
$span='';


if(isset($_POST['submit'])){

$paginate=htmlspecialchars($_POST['paginate']);
if($paginate=='' || $paginate==' '){
$paginate='10';
}

$url=htmlspecialchars($_POST['url']);

$closing=htmlspecialchars($_POST['closing']);
if($closing=='' || $closing==' '){
$closing='100';
}

$moderate=($_POST['moderate']);
if($moderate=='Yes'){
$moderate='1';
}else if($moderate=='No'){
$moderate='0';
}


$commnotify=($_POST['commNotification']);
if($commnotify=='Yes'){
$moderate='1';
}else if($moderate=='No'){
$commnotify='0';
}

$now=''.date(" jS \of F Y h:i:s A");
$spam=htmlspecialchars($_POST['key']);
	
$sql=mysql_query("UPDATE comment_srv SET root_domain_url='".$url."' ,  no_of_comm_bf_paginate='".$paginate."' ,no_of_comm_bf_closing='".$closing."' ,moderate_comm='".$moderate."'
,notification_allowed='".$commnotify."' , last_modified='".$now."' , spams='".$spam."' WHERE account_identifier='".$acct_identifier."' ");

if($sql){
header("Location:index.php?action=home");

}else{
echo mysql_error();

}

}

?>