<?php
/*
create table groups (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,`name` VARCHAR(100),`role` BIGINT,`enabled` INT);
create table players (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(100), `bzid` INT, `team` INT, `recordmatch` INT, `newmail` INT, `newnews` INT, `newmatch` INT, `comment` TEXT, `firstlogin` INT, `lastlogin` INT, `country` INT, `state` INT, `email` VARCHAR(100), `aim` VARCHAR(100), `msn` VARCHAR(100), `jabber` VARCHAR(100), altnick1 VARCHAR(100), altnick2 VARCHAR(100), ircnick VARCHAR(100), pubemail INT, `banned` INT, `deleted` INT);
create table roles (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,`name` TEXT,`permissions` VARCHAR(100));
create table settings (`setting` VARCHAR(100),`value` VARCHAR(100));
create table teams (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(128), `created` INT, `leader` INT, `activity` INT, `rank` INT, `logourl` VARCHAR(128), `description` TEXT, `closed` INT, `inactive` INT, `deleted` INT);

* basic setup *
insert into roles (`name`,`permissions`) VALUES ('Site Admin','11111111111111111111111');
insert into groups (`name`,`role`,`enabled`) VALUES ('GU.LEAGUE','1','1');
*/
?>