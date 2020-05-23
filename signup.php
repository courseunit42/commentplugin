<?php
require_once 'handler.php';
session_start();

include 'twitterasyc/EpiCurl.php';
include 'twitterasyc/EpiOAuth.php';
include 'twitterasyc/EpiTwitter.php';
include 'twitterasyc/secrets.php';

$twitterObj = new EpiTwitter(CONSUMER_KeY,CONSUMER_SEcreT,Token,SECreT);
$twitterObjUnAuth = new EpiTwitter(CONSUMER_KeY,CONSUMER_SEcreT);

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
$errorname='';
$name='';
$email='';
$username='';
$password='';

?>

<!DOCTYPE html>
<!--topmost home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="icon" type="image/png" href="images/favicon.png"/>
<link rel="author" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=author" />
<link rel="publisher" href ="https://plus.google.com/app/basic/116742251389391729647/?rel=publisher" />
<link rel="stylesheet" type="text/css" href="css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="css/social.css"/>
<link rel="stylesheet" href="css/social-buttons.css">

<title>New Signup | commentplug.com</title>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/fonts/fontawesome-webfont.ttf" />
<link rel="stylesheet" href="css/social-buttons.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script src="social-buttons.js"></script>

<script type="text/javascript" href="bootstrapCss/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrapCss/css/bootstrap.css"/>


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
	color:#333;
	
}
body,td,th {
	font-family: Corbel, Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #ccc;
}
a:link {
	color: #666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #ccc;
}
a:hover {
	text-decoration: underline;
	color: #fff;
}
a:active {
	text-decoration: none;
	color: #333;
}
body {
	margin-left: 20px;
	margin-top: 15px;
	margin-right: 20px;
	margin-bottom: 15px;
	color:#333;
}

-->
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script type="text/javascript" href="bootstrapCss/js/bootstrap.js">

$ (function(){
$ (".dropdown-toggle").dropdown ('toggle');
});
</script>

<script type="text/javascript">
   $ (function(){
$ (".dropdown-toggle").dropdown ('toggle' );
});
</script>

</head>

<body>

<!--the overall container for all the div tags-->
<div class="container-fluid" style="padding: 10 10 10 10; -moz-border-radius:10px; -webkit-border-radius: 10px;
border-radius: 10px; border: 1px solid # ccc">

<?php
include 'header2.php';
?>

<div class="row-fluid">

<?php

ob_start();

if(isset($_POST['submit'])){

$email=@$_POST['email'];
$password=@$_POST['password'];
$conf_pass=@$_POST['conf_pass'];
$tos=@$_POST['tos'];
$name=@$_POST['name'];

if(empty($email)){

$erroremail="An email required";

} else if(@!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){

$erroremail='A valid email required';
}


if(empty($name)){

$errorname="Account Name is required";

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
	
$email=addslashes($email);
$username=addslashes($username);
$password=addslashes($password);
}
?>

<div class="row-fluid">
<div class="col-md-2"></div>
<div class="col-md-10" style="margin-top:25px;margin-bottom:14px">
<span class="help-block">Registered? <a href="controller.php?action=login" style="color:#ccc;font-family:Calibri">Login Here</a></span><div class="social-sharing">
<a href="" class="share-facebook" style="float:left;margin-left:2%;width:23%;height:auto;color:#fff;font-size:70%;padding:5px;font-family:Corbel"><i class="fa fa-facebook fa-md fb" ></i>Sign in with Facebook</a>

<?php
$oauth_token = @$_GET['oauth_token'];
	if($oauth_token == '')
  	  { 
	  	$url = $twitterObjUnAuth->getAuthenticateUrl();
echo '<a href="'.$url.'" class="share-twitter"  style="float:left;margin-left:2%;width:23%;height:auto;color:#fff;font-size:70%;padding:5px;font-family:Corbel"><i class="fa fa-twitter fa-md tw" ></i>Sign in with Twitter</a>';
}
?>
<br/>
</div>

</div>
</div>

<div style="clear:both"></div>

<span style="float:left;margin-left:30%;font-size:32px;font-family:Corbel;color:#cccccc">OR</span>


<div style="clear:both"></div>


<div class="row-fluid">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  role="form" method="POST">
 
 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" > Account Name:</label>
 <div class="col-md-10">

 <input type="text" class="form-control" style="width:80%" id="firstname" value="<?php echo @$_POST['name'];?>" name="name">
<span class="help-block"><?php echo $errorname;?></span>
</div><br/><br/>
</div>
 
 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" > Email Address: </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:80%" id="firstname" value="<?php echo @$_POST['email'];?>" name="email">
<span class="help-block"><?php echo $erroremail;?></span>
</div><br/><br/>
</div>

<div class="form-group" style="margin-bottom:-40px">
 <label for="password" class="col-md-2" >Password:  </label>
 <div class="col-md-10">
<input type="password" class="form-control" style="width:80%" id="username" value="<?php echo @$_POST['password'];?>" name="password">
<span class="help-block"><?php echo $errorpassword;?></span>
</div><br/><br/>
</div>


<div class="form-group" style="margin-bottom:-40px">
 <label for="confirm-password" class="col-md-2" >Confirm Password:  </label>
 <div class="col-md-10">
<input type="password" class="form-control" id="username" style="width:80%" value="<?php echo @$_POST['conf_pass'];?>" name="conf_pass">
<span class="help-block"><?php echo $error_conf;?></span>
</div><br/><br/>
</div>


<div class="form-group" style="margin-bottom:-40px">
<label for="captcha" class="col-md-2" >Prove You Are Human:  </label>
<div class="col-md-10">
<input class="form-control" name="6_letters_code" type="text" style="width:80%"/><br>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captcha' /><br/>
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
<div class="help-block"><?php echo $errorcaptcha;?></div>
</div><br/><br/>
</div>


<div class="form-group" style="margin-bottom:0px">
<label for="email" class="col-md-2">Agree to our TOS</label>
<div class="col-md-10"><input type="checkbox" name="tos" /><span class="help-block">  Do you agree to our <a class="toslinks" href="privacy.php"> Terms and Conditions</a></span></div>
</div>


<div class="form-group" >
<label for="email" class="col-md-2"></label>
<div class="col-md-10"><input type="submit" class="btn btn-google-plus" style="width:140px;color:#fff;height:50px" name="submit" value="Submit" />
<span class="help-block"><?php echo $errortos;?></span>
</div><br/><br/>
</div>

</form>


<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>



<?php
$error='';

if(isset($_POST['submit']) && !empty($email) && !empty($password) && !empty($tos)){

$error=$handler->signUp($name,$email,$password);
$handler->insertIdentifiers($name,$email);
}
?>

</div>
</div>
<div style="clear:both"></div>
<pre>
<?php  
$creds = $twitterObj->get('/account/verify_credentials.json');
//setting the name in a session variable
$_SESSION['name']=$creds['name'];
$_SESSION['email']=$creds['email'];



echo 'Name is: '.$creds['name'].'<br/>';
echo  'Email:'.$creds['email'];
?>

</pre>

<div id="clear"></div>

<?php
include 'footer.php';
?>

<!--the closing div tag for the container-->
</div>


<!--google analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53664012-4', 'auto');
  ga('send', 'pageview');

</script>


 </div>
</body>
</html>