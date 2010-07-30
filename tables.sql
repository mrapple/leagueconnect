
create table groups (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100),
    `role` BIGINT,
    `enabled` INT
);

create table players (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100),
    `bzid` INT UNSIGNED,
    `team` INT UNSIGNED,
    `recordmatch` INT,
    `newmail` INT UNSIGNED,
    `newnews` INT UNSIGNED,
    `newmatch` INT UNSIGNED,
    `comment` TEXT,
    `firstlogin` TIMESTAMP,
    `lastlogin` TIMESTAMP,
    `country` VARCHAR(100),
    `state` VARCHAR(100),
    `email` VARCHAR(100),
    `aim` VARCHAR(100),
    `msn` VARCHAR(100),
    `jabber` VARCHAR(100),
    `altNicks` TEXT,
    `ircnick` VARCHAR(100),
    `pubemail` VARCHAR(100),
    `banned` BOOLEAN,
    `deleted` BOOLEAN
);

create table roles (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` TEXT,
    `permissions` VARCHAR(100)
);

create table settings (
    `setting` VARCHAR(100),
    `value` VARCHAR(100)
);

create table teams (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(128),
    `created` TIMESTAMP,
    `leader` UNSIGNED INT,
    `cloeaders` TEXT,
    `activity` INT,
    `rank` UNSIGNED INT,
    `logourl` VARCHAR(128),
    `description` TEXT,
    `closed` BOOLEAN,
    `inactive` BOOLEAN,
    `deleted` BOOLEAN
);

create table messages (
    `id` NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `title` VARCHAR( 255 ) NULL ,
    `message` TEXT NOT NULL ,
    `from` INT( 11 ) NOT NULL ,
    `to` INT( 11 ) NOT NULL ,
    `read` BOOL NOT NULL DEFAULT '0',
    `from_deleted` BOOL NOT NULL DEFAULT '0',
    `to_deleted` BOOL NOT NULL DEFAULT '0',
    `created` TIMESTAMP NOT NULL
 );

-- basic setup
insert into roles (`name`,`permissions`) VALUES ('Site Admin','11111111111111111111111');
insert into groups (`name`,`role`,`enabled`) VALUES ('GU.LEAGUE','1','1');