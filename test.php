
<?php
require_once 'handler.php';
$handler=new handler();

ob_start();

$handler->connect();

//$sql=mysql_query("SELECT *from profile WHERE email='danoxgroup@gmail.com' AND password=' GTXPU/Bk7BxOw' AND active='1'");

$sql=mysql_query("UPDATE profile SET company_name='ibloggos united' WHERE email='danoxgroup@gmail.com' ");
$hash='danoxgroup@gmail.com';

$search = mysql_query( "SELECT *FROM profile WHERE email='".$hash."' " );
$match = mysql_num_rows( $search );

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