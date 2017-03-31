<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
	<title> Lab5 </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="ES5/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js.js"></script>
</head>
<body>
<ul class="cross-menu">
	<li><a href="http://www.lab1.loc/">lab1</a></li>
	<li><a href="http://www.lab2.loc/">lab2</a></li>
	<li><a href="http://www.lab3.loc/">lab3</a></li>
	<li><a href="http://www.lab4.loc/">lab4</a></li>
	<li><a href="http://www.lab5.loc/">lab5</a></li>
</ul>
<style>
	body {
		position: relative !important;
	}
	.cross-menu {
		background: rgba(255, 255, 255, 0.5);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		list-style: none;
		padding: 0;
		margin: 0;
	}
	.cross-menu li {
		display: inline-block;
		padding: 20px 30px;
		border: 1px solid #fff;
		margin: 0;
	}
	.cross-menu li a {
		color: #333;
		text-decoration: none;
		border-bottom: solid 1px #666;
	}
</style>

<?php
	if ( isset($_SESSION["login"]) )  :
		$login = $_SESSION["login"];
?>
<div id="form" >

	<h1><?php echo "Ви увійшли як ".$login?></h1>
	<a class="button logout">Вийти з системи</a>
	<div class="inner">
		<?php
		require("/configuration.php");
		$Config = new JConfig;
		$sql = new MySQLi($Config->host, $Config->user, $Config->password, $Config->db);
		$result = $sql->query("SELECT * FROM voting ");
		while ($row = $result->fetch_assoc()):
		?>
			<div data-id="<?php echo $row["#"];?>">
				<span><?php echo $row["voting"]; ?>         </span><a href="#" class="button vfor">Так</a>
				<a href="#" class="button vagainst">Ні</a> <br />
				<span><?php echo "Так: ". $row["for"] . " Ні: " . $row["against"]  ?></span>
				<hr />
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php else:
		//--------------------------------------------
		?>
<form id="form" method="POST" action="login.php">

	<h1>Вхід в систему</h1>
	<div class="inner">

		<label for="login">Введіть Логін</label>
		<input id="login" type="text" name="login"/>
		<hr color="#fff">

		<label for="password">Введіть пароль</label>
		<input id="password" type="password" name="password"/>

		<div id="subm">
			<button class="button" type="submit">Увійти</button>
		</div>

		<hr color="#fff">
		<a href="register.php" class="button">Реєстрація</a>
	</div>
</form>
<?php endif;?>






</body>

</html>