/*
	 * License

	 * Copyright 2015 DevWurm Enceladus-2, kkegel, mjoest, tarek96, Tolator and vgerber.

	 * This file is part of rsa_database.

	 *  rsa_database is free software: you can redistribute it and/or modify
	    it under the terms of the GNU General Public License as published by
	    the Free Software Foundation, either version 3 of the License, or
	    (at your option) any later version.

	    rsa_database is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.

	    You should have received a copy of the GNU General Public License
	    along with rsa_database.  If not, see <http://www.gnu.org/licenses/>.

	    Diese Datei ist Teil von rsa_database.

	    rsa_database ist Freie Software: Sie können es unter den Bedingungen
	    der GNU General Public License, wie von der Free Software Foundation,
	    Version 3 der Lizenz oder (nach Ihrer Wahl) jeder späteren
	    veröffentlichten Version, weiterverbreiten und/oder modifizieren.

	    rsa_database wird in der Hoffnung, dass es nützlich sein wird, aber
	    OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
	    Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
	    Siehe die GNU General Public License für weitere Details.

	    Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
	    Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*/

-- SQL Dump


--
-- Tabellenstruktur für Tabelle `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL auto_increment,
  `public_key` varchar(20) collate latin1_general_ci NOT NULL,
  `private_key` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
);

--
-- Daten für Tabelle `keys`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(20) collate latin1_general_ci NOT NULL,
  `lastname` varchar(20) collate latin1_general_ci NOT NULL,
  `date_of_birth` varchar(20) collate latin1_general_ci NOT NULL,
  `zip` varchar(20) collate latin1_general_ci NOT NULL,
  `city` varchar(20) collate latin1_general_ci NOT NULL,
  `street` varchar(20) collate latin1_general_ci NOT NULL,
  `number` varchar(20) collate latin1_general_ci NOT NULL,
  `tel` varchar(20) collate latin1_general_ci NOT NULL,
  `email` varchar(20) collate latin1_general_ci NOT NULL,
  `k_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
	FOREIGN KEY (`k_id`) REFERENCES `keys` (`id`)
);


--
-- Daten für Tabelle `user`
--
