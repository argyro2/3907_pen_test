CREATE DATABASE db_ht;
USE db_ht;

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_agent` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `login_attempts` (`id`, `username`, `password`, `user_agent`, `timestamp`) VALUES
(1, 'admin', 'admin', 'Mozilla/5.0', '2024-08-30 11:53:13'),
(2, 'admin', 'admin', 'Mozilla/5.0', '2024-08-30 11:53:17'),




