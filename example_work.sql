-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 15 2020 г., 23:50
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `example_work`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ew_orders`
--

CREATE TABLE IF NOT EXISTS `ew_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `ew_orders`
--

INSERT INTO `ew_orders` (`id`, `user_id`, `price`) VALUES
(1, 2, 100),
(2, 2, 150),
(3, 2, 350),
(4, 4, 170);

-- --------------------------------------------------------

--
-- Структура таблицы `ew_users`
--

CREATE TABLE IF NOT EXISTS `ew_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(55) DEFAULT NULL,
  `email` char(55) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `fio` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `ew_users`
--

INSERT INTO `ew_users` (`id`, `login`, `email`, `password`, `fio`) VALUES
(2, 'administration', 'administration@root.ru', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Сенчило Максим Игоревич'),
(3, 'rootweb', 'administration@root.ru', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Иванов Иван Иванович'),
(4, 'service', 'mail@service.ru', 'f5bb0c8de146c67b44babbf4e6584cc0', 'Иванов Иван Иванович');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
