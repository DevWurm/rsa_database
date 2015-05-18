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

function convert_ascii_to_int($ascii_value) {
	$int_representation = array();
	for ($i = 0; $i <= strlen($ascii_value)-1; $i++) {
		array_push($int_representation, ord(substr($ascii_value, $i, 1))); //convert string character at i to ASCII int representation and add to $int_representation
	}
	return $int_representation;
}

function convert_int_to_ascii($int_representation) {
	$ascii_value = "";
	foreach ($int_representation as $curr_int ) {
		$ascii_value = $ascii_value.chr($curr_int); //convert int array to ascii string
	}
	return $ascii_value;
}

function convert_int_array_to_db_string($array) {
	$db_string  = "";
	
	foreach ($array as $value) {
		$db_string = $db_string.$value.':'; //add array values to one string seperated by :
	}
	
	return $db_string;
}

function convert_db_string_to_int_array($db_string) {
	$array = array();
	while (strpos($db_string, ':') != FALSE) {
		array_push($array, substr($db_string, 0, strpos($db_string, ':'))); //add everything until : into array
		$db_string = substr($db_string, strpos($db_string, ':')+1); //remove handled part from beginning of string
	}
	return $array;
}

?>