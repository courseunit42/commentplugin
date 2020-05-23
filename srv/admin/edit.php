<?php

require_once '../handler.php';

session_start();
ob_start();
$handler=new handler();

$post='';
$summary='';
$tags='';
$title='';

?>

<!DOCTYPE html>
<!--login.php-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>Post Editor</title>
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
</style>
<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>


<script type="text/javascript" src="ckeditor/ckeditor.js">
</script>


</head>

<body>
<div id="contain">

<?php
include 'header.php';
?>

<div id="clear"></div>


</div>

<?php
if(isset($_GET['postid']) && !empty($_GET['postid'])){

$postid=addslashes($_GET['postid']);
//echo $postid;
$_SESSION['postid']=$postid;

$handler->connect();

$result=mysql_query("SELECT *from post WHERE postid='".$postid."' ");

if($result){

while($match=mysql_fetch_array($result)){

$post=$match["posting"];
$summary=$match["summary"];
$tags=$match["tags"];
$title=$match["title"];

}//closing the while loop block

}

}else{

//header("Location: index.php");
}

$errortitle='';
$errortag='';
$errorpost='';
$errorsummary='';

/*
if(empty($title)){
$errortitle='field cannot be empty';
}

if(empty($summary)){
$errorsummary='field cannot be empty';
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
if($count<5){

$errortag='Enter at least 5 tags and at most 10 separated by'.' '.',';

}else if($count>=10){

$errortag='Enter at most 10 tags';

}else if($tags=='Enter at least 5 and at most 10 tags separated by,'){
$errortag='this field cannot be empty, enter at least 5 tags and at most 10 separated by'.' '.',';
}

}

*/


?>

<div id="logger">
<div id="inner">
<h1 class="parag">Post Editor</h1>
<p></p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="logform">

<div id="formlabel">Post title:</div>

<div id="fields"><input type="text" id="textfield" name="title" size="25" maxlength="80" value="<?php echo $title; ?>" autocomplete="off"/>
<div class="displayError"><?php echo $errortitle; ?></div>
</div>

<div id="formlabel">Summary:</div>

<div id="fieldPost2">
<textarea type="text" name="summary" class="textarea3" maxlength="230"><?php echo $summary; ?></textarea>
<div class="displayError"><?php echo $errorsummary; ?></div>
</div><br/>


<script type="text/javascript">
CKEDITOR.replace( 'summary' );
</script>

<div id="formlabel">Post:</div>

<div id="fieldPost">
<textarea type="text" name="post" id="editfield" size="25" maxlength="800" placeholder="<?php echo $post; ?> HTML tags allowed"><?php echo $post; ?></textarea>
<div class="displayError"></div>
</div><br/>

<script type="text/javascript">
CKEDITOR.replace( 'post' );
</script>


<div id="formlabel">Tags:</div>

<div id="fields"><input type="text" id="textfield" name="tags" size="25" maxlength="150" value="<?php echo $tags; ?>"/>
<div class="displayError"><?php echo $errortag; ?></div>
</div>

<div id="button2"> <input type="submit" name="edit" id="comment_button" value="Edit"/>

<div id="displayError"><?php //echo $error;
?>
</div>

</div>

</div>

</div>


<?php


if(isset($_POST['edit'])){

$title=addslashes($_POST['title']);
$summary=addslashes($_POST['summary']);
$post=addslashes($_POST['post']);
$tags=addslashes($_POST['tags']);

$postid=$_SESSION['postid'];

$handler->editPost($postid,$title,$summary,$post,$tags);

}

?>

<div id="clear"></div>

<div id="footer">

<?php

include 'footer.php';
?>

</div>

<!--closing the container-->
</div>
</body>
</html>

