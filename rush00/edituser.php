<?php
	session_start();
	$HEADPATH = "include/head.php";
	require($HEADPATH);
	require("functions.php");
	if ($_POST['isadmin'] == 1)
	{
		$DB = database_connect_to_rush00();
		$REQ = mysqli_prepare($DB, "UPDATE users SET isadmin='1' WHERE pseudo=?");
		mysqli_stmt_bind_param($REQ, "s", $_POST['choice']);
		mysqli_stmt_execute($REQ);
	}
	if ($_POST['isadmin'] == 0)
	{
		$DB = database_connect_to_rush00();
		$REQ = mysqli_prepare($DB, "UPDATE users SET isadmin='0' WHERE pseudo=?");
		mysqli_stmt_bind_param($REQ, "s", $_POST['choice']);
		mysqli_stmt_execute($REQ);
	}
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Administration panel = EDIT a user account !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="box">
			<form method="POST" action="edituser.php">
				<select name="choice">
					<?php
						$DB = database_connect_to_rush00();
						$RESULT = NULL;
						$RESULT = mysqli_query($DB, "SELECT * FROM users WHERE pseudo !='admin'");
						if ($RESULT != NULL)
						{
							while ($DATA = mysqli_fetch_assoc($RESULT))
							{
								?>
								<option><?php echo $DATA['pseudo'] ?></option>
								<?php
							}
							mysqli_free_result($RESULT);
						}
					?>
				</select>
				<p><input type="checkbox" name="isadmin" value="1"> admin ?</p>
				<p><input type="checkbox" name="isadmin" value="0"> user ?</p>
				<p><input type="submit" name="submit" value="EDIT !"></p>
			</form>
		</div>
		<?php
		$DB = database_connect_to_rush00();
		$RESULT = NULL;
		$RESULT = mysqli_query($DB, "SELECT * FROM users WHERE isadmin !='0' && pseudo !='admin'");
		if ($RESULT != NULL)
		{
			while ($DATA = mysqli_fetch_assoc($RESULT))
			{?>
				<div class="box2">
					<p><?php echo $DATA['pseudo']; ?></p>
				</div><?php
			}
			mysqli_free_result($RESULT);

		}
		$RESULT = mysqli_query($DB, "SELECT * FROM users WHERE isadmin !='1'");
		if ($RESULT != NULL)
		{
			while ($DATA = mysqli_fetch_assoc($RESULT))
			{?>
				<div class="box3">
					<p><?php echo $DATA['pseudo']; ?></p>
				</div><?php
			}
			mysqli_free_result($RESULT);
		}
		?>
		</div>
	</main>
</body>
</html>