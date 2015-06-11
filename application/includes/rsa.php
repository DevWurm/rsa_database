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

include_once("converter.php");


function mod ($basis, $exponent, $mod) { //returns the result of basis^exponent modulo mod
    $result = 1;
    while ($exponent > 0) {
     while (bcmod($exponent, 2) == 0) {
      $exponent = $exponent / 2;
      $basis = bcmod($basis * $basis, $mod);
     }
     $exponent = $exponent - 1;
     $result = bcmod($result * $basis, $mod);
    }
    return $result;
}

function encode ($array, $key, $keyN) { //rsa encode array with public keys e and N; decode must be include separetly
	$encoded = array();
	$i=0;
	foreach ($array as $k) {
		$k = mod($k, $key, $keyN);
		$encoded[$i] = $k;
		$i++;
	}
	return $encoded;
}


function encrypt ($string, $pubkeye, $pubkeyN) { // rsa encrypt string with public key e and N and return database string
	$int_representation = convert_ascii_to_int($string); //convert string to int array
	$encrypted_array = encode($int_representation, $pubkeye, $pubkeyN); //encrypt int array
	return convert_int_array_to_db_string($encrypted_array); //convert array into seperator based string
}

function decrypt ($db_string, $privkeyd, $pubkeyN) {// rsa decrypt databse string with privkey d and public key N and return string
	$encrypted_array = convert_db_string_to_int_array($db_string); //convert seperator based string to int array
	$int_representation = encode($encrypted_array, $privkeyd, $pubkeyN); //decrypt int array
	return convert_int_to_ascii($int_representation); //convert int array into string
}


?>
