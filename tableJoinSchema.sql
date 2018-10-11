DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` INT          NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(256) NOT NULL,
  PRIMARY KEY (`customer_id`)
);

DROP TABLE IF EXISTS `sale_order`;
CREATE TABLE `sale_order` (
  `order_id`    INT       NOT NULL AUTO_INCREMENT,
  `customer_id` INT       NOT NULL,
  `created_at`  TIMESTAMP NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`)
);

DROP TABLE IF EXISTS `sale_order_item`;
CREATE TABLE `sale_order_item` (
  `item_id`     INT NOT NULL,
  `order_id`    INT NOT NULL,
  `name`        VARCHAR(256) NOT NULL,
  `total_amount` FLOAT NOT NULL
);

INSERT INTO `customer`
VALUES
  (1, 'Obama'),
  (2, 'Thumb'),
  (3, 'Prayuth'),
  (4, 'Kim jong un');


INSERT INTO `sale_order`
VALUES
  (10001, 1, '2017-01-27'),
  (10002, 1, '2017-02-10'),
  (10003, 3, '2017-02-20'),
  (10004, 4, '2017-03-31');


INSERT INTO `sale_order_item`
VALUES
  (1201, 10001, 'flyers', 2410.00),
  (1202, 10001, 'flyers', 2410.00),
  (1203, 10001, 'leafets', 5100.00),
  (1204, 10003, 'sticker', 1175.00),
  (1205, 10003, 'leafets', 2306.00),
  (1206, 10003, 'flyers', 1056.00),
  (1207, 10003, 'flyers', 2565.00),
  (1208, 10004, 'sticker', 4100.00);
