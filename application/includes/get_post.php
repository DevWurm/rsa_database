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

function get_change_data() {
	$change_data = array();
	
	if (isset($_POST["id"])) {
		$change_data['id'] = $_POST["id"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["firstname"])) {
		$change_data['firstname'] = $_POST["firstname"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["lastname"])) {
		$change_data['lastname'] = $_POST["lastname"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["date_of_birth"])) {
		$change_data['date_of_birth'] = $_POST["date_of_birth"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["zip"])) {
		$change_data['zip'] = $_POST["zip"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["city"])) {
		$change_data['city'] = $_POST["city"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["street"])) {
		$change_data['street'] = $_POST["street"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["number"])) {
		$change_data['number'] = $_POST["number"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["tel"])) {
		$change_data['tel'] = $_POST["tel"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["mail"])) {
		$change_data['mail'] = $_POST["mail"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	
	return $change_data;
}

function get_key_data() {
	$key_data = array();
	
	if (isset($_POST['public_key'])) {
		$key_data['public_key'] = $_POST['public_key'];
	}
	else {
		die("ERROR Fehlerhafte Daten!");
	}
	if (isset($_POST['private_key'])) {
		$key_data['private_key'] = $_POST['private_key'];
	}
	else {
		die("ERROR Fehlerhafte Daten!");
	}
	
	return $key_data;
}

function get_insert_data() {
	$insert_data = array();

	if (isset($_POST["firstname"])) {
		$insert_data['firstname'] = $_POST["firstname"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["lastname"])) {
		$insert_data['lastname'] = $_POST["lastname"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["date_of_birth"])) {
		$insert_data['date_of_birth'] = $_POST["date_of_birth"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["zip"])) {
		$insert_data['zip'] = $_POST["zip"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["city"])) {
		$insert_data['city'] = $_POST["city"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["street"])) {
		$insert_data['street'] = $_POST["street"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["number"])) {
		$insert_data['number'] = $_POST["number"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["tel"])) {
		$insert_data['tel'] = $_POST["tel"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	if (isset($_POST["mail"])) {
		$insert_data['mail'] = $_POST["mail"];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
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
		if(move_uploaded_file($_FILES['key_priv']['tmp_name'], '../temp/'.$_FILES['key_priv']['name'])) {
			$file_handler = fopen('../temp/'.$_FILES['key_priv']['name'], 'r');
			
			if(($key = get_key_from_file($file_handle)) && ($key['type'] == "priv")) {
				fclose($file_handler);
				unlink('../temp/'.$_FILES['key_priv']['name']);
				return $key;
			}
			else {
				fclose($file_handler);
				unlink('../temp/'.$_FILES['key_priv']['name']);
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
		if(move_uploaded_file($_FILES['key_pub']['tmp_name'], '../temp/'.$_FILES['key_pub']['name'])) {
			$file_handler = fopen('../temp/'.$_FILES['key_pub']['name'], 'r');
			
			if(($key = get_key_from_file($file_handle)) && ($key['type'] == "pub")) {
				fclose($file_handler);
				unlink('../temp/'.$_FILES['key_pub']['name']);
				return $key;
			}
			else {
				fclose($file_handler);
				unlink('../temp/'.$_FILES['key_pub']['name']);
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