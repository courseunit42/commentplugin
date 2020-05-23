<?php
@session_start();


@define("LOCALHOST",'localhost',true);
@define("DBNAME",'commentserv',true);
@define("USERNAMe",'root',true);
@define("PASSWORD",'',true);
@define("password_hash",'adE$#@hgNhj23RTHGsaGF@!%^&',true);
@define('encryption_key','RTG2GHDsahCOmmServe1342',true);
@define('letters','abcdefghijklmNOPQXYZ1234567890',true);
@define("hasH",'adE$#@hgNhj23RTHGsaGF@!%^&',true);

$db=mysql_connect( LOCALHOST , USERNAMe ,PASSWORD); 
$db=mysql_select_db( DBNAME) ;

//$db=mysql_connect( "localhost" , "bloggos" , "ComServ@23#%DocB" ); 
//$db=mysql_select_db( "CommentServ" ) ;

//setting the account_identifier 

//$account_identifier=mysql_query("SELECT *from commentserv WHERE 




?>