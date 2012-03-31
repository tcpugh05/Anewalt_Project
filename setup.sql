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
-- 	`date` variable
	`description` varchar(256),
	`contact_info` varchar(120),
	`skills needed` varchar(120),
	`posted_by` varchar(15),
	 PRIMARY KEY (`career_id`)
);