<?php
   
function convert_ascii_to_int($ascii_value) {
	$int_representation = array();
	for ($i = 0; $i <= strlen($ascii_value)-1; $i++) {
		array_push($int_representation, ord(substr($ascii_value, $i, 1))); //convert string character at i to ASCII int representation and add to $int_representation
	}
	return $int_representation;
}

function convert_int_to_ascii($int_representation) {
	$ascii_value = "";
	foreach ($int_representation as $curr_int ) {
		$ascii_value = $ascii_value.chr($curr_int); //convert int array to ascii string
	}
	return $ascii_value;
}

function convert_int_array_to_db_string($array) {
	$db_string  = "";
	
	foreach ($array as $value) {
		$db_string = $db_string.$value.':'; //add array values to one string seperated by :
	}
	
	return $db_string;
}

function convert_db_string_to_int_array($db_string) {
	$array = array();
	while (strpos($db_string, ':') != FALSE) {
		array_push($array, substr($db_string, 0, strpos($db_string, ':'))); //add everything until : into array
		$db_string = substr($db_string, strpos($db_string, ':')+1); //remove handled part from beginning of string
	}
	return $array;
}

?>