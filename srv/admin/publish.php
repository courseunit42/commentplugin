<?php
//publish.php takes the  post id as a parameter in order to retrieve the post and the details of the post and set it published
require_once '../handler.php';
session_start();
//initializing the handler
$handler=new handler();

$handler->connect();
$confirmation='';

$date=''.date(" jS \of F Y h:i:s A");

if(isset($_GET['postid']) && !empty($_GET['postid'])){
$postid=addslashes($_GET['postid']);
$query="UPDATE post SET publish_status='1',date_published='".$date."' WHERE postid='".$postid."' ";
$result=mysql_query($query);

if($result){
$confirmation='post published successfully';
header("Location: index.php");
}else{
$confirmation='Error'.'!';
}

}



?>