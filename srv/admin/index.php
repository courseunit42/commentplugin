
<?php
//iCloud Bloggos website index page

require_once '../handler.php';

@session_start();
ob_start();

$handler=new handler();

if(!isset($_SESSION['admin'])){

header("Location: login.php");
}

?>

<!DOCTYPE html>
<!Administrators home page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="../images/favicon.png"/>

<title>iCloud Blogspot | Admin</title>

<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/reset/reset-min.css">-->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" charset="utf-8" />
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
	color:#09c;
	
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
	color:#09c;
}
-->
</style>

<link rel="stylesheet" type="text/css" href="../css/blogoscss.css"/>

</head>

<body>

<!--the overall container for all the div tags-->
<div id="contain">

<div id="clear"></div>

<?php
include 'header.php';
?>

<div id="clear"></div>

<div class="circular-image3">

<?php
$imagefile='../images/'.$_SESSION['image'];
echo '<img src="'.$imagefile.'" alt="'.@$_SESSION['name'].'" height="70" width="70" />';
?>
</div>

<div id="clear"></div>

<div id="user">

<?php 
echo 'Welcome'.'  '.@$_SESSION['admin'].' | '.'<a href="logout.php" id="linka">  Logout  </a>';

?>

</div>

<div id="clear"></div>

<div id="main-container">
<div id="inner-window">

<div id="group2">Settings</div>
<div id="clear"></div>

<div id="right_wing">
<div id="inner">

<?php include('sidebar_right.php'); ?>

</div></div>

<div id="clear"></div>

<div id="group2">Recent Articles</div>

<div id="clear"></div>

<div id="right_wing2">
<div id="inner">

<?php
//getting all the published and unpublished articles from the article bank

$status=$handler->getAllTopics();

if($status=='No'){
echo 'No recent articles';
}
?>

</div>

</div>

<div id="clear"></div>

<div id="group2">Recent Comments</div>

<div id="clear"></div>

<div id="right_wing_comments">
<div id="inner">

<?php
//getting all the published and unpublished articles from the article bank

$status=$handler->getAllComments();

if($status=='No'){
echo 'No recent articles';
}
?>

</div>

</div>

<div id="clear"></div>

<div id="PostWindow2">
Posts Settings <br/><p/>
<small class="linka"> tick all that applies </small><br/>
<form action="editSettings.php" method="POST">
<input type="checkbox" name="allowcomments"/>Allow Comments<br/>
<input type="checkbox" name="allowuserimages"/>Allow Users' Avatar<br/>
<input type="checkbox" name="deletespam"/>Delete Spam<br/>
<input type="checkbox" name="moderatecomments"/>Moderate Comments First<br/>
<input type="checkbox" name="allowhtmltags"/>Allow HTML Tags<br/>

<!--for each post one of this must be set to a status of '1'-->
<!--there are three access levels for controlling who sees which post
access level 1: All Users (contributors(Premium), Admins, Members(Elite))
access level 2: Only Members (Elite)
Admins will always be able to view all posts guaranteed
-->

<input type="submit" name="commit" value="Update settings" id="settings-button"/>
<br/>
<a href='javascript: hidePostWindow();' class="links">Hide Window</a>
</form>
</div>

<div id="clear"></div>

<div id="group-display">Users Management</div>
<div id="clear"></div>
<div id="sidebar-display">

<div id="inner">

<?php
$handler->paginateUsers();

?>
<a href='javascript: toggleWindow();' class="links">Hide Window</a>

</div>
</div>

<div id="clear"></div>

<!--closing maincontainer-->
</div>

</div>
</div>

<div id="clear"></div>

<div id="footer">
<?php

include 'footer.php';
?>
</div>


</div>

<!--scripts goes here for boosting page speed-->


<script type="text/javascript">
function showAccount(){
document.getElementById('accountPanel2').style.display="block";
}
</script>

<script type="text/javascript">
function toggleWindow(){

document.getElementById('sidebar-display').style.display="none";
document.getElementById('group-display').style.display="none";

}
</script>

<script type="text/javascript">
function hideAds(){

document.getElementById('formdivright').style.display="none";

}
</script>

<script type="text/javascript">
function showAdsWindow(){

document.getElementById('formdivright').style.display="block";

}
</script>

<script type="text/javascript">
function hideAccounts(){
document.getElementById('accountPanel-admin').style.display="none";
}

</script>


<script type="text/javascript">
function hidePostWindow(){
document.getElementById('PostWindow2').style.display="none";
}
</script>


<script type="text/javascript">
function showPostWindow(){
document.getElementById('PostWindow2').style.display="block";
}
</script>

<script type="text/javascript">
function showUsers(){
document.getElementById('sidebar-display').style.display="block";
document.getElementById('group-display').style.display="block";
}

</script>

<?php
include ( '../counter/counter.php');

$page='http://ibloggos.com/admin/index.php';
addinfo($page);



?>

</body>
</html>