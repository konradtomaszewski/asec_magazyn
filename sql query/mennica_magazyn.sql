-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Paź 2016, 16:03
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mennica_magazyn`
--
CREATE DATABASE IF NOT EXISTS `mennica_magazyn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mennica_magazyn`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `arrival_items`
--

CREATE TABLE `arrival_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `arrival_type_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `arrival_items`
--

INSERT INTO `arrival_items` (`id`, `product_id`, `quantity`, `arrival_id`, `arrival_type_id`, `storage_id`) VALUES
(1, 1, 14, 1, 1, 2),
(2, 2, 1, 1, 1, 2),
(3, 3, 2, 1, 1, 2),
(4, 4, 15, 1, 1, 2),
(5, 5, 2, 1, 1, 2),
(6, 7, 13, 1, 1, 2),
(7, 8, 6, 1, 1, 2),
(8, 9, 5, 1, 1, 2),
(9, 10, 5, 1, 1, 2),
(10, 11, 5, 1, 1, 2),
(11, 12, 2, 1, 1, 2),
(12, 13, 4, 1, 1, 2),
(13, 14, 18, 1, 1, 2),
(14, 16, 5, 1, 1, 2),
(15, 17, 5, 1, 1, 2),
(16, 18, 13, 1, 1, 2),
(17, 19, 1, 1, 1, 2),
(18, 21, 1, 1, 1, 2),
(19, 22, 19, 1, 1, 2),
(20, 24, 3, 1, 1, 2),
(21, 25, 6, 1, 1, 2),
(22, 26, 10, 1, 1, 2),
(23, 27, 43, 1, 1, 2),
(24, 28, 10, 1, 1, 2),
(25, 29, 1, 1, 1, 2),
(26, 30, 3, 1, 1, 2),
(27, 31, 7, 1, 1, 2),
(28, 32, 1, 1, 1, 2),
(29, 33, 9, 1, 1, 2),
(30, 34, 12, 1, 1, 2),
(31, 35, 11, 1, 1, 2),
(32, 36, 13, 1, 1, 2),
(33, 37, 7, 1, 1, 2),
(34, 39, 7, 1, 1, 2),
(35, 40, 10, 1, 1, 2),
(36, 41, 9, 1, 1, 2),
(37, 42, 30, 1, 1, 2),
(38, 43, 5, 1, 1, 2),
(39, 44, 13, 1, 1, 2),
(40, 61, 19, 1, 1, 2),
(41, 78, 2, 1, 1, 2),
(42, 7, -1, 2, 2, 2),
(43, 7, -1, 3, 2, 2),
(44, 7, -1, 4, 2, 2),
(45, 25, -1, 4, 2, 2),
(46, 45, 1, 5, 1, 2),
(47, 49, 2, 5, 1, 2),
(48, 52, 5, 5, 1, 2),
(49, 55, 1, 5, 1, 2),
(50, 58, 38, 5, 1, 2),
(51, 64, 13, 5, 1, 2),
(52, 65, 18, 5, 1, 2),
(53, 66, 23, 5, 1, 2),
(54, 67, 42, 5, 1, 2),
(55, 68, 7, 5, 1, 2),
(56, 69, 31, 5, 1, 2),
(57, 73, 121, 5, 1, 2),
(58, 74, 28, 5, 1, 2),
(59, 75, 40, 5, 1, 2),
(60, 76, 12, 5, 1, 2),
(61, 77, 4, 5, 1, 2),
(62, 79, 3, 5, 1, 2),
(63, 80, 2, 5, 1, 2),
(64, 81, 2, 5, 1, 2),
(65, 82, 4, 5, 1, 2),
(66, 83, 2, 5, 1, 2),
(67, 84, 1, 5, 1, 2),
(68, 85, 2, 5, 1, 2),
(69, 86, 1, 5, 1, 2),
(70, 87, 1, 5, 1, 2),
(71, 88, 3, 5, 1, 2),
(72, 89, 2, 5, 1, 2),
(73, 90, 16, 5, 1, 2),
(74, 91, 10, 5, 1, 2),
(75, 92, 19, 5, 1, 2),
(76, 93, 4, 5, 1, 2),
(77, 94, 2, 5, 1, 2),
(78, 95, 2, 5, 1, 2),
(79, 96, 2, 5, 1, 2),
(80, 97, 2, 5, 1, 2),
(81, 105, 5, 5, 1, 2),
(82, 106, 2, 5, 1, 2),
(83, 108, 5, 5, 1, 2),
(84, 109, 1, 5, 1, 2),
(85, 110, 2, 5, 1, 2),
(86, 111, 1, 5, 1, 2),
(87, 113, 5, 5, 1, 2),
(88, 114, 2, 5, 1, 2),
(89, 115, 7, 5, 1, 2),
(90, 116, 10, 5, 1, 2),
(91, 117, 20, 5, 1, 2),
(92, 118, 6, 5, 1, 2),
(93, 119, 7, 5, 1, 2),
(94, 120, 46, 5, 1, 2),
(95, 121, 4, 5, 1, 2),
(96, 122, 28, 5, 1, 2),
(97, 123, 8, 5, 1, 2),
(98, 124, 2, 5, 1, 2),
(99, 125, 1, 5, 1, 2),
(100, 7, 1, 7, 3, 2),
(101, 25, 1, 7, 3, 2),
(102, 30, -1, 8, 2, 2),
(103, 46, 4, 9, 1, 2),
(104, 50, 3, 9, 1, 2),
(105, 51, 5, 9, 1, 2),
(106, 63, 55, 9, 1, 2),
(107, 90, 16, 9, 1, 2),
(108, 99, 5, 9, 1, 2),
(109, 100, 5, 9, 1, 2),
(110, 101, 7, 9, 1, 2),
(111, 102, 2, 9, 1, 2),
(112, 103, 2, 9, 1, 2),
(113, 104, 3, 9, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `arrival_products_temp`
--

CREATE TABLE `arrival_products_temp` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE latin2_bin NOT NULL,
  `item_sn` varchar(20) COLLATE latin2_bin NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_product_id` int(11) NOT NULL,
  `document_name` varchar(20) COLLATE latin2_bin NOT NULL,
  `storage_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `arrival_products_temp`
--

INSERT INTO `arrival_products_temp` (`id`, `item_name`, `item_sn`, `item_quantity`, `item_product_id`, `document_name`, `storage_id`, `create_user_id`, `create_date`) VALUES
(1, 'zasilacz', '', 2, 43, 'WRO/N/4/2016', 2, 1, '2016-10-05 11:48:32'),
(2, 'Płyta ZASILACZ-MAIN DO BS201', '', 2, 54, 'WRO/N/5/2016', 2, 1, '2016-10-05 11:48:45'),
(3, 'Artema (mobilna)', '', 2, 4, 'WRO/N/6/2016', 2, 1, '2016-10-05 11:51:19'),
(4, 'CM 0,1 zł', '', 1, 8, 'WRO/N/7/2016', 2, 1, '2016-10-05 11:51:30'),
(5, 'przejściówka do modemu', '', 2, 36, 'WRO/N/8/2016', 2, 1, '2016-10-05 11:51:43'),
(6, 'zasilacz', '', 1, 43, 'WRO/N/9/2016', 2, 1, '2016-10-05 11:51:55'),
(7, 'karta flash', '', 2, 22, 'WRO/N/10/2016', 2, 1, '2016-10-05 11:52:07'),
(8, 'kabel ZASILACZ - MAIN (4 żyły)', '', 4, 64, 'WRO/N/11/2016', 2, 1, '2016-10-05 11:52:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `arrival_types`
--

CREATE TABLE `arrival_types` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL,
  `prefix` varchar(3) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `arrival_types`
--

INSERT INTO `arrival_types` (`id`, `name`, `prefix`) VALUES
(1, 'Dostawa', 'N'),
(2, 'Transfer wydany', 'WYD'),
(3, 'Zwrot na magazyn', 'Z'),
(4, 'Transfer wewnętrzny', 'WEW'),
(5, 'Odesłano do serwisu', 'U'),
(6, 'Przyjęto w serwisie', 'S');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `arrivals`
--

CREATE TABLE `arrivals` (
  `id` int(11) NOT NULL,
  `arrival_type_id` int(11) NOT NULL,
  `document_name` varchar(255) COLLATE latin2_bin NOT NULL,
  `storage_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `accept_user_id` int(11) DEFAULT NULL,
  `release_user_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `accept_date` datetime NOT NULL,
  `release_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `arrivals`
