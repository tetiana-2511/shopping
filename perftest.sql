-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 07 2022 р., 09:53
-- Версія сервера: 5.6.41
-- Версія PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `perftest`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Продукти'),
(2, 'Одяг'),
(3, 'Техніка'),
(4, 'Нерухомість'),
(5, 'Авто'),
(6, 'Тварини'),
(7, 'Іграшки'),
(8, 'Кава'),
(9, 'Овочі'),
(10, 'Зброя'),
(11, 'Взуття'),
(12, 'Паливо'),
(13, 'Квитки'),
(14, 'Запасні частини');

-- --------------------------------------------------------

--
-- Структура таблиці `shopping`
--

CREATE TABLE `shopping` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `shopping`
--

INSERT INTO `shopping` (`id`, `item_name`, `category`, `status`, `date`) VALUES
(2, 'Rock', '1', 'Not bougth', '2022-05-03 15:01:14'),
(26, 'Чипси', '1', 'Not bougth', '2022-05-04 18:23:30'),
(37, 'Кунжут', '2', 'Bougth', '2022-05-05 09:31:20'),
(38, 'Кукурудза', '6', 'Not bougth', '2022-05-05 09:31:47'),
(40, 'Футболка', '1', 'Not bougth', '2022-05-05 09:34:48'),
(43, 'Кунжут', '2', 'Not bougth', '2022-05-05 14:23:21'),
(54, 'Кукурудза', '1', 'Bougth', '2022-05-06 06:58:50'),
(55, 'Rock', '1', 'Bougth', '2022-05-06 06:59:34'),
(59, 'Something', '1', 'Not bougth', '2022-05-06 07:20:23'),
(64, 'Pot', '1', 'Bougth', '2022-05-06 08:00:34'),
(65, 'Гайка', '14', 'Not bougth', '2022-05-07 06:17:16'),
(66, 'Колесо', '14', 'Not bougth', '2022-05-07 06:19:56'),
(67, 'Сир', '1', 'Bougth', '2022-05-07 06:23:33');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
