-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 25 2018 г., 04:33
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `images`
--

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `name` char(30) COLLATE utf8_bin DEFAULT NULL,
  `img_name` varchar(11) COLLATE utf8_bin NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `name`, `img_name`, `likes`) VALUES
(1, 'COOL', '01.jpg', 3),
(2, 'COOL2', '02.jpg', 3),
(3, 'COOL3', '03.jpg', 6),
(4, 'WELL DONE', '04.jpg', 4),
(5, 'WELL DONE2', '05.jpg', 4),
(6, 'WELL DONE3', '06.jpg', 1),
(7, 'YEAH', '07.jpg', 1),
(8, 'YEAH2', '08.jpg', 2),
(9, 'YEAH3', '09.jpg', 6),
(10, 'awesome', '10.jpg', 2),
(11, 'awesome2', '11.jpg', 3),
(12, 'awesome3', '12.jpg', 5),
(13, 'famously', '13.jpg', 11),
(14, 'famously2', '14.jpg', 14);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD UNIQUE KEY `index_name` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
