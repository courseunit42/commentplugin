<?php
require_once '../handler.php';

ob_start();

$handler=new handler();

 $errorname='';
 $erroremail='';
 $errorusername='';
 $errorpassword='';
 $errorcaptcha='';
 $errorOutput='';
 $error_conf='';
 $errortos='';

$name='';
$email='';
$username='';
$password='';

$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>iBloggos.com | Sign up</title>

<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="../css/validation.css"/>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" charset="utf-8" />
		<link rel="stylesheet" href="../css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" href="../css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->

<script type='text/javascript' src='../css/jquery.min.js'></script>


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
	font-family: Corbel, Arial, Helvetica, sans-serif;
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
//-->
</style>


<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>	

</head>

<body>
<div id="contain">

<?php

include 'header.php';
?>
<div id="clear"></div>

<!--previous code block for validation of form fields-->

<?php

ob_start();

if(isset($_POST['submit'])){

$email=@$_POST['email'];
$username=@$_POST['username'];
$password=@$_POST['password'];
$conf_pass=@$_POST['conf_pass'];
$tos=@$_POST['tos'];

if(empty($email)){

$erroremail="An email required";

} else if(@!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){

$erroremail='A valid email required';
}

if(empty($password)){

$errorpassword="please fill in your password";

} else if(@!preg_match("/^[a-zA-Z0-9 ]*$/",$password)){

$errorpassword='A valid password required';

}else if(strlen($password)<7){
$errorpassword='Your password must have at least 6 characters and 1 number ';

}

if(empty($conf_pass)){
$error_conf='please confirm your password';
}else if($password!=$conf_pass){

$error_conf='Your passwords do not match';
}

if(empty($username) ){

$errorusername='field cannot be empty';

} else if(@!preg_match("/^[a-zA-Z ]*$/",$name)){

$errorusername='A valid username required';

}

if(empty($_POST['tos'])){
$errortos='please check out our TOS';
}

if(empty($_SESSION['6_letters_code'] ) || strcmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case insensitive match, update the check above to
	
		$errorcaptcha= "The captcha code does not match!";
	}
	

$name=addslashes($name);
$email=addslashes($email);
$username=addslashes($username);
$password=addslashes($password);

}

?>


<div id="contactUs2">

<div id="formdiv">
<div id="add_img"><img src="../images/add_user.png" alt="new user registration favicon" /></div>
<div class="new-reg">New User Registration</div>
<div id="clear"></div>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="submitform" id="submitform">
<div id="formlabel">Email Address:</div>
<div id="fields"><input name="email" id="textfield2"  value="<?php echo @$_POST['email'];?>" type="text" size="30" />

<div class="displayError"><?php echo $erroremail;?></div>

</div>

<div id="formlabel">Username:</div>
<div id="fields"><input name="username" id="textfield2"  value="<?php echo @$_POST['username'];?>" type="text" size="30" />

<div class="displayError"><?php echo $errorusername;?></div>

</div>

<div id="formlabel">password:</div>
<div id="fields"><input name="password" id="textfield2"  value="<?php echo @$_POST['password'];?>"  type="password" size="30" />
<div class="displayError"><?php echo $errorpassword;?></div>
</div>

<div id="formlabel">Confirm password:</div>
<div id="fields"><input name="conf_pass" id="textfield2"  value="<?php echo @$_POST['conf_pass'];?>"  type="password" size="30" />

<div class="displayError"><?php echo $error_conf;?></div>

</div>


<!--here is the captcha codes-->

<div id="formlabel"></div>
<div id="fields">
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captcha' ><br>
<div class="displayError">Enter the code above here :</div>
<input id="textfield2" name="6_letters_code" type="text" size="30"><br>
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
<div class="displayError"><?php echo $errorcaptcha;?></div>
</div>

<div id="clear"></div>

<div id="toslabel"><input type="checkbox" name="tos"></div>

<div id="clear"></div>

<div class="tos">Do you agree to our<a class="toslinks" href="tos.php"> Terms and Conditions</a></div>

<div id="button2"><input type="submit" id="button" name="submit" value="Submit"/>

</div>
<div class="displayTosError"><?php echo $errortos;?></div>

</form>

<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

<!---form submission codes here---->

<?php
$error='';

if(isset($_POST['submit']) && !empty($username) && !empty($password)){

$error=$handler->signUp($username,$password,$email);

}

?>


<!--ends here-->


<!--closing formdiv-->
</div>

<!--closing contactus-->
</div>


<div id="errorcontact"><?php echo $error;?></div>

<div id="clear"></div>

<!--<div id="footer">-->

<?php

include 'copyright.php';
?>

<!--closing the container-->
</div>
</body>
</html>
