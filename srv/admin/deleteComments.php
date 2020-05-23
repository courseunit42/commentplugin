<?php
require_once '../handler.php';
$handler=new handler();

if(isset($_GET['commentid'])){

$commentid=addslashes($_GET['commentid']);

$handler->deleteComments($commentid);

}

header("Location: index.php");

?>