<?php
	session_start();
	$HEADPATH = "include/head.php";
	require($HEADPATH);
	require("functions/insert.php");
	require("functions.php");
	$ADMIN = 0;
	if ($_POST['isadmin'] == 1)
	{
		$ADMIN = 1;
	}
	if (isset($_POST["submit"]) && $_POST["submit"] == "CREATE !")
	{
		// if ($_POST['pseudo'] && $_POST['email'] && $_POST['password'] && $_POST['firstname'] && $_POST['lastname'] && $_POST['adress'] && $_POST['zipcode'] && $_POST['submit'] == "CREATE !")
		// {
			if ((insert_user($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['adress'], $_POST['zipcode'])) != FALSE)
			{
				if ($ADMIN == 1)
				{
					$DB = database_connect_to_rush00();
					$REQ = mysqli_prepare($DB, "UPDATE users SET isadmin='1' WHERE pseudo=?");
					mysqli_stmt_bind_param($REQ, "s", $_POST['pseudo']);
					mysqli_stmt_execute($REQ);
				}
			}
			else
			{
				echo "ERROR11\n";
			}
		// }
		// else
		// {
		// 	echo "ERROR22\n";
		// }
	}
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Administration panel = CREATE a new user !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="box">
			<form method="POST" action="createuser.php">
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
				<p><input type="checkbox" name="isadmin" value="1"> admin ?</p>
				<p><input type="submit" name="submit" value="CREATE !"></p>
			</form>
		</div>
	</main>
</body>
</html>