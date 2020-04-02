-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2020 at 01:47 AM
-- Server version: 10.4.12-MariaDB-1:10.4.12+maria~bionic-log
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f21_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `motion_graphic`
--

CREATE TABLE `motion_graphic` (
  `id` int(30) NOT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motion_graphic`
--

INSERT INTO `motion_graphic` (`id`, `link`) VALUES
(1, 'azelYmlgXUk'),
(2, 'NXN1iyeHNmU'),
(3, '2QkQOFrLbh4'),
(4, 'HS8VYb3eRpA'),
(5, 'YaMvMc0-7KY'),
(6, '3DhSsSkyFwE'),
(7, 'W63rNI3em5Y'),
(8, 'PnPADIoW2N4');

-- --------------------------------------------------------

--
-- Table structure for table `pm_adm_nav`
--

CREATE TABLE `pm_adm_nav` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_adm_nav`
--

INSERT INTO `pm_adm_nav` (`id`, `name`, `img`, `fun`, `link`, `sub`) VALUES
(1, 1, '100', NULL, NULL, NULL),
(2, 90, '36', NULL, NULL, NULL),
(3, 91, '13', NULL, NULL, NULL),
(4, 92, 'gavel', NULL, NULL, NULL),
(5, 93, 'settings', NULL, NULL, NULL),
(6, 6, '37', NULL, NULL, NULL),
(7, 47, '16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_loc`
--

CREATE TABLE `pm_loc` (
  `id` int(11) NOT NULL,
  `en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ru` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `he` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `it` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `de` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ja` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_loc`
--

INSERT INTO `pm_loc` (`id`, `en`, `ru`, `he`, `fr`, `it`, `de`, `zh`, `ja`, `hi`, `ar`) VALUES
(83, NULL, NULL, 'אירעה שגיאה נסה שוב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, NULL, 'איש קשר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, NULL, NULL, 'המייל נשלח בהצלחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, NULL, NULL, 'הנחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, NULL, NULL, 'הערות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, 'העתק', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, NULL, NULL, 'הפעולה עברה בהצלחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, NULL, NULL, 'חשבונית מס הופקה בהצלחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, NULL, 'טלפון נוסף', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, NULL, NULL, 'כמות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, NULL, NULL, 'כתובת', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, NULL, NULL, 'כתובת המייל אינה נכונה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, NULL, NULL, 'לכבוד', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, 'לקוח בשם זה כבר קיים במערכת', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, 'לקוח חדש', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, 'לקוחות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, NULL, NULL, 'לשלוח את המקור ללקוח?', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, 'מבוטל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, NULL, NULL, 'מחיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, 'מחשבון מהיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, NULL, 'מייל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, NULL, NULL, 'מייל זה נשלח ע\'י', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, NULL, 'מס\'', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, NULL, 'מס\' לקוח', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, NULL, 'מס\' עוסק מורשה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, NULL, 'מסמך', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, NULL, NULL, 'מספר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, NULL, 'מע\'מ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, NULL, 'מצב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, NULL, NULL, 'מקור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, 'נא למלא שדות חובה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, 'סה\'כ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, NULL, NULL, 'סה\'כ אחרי הנחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, NULL, 'סה\'כ לתשלום', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, NULL, 'סיסמה שגויה!', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, NULL, NULL, 'סכום', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, NULL, NULL, 'עגל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, NULL, 'על התוכנה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, NULL, NULL, 'פקס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, NULL, NULL, 'פריטים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, 'רשיון תכנה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, 'רשימת לקוחות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, NULL, 'תאריך', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, NULL, NULL, 'תפריט ראשי', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'about', 'о нас', 'עלינו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'age', 'возраст', 'גיל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'age categories', 'возрастные категории', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'alert', 'внимание', 'שים לב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'archvize', '3D визуализации', 'הדמיות אדרכליות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'art', 'арт', 'אומנות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'back', 'назад', 'חזור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'belt', 'пояс', 'חגורה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'belt categories', 'категории поясов', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'birth', 'дата рож.', 'ת.לידה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'blog', 'блог', 'בלוג', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'bolder font', 'жирный шрифт', 'פונט עבה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'branding', 'брендинг', 'מיתוג', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'brightness', 'яркость', 'בהירות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'cancel', 'отменить', 'בטל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'close', 'закрыть', 'סגור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'contacts', 'контакты', 'צור קשר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'contrast', 'контраст', 'ניגודיות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'disciplines', 'дисциплины', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'enter', 'войти', 'כנס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'error', 'ошибка', 'שגיאה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'events list', 'список чемпионатов', 'רשימת תחרויות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'exit', 'выход', 'יציאה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'font size', 'размер шрифта', 'גודל פונט', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'highlight links', 'подчеркнуть ссылки', 'הדגשת קישורים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'home', 'на главную', 'בית', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'id', 'номер у.л.', 'מס תז', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'images', 'изображения', 'תמונות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'internet', 'интернет', 'אינטרנט', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'judge positions', 'судейские должности', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'judges', 'судьи', 'שופטים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'last name', 'фамилия', 'שם משפחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'mailing', 'рассылка', 'דיוור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'message', 'сообщение', 'הודעה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'motion graphics', 'моушн дизайн', 'מושן גרפיקס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'name', 'имя', 'שם', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'negative', 'негатив', 'תשליל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'no', 'нет', 'לא', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'order', 'заказать', 'להזמין', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'pages', 'страницы', 'עמודים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'participants', 'участники', 'משתתפים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'position', 'должность', 'תפקיד', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'pre-order', 'предзаказ', 'הצעת מחיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'print', 'печать', 'הכנה לדפוס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'refresh', 'обновить', 'רענן', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'required field', 'обязательное поле', 'שדה חובה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'required fields', 'обязательные поля', 'שדות חובה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'saturation', 'насыщенность', 'הרויה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'settings', 'настройки', 'הגדרות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'sex', 'пол', 'מין', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'soft', 'софт', 'תוכנה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'statistics', 'статистика', 'סטטיסטיקה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'stop/restart animations', 'стоп/старт анимации', 'עצור/שחזר אנימציה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'styles', 'стили', 'סגנונות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'team', 'команда', 'צוות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'team', 'команда', 'צוות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'tel.', 'тел.', 'טל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'texts', 'тексты', 'טקסטים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'tournament', 'соревнование', 'תחרות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'typography', 'типографика', 'גופנים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'weight', 'вес', 'משקל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'yes', 'да', 'כן', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_pub_nav`
--

CREATE TABLE `pm_pub_nav` (
  `_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_pub_nav`
--

INSERT INTO `pm_pub_nav` (`_id`, `name`, `img`, `fun`, `link`, `sub`) VALUES
(1, 1, '100', NULL, NULL, NULL),
(2, 111, '44', NULL, NULL, NULL),
(3, 112, '38', NULL, NULL, NULL),
(4, 113, '39', NULL, NULL, NULL),
(5, 114, '40', NULL, NULL, NULL),
(6, 115, '41', NULL, NULL, NULL),
(7, 116, 'print', NULL, NULL, NULL),
(8, 117, 'posts', NULL, NULL, NULL),
(9, 118, '42', NULL, NULL, NULL),
(10, 119, '13', NULL, NULL, NULL),
(11, 120, '43', NULL, NULL, NULL),
(12, 96, '30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_team`
--

CREATE TABLE `pm_team` (
  `id` int(11) NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_team`
--

INSERT INTO `pm_team` (`id`, `img`, `rank`, `name`, `job`, `bio`) VALUES
(1, 'louis', 1, '10_1', '10_2', NULL),
(2, 'queen', 2, '10_4', NULL, NULL),
(3, 'king', 2, '10_7', NULL, NULL),
(4, 'joker', 2, '10_10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_text`
--

CREATE TABLE `pm_text` (
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ru` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `he` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `it` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `es` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `de` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zh` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ja` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_text`
--

INSERT INTO `pm_text` (`id`, `en`, `ru`, `he`, `fr`, `it`, `es`, `de`, `zh`, `ja`, `hi`, `ar`) VALUES
('10_1', 'Louis David (Jack of Spades)', 'Луи Давид (Пиковый валет)', 'לואי דוד (נסיף עלה)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10_10', 'Black Joker', 'Черный Джокер', 'ג\'וקר שחור', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10_2', 'B.O.S.S', 'Б.О.С.С', 'ב.ו.ס.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10_4', 'Queen of Clubs', 'Крестовая Дама', 'מלכה תלתן', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10_7', 'King of Diamonds', 'Бубновый Король', 'מלך יהלום', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5_1', 'We provide software solutions for small businesses - web apps, desktop apps, mobile apps.', 'Мы предоставляем программные решения для маленького бизнеса - веб приложения, мобильные и десктопные приложения.', 'אנחנו מספקים פטרונות תוכנה לעסקים קטנים - אפליקציות ווב, מובייל ודסקטופ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6_1', 'We published for you some Hebrew fonts under the', 'Мы опубликовали некоторое количество ивритских шрифтов под лицензией', 'הצאנו לאור מספר גופים חופשיים תחת הרשיון', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6_2', '- you can use them for free also for commercial purposes. To download a font just click on the desired font or download all fonts at once on link at bottom of the page, but first we advise you to try the fonts out in the Gofanarium:', '- вы можете использовать их бесплатно, в том числе для коммерческих целей(в соответствии с условиями лицензии). Чтоб скачать шрифт кликните на картинку с нужным шрифтом. Можно также скачать все шрифты одним архивом по ссылке внизу страницы. Для начала мы предлагаем воспользоваться программой для проверки шрифтов Гофанариумом:', 'אתם מוזמנים להשתמש בהם, הם חופשיים גם לשימוש מסחרי. כדי להוריד את קובץ הגופן פשוט הקליקו על התמונה עם הפונט הרצוי, או תשתמשו בקישור בתחתית הדף כדי להוריד את כל הפונטים ביחד בקובץ ארכיון. לפני ההורדה אתם מוזמנים להיכנס למערכת לבדיקת הפונטים - הגופנריום:', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6_3', 'Download all fonts in archive', 'Скачать все шрифты одним архивом', 'להוריד את כל הגופנים בארכיון', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password_hash` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password_hash`) VALUES
(1, 'ad', 'nikitatut@yandex.ru', '$argon2i$v=19$m=65536,t=4,p=1$YXdrWmFjQ2JZQVRmRTBYaQ$QmaMUYBMumh5JqJYXHHy7yilaugBrgIQqpWt1mZ2u6w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `motion_graphic`
--
ALTER TABLE `motion_graphic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pm_adm_nav`
--
ALTER TABLE `pm_adm_nav`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pm_loc`
--
ALTER TABLE `pm_loc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en` (`en`,`ru`,`he`,`fr`,`it`,`de`,`zh`,`ja`,`hi`,`ar`),
  ADD UNIQUE KEY `id` (`id`,`en`,`ru`,`he`,`fr`,`it`,`de`,`zh`,`ja`,`hi`,`ar`),
  ADD UNIQUE KEY `id_2` (`id`,`en`,`ru`,`he`,`fr`,`it`,`de`,`zh`,`ja`,`hi`,`ar`);

--
-- Indexes for table `pm_pub_nav`
--
ALTER TABLE `pm_pub_nav`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`_id`);

--
-- Indexes for table `pm_team`
--
ALTER TABLE `pm_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `job` (`job`),
  ADD KEY `bio` (`bio`);

--
-- Indexes for table `pm_text`
--
ALTER TABLE `pm_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motion_graphic`
--
ALTER TABLE `motion_graphic`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pm_adm_nav`
--
ALTER TABLE `pm_adm_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pm_loc`
--
ALTER TABLE `pm_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `pm_pub_nav`
--
ALTER TABLE `pm_pub_nav`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pm_team`
--
ALTER TABLE `pm_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pm_adm_nav`
--
ALTER TABLE `pm_adm_nav`
  ADD CONSTRAINT `pm_adm_nav_ibfk_1` FOREIGN KEY (`name`) REFERENCES `pm_loc` (`id`);

--
-- Constraints for table `pm_pub_nav`
--
ALTER TABLE `pm_pub_nav`
  ADD CONSTRAINT `pm_pub_nav_ibfk_1` FOREIGN KEY (`name`) REFERENCES `pm_loc` (`id`);

--
-- Constraints for table `pm_team`
--
ALTER TABLE `pm_team`
  ADD CONSTRAINT `pm_team_ibfk_1` FOREIGN KEY (`name`) REFERENCES `pm_text` (`id`),
  ADD CONSTRAINT `pm_team_ibfk_2` FOREIGN KEY (`job`) REFERENCES `pm_text` (`id`),
  ADD CONSTRAINT `pm_team_ibfk_3` FOREIGN KEY (`bio`) REFERENCES `pm_text` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
