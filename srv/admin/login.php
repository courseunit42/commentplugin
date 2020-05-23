<?php
require_once '../handler.php';

session_start();
ob_start();

$handler=new handler();

if(isset($_SESSION['admin'])){
header("Location: index.php");
}else if(isset($_SESSION['contributor'])){
header("Location: ../contrib/index.php");
}

$errorUser='';
$errorPass='';
$username='';
$password='';
$remember='';
$errorLogin='';

?>

<!DOCTYPE html>
<!--login.php-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>Admin Login</title>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" charset="utf-8" />
		<link rel="stylesheet" href="../css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if lt IE 7]>
			<link rel="stylesheet" href="../css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->


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
-->
</style></head>
<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>

<body>
<div id="contain">

<?php
include 'header.php';
?>

<div id="clear"></div>


</div>

<?php
$admin_usr=@mysql_real_escape_string($_POST['username']);
$password=@mysql_real_escape_string($_POST['password']);


if(empty($admin_usr)){

$errorUser='username cannot be empty';

}

if(empty($password)){
$errorPass='password cannot be empty';

}


?>



<div id="clear"></div>

<div id="logger">
<div id="inner">

<div class="parag"><img src="../images/user_man.png" width="70" height="70" class="logimage" alt="login"><span class="logpage">Login Here</span>
</div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="logform">

<div id="formlabel">Username:</div>

<div id="fields"><input type="text" id="textfield2" name="username" size="25" maxlength="12" value="" autocomplete="off"/>
<div class="displayError"><?php echo $errorUser; ?></div>
</div>

<div id="formlabel">Password:</div>

<div id="fields">
<input type="password" name="password" id="textfield2" size="25" maxlength="15" value="" autocomplete="off"/>
<div class="displayError"><?php echo $errorPass; ?></div>
</div><br/>

<p></p>
<p></p>
<div id="formlabel"><input type="checkbox" class="forgetPass" name="remember"/></div>

<div id="fields">
Remember Me<br/>
<a href="forgetpassword.php" id="links">Forget Password</a> <br/> Not Yet Sign Up?  <a id="links" href="../signup.php">  Sign up </a>
</div>

<div id="button2"> <input type="submit" src="images/login_button.png" name="Login" class="button" value="Login"/>

<div id="displayError"><?php echo $errorLogin;?></div>

</div>
</div>

</div>

<?php

$msg='';

if(isset($_POST['Login']) && isset($admin_usr) && isset($password)){

$msg=$handler->logAdmin($admin_usr,$password);

echo '<div id="displayError">'.$msg.'</div>';
echo '<div id="clear"></div>';
}

?>

<div id="clear"></div>


<?php

include 'copyright.php';
?>


<!--closing the container-->
</div>
</body>
</html>