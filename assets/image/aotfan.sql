CREATE TABLE `users` (
  `username` varchar(255) PRIMARY KEY,
  `password` varchar(255),
  `mail` varchar(255),
  `image` varchar(255),
  `roles` char(3),
  `status` char(3),
  `created` datetime,
  `modified` datetime
);

CREATE TABLE `roles` (
  `code` char(3) PRIMARY KEY,
  `name` varchar(255),
  `description` text
);

CREATE TABLE `status` (
  `code` char(3) PRIMARY KEY,
  `name` varchar(255),
  `description` text
);

CREATE TABLE `comments` (
  `id` int PRIMARY KEY,
  `message` text,
  `created` datetime,
  `modified` datetime
);

CREATE TABLE `reponses` (
  `commentOne` int,
  `commentTwo` int
);

CREATE TABLE `writeComments` (
  `commentId` int,
  `username` varchar(255)
);

CREATE TABLE `articles` (
  `id` int PRIMARY KEY,
  `title` varchar(255),
  `content` text,
  `description` text,
  `image` varchar(255),
  `created` datetime,
  `modified` datetime
);

CREATE TABLE `writeArticles` (
  `articleId` int,
  `username` varchar(255)
);

CREATE TABLE `characters` (
  `id` int PRIMARY KEY,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `age` int,
  `description` text,
  `image` varchar(255),
  `created` datetime,
  `modified` datetime
);

CREATE TABLE `writecharacters` (
  `characterId` int,
  `username` varchar(255)
);

ALTER TABLE `users` ADD FOREIGN KEY (`roles`) REFERENCES `roles` (`code`);

ALTER TABLE `users` ADD FOREIGN KEY (`status`) REFERENCES `status` (`code`);

ALTER TABLE `reponses` ADD FOREIGN KEY (`commentOne`) REFERENCES `comments` (`id`);

ALTER TABLE `reponses` ADD FOREIGN KEY (`commentTwo`) REFERENCES `comments` (`id`);

ALTER TABLE `writeComments` ADD FOREIGN KEY (`commentId`) REFERENCES `comments` (`id`);

ALTER TABLE `writeComments` ADD FOREIGN KEY (`username`) REFERENCES `users` (`username`);

ALTER TABLE `writeArticles` ADD FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`);

ALTER TABLE `writeArticles` ADD FOREIGN KEY (`username`) REFERENCES `users` (`username`);

ALTER TABLE `writecharacters` ADD FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`);

ALTER TABLE `writecharacters` ADD FOREIGN KEY (`username`) REFERENCES `users` (`username`);
