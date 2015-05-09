<?
include_once("converter.php");

function encode ($array, $pubkeye, $pubkeyN) { //rsa encode array with public keys e and N; decode must be include separetly 
	$encoded = array();
	foreach ($array as $k) {
		$k = mod($k, $pubkeye, $pubkeyN);
	}
	return $encoded;
}

function decode ($array, $privkeyd, $pubkeyN) { //rsa decode array with privat key d and public key N
	$decoded = array();
	foreach ($array as $k) {
		$k = mod($k, $privkeyd, $pubkeyN);
	}
	return $decoded;
}

function mod ($basis, $exponent, $n) { //returns the result of basis^exponent modulo n
	
}

function encrypt ($string, $pubkeye, $pubkeyN) { // rsa encrypt string with public key e and N and return database string
	$int_representation = convert_ascii_to_int($string); //convert string to int array
	$encrypted_array = encode($int_representation, $pubkeye, $pubkeyN); //encrypt int array
	return convert_int_array_to_db_string($encrypted_array); //convert array into seperator based string
}

function decrypt ($db_string, $privkeyd, $pubkeyN) {// rsa decrypt databse string with privkey d and public key N and return string
	$encrypted_array = convert_db_string_to_int_array($db_string); //convert seperator based string to int array 
	$int_representation = decode($encrypted_array, $privkeyd, $pubkeyN); //decrypt int array
	return convert_int_to_ascii($int_representation); //convert int array into string
}

?>