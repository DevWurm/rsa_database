<?
include_once("converter.php");

function encode ($array, $key) { //rsa encode array with key (public or private key)
	$encoded = array();
	foreach ($array as $k) {
		
	}
		
	return $encoded;
}

function encrypt ($string, $pubkey) { // rsa encrypt string with pubkey and return database string
	$int_representation = convert_ascii_to_int($string); //convert string to int array
	$encrypted_array = encode($int_representation, $pubkey); //encrypt int array
	return convert_int_array_to_db_string($encrypted_array); //convert array into seperator based string
}

function decrypt ($db_string, $privkey) {// rsa decrypt databse string with privkey and return string
	$encrypted_array = convert_db_string_to_int_array($db_string); //convert seperator based string to int array 
	$int_representation = encode($encrypted_array, $privkey); //decrypt int array
	return convert_int_to_ascii($int_representation); //convert int array into string
}

?>