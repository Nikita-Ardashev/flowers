-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 14 2024 г., 00:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `flowers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flower_description`
--

CREATE TABLE `flower_description` (
  `id` int UNSIGNED NOT NULL,
  `flower_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `flower_description`
--

INSERT INTO `flower_description` (`id`, `flower_id`, `name`, `count`) VALUES
(3, 5, 'Розы', 50),
(4, 5, 'Тюльпаны', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cost` int NOT NULL,
  `discount` int DEFAULT NULL,
  `img` longtext COLLATE utf8mb4_general_ci,
  `type` enum('birthday','mothersDay','MarchDay','roses','gypsophila','pions','hydrangeas','tulips','upTo1500','upTo3000','postcards','heliumBaloons','candies','bouquetsBoxes','pottedFlower','boxesAndBaskets') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `cost`, `discount`, `img`, `type`) VALUES
(4, 'test1', 2500, 10, 'data:image/png;base64,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', 'birthday'),
(5, 'not Discount1', 1000, NULL, NULL, 'MarchDay'),
(6, 'not Discount2', 1000, NULL, NULL, 'birthday'),
(7, 'test2', 2500, 10, 'data:image/png;base64,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', 'birthday'),
(8, 'test3', 2500, 10, 'data:image/png;base64,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', 'birthday'),
(9, 'test4', 2500, 10, 'data:image/png;base64,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', 'birthday');

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `item_id` int UNSIGNED NOT NULL,
  `count` int NOT NULL,
  `type` enum('В работе','В ожидании','Выполнен') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'В ожидании',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `item_id`, `count`, `type`, `created_at`) VALUES
(57, 1, 4, 1, 'В ожидании', '2024-04-13 19:45:32'),
(58, 1, 7, 1, 'В работе', '2024-04-12 19:45:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `is_admin`) VALUES
(1, 'nikitos2525halk@gmail.com', '123', '+79128731399', 1),
(10, 'nikitos2521halk@gmail.com', '123', '+79128731399', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `flower_description`
--
ALTER TABLE `flower_description`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `index` (`flower_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `flower_description`
--
ALTER TABLE `flower_description`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `flower_description`
--
ALTER TABLE `flower_description`
  ADD CONSTRAINT `flower_description_ibfk_1` FOREIGN KEY (`flower_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
