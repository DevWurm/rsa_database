<?
include_once("converter.php");


function mod ($basis, $exponent, $mod) { //returns the result of basis^exponent modulo mod
    $result = 1;
    while ($exponent > 0) {
     while (bcmod($exponent, 2) == 0) {
      $exponent = $exponent / 2;
      $basis = bcmod($basis * $basis, $mod);
     }
     $exponent = $exponent - 1;
     $result = bcmod($result * $basis, $mod);
    }
    return $result;		
}

function encode ($array, $key, $keyN) { //rsa encode array with public keys e and N; decode must be include separetly 
	$encoded = array();
	foreach ($array as $k) {
		$k = mod($k, $key, $keyN);
	}
	return $encoded;
}


function encrypt ($string, $pubkeye, $pubkeyN) { // rsa encrypt string with public key e and N and return database string
	$int_representation = convert_ascii_to_int($string); //convert string to int array
	$encrypted_array = encode($int_representation, $pubkeye, $pubkeyN); //encrypt int array
	return convert_int_array_to_db_string($encrypted_array); //convert array into seperator based string
}

function decrypt ($db_string, $privkeyd, $pubkeyN) {// rsa decrypt databse string with privkey d and public key N and return string
	$encrypted_array = convert_db_string_to_int_array($db_string); //convert seperator based string to int array 
	$int_representation = encode($encrypted_array, $privkeyd, $pubkeyN); //decrypt int array
	return convert_int_to_ascii($int_representation); //convert int array into string
}

?>