<?php

$id = $_POST["id"];
$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$geb = $_POST["geb"];
$plz = $_POST["plz"];
$ort = $_POST["ort"];
$str = $_POST["str"];
$hausnummer = $_POST["hausnummer"];
$tel = $_POST["tel"];
$mail = $_POST["mail"];

include("Verbindung.php");
$result = verbinden();

 if ($vorname !="" and $nachname !="" and $geb !="" and $plz !="" and $ort !="" and $str !="" and $hausnummer !="" and $tel !="" and $mail !="") {
 	
 

function aendern($id, $vorname, $nachname, $geb, $plz, $ort, $str, $hausnummer, $tel, $mail)
		{
		$sql = "UPDATE user SET nachname='$nachname', vorname='$vorname', geburtsdatum='$geb', plz='$plz', wohnort='$ort', strasse='$str', hausnummer='$hausnummer', telefon='$tel', email='$mail' WHERE id='$id';";
		mysql_query ($sql);
		}		   
		
		aendern($id, $vorname, $nachname, $geb, $plz, $ort, $str, $hausnummer, $tel, $mail);
 }
 else {
 	echo "<script language='JavaScript'>alert('Bitte füllen sie alle Felder aus.');</script>";
 }	
		

?>