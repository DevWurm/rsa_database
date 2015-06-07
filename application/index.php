<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head height=100% width=100%>
<title>Project-RSA</title>
<style>
 .offscreen {
  position: absolute;
  top: -30em;
  left: -300em;
}
#hmenu_title {
   font-weight: bold;
   font-size: 50px;
   color: #FFFFFF;
   background-color: #000000;
   padding-top: 10px;
   padding-bottom: 10px;
}
#hmenu_fileupload {
   font-weight: bold;
   color: #FFFFFF;
   background-color: #000000;
   padding-top: 10px;
   padding-bottom: 10px;
}
#menu {
   background-color: #FFFFFF;
}
#sitebar {
   background-color: #303030;
   vertical-align: top;
}
#th_grid {
   background-color: #000000;
   color: #FFFFFF;
}
#td_head {
   margin: 0;
   padding: .3em .4em .3em .4em;
   text-decoration: none;
   font-weight: bold;
   font-size: 30px;
   color: #FFFFFF;
}
#td_e {
   color: #929292;
}
#btn_insert {
   cursor: pointer;
   font: 12px Verdana,sans-serif;
   font-weight: bold;
   color: #FFFFFF;
   border: 1px solid #34495e;
   background-color: #34495e;
   width: 80px; padding: 2px;
   line-height: 130%;
}
#btn_upload {
   cursor: pointer;
   font: 12px Verdana,sans-serif;
   font-weight: bold;
   color: #FFFFFF;
   border: 1px solid #40C46D;
   background-color: #40C46D;
   width: 80px; padding: 2px;
   line-height: 130%;
}
#btn_edit {
   cursor: pointer;
   font: 12px Verdana,sans-serif;
   font-weight: bold;
   color: #FFFFFF;
   border: 1px solid #d35400;
   background-color: #d35400;
   width: 100px; padding: 2px;
   line-height: 130%;
}
#btn_delete {
   cursor: pointer;
   font: 12px Verdana,sans-serif;
   font-weight: bold;
   color: #FFFFFF;
   border: 1px solid #FF0000;
   background-color: #FF0000;
   width: 25px; padding: 2px;
   line-height: 130%;
}
#btn_paste {
   cursor: pointer;
   font: 12px Verdana,sans-serif;
   font-weight: bold;
   color: #FFFFFF;
   border: 1px solid #e67e22;
   background-color: #e67e22;
   width: 25px; padding: 2px;
   line-height: 130%;
}
#errorbox {
   padding: .3em .4em .3em .4em;
   text-align: center;
   background-color: #FF0000;
   font-size: medium;
   font-weight: bold;
   color: white;
}
input, div {
  margin: 0;
  padding: 0;
}
/*input[type="file"] {
  width: 200px;
  height: 25px;
  opacity: 0;
}

div#btn_file {
  width: 200px;
  height: 25px;
  background-color: #303030;
}

div#btn_file:hover {
  cursor: pointer;
}*/
</style>
<title></title>
<meta name="author" content="Administrator">
<meta name="editor" content="html-editor phase 5">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000" style="margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;height:100vh">
<?php
include_once('includes/database.php');
include_once('includes/verifyKeys.php');
$db_link = connect_db();
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
$session_id = -1;

if(! (mysqli_select_db($db_link, "database")))
{
         echo "<div align='center'><a id='errorbox'>Datenbank nicht gefunden!</a></div>";
         exit("");
}


