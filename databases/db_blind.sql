CREATE DATABASE db_blind;
USE db_blind;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'guest', 'guest123'),
(3, 'user1', 'password1'),
(4, 'testuser', 'testpassword'),
(5, 'sqluser', 'sqlpass');

