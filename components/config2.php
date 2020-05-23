<?php
@define("LOCALHOST",'localhost',true);
@define("DBNAME",'commentserv',true);
@define("USERNAMe",'root',true);
@define("PASSWORD",'',true);
@define("hasH","adE$#@hgNhj23RTHGsaGF@!%^&",true);

$db=mysql_connect( LOCALHOST , USERNAMe ,PASSWORD); 
$db=mysql_select_db( DBNAME) ;
?>