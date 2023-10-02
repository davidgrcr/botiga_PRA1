-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Temps de generació: 02-10-2023 a les 14:35:49
-- Versió del servidor: 10.4.28-MariaDB
-- Versió de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `Botiga`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`) VALUES
(1, 'cowboy boots', 'cowboy_boots.jpeg'),
(2, 'biker boots', 'biker_boots.jpeg'),
(5, 'trainers', 'trainers.jpeg'),
(6, 'flat shoes', 'flat_shoes.jpeg'),
(7, 'heel shoes', 'heel_shoes.jpeg'),
(8, 'flat sandals', 'flat_sandals.jpeg');

-- --------------------------------------------------------

--
-- Estructura de la taula `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `img`, `price`) VALUES
(1, 'COWBOY KNEE-HIGH BOOTS\r\n', 'Women\'s cowboy-style boots available in a range of colours. Embroidered detail on the legs of the boots. Pull tabs on the sides of the boots. Heel height: 5 cm. STARFIT®. Flexible technical polyurethane foam insole, designed to offer greater comfort.', 1, '9868270100_6_1_1.webp', 49.99),
(2, 'DENIM HIGH-HEEL COWBOY ANKLE BOOTS', 'Women\'s high-heel cowboy-style ankle boots. Available in a grey denim colour. Distressed detail on the front. Side zip fastening. Sole height: 8.5 cm.', 1, '9949270004_6_1_1.webp', 45.99);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`name`) USING BTREE;

--
-- Índexs per a la taula `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la taula `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
