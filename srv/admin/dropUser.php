<?php
require_once '../handler.php';

session_start();
$handler=new handler();

if(isset($_GET['userid']) && isset($_GET['username'])){
$userid=addslashes($_GET['userid']);
$username=addslashes($_GET['username']);

if($username=='danox'){
echo 'You cannot delete an administrator account<br/>';

}else{
$handler->connect();

$sql=mysql_query("DELETE FROM newusers WHERE id='".$userid."' ");

if($sql){

header("Location: index.php");

}


}


}

?>