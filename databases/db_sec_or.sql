CREATE DATABASE db_sec_or;
USE db_sec_or;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@hotmail.com', 'password123'),
(2, 'user', 'user@gmail.com', 'userpass'),
(3, 'testuser', 'test@email.com', 'testpassword');
