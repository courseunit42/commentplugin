<?php
include ('config2.php');
require_once 'bbcode.php';

class commHandle{
function commHandle(){
}

function fetchIdentifier($page){
$account_identifier='';

$ident=mysql_query("SELECT *from commentserv.comment_srv WHERE root_domain_url='".$page."' ");

if($ident && mysql_num_rows($ident)>0){
if($m=mysql_fetch_array($ident)){

$checkActivation=mysql_query("SELECT *from commentserv.profile WHERE account_name='".$m["account_identifier"]."' AND activation='1' AND active='1' ");

if(mysql_num_rows($checkActivation)>0){
while($m=mysql_fetch_array($checkActivation)){
$account_identifier = $m["account_identifier"];
				}
		}
	}
	}
return $account_identifier;
}

function initialComments($account_identifier){
$comm_settings=array();
$sql=mysql_query("SELECT *from commentserv.comment_srv WHERE account_identifier='".$account_identifier."' ");
if(($row=@mysql_num_rows($sql))>0){

//echo 'successful';
while($match=mysql_fetch_array($sql)){
$domain_url=$match["root_domain_url"];
$moderation=$match["moderate_comm"];
$notify_email=$match["notification_allowed"];
$spam_check=$match["spams"];
$signup = $match["signup"];
$quote_comment=$match["quote_on_comment"];

//adding the settings variables in the array variables
$comm_settings=array('identifier'=>$account_identifier,
'domain'=>$domain_url,
'moderate_comments'=>$moderation,
'email_notification'=>$notify_email,
'signup_needed'=>$signup,
'spam_keys'=>$spam_check,
'quote'=>$quote_comment);
}
}
return $comm_settings;
}

function getApproveStatus($pageurl,$account_identifier){
$comment_approve=0;
$sql=mysql_query("SELECT *FROM commentserv.comment_approve WHERE account_identifier='".$account_identifier."' AND page_level_url='".$pageurl."' ");
if(@mysql_num_rows($sql)>0 && $sql){
if($m=mysql_fetch_array($sql)){
$comment_approve=$m["allow_status"];
}
}
return $comment_approve;
}


function getQuote($domain_url,$account_identifier){
$quote=0;
$sql=mysql_query("SELECT *FROM commentserv.comment_srv WHERE account_identifier='".$account_identifier."' AND root_domain_url='".$domain_url."' ");
if(@mysql_num_rows($sql)>0 && $sql){
if($m=mysql_fetch_array($sql)){
$quote=$m["quote_on_comment"];
}
}
return $quote;
}

function showPreviousComments($pageurl,$account_identifier){
$bb=new bbcode();

$quote_comment=0;
$comments_date='';
$status='';
$reply_button='';
$modify_button='';
$commentsArray=array();
$hash='';
$mod_href2='';

$comment_approve=$this->getApproveStatus($pageurl,$account_identifier);

$modify_lnk2='';$mod_href='';

$sql=mysql_query("SELECT *FROM commentserv.comments WHERE account_identifier='".$account_identifier."' AND approval_status='1' ");
$rows=@mysql_num_rows($sql);

echo mysql_error();

//here goes the code for taking comments through twitter username if the applicant decides to use that but its not included here since 
//there is no way i could know if this client has any application for that purpose...
//in case you want this upgrade kindly contact us on our contact page, thank you

$sql_check_identifier=mysql_query("SELECT *FROM commentserv.comments WHERE account_identifier='".$account_identifier."' ");

if($sql_check_identifier && mysql_num_rows($sql_check_identifier)<=0) {
			/*if their is no comment for that particular page in the comments database notify the user that their is not comments yet, be the first person to comment*/
			$status= '<span style="color:#ccc; font-family:Corbel;font-size:11px">Be the first Person to comment</span>';
			}else{
			
while($match=@mysql_fetch_array($sql)){
$page=$match["page_level_url"];

$id=$match["id"];
$commenter=$match["commenter"];
$comments=$match["comments"];
$comments_date=$match["comment_date"];
$hash=$match["hash"];

if($page==$pageurl){
echo '<div class="row-fluid" style="height:auto;margin-bottom:22px;background-color:#ccc;padding:5px;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;border:1px solid #ccc">';

//setting the login function with facebook and twitter
echo '<div class="row-fluid" style="margin-bottom:5px">';
echo '<span style="color:#333;font-size:11px;font-style:plain bold">'.$commenter.'</span><span style="font-style:italic;font-size:11px;color:#666"> '.'Says:</span><br/>';
echo '<span style="color:#666;font-size:11px">'.$bb->showBBcodes($comments).'</span><br/>';
echo '<span style="color:#333;font-size:10px;font-style:italic">On:'.$comments_date.'</span></div>';

//setting the session variables
$_SESSION['comments']=$comments;
$_SESSION['commenter']=$commenter;
$_SESSION['hash']=$hash;


$modify_lnk=htmlspecialchars($_SERVER["PHP_SELF"]);

$quote=$this->initialComments($account_identifier);
$quote_key=$quote['quote'];
$signup_need = $quote['signup_needed'];

if($comment_approve==0){
$status= '<span class="help-block"  style="font-size:11px">Comments Has Been Disabled for This Post</span>';
}else if($comment_approve==1 && $signup_need==0){
		echo '<form action="'.$modify_lnk.'" method="POST" role="form">';
		echo '<div class="col-sm-2"  style="clear:both;margin-left:1%; margin-right:2%;height:26px;color:#fff;font-size:80%">';
		echo '<button type="submit" name="reply" class="btn btn-success" style="border-radius:3px;width:80px;font-size:80%">Reply</button>';
		echo '</div>';
		echo '</form>';
		}

if((isset($_SESSION['account_name']) || isset($_SESSION['admin_client']) || isset($_SESSION['user_client'])) && $comment_approve==1){
//setting the link for the quote action
$modify_lnk1=htmlspecialchars($_SERVER["PHP_SELF"]).'?hash='.$_SESSION['hash'].'&usx='.$commenter.'&action=quote&quota='.$_SESSION['account_name'];

//setting the link for the modification of comments...
$modify_lnk2=htmlspecialchars($_SERVER["PHP_SELF"]).'?hash='.$_SESSION['hash'].'&usx='.$_SESSION['account_name'].'&action=modify';

$mod_href= 	'<div class="col-sm-2" style="color:#fff"><a href="'.$modify_lnk2.'" style="color:#fff;font-size:10px;font-family:Corbel">Modify</a></div>';

if($quote_key==1){
$mod_href2 = 	'<div class="col-sm-2" style="color:#fff"><a href="'.$modify_lnk1.'" style="color:#fff;font-size:10px;font-family:Corbel">Quote</a></div>';
}
if($_SESSION['account_name']==$commenter){		
	echo '<div class="col-sm-2"  style="margin-right:2%;height:26px;color:#fff;margin-top:-0.6em;font-size:80%">';
	echo $mod_href;	
	echo '</div>';
}
	//displaying the quote button if the user is authenticated properly...
	if($signup_need==0)
echo '<div class="col-sm-2"  style="color:#fff;margin-top:-0.6em;font-size:80%">';
	echo $mod_href2;	
echo '</div>';
		}
			
echo '</div>';
echo '<p/>';

}//end of the if-block within the while-loop block
}//end of the while looping block

	 if($signup_need==1 && $comment_approve==1){
		echo "<div style='color:#ccc;font-size:12px;margin-bottom:5px'>Please <a href='components/signup.php'>signup</a> to comment on this thread</div>";
				}
			}
return $status;
}


function setPage($url,$account_identifier){
$status_quo='';
//this function sets the current page into the comment_approve table so it could be approved for comment taking or not...
//checking the table first if there is anything like that before
$check=mysql_query("SELECT *from commentserv.comment_approve WHERE page_level_url='".$url."' ");

if($check && mysql_num_rows($check)>0){
//redirect back to the url
@header("Location:".$url);
}else if(mysql_num_rows($check)<=0){
$sq=mysql_query("INSERT into commentserv.comment_approve VALUES (NULL, '".$_SESSION['account_identifier']."','".$url."','1')");
if($sq){
$status_quo='Page successfully set';
}
}

}

function spamCheck($spamkeys,$comments_made){
$delimiters=array('1'=>'@','2'=>'#','3'=>'$','4'=>'%','5'=>'^',
'6'=>'&','7'=>'*','8'=>'<','9'=>'>','10'=>'/','11'=>'//','12'=>".",'13'=>'=','14'=>' ','15'=>',');
$spamKeysplit=explode(",",$spamkeys);

foreach($delimiters as $ky){
$commentTokens=explode("$ky",$comments_made);
for($a=0;$a<count($spamKeysplit);$a++){
for($b=0;$b<count($commentTokens);$b++){
if($spamKeysplit[$a]==$commentTokens[$b]){
$_SESSION['spam_note']='Your post/comment is spammy,Thank You';
}else{ 	$_SESSION['spam_note']=' ';
					}
			}
		}
	}

$notice=$_SESSION['spam_note']; return $notice;
}
			

//this function submits new comment into the comment table			
function transmit($account_identifier,$page_level_redirect,$commenter,$comments,$date,$approve){

if(isset($_SESSION['account_name'])){
$commenter=$_SESSION['account_name'];
}
$page_level_redirect = $_SESSION['page_level_redirect'];
$rand=rand(00300,999999);
$hash=$page_level_redirect;
$comments=nl2br($comments);


$chek=mysql_query("SELECT *from commentserv.comments WHERE comments='".$comments."' AND account_identifier='".$account_identifier."' ");

if(mysql_num_rows($chek)<=0){
$sql=mysql_query("INSERT into commentserv.comments VALUES (NULL,'".$account_identifier."','".$page_level_redirect."','".$commenter."','".$comments."','".$date."','".$_SERVER['REMOTE_ADDR']."','".$approve."','".crypt($rand,$hash)."')");
if($sql){
$_SESSION['comment_notification']='<span class="help-block" style="font-family:Corbel;font-size:11px">Your comment is under moderation</span>';
}
$return=$_SESSION['comment_notification'];

//setting the commenter as the profile for modifying responses and comments
$_SESSION['commenter_profile']=$commenter;

mysql_close();
}else{
$_SESSION['comment_note']="<span class='help-block' style='font-family:Corbel;font-size:11px'>Seems You Have Said This Before!</span>";
}
//return $return;
}

function mod_rep_forms(){
$comm_name='';
$comments='';

$var='';
$formHandler=htmlspecialchars($_SERVER['PHP_SELF']);

if(isset($_POST['reply'])){
$var='reply';
}else if(isset($_POST['modify'])){
$var='modify';
}

if(isset($_SESSION['commenter']) && isset($_SESSION['comments']) && isset($_SESSION['hash']) && isset($_SESSION['acct_identifier'])){
$comm_name=$_SESSION['commenter'];
$comments=$_SESSION['comments'];

$page_level_url=$_SESSION['page_level_url'];
$account_identifier=$_SESSION['acct_identifier'];
$hash=$_SESSION['hash'];
}

if($var=='reply'){
echo '<form action="'.$formHandler.'" method="POST" role="form">';

if(isset($_SESSION['user_client']) || isset($_SESSION['account_name']) || isset($_SESSION['admin_client'])) {
echo '<input type="hidden" name="commenter_name" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" value="'.@$_SESSION['account_name'].'" />';
}else if(!isset($_SESSION['user_client']) && !isset($_SESSION['admin_client']) || !isset($_SESSION['account_name'])){
echo '<input type="text" name="commenter_name" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" value="" />';
}

echo '<textarea type="text" name="comments" style="width:70%;margin-top:10px;color:#333;margin-bottom:20px;height:120px" placeholder="comments here"></textarea>';
echo '<input type="hidden" name="page_level_url" value="'.$_SESSION['page_level_url'].'"/>';
echo '<input type="hidden" name="account_identifier" value="'.$_SESSION['account_identifier'].'" />';
echo '<button type="submit" class="btn btn-twitter" style="background-color:#09c;color:#fff;font-family:Corbel;width:100px;height:30px;font-size:11px" name="submit">Post Comment</button>'; 
echo '</form>';

}else if($var=='modify'){
//setting the modify variable in a session variable to last till the update is done
$_SESSION['modify']='yes';
}

}

function editComment($hash,$new_comment){
$msg='';
$sq=mysql_query("UPDATE comments SET comments='".$new_comment."' WHERE hash='".$hash."' ");
if($sq){
$_SESSION['comment_notification']='<span style="color:#666;font-family:Corbel;font-size:11px">Comment(s) updated successfully</span>';
$msg=$_SESSION['comment_notification'];
}else{
$_SESSION['comment_notification']="<span style='color:#666;font-family:Corbel;font-size:11px'>Update failed!</span>";
$msg=$_SESSION['comment_notification'];
}
return $msg;
}

//this function retrieves the appropriate identifier for a particular link.. 
 function getIdentifier($page_level_url){
 $account_identifier='';
 $ident=mysql_query('SELECT *from commentserv.comment_srv');

 if($ident){
while($m=mysql_fetch_array($ident)){

$site_identifier=$m["account_identifier"];
$link=$m["root_domain_url"];

if($link==$page_level_url){
$account_identifier=$site_identifier;
}
}
}
 
return $account_identifier; 
 }
}
?>