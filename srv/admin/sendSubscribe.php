<?php
require_once '../handler.php';
$handler=new handler();

//output buffering
ob_start();

if(isset($_GET['title']) ){

$handler->connect();
$title=addslashes($_GET['title']);

$msg=$handler->sendEmails($title);

}else{

echo $msg;

header("Location: index.php");
}
?>