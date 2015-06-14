<?php
  include_once 'database.php';
  include_once 'hashalgorithm.php';

  function get_ids_by_key($key) { //$key is a key datastructure, like in the key session or in the keyfile parser (type, indivisual part, N part)
  	$compare_value = "";
	$db_link = connect_db();
	$user_ids = array(); //user ids where the key(pair) matches


	if ($key['type'] == "priv") {
		$compare_value = createHash($key['ind_part'].':'.$key['N_part']);
		$db_data = mysqli_query($db_link, "SELECT id FROM users INNER JOIN key_pairs ON users.k_id = key_pairs.id WHERE key_pairs.private_key = '$compare_value'");
	}
	else {
		$compare_value = $key['ind_part'].':'.$key['N_part'];
		$db_data = mysqli_query($db_link, "SELECT id FROM users INNER JOIN key_pairs ON users.k_id = key_pairs.id WHERE key_pairs.public_key = '$compare_value'");
	}

	$db_data = parse_sql_data($db_data);

	foreach ($db_data as $row) {
		array_push($user_ids, $row['id']);
	}

	return $user_ids;
  }


  function get_key_id_by_key($key) { //$key is key datastructure, like in the key session or in the keyfile parser (type, indivisual part, N part)

    $db_link = connect_db();

    if ($key['type'] == 'priv') {
      $compare_value = createHash($key['ind_part'].':'.$key['N_part']);
      $db_data = mysqli_query($db_link, "SELECT id FROM key_pairs WHERE private_key = '$compare_value'");
    }
    else {
      $compare_value = $key['ind_part'].':'.$key['N_part'];
      $db_data = mysqli_query($db_link, "SELECT id FROM key_pairs WHERE public_key = '$compare_value'");
    }

    if ($db_data && (mysqli_num_rows($db_data) != 1)) {
      die ("FEHLER: Fehlerhafte Key Daten");
    }
    else {
      $db_data = mysqli_fetch_assoc($db_data);
    }

    return $db_data['id'];
  }
?>
