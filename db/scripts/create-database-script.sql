CREATE DATABASE IF NOT EXISTS `Presentations_generator` DEFAULT CHARACTER SET utf8;
USE `Presentations_generator`;

CREATE TABLE `presentations` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `category_id` int,
  `path` varchar(255)
);

CREATE TABLE `slides` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `presentation_id` int,
  `heading` varchar(255),
  `text` varchar(255),
  `list` json,
  `codeblock` text,
  `photo` varchar(255),
  `order` int,
  `type_id` int
);

CREATE TABLE `slides_types` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `layout` varchar(255)
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

ALTER TABLE `presentations` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

ALTER TABLE `slides` ADD FOREIGN KEY (`presentation_id`) REFERENCES `presentations` (`id`);

ALTER TABLE `slides` ADD FOREIGN KEY (`type_id`) REFERENCES `slides_types` (`id`);
