-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Ağu 2023, 23:20:26
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `qrmenu_db`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'Admin', 'admin', '123', '2023-08-12 16:03:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `status`) VALUES
(1, 'Yemekler', 'Ana Yemekler', 'img/thit-do-402.jpg', 1),
(2, 'Makarnalar', 'Makarna Çeşitleri', 'img/aa0d915de22475be897d49c0847936766a-26-cacio-e-pepe.2x.h473.w710.webp', 1),
(3, 'Soğuk İçecekler', 'Ferahlatan İçeceklerimiz', 'img/images.jpeg', 1),
(4, 'Sıcak İçecekler', 'İçinizi Isıtacak İçeceklerimiz', 'img/different-types-of-tea-FT-BLOG0621-7c7fd231e66d4fea8ca9a47cad52ba79.jpg', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `item`
--

INSERT INTO `item` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(1, 1, 'Dana Lokum', 'Dana Biftek', '400', 'img/thit-do-402.jpg', 1),
(2, 1, 'Chicken Burger', 'Tavuk Burger', '150', 'img/wV9Loesxbk8.jpg', 1),
(3, 2, 'Soslu Makarna', 'Peynir Soslu Makarna', '110', 'img/aa0d915de22475be897d49c0847936766a-26-cacio-e-pepe.2x.h473.w710.webp', 1),
(4, 2, 'Mantarlı Makarna', 'Mantar Soslu Özel Makarna', '115', 'img/e99f994b4a2bf4e6bb877143976168af.jpg', 1),
(5, 3, 'Cold Drink', 'Soğuk İçecek', '45', 'img/images.jpeg', 1),
(6, 4, 'Çay', 'Siyah Çay', '10', 'img/different-types-of-tea-FT-BLOG0621-7c7fd231e66d4fea8ca9a47cad52ba79.jpg', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
