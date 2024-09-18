CREATE DATABASE	db_union;
USE db_union;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Union Product A', 49.99),
(2, 'Union Product B', 59.99),
(3, 'Union Product C', 69.99);



