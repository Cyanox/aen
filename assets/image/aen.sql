CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  `firstname` varchar(255),
  `lastname` varchar(255),
  `rank` int(11),
  `address` varchar(255),
  `zipcode` varchar(15),
  `country` varchar(50),
  `registerdate` timestamp
);

CREATE TABLE `products` (
  `reference` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `type` varchar(255),
  `ht` float,
  `tva` float,
  `ttc` float
);

CREATE TABLE `carts` (
  `product_ref` varchar(255),
  `user_ref` int
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_ref` int,
  `date` varchar(10),
  `ht` float,
  `tva` float,
  `ttc` float
);

CREATE TABLE `order_products` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_ref` int,
  `product_ref` varchar(255)
);

CREATE TABLE `accoustique` (
  `code` varchar(3) PRIMARY KEY,
  `name` varchar(255),
  `day` float,
  `night` float
);

ALTER TABLE `carts` ADD FOREIGN KEY (`product_ref`) REFERENCES `products` (`reference`);

ALTER TABLE `carts` ADD FOREIGN KEY (`user_ref`) REFERENCES `users` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_ref`) REFERENCES `users` (`id`);

ALTER TABLE `order_products` ADD FOREIGN KEY (`order_ref`) REFERENCES `orders` (`id`);

ALTER TABLE `order_products` ADD FOREIGN KEY (`product_ref`) REFERENCES `products` (`reference`);
