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

	$cleaves = array('firstname','lastname','date_of_birth','zip','number','city','street','tel','mail');
    
    for($i = 0; $i <= 8; $i++){
        
        if (isset($_POST[$cleaves[$i]])) {
        $insert_data[$cleaves[$i]] = $_POST[$cleaves[$i]];
    }
    else {
        die("ERROR: Fehlerhafte Eingabe!");
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
	if (isset($_POST['privkey'])) {
		$privkey= $_POST['privkey'];
	}
	else {
		die("ERROR: Fehlerhafte Eingabe!");
	}
	return $privkey;		
}
?>