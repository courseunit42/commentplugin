<?php
require_once 'commHandle.php';
$comm=new commHandle();

session_start();

if(isset($_POST['edit_new_comment'])){
$hash=htmlspecialchars($_POST['hash']);		$comment=htmlspecialchars($_POST['new_comment']);
echo $hash.'<br/>'.$comment;
$mg=$comm->editComment($hash,$comment);

}

?>