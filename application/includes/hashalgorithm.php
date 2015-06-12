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

   include_once 'numberOperations.php';
   include_once 'bigNumbers.php';
   include_once 'converter.php';
   //the executable funktion is createHash($chain)
   //all other functions can bee used too, but are in main purposes help functions

 function createHash($chain){ //$val must be a ascii string

    //convert ascii to number string
    $chain = convert_ascii_to_int($chain);
	$chain = implode($chain);

    $chain = fitToLength($chain);

 	try{
 	$chainS = strval($chain);  //string value
 	$length = strlen($chainS); //length of the string
	}catch(Exception $e){
		echo "an error occured";
	}

	$cf = calculateCrossfoot($chainS); //adds every single number value
	$key = array(); //the key for encryption
	$key = buildKey($chain, $cf); //the key build function returns an array of unsigned int numbers
	
	$encryption = replace($chainS, $key); //replaces every single number with its key value
	// echo "encryption (A) = ".$encryption."<br />";
	if(strlen(strval($encryption)) < 16){ //cut the new string to the rigth length
		$encryption = strval($encryption).substr(strval($encryption), 0, 16-strlen(strval($encryption)));
	}
	
	return finalEncryptor($encryption, $cf); //a final asynchron encryption
 }

 function buildKey($chain, $cf){ //$chain := number-string ; $cf := crossfoot
 	$key = array();
	try{
	for($i = 0; $i <= 9; $i++){
		$chain = $chain + $cf; //adds crossfoot to the number
		$flag = false;
		while(!$flag){ //checks of prime value
			$chain = $chain + 1;
			$flag = checkPrime($chain);
		}
		$key[$i] = intval($chain % 79); //key becomes the modulo value
	}
	}catch(Exception $e){
		echo "an error occured";
	}
	return $key;
 }

 function replace($chainS, $key){ //$chainS := number-string ; $key = key-array of positive unsigned integers
 	$encryption = "";
	try{
	for($i = 0; $i < strlen($chainS); $i++){ //replaces number-chars with keys
		$encryption = strval($encryption).strval($key[intval(substr($chainS, $i, 1))]);
	
	}
	}catch(Exception $e){
		echo "an error occured";
	}
	try{
	return $encryption;
	}catch(Exception $e){
		echo "an expected error occured";
	}
 }
 function finalEncryptor($encryption, $cf){ //$encryption := number-string; $cf := crossfoot
 	try{
 	$encryptionB = strval($encryption); //a copy of the main string
	for($i = 0; $i < ($cf * 37) % 7; $i++){ //moves numbers sespecially to the crossfoot
		$encryptionB = substr($encryptionB, 1, (strlen (strval ($encryption ))) - 2);
		$encryptionB = $encryptionB .substr($encryptionB, 0, 1);
	
	}
	}catch(Exception $e){
		echo "an error occured";
	}
	try{
	$encryptionB = addBigNumbers($encryption, $encryptionB); //adds the two numbers
	$encryptionB = halfOfBigNumbers($encryptionB); //returns number/2
	$encryptionB = substr($encryptionB, 0, 16); //cuts the string to the right length
	$encryptionB = toLongVal($encryptionB); //makes the string to a pseudo long value

	if(strlen($encryptionB) == 16){ //CONTROL
		return $encryptionB;
	}
	return substr($encryptionB, 0, 16);
	}catch(Exception $e){
		echo "an error occured";
		return strval($encryption); //plan b ^^
	}
 }
 function fitToLength($chain){
	if(strlen(strval($chain)) == 8){ //if the length is already 8
		return $chain;
	}
	$k = 0;
	while(strlen(strval($chain)) < 8){ //if the length is shorter than 8
		$chain = $chain.substr(strval($chain), $k, 1); //adds an iterative value to the end
		$k++;
	}

	while(strlen(strval($chain)) > 8){ //if the length is longer than 8
		$a = substr($chain,0,1);
		$b = substr($chain,strlen($chain)-1,1);
		$a = toLongVal(($a+$b)/2); //cuts dezimal numbers
		$chain = strval($a).strval($chain);
		$chain = strval(substr($chain,0,strlen($chain)-2)); //makes it shorter
	}
	return $chain;
 }
?>
