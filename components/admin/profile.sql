CREATE TABLE profile
(

id INTEGER NOT NULL PRIMARY KEY,
account_name VARCHAR(70) UNIQUE,
email_addr  VARCHAR(100) UNIQUE,
company_name VARCHAR(70),
password varchar(90),
avatar VARCHAR(60),
encryption_key  CHAR(48) UNIQUE,
active INT(2),
lastlogin VARCHAR(90),
logstatus INT(2),
session_id CHAR(48),
payment_status INT(2).
activation INT(3),
verification_hash  char(48) UNIQUE

);
 