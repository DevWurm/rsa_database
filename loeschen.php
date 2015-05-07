<?php

$id = $_POST["id"];
$d = $_POST["privat"];

include("Verbindung.php");
$result = verbinden();

$sql = "DELETE  FROM user WHERE id = $id;";
$result = mysql_query ($sql);

$sql = "DELETE  FROM keys WHERE privat_key = $privat;";
$result = mysql_query ($sql);
?>