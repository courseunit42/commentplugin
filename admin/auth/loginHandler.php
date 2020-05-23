
<?php
require_once '../../handler.php';
$handler=new handler();

ob_start();

$msg='';

if(isset($_POST['Login'])){
$email=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['password']);

$msg=$handler->login($email,$password);
echo '<span class="" style="color:#ccc">'.$msg.'</div>';
}else if( $errorPass=='' || $erroremail==''){
echo '<span class="help-block" style="color:#ccc; margin-left:15px">Email Address/password required</div>';
}
?>