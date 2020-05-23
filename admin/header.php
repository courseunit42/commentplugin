<?php require_once '../handler.php'; 
$handler=new handler(); ?>

<nav class ="navbar navbar-default" role= "navigation" style="width:100%" >

<div class = "navbar-header" >
<a class = "navbar-brand" href="http://commentplug.com/controller.php?action=index"><span style="color:#f30;font-family:Corbel;;font-size:18px">Comment </span> <span style="margin-left:-12px;color:#333;margin-top:2px;font-size:25px">Plug</span></a></div>

<ul class= "nav navbar-nav" >

<li style="font-size:11px;color:#f30"><a href="#">Admin Dashboard </a></li>

<li class ="active" ><a href= "http://commentplug.com/controller.php?action=index" > Home </a></li>

<li><a href= "?action=profile">Client Profile</a></li>
<!--<li><a href= "?action=commSettings">Comment Settings</a></li>-->
<li><a href= "?action=contact">Resolution Area</a></li>

<!--<li><a href= "?action=mod_comments">Comments (<?php echo '<span style="font-size:11px">'.($num=$handler->getUnmoderatedComments($_SESSION['account_name'])).'</span>';?>)</a></li>-->

</div>

</ul>
</nav>

</div>
