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
	$a_array = array();
	$b_array = array();
	$result_array = array();
	$result = "";
	$max_length = 0;
	
	$a_length = strlen($a);
	$b_length = strlen($b);
	
	if ($a_length > $b_length) {
		$max_length = $a_length;
	}
	else {
		$max_length = $a_length;
	}
	
	for ($i = 0; $i <= $a_length-1; $i++) {
		$a_array[$i] = substr($a, $i, 1);
	}
	
	for ($i = 0; $i <= $b_length-1; $i++) {
		$b_array[$i] = substr($b, $i, 1);
	}
	
	$result_array = array_fill(0, $max_length+1, 0);
	
	$i = 1;
	$temp_val = 0;
	while ($i <= $max_length) {
		if ($i > $a_length) {
			$result_array[$i-1] += $b_array[$b_length-$i];
		}
		elseif ($i > $b_length) {
			$result_array[$i-1] += $a_array[$a_length-$i];
		}
		else {
			$temp_val = intval($a_array[$a_length-$i] + $b_array[$b_length-$i]);
			if (($result_array[$i-1] + $temp_val) >= 10) {
				$result_array[$i] += 1;
				$result_array[$i-1] += $temp_val - 10;
			}
			else {
				$result_array[$i-1] += $temp_val;
			}
		}
		$i++;
	}
	
	$result_array = array_reverse($result_array);
	
	for ($i = 0; $i <= count($result_array)-1; $i++) {
		$result = $result.$result_array[$i];
	}
	
	while (substr($result, 0, 1) == "0") {
		$result = substr($result, 1);
	}
	
	return $result;
}

function halfOfBigNumbers($input){ //$input := number-string
	$input_array = array();
	$result_array = array();
	$remainder = 0;
	$result = "";
	
	for ($i = 0; $i <= strlen($input)-1; $i++) {
		$input_array[$i] = substr($input, $i, 1);
	}
	
	for ($i = 0; $i <= count($input_array)-1; $i++) {
		$input_array[$i] = strval($remainder).$input_array[$i];
		$result_array[$i] = floor(intval($input_array[$i]) / 2);
		$remainder = $input_array[$i] % 2;
	}
	
	for ($i = 0; $i <= count($result_array)-1 ; $i++) {
		$result = $result.$result_array[$i];
	}
	
	return $result;
}
?>