if(isset($_POST['insert']))
{
         $session_id = getSessionState();
         if($session_id == 1 or $session_id == 3)
         {
                  if(insert_user())
                  {
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
if(isset($_POST['paste']))
{
         $sql = "SELECT * FROM user WHERE id='".$_POST['paste_id']."' ";
         $data = mysqli_query($db_link, $sql);
         if($data)
         {
                 while($row = mysqli_fetch_assoc($data))
                 {
                         $firstname = $row['firstname'];
                         $lastname = $row['lastname'];
                         $date_of_birth = $row['date_of_birth'];
                         $zip = $row['zip'];
                         $city = $row['city'];
                         $street = $row['street'];
                         $number  = $row['number'];
                         $tel = $row['tel'];
                         $mail = $row['email'];
                         $id = $row["id"];
                 }
         }
}
if(isset($_POST["delete"]))
{        $session_id = getSessionState();
         if($session_id == 1 or $session_id == 3)
         {
                 delete_user();
         }
}
if(isset($_POST["update"]))
{
         $session_id = getSessionState();
         if($session_id == 1 or $session_id == 3)
         {
                 change_user();
         }
}
//headline
echo "<table width=100% height=100% id='menu' cellspacing='0'><tr><td id='hmenu_title' colspan='1'>Project-RSA</td>";
//file upload
echo "<th id='hmenu_fileupload' align='right' valign='top'><table><tr><td>";
echo "<form enctype='multipart/form-data' action='index.php' method='POST'><table width=100%>";
echo "<tr><td><input type='hidden' name='MAX_FILE_SIZE' value='30000' />";
echo "<div id='btn_file'><input name='file_key_path' type='file'/></div></td>";
echo "<td><input id='btn_upload' type='submit' value='Upload Keys File' /></td></tr>";
echo "</table></form>";
echo "</td></tr></table></th>";
echo "</tr><tr>";
echo "<th id='sitebar' height=100%>";
echo "<table width=300px cellspacing='0'>";
//edit
 echo "<tr style='background-color:#303030'><td><form method='post' action='index.php'><table>";
 echo "<tr><td id='td_head'>Edit</td></tr>";
 echo "<tr><td id='td_e'>Firstname* </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Lastname* </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Birthday* </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Zip* </td><td><input name='zip' style='width:95%' type='text' value='".$zip."' disabled/></td></tr>";
 echo "<tr><td id='td_e'>City* </td><td><input name='city' style='width:95%' value='".$city."' type='text' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Street* </td><td><input name='street' style='width:95%' value='".$street."' type='text' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Number* </td><td><input name='number' style='width:95%' type='text' value='".$number."' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Telephone* </td><td><input name='tel' style='width:95%' value='".$tel."' type='text' disabled/></td></tr>";
 echo "<tr><td id='td_e'>Email* </td><td><input name='mail' style='width:95%' value='".$mail."' type='text' disabled/></td></tr>";
 //input fields
 echo "<tr><td id='td_e'>Firstname </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."'/></td></tr>";
 echo "<tr><td id='td_e'>Lastname </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."'/></td></tr>";
 echo "<tr><td id='td_e'>Birthday </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."'/></td></tr>";
 echo "<tr><td id='td_e'>Zip </td><td><input name='zip' style='width:95%' type='text' value='".$zip."'/></td></tr>";
 echo "<tr><td id='td_e'>City </td><td><input name='city' style='width:95%' type='text' value='".$city."'/></td></tr>";
 echo "<tr><td id='td_e'>Street </td><td><input name='street' name='anzahl' style='width:95%' value='".$street."' type='text'/></td></tr>";
 echo "<tr><td id='td_e'>Number </td><td><input name='number' style='width:95%' type='text' value='".$number."'/></td></tr>";
 echo "<tr><td id='td_e'>Telephone </td><td><input name='tel' style='width:95%' value='".$tel."' type='text'/></td></tr>";
 echo "<tr><td id='td_e'>Email </td><td><input name='mail' style='width:95%' value='".$mail."' type='text'/></td></tr>";
 echo "<tr><td><input type='hidden' name='id' value='".$id."'/></td></tr>";
 echo "<tr><td></td><td><input value='Apply' name='update' id='btn_edit' type='submit'/></td></tr>";
 echo "<tr><td id='td_e' colspan='2'>* Klicken Sie auf den Pfeil (Tabelle) um dieses Feld zu füllen</td></tr>";
 echo "</table></form></td></tr>";
 //insert
 echo "<tr style='background-color:#303030'><td><form method='post' action='index.php'><table width=100%>";
 echo "<tr><td id='td_head'>Add</td></tr>";
 echo "<tr><td id='td_e'>Firstname </td><td><input name='firstname' type='text' style='width:95%' value='".$firstname."'/></td></tr>";
 echo "<tr><td id='td_e'>Lastname </td><td><input name='lastname' type='text' style='width:95%' value='".$lastname."'/></td></tr>";
 echo "<tr><td id='td_e'>Birthday </td><td><input name='date_of_birth' style='width:95%' type='text' value='".$date_of_birth."'/></td></tr>";
 echo "<tr><td id='td_e'>Zip </td><td><input name='zip' style='width:95%' type='text' value='".$zip."'/></td></tr>";
 echo "<tr><td id='td_e'>City </td><td><input name='city' style='width:95%' type='text' value='".$city."'/></td></tr>";
 echo "<tr><td id='td_e'>Street </td><td><input name='street' style='width:95%' value='".$street."' type='text'/></td></tr>";
 echo "<tr><td id='td_e'>Number </td><td><input name='number' style='width:95%' type='text' value='".$number."'/></td></tr>";
 echo "<tr><td id='td_e'>Telephone </td><td><input name='tel' style='width:95%' value='".$tel."' type='text'/></td></tr>";
 echo "<tr><td id='td_e'>Email </td><td><input name='mail' style='width:95%' value='".$mail."' type='text'/></td></tr>";
 //echo "<tr><td><input type='hidden' name='insert_id' value='".$id."'/></td></tr>";
 echo "<tr><td></td><td><input value='Add' name='insert' id='btn_insert' type='submit'/></td></tr>";
 echo "</table></form></td></tr></table></th>";
 echo "<td width=100% valign='top' align='middle'><table bgcolor='#FFFFFF' width=90%>";
 echo "<tr><th id='th_grid'>Firstname</th><th id='th_grid'>Lastname</th><th id='th_grid'>Birthday</th></th><th id='th_grid'>Location</th>";
 echo "<th id='th_grid'>Telephone</th><th id='th_grid'>Email</th><th id='th_grid'></th>";
 $session_id_grid = getSessionState();
 if($session_id_grid == 2 or $session_id_grid = 3)
 {
          $sql = "SELECT * FROM user";
          $data = mysqli_query($db_link,$sql);
          $alt = 0;
          if($data)
          {
                  while($row = mysqli_fetch_assoc($data))
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

                          echo "<input name='delete' id='btn_delete' value='X' type='submit'/>";
                          echo "<input type='hidden' name='id' value='".$row['id']."'/>";

                          echo "<input name='paste' id='btn_paste' value='>' type='submit'/>";
                          echo "<input type='hidden' name='paste_id' value='".$row['id']."'/>";
                          echo "</form></td></tr>";
                          echo "</tr>";
                  }
          }
          else
          {
                  echo "<tr><td>Fail</td></tr>";
          }
 }
 else
 {
         echo "<tr><td>Wrong Key</td></tr>";
 }
 echo "</table></td></tr></table>"
?>
</body>
</html>