
<?php
require_once '../handler.php';
$handler=new handler();

ob_start();
$handler->connect();


$password_encrypt="adE$#@hgNhj23RTHGsaGF@!%^&";
$encryptedPassword=crypt('doctor12',$password_encrypt);

$account_name='ibloggos';
$email='danoxgroup@gmail.com';

$sql=mysql_query("SELECT *from profile WHERE email_addr='".$email."' AND password='".$encryptedPassword."' AND active='1'");
$match = mysql_num_rows($sql);

echo $match;

if($sql){
echo 'success';
/*while($match=mysql_fetch_array($sql)){
$name=$match["account_name"];
$encrypt=$match["encryption_key"];

echo $name.'<br/>';
echo $encrypt;
}*/
}

?>