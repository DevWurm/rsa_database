<?php
/*
 * Author : Karl Kegel
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





