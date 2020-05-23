<?php

ob_start();

$username='';

if(isset($_SESSION['admin'])){
$username=$_SESSION['admin'];
}

$link='display.php?username='.$username;
$avatar='avatar.php?username='.$username;
$newpost='newpostTest.php?username='.$username;

//$accountShow='javascript: showAccount();';

$accountShow='editProfile.php';

$showUsers='javascript: showUsers();';
$postSettings='javascript: showPostWindow();';
$ads='adsManager.php';


echo '<a href="'.$newpost.'" id="links" >New Post</a><br/>';
//echo '<a href="'.$link.'">Display Settings</a><br/>';
echo '<a href="'.$postSettings.'">Post Settings</a><br/>';
echo '<a href="'.$showUsers.'" id="links">Users</a><br/>';
echo '<a href="'.$ads.'">Ads Management</a><br/>';
echo '<a href="'.$accountShow.'">Edit Profile</a><br/>';
echo '<a href="downloadManager.php">download Manager</a><br/>';
echo '<a href="../pageviews/display.php">Analytics</a><br/>';
echo '<a href="signup.php">Add Users</a><br/>';
echo '<a href="email.php">Email Client</a><br/>';

?>
