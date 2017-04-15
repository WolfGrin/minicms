-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2017 г., 23:16
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `minicms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(3) unsigned NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'Ford'),
(2, 'Opel'),
(3, 'Mazda'),
(4, 'Fiat'),
(6, 'asd');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` tinyint(3) unsigned NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `text_menu` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name_menu`, `text_menu`) VALUES
(1, 'О нас', 'Сайт посвящен навтомобилям'),
(2, 'Интересно', '<p>Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime, mollitia optio placeat praesentium quisquam quod rem reprehenderit saepe\r\n                temporibus tenetur vel? Atque beatae corporis dicta doloribus ducimus eaque enim error est\r\n                exercitationem explicabo facilis fugit hic illum incidunt inventore ipsa ipsam iure labore, magnam nobis\r\n                obcaecati placeat quae rem reprehenderit, sunt tempora velit voluptatibus? Animi debitis ducimus laborum\r\n                modi nesciunt quae quos unde veniam! Assumenda consequatur consequuntur fugit placeat sapiente! At\r\n                dolore maiores qui soluta. Ad asperiores, dicta dolorem doloremque eveniet fugit impedit ipsam\r\n                laboriosam nemo provident qui quia, quis quisquam ratione rem vero?</p>\r\n            <p>Asperiores eveniet labore mollitia, necessitatibus nemo nihil recusandae rem totam veritatis. Commodi\r\n                deserunt earum incidunt maiores modi, nam perferendis quae vel voluptate voluptates. Dolorem fugiat\r\n                officia possimus voluptates! Aliquam aspernatur assumenda aut, autem, cumque debitis distinctio ea eos\r\n                esse expedita illum ipsam mollitia nesciunt non numquam odio rem repellendus saepe sequi sint tempore\r\n                voluptatem voluptates! Adipisci ea iste iure laboriosam laborum modi mollitia, rem reprehenderit\r\n                sapiente vel. Asperiores corporis dignissimos earum eius ipsam nesciunt non nulla officia omnis\r\n                perferendis, quam quia repellat sit temporibus tenetur. Aliquid animi atque, autem blanditiis deserunt,\r\n                eius explicabo impedit ipsam, laudantium modi ratione similique sunt.</p>'),
(3, 'Реклама', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium blanditiis consectetur dolore\r\n                error est exercitationem illo illum incidunt, iste laborum necessitatibus nesciunt non odit pariatur\r\n                placeat porro quae quam qui sequi similique vero voluptate voluptates. Culpa delectus dignissimos\r\n                ducimus ea enim ipsum provident qui repellat, sequi voluptatum. A accusamus consequuntur deserunt\r\n                dolorum eaque, earum excepturi, exercitationem fugit iste laudantium maiores nisi non provident repellat\r\n                totam unde, vero voluptas. Delectus et eum quidem tenetur, ullam ut voluptas? Amet assumenda\r\n                consequuntur deleniti dicta doloremque doloribus ducimus ea esse, et expedita impedit, maxime nesciunt\r\n                nihil nisi praesentium quae qui quia repellendus similique.</p>'),
(4, 'Контакты', 'Различная контактная информация');

-- --------------------------------------------------------

--
-- Структура таблицы `statti`
--

CREATE TABLE IF NOT EXISTS `statti` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `cat` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statti`
--

