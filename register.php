<html>
<head>
	<meta charset="utf-8">
	<title> Lab5 </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="js.js"></script>
</head>
<body>



<form  id="form" method="POST">
	<h1>Реєстрація</h1>
	<div class="inner">
		<?php
			if (isset($_POST["login"])) :
				require("/configuration.php");
				$Config = new JConfig;
				$sql = new MySQLi($Config->host, $Config->user, $Config->password, $Config->db);
				$login = $_POST["login"];
				$password = crypt($_POST["password"], "123321");
				$sql->query("INSERT INTO users 
						(login, password)
						VALUES ('$login', '$password')");
			echo "Ви успішно авторизувалися";
			else :
		?>
		<label for="login">Введіть Логін</label>
		<input id="login" type="text" name="login"/>
		<hr color="#fff">

		<label for="password">Введіть пароль</label>
		<input id="password" type="password" name="password"/>

		<div id="subm">
			<button class="button" type="submit">Зареєструватися</button>
		</div>
			<?php endif; ?>

	</div>
</form>






</body>

</html>