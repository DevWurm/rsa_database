<?php
    @session_start();
    
    function getSessionState(){
        
        $pub_keyState = false;
        $priv_keyState = false;
        
        if(isset($_SESSION['pub_key'])){
            if($_SESSION['pub_key'] == true){
                $pub_keyState = true;
            }
        }
        if(isset($_SESSION['priv_key'])){
            if($_SESSION['priv_key'] == true){
                $priv_keyState = true;
            }
        }
        
        if($pub_keyState){
            if($priv_keyState){
                return 3; //Lese und Schreibrecht
            }else{
                return 1; //nur Schreibrecht
            }
        }else{
            if($priv_keyState){
                return 2; //nur Leserecht
            }
        }
        return 0; //keine Rechte
        
    }
?>