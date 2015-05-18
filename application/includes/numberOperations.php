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

   function calculateCrossfoot($chainS){ //$chainS := number-string
 	$n = 0;
	for($i = 0; $i < strlen($chainS); $i++){ //adds the integer value of every single number of the string
		try{
		$c = substr($chainS, $i, 1);
		$n = $n + intval($c);
		}catch(Exception $e){
			echo "an error occured [numberOperations.php #012]";
		}
	}
	// echo "crossfoot = ".$n."<br />";
	return $n;
 }
   
   function checkPrim($num){ //$num := positive unsigned int
 	if($num <= 2){
 		return true;
 	}
	try{
	for($i = 2; $i*$i <= $num; $i++){ //checks of prime value
		if($num % $i == 0){
			return false;
		}
	}
	}catch(Exception $e){
		echo "an error occured [numberOperations.php #030]";
	}
	return true;
 }
   
   function toLongVal($string){ //$string := number-string --> maybe long-double value
 	$long = "";
	try{
 	for($i = 0; $i < strlen($string); $i++){ //cuts decimal places
 		$c = substr($string, $i, 1);
		if($c == "."){
			return $long;
		}
		$long = $long.$c;
 	}
	}catch(Exception $e){
		echo "an error occured [numberOperations.php #046]";
	}
	return $long;
 }
?>





