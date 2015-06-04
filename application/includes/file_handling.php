<?php
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

function get_file_counter() {
	$file_counter = 0;
	
	if (file_exists("../temp/files")) {
		if ($file_handler = fopen("../temp/files", 'r+')) {
			$file_counter = fgets($file_handler);
			$file_counter++;
			ftruncate($file_handler, 0);
			fwrite($file_handler, strval($file_counter));
			fclose($file_handler);
		}
		else {
			die("FEHLER: Fehler beim öffnen der Zählerdatei");
		}
	}
	else {
		if ($file_handler = fopen("../temp/files", "w")) {
			fwrite($file_handler, "0");
			fclose($file_handler);
			$file_counter = 0;
		}
		else {
			die("FEHLER: Fehler beim öffnen der Zählerdatei");
		}
	}
	
	return $file_counter;
}

function save_upload_file($upload_file_name){
	$file_counter = get_file_counter();
}

?>