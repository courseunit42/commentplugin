<?php
session_start();
ob_start();

if(isset($_SESSION['admin_client'])){
unset($_SESSION['admin_client']);
session_destroy();
header("Location: login.php");
}else{
//redirecting to the login folder
header("Location: login.php");

}
?>