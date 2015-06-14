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

function get_key_from_file($file_handle) {
	$key = array(); //key and key information
	$file_line = "";
	$full_key = "";
	$key_parts = array();

	while ($file_line = fgets($file_handle)) { //read file line by line

		if ($file_line = "<drsa-private-key-block>" || $file_line = "<drsa-public-key-block>") { //keyblock is opened

			if ($file_line = "<drsa-private-key-block>") { //set key type
				$key['type'] = 'priv';
			}
			else {
				$key['type'] = 'pub';
			}

			while(($file_line = fgets($file_handle)) && ($file_line != "<drsa-key-block-end>")) { //until keyblock is ended or file is empty, add content to key string
				$full_key = $full_key.$file_line;
			}

			$key_parts = explode(':', $full_key, 2);

			if ($key_parts != false) { //spit key string and add to key data structure
				$key['ind_part'] = $key_parts[0];
				$key['N_part'] = $key_parts[1];
			}
			else {
				die("FEHLER: Fehlerhaftes Schlüsselformat");
			}

			return $key; //return key data structure
		}

	}

	return false; //return false if key block never started
}

function generate_file_from_key($key){ // $key is a key datastructure
	if ($key['type'] == 'priv') {
		$file_handle = fopen('./temp/key_priv.drsa', 'w');
		fwrite($file_handle, "<drsa-private-key-block>\r\n");
		fwrite($file_handle, $key['ind_part'].':'.$key['N_part']."\r\n");
		fwrite($file_handle, "<drsa-key-block-end>");
		fclose($file_handle);

		if (file_exists('./temp/key_priv.drsa')) {
			return './temp/key_priv.drsa';
		}
		else {
			return false;
		}
	}
	else {
		$file_handle = fopen('./temp/key_pub.drsa', 'w');
		fwrite($file_handle, "<drsa-public-key-block>\r\n");
		fwrite($file_handle, $key['ind_part'].':'.$key['N_part']."\r\n");
		fwrite($file_handle, "<drsa-key-block-end>");
		fclose($file_handle);

		if (file_exists('./temp/key_pub.drsa')) {
			return './temp/key_pub.drsa';
		}
		else {
			return false;
		}
	}
}
?>
