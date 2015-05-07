<?php
 define('MYSQL_HOST', 'localhost');
 define('MYSQL_USER', 'root');
 define('MYSQL_PASS', '');
 define('MYSQL_DATABASE', 'user');

 function verbinden()
 {
  $db_link=@mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
  if (! ($db_link))
   echo "<p>Es konnte keine MySQL-Verbindung hergestellt werden!</p>";
  else
  {
   $db_link = mysql_select_db(MYSQL_DATABASE, $db_link);
   if (! ($db_link))
    echo "<p>Die Datenbank \"".MYSQL_DATABASE."\" wurde nicht gefunden!</p>";
  }
  return $db_link;
 }
?>