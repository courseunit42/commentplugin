<?php
require_once '../handler.php';

session_start();
$handler=new handler();

if(isset($_GET['userid'])){
$userid=addslashes($_GET['userid']);

$handler->connect();

$sql=mysql_query("UPDATE newusers SET active='2' WHERE id='".$userid."' ");

if($sql){

header("Location: index.php");

}





}

?>