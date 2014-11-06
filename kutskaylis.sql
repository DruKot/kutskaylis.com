-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2014 г., 07:58
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kutskaylis`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vk_comments`
--

CREATE TABLE IF NOT EXISTS `vk_comments` (
  `id` int(24) NOT NULL AUTO_INCREMENT,
  `note_id` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `vk_notes`
--

CREATE TABLE IF NOT EXISTS `vk_notes` (
  `id` int(24) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `vk_notes`
--

INSERT INTO `vk_notes` (`id`, `title`, `body`, `date`) VALUES
(2, 'Записывай все, что приходит в голову!', '<p>Как часто тебе приходят в голову мысли, которые тебе сейчас ни к чему? А как часто бывает, что у тебя есть время и ты не знаешь чем его занять? Выход очивиден! Всегда носи с собой блокнот и записывай туда все и везде, любую, даже самую не нужную на первый взгляд мысль - в блокнот! Некогда писать? Тогда зарисовывай, а если не умеешь, то не переживай, никто, кроме тебя этого не увидит!</p>', '2014-04-08 16:54:47'),
(3, 'Добро пожаловать', '<p>Данный сайт - это в первую очередь моя "рабочая тетрадь". Тут я пробую все свои навыки в программировании, испытываю интересные фичи, записываю нужную мне информацию в виде блога, копирую интересные мне статьи.</p>\r\n<p>Вы можете чувствовать себя тут свободно, можете тыкать, пробовать, ломать.</p>\r\n<p>Весь код есть в открытом доступе <a title="github" href="https://github.com/DruKot/kutskaylis.com.git" target="_blank">тут</a>, все вопросы можете задавать <a title="e-mail" href="mailto:kutskaylis@gmail.com" target="_blank">сюда</a>.</p>\r\n<p>&nbsp;</p>', '2014-04-08 17:03:35');

-- --------------------------------------------------------

--
-- Структура таблицы `vk_tags`
--

CREATE TABLE IF NOT EXISTS `vk_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `vk_tags`
--

INSERT INTO `vk_tags` (`id`, `tag`) VALUES
(1, 'test'),
(2, 'thought'),
(3, 'self-development');

-- --------------------------------------------------------

--
-- Структура таблицы `vk_tags_relations`
--

CREATE TABLE IF NOT EXISTS `vk_tags_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `vk_tags_relations`
--

INSERT INTO `vk_tags_relations` (`id`, `note_id`, `tag_id`) VALUES
(1, 3, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `vk_users`
--

CREATE TABLE IF NOT EXISTS `vk_users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `vk_users`
--

INSERT INTO `vk_users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'ed685eb3a546df3b0527bcdc1815befa', 'kutskaylis@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
