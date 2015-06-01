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
}

?>