<?php
	require("functions/insert.php");
	require("functions.php");
	if (isset($_POST["submit"]))
	{
		if ($_POST['pseudo'] && $_POST['email'] && $_POST['password'] && $_POST['firstname'] && $_POST['lastname'] && $_POST['adress'] && $_POST['zipcode'] && $_POST['submit'] == "create !")
		{
			if ((insert_user($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['adress'], $_POST['zipcode'])) == TRUE)
			{
				header("Location: login.php");
			}
			else
			{
				echo "ERROR11\n";
			}
		}
		else
		{
			echo "ERROR22\n";
		}
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Create yout account</title>
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
		<h1>Please, create your account !</h1>
		<?php
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
			{
				echo "<p> Bienvenue " . $_SESSION['loggued_on_user'] . " :-)</p>";
			}
		?>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="zonecreate">
			<form method="POST" action="create.php">
				<p>Pseudo</p>
				<input type="text" name="pseudo" size="20" minlength="5" maxlength="20" required="required"/>
				<p>Email</p>
				<input type="email" name="email" size="20" required="required"/>
				<p>Password</p>
				<input type="password" minlength="8" name="password" size="20" required="required"/>
				<p>Firstname</p>
				<input type="text" name="firstname" minlength="2" size="20" required="required"/>
				<p>Lastname</p>
				<input type="text" name="lastname" minlength="2" size="20" required="required"/>
				<p>Adress</p>
				<input type="text" name="adress" minlength="10" maxlength="100" size="20" required="required"/>
				<p>Zipcode</p>
				<input type="text" maxlength="5" minlength="5" name="zipcode" size="20" required="required"/>
				<p><input type="submit" name="submit" value="create !"></p>
			</form>
		</div>
	</main>
</body>
</html>