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

include_once 'read_config.php';
include_once 'get_post.php';
include_once 'crypt_data.php';
include_once 'hashalgorithm.php';
 
function connect_db() {
	$config = read_config(); //get config data
 	$db_link = mysqli_connect(
 				$config['mysql_host'], 
 				$config['mysql_user'], 
 				$config['mysql_password'], 
 				$config['mysql_database'], 
 				$config['mysql_port']
				); //connect to database;
 	if (! ($db_link)) //check if connection failed
  		die("<p>Es konnte keine MySQL-Verbindung hergestellt werden!</p>");
  	else {
		return $db_link;
	}
 }

function parse_sql_data($data) { //parse sql data (every set as associative array into another array entry)
    	$parsed_data = array();
		$i = 0;
		while($temp = mysqli_fetch_assoc($data)) {
			$parsed_data[$i] = $temp;
			$i++;
		}
		return $parsed_data;
    }


function change_user(){
	$change_data = get_change_data();
	$db_link = connect_db(); //connect to database
	$change_data = encrypt_user_data($change_data, $pubkeye, $pubkeyN);
	$query = "UPDATE user SET 
			firstname='".$change_data['firstname']."', 
			lastname='".$change_data['lastname']."', 
			date_of_birth='".$change_data['date_of_birth']."', 
			zip='".$change_data['zip']."', 
			city='".$change_data['city']."', 
			street='".$change_data['street']."', 
			number='".$change_data['number']."', 
			tel='".$change_data['tel']."', 
			email='".$change_data['mail']."' 
			WHERE 
			id='".$change_data['id']."'";
	$query_status = mysqli_query($db_link, $query); //perform update
	return $query_status; //return failure (FLASE) or success (TRUE)
}		   

function insert_keys() {
	$key_data = get_key_data();
	$db_link = connect_db(); //connect to database
	$key_data['private_key'] = createHash($key_data['private_key']);
	$query = "INSERT INTO keys(puplic_key, privat_key) 
			VALUES (
			'".$key_data['puplic_key']."', 
			'".$key_data['privat_key']."'
			)";
	$query_status = mysqli_query($db_link, $query); //perform insertion
	return $query_status; //return failure (FLASE) or success (TRUE)
}

function insert_user() {
	$insert_data = get_insert_data();
	$db_link = connect_db();
	$insert_data = encrypt_user_data($insert_data, $pubkeye, $pubkeyN);
	$query = "INSERT INTO 
			user(firstname, lastname, date_of_birth, zip, city, street, 
			number, tel, email) 
			VALUES (
			'".$insert_data['firstname']."', 
			'".$insert_data['lastname']."', 
			'".$insert_data['date_of_birth']."', 
	 		'".$insert_data['zip']."',
	 		'".$insert_data['city']."', 
	 		'".$insert_data['street']."', 
	 		'".$insert_data['number']."', 
	 		'".$insert_data['tel']."', 
	 		'".$insert_data['mail']."'
			 )";
	$query_status = mysqli_query($db_link, $query); //perform insertion
	return $query_status; //return failure (FLASE) or success (TRUE)
}

function change_user() {
	$change_data = get_change_data();
	$db_link = connect_db();
	$change_data = encrypt_user_data($change_data, $pubkeye, $pubkeyN);
	$query = "UPDATE user SET 
					firstname = '".$insert_data['firstname']."',
					lastname = '".$insert_data['lastname']."', 
					date_of_birth = '".$insert_data['date_of_birth']."',
					zip = '".$insert_data['zip']."',
					city = '".$insert_data['city']."', 
					street = '".$insert_data['street']."', 
					number = '".$insert_data['number']."', 
					tel =  '".$insert_data['tel']."', 
					email = '".$insert_data['mail']."'
			WHERE id = '".$insert_data['id']."';";
	$query_status = mysqli_query($db_link, $query); //perform insertion
	return $query_status; //return failure (FLASE) or success (TRUE)
}

function delete_user() {
	$id = get_id();
	$query = "DELETE  FROM user WHERE id = $id;";
	$query_status = mysql_query ($query);
	return $query_status;
}

function delete_keys() {
	$privkey = get_privkey();
	$query = "DELETE  FROM keys WHERE id = $privkey;";
	$query_status = mysql_query ($query);
	return $query_status;
}
?>