<?php
require_once '../handler.php';
$handler=new handler();

session_start();
ob_start();

$newAccess=0;

if(isset($_GET['postid'])){

$postid=addslashes($_GET['postid']);
$handler->connect();

$previousAccess=$_SESSION['access'];

if($previousAccess==1){
$newAccess=2;
}else if($previousAccess==2){
$newAccess=1;

}

$sql=mysql_query("UPDATE post SET access_level='".$newAccess."' WHERE postid='".$postid."' ");
if($sql){
header("Location: ../admin/");
}

}else{
header("Location: index.php");
}


?>