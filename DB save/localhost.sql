-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2023 at 06:18 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21023653_courierwebsitedb`
--
CREATE DATABASE IF NOT EXISTS `id21023653_courierwebsitedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id21023653_courierwebsitedb`;

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `shipment_id` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_phone_number` varchar(20) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_phone_number` varchar(20) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `price` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipment_id`, `usersId`, `sender_name`, `sender_phone_number`, `sender_email`, `delivery_address`, `recipient_name`, `recipient_phone_number`, `recipient_email`, `price`) VALUES
(4, 1, 'Димитър Петров       ', '03912396', 'dimitar.petrov47@example.com', 'Улица Хан Крум 12, Бургас', 'Георги Илиев', '45983254', 'georgi.iliev@example.com', 6.00),
(5, 1, 'Анна Тодорова', '09090420', 'anna.todorova@example.com', 'Улица Хан Крум 12, Бургас', 'Петя Михайлова', '01239512', 'petya.mihaylova82@example.com', 18.80),
(6, 1, 'Димитър Петров  ', '03912393', 'dimitar.petrov47@example.com', 'Улица Хан Крум 12, Бургас', 'Петя Михайлова', '94302452', 'petya.mihaylova82@example.com', 23.10),
(8, 1, 'Иван Гергинов', '09331105', 'jpcmp33@gmail.com', 'Любен Каравелов 8, Варна', 'Петя Михайлова', '09959762', 'petya.mihaylova82@example.com', 10.00),
(9, 1, 'Виктор Иванов', '03912395', 'viktor@example.com', 'ул.Съединение 10, София', 'Мария Иванова', '09832153', 'maria.ivanova@example.com', 21.51),
(11, 1, 'Бойко Стефанов', '09994342', 'boyko@abv.bg', 'Площад централен, Брегово', 'Ивана Стефанова', '09829603', 'stefanova@abv.bg', 5.20),
(12, 1, 'Борис Предонов    ', '098312395', 'boris@abv.bg', 'Шумен, ул. Васил Левски 9', 'Дамян Предоев', '098990341', 'damyan@gmail.com', 23.00),
(13, 1, 'Andre Oliveira', '111111', '1andrew98gio@gmail.com', 'abc', '1Toshi Ivanov', '22222', 'toshi@test1.com', 65.00),
(14, 1, 'Васил Николаев    ', '123456789', 'vasil@yahoo.com', 'Митница, гр. Силистра', 'Нелина Борисова', '987654322', 'nelina@abv.bg', 625.00),
(15, 1, 'Иван Гергинов', '123453213', 'ivan@abv.bg', 'testAddress', 'Петко Михайлов', '321312312', 'petkomihailov@gmail.com', 50.00),
(16, 1, 'Линда Паркър ', '42352241', 'linda_parker@gmail.com', 'New York City, Fifth Avenue', 'Уилям Ченг', '12356734', 'cheng@yahoo.com', 29.00),
(17, 1, 'Полина Александрова', '55555555', 'polina@abv.bg', 'град Русе, център', 'Дамян Предоев', '44444444', 'damyan@gmail.com', 79.00);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_history`
--

CREATE TABLE `shipment_history` (
  `shipment_id` int(11) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `history_table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipment_history`
--

INSERT INTO `shipment_history` (`shipment_id`, `tracking_id`, `location`, `status`, `update_time`, `history_table_id`) VALUES
(4, '78P7KMGSTL', 'Площад Централен 3, Русе', 'Регистрирана', '2023-07-09 12:50:34', 4),
(5, 'UBZ7IMZD0L', 'Площад Централен 3, Русе', 'Регистрирана', '2023-07-09 12:52:08', 5),
(6, '1Q3ZQG02AY', 'Площад Централен 3, Русе', 'Регистрирана', '2023-07-09 12:53:11', 6),
(8, 'MFOUBRIM15', 'ул. Стефан Стамболов 4, Русе', 'Регистрирана', '2023-07-09 12:55:44', 8),
(9, 'OWXHERZTTE', 'ул. Люлин планина 12, София', 'Регистрирана', '2023-07-09 12:56:06', 9),
(11, 'E1OQ3K1V0G', 'Ул. Широка, Видин', 'Регистрирана', '2023-07-09 13:14:41', 11),
(12, 'L60NLKYJCY', 'Видин, площад централен', 'Регистрирана', '2023-07-14 17:57:11', 12),
(8, 'MFOUBRIM15', 'ул. Стефан Стамболов 4, Русе', 'На път', '2023-07-14 17:59:46', 13),
(9, 'OWXHERZTTE', 'втори адрес', 'На път', '2023-07-14 17:59:55', 14),
(6, '1Q3ZQG02AY', 'Площад Централен 3, Русе', 'На път', '2023-07-14 18:00:38', 18),
(6, '1Q3ZQG02AY', 'Площад Централен 3, Русе', 'Готова за предаване', '2023-07-14 18:01:00', 21),
(9, 'OWXHERZTTE', 'трети адрес', 'Готова за предаване', '2023-07-14 18:01:08', 22),
(9, 'OWXHERZTTE', 'крайна дестинация', 'Доставена', '2023-07-14 18:01:26', 23),
(12, 'L60NLKYJCY', 'Видин, площад централен', 'На път', '2023-07-14 18:01:53', 25),
(12, 'L60NLKYJCY', 'Видин, площад централен', 'Готова за предаване', '2023-07-14 18:02:00', 26),
(12, 'L60NLKYJCY', 'Видин, площад централен', 'Провалена доставка', '2023-07-14 18:02:10', 27),
(13, 'UAV9GBXBC1', 'Branch test 101', 'Регистрирана', '2023-07-14 19:05:18', 28),
(6, '1Q3ZQG02AY', 'Площад Централен 3, Русе', 'Доставена', '2023-07-15 10:56:34', 29),
(8, 'MFOUBRIM15', 'ул. Стефан Стамболов 4, Русе', 'Провалена доставка', '2023-07-15 19:35:41', 30),
(14, 'LMCP7WHZX1', 'Център, гр. Пловдив', 'Регистрирана', '2023-07-16 14:32:35', 31),
(14, 'LMCP7WHZX1', 'София център', 'На път', '2023-07-16 14:33:50', 32),
(15, 'F6SAJZPNPI', 'testBranch', 'Регистрирана', '2023-07-16 14:56:24', 33),
(14, 'LMCP7WHZX1', 'София център', 'На път', '2023-08-03 19:15:34', 36),
(14, 'LMCP7WHZX1', 'София център', 'На път', '2023-08-03 19:15:35', 37),
(8, 'MFOUBRIM15', 'ул. Стефан Стамболов 4, Русе', 'Провалена доставка', '2023-08-03 19:15:43', 38),
(5, 'UBZ7IMZD0L', 'Пловдив', 'Готова за предаване', '2023-08-05 03:46:45', 46),
(4, '78P7KMGSTL', 'Сливен', 'На път', '2023-08-05 03:54:59', 48),
(4, '78P7KMGSTL', 'Сливен център', 'Готова за предаване', '2023-08-05 03:55:34', 49),
(4, '78P7KMGSTL', 'Сливен център', 'Провалена доставка', '2023-08-05 03:57:42', 50),
(16, 'GY3Q1PMQMB', 'град Пазарджик, ул. Стефан Стамболов 3', 'Регистрирана', '2023-08-12 22:26:43', 51),
(16, 'GY3Q1PMQMB', 'град Пазарджик, ул. Стефан Стамболов 3', 'Готова за предаване', '2023-08-12 22:30:58', 52),
(16, 'GY3Q1PMQMB', 'град Пазарджик, ул. Стефан Стамболов 3', 'Доставена', '2023-08-12 22:40:35', 53),
(17, 'T10X1E3GL4', 'град Добрич, ул. 6-ти септември', 'Регистрирана', '2023-08-12 22:46:14', 54),
(17, 'T10X1E3GL4', 'град Разград', 'На път', '2023-08-12 22:46:37', 55),
(17, 'T10X1E3GL4', 'град Русе', 'Готова за предаване', '2023-08-12 22:46:43', 56),
(17, 'T10X1E3GL4', 'град Русе, център', 'Доставена', '2023-08-12 22:46:47', 57),
(4, '78P7KMGSTL', 'Сливен център', 'Готова за предаване', '2023-08-14 18:52:52', 61);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(6) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPhoneNumber` varchar(20) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `userCreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPhoneNumber`, `usersUid`, `usersPwd`, `userCreatedDate`) VALUES
(1, 'Иван Гергинов', 'jpcmp3@gmail.com', '0899321982', 'admin', '$2y$10$UnWgobCK5K3ULJzWitUTduMQQWizFR.1Cmhct3M/ImyHzUTc5n6L2', '2023-07-09 12:11:37'),
(2, 'Мария Петрова', 'mariya@abv.bg', '0986543321', 'MariaPetrova21', '$2y$10$tE1XQ88ktatqtjnZn.P4HOi41VzB6xS8rkr6h7vw6f3vo6SGO6eF2', '2023-07-09 12:28:22'),
(3, 'Петър Георгиев', 'petar_georgiev@yahoo.com', '079864286', 'PGeorghiev', '$2y$10$gwV62J6PLoBNk7Aismdxm.cdX3KClNkeuFuvpNp1lO494US6cqvJK', '2023-07-09 12:29:12'),
(4, 'Анна Николова', 'anna@gmail.com', '083251321', 'AnnaNikolova27', '$2y$10$KZpQpV1ZLmpXnuGVk5YPCOjxLybAi0Uezh0ziIv5mDjmj4HF9Jb8e', '2023-07-09 12:30:08'),
(5, 'Георги Димитров', 'georgi_dimitrov@abv.bg', '43895134', 'GeorgiDimitrov88', '$2y$10$XLLqCtFF7YzvJ26D0cL79e0ajBr5VxP.rGkclsDAxcF5H/.EKuG9e', '2023-07-09 12:31:01'),
(6, 'Елена Ангелова', 'elena_angelova@gmail.com', '059763452', 'ElenaAngelova42', '$2y$10$R1E./efnL3o9dZ5hRxCR8.gtvYHBdJ4aNygSP04cckLroR9EA/qpy', '2023-07-09 12:31:35'),
(7, 'Николай Кръстев', 'nikolai@yahoo.com', '095823452', 'NikolayKrastev7', '$2y$10$Ej0EJCu83VEBaZMVgLAPwefXEzbEs3PMieLnwqQkzTWrIJDCPo/4G', '2023-07-09 12:32:13'),
(8, 'София Георгиева', 'sofi_georgieva@gmail.com', '089123455', 'SofiaGeorgieva94', '$2y$10$J.yUa.mU1Yqok5aywBMSLOALXDG4B6FuD9q/FAYhXrPmp3jGetomK', '2023-07-09 12:32:48'),
(10, 'Маргарита Михайлова', 'magi_mihailova@gmail.com', '08349214', 'MargaritaMihaylova63', '$2y$10$8UbFkobw1V3nShLUl5BnwOo/UAk.WBRXGxniaBpsLjKq/i0EY5OiK', '2023-07-09 12:33:58'),
(11, 'Виктория Тодорова', 'viki@abv.bg', '08948932', 'ViktoriaTod', '$2y$10$bccDCv1VqzCrsP8EXIeIXO4p0MTXaMEVB.hwBv9Hi04gP.gl2i.Cy', '2023-07-09 12:35:22'),
(12, 'Ivan Gerginov', 'ivangerginov@gmail.com', '123456739', 'ivangerginov', '$2y$10$Wn8ZYnw5ZphTqd5ktyJeCu0ujROZNwbGMpGv89Xpg6KJpwXrw5ZVe', '2023-08-03 19:15:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `shipment_history`
--
ALTER TABLE `shipment_history`
  ADD PRIMARY KEY (`history_table_id`),
  ADD KEY `shipment_id` (`shipment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shipment_history`
--
ALTER TABLE `shipment_history`
  MODIFY `history_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);

--
-- Constraints for table `shipment_history`
--
ALTER TABLE `shipment_history`
  ADD CONSTRAINT `shipment_history_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`shipment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
