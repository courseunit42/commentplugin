<?php
/*newPost.php
*this file will receive inputs and post the article into the database while it awaits moderation
*from the super admin before its published
*/

require_once '../handler.php';
session_start();

//creating a new instance of the handler class
$handler=new handler();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>New Post</title>

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
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript">
</script>	


<script type="text/javascript" src="ckeditor/ckeditor.js">
</script>

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
$errortitle='';
$errorcategory='';
$errorsubcat='';
$errorpost='';
$errorcaptcha='';
$errorsummary='';
$error='';
$errortag='';
$publink='';


if(isset($_POST['save'])){

$posttitle=$_POST['title'];
$category=@$_POST['category'];
$subcategory=@$_POST['subcategory'];
$post=@$_POST['post'];
$summary=@$_POST['summary'];
$tags=@$_POST['tags'];

if(empty($posttitle)){
$errortitle="A title is required";
}

if(($category=='------------------')|| $category=='Select Category'){
$errorcategory="please select a category";
}

if(($subcategory=='------------------')|| $subcategory=='Select A Subcategory'){
$errorsubcat='please select a subcategory';
}

if(empty($post)){
$errorpost='this field cannot be empty';
}

if(empty($summary)){
$errorsummary='this field cannot be empty';
}


if(empty($tags)){
$errortag='this field cannot be empty, enter at least 5 tags and at most 10 separated by'.' '.',';
}else{

//$taghandles=new array();
$taghandles=explode(",",$tags);

$count=sizeof($taghandles);
if($count<3){

$errortag='Enter at least 5 tags and at most 10 separated by'.' '.',';

}else if($count>=10){

$errortag='Enter at most 10 tags';

}else if($tags=='Enter at least 5 and at most 10 tags separated by,'){
$errortag='this field cannot be empty, enter at least 5 tags and at most 10 separated by'.' '.',';
}
}


if(empty($_SESSION['6_letters_code'] ) || strcmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case insensitive match, update the check above to
	
		$errorcaptcha= "The captcha code does not match!";
	}
	
$posttitle=addslashes($posttitle);
$post=addslashes($post);
$summary=addslashes($summary);
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$tags=addslashes($tags);
$image=$_FILES['ufile']['name'];


if(isset($_SESSION['admin'])){
$author=@$_SESSION['admin'];
}

//posting the article now but not yet published
$error=$handler->submitPost($author,$posttitle,$category,$subcategory,$summary,$post,$tags);
$error=$handler->postImage($image,$posttitle);

}else if(isset($_POST['pub'])){

$posttitle=$_POST['title'];
$category=@$_POST['category'];
$subcategory=@$_POST['subcategory'];
$post=@$_POST['post'];
$summary=@$_POST['summary'];
$tags=@$_POST['tags'];
$file_name=$_FILE['ufile']['name'];



if(empty($posttitle)){
$errortitle="A title is required";
}

if(($category=='------------------')|| $category=='Select Category'){
$errorcategory="please select a category";
}

if(($subcategory=='------------------')|| $subcategory=='Select A Subcategory'){
$errorsubcat='please select a subcategory';
}

if(empty($post)){
$errorpost='this field cannot be empty';
}

if(empty($summary)){
$errorsummary='this field cannot be empty';
}


if(empty($tags)){
$errortag='this field cannot be empty, enter at least 5 tags and at most 10 separated by'.' '.',';
}else{

$taghandles=explode(",",$tags);

$count=sizeof($taghandles);
if($count<3){

$errortag='Enter at least 5 tags and at most 10 separated by'.' '.',';

}else if($count>=10){

$errortag='Enter at most 10 tags';

}else if($tags=='Enter at least 5 and at most 10 tags separated by,'){
$errortag='this field cannot be empty, enter at least 5 tags and at most 10 separated by'.' '.',';
}
}


if(empty($_SESSION['6_letters_code'] ) || strcmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case insensitive match, update the check above to
	
		$errorcaptcha= "The captcha code does not match!";
	}
	

$posttitle=addslashes($posttitle);
$post=addslashes($post);
$summary=addslashes($summary);
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$tags=addslashes($tags);
$file_name=$_FILE['ufile']['name'];

if(isset($_SESSION['admin'])){
$author=@$_SESSION['admin'];
}else if(isset($_SESSION['username'])){
$author=@$_SESSION['username'];
}

//posting the article now but not yet published
$error=$handler->postPublish($author,$posttitle,$category,$subcategory,$summary,$post,$tags);


$file_name=$_FILE['ufile']['name'];

// random 4 digit to add to our file name
// some people use date and time in stead of random digit
$random_digit=rand(0000,9999);
//combine random digit to you file name to create new file name
//use dot (.) to combile these two variables
$new_file_name=$random_digit.$file_name;
$path= "../postimage/".$new_file_name;

if($file_name !='none')
{
//$HTTP_POST_
if(copy($_FILES['ufile']['tmp_name'],$path)){
echo "Successful<BR/>";
//$new_file_name = new file name
//$HTTP_POST_FILES['ufile']['size'] = file size
//$HTTP_POST_FILES['ufile']['type'] = type of file
echo "File Name :".$new_file_name."<BR/>";
echo "File Size :".$_FILES['ufile']['size']."<BR/>";
echo "File Type :".$_FILES['ufile']['type']."<BR/>";
}else{
echo "Error";
}
}

//connecting to the back end
$sql=mysql_query( "UPDATE post SET post_image='".$new_file_name."' WHERE title='".$posttitle."' ");

if($sql){
header("Location: index.php");
}

}
?>

