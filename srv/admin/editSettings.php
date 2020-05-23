<?php

require_once '../handler.php';
$handler=new handler();

session_start();
ob_start();

if(!isset($_SESSION['admin'])){
header("Location: index.php");
}else{

$admin=$_SESSION['admin'];


if(isset($_POST['commit'])){

$allowComments=@$_POST['allowcomments'];
$allowUserImages=@$_POST['allowuserimages'];
$deleteSpam=@$_POST['deletespam'];
$moderateComments=@$_POST['moderatecomments'];
$allowHtmlTags=@$_POST['allowhtmltags'];

if($allowComments=='on'){
$allowComments=1;
}else{
$allowComments=0;
}

if($allowUserImages=='on'){
$allowUserImages=1;
}else{
$allowUserImages=0;
}

if($deleteSpam=='on'){
$deleteSpam=1;
}else{
$deleteSpam=0;
}

if($allowHtmlTags=='on'){
$allowHtmlTags=1;
}else{
$allowHtmlTags=0;
}

if($moderateComments=='on'){
$moderateComments=1;
}else{
$moderateComments=0;
}


//updating the settings
$handler->updateSettings($admin,$allowComments,$allowUserImages,$deleteSpam,$moderateComments,$allowHtmlTags);

}

}

?>