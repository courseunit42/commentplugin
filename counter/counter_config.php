<?php

// change these values :

$localhost = 'localhost';


//this line will change with time
$dbuser =  'root';

$dbpass = '';

$dbname = 'bloggos';


//this line will have to be activated for production environment
/*
$dbuser =  'eglobali';

$dbpass = 'Cca7g7z52E';

$dbname = 'eglobali_shoppingCart';

*/

$dbtablehits= 'hits';

$dbtableinfo= 'info';

$maxrows = 250; 

// Restrics how many entry´s are allowed in $dbtableinfo. if more then $maxrows , new entry´s will replace the oldest to keep your database small. 


?>
