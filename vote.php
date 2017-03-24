<?php
require("/configuration.php");
$Config = new JConfig;
$sql = new MySQLi($Config->host, $Config->user, $Config->password, $Config->db);
$ID = $_POST["id"];
$result = $sql->query("SELECT * FROM `voting` WHERE `#` = '$ID'");
$result = $result->fetch_assoc();
echo $_POST["vote"];
	if ($_POST["vote"] == 1) {
		$for = $result["for"];;
		$for++;
		if ( $sql->query("UPDATE `voting` SET `for` = '$for' WHERE `#` = '$ID'") )
			echo "TRUE";
		else
			echo "UPDATE 'voting' SET 'for' = '$for' WHERE # = '$ID'";
	}
	else {
		$against = $result["against"];
		$against++;
		$sql->query("UPDATE `voting` SET `against` = '$against' WHERE `#` = '$ID'");
	}
?>