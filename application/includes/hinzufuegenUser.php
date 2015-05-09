<?php

include("Verbindung.php");
$result = verbinden();

if ($_POST){

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$geb = $_POST["geb"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$str = $_POST["str"];
$hausnummer = $_POST["hausnummer"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];

function eintragen($vorname, $nachname, $geb, $plz, $ort, $str, $hausnummer,
                   $tel, $mail)
   {
    $sql = "INSERT INTO
             user(vorname, nachname, geburtsdatum, plz, wohnort, strasse, hausnummer,
             telefon, email)
            VALUES
             ('$vorname', '$nachname', '$geb', '$plz', '$ort',
              '$str', '$hausnummer', '$tel', '$mail')";
    mysql_query ($sql);
   }

 if ($vname !="" and $nname !="" and $anrede !="" and $geb !="" and $plz !="" and $ort !="" and $str !="" and $hnummer !="" and $tel !="" and $mail !="")
 {
  eintragen($vname, $nname, $anrede, $geb, $plz, $ort, $str, $hnummer,
                   $tel, $mail);
 }
 else {
         echo "<script language='JavaScript'>alert('Bitte füllen sie alle Felder aus.');</script>";
 }
}

?>