<?php
    
    function getSessionState(){
        
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		
        $pub_keyState = false;
        $priv_keyState = false;
        
        if(isset($_SESSION['key_pub'])){
			$pub_keyState = true;
        }
        if(isset($_SESSION['key_priv'])){
			$priv_keyState = true;
        }
        
		if ($priv_keyState && $pub_keyState) {
			return 3; //write and read permissions
		}
		elseif ($priv_keyState) {
			return 2; //read permissions
		}
		elseif ($pub_keyState) {
			return 1; //write permissions
		}
		else {
			return 0; //no permissions
		}
        
    }
?>