DROP TABLE IF EXISTS `todolist`;
CREATE TABLE IF NOT EXISTS `todolist` (
  `id` VARCHAR(36),
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `todolist` (`id`, `name`, `logo`) VALUES
('1787adca-2cf6-4cd7-afa1-20af702cd431', 'Grocery Shopping', 'https://www.svgrepo.com/show/368429/cart-shopping-list.svg'),
('3b3de603-6a0b-4e76-b5e1-fc0e66018c6f', 'Exercices', 'https://www.svgrepo.com/show/526948/code.svg');

DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `id` VARCHAR(36),
  `todolist_id` VARCHAR(36),
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `done` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  FOREIGN KEY todolist_id (`todolist_id`) REFERENCES todolist(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `todo` (`id`, `todolist_id`, `title`, `desc`) VALUES
('cbc10bfd-02b2-4db9-92ac-80714f882f4a', '1787adca-2cf6-4cd7-afa1-20af702cd431', 'apples', 'Buy 4'),
('125f181a-18ed-4936-ac64-7d8e48e594b8', '1787adca-2cf6-4cd7-afa1-20af702cd431', 'steak', 'Buy 1'),
(UUID(), '1787adca-2cf6-4cd7-afa1-20af702cd431', 'bread', 'Buy 3');

