CREATE TABLE IF NOT EXISTS  comment_srv(
id TINYINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
account_identifier VARCHAR(100) UNIQUE,
root_domain_url VARCHAR(200) UNIQUE,
no_of_comm_bf_paginate TINYINT(8),
no_of_comm_bf_closing TINYINT(8),
moderate_comm TINYINT(2),
notification_allowed TINYINT(3),
last_modified VARCHAR(80),
spams VARCHAR(200),
quote_on_comment TINYINT(2),
hash VARCHAR(32) UNIQUE
);

#------------------for comments------------------------
CREATE TABLE IF NOT EXISTS comments(
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
accouunt_identifier VARCHAR(100),
page_level_url VARCHAR(200),
commenter VARCHAR(80) ,
comments TEXT(500),
comment_date VARCHAR(120),
ip_address VARCHAR(42),
approval_status INT(2),
hash CHAR(100)
);

#----------contact--------
CREATE TABLE IF NOT EXISTS contacts(
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(100),
email VARCHAR(200),
enquiries TEXT);


CREATE TABLE IF  NOT EXISTS comment_approve(
id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
accouunt_identifier VARCHAR(40),
page_level_url VARCHAR(200),
allow_status INT(2),
);