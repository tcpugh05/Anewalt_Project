DROP DATABASE IF EXISTS cpsc_careers;
CREATE DATABASE IF NOT EXISTS cpsc_careers;
USE cpsc_careers;
GRANT ALL ON *.* TO 'career_admin'@'localhost' IDENTIFIED BY 'r4z0r';

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_id` int(15) NOT NULL auto_increment,
  `first_name` varchar(35) NOT NULL default 'John',
  `last_name` varchar(35) NOT NULL default 'Doe',
  `user_name` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
-- `resume` variable goes here later
  PRIMARY KEY  (`student_id`)
) ;

DROP TABLE IF EXISTS `employers`;
CREATE TABLE `employers` (
  `employer_id` int(15) NOT NULL auto_increment,
  `first_name` varchar(35) NOT NULL default 'John',
  `last_name` varchar(35) NOT NULL default 'Doe',
  `user_name` varchar(35) NOT NULL, 
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`employer_id`)
) ;
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers`(
	`career_id` int(15) NOT NULL auto_increment,
	`a_datetime` varchar(25) NOT NULL default '',
	`description` varchar(256),
	`contact_info` varchar(120),
	`skills_needed` varchar(120),
	`posted_by` varchar(15),
	 PRIMARY KEY (`career_id`)
);

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
    `id`        Int Unsigned Not Null Auto_Increment,
    `name`      VarChar(255) Not Null Default 'Untitled.txt',
    `mime`      VarChar(50) Not Null Default 'text/plain',
    `size`      BigInt Unsigned Not Null Default 0,
    `data`      MediumBlob Not Null,
    `created`   DateTime Not Null,
    PRIMARY KEY (`id`)
);