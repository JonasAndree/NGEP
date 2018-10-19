-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 19 okt 2018 kl 16:49
-- Serverversion: 10.1.30-MariaDB
-- PHP-version: 7.2.2

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
  `parent` varchar(32) DEFAULT 'null',
  `level` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `pages`
--

INSERT INTO `pages` (`heading`, `parent`, `level`, `id`) VALUES
('Programming', 'null', 0, 1),
('Webbdevelopment', 'null', 0, 2),
('Webbserverpro...', 'null', 0, 3),
('Moment', 'Programming', 1, 7),
('Planering', 'Programming', 1, 8),
('Kunskapskrav', 'Programming', 1, 9),
('Moment', 'Webbdevelopment', 1, 10),
('Planering', 'Webbdevelopment', 1, 11),
('Kunskapskrav', 'Webbdevelopment', 1, 12),
('Moment', 'Webbserverpro...', 1, 13),
('Planering', 'Webbserverpro...', 1, 14),
('Kunskapskrav', 'Webbserverpro...', 1, 15),
('Arsenalen', 'Programming', 1, 16),
('Arsenalen', 'Webbdevelopment', 1, 17),
('Arsenalen', 'Webbserverpro...', 1, 18),
('Getting started', 'Arsenalen', 2, 19);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
