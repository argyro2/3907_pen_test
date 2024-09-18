CREATE DATABASE db_error;
USE db_error;

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Product A', 19.99),
(2, 'Product B', 29.99),
(3, 'Product C', 39.99);


