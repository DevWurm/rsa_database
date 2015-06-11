
<?php
include_once 'numberOperations.php';
include_once 'key_files.php';
include_once 'database.php';

function get_random($length){
	$min  = "1";
	for ($i = 0; $i <= $length-2; $i++) {
		$min = $min."0";
	}
	$max  = "9";
	for ($i = 0; $i <= $length-2; $i++) {
		$max = $max."9";
	}

	return rand($min, $max);
}

function get_random_prime_by_length($length) {
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
	do {
		$p = get_random_prime_by_length(2);
		do {
		$q = get_random_prime_by_length(2);
		} while ($p==$q);

		$n = $p * $q;

		$phin = ($p - 1) * ($q - 1);

		do {
			$e = get_random_prime(2, $phin);
		} while (!($e>$p && $e>$q));


		$d = get_d_by_extended_euklid($phin, $e);
	} while (!($d>0 && $d<=$phin));

	$keys['N_part']=$n;
	$keys['e_part']=$e;
	$keys['d_part']=$d;

	return $keys;
}

function get_d_by_extended_euklid($PhiN, $e) { // returns privat key d
	$i = -1;
	$b = -1;
	while ($b!=0) {
		$i++;
		if ($i==0) $a = $PhiN; else $a = $b;
		if ($i==0) $b = $e; else $b = $r;
		if ($b!=0) $q = intval($a/$b);
		if ($b!=0) $r = $a%$b;

		$array[$i][0] = $a; // 0-->a
		$array[$i][1] = $b; // 1-->b
		$array[$i][2] = $q; // 2-->q
	}

	$first=0;
	while ($i>=0) {
		if ($first==0) {$s=1; $t=0; $first=1;}
		else {$s=$array[$i+1][4]; $t = $array[$i+1][3] - $array[$i][2]*$array[$i+1][4];}

		$array[$i][3] = $s; // 3-->s
		$array[$i][4] = $t; // 4-->t

		$i--;
	}

	return $t;
}


function generate_key_files() {
	$key_parts = generate_keys();
	$key_pub = array();
	$key_priv = array();
	$key_files = array();

	$key_pub['ind_part'] = $key_parts['e_part'];
	$key_pub['N_part'] = $key_parts['N_part'];
	$key_pub['type'] = 'pub';

	$key_priv['ind_part'] = $key_parts['d_part'];
	$key_priv['N_part'] = $key_parts['N_part'];
	$key_priv['type'] = 'priv';

	insert_keys($key_pub, $key_priv);

	$key_files['key_pub'] = generate_file_from_key($key_pub);
	$key_files['key_priv'] = generate_file_from_key($key_priv);

	if ($key_files['key_pub'] && $key_files['key_priv']) {
		return $key_files;
	}
	else {
		die("FEHLER: Fehler beim anlegen der Key Files");
	}
}
?>
