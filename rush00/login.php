<?php
	session_start();
	require("include/head.php");
	require("functions/authentification.php");
?>
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
		<h1>Please, login !</h1>
		<?php
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
			{
				echo "<p> Bienvenue " . $_SESSION['loggued_on_user'] . " :-)</p>";
			}
		?>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
	<?php
		if (((!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] == "")) && isset($_POST['login']) && isset($_POST['passwd']) && ($_POST['login'] != NULL) && ($_POST['passwd'] != NULL) && (authentification($_POST['login'], $_POST['passwd']) == TRUE))
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
			$LOG = 1;
				?>
			<div class="zonelog">
				<p>Hello <?php echo $_SESSION['loggued_on_user']; ?>.</p>
				<p>Your are now logged in !</p>
			</div>
			<?php
		}
		if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "" && $LOG != 1)
		{
				?>
			<div class="zonelog">
				<p>Hello <?php echo $_SESSION['loggued_on_user']; ?>.</p>
				<p>Your are now logged in !</p>
			</div>
			<?php
		}
		if (!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] === "")
		{
			?>
			<div class="zone">
				<form method="POST" action="login.php">
					<p>User</p>
					<input type="text" name="login" size="20" required="required"/>
					<p>Password</p>
					<input type="password" name="passwd" size="20" required="required"/>
					<p><input type="submit" name="submit" value="OK"></p>
					<p><a href="create.php">Create account</a></p>
					<p><a href="modify.php">Change password</a></p>
					<p><a href="delete.php">Delete account</a></p>
				</form>
			</div>
		<?php } ?>
	</main>
</body>
</html>