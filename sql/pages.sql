-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 okt 2018 kl 00:04
-- Serverversion: 10.1.31-MariaDB
-- PHP-version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `it_tools`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `pages`
--

CREATE TABLE `pages` (
  `heading` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pages`
--

INSERT INTO `pages` (`heading`, `parent`, `id`) VALUES
('Programming', 0, 1),
('Webbdevelopment', 0, 2),
('Webbserverpro...', 0, 3),
('Moment', 1, 7),
('Planering', 1, 8),
('Kunskapskrav', 1, 9),
('Moment', 2, 10),
('Planering', 2, 11),
('Kunskapskrav', 2, 12),
('Moment', 3, 13),
('Planering', 3, 14),
('Kunskapskrav', 3, 15),
('Arsenalen', 1, 16),
('Arsenalen', 2, 17),
('Arsenalen', 3, 18),
('Getting started', 16, 19),
('Teknik 1', 0, 20),
('Kunskapskrav', 20, 21);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
