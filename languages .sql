-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2016 г., 20:01
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `languages`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` text NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`) VALUES
(1, 'Киев', 1),
(2, 'Запорожье', 1),
(3, 'Днепропетровск', 1),
(4, 'Одесса', 1),
(5, 'Харьков', 1),
(6, 'Москва', 2),
(7, 'Санкт-Петербург', 2),
(8, 'Екатеринбург', 2),
(9, 'Уфа', 2),
(10, 'Варшава', 3),
(11, 'Вроцлав', 3),
(12, 'Краков', 3),
(13, 'Гданськ', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `city_about`
--

CREATE TABLE IF NOT EXISTS `city_about` (
  `city_id` int(11) DEFAULT NULL,
  `population` int(11) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city_about`
--

INSERT INTO `city_about` (`city_id`, `population`, `post`) VALUES
(1, 100000, 'This info about city, that i want to insert into table'),
(2, 100000, 'This info about city, that i want to insert into table'),
(3, 100000, 'This info about city, that i want to insert into table'),
(4, 100000, 'This info about city, that i want to insert into table'),
(5, 100000, 'This info about city, that i want to insert into table'),
(6, 100000, 'This info about city, that i want to insert into table'),
(7, 100000, 'This info about city, that i want to insert into table'),
(8, 100000, 'This info about city, that i want to insert into table'),
(9, 100000, 'This info about city, that i want to insert into table'),
(10, 100000, 'This info about city, that i want to insert into table'),
(11, 100000, 'This info about city, that i want to insert into table'),
(12, 100000, 'This info about city, that i want to insert into table'),
(13, 100000, 'This info about city, that i want to insert into table');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` text NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'Украина'),
(2, 'Россия'),
(3, 'Польша');

-- --------------------------------------------------------

--
-- Структура таблицы `used_languages`
--

CREATE TABLE IF NOT EXISTS `used_languages` (
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `used_language_name` text NOT NULL,
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `used_languages`
--

INSERT INTO `used_languages` (`country_id`, `city_id`, `used_language_name`) VALUES
(1, 1, 'русский'),
(1, 1, 'английский'),
(1, 1, 'украинский'),
(1, 2, 'русский'),
(1, 3, 'украинский'),
(1, 3, 'русский'),
(1, 4, 'украинский'),
(1, 4, 'русский'),
(1, 5, 'русский'),
(2, 5, 'русский'),
(2, 5, 'английский'),
(2, 6, 'русский'),
(2, 7, 'русский'),
(2, 8, 'русский'),
(2, 9, 'русский'),
(3, 10, 'польский'),
(3, 10, 'английский'),
(3, 11, 'польский'),
(3, 12, 'польский'),
(3, 13, 'польский'),
(1, 2, 'украинский'),
(2, 6, 'английский');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `used_languages`
--
ALTER TABLE `used_languages`
  ADD CONSTRAINT `used_languages_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `used_languages_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
