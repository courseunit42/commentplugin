<?php

require_once 'handler.php';
$handler=new handler();

$handler->connect();

$sql="CREATE TABLE profile (id INT NOT NULL AUTO_INCREMENT,

PRIMARY KEY(id),
account_name VARCHAR(70) UNIQUE,
email_addr  VARCHAR(100) NOT NULL UNIQUE,
company_name VARCHAR(70),
password VARCHAR(90),
avatar VARCHAR(60),
encryption_key  CHAR(48) UNIQUE,
active INT(2),
lastlogin VARCHAR(90),
logstatus INT(2),
session_id CHAR(48),
ip_address VARCHAR(14),
activation INT(3),
verification_hash  VARCHAR(48) UNIQUE) ENGINE=InnoDB";

$result=mysql_query($sql);

if($result){
echo 'table created';
}
?>