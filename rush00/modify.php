<?php
	require_once("functions/insert.php");
	require_once("functions.php");
	function authentification($LOGIN, $PASSWD)
	{
		if (!$LOGIN || !$PASSWD)
		{
			echo "login or password null\n";
			return (FALSE);
		}
		$DB = database_connect_to_rush00();
		$RESULT = mysqli_query($DB, "SELECT * FROM users");
		while ($DATA = mysqli_fetch_assoc($RESULT))
		{
			if (($DATA['pseudo'] == $LOGIN) && ($DATA['password'] == hash('whirlpool', $PASSWD)))
			{
				if ($DATA['isadmin'] == 1)
				{
					$_SESSION['isadmin'] = 1;
				}
				mysqli_free_result($RESULT);
				return (TRUE);
			}
		}
		mysqli_free_result($RESULT);
		return (FALSE);
	}
	if (isset($_POST["submit"]))
	{
		if (authentification($_POST['pseudo'], $_POST['oldpassword']))
		{
			$pseudo = $_POST['pseudo'];
			$newpassword = hash('Whirlpool', $_POST['newpassword']);
			$DB = database_connect_to_rush00();
			$REQ = mysqli_prepare($DB, "UPDATE users SET password=? WHERE pseudo=?");
			mysqli_stmt_bind_param($REQ, "ss", $newpassword, $pseudo);
			mysqli_stmt_execute($REQ);
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Ok, let's modify your password :)</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
	<nav>
		<ul>
			<a href="index.php"><li id="logo" title="Home"><img src="./img/logo.png"></li></a>
			<a href="login.php"><li style="background-color: white;" class="button" title="Login"><img src="./img/profile.png"></li></a>
			<?php
				if ($_SESSION['isadmin'] == 1)
				{
					?>
					<a href="administrator.php"><li class="button" title="Administation panel"><img src="./img/category.png"></li></a>
					<?php
				}
			?>
			<a href="basket.php"><li class="button" title="My cart"><img src="./img/basket.png"></li></a>
		</ul>
	</nav>
</header>
	<section class="band">
		<h1>Ok, let's modify your password :)</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="zonecreate">
			<form method="POST" action="modify.php">
				<p>Pseudo</p>
				<input type="text" name="pseudo" size="20" minlength="5" maxlength="20" required="required"/>
				<p>Old password</p>
				<input type="password" minlength="8" name="oldpassword" size="20" required="required"/>
				<p>New password</p>
				<input type="password" minlength="8" name="newpassword" size="20" required="required"/>
				<p><input type="submit" name="submit" value="modify !"></p>
			</form>
		</div>
	</main>
</body>
</html>