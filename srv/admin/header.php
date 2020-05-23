<div id="header">

<div id="head">
<a href="index.php"><img src="../images/bloggosHeader.png" alt="header banner"/></a>

</div>

</div>

<!--clearing the navigation-->
<div id="clear"></div>

<div id="navigation_bar">
<ul id="nav">

<li><a id="links" href="../index.php">Home  </a></li>

<li><a id="links" href="#">Users Sections</a>

<ul>
	<li><a id="links" href="../signup.php">Sign up</a></li>

</ul>

</li>

<li><a id="links" href="#">Feature Categories</a>

<ul>

<li><a id="links" href="../pageLoader.php?category=programming">Programming</a></li>
<li> <a id="links" a href="../pageLoader.php?category=cloud sense">Cloud Sense</a><br/></li>
<li> <a id="links" a href="../pageLoader.php?category=web technologies">Web Techologies</a></li>
<li> <a id="links" a href="../pageLoader.php?category=finances">Online Finance</a></li>
<li> <a id="links" a href="../pageLoader.php?category=news">News</a></li>
<li> <a id="links" a href="../pageLoader.php?category=blogging">Blogging Tips</a></li>


</ul>
</li>

<li><a id="links" href="#">Downloads</a>
<ul>

<li><a id="links" href="../loadController.php?app_category=ipads">iPad Apps</a></li>
<li> <a id="links" a href="../loadController.php?app_category=iphones">iPhones Apps</a></li>
<li> <a id="links" a href="../loadController.php?app_category=droids">Android Os</a></li>
<li> <a id="links" a href="../loadController.php?app_category=macs">Macs</a></li>
<li> <a id="links" a href="../loadController.php?app_category=windows">Windows</a></li>
<li> <a id="links" a href="../loadController.php?app_category=surveys">Get Paid Here!</a></li>
</ul>
</li>


<li><a id="links" href="../whitepapers.php">White Papers</a></li>


<li> <a id="links" a href="../adLoader.php?category=gadgets">Gadgets</a></li>


<?php 
require_once '../handler.php';
$handler=new handler();

$role=$handler->getUserStatus(@$_SESSION['contributor']);

if($role=='MEMBERS'){
echo '<li><a id="links" href="members.php">Members Arena</a></li>';
}else{

echo '<li><a id="links" href="../about.php">About iBloggos</a></li>';


}
?>

<li><a id ="links" href="../contact.php">Contact Us</a></li>

</li>

</ul>

</div>
</div>