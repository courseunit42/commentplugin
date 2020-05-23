<?php
ob_start();
$errorimage='';
?>
 <div class="form-group" style="margin-bottom:-40px;margin-top:20px">
 <label for="email" class="col-md-2" > Account Name: </label>
 <div class="col-md-10">
<input type="text" class="form-control" style="width:80%" disabled="disable" value="<?php echo @$_SESSION['account_name'];?>" name="account_name" />
<span class="help-block"><?php echo $erroraccount;?></span>
</div><br/><br/>
</div>

 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" >Company Name: </label>
 <div class="col-md-10">
<input type="text" class="form-control" 	<?php if(!@$_SESSION['company_name']==""){echo 'disabled="disable" ';}  ?>	style="width:80%" value="<?php 

if(!@$_SESSION["company_name"]==""){
echo @$_SESSION['company_name'];
} ?>" name="comp_name">
<span class="help-block"><?php echo $erroraccount;?></span>
</div><br/><br/>
</div>

 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" > Email Address: </label>
 <div class="col-md-10">
<input type="text" class="form-control" disabled="disable" style="width:80%" value="<?php echo @$_SESSION['email'];?>" name="email">
<span class="help-block"><?php echo $erroremail;?></span>
</div><br/><br/>
</div>

<div class="form-group" style="margin-bottom:-40px">
 <label for="password" class="col-md-2" >Password:  </label>
 <div class="col-md-10">
<input type="password" class="form-control" style="width:80%" value="<?php echo @$_POST['password'];?>" name="password">
<span class="help-block"><?php echo $errorpassword;?></span>
</div><br/><br/>
</div>

<div class="form-group" style="margin-bottom:-40px">
 <label for="confirm-password" class="col-md-2" >Confirm Password:  </label>
 <div class="col-md-10">
<input type="password" class="form-control" style="width:80%" value="<?php echo @$_POST['conf_pass'];?>" name="conf_pass">
<span class="help-block"><?php echo $error_conf;?></span>
</div><br/><br/>
</div>

 <div class="form-group" style="margin-bottom:-40px">
 <label for="email" class="col-md-2" > Profile Image: </label>
 <div class="col-md-10">
<input type="file" style="width:80%" class="file" name="ufile">
<span class="help-block"><?php echo $errorimage;?></span>
</div><br/><br/>
</div>


<div class="form-group" >
<label for="email" class="col-md-2"></label>
<div class="col-md-10"><button type="submit" class="btn btn-google-plus" style="color:#fff;width:140px;height:50px;margin-bottom:20px" name="edit">Edit Profile</button>
</div><br/><br/>
</div>
