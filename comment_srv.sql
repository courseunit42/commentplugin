CREATE TABLE IF NOT EXISTS  comment_srv(
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_identifier VARCHAR(100) UNIQUE,
root_domain_url VARCHAR(200) UNIQUE,
no_of_comm_bf_paginate INT(8),
no_of_comm_bf_closing INT(8),
moderate_comm INT(2),
notification_allowed INT(3),
last_modified VARCHAR(80),
spams VARCHAR(200),
hash VARCHAR(32) UNIQUE
);


CREATE TABLE IF  NOT EXISTS comment_approve(
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
accouunt_identifier VARCHAR(40),
page_level_url VARCHAR(200),
allow_status INT(2)
);

CREATE TABLE IF  NOT EXISTS profile(
id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_name VARCHAR(70) UNIQUE,
email_addr  VARCHAR(100) NOT NULL UNIQUE,
company_name VARCHAR(70),
password VARCHAR(90),
avatar VARCHAR(60),
encryption_key  CHAR(48) UNIQUE,
active TINYINT(2),
lastlogin VARCHAR(90),
logstatus TINYINT(2),
session_id CHAR(48),
ip_address VARCHAR(14),
activation TINYINT(3),
verification_hash  VARCHAR(48) UNIQUE) ENGINE=InnoDB
);

CREATE TABLE IF  NOT EXISTS comments(
id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_identifier VARCHAR(70) UNIQUE,
page_level_url VARCHAR(90),
commenter VARCHAR(60),
comments VARCHAR(600),
comment_date VARCHAR(100),
ip_address VARCHAR(14),
approval_status TINYINT(2),
hash  VARCHAR(48) UNIQUE
);
