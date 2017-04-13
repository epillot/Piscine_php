<?php
	session_start();
	require("include/head.php");
	require("functions.php");
	if ($_POST['delete'] == "DELETE USER")
	{
		$DB = database_connect_to_rush00();
		$REQ = mysqli_prepare($DB, "DELETE FROM users WHERE pseudo=?");
		mysqli_stmt_bind_param($REQ, "s", $_POST['choice']);
		mysqli_stmt_execute($REQ);
	}
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Administration panel = DELETE a user account !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="boxdelete">
			<form method="POST" action="deleteuser.php">
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
				<input type="submit" name="delete" value="DELETE USER">				
			</form>
		</div>
	</main>
</body>
</html>