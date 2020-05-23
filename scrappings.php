<?php//displaying the form controls if hash and usx url parameters are set

if(!isset($_GET['usx']) || !isset($_GET['hash'])){

header("Location: ".$_SERVER["PHP_SELF"]);

}else{
$comm->connect();
$usx_comm=htmlspecialchars($_GET['usx']);
$hash=htmlspecialchars($_GET['hash']);

$sql=mysql_query("SELECT *from comments WHERE hash='".$hash."' AND commenter='".$usx_comm."'");

if($sql){
$m=mysql_fetch_array($sql);

$comments=$m["comments"];
$_SESSION['old_comment']=$comments;

$formHandler=htmlspecialchars($_SERVER['PHP_SELF']);
echo '<form action="'.$formHandler.'" method="POST" role="form">';
echo '<input type="text" name="commenter_name" value="'.$_GET['usx'].'" size="55" style="height:34px;color:#333;width:70%;font-style:plain;font-size:100%;text-align:justify" />';
echo '<textarea type="text" name="comments" style="width:70%;margin-top:10px;color:#333;margin-bottom:20px;height:120px" placeholder="comments here">'.$comments.'</textarea>';
echo '<input type="hidden" name="page_level_url" value="'.@$_SERVER['HTTP_REFERRER'].'"/>';
//echo '<input type="hidden" name="account_identifier" value="'.@$_SESSION['acct_identifier'].'" />';
echo '<button type="submit" class="btn btn-twitter" style="background-color:#09c;color:#fff;font-size:11px;font-family:Corbel;width:100px;height:30px" name="submit">Modify</button>'; 
echo '</form>';
}
} 

?>