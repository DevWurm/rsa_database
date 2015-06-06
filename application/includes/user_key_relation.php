<?php
  include_once 'database.php'; 
  include_once 'hashalgorithm.php';
  
  function compareKeys($filekey, $userID){
      
        $filekey = createHash($filekey);
        $db_link = connect_db();
        $dbkey = 0;
      
        $sql = "SELECT * FROM user WHERE id='".$userID."' ";
        $data = mysqli_query($db_link, $sql);
      
        if($data){
                 while($row = mysqli_fetch_assoc($data))
                 {
                         $dbkey = $row["k_id"]; //please add the right field name 
                 }
         }
         if($filekey == $dbkey){
             return true;
         }
         return false;
}
      
?>






