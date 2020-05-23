<?php
require_once '../../handler.php';

@session_start();
ob_start();

$handler=new handler();

if(isset($_SESSION['admin_client'])){
header("Location: ../index.php");
}
$msg='';
$errorUser='';
$errorPass='';
$erroremail='';

$password='';
$remember='';
$errorLogin='';

?>

<!DOCTYPE html>
<!--login.php-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../../images/favicon.png"/>

<title>Admin Login | CommentPlug</title>
			
			
<link rel="stylesheet" type="text/css" href="../../css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="../../css/social.css"/>


    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			
<link rel="stylesheet" type="text/css" href="../../bootstrapCss/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../bootstrapCss/css/bootstrap-theme.css"/>
<script type="text/javascript" href="../../bootstrapCss/jquery.js"></script>
		
<style type="text/css">
<!--
.links {
	font-family: "Corbel", Arial, Helvetica, sans-serif;
	font-size: 13px;
	letter-spacing: normal;
	text-align: center;
	vertical-align: middle;
	word-spacing: normal;
	white-space: normal;
	
}
body,td,th {
	font-family: "Corbel", Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #09c;
}
a:link {
	color: #666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666;
}
a:hover {
	text-decoration: underline;
	color: #CCC;
}
a:active {
	text-decoration: none;
	color: #666;
}
body {
	margin-left: 20px;
	margin-top: 15px;
	margin-right: 20px;
	margin-bottom: 15px;
}
.btn{
border:0;
}
-->
</style></head>

<body>
<div class="container-fluid">

<?php
include '../../header.php';
?>

<?php

if(isset($_POST['Login'])){
$email=htmlspecialchars(@$_POST['email']);
$password=htmlspecialchars(@$_POST['password']);

if(empty($email)){

$erroremail="Enter Your Email address";

} else if(@!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){

$erroremail='A valid email required';
}


if(empty($password)){
$errorPass='password cannot be empty';
}

}

?>

<div class="row-fluid" style="margin-left:8px; margin-bottom:20px; margin-top:30px">
<div class="row-fluid"><img src="../../images/loc.jpg" width="70" height="70" class="img-responsive" alt="login"><span class="logpage" /></div>
<span style="color:#666;font-family:Corbel;font-size:16px">Admin Login</span>
</div>

<div class="row-fluid">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form" method="POST" name="logform">
<div class="form-group" >
<label for="Email Address" class="col-md-2">Email Address: </label>
<div class="col-md-10"><input type="text" class="form-control" style="height:40px; width:90%" value="<?php echo @$_POST['email']; ?>" name="email" >
<span class="help-block"><?php echo $erroremail; ?></span>
</div>
</div>


<div class="form-group">
<label for="password" class="col-md-2">Password: </label>
<div class="col-md-10"><input type="password" class="form-control" value="<?php echo @$_POST['password']; ?>" name="password" style="height:40px; width:90%">
<span class="help-block"><?php echo $errorPass; ?></span>
</div>
</div>


<div class="form-group" >
<label for="email" class="col-md-2"></label>
<div class="col-md-10"><input type="submit" class="btn btn-twitter" style="color:#fff;border-radius:2;height:50px;width:140px;margin-top:5px" name="Login" value="Login" />
<span class="help-block"><?php echo $errorLogin;?></span>

<?php echo '<div class="help-block" style="color:#ccc">'.$msg.'</div>';?>

</div>
</div>


<div class="form-group" >
<label for="email" class="col-md-2"></label>
<div class="col-md-10"><a href="../forgetpassword.php" id="links">Forget Password</a>
Not Yet Sign Up?  <a id="links" href="../../controller.php?action=signup">  Sign up </a>
</div>
</form>

</div>

<?php
$msg='';
if(isset($_POST['Login'])){
$email=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['password']);
$msg=$handler->login($email,$password);
echo '<div class="col-md-2" style="color:#ccc">'.$msg.'</div>';
}else if( $errorPass=='' || $erroremail==''){
echo '<div class="col-md-2"></div><div class="col-md-10" style="margin-bottom:3em"><span class="help-block" style="color:#ccc">Email Address/password required</span></div></div>';
}
?>
 
<div id="clear"></div>

<?php
include '../../footer.php';
?>

<!--closing the container-->
</div>
</body>
</html>