<?php
require_once '../handler.php';

session_start();
ob_start();

if(!isset($_SESSION['admin'])){
header("Location:login.php");
}




$handler=new handler();

 $errorapp_name='';
 $errordownload_id='';
 $errordesc='';
 $errordownload_link='';
 $errorlink='';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>Download Manager</title>

<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>
<link rel="stylesheet" type="text/css" href="../css/validation.css"/>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" charset="utf-8" />
		<link rel="stylesheet" href="../css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" href="../css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->

<script type='text/javascript' src='css/jquery.min.js'></script>


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

$appname=@$_POST['app_name'];
$category=@$_POST['category'];
$download_id=@$_POST['downloadid'];
$desc=@$_POST['desc'];
$link=@$_POST['link'];

if(empty($appname)){
$errorapp_name="An App name required";
}

if(empty($link)){
$errorlink='this field cannot be empty';
}


if(empty($download_id)){

$errordownload_id="please fill in the download id";

}

if($category=='------------------' || $category=='Select Category'){
$errorcategory='Select one of the categories';
}

$appname=addslashes($appname);
$category=addslashes($category);
$download_id=addslashes($download_id);
$link=addslashes($link);
$desc=addslashes($desc);

}

?>

<!--<div id="contactUs2">-->

<div id="formdiv-download">

<!--<form action="uploadApps.php" enctype="multipart/form-data" method="POST" name="submitform" id="submitform">-->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="POST" name="submitform" id="submitform">

<div id="formlabel">App Name:</div>
<div id="fields"><input name="app_name" id="textfield2"  value="<?php echo @$_POST['app_name'];?>" type="text" size="30" />
<div class="displayError"><?php echo $errorapp_name;?></div>
</div>

<div id="formlabel">App Category:</div>
	<div id="fields">
	<select name="category" class="sectional">
              <option selected="selected">Select Category</option>
	<option>------------------</option>
              <option>ipads</option>
              <option>macs</option>
	<option>windows</option>
	<option>droids</option>
	<option>iphones</option>
	<option>survey</option>

	<div class="displayError"><?php echo $errorcategory;?></div>
	</div>

<div id="formlabel">download id:</div>
<div id="fields"><input name="download_id" id="textfield2"  value="download id"  type="hidden" size="30" />
</div>

<div id="formlabel">download link:</div>
<div id="fields"><textarea name="link" class="textarea" type="text" size="30" ><?php echo @$_POST['link'] ;?></textarea>
<div class="displayError"><?php echo $errorlink;?></div>
</div>

<div id="formlabel">download id:</div>
<div id="fields"><input name="downloadid" id="textfield2"  value="<?php echo @$_POST['downloadid'] ;?>"  type="text" size="30" />
<div class="displayError"><?php echo $errordownload_id;?></div>
</div>

<div id="formlabel">Upload Image:</div>
<div id="fields"><input type="file" name="ufile" id="textfield" >
</div>

<div id="formlabel">Description:</div>
<div id="fields"><textarea name="desc" class="textarea"  type="text" size="30" placeholder="HTML are not allowed in here"></textarea>
<div class="displayError"><?php echo $errordesc;?></div>
</div>

<div id="button2"><input type="submit" id="button" name="submit" value="Insert"/></div>

</div>

</form>
</div>

<!---form submission codes here---->
<?php

$error='';

if(isset($_POST['submit']))

if(!empty($appname) && !empty($category) && !empty($download_id) && !empty($desc) && !empty($link)){

/*
$appname=@$_POST['app_name'];
$category=@$_POST['category'];
$download_id=@$_POST['downloadid'];
$desc=@$_POST['desc'];
$link=@$_POST['link'];
*/


//file name you are uploading
$file_name = $_FILES['ufile']['name'];

// random 4 digit to add to our file name
// some people use date and time in stead of random digit
$random_digit=rand(0000,9999);
//combine random digit to you file name to create new file name
//use dot (.) to combile these two variables
$new_file_name=$random_digit.$file_name;
//set where you want to store files
//in this example we keep file in folder upload
//$new_file_name = new upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path= "../downloads/".$new_file_name;

if($file_name !='none')
{
//$HTTP_POST_
if(copy($_FILES['ufile']['tmp_name'],$path))
{
echo "Successful<BR/>";

//$new_file_name = new file name
//$HTTP_POST_FILES['ufile']['size'] = file size
//$HTTP_POST_FILES['ufile']['type'] = type of file
echo "File Name :".$new_file_name."<BR/>";
echo "File Size :".$_FILES['ufile']['size']."<BR/>";
echo "File Type :".$_FILES['ufile']['type']."<BR/>";
}
else
{
echo "Error";
}

}


/*
echo $category.'<br/>';
echo $new_file_name;
*/

$error=$handler->uploadCp($appname,$new_file_name,$category,$desc,$link,$download_id);

header("Location: index.php");

}else{
echo '<span class="downloadss">Some fields are still empty</span>';
}




?>

<!--closing formdiv-->
</div>

<!--<div id="errorcontact"><?php echo $error;?></div>-->

<div id="clear"></div>

<?php

include 'copyright.php';
?>


<!--closing the container-->
</div>
</body>
</html>