<div class="rules">
<b>The following are to be adhered to while writing your article: </b><p/>
*Endeavour to write a catchy title which must not be longer than 90 characters.<br/>
*Foul languages and slangs are to not acceptable.<br/>
*Your tags must be at least 5 and at most 10, starting with the most important tags/keywords.<br/>
*Endeavour to fill all the text areas and text fields in the form below.<br/>
*We are SEO oriented, so try as much as possible to include your tags/keywords in your post meaningfully without clustering,
else you post shall be eliminated from publication.<br/>
*We allow plain anchor texts, so try as much as possible to apply your anchor texts in an un-obtrusive way.<br/>
*Always allow your post to correspond to your title as much as possible to avoid post unapproval.<br/>
*You can copy your images from your folders directly into the textareas below.<br/>
*Your titles must have no space in between, please put hyper in between your titles.<br/>
*New line tags are acceptable such as <br/> and <p/> for new paragraphs.<br/>
*Any image you must copy into the text areas must be resized to a size of 70px by 70px for data control purposes.

</div>

<div id="clear"></div>

<div id="contactUs">

<div id="formdiv2">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST" name="submitform" id="submitform">

<div id="formlabel">Post title:</div>
<div id="fields"><input name="title" id="textfield"  value="<?php echo @$_POST['title'];?>" type="text" size="30" maxlength="90"/>
<div class="displayError"><?php echo $errortitle;?></div>
</div>

<div id="formlabel">Category:</div>

<div id="fields">
	<select name="category" id="section2">
              <option selected="selected"	>Select Category</option>
	<option>------------------</option>
              <option>programming</option>
              <option>blogging</option>
	<option>finances</option>
	<option>software components</option>
	<option>web hosting</option>
	<option>Career</option>
	<option>Articles and e-books</option>
	<option>web technologies</option>
	<option>cloud sense</option>
	<option>Technical Writes</option>
	<option>lifestyle</option>
	<option>entertainment</option>
	<option>health</option>
	<option>foods</option>
	<option>techs</option>
	<option>news</option>

	</select>

<div class="displayError"><?php echo $errorcategory;?></div>
</div>

<div id="formlabel">Sub-category:</div>

<div id="fields">
	<select name="subcategory" id="section2">
              <option selected="selected">Select A Subcategory</option>
	<option>------------------</option>
              <option>java</option>
              <option>C#</option>
	<option>java web</option>
	<option>C/C++</option>
	<option>PHP</option>
	<option>Erlang</option>
	<option>Python</option>
	<option>Ruby on Rails</option>
	<option>blogging</option>
	<option>online marketing</option>
	<option>general articles</option>
	<option>white papers</option>
	<option>affiliate marketing</option>
	<option>white labels</option>
	<option>domain reselling</option>
	<option>book publishing</option>
	<option>web host migration</option>
	<option>Website designs</option>
	<option>blogging</option>
	<option>writing styles</option>
	<option>seo</option>
	<option>link building</option>
	<option>white hat techniques</option>
	<option>e-book selling</option>
	<option>news</option>

	</select>

<div class="displayError"><?php echo $errorsubcat;?></div>
</div>

<div id="formlabel">Summary:</div>
<div id="fieldPost2"><textarea name="summary" class="textarea3"  value="<?php echo @$_POST['summary'];?>"  type="text" size="30" maxlength="155">Only 155 characters is allowed here</textarea>
<div class="displayError"><?php echo $errorsummary;?></div>
</div>

<script type="text/javascript">
CKEDITOR.replace( 'summary' );
</script>

<div id="formlabel">Post:</div>
<div id="fieldPost">
<textarea name="post" cols="180" class="specialText" rows="10" type="text">

</textarea>

<div class="displayError"><?php echo $errorpost;?></div>
</div>
<script type="text/javascript">
CKEDITOR.replace( 'post' );
</script>

<div id="formlabel">Tags:</div>
<div id="fields"><input name="tags" id="textfield"  value="Enter at least 5 and at most 10 tags separated by ',' " type="text" size="30" maxlength="100"/>
<div class="displayError"><?php echo $errortag;?></div>
</div>


<div id="formlabel">image:</div>
<div id="fields"><input name="ufile" id="textfield"  type="file" />

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
<p/>


<div id="button2"><input type="submit" id="save_draft" name="save" value="Save Draft"</div>

<div id="button2"><input type="submit" id="pubbutton" name="pub" value="Publish"</div>

</form>

<div id="clear"></div>

</div>

<div id="clear"></div>

<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

<!---form submission codes here---->


<!--ends here-->
<div class="errorcontact"><?php echo $error;?></div>
<!--closing contactus-->
</div>
</div>

<div id="clear"></div>

<div id="footer">

<?php
include 'footer.php';
?>

<!--closing the container-->
</div>
</div>


</body>
</html>
