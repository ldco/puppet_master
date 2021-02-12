-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2021 at 09:10 PM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_blog`
--

CREATE TABLE `pm_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_he` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_he` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_blog`
--

INSERT INTO `pm_blog` (`blog_id`, `blog_img`, `name_en`, `name_ru`, `name_he`, `text_en`, `text_ru`, `text_he`, `blog_date`) VALUES
(1, '', '', '', '', '', '', '', '2020-05-31 13:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `pm_catalog`
--

CREATE TABLE `pm_catalog` (
  `ctlg_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `img1` varchar(20) NOT NULL,
  `img2` varchar(20) DEFAULT NULL,
  `img3` varchar(20) DEFAULT NULL,
  `infa` varchar(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `minorder` int(100) DEFAULT NULL,
  `localprice` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_catalog`
--

INSERT INTO `pm_catalog` (`ctlg_id`, `name`, `category`, `subcategory`, `img1`, `img2`, `img3`, `infa`, `price`, `minorder`, `localprice`) VALUES
(1, '', 1, '', '1', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pm_catalog_category`
--

CREATE TABLE `pm_catalog_category` (
  `id` int(11) NOT NULL,
  `cat_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_catalog_category`
--

INSERT INTO `pm_catalog_category` (`id`, `cat_name`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pm_contact`
--

CREATE TABLE `pm_contact` (
  `id` int(11) NOT NULL,
  `text` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_contact`
--

INSERT INTO `pm_contact` (`id`, `text`, `img`, `value`, `link`) VALUES
(13, 28, 'tel', '+tel_number', '+tel_number'),
(14, 124, 'telega', '@tetelgram_id', 'telegram_link'),
(15, 123, 'wa', '+telnumber', 'https://wa.me/telnumber'),
(16, 122, 'fb', 'fb_user', 'fb_link'),
(17, 126, 'insta', 'insta_user', 'insta_link'),
(18, 125, 'mail', 'mail', 'mail');

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
(74, NULL, NULL, 'הנחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(64, NULL, NULL, 'תפריט ראשי', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'about', 'о нас', 'אודותנו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'about', 'о нас', 'עלינו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'age', 'возраст', 'גיל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'age categories', 'возрастные категории', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'agents', 'агенты', 'סוכנים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(156, 'business clients', 'бизнес-клиенты', 'לקוחות עסקיים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'cancel', 'отменить', 'בטל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'catalog', 'каталог', 'קטלוג', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'category', 'категория', 'קטגוריה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'close', 'закрыть', 'סגור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'comments', 'комментарии', 'הערות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'construction', 'стройка', 'בנייה', '', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'contacts', 'контакты', 'צור קשר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'contrast', 'контраст', 'ניגודיות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'custom font', 'шрифт на заказ', 'גופן אישי', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'dark / light theme', 'темная / светлая тема', 'נושא כהה / בהיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'date', 'дата', 'תאריך', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'desktop app', 'десктопное приложение', 'אפליקציית דסקטופ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'disciplines', 'дисциплины', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'enter', 'войти', 'כנס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'error', 'ошибка', 'שגיאה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'events list', 'список чемпионатов', 'רשימת תחרויות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'exit', 'выход', 'יציאה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'facebook', 'фейсбук', 'פייסבוק', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'feedback', 'обратная связь', 'משוב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'font size', 'размер шрифта', 'גודל פונט', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'general question', NULL, 'שאלה כללית', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'highlight links', 'подчеркнуть ссылки', 'הדגשת קישורים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'home', 'на главную', 'בית', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'id', 'номер у.л.', 'מס תז', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'images', 'изображения', 'תמונות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'import caclculator', NULL, 'מחשבון יבוא', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'inetersted in', 'заинтересован в', 'מעוניין ב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'instagram', 'инстаграм', 'אינסטגרם', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'internet', 'интернет', 'אינטרנט', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'judge positions', 'судейские должности', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'judges', 'судьи', 'שופטים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'last name', 'фамилия', 'שם משפחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'logo', 'логотип', 'לוגו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'mail', 'эл. почта', 'דוא\'ל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'mailing', 'рассылка', 'דיוור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'message', 'сообщение', 'הודעה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'min. order', 'мин. заказ', 'מינימום הזמנה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'mobile app', 'мобильное приложение', 'אפליקציית מובייל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'motion graphics', 'моушн дизайн', 'מושן גרפיקס', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'name', 'имя', 'שם', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'negative', 'негатив', 'תשליל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'no', 'нет', 'לא', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'order', 'заказать', 'להזמין', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'page not found', 'страница не найдена', 'הדף לא נמצא', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'pages', 'страницы', 'עמודים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'participants', 'участники', 'משתתפים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'personal clients', 'частные клиенты', 'לקוחות פרטיים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'portfolio', 'работы', 'פורטפוליו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'portfolio', 'работы', 'פורטפוליו', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'position', 'должность', 'תפקיד', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'pre-order', 'предзаказ', 'הצעת מחיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'price', 'цена', 'מחיר', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
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
(127, 'submit', 'отправить', 'שלח', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'team', 'команда', 'צוות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'tel.', 'тел.', 'טל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'telegram', 'телеграм', 'טלגרם', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'texts', 'тексты', 'טקסטים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'the mail has been sent successfully', 'письмо было успешно отправлено', 'הדוא\"ל נשלח בהצלחה', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'there was an error sending mail', 'произошла ошибка при отправке электронной почты', 'אירעה שגיאה בשליחת דואר אלקטרוני', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'to buy', NULL, 'לקנות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'to import', NULL, 'לייבא', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'tournament', 'соревнование', 'תחרות', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'typography', 'типографика', 'גופנים', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'UI design', 'UI-дизайн', 'עיצוב ממשק משתמש', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'UX design', 'UX-дизайн', 'עיצוב חוויית משתמש', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'visit card', 'визитка', 'כרטיס ביקור', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'waze', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'web app', 'интернет приложение', 'אפליקציית ווב', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'web page', 'веб-сайт', 'אתר אינטרטנט', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'weight', 'вес', 'משקל', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'whatsapp', 'ватсап', 'וואטסאפ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'yes', 'да', 'כן', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'агенты', 'agents', 'סוכנים', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_nav`
--

CREATE TABLE `pm_nav` (
  `_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_nav`
--

INSERT INTO `pm_nav` (`_id`, `name`, `img`, `fun`, `link`, `parent`) VALUES
(1, 1, '100', NULL, NULL, NULL),
(2, 95, '30', NULL, NULL, NULL),
(3, 96, '35', NULL, NULL, NULL),
(4, 119, '13', NULL, NULL, NULL),
(5, 120, '43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pm_nav_sub_1`
--

CREATE TABLE `pm_nav_sub_1` (
  `_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_nav_sub_1`
--

INSERT INTO `pm_nav_sub_1` (`_id`, `name`, `img`, `fun`, `link`, `parent`) VALUES
(1, 1, '100', NULL, NULL, 2),
(2, 95, '30', NULL, NULL, 3),
(3, 96, '35', NULL, NULL, 3),
(4, 119, '13', NULL, NULL, 3),
(5, 120, '43', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pm_nav_sub_2`
--

CREATE TABLE `pm_nav_sub_2` (
  `_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_nav_sub_2`
--

INSERT INTO `pm_nav_sub_2` (`_id`, `name`, `img`, `fun`, `link`, `parent`) VALUES
(1, 1, '100', NULL, NULL, 2),
(2, 95, '30', NULL, NULL, 3),
(3, 96, '35', NULL, NULL, 3),
(4, 119, '13', NULL, NULL, 3),
(5, 120, '43', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pm_team`
--

CREATE TABLE `pm_team` (
  `id` int(11) NOT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(10) NOT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_he` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_en` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_ru` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_he` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio_en` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio_ru` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio_he` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pm_team`
--

INSERT INTO `pm_team` (`id`, `img`, `rank`, `name_en`, `name_ru`, `name_he`, `job_en`, `job_ru`, `job_he`, `bio_en`, `bio_ru`, `bio_he`) VALUES
(1, '', 1, '', '', '', '', '', '', '', '', ''),
(2, '', 2, '', '', '', '', '', '', '', '', ''),
(3, '', 3, '', '', '', '', '', '', '', '', '');

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
('1_1', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'ad', '', '$argon2i$v=19$m=65536,t=4,p=1$YXdrWmFjQ2JZQVRmRTBYaQ$QmaMUYBMumh5JqJYXHHy7yilaugBrgIQqpWt1mZ2u6w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_blog`
--
ALTER TABLE `pm_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `pm_catalog`
--
ALTER TABLE `pm_catalog`
  ADD PRIMARY KEY (`ctlg_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `pm_catalog_category`
--
ALTER TABLE `pm_catalog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`cat_name`);

--
-- Indexes for table `pm_contact`
--
ALTER TABLE `pm_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `text` (`text`);

--
-- Indexes for table `pm_loc`
--
ALTER TABLE `pm_loc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `en` (`en`,`ru`,`he`,`fr`,`it`,`de`,`zh`,`ja`,`hi`,`ar`),
  ADD UNIQUE KEY `id` (`id`,`en`,`ru`,`he`,`fr`,`it`,`de`,`zh`,`ja`,`hi`,`ar`);

--
-- Indexes for table `pm_nav`
--
ALTER TABLE `pm_nav`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`_id`);

--
-- Indexes for table `pm_nav_sub_1`
--
ALTER TABLE `pm_nav_sub_1`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`_id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `pm_nav_sub_2`
--
ALTER TABLE `pm_nav_sub_2`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`_id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `parent_2` (`parent`);

--
-- Indexes for table `pm_team`
--
ALTER TABLE `pm_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name_en`),
  ADD KEY `job` (`job_en`),
  ADD KEY `bio` (`bio_en`);

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
-- AUTO_INCREMENT for table `pm_blog`
--
ALTER TABLE `pm_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pm_catalog`
--
ALTER TABLE `pm_catalog`
  MODIFY `ctlg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pm_catalog_category`
--
ALTER TABLE `pm_catalog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pm_contact`
--
ALTER TABLE `pm_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pm_loc`
--
ALTER TABLE `pm_loc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `pm_nav`
--
ALTER TABLE `pm_nav`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pm_nav_sub_1`
--
ALTER TABLE `pm_nav_sub_1`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pm_nav_sub_2`
--
ALTER TABLE `pm_nav_sub_2`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `pm_contact`
--
ALTER TABLE `pm_contact`
  ADD CONSTRAINT `pm_contact_ibfk_1` FOREIGN KEY (`text`) REFERENCES `pm_loc` (`id`);

--
-- Constraints for table `pm_nav`
--
ALTER TABLE `pm_nav`
  ADD CONSTRAINT `pm_nav_ibfk_1` FOREIGN KEY (`name`) REFERENCES `pm_loc` (`id`);

--
-- Constraints for table `pm_nav_sub_1`
--
ALTER TABLE `pm_nav_sub_1`
  ADD CONSTRAINT `pm_nav_sub_1_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pm_nav` (`_id`),
  ADD CONSTRAINT `pm_nav_sub_1_ibfk_2` FOREIGN KEY (`name`) REFERENCES `pm_loc` (`id`);

--
-- Constraints for table `pm_nav_sub_2`
--
ALTER TABLE `pm_nav_sub_2`
  ADD CONSTRAINT `pm_nav_sub_2_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `pm_nav_sub_1` (`_id`),
  ADD CONSTRAINT `pm_nav_sub_2_ibfk_2` FOREIGN KEY (`name`) REFERENCES `pm_loc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
