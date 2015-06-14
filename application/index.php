<?php
include_once('includes/database.php');
include_once('includes/verifyKeys.php');
include_once('includes/get_post.php');

// view data
$firstname = "";
$lastname = "";
$date_of_birth = "";
$city = "";
$zip = "";
$street = "";
$number = "";
$tel = "";
$mail = "";
$id = 0;

safeKeyUpload();
/*if (isset($_SESSION['key_pub']['ind_part'])) {
	echo "PublicKey: ".$_SESSION['key_pub']['ind_part']."<br>";
}
if (isset($_SESSION['key_priv']['ind_part'])) {
	echo "PrivatKey: ".$_SESSION['key_priv']['ind_part']."<br>";
}*/

//upload private key
if (isset($_POST['upload_key_priv'])) {
  get_privkey();
}

//delete private key
if (isset($_POST['delete_key_priv'])) {
  if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
  }
  unset($_SESSION['key_priv']);
}

//upload private key
if (isset($_POST['upload_key_pub'])) {
  get_pubkey();
}

//delete private key
if (isset($_POST['delete_key_pub'])) {
  if (session_status() == PHP_SESSION_DISABLED) {
    session_start();
  }
  unset($_SESSION['key_pub']);
}


//permission
$session_id = getSessionState();

// insert new user
if(isset($_POST['insert']))
{
         if($session_id == 1 or $session_id == 3)
		 echo "strings";
         {
                  if(insert_user())
                  {
                                  //get data for view
                          $firstname = $_POST["firstname"];
                          $lastname = $_POST["lastname"];
                          $date_of_birth = $_POST["date_of_birth"];
                          $zip = $_POST["zip"];
                          $city = $_POST["city"];
                          $street = $_POST["street"];
                          $number = $_POST["number"];
                          $tel = $_POST["tel"];
                          $mail = $_POST["mail"];
                          $id = $_POST["insert_id"];
                  }
                  else
                  {
                          die("ERROR: Insert failed...");
                  }
         }
}

// get data for edit view
if(isset($_POST['paste']))
{
         $data = get_user_by_id($_POST['paste_id']);
         if($data)
         {
                                 // get data for view
                         $firstname = $data['firstname'];
                         $lastname = $data['lastname'];
                         $date_of_birth = $data['date_of_birth'];
                         $zip = $data['zip'];
                         $city = $data['city'];
                         $street = $data['street'];
                         $number  = $data['number'];
                         $tel = $data['tel'];
                         $mail = $data['email'];
                         $id = $data["id"];
         }
}

// delete user
if(isset($_POST["delete"]))
{
         if($session_id == 1 or $session_id == 3)
         {
                 delete_user();
         }
}

