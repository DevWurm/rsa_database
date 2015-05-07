<?php

include("Verbindung.php");
$result = verbinden();

if ($_POST){

$puplic_key = $_POST["puplic_key"];
$privat_key = $_POST["privat_key"];

function eintragen($puplic_key, $privat_key)
   {
    $sql = "INSERT INTO
             keys(puplic_key, privat_key)
            VALUES
             ('$puplic_key', '$privat_key')";
    mysql_query ($sql);
   }

 if ($puplic_key !="" and $privat_key !="")
 {
  eintragen($puplic_key, $privat_key);
 }
 else {
         echo "<script language='JavaScript'>alert('Fehler! Bitte erneut versuchen.');</script>";
 }
}
?>