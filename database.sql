-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Jun 2015 um 14:08
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `database`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
`id` int(11) NOT NULL,
  `puplic_key` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `privat_key` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `date_of_birth` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `zip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `street` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `number` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tel` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `keys`
--
ALTER TABLE `keys`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `keys`
--
ALTER TABLE `keys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
