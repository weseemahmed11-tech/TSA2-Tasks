CREATE DATABASE IF NOT EXISTS `tasks_tsa2` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tasks_tsa2`;

DROP TABLE IF EXISTS `tasks`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tasks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL,
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `is_archived` tinyint unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'demo.user', 'Demo User', 'demo.user@example.com', '$2y$10$P9W4F2CXqZX9bKCZkiddjeDb/JyepLFv4Dz.dEnSzP9gROXBd6F5S', '2026-10-09 08:00:00');

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `created_at`, `is_archived`) VALUES
(1, 'Review assessment brief', 'Completed', '2026-10-09', '2026-10-08 09:00:00', 0),
(2, 'Plan task database', 'In Progress', '2026-10-09', '2026-10-08 09:15:00', 0),
(3, 'Build welcome page', 'Pending', '2026-10-09', '2026-10-08 09:30:00', 0),
(4, 'Create task list view', 'Pending', '2026-10-10', '2026-10-08 09:45:00', 0),
(5, 'Check profile page', 'Pending', '2026-10-10', '2026-10-08 10:00:00', 0),
(6, 'Write project README', 'Pending', '2026-10-11', '2026-10-08 10:15:00', 0),
(7, 'Review navigation links', 'Pending', '2026-10-11', '2026-10-08 10:30:00', 0),
(8, 'Prepare final submission', 'Pending', '2026-10-12', '2026-10-08 10:45:00', 0);
