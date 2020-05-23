<?php
session_start();
ob_start();

require_once '../handler.php';
$handler=new handler();

$handler->connect();
$name='';

$account_identifier=@$_SESSION['account_name'];
echo $account_identifier;

if(isset($_POST['edit'])){

$comp_name=@$_POST['comp_name'];

$password_encrypt="adE$#@hgNhj23RTHGsaGF@!%^&";
$password=$_SESSION['password_unencryt_ed'];

if($_POST['password']==''){
$newPass=crypt($password,$password_encrypt);
}else{
$newPass=$_SESSION['encrypted_pass'];
}

if(@$_POST['password']!=@$_POST['conf_pass']){
echo '<span class="help-block">Passwords Do Not Match!</span>';
}

$account_identifier=@$_SESSION['account_name'];
$sql=mysql_query("UPDATE profile set password='".$newPass."' , company_name='".$comp_name."' WHERE account_name='".$account_identifier."'");
echo mysql_error();

if($sql){
$_SESSION['notification']=" Updates Successful ".'!';
header("Location: index.php");
}else{
}

}
?>