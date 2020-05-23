

<?php 
@session_start(); 
require_once '../handler.php';
$handler= new handler();
$settingArray=$handler->retCommentSrv($_SESSION['account_name']);

echo '<div class="col-md-2"></div>';
echo '<div class="col-md-10" style="color:#f66;font-size:14px; margin-bottom:10px;font-style:italic">';
echo '<li>Last Modification Date:'.$settingArray['modify_date'].'</li></br/>';
echo '</div>';

?>


 <div class="form-group" style="margin-bottom:-30px;margin-top:20px">
 <label for="email" class="col-md-2" > No of Comments before pagination: </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:85%;border-radius:0" value="<?php echo @$_POST['paginate'];?>" name="paginate">
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errorpaginate;?></span>
<span class="help-block" style="font-style:italic;color:#f30;width:90%">No of comments before comments are paginated. 10 is the default</span>

</div><br/><br/>
</div>

<div class="form-group" style="margin-bottom:-30px;margin-top:8px">
 <label for="email" class="col-md-2" > Root Domain Url: </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:85%;border-radius:0" placeholder="http://root_domain_url" value="<?php echo @$_SESSION['root_url'];?>" name="url" />
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errorurl;?></span>
<span class="help-block" style="font-style:italic;color:#f30;width:90%">Do not add trailing slash after the domain'/'</span>
</div><br/><br/>
</div>


 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" >No of Comments before Closing </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:85%;border-radius:0" value="<?php echo @$_SESSION['closing'] ;?>" name="closing" />
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errorclosing;?></span>
<span class="help-block" style="font-style:italic;color:#f30;width:90%">No of comments before comments are closed. 100 is the default</span>

</div><br/><br/>
</div>


 <div class="form-group" style="margin-bottom:-30px;margin-top:-5px">
 <label for="category" class="col-md-2" >Moderate Comments Before Approval: </label>
 <div class="col-md-10">

	<select name="moderate" class="form-control" style="width:85%">
    <option>No</option>
    <option>Yes</option>
	</select>
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errormoderate;?></span>
<span class="help-block" style="font-style:italic;color:#f30;width:90%">Do you want comments to be moderated before display? 'No' by default</span>

</div><br/><br/>
</div>

 <div class="form-group">
 <label for="email" class="col-md-2" >Keywords to look out for for spamming </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:85%;border-radius:0" value="<?php echo @$_SESSION['key'];?>" name="key" />
<span class="help-block" style="font-style:italic;color:#f30">Spamming keywords separate by ','</span>
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errorspam;?></span>
</div>
</div>

 <div class="form-group" style="margin-bottom:-30px">
 <label for="cat" class="col-md-2" >Notify on comments alert: </label>
 <div class="col-md-10">

<select name="commNotification" class="form-control" style="width:85%">
<option>No</option>
<option>Yes</option>
</select>
<span class="help-block" style="font-style:italic;color:#f30"><?php echo $errornotification;?></span>
<span class="help-block" style="font-style:italic;color:#f30;width:90%">Do you want to be notified for new comments? 'No' by default</span>

</div>
</div>


<div class="form-group" >
<label for="email" class="col-md-2"></label>
<div class="col-md-10"><button type="submit" class="btn btn-google-plus" style="color:#fff;width:140px;height:50px;margin-bottom:10px;margin-top:12px;border-radius:3px" name="submit">Save</button>
</div><br/><br/>
</div>
