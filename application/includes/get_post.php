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

include_once 'key_files.php';
include_once 'user_key_relation.php';


function get_change_data() {
	$change_data = array();
	$cleaves = array('id','firstname','lastname','date_of_birth','zip','number','city','street','tel','mail');
	for($i = 0; $i <= 9; $i++){
		if (isset($_POST[$cleaves[$i]])) {
			$change_data[$cleaves[$i]] = $_POST[$cleaves[$i]];
		}
		else {
			die("ERROR: Fehlerhafte Eingabe!");
		}
	}
	return $change_data;
}

function get_insert_data() {
	$insert_data = array();
	$cleaves = array('firstname','lastname','date_of_birth','zip','number','city','street','tel','mail', 'k_id');
	for($i = 0; $i <= 9; $i++){
		if ($cleaves[$i] == 'k_id') {
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$insert_data['k_id'] = get_key_id_by_key($_SESSION['key_pub']);
		}
		else {
			if (isset($_POST[$cleaves[$i]])) {
				$insert_data[$cleaves[$i]] = $_POST[$cleaves[$i]];
			}
			else {
				die("ERROR: Fehlerhafte Eingabe!");
			}
		}
	}
	return $insert_data;
}

function get_id() {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	return $id;
}

function get_privkey() {
	$key = array();

	if ($_FILES['key_priv']['error'] == UPLOAD_ERR_OK) {
		if(move_uploaded_file($_FILES['key_priv']['tmp_name'], './temp/key_priv_up.drsa')) {
			$file_handler = fopen('./temp/key_priv_up.drsa', 'r');

			$key = get_key_from_file($file_handler);

			if($key && ($key['type'] == "priv")) {
				fclose($file_handler);
				unlink('./temp/key_priv_up.drsa');

				if (session_status() == PHP_SESSION_NONE) {
					session_start();
				}

				$_SESSION['key_priv'] = $key;
			}
			else {
				fclose($file_handler);
				unlink('./temp/key_priv_up.drsa');
				die("FEHLER: Fehler beim auslesen der Private Key Datei");
			}

		}
		else {
			die("FEHLER: Fehler beim abspeichern der Private Key Datei");
		}
	}
	else {
		die("FEHLER: Fehler beim hochladen der Private Key Datei");
	}
}


function get_pubkey() {
	$key = array();

	if ($_FILES['key_pub']['error'] == UPLOAD_ERR_OK) {
		if(move_uploaded_file($_FILES['key_pub']['tmp_name'], './temp/key_pub_up.drsa')) {
			$file_handler = fopen('./temp/key_pub_up.drsa', 'r');

			$key = get_key_from_file($file_handler);

			if( $key && ($key['type'] == "pub")) {
				fclose($file_handler);
				unlink('./temp/key_pub_up.drsa');

				if (session_status() == PHP_SESSION_NONE) {
					session_start();
				}

				$_SESSION['key_pub'] = $key;
			}
			else {
				fclose($file_handler);
				unlink('./temp/key_pub_up.drsa');
				die("FEHLER: Fehler beim auslesen der Public Key Datei");
			}

		}
		else {
			die("FEHLER: Fehler beim abspeichern der Public Key Datei");
		}
	}
	else {
		die("FEHLER: Fehler beim hochladen der Public Key Datei");
	}
}

?>
