-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `todo`;
CREATE DATABASE `todo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `todo`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la catégorie',
  `name` varchar(64) NOT NULL COMMENT 'Nom de la catégorie',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la tâche',
  `name` varchar(64) NOT NULL COMMENT 'Nom de la tâche',
  `completion` int(11) NOT NULL DEFAULT 0 COMMENT 'Niveau d''achèvement de la tâche',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Statut de la tâche (0=non archivée, 1=archivée)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date de création de la tâche',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Date de la dernière mise à jour de la tâche',
  `category_id` int(10) unsigned NOT NULL COMMENT 'Catégorie de la tâche',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-09-29 15:49:25
