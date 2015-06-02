<?php

include_once 'numberOperations.php';

function get_random($length){
	$min  = "1";
	for ($i = 0; $i <= $length-2; $i++) {
		$min = $min."0";
	}
	$max  = "1";
	for ($i = 0; $i <= $length-2; $i++) {
		$max = $max."0";
	}
	
	return rand($min, $max);
}

function get_random_prime($length) {
	$rand_num = get_random($length);
	while (!checkPrime($rand_num)) {
		$rand_num = get_random($length);
	}
	return $rand_num;
}

function get_random_prime($min_val, $max_val) {
	$rand_num = rand($min_val, $max_val);
	while (!checkPrime($rand_num)) {
		$rand_num = rand($min_val, $max_val);
	}
	return $rand_num;
}


function generate_keys() {
	$p = get_random_prime(2);
	$q = get_random_prime(2);
	
	$n = $p * $q;
	
	$phin = ($p - 1) * ($q - 1);
	
	$e = get_random_prime(2, $phin);
	
	$d = get_d_by_extended_euklid($phin, $e);
}

function get_d_by_extended_euklid ($PhiN, $e) { // returns privat key d
	$i = 0;
	$a = $PhiN;
	$b = $e;
	do {
		$array[$i][0] = $a; // 0-->a
		$array[$i][1] = $b; // 1-->b
		
		$q = intval($a/$b);
		$r = $a%$b;
		
		$array[$i][2] = $q; // 2-->q
		
		$a = $b;
		$b = $r;
		
		$i++;
	} while ($b!=0);
	
	$i--;
	$s=1;
	$t=0;
	
	while ($i>0) {
		$array[$i][3] = $s; // 3-->s
		$array[$i][4] = $t; // 4-->t
		$i--;
		$s = $array[$i+1][4];
		$t = $array[$i+1][3] - $array[$i][2]*$array[$i+1][4];
	}
	
	return $t;
}

?>