<?php
ob_start();

if(isset($_GET['action'])){

$action=htmlspecialchars($_GET['action']);

if($action=='index'){
header("Location: index.php");
}else if($action=='contact'){
header("Location: contact.php");
}else if($action=='signup'){
header("Location: signup.php");
}else if($action=='admin'){
header("Location: admin/index.php");
}else if($action=='super_mod'){
header("Location: auth/super_mod/index.php");
}else if($action=='about'){
header("Location: about.php");
}else if($action=='privacy'){
header("Location: privacy.php");
}else if($action=='sitemap'){
header("Location: sitemap.php");
}else if($action=='login'){
header("Location: admin/auth/login.php");
}

}

?>