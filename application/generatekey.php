<?php
include_once 'includes/rsa_keys.php';

if (isset($_POST['generate'])){
	$key_files = generate_key_files();
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>generator</title>
	</head>

	<body>
		<form method="post" action="generatekey.php">
			<button name="generate" type="submit">generate key</button>
		</form>
		<?php
			if (isset($_POST['generate'])) {
				echo "<p>";
				echo "Private Key: <a download href='".$key_files[key_priv]."'>Download</a>";
				echo "</p>";
				echo "<p>";
				echo "Public Key: <a download href='".$key_files[key_pub]."'>Download</a>";
				echo "</p>";
			}
		?>
	</body>

</html>
