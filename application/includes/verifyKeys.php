<?php
    
    function getSessionState(){
        
		if (session_status() == PHP_SESSION_DISABLED) {
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
	
	function safeKey() {
		if (isset($_SESSION['key_priv'])) {
			echo '<input type="hidden" name="key_priv_ind" value="'.$_SESSION['key_priv']['ind_part'].'"> ';
			echo '<input type="hidden" name="key_priv_N" value="'.$_SESSION['key_priv']['N_part'].'"> ';
		}
		if (isset($_SESSION['key_pub'])) {
		echo '<input type="hidden" name="key_pub_ind" value="'.$_SESSION['key_pub']['ind_part'].'"> ';
		echo '<input type="hidden" name="key_pub_N" value="'.$_SESSION['key_pub']['N_part'].'"> ';
	}
	}
	
	function safeKeyUpload() {
		if (isset($_POST['key_pub_ind'])) {
			$_SESSION['key_pub']['ind_part'] = $_POST['key_pub_ind'];
			$_SESSION['key_pub']['N_part'] = $_POST['key_pub_N'];
		}
		
		if (isset($_POST['key_priv_ind'])) {
			$_SESSION['key_priv']['ind_part'] = $_POST['key_priv_ind'];
			$_SESSION['key_priv']['N_part'] = $_POST['key_priv_N'];
		}
	}
?>