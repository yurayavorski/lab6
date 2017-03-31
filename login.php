<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title> Lab5 </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="js.js"></script>
</head>
<body>

<div  id="form" >
<?php
	require("/configuration.php");
	$Config = new JConfig;
	$sql = new MySQLi($Config->host, $Config->user, $Config->password, $Config->db);
	$login = $_POST["login"];
	$password = crypt($_POST["password"], "123321");
	$result = $sql->query("SELECT * FROM users WHERE login = '$login'");
	$row = $result->fetch_assoc();
	$row = $row["Password"];
	$logged = false;
	echo '<h1>';
	if ($password == $row) {
		echo "Вітаємо, ". $login;
		$logged = true;

		$_SESSION["auth"] = true;
		$_SESSION["login"] = $login;
	}
	else {
		echo "Неправильний логін або ім'я";
	}
	echo '</h1>';
	?>
	<div class="inner">
		<?php if ($logged) : ?>
		<a href="/" class="button">Далі</a>
		<?php else :  ?>
		<a href="/" class="button">Назад</a>
		<?php endif;  ?>
	</div>
</div>






</body>

</html>