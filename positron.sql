-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(125) DEFAULT NULL,
  `title` varchar(125) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `categories` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `thumbnailUrl` varchar(1000) DEFAULT NULL,
  `shortDescription` text,
  `longDescription` mediumtext,
  `publishedDate` datetime NOT NULL,
  `pageCount` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`) VALUES
(1,	'admin',	'$2y$13$g8lZofZ7YzwVxsazXSlR.OrWjlXzw7IeDMfyW0PGvLHX0sWXSGlYy',	'8t6DSy_0WKpHUccND_DQEPkKtnkXZhWT');

-- 2021-02-02 17:07:05