INSERT INTO `statti` (`id`, `title`, `description`, `text`, `date`, `img_src`, `cat`) VALUES
(1, 'История развития Ford GT', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium blanditiis consectetur dolore', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium blanditiis consectetur dolore\r\n                error est exercitationem illo illum incidunt, iste laborum necessitatibus nesciunt non odit pariatur\r\n                placeat porro quae quam qui sequi similique vero voluptate voluptates. Culpa delectus dignissimos\r\n                ducimus ea enim ipsum provident qui repellat, sequi voluptatum. A accusamus consequuntur deserunt\r\n                dolorum eaque, earum excepturi, exercitationem fugit iste laudantium maiores nisi non provident repellat\r\n                totam unde, vero voluptas. Delectus et eum quidem tenetur, ullam ut voluptas? Amet assumenda\r\n                consequuntur deleniti dicta doloremque doloribus ducimus ea esse, et expedita impedit, maxime nesciunt\r\n                nihil nisi praesentium quae qui quia repellendus similique.</p>', '2017-04-15', '', 1),
(2, 'Ford и его достоинства', 'Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime, mollitia optio placeat praesentium quisquam quod rem reprehenderit saepe\r\n                temporibus tenetur vel', '<p>Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime, mollitia optio placeat praesentium quisquam quod rem reprehenderit saepe\r\n                temporibus tenetur vel? Atque beatae corporis dicta doloribus ducimus eaque enim error est\r\n                exercitationem explicabo facilis fugit hic illum incidunt inventore ipsa ipsam iure labore, magnam nobis\r\n                obcaecati placeat quae rem reprehenderit, sunt tempora velit voluptatibus? Animi debitis ducimus laborum\r\n                modi nesciunt quae quos unde veniam! Assumenda consequatur consequuntur fugit placeat sapiente! At\r\n                dolore maiores qui soluta. Ad asperiores, dicta dolorem doloremque eveniet fugit impedit ipsam\r\n                laboriosam nemo provident qui quia, quis quisquam ratione rem vero?</p>', '2017-03-14', 'images/ford2.jpg', 1),
(3, 'История OPEL', 'Asperiores eveniet labore mollitia, necessitatibus nemo nihil recusandae rem totam veritatis.', '<p>Asperiores eveniet labore mollitia, necessitatibus nemo nihil recusandae rem totam veritatis. Commodi\r\n                deserunt earum incidunt maiores modi, nam perferendis quae vel voluptate voluptates. Dolorem fugiat\r\n                officia possimus voluptates! Aliquam aspernatur assumenda aut, autem, cumque debitis distinctio ea eos\r\n                esse expedita illum ipsam mollitia nesciunt non numquam odio rem repellendus saepe sequi sint tempore\r\n                voluptatem voluptates! Adipisci ea iste iure laboriosam laborum modi mollitia, rem reprehenderit\r\n                sapiente vel. Asperiores corporis dignissimos earum eius ipsam nesciunt non nulla officia omnis\r\n                perferendis, quam quia repellat sit temporibus tenetur. Aliquid animi atque, autem blanditiis deserunt,\r\n                eius explicabo impedit ipsam, laudantium modi ratione similique sunt.</p>', '2017-03-01', 'images/opel.jpg', 2),
(4, 'Достоинства Opel', 'Ab accusamus, adipisci amet animi aperiam atque consequuntur corporis dignissimos enim eum facilis fuga\r\n                fugiat id iure laudantium molestias nisi omnis porro, quaerat quia, quis quo repellendus sed soluta ut.', '<p>Ab accusamus, adipisci amet animi aperiam atque consequuntur corporis dignissimos enim eum facilis fuga\r\n                fugiat id iure laudantium molestias nisi omnis porro, quaerat quia, quis quo repellendus sed soluta ut.\r\n                Ab, alias aspernatur, aut consequuntur, dicta dolorem esse est fuga incidunt ipsa iste labore libero\r\n                minus mollitia neque nisi non numquam obcaecati provident quasi recusandae repellat repellendus soluta\r\n                veniam voluptates? Aliquam amet animi aut culpa cupiditate dicta dolorem esse et, expedita explicabo\r\n                ipsam laborum nam, quae quaerat quas quibusdam reiciendis saepe sunt vitae voluptas. Consectetur\r\n                distinctio exercitationem harum incidunt inventore, magnam nesciunt omnis quam quod quos repellat,\r\n                reprehenderit soluta, veritatis!</p>', '2017-03-02', 'images/opel2.jpg', 2),
(5, 'Поговорим о Mazda', 'Ducimus, enim esse est ex modi officia porro recusandae sequi. Adipisci delectus eius, eligendi expedita\r\n                iure labore maiores non pariatur perferendis sed, tempore voluptates.', '<p>Ducimus, enim esse est ex modi officia porro recusandae sequi. Adipisci delectus eius, eligendi expedita\r\n                iure labore maiores non pariatur perferendis sed, tempore voluptates. Eos esse nesciunt optio\r\n                perspiciatis qui quod vero. Ad ducimus eos impedit obcaecati officiis praesentium quos recusandae sint\r\n                veniam voluptas? Amet atque beatae corporis cumque doloremque eaque et expedita fugiat hic id illum\r\n                impedit ipsa iste iure, maxime necessitatibus nisi nulla quis sapiente soluta! Adipisci aliquid autem\r\n                beatae commodi delectus distinctio ea eius eligendi, eveniet fugit hic illo laborum libero magni, modi\r\n                molestias mollitia nemo obcaecati, odio praesentium quaerat quam quod saepe totam veniam vitae\r\n                voluptas?</p>', '2017-02-14', 'images/mazda.jpg', 3),
(6, 'И снова о Mazda', 'Animi aperiam autem deleniti dolore eveniet nisi officiis quasi rerum? Cum deserunt exercitationem\r\n                laborum nisi qui quidem reprehenderit.', '<p>Animi aperiam autem deleniti dolore eveniet nisi officiis quasi rerum? Cum deserunt exercitationem\r\n                laborum nisi qui quidem reprehenderit. Facilis iure provident quibusdam quos repellat repellendus,\r\n                tempora ut? Cum dolorem dolorum laboriosam, nesciunt perspiciatis sint totam? Nihil, quae, quas.\r\n                Adipisci aspernatur dicta dolor dolorum eligendi, ex facilis, nostrum, omnis perferendis provident\r\n                quidem sed similique velit. Dolores et explicabo fugiat minima nisi reiciendis veniam. Ab accusamus\r\n                amet, corporis deserunt dolor error id impedit maxime obcaecati quod, rem sunt unde voluptas. Autem\r\n                consequatur eos esse impedit incidunt ipsa nihil odio ullam vero voluptates! Alias cum dolores neque\r\n                placeat quas quia suscipit tempora, totam.</p>', '2017-02-14', 'images/mazda2.jpg', 3),
(7, 'Что нового у Fiat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium blanditiis consectetur dolore\r\n                error est exercitationem illo illum incidunt, iste laborum necessitatibus nesciunt non odit pariatur\r\n                placeat porro quae quam qui sequi similique vero voluptate voluptates. Culpa delectus dignissimos\r\n                ducimus ea enim ipsum provident qui repellat, sequi voluptatum. A accusamus consequuntur deserunt\r\n                dolorum eaque, earum excepturi, exercitationem fugit iste laudantium maiores nisi non provident repellat\r\n                totam unde, vero voluptas. Delectus et eum quidem tenetur, ullam ut voluptas? Amet assumenda\r\n                consequuntur deleniti dicta doloremque doloribus ducimus ea esse, et expedita impedit, maxime nesciunt\r\n                nihil nisi praesentium quae qui quia repellendus similique.</p>', '2017-03-01', 'images/fiat.jpg', 4),
(8, 'Fiat и все о нем!', 'Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime', '<p>Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime, mollitia optio placeat praesentium quisquam quod rem reprehenderit saepe\r\n                temporibus tenetur vel? Atque beatae corporis dicta doloribus ducimus eaque enim error est\r\n                exercitationem explicabo facilis fugit hic illum incidunt inventore ipsa ipsam iure labore, magnam nobis\r\n                obcaecati placeat quae rem reprehenderit, sunt tempora velit voluptatibus? Animi debitis ducimus laborum\r\n                modi nesciunt quae quos unde veniam! Assumenda consequatur consequuntur fugit placeat sapiente! At\r\n                dolore maiores qui soluta. Ad asperiores, dicta dolorem doloremque eveniet fugit impedit ipsam\r\n                laboriosam nemo provident qui quia, quis quisquam ratione rem vero?</p>', '2017-03-02', 'images/fiat2.jpg', 4),
(9, 'Title', 'Asd', 'DSADASD', '2017-04-11', 'file/b7fe842248190534816afa7c8fd90e34.jpg', 1),
(10, 'Title', 'ADqwe', '123123', '2017-04-11', 'file/20232547.jpg', 1),
(11, 'Title', 'asda', 'dasd', '2017-04-11', 'file/20232547.jpg', 1),
(12, 'asd', 'TQTQTQT', 'zxczxczxc', '2017-04-15', '', 6),
(13, 'Fiat и все о нем!', 'Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime', '<p>Adipisci alias assumenda cumque dicta distinctio dolor doloremque excepturi exercitationem harum ipsum\r\n                labore laboriosam maxime, mollitia optio placeat praesentium quisquam quod rem reprehenderit saepe\r\n                temporibus tenetur vel? Atque beatae corporis dicta doloribus ducimus eaque enim error est\r\n                exercitationem explicabo facilis fugit hic illum incidunt inventore ipsa ipsam iure labore, magnam nobis\r\n                obcaecati placeat quae rem reprehenderit, sunt tempora velit voluptatibus? Animi debitis ducimus laborum\r\n                modi nesciunt quae quos unde veniam! Assumenda consequatur consequuntur fugit placeat sapiente! At\r\n                dolore maiores qui soluta. Ad asperiores, dicta dolorem doloremque eveniet fugit impedit ipsam\r\n                laboriosam nemo provident qui quia, quis quisquam ratione rem vero?</p>', '2017-04-12', '', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statti`
--
ALTER TABLE `statti`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `statti`
--
ALTER TABLE `statti`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
