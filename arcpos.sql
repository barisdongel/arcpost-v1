-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Ağu 2023, 14:14:57
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arcpos`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adisyonlar`
--

CREATE TABLE `adisyonlar` (
  `id` int(11) NOT NULL,
  `masa_id` int(11) NOT NULL,
  `urunler` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `adisyonlar`
--

INSERT INTO `adisyonlar` (`id`, `masa_id`, `urunler`, `status`, `date_added`) VALUES
(1, 1, '[]', 0, '2023-08-22 21:25:34'),
(2, 2, '[\"22\",\"74\",\"18\",\"21\",\"75\"]', 1, '2023-08-22 21:25:34'),
(3, 3, '[\"32\",\"32\"]', 1, '2023-08-22 21:25:34'),
(4, 4, '[]', 0, '2023-08-22 21:25:34'),
(5, 5, '[]', 0, '2023-08-22 21:25:34'),
(6, 6, '[]', 0, '2023-08-22 21:25:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'Admin', 'admin', '123', '2023-08-12 16:03:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar_tbl`
--

CREATE TABLE `ayar_tbl` (
  `ayar_id` int(11) NOT NULL,
  `ayar_title` varchar(500) NOT NULL,
  `ayar_logo` varchar(500) NOT NULL,
  `ayar_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ayar_tbl`
--

INSERT INTO `ayar_tbl` (`ayar_id`, `ayar_title`, `ayar_logo`, `ayar_desc`) VALUES
(0, 'Allfred QR Menü', 'img/28555allfred.png', 'Allfred QR Menü');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) DEFAULT 1,
  `sira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `status`, `sira`) VALUES
(5, 'Çaylar', 'Çaylar', 'img/tea.png', 1, NULL),
(15, 'Milkshake', 'Milkshake', 'img/milkshake.png', 1, NULL),
(16, 'Frozen', 'Frozen', 'img/frozen.png', 1, NULL),
(17, 'Frappe', 'Frappe', 'img/frappe.png', 1, NULL),
(18, 'Tatlılar', 'Tatlılar', 'img/sufle.png', 1, NULL),
(19, 'Kampanya', 'Kampanya', 'img/90559', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 pasif 1 aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `item`
--

INSERT INTO `item` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(7, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(8, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(9, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(10, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(11, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(12, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(13, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(14, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(15, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(16, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(17, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(18, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(19, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(20, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(21, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(22, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(23, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(24, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(25, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(26, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(27, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(28, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(29, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(30, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(31, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(32, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(33, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(34, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(35, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(36, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(37, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(38, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(39, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(40, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(41, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(42, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(43, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(44, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(45, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(46, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(47, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(48, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(49, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(50, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(51, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(52, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(53, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(54, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(55, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(56, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(57, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(58, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(59, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(60, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(61, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(62, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(63, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(64, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(65, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(66, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(67, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(68, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(69, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(70, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(71, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(72, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1),
(73, 17, 'Frappe', 'Frappe', '50', 'img/22620frappe.png', 1),
(74, 16, 'Frozen', 'Frozen', '50', 'img/33268frozen.png', 1),
(75, 18, 'Sufle', 'Sufle', '50', 'img/58504sufle.png', 1),
(76, 19, 'Vodka Menü', 'Vodka Menü', '300', '', 1),
(77, 15, 'Milkshake', 'Milkshake', '55', 'img/50299milkshake.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

CREATE TABLE `masalar` (
  `id` int(11) NOT NULL,
  `masa_no` int(11) NOT NULL,
  `masa_kod` varchar(50) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `masalar`
--

INSERT INTO `masalar` (`id`, `masa_no`, `masa_kod`, `isActive`) VALUES
(1, 1, 'M-1', 1),
(2, 2, 'M-2', 1),
(3, 3, 'M-3', 1),
(4, 4, 'M-4', 1),
(5, 5, 'M-5', 1),
(6, 6, 'M-6', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adisyonlar`
--
ALTER TABLE `adisyonlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayar_tbl`
--
ALTER TABLE `ayar_tbl`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `masalar`
--
ALTER TABLE `masalar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adisyonlar`
--
ALTER TABLE `adisyonlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayar_tbl`
--
ALTER TABLE `ayar_tbl`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Tablo için AUTO_INCREMENT değeri `masalar`
--
ALTER TABLE `masalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