--

INSERT INTO `arrivals` (`id`, `arrival_type_id`, `document_name`, `storage_id`, `create_user_id`, `accept_user_id`, `release_user_id`, `create_date`, `accept_date`, `release_date`) VALUES
(1, 1, 'WRO/N/1/2016', 2, 18, 15, NULL, '2016-10-03 11:25:33', '2016-10-03 11:29:15', '0000-00-00 00:00:00'),
(2, 2, 'WRO/WYD/1/2016', 2, 15, NULL, 14, '2016-10-03 11:33:17', '0000-00-00 00:00:00', '2016-10-03 11:33:17'),
(3, 2, 'WRO/WYD/2/2016', 2, 15, NULL, 8, '2016-10-04 11:37:50', '0000-00-00 00:00:00', '2016-10-04 11:37:50'),
(4, 2, 'WRO/WYD/3/2016', 2, 15, NULL, 10, '2016-10-04 11:38:41', '0000-00-00 00:00:00', '2016-10-04 11:38:41'),
(5, 1, 'WRO/N/2/2016', 2, 18, 15, NULL, '2016-10-04 11:13:21', '2016-10-04 12:04:48', '0000-00-00 00:00:00'),
(6, 666, 'Błąd', 2, 15, 15, NULL, '2016-10-04 14:56:53', '2016-10-04 14:56:53', '0000-00-00 00:00:00'),
(7, 3, 'WRO/Z/1/2016', 2, 15, 15, NULL, '2016-10-04 14:57:48', '2016-10-04 14:57:48', '0000-00-00 00:00:00'),
(8, 2, 'WRO/WYD/4/2016', 2, 15, NULL, 10, '2016-10-04 14:58:30', '0000-00-00 00:00:00', '2016-10-04 14:58:30'),
(9, 1, 'WRO/N/3/2016', 2, 18, 15, NULL, '2016-10-04 11:32:29', '2016-10-05 10:58:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `automat_type`
--

CREATE TABLE `automat_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `automat_type`
--

INSERT INTO `automat_type` (`id`, `name`) VALUES
(1, 'stacjonarny - SB'),
(2, 'mobilny - BM 101'),
(3, 'stacjonarny - BS 201');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `broken_arrival_items`
--

CREATE TABLE `broken_arrival_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `arrival_type_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `broken_product_details`
--

CREATE TABLE `broken_product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sn` varchar(255) COLLATE latin2_bin NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `product_status_id` int(11) NOT NULL,
  `product_status_change_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `damaged_devices`
--

CREATE TABLE `damaged_devices` (
  `id` int(11) NOT NULL,
  `arrival_id` int(11) DEFAULT NULL,
  `service_request_id` int(11) NOT NULL,
  `service_user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sn` varchar(255) COLLATE latin2_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `damaged_devices_status_id` int(11) NOT NULL,
  `change_status_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `damaged_devices`
--

INSERT INTO `damaged_devices` (`id`, `arrival_id`, `service_request_id`, `service_user_id`, `product_id`, `sn`, `quantity`, `storage_id`, `damaged_devices_status_id`, `change_status_datetime`) VALUES
(1, NULL, 2, 14, 7, '', 1, 2, 0, '2016-10-03 13:15:07'),
(2, NULL, 11, 10, 30, '', 1, 2, 0, '2016-10-04 14:59:53'),
(3, NULL, 12, 8, 7, '', 1, 2, 0, '2016-10-04 15:19:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `damaged_devices_status`
--

CREATE TABLE `damaged_devices_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `damaged_devices_status`
--

INSERT INTO `damaged_devices_status` (`id`, `name`) VALUES
(1, 'Uszkodzone'),
(2, 'Działające'),
(3, 'Na magazynie'),
(4, 'Odesłano do serwisu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sn` varchar(255) COLLATE latin2_bin NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `product_status_id` int(11) NOT NULL,
  `product_status_change_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `sn`, `arrival_id`, `storage_id`, `product_status_id`, `product_status_change_datetime`) VALUES
(1, 1, '', 1, 2, 1, '2016-10-03 11:29:15'),
(2, 2, '', 1, 2, 1, '2016-10-03 11:29:15'),
(3, 3, '', 1, 2, 1, '2016-10-03 11:29:15'),
(4, 4, '', 1, 2, 1, '2016-10-03 11:29:15'),
(5, 5, '', 1, 2, 1, '2016-10-03 11:29:15'),
(6, 7, '', 1, 2, 1, '2016-10-03 11:29:16'),
(7, 8, '', 1, 2, 1, '2016-10-03 11:29:16'),
(8, 9, '', 1, 2, 1, '2016-10-03 11:29:16'),
(9, 10, '', 1, 2, 1, '2016-10-03 11:29:16'),
(10, 11, '', 1, 2, 1, '2016-10-03 11:29:16'),
(11, 12, '', 1, 2, 1, '2016-10-03 11:29:16'),
(12, 13, '', 1, 2, 1, '2016-10-03 11:29:16'),
(13, 14, '', 1, 2, 1, '2016-10-03 11:29:16'),
(14, 17, '', 1, 2, 1, '2016-10-03 11:29:16'),
(15, 18, '', 1, 2, 1, '2016-10-03 11:29:16'),
(16, 19, '', 1, 2, 1, '2016-10-03 11:29:16'),
(17, 21, '', 1, 2, 1, '2016-10-03 11:29:16'),
(18, 22, '', 1, 2, 1, '2016-10-03 11:29:16'),
(19, 24, '', 1, 2, 1, '2016-10-03 11:29:16'),
(20, 25, '', 1, 2, 1, '2016-10-03 11:29:17'),
(21, 26, '', 1, 2, 1, '2016-10-03 11:29:17'),
(22, 27, '', 1, 2, 1, '2016-10-03 11:29:17'),
(23, 28, '', 1, 2, 1, '2016-10-03 11:29:17'),
(24, 29, '', 1, 2, 1, '2016-10-03 11:29:17'),
(25, 30, '', 1, 2, 1, '2016-10-03 11:29:17'),
(26, 31, '', 1, 2, 1, '2016-10-03 11:29:17'),
(27, 32, '', 1, 2, 1, '2016-10-03 11:29:17'),
(28, 33, '', 1, 2, 1, '2016-10-03 11:29:17'),
(29, 34, '', 1, 2, 1, '2016-10-03 11:29:17'),
(30, 35, '', 1, 2, 1, '2016-10-03 11:29:17'),
(31, 36, '', 1, 2, 1, '2016-10-03 11:29:17'),
(32, 37, '', 1, 2, 1, '2016-10-03 11:29:17'),
(33, 39, '', 1, 2, 1, '2016-10-03 11:29:18'),
(34, 40, '', 1, 2, 1, '2016-10-03 11:29:18'),
(35, 78, '', 1, 2, 1, '2016-10-03 11:29:18'),
(36, 41, '', 1, 2, 1, '2016-10-03 11:29:18'),
(37, 42, '', 1, 2, 1, '2016-10-03 11:29:18'),
(38, 43, '', 1, 2, 1, '2016-10-03 11:29:18'),
(39, 44, '', 1, 2, 1, '2016-10-03 11:29:18'),
(40, 14, '', 1, 2, 1, '2016-10-03 11:29:18'),
(41, 7, '', 1, 2, 1, '2016-10-03 11:29:18'),
(42, 44, '', 1, 2, 1, '2016-10-03 11:29:18'),
(43, 14, '', 1, 2, 1, '2016-10-03 11:29:18'),
(44, 61, '', 1, 2, 1, '2016-10-03 11:29:18'),
(45, 31, '', 1, 2, 1, '2016-10-03 11:29:18'),
(46, 18, '', 1, 2, 1, '2016-10-03 11:29:18'),
(47, 16, '', 1, 2, 1, '2016-10-03 11:29:19'),
(48, 43, '', 1, 2, 1, '2016-10-03 11:29:19'),
(49, 13, '', 1, 2, 1, '2016-10-03 11:29:19'),
(50, 12, '', 1, 2, 1, '2016-10-03 11:29:19'),
(51, 17, '', 1, 2, 1, '2016-10-03 11:29:19'),
(52, 30, '', 1, 2, 1, '2016-10-03 11:29:19'),
(53, 7, '', 2, 2, 2, '2016-10-03 11:33:17'),
(54, 7, '', 3, 2, 2, '2016-10-04 11:37:50'),
(55, 7, '', 4, 2, 2, '2016-10-04 11:38:41'),
(56, 25, '', 4, 2, 2, '2016-10-04 11:38:41'),
(57, 58, '', 5, 2, 1, '2016-10-04 12:04:48'),
(58, 79, '', 5, 2, 1, '2016-10-04 12:04:48'),
(59, 80, '', 5, 2, 1, '2016-10-04 12:04:48'),
(60, 81, '', 5, 2, 1, '2016-10-04 12:04:48'),
(61, 82, '', 5, 2, 1, '2016-10-04 12:04:48'),
(62, 83, '', 5, 2, 1, '2016-10-04 12:04:49'),
(63, 84, '', 5, 2, 1, '2016-10-04 12:04:49'),
(64, 85, '', 5, 2, 1, '2016-10-04 12:04:49'),
(65, 86, '', 5, 2, 1, '2016-10-04 12:04:49'),
(66, 87, '', 5, 2, 1, '2016-10-04 12:04:49'),
(67, 88, '', 5, 2, 1, '2016-10-04 12:04:49'),
(68, 89, '', 5, 2, 1, '2016-10-04 12:04:49'),
(69, 90, '', 5, 2, 1, '2016-10-04 12:04:49'),
(70, 91, '', 5, 2, 1, '2016-10-04 12:04:49'),
(71, 52, '', 5, 2, 1, '2016-10-04 12:04:49'),
(72, 92, '', 5, 2, 1, '2016-10-04 12:04:49'),
(73, 45, '', 5, 2, 1, '2016-10-04 12:04:49'),
(74, 65, '', 5, 2, 1, '2016-10-04 12:04:49'),
(75, 93, '', 5, 2, 1, '2016-10-04 12:04:50'),
(76, 94, '', 5, 2, 1, '2016-10-04 12:04:50'),
(77, 95, '', 5, 2, 1, '2016-10-04 12:04:50'),
(78, 49, '', 5, 2, 1, '2016-10-04 12:04:50'),
(79, 96, '', 5, 2, 1, '2016-10-04 12:04:50'),
(80, 97, '', 5, 2, 1, '2016-10-04 12:04:50'),
(81, 90, '', 5, 2, 1, '2016-10-04 12:04:50'),
(82, 99, '', 5, 2, 1, '2016-10-04 12:04:50'),
(83, 100, '', 5, 2, 1, '2016-10-04 12:04:50'),
(84, 101, '', 5, 2, 1, '2016-10-04 12:04:50'),
(85, 50, '', 5, 2, 1, '2016-10-04 12:04:50'),
(86, 46, '', 5, 2, 1, '2016-10-04 12:04:50'),
(87, 51, '', 5, 2, 1, '2016-10-04 12:04:50'),
(88, 102, '', 5, 2, 1, '2016-10-04 12:04:50'),
(89, 103, '', 5, 2, 1, '2016-10-04 12:04:50'),
(90, 63, '', 5, 2, 1, '2016-10-04 12:04:50'),
(91, 104, '', 5, 2, 1, '2016-10-04 12:04:50'),
(92, 74, '', 5, 2, 1, '2016-10-04 12:04:50'),
(93, 125, '', 5, 2, 1, '2016-10-04 12:04:50'),
(94, 105, '', 5, 2, 1, '2016-10-04 12:04:51'),
(95, 67, '', 5, 2, 1, '2016-10-04 12:04:51'),
(96, 106, '', 5, 2, 1, '2016-10-04 12:04:51'),
(97, 69, '', 5, 2, 1, '2016-10-04 12:04:51'),
(98, 76, '', 5, 2, 1, '2016-10-04 12:04:51'),
(99, 68, '', 5, 2, 1, '2016-10-04 12:04:51'),
(100, 108, '', 5, 2, 1, '2016-10-04 12:04:51'),
(101, 109, '', 5, 2, 1, '2016-10-04 12:04:51'),
(102, 55, '', 5, 2, 1, '2016-10-04 12:04:51'),
(103, 110, '', 5, 2, 1, '2016-10-04 12:04:51'),
(104, 111, '', 5, 2, 1, '2016-10-04 12:04:52'),
(105, 74, '', 5, 2, 1, '2016-10-04 12:04:52'),
(106, 113, '', 5, 2, 1, '2016-10-04 12:04:52'),
(107, 73, '', 5, 2, 1, '2016-10-04 12:04:52'),
(108, 66, '', 5, 2, 1, '2016-10-04 12:04:52'),
(109, 114, '', 5, 2, 1, '2016-10-04 12:04:52'),
(110, 75, '', 5, 2, 1, '2016-10-04 12:04:52'),
(111, 77, '', 5, 2, 1, '2016-10-04 12:04:52'),
(112, 115, '', 5, 2, 1, '2016-10-04 12:04:52'),
(113, 64, '', 5, 2, 1, '2016-10-04 12:04:52'),
(114, 116, '', 5, 2, 1, '2016-10-04 12:04:53'),
(115, 117, '', 5, 2, 1, '2016-10-04 12:04:53'),
(116, 118, '', 5, 2, 1, '2016-10-04 12:04:53'),
(117, 119, '', 5, 2, 1, '2016-10-04 12:04:53'),
(118, 120, '', 5, 2, 1, '2016-10-04 12:04:53'),
(119, 121, '', 5, 2, 1, '2016-10-04 12:04:53'),
(120, 122, '', 5, 2, 1, '2016-10-04 12:04:53'),
(121, 123, '', 5, 2, 1, '2016-10-04 12:04:53'),
(122, 124, '', 5, 2, 1, '2016-10-04 12:04:53'),
(123, 7, '', 7, 2, 3, '2016-10-04 14:57:48'),
(124, 25, '', 7, 2, 3, '2016-10-04 14:57:48'),
(125, 30, '', 8, 2, 2, '2016-10-04 14:58:30'),
(126, 51, '', 9, 2, 1, '2016-10-05 10:58:58'),
(127, 63, '', 9, 2, 1, '2016-10-05 10:58:58'),
(128, 99, '', 9, 2, 1, '2016-10-05 10:58:58'),
(129, 100, '', 9, 2, 1, '2016-10-05 10:58:58'),
(130, 90, '', 9, 2, 1, '2016-10-05 10:58:58'),
(131, 101, '', 9, 2, 1, '2016-10-05 10:58:59'),
(132, 50, '', 9, 2, 1, '2016-10-05 10:58:59'),
(133, 104, '', 9, 2, 1, '2016-10-05 10:58:59'),
(134, 102, '', 9, 2, 1, '2016-10-05 10:58:59'),
(135, 46, '', 9, 2, 1, '2016-10-05 10:58:59'),
(136, 103, '', 9, 2, 1, '2016-10-05 10:58:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_status`
--

CREATE TABLE `product_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `product_status`
--

INSERT INTO `product_status` (`id`, `name`) VALUES
(1, 'Zatwierdzono na magazyn'),
(2, 'Wydano z magazynu'),
(3, 'Zwrócono na magazyn'),
(4, 'W serwisie Mennicy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL,
  `automat_type` varchar(255) COLLATE latin2_bin NOT NULL,
  `sn_required` varchar(255) COLLATE latin2_bin NOT NULL,
  `is_active` enum('0','1') COLLATE latin2_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `automat_type`, `sn_required`, `is_active`) VALUES
(1, 'akceptor ( wlot )', 'stacjonarny - SB', '', '1'),
(2, 'antena coin box', 'stacjonarny - SB', '', '1'),
(3, 'antena mifare', 'stacjonarny - SB', '', '1'),
(4, 'Artema (mobilna)', 'mobilny - BM 101', '', '1'),
(5, 'Artema (stacjonarna)', 'stacjonarny - SB', '', '1'),
(6, 'Battery Pack', 'stacjonarny - SB', '', '1'),
(7, 'BNA', 'stacjonarny - SB', '', '1'),
(8, 'CM 0,1 zł', 'stacjonarny - SB', '', '1'),
(9, 'CM 0,2 zł', 'stacjonarny - SB', '', '1'),
(10, 'CM 0,5 zł', 'stacjonarny - SB', '', '1'),
(11, 'CM 1,0 zł', 'stacjonarny - SB', '', '1'),
(12, 'CM 2,0 zł', 'stacjonarny - SB', '', '1'),
(13, 'CM 5,0 zł', 'stacjonarny - SB', '', '1'),
(14, 'CR (manualny)', 'stacjonarny - SB', '', '1'),
(15, 'CR automatyczny', 'stacjonarny - SB', '', '1'),
(16, 'Czujnik zmierzchowy', 'stacjonarny - SB', '', '1'),
(17, 'drukarka (Thino)', 'stacjonarny - SB', '', '1'),
(18, 'HDD', 'stacjonarny - SB', '', '1'),
(19, 'Hopper (0,1)', 'stacjonarny - SB', '', '1'),
(20, 'Hopper (1,0)', 'stacjonarny - SB', '', '1'),
(21, 'Hopper (5,0)', 'stacjonarny - SB', '', '1'),
(22, 'karta flash', 'stacjonarny - SB', '', '1'),
(23, 'Karta SaM MIFARE', 'stacjonarny - SB', '', '1'),
(24, 'karta sam zestaw płatniczy', 'stacjonarny - SB', '', '1'),
(25, 'Wyświetlacz LCD 15 cali', 'stacjonarny - SB', '', '1'),
(26, 'mifare', 'stacjonarny - SB', '', '1'),
(27, 'modem', 'stacjonarny - SB', '', '1'),
(28, 'Nagrzewnica', 'stacjonarny - SB', '', '1'),
(29, 'panel wewnętrzny', 'stacjonarny - SB', '', '1'),
(30, 'PC', 'stacjonarny - SB', '', '1'),
(31, 'pinpad', 'stacjonarny - SB', '', '1'),
(32, 'Płyta backplan', 'stacjonarny - SB', '', '1'),
(33, 'płyta pod CM', 'stacjonarny - SB', '', '1'),
(34, 'płyta za ACM', 'stacjonarny - SB', '', '1'),
(35, 'płytka do powerbox', 'stacjonarny - SB', '', '1'),
(36, 'przejściówka do modemu', 'stacjonarny - SB', '', '1'),
(37, 'przetwornica PCMDS60 24S12W', 'stacjonarny - SB', '', '1'),
(38, 'Router RUT500', 'stacjonarny - SB', '', '1'),
(39, 'sortownik', 'stacjonarny - SB', '', '1'),
(40, 'sterownik drukarki', 'stacjonarny - SB', '', '1'),
(41, 'VIVOpay Kiosk II', 'stacjonarny - SB', '', '1'),
(42, 'walidator (NRI)', 'stacjonarny - SB', '', '1'),
(43, 'zasilacz', 'stacjonarny - SB', '', '1'),
(44, 'ZCGVA', 'stacjonarny - SB', '', '1'),
(45, 'Komputer AEON EMB-CV1-A11 Mini-ITX', 'stacjonarny - BS 201', '', '1'),
(46, 'PinPad', 'stacjonarny - BS 201', '', '1'),
(47, 'antena VIVO', 'stacjonarny - BS 201', '', '1'),
(48, 'Czytnik  artema  P167', 'stacjonarny - BS 201', '', '1'),
(49, 'Grzejnik z dmuchawą', 'stacjonarny - BS 201', '', '1'),
(50, 'Karuzela do automatu stacjonarnego', 'stacjonarny - BS 201', '', '1'),
(51, 'Artema (stacjonarna BS 201)', 'stacjonarny - BS 201', '', '1'),
(52, 'Bezpiecznik 20 A 250 V', 'stacjonarny - BS 201', '', '1'),
(53, 'Pakiet kontrolera karuzel', 'stacjonarny - BS 201', '', '0'),
(54, 'Płyta ZASILACZ-MAIN DO BS201', 'stacjonarny - BS 201', '', '1'),
(55, 'Przetwornica impulsowa DRA 240', 'stacjonarny - BS 201', '', '1'),
(56, 'Przetwornica impulsowa DR-120-24', 'stacjonarny - BS 201', '', '1'),
(57, 'pinpad', 'stacjonarny - BS 201', '', '0'),
(58, 'Akumulator żelowy 12V 2,3 Ah', 'mobilny - BM 101', '', '1'),
(59, 'Antena dwupasmowa GSM/GPS', 'mobilny - BM 101', '', '1'),
(60, 'Antena zbliżeniowa', 'mobilny - BM 101', '', '1'),
(61, 'CR manual mobilny', 'mobilny - BM 101', '', '1'),
(62, 'grzałka ', 'mobilny - BM 101', '', '1'),
(63, 'Interfejs IF9000 RS232 do drukarek termicznych SEIKO', 'mobilny - BM 101', '', '1'),
(64, 'kabel ZASILACZ - MAIN (4 żyły)', 'mobilny - BM 101', '', '1'),
(65, 'Komputer PC 104 AMD GEODE 500 (EVOC:EC3-1641 CLDNA)', 'mobilny - BM 101', '', '1'),
(66, 'MAIN (WRDE 0141)', 'mobilny - BM 101', '', '1'),
(67, 'Mechanizm drukujący SEIKO z obcinaczem', 'mobilny - BM 101', '', '1'),
(68, 'Nakładka dotykowa na ekran LCD 10 cali', 'mobilny - BM 101', '', '1'),
(69, 'opóźniacz', 'mobilny - BM 101', '', '1'),
(70, 'Sprężyna szyby', 'mobilny - BM 101', '', '1'),
(71, 'VIVOpay Kiosk II Controller', 'mobilny - BM 101', '', '1'),
(72, 'wałek aluminiowy drukarki', 'mobilny - BM 101', '', '1'),
(73, 'Wentylator 12 v 50x50', 'mobilny - BM 101', '', '1'),
(74, 'Wyświetlacz LCD 10 cali', 'mobilny - BM 101', '', '1'),
(75, 'Zasilacz (WRKP0135)', 'mobilny - BM 101', '', '1'),
(76, 'zespół drukarki do BM101 (stelaż, mechanizm druk., sterownik)', 'mobilny - BM 101', '', '1'),
(77, 'Zespół kieszeni  wydawania biletu   ', 'mobilny - BM 101', '', '1'),
(78, 'VIVOpay ANTENA', 'stacjonarny - BS 201', '', '1'),
(79, 'Kabel zasilania Artema VIVOpay AMKP0458-01', 'mobilny - BM 101', '', '1'),
(80, 'VIVOpay Kiosk II Antenna', 'mobilny - BM 101', '', '1'),
(81, 'Kontroler kieszeni wydawania i peryferii I/O', 'stacjonarny - BS 201', '', '1'),
(82, 'Pakiet czujnika antysabotażowego i otwarcia kieszeni i drzwi', 'stacjonarny - BS 201', '', '1'),
(83, 'Płytka elektroniki zasilacza - Main do BS201 (ASKP0187B)', 'stacjonarny - BS 201', '', '1'),
(84, 'Płytka elektroniki zasilacza - Main do BS201 (ASKP0187C) na dwa ekrany', 'stacjonarny - BS 201', '', '1'),
(85, 'Pakiet hoperów - płytka', 'stacjonarny - BS 201', '', '1'),
(86, 'Pakiet kontrolera toru monet i karuzel ASKP0261B', 'stacjonarny - BS 201', '', '1'),
(87, 'Pakiet kontrolera toru monet i karuzel ASKP0261C', 'stacjonarny - BS 201', '', '1'),
(88, 'Pakiet konwertera RS232-I2C z czujnikiem wstrząsów ASKP0265B', 'stacjonarny - BS 201', '', '1'),
(89, 'Płytka czujnika temperatury ASKP0266A', 'stacjonarny - BS 201', '', '1'),
(90, 'Kabel RS232 I2C pakiet', 'stacjonarny - BS 201', '', '1'),
(91, 'Kabel zasilający wentylator', 'mobilny - BM 101', '', '1'),
(92, 'Karta pamięci CF 2GB', 'mobilny - BM 101', '', '1'),
(93, 'CR manualny (do BS 201)', 'stacjonarny - BS 201', '', '1'),
(94, 'Czytnik TAGów CTU-D5N z interfejsem J2C', 'stacjonarny - BS 201', '', '1'),
(95, 'Mechanika Elektronika i Kabel FAN', 'mobilny - BM 101', '', '1'),
(96, 'Hopper HPRO 2024 (1.603.42) regular belt', 'stacjonarny - BS 201', '', '1'),
(97, 'Przemysłowy hub USB 2.0 4x EX-1163HM mocowany na szynę DIN 35', 'stacjonarny - BS 201', '', '1'),
(98, 'Kabel VIVOpay Kiosk II Antenna - VIVO Kiosk II Controller', 'mobilny - BM 101', '', '1'),
(99, 'Kabel Card Reader - Artema', 'mobilny - BM 101', '', '1'),
(100, 'Kabel PinPad - Artema', 'mobilny - BM 101', '', '1'),
(101, 'Kabel sygnałowy LVDS do wyświetlacza 10cali użytego w BM102', 'mobilny - BM 101', '', '1'),
(102, 'Pakiet kontrolera drukarki Axiom (COMP2207-222/B lub C)', 'stacjonarny - BS 201', '', '1'),
(103, 'Walidator (NRI) (G13MFT-09V)', 'stacjonarny - BS 201', '', '1'),
(104, 'Kontroler matrycy LVDS z interfejsem DVI', 'stacjonarny - BS 201', '', '1'),
(105, 'Mechanizm drukujący z obcinaczem Axiom o szerokości 82,5 (MGTAES24)', 'stacjonarny - BS 201', '', '1'),
(106, 'Modem MC52i', 'stacjonarny - BS 201', '', '1'),
(107, 'Pakiet drukarki', 'mobilny - BM 101', '', '0'),
(108, 'Nakładka dotykowa na ekran LCD 15cali', 'stacjonarny - BS 201', '', '1'),
(109, 'Czujnik szczelinowy - optyczny HOA PCK6', 'stacjonarny - BS 201', '', '1'),
(110, 'Przetwornica 100-240V AC 24V DC 120W 5A - (używana w zestawie testowym)', 'mobilny - BM 101', '', '1'),
(111, 'Pamięć RAM SO-DIMM DDR3 2GB 1066Mhz', 'stacjonarny - BS 201', '', '1'),
(112, 'Pakiet terminala kart zbliżeniowych w standardzie MIFARE (GAMMA SAMIF)', 'stacjonarny - BS 201', '', '1'),
(113, 'Pakiet terminala kart zbliżeniowych w standardzie MIFARE (GAMMA SAMIF2) Wersja 3', 'stacjonarny - BS 201', '', '1'),
(114, 'Czujnik TICKET OUT', 'stacjonarny - BS 201', '', '1'),
(115, 'Kabel ZASILACZ - PC', 'mobilny - BM 101', '', '1'),
(116, 'Kabel ARTEMA - VIVO', 'mobilny - BM 101', '', '1'),
(117, 'Kabel ZASILACZ - MIFARE', 'mobilny - BM 101', '', '1'),
(118, 'Kabel zasilania drukarki', 'mobilny - BM 101', '', '1'),
(119, 'Kabel sygnalizatora poziomu papieru', 'mobilny - BM 101', '', '1'),
(120, 'Kabel sterownik drukarki (niebieska wiązka)', 'mobilny - BM 101', '', '1'),
(121, 'Taśma do czytnika kart', 'mobilny - BM 101', '', '1'),
(122, 'Kabel PC - DRUKARKA', 'mobilny - BM 101', '', '1'),
(123, 'Kabel ZASILACZ - MAIN (14pin)', 'mobilny - BM 101', '', '1'),
(124, 'Zamek ABLOY CL100N', 'mobilny - BM 101', '', '1'),
(125, 'Wyświetlacz LCD 15 cali ', 'stacjonarny - BS 201', '', '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `service_request`
--

CREATE TABLE `service_request` (
  `id` int(11) NOT NULL,
  `arrival_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `sn` varchar(255) COLLATE latin2_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `release_user_id` int(11) NOT NULL,
  `service_status_id` int(11) NOT NULL DEFAULT '1',
  `automat_number` varchar(255) COLLATE latin2_bin DEFAULT NULL,
  `change_status_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `service_request`
--

INSERT INTO `service_request` (`id`, `arrival_id`, `product_id`, `sn`, `quantity`, `storage_id`, `release_user_id`, `service_status_id`, `automat_number`, `change_status_datetime`) VALUES
(1, 2, 7, '', 1, 2, 14, 1, NULL, '2016-10-03 11:33:17'),
(2, NULL, 7, '', -1, 2, 14, 2, '558', '2016-10-03 13:15:07'),
(3, 3, 7, '', 1, 2, 8, 1, NULL, '2016-10-04 11:37:50'),
(4, 4, 7, '', 1, 2, 10, 1, NULL, '2016-10-04 11:38:41'),
(5, 4, 25, '', 1, 2, 10, 1, NULL, '2016-10-04 11:38:41'),
(6, NULL, 25, '', -1, 2, 10, 3, '', '2016-10-04 14:54:52'),
(7, NULL, 7, '', -1, 2, 10, 3, '', '2016-10-04 14:55:24'),
(8, 7, 7, '', 1, 2, 10, 4, NULL, '2016-10-04 14:57:48'),
(9, 7, 25, '', 1, 2, 10, 4, NULL, '2016-10-04 14:57:49'),
(10, 8, 30, '', 1, 2, 10, 1, NULL, '2016-10-04 14:58:30'),
(11, NULL, 30, '', -1, 2, 10, 2, '533', '2016-10-04 14:59:52'),
(12, NULL, 7, '', -1, 2, 8, 2, '566', '2016-10-04 15:19:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `service_status`
--

CREATE TABLE `service_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `service_status`
--

INSERT INTO `service_status` (`id`, `name`) VALUES
(1, 'Otrzymano z magazynu'),
(2, 'Montaż w automacie'),
(3, 'Do zwrotu'),
(4, 'Zwrócono na magazyn');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `storage`
--

INSERT INTO `storage` (`id`, `name`) VALUES
(1, 'Magazyn Warszawa'),
(2, 'Magazyn Wrocław');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE latin2_bin NOT NULL,
  `password` varchar(255) COLLATE latin2_bin NOT NULL,
  `user_name` varchar(255) COLLATE latin2_bin NOT NULL,
  `email` varchar(255) COLLATE latin2_bin NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `is_active` enum('0','1') COLLATE latin2_bin NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `user_name`, `email`, `user_group_id`, `storage_id`, `is_active`) VALUES
(1, 'mennica_test', 'fa8d52b91c0742b7f2f983bd978c453c', 'mennica test', '', 1, 0, '1'),
(2, 'vector_test', '1edabd3ab3a3b8acf3efd272f613380f', 'vector test', '', 2, 2, '1'),
(3, 'serwisant1', '6cce4ad64dc940b1f7a60ea642dd5fb0', 'serwisant', '', 3, 1, '1'),
(4, 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager', '', 4, 0, '1'),
(5, 'blarkowski', 'c18761d2e84d55d1eac111eedcbebb66', 'Bartosz Larkowski', 'blarkowski@vectorsoft.pl ', 3, 2, '1'),
(6, 'abuller', '9292153d210693abbe00dc0c3db99c21', 'Artur Buller', 'abuller@vectorsoft.pl', 3, 2, '1'),
(7, 'smiernik', 'e18fd59926017dd7378db77487f8de1e', 'Szymon Miernik', 'smiernik@vectorsoft.pl', 3, 2, '1'),
(8, 'wsliwa', 'ad3702c2bf9407673ea885482274c128', 'Wojciech Śliwa', 'wsliwa@vectorsoft.pl', 3, 2, '1'),
(9, 'lmazurowski', '67618b7f04ffa71c67b6b5bebfc20953', 'Łukasz Mazurowski', 'lmazurowski@vectorsoft.pl', 3, 2, '1'),
(10, 'cskwarzynski', 'd85684ec91478e549da228b0c358a2cc', 'Cezary Skwarzyński', 'cskwarzynski@vectorsoft.pl', 3, 2, '1'),
(11, 'wperko', 'f68ae8b3314b2c66ede3f6c8ccb77414', 'Wojciech Perko', 'wperko@vectorsoft.pl', 3, 2, '1'),
(12, 'kmelewski', 'b23cd911ba8c898cf1bb7e17ecc0b271', 'Krzysztof Melewski', 'kmelewski@vectorsoft.pl', 3, 2, '1'),
(13, 'msieradzki', 'f2069b44521e12d51313538a55c4e96c', 'Mariusz Sieradzki', 'msieradzki@vectorsoft.pl', 3, 2, '1'),
(14, 'tkarabiniewicz', '889b5b5ee64dcd534ea9c4fd9a8dd267', 'Tomasz Karabiniewicz', 'tkarabiniewicz@vectorsoft.pl', 3, 2, '1'),
(15, 'kjasinski', 'fbe48f7df9a3ba448e697c809a2d13e9', 'Krzysztof Jasiński', 'kjasinski@vectorsoft.pl', 2, 2, '1'),
(16, 'kkowalczyk', '5377795a179d58f1edf5d6253e5b0ce7', 'Konrad Kowalczyk', 'kkowalczyk@vetorsoft.pl', 2, 2, '1'),
(17, 'mprzybylski', 'a0daad0e6daa28af3d2a4f06029a0b43', 'Michał Przybylski', 'mprzybylski@vectorsoft.pl', 2, 2, '1'),
(18, 'kwiaterski', 'f88990a8212454ecc8c141a6e1098393', 'Konrad Wiaterski', '', 1, 0, '1'),
(19, 'ddawidczyk', '1f65262db75062be18a5f3f2965b023b', 'Dariusz Dawidczyk', '', 1, 0, '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin2_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

--
-- Zrzut danych tabeli `users_group`
--

INSERT INTO `users_group` (`id`, `name`) VALUES
(1, 'mennica'),
(2, 'vectorsoft_magazyn'),
(3, 'serwisant'),
(4, 'manager');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `arrival_items`
--
ALTER TABLE `arrival_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arrival_products_temp`
--
ALTER TABLE `arrival_products_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arrival_types`
--
ALTER TABLE `arrival_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arrivals`
--
ALTER TABLE `arrivals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `automat_type`
--
ALTER TABLE `automat_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broken_arrival_items`
--
ALTER TABLE `broken_arrival_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broken_product_details`
--
ALTER TABLE `broken_product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damaged_devices`
--
ALTER TABLE `damaged_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damaged_devices_status`
--
ALTER TABLE `damaged_devices_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_status`
--
ALTER TABLE `service_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `arrival_items`
--
ALTER TABLE `arrival_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT dla tabeli `arrival_products_temp`
--
ALTER TABLE `arrival_products_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `arrival_types`
--
ALTER TABLE `arrival_types`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `arrivals`
--
ALTER TABLE `arrivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `automat_type`
--
ALTER TABLE `automat_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `broken_arrival_items`
--
ALTER TABLE `broken_arrival_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `broken_product_details`
--
ALTER TABLE `broken_product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `damaged_devices`
--
ALTER TABLE `damaged_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `damaged_devices_status`
--
ALTER TABLE `damaged_devices_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT dla tabeli `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT dla tabeli `service_request`
--
ALTER TABLE `service_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `service_status`
--
ALTER TABLE `service_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
