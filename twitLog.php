<?php


session_start();

//$consumer_key='ghuJytVFPUHxFbEVDjIiNmf6S';
//$consumer_secret='qx57Wk3RHJubYUMrQAO2JrtVW52BqdjOZltdmaWqLS5G8vgHR';

define("consumer_key","ghuJytVFPUHxFbEVDjIiNmf6S",true);
define("consumer_secret","qx57Wk3RHJubYUMrQAO2JrtVW52BqdjOZltdmaWqLS5G8vgHR",true);

$twitteroauth=new TwitterOauth(consumer_key,consumer_secret);
$request_token=$twitteroauth->getRequestToken('http://localhost/commentplug/signup.php');

$_SESSION['oauth_token']=$request_token['oauth_token'];
$_SESSION['oauth_token_secret']=$request_token['oauth_-token_secret'];

if($twitteroauth->http_code==200){
$url=$twitteroauth->getAuthorizeUrl($request_token['oauth_token']);
header("Location:".$url);
}else{
die('something unusual happend');

}

?>