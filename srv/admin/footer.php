
<div id="bannerAds">
<?php
//executing the ads scripts here
require_once '../handler.php';

//instantiating the handler
$handler=new handler();

$adname='';
$channel='';

$handler->showAds($adname,$channel);

?>

</div>

<div id="clear"></div>

<div id="grp">
<div id="footerlinks">
Main Pages<br/>
<a id="footer-hyperlinks" href="../index.php">Home</a><br/>
<a id="footer-hyperlinks" href="../about.php">About Us</a><br/>
<a id="footer-hyperlinks" href="../contact.php">Contact Us</a><br/>

</div>

<div id="footerlinks">
Users Section<br/>
<a id="footer-hyperlinks" href="../signup.php">Register Here</a><br/>
<a id="footer-hyperlinks" href="../privacy.php">Privacy Policy</a><br/>

</div>

<div id="footerlinks">
Site Map<br/>
<a id="footer-hyperlinks" href="../sitemap.php">Pages</a><br/>
<a id="footer-hyperlinks" href="../controller.php?action=category">All Categories</a><br/>
</div>

<div id="footerlinks">

Categories<br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=programming">Programming</a><br/>
<a href="../pageLoader.php?category=Career" id="footer-hyperlinks">Career Development</a><br/>
<a href="../pageLoader.php?category=web technologies" id="footer-hyperlinks">Web Techologies</a><br/>
<a href="../pageLoader.php?category=finances" id="footer-hyperlinks">Finances</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=cloud sense">Cloud Sense</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=blogging">Blogging</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=Articles & e-books">Articles & e-books</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=Technical Writes">Technical Papers</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=news">News</a><br/>
<a id="footer-hyperlinks" href="../pageLoader.php?category=software components">Software Components</a>

</div>

<div id="footerlinks">
Tags & Feeds<br/>
<a href="../controller.php?action=tagcloud" id="footer-hyperlinks">Tag Cloud</a><br/>
<a href="../controller.php?action=feeds" id="footer-hyperlinks">RSS Feeds</a><br/>
</div>


<div id="footerlinks">
Users Statistics<br/>
<?php


include '../guestCount.php';
?>
</div>

<div id="footerlinks">
follow us on:<br/>
<a  href="http://twitter.com/danyl007O"><img src="../images/cropped_twitter_2.png" alt="Twitter" id="footer-hyperlinks"></a><br/>
<a  href="http://facebook.com/ibloggos"><img src="../images/cropped_fb2.png" alt="facebook" id="footer-hyperlinks"></a><br/>
<a  href="https://plus.google.com/app/basic/116742251389391729647"><img src="../images/cropped_G2.png" alt="facebook" id="footer-hyperlinks"></a><br/>
<a href="http://www.youtube.com/channel/UCrWAlHrfU6dg39bsW6ix3Ow"><img src="../images/youtuber2.png" alt="youtube" id="footer-hyperlinks"></a><br/>

</div>


<div id="copy">
<span class="linka">Copyright(c) 2009-2014. All Rights Reserved. iCloud Bloggos Webportal</span><br/>
<a id="footer-hyperlinks" href="#">Back to The Top</a>
</div>


</div>