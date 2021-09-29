CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `todolist`;

CREATE TABLE `tasks` (
  `task_code` VARCHAR(42),
  `title` VARCHAR(42),
  `completion` VARCHAR(42),
  `status` VARCHAR(42),
  `category_code` VARCHAR(42),
  PRIMARY KEY (`task_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `category_code` VARCHAR(42),
  `name` VARCHAR(42),
  PRIMARY KEY (`category_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `TASK` ADD FOREIGN KEY (`category_code`) REFERENCES `CATEGORY` (`category_code`);