// update data
if(isset($_POST["update"]))
{
         if($session_id == 1 or $session_id == 3)
         {
                 change_user();
         }
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head height=100% width=100%>
<title>rsa_database</title>

<link rel="stylesheet" href="css/style.css" />
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000" style="margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;height:100vh">

<!--headline-->
<table width=100% height=100% class='menu' cellspacing='0'><tr><td class='hmenu_title' colspan='1'>Project-RSA</td>

<!--file upload-->
<th class='hmenu_fileupload' align='right' valign='top'><table>
<tr>
  <form enctype='multipart/form-data' action='index.php' method='POST'>
    <?php
      if ($session_id == 0 || $session_id == 1) {
        echo '<td><div id="btn_file"><input name="key_priv" type="file"/></div></td>';
        echo '<td align="right"><input name="upload_key_priv" class="btn_upload" type="submit" value="Upload Private Key" /></td>';
      }
      else {
        echo '<td align="right"><input name="delete_key_priv" class="btn_upload" type="submit" value="Remove Private Key" /></td>';
      }
	 safeKey(); 
    ?>
  </form>
</tr>
<tr>
  <form enctype='multipart/form-data' action='index.php' method='POST'>
    <?php
      if ($session_id == 0 || $session_id == 2) {
        echo '<td><div id="btn_file"><input name="key_pub" type="file"/></div></td>';
        echo '<td align="right"><input name="upload_key_pub" class="btn_upload" type="submit" value="Upload Public Key" /></td>';
      }
      else {
        echo '<td align="right"><input name="delete_key_pub" class="btn_upload" type="submit" value="Remove Public Key" /></td>';
      }
	safeKey(); 
	
    ?>
  </form>
</tr>
</table></th>
</tr><tr>
<th class='sitebar' height=100%>
<div class='accordion'><table width=300px cellspacing='0'>

<?php
 //edit
 echo "<tr style='background-color:#303030'><td><div><form method='post' action='index.php'><table class='table_ani'>";
 echo "<tr><td class='td_head' align='left'>Edit</td></tr>";
 echo "<tr><td class='td_e'>Firstname* </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Lastname* </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Birthday* </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Zip* </td><td><input name='zip' style='width:95%' type='text' value='".$zip."' disabled/></td></tr>";
 echo "<tr><td class='td_e'>City* </td><td><input name='city' style='width:95%' value='".$city."' type='text' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Street* </td><td><input name='street' style='width:95%' value='".$street."' type='text' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Number* </td><td><input name='number' style='width:95%' type='text' value='".$number."' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Telephone* </td><td><input name='tel' style='width:95%' value='".$tel."' type='text' disabled/></td></tr>";
 echo "<tr><td class='td_e'>Email* </td><td><input name='mail' style='width:95%' value='".$mail."' type='text' disabled/></td></tr>";

 //input fields
 echo "<tr><td class='td_e'>Firstname </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."'/></td></tr>";
 echo "<tr><td class='td_e'>Lastname </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."'/></td></tr>";
 echo "<tr><td class='td_e'>Birthday </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."'/></td></tr>";
 echo "<tr><td class='td_e'>Zip </td><td><input name='zip' style='width:95%' type='text' value='".$zip."'/></td></tr>";
 echo "<tr><td class='td_e'>City </td><td><input name='city' style='width:95%' type='text' value='".$city."'/></td></tr>";
 echo "<tr><td class='td_e'>Street </td><td><input name='street' name='anzahl' style='width:95%' value='".$street."' type='text'/></td></tr>";
 echo "<tr><td class='td_e'>Number </td><td><input name='number' style='width:95%' type='text' value='".$number."'/></td></tr>";
 echo "<tr><td class='td_e'>Telephone </td><td><input name='tel' style='width:95%' value='".$tel."' type='text'/></td></tr>";
 echo "<tr><td class='td_e'>Email </td><td><input name='mail' style='width:95%' value='".$mail."' type='text'/></td></tr>";
 echo "<tr><td><input type='hidden' name='id' value='".$id."'/></td></tr>";
 echo "<tr><td></td><td><input value='Apply' name='update' class='btn_edit' type='submit'/></td></tr>";
 echo "<tr><td class='td_e' colspan='2'>* Press the orange arrow to fill this field</td></tr>";
 safeKey(); 
 echo "</table></form></div></td></tr>";

 //insert
 echo "<tr style='background-color:#303030'><td><div><form method='post' action='index.php'><table class='table_ani'>";
 echo "<tr><td class='td_head' align='left'>Add</td></tr>";
 echo "<tr><td class='td_e'>Firstname </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."'/></td></tr>";
 echo "<tr><td class='td_e'>Lastname </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."'/></td></tr>";
 echo "<tr><td class='td_e'>Birthday </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."'/></td></tr>";
 echo "<tr><td class='td_e'>Zip </td><td><input name='zip' style='width:95%' type='text' value='".$zip."'/></td></tr>";
 echo "<tr><td class='td_e'>City </td><td><input name='city' style='width:95%' type='text' value='".$city."'/></td></tr>";
 echo "<tr><td class='td_e'>Street </td><td><input name='street' style='width:95%' value='".$street."' type='text'/></td></tr>";
 echo "<tr><td class='td_e'>Number </td><td><input name='number' style='width:95%' type='text' value='".$number."'/></td></tr>";
 echo "<tr><td class='td_e'>Telephone </td><td><input name='tel' style='width:95%' value='".$tel."' type='text'/></td></tr>";
 echo "<tr><td class='td_e'>Email </td><td><input name='mail' style='width:95%' value='".$mail."' type='text'/></td></tr>";
 echo "<tr><td></td><td><input value='Add' name='insert' class='btn_insert' type='submit'/></td></tr>";
 echo "</table></form></div></td></tr>";
 echo "<tr><td><div style='height: 500px; background-color: #303030;'></div></td></tr></table></div></th>";
 echo "<td width=100% valign='top' align='middle'><table bgcolor='#FFFFFF' width=90%>";
 echo "<tr><th class='th_grid'>Firstname</th><th class='th_grid'>Lastname</th><th class='th_grid'>Birthday</th></th><th class='th_grid'>Location</th>";
 echo "<th class='th_grid'>Telephone</th><th class='th_grid'>Email</th><th class='th_grid'></th>";

 if($session_id == 2 or $session_id == 3)
 {
          $data = get_users_by_key();
          $alt = 0;
          if($data)
          {
                  foreach ($data as $row)
                  {
                          if($alt == 0)
                          {
                                  echo "<tr>";
                                  $alt = 1;
                          }
                          else
                          {
                                  echo "<tr bgcolor='#DDDDDD'>";
                                  $alt = 0;
                          }

                          echo "<td align='middle'>".$row['firstname']."</td>";
                          echo "<td align='middle'>".$row['lastname']."</td>";
                          echo "<td align='middle'>".$row['date_of_birth']."</td>";
                          echo "<td align='middle'> [".$row['zip']."] ".$row['city']." - ".$row['street']."  ".$row['number']."</td>";
                          echo "<td align='middle'>".$row['tel']."</td>";
                          echo "<td align='middle'>".$row['email']."</td>";
                          echo "<td width='50px'><form action='Main.php' method='post'>";

                          echo "<input name='delete' class='btn_delete' value='X' type='submit'/>";
                          echo "<input type='hidden' name='id' value='".$row['id']."'/>";

                          echo "<input name='paste' class='btn_paste' value='>' type='submit'/>";
                          echo "<input type='hidden' name='paste_id' value='".$row['id']."'/>";
						  safeKey(); 
                          echo "</form></td></tr>";
                          echo "</tr>";
                  }
          }
          else
          {
                  echo "<tr><td>No data</td></tr>";
          }
 }
 else
 {
         echo "<tr><td class='errorbox'>Not enough permissions</td></tr>";
 }
 echo "</table></td></tr></table>"
?>
</body>
</html>
