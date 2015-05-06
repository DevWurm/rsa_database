<?

function convert_to_int($ascii_value) {
	$int_representation = array();
	for ($i = 0; i <= strlen($ascii_value)-1; $i++) {
		array_push($int_representation, ord(substr($ascii_value, $i, 1))); //convert stricg character at i to ASCII int representation and add to $int_representation
	}
	return $int_representation;
}


function codieren ($array) {
	foreach ($array as $k) {
		
	}
		
	return $codiert;
}


?>