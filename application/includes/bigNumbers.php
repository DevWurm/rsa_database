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

    function addBigNumbers($a, $b){ // aEN, bEN
	$aArray = array();
	$bArray = array();
	$result = array();
	try{
	   	$lengthOfA = strlen(strval($a));
		$lengthOfB = strlen(strval($b));
	
		for($i = 0; $i <= $lengthOfA; $i++){ //puts $a into an array
			$aArray[$i] = strval(substr(strval($a), $i, 1));
		}
	
		for($i = 0; $i <= $lengthOfB; $i++){ //puts $b into an array
			$bArray[$i] = strval(substr(strval($b), $i, 1));
		}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #054]";
	}
	if(!$lengthOfA >= $lengthOfB){
		$cArray = array(); //switches positions of a and b values
		$cArray = $aArray;
		$aArray = $bArray;
		$bArray = $cArray;
		$c = $lengthOfA;
		$lengthOfA = $lengthOfB;
		$lengthOfB = $c;
	}
	try{
		$i = 0;

		while ($i-1 <= $lengthOfA){ //does an addition in writing

				$result[$i] = strval(intval($result[$i]) + intval($aArray[$lengthOfA-$i]) + intval($bArray[$lengthOfA-$i]));

				if(intval($result[$i]) >= 10){
					$result[$i+1] = strval(substr(strval($result[$i]), 0, 1));
					$result[$i] = strval(substr(strval($result[$i]), 1, 1));
				} 
			$i++;
		}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #079]";
	}
		$res;
	try{
		for($n = $i; $n >= 0; $n--){ //builds a new string from single number values
			$res = strval($res).strval($result[$n]);
		}
		if(substr(strval($res), 0, 1) == "0"){ //cuts the string to the rigth length
			$res = substr(strval($res), 1);
		}
		if(strlen(strval($res)) > $lengthOfA+1){ //cuts the string to the rigth length
			$res = substr(strval($res), 0, strlen(strval($res))-1);
		}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #093]";
	}
		return strval($res);	
   }

   function halfOfBigNumbers($a){ //$a := number-string
   	 $aArray = array();
	 $result = array();
	 try{
		 $lengthOfA = strlen(strval($a));
		 for($i = 0; $i <= $lengthOfA; $i++){ //puts the string into an array
			$aArray[$i] = strval(substr(strval($a), $i, 1));
		  }
	 }catch(Exception $e){
	 	echo "an error occured [bigNumbers.php #107]";
	 }
	 $i = 0; //relative counter
	 $k = 0; //absolut counter
	 $d = 0; //rest
	 try{
	 while($i <= $lengthOfA){ //does a division in writing
		$c = strval($d).strval($aArray[$i]);
		if(substr(strval($c),0,1) == "0"){
			$c = strval(substr(strval($c),1));
		}
		$flag = false;
		if(intval($c) < intval(2)){
			$flag = true;
			$c = strval($c).strval($aArray[$i+1]);
		}
			$result[$k] = strval(intval(intval($c)/intval(2)));
			$d = intval(intval($c) - (intval($result[$k]) * intval(2)));
		if($flag){
			$i = $i + 2;
		}else{
		$i++;
		}
		$k++;
	 }
	 }catch(Exception $e){
	 	echo "an error occured [bigNumbers.php #133]";
	 }
		return strval($result[$k-1]); //returns the long-integer value of the division
   }
?>
