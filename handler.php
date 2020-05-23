<?php

include ('config.php');

class handler{

function _construct(){
$this->encSession();
}

function encSession(){
$salt="RTg12S67hGk!reGdwWtSgH";
session_id(crypt(eFgTHtyErGrRTsg123TIoG,$salt));

@$_SESSION['EXPIRE']=time()+3500000000000000;

if(time()>=$_SESSION['EXPIRE']){
session_regenerate_id();
}

}


function showImage($file){
$img= '';
$dirname = "./images/" ;
$images = @scandir ($dirname );
$ignore = Array( "." , ".." );
$width=70;
$height=70;

if(! in_array ($file , $ignore )) {
$img="<img src='./../images/$file ' width='90' class='img-circle' height='90'/>";
}
return $img;

}

function loginUser($email,$password){
$account_name='';
$error='';
//$password_encrypt="adE$#@hgNhj23RTHGsaGF@!%^&";
$encryptedPassword=crypt($password,hasH);

$sql = "SELECT *FROM profile WHERE email_addr='".$email."' AND password='".$encryptedPassword."' AND active='1'";
$result=mysql_query($sql);


if($result && (($rows=mysql_num_rows($result))>0)){
	$now=''.date("m/d/Y");
	$session=session_id();

	$_SESSION['email']=$email;
	$_SESSION['password_unencryt_ed']=$password;
	$_SESSION['encrypted_pass']=$encryptedPassword;
	
	//setting the admin session variable to be equal to an encrypted session variable
	$_SESSION['user_client']=crypt(session_id(),$password_encrypt);

	//generating a session id
	$sessionid=session_id();

while($match=mysql_fetch_array($result)){
$account_name=$match["account_name"];
$company_name=$match["company_name"];
$payment_status=$match["payment_status"];
$activation_status=$match["activation"];

//activation status of 0=trial, 1= payment, 2=expired

if($account_name==''){
$_SESSION['account_name']='Guest';
}else if($account_name=='0'){
$_SESSION['account_name']='Guest';
}else{
$_SESSION['account_name']=$account_name;
}

$lastlogin=$match["lastlogin"];
$sessionid=$match["session_id"];
$_SESSION['company_name']=$company_name;
$_SESSION['user_name']=$account_name;

//setting session variable for payment status
$_SESSION['payment_status']=$payment_status;
$_SESSION['activation']=$activation_status;

}

$update=mysql_query("UPDATE profile SET session_id='".$session."', logstatus='1', lastlogin='".$now."' , ip_address='".$_SERVER['REMOTE_ADDR']."' WHERE email_addr='".$email."' ");

//redirecting to the index folder
header("Location: ../index.php?action=home");
}else{
$error='<span class="help-block" style="margin-left:7px">Email Address/Password Incorrect</span>';
}
return $error;
}//end of loginUser function



function login($email,$password){
$account_name='';
$error='';
$encryptedPassword=crypt($password,hasH);
$sql = "SELECT *FROM profile WHERE email_addr='".$email."' AND password='".$encryptedPassword."' AND active='1'";
$result=mysql_query($sql);

if($result && (($rows=mysql_num_rows($result))>0)){
	$now=''.date(" jS \of F Y h:i:s A");
	$session=session_id();

	$_SESSION['email']=$email;
	$_SESSION['password_unencryt_ed']=$password;
	$_SESSION['encrypted_pass']=$encryptedPassword;
	
	//generating a session id
	$sessionid=session_id();

while($match=mysql_fetch_array($result)){
$account_name=$match["account_name"];
$company_name=$match["company_name"];
$payment_status=$match["payment_status"];
$activation_status=$match["activation"];
$role=$match["role"];

$_SESSION['admin_name']=$account_name;

if($role=='ADMIN'){
//setting the admin session variable to be equal to an encrypted session variable
$_SESSION['admin_client']=crypt(session_id(),hasH);
}

if($account_name=='' || $account_name==' '){
//nothing happens... else
}else{
$_SESSION['account_name']=$account_name;
$_SESSION['user_client']=$account_name;

}

$lastlogin=$match["lastlogin"];
$sessionid=$match["session_id"];
$_SESSION['company_name']=$company_name;

//setting session variable for payment status
$_SESSION['payment_status']=$payment_status;
$_SESSION['activation']=$activation_status;
}

$update=mysql_query("UPDATE profile SET session_id='".$session."', logstatus='1', lastlogin='".$now."' , ip_address='".$_SERVER['REMOTE_ADDR']."' WHERE email_addr='".$email."' ");

//redirecting to the index folder
header("Location: ../index.php?action=home");
}else{
$error='<span class="help-block" style="margin-left:7px">Email Address/Password Incorrect</span>';
}
return $error;
}//end of login function


function retCommentSrv($account_identifier){
$settingArray=array();

//$this->connect();
$sql=mysql_query("SELECT *from comment_srv WHERE account_identifier='".$account_identifier."'");

if($sql && ($row=mysql_num_rows($sql)>0)){

while($match=mysql_fetch_array($sql)){
$root_url=$match["root_domain_url"];

$paginate=$match["no_of_comm_bf_paginate"];
$closing=$match["no_of_comm_bf_closing"];
$moderate_comm=$match["moderate_comm"];
$notificate_allw=$match["notification_allowed"];
$mod_date=$match["last_modified"];
$spam=$match["spams"];

$settingArray=array('page'=>$paginate,
'comment_closing'=>$closing,
'moderate_comm'=>$moderate_comm,
'notification_allowed'=>$notificate_allw,
'modify_date'=>$mod_date,
'spams'=>$spam);

}
}else{
echo 'Client Not Activated!';
}

return $settingArray;
}

function initialComments($client_identifier){


}

function insertIdentifiers($name,$email){
$encrypt_key='RTG2GHDsahCOmmServe1342';
$emailxpl=explode("@",$email);
$emailFrag=$emailxpl[0].$emailxpl[1];

//$password_encrypt='GT12%SgsHAtewY$@!^';

$password_encrypt="adE$#@hgNhj23RTHGsaGF@!%^&";
$hash='Key123FSGh!@#HSgh';
$sql2=mysql_query("INSERT into comment_srv VALUES(NULL,'".$name."','".$name."','0','0','0','0','','','".crypt($emailFrag,$encrypt_key)."')");

if($sql2){
echo 'Success';
}else{
echo mysql_error();

}

}


function signup($name,$email,$password){
$encrypt_key='RTG2GHDsahCOmmServe1342';
$emailxpl=explode("@",$email);
$emailFrag=$emailxpl[0].$emailxpl[1];

$password_encrypt="adE$#@hgNhj23RTHGsaGF@!%^&";
$hash='Key123FSGh!@#HSgh';
$sql=mysql_query("INSERT into profile VALUES(NULL,'".$name."','".$email."','','".crypt($password,$password_encrypt)."',' ','".crypt($emailFrag,$encrypt_key)."','0','','0','','0','','0','".crypt($emailFrag,$hash)."')");
if($sql){
$_SESSION['notification']='<h1 style="font-style:italic;font-family:Corbel;font-size:28px">Success'."!".'</h1>'.' You have successfully signup, please check your email for a verification string in order to verify your email address<br/>Thank You';

//email setup
$confirm="Sign up Confirmation";
			
			//$header=include('header2.php');			
			$header= "From: Comment Plug"."<noreply@commentplug.com>\r\n";
			$header.= "X-Sender: <Comment Plug>\r\n";
			$header.= "X-Priority: 1\r\n";
			$header.= "Return-Path: " ."<admin@commentplug.com>\r\n";

			$subj='Sign up confirmation';
	$link="http://commentplug.com/srv/enc_verify/?encrypt=".crypt($emailFrag,$encrypt_key);
	//$body='Dear'.' '.$username.',  ';
	$body="\r\n Thank you for signing up, your account has been created please verify your email and activate your account \r\n";
	$body.='by copying the url below in to your browser window if you cannot load it from your inbox or clicking on the link: '.$link;
	$body.="  please do not reply to this message, it is automatically generated and because it will not be delivered\r\n  ";
	$body.='Thank You.';	

	$sendmail=@mail($email,$subj,$body,$header);

header("Location: success.php");

}else{
$confirm='Error';
}

return $confirm;
}


function getLinkProfile($account_identifier){
$s=mysql_query("SELECT *from comment_approve WHERE account_identifier='".$account_identifier."' ");
$allowance=0;
$label='';

if($s && mysql_num_rows($s)>0){

echo '<span class="help-block">Link Profile</span>';

while($m=mysql_fetch_array($s)){
$page_link=$m["page_level_url"];
$allow_comment=$m["allow_status"];
$id=$m["id"];

echo '<b style="color:#09c;font-size:11px">'.$page_link.'</b> | ';

if($allow_comment==0){
$allowance=1;
$label='Allow Comments';
}else{
$allowance=0;
$label='Disallow Comments';
}

$app_link='approvals.php?allow_status='.$allowance.'&link='.$page_link.'&id='.$id;

echo '<a href="'.$app_link.'">'.$label.'</a><br/>';


}

}
}


function getUnmoderatedComment($account_identifier){
$c = mysql_query("SELECT *from comments WHERE account_identifier='".$account_identifier."' AND approval_status='0' ");
$num=mysql_num_rows($c);
if($num>0 && $c){

while($m=mysql_fetch_array($c)){
$comment=$m["comments"];
$date=$m["comment_date"];
$commenter=$m["commenter"];
$link=$m["page_level_url"];
$id=$m["id"];

echo '<div class="row-fluid" style="color:#666">';
echo $commenter.' Says: <br/>';
echo '<span style="color:#09c;font-size:11px; font-family:Corbel">'.$comment.'</span><br/>';
echo 'On: '.'<span style="color:#09c">'.$date.'</span> on this page level url:'.'<span style="color:#09c">'.$link.'</span><p/>';

echo "<a href='deleteComment.php?id=$id' id='admin_links'>Delete Comment</a>"." | <a href='approveComment.php?id=$id' id='admin_links'>Approve Comment</a>";

echo '</div>';
}
}else{

echo '<span class="help-block" style="font-size:13px">No Unmoderated Comment(s)</span>';

}

}

function getUnmoderatedComments($account_identifier){
$c = mysql_query("SELECT *from comments WHERE account_identifier='".$account_identifier."' AND approval_status='0' ");
$num=mysql_num_rows($c);
echo mysql_error();

return $num;
}
}//end of the class
?>