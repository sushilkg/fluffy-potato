DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(256) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`customer_id`)
);

DROP TABLE IF EXISTS `sale_order`;
CREATE TABLE `sale_order` (
  `order_id` int(256) NOT NULL AUTO_INCREMENT,
  `customer_id` int(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
);

DROP TABLE IF EXISTS `sale_order_item`;
CREATE TABLE `sale_order_item` (
  `item_id` int(256) NOT NULL,
  `order_id` int(256) NOT NULL,
  `name` int(256) NOT NULL,
  `total_amout` int(256) NOT NULL
);