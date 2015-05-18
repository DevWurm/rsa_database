<?php
/*
 * Author : Karl Kegel
 */
    function addBigNumbers($a, $b){ // aEN, bEN
	$aArray = array();
	$bArray = array();
	$result = array();
	try{
   	$lengthOfA = strlen(strval($a));
	$lengthOfB = strlen(strval($b));
	// echo "lengthOfA = ".$lengthOfA."<br />";
	// echo "lengthOfB = ".$lengthOfB."<br />";
    // echo "-----------------<br /> aArray : <br/>-----------------<br />";
	for($i = 0; $i <= $lengthOfA; $i++){ //puts $a into an array
		$aArray[$i] = strval(substr(strval($a), $i, 1));
	//	echo $aArray[$i]."<br />";
	}
	//  echo "-----------------<br /> bArray : <br/>-----------------<br />";
	for($i = 0; $i <= $lengthOfB; $i++){ //puts $b into an array
		$bArray[$i] = strval(substr(strval($b), $i, 1));
	//	echo $bArray[$i]."<br />";
	}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #025]";
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
	//	echo "-----------------<br /> resultArray : <br/>-----------------";
		while ($i-1 <= $lengthOfA){ //does an addition in writing
	//			echo "<br />".$result[$i]." --> ";
				$result[$i] = strval(intval($result[$i]) + intval($aArray[$lengthOfA-$i]) + intval($bArray[$lengthOfA-$i]));
	//			echo $result[$i];
				if(intval($result[$i]) >= 10){
					$result[$i+1] = strval(substr(strval($result[$i]), 0, 1));
					$result[$i] = strval(substr(strval($result[$i]), 1, 1));
	//				echo " --> ".$result[$i];
				} 
			$i++;
		}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #051]";
	}
		$res;
	//	echo "<br />-----------------<br />result<br />-----------------<br />";
	try{
		for($n = $i; $n >= 0; $n--){ //builds a new string from single number values
	//		echo $result[$n]."<br />";
			$res = strval($res).strval($result[$n]);
		}
		if(substr(strval($res), 0, 1) == "0"){ //cuts the string to the rigth length
			$res = substr(strval($res), 1);
		}
		if(strlen(strval($res)) > $lengthOfA+1){ //cuts the string to the rigth length
			$res = substr(strval($res), 0, strlen(strval($res))-1);
		}
	}catch(Exception $e){
		echo "an error occured [bigNumbers.php #067]";
	}
		return strval($res);	
   }

   function halfOfBigNumbers($a){ //$a := number-string
   	 $aArray = array();
	 $result = array();
	 try{
	 $lengthOfA = strlen(strval($a));
	/* 
	 * echo "lengthOfA = ".$lengthOfA."<br />";
     * echo "-----------------<br /> aArray : <br/>-----------------<br />";
	 */ 
	 for($i = 0; $i <= $lengthOfA; $i++){ //puts the string into an array
		$aArray[$i] = strval(substr(strval($a), $i, 1));
	//	echo $aArray[$i]."<br />";
	  }
	 }catch(Exception $e){
	 	echo "an error occured [bigNumbers.php #086]";
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
			$d = intval(intval($c) - (intval($result[k]) * intval(2)));
   /*		
	* 		echo "c = ".$c."...";
	*		echo "flag = ".$flag."...";
	*		echo "result = ".$result[$k]."...";
	*		echo "d = ".$d."<br />";
	*/
		if($flag){
			$i = $i + 2;
		}else{
		$i++;
		}
		$k++;
	 }
	 }catch(Exception $e){
	 	echo "an error occured [bigNumbers.php #118]";
	 }
		return strval($result[$k-1]); //returns the long-integer value of the division
   }
?>
