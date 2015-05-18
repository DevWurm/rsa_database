<?php
	include_once 'rsa.php';

    function encrypt_user_data($user_data, $pubkeye, $pubkeyN) {
    	$encrypted_data = array();
    	foreach ($user_data as $key => $value) {
    		if ($key != 'id') {
				$encrypted_data[$key] = encrypt($value, $pubkeye, $pubkeyN);
			}
		}
		return $encrypted_data;
    }
?> 