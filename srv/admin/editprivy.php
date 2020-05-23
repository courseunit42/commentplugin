<?php
require_once '../handler.php';

session_start();
$handler=new handler();

if(isset($_GET['username']) && isset($_GET['userid'])){
$username=addslashes($_GET['username']);
$userid=addslashes($_GET['userid']);

$handler->connect();

$sql=mysql_query("UPDATE newusers SET role='CONTRIBUTOR' WHERE username='".$username."' AND id='".$userid."' ");

if($sql){

header("Location: index.php");

}





}

?>