-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 15. Jun 2015 um 09:00
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
  `public_key` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `private_key` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `keys`
--

INSERT INTO `keys` (`id`, `public_key`, `private_key`) VALUES
(1, '1151:4399', '2663231533332232'),
(2, '223:493', '3156565674615653'),
(3, '67:341', '3249978489780582'),
(4, '263:2257', '1772920397479784'),
(5, '227:779', '3617636367636936'),
(6, '439:5063', '2207080246909612'),
(7, '719:4757', '0508495049138505'),
(8, '829:1037', '0693156565631693'),
(9, '541:1333', '2663702863131246');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date_of_birth` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `zip` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `street` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `number` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tel` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `date_of_birth`, `zip`, `city`, `street`, `number`, `tel`, `email`, `k_id`) VALUES
(23, 'test', '', '', '', '', '', '', '', '', 1),
(24, '614:', '50:', '1020:', '698:', '389:', '913:', '140:', '564:', '622:', 1),
(25, '144:507:664:', '144:869:608:872:101:', '719:614:371:719:614:', '488:539:776:', '144:869:608:872:101:', '144:869:608:872:101:', '614:', '719:564:614:389:', '414:869:608:872:101:', 1),
(46, '144:507:664:', '144:869:608:872:101:694:414:507:553:553:', '719:50:371:719:50:371:622:622:', '719:564:614:389:', '144:869:608:872:101:694:608:872:507:716:872:', '144:869:608:872:101:694:935:101:86:', '614:', '719:564:614:389:886:719:564:614:389:', '414:869:608:872:101:694:285:414:869:608:872:101:694:371:923:416:414:', 1037),
(47, '144:507:664:', '144:144:144:', '414:414:', '414:414:414:414:', '414:', '414:414:', '414:414:', '414:414:', '414:869:608:872:101:694:285:414:869:608:872:101:694:371:923:416:414:', 1037),
(48, '644:694:507:553:488:', '144:179:290:962:962:101:694:', '614:622:371:614:50:371:614:622:622:719:', '719:140:614:50:', '72:507:869:776:872:608:872:507:716:872:', '72:507:869:776:872:608:872:694:507:179:333:101:', '1020:507:', '719:614:140:614:886:622:719:698:389:1020:564:140:', '', 1037);

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
 ADD PRIMARY KEY (`id`), ADD KEY `k_id` (`k_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `keys`
--
ALTER TABLE `keys`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
