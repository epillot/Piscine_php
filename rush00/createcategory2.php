<?php
	session_start();
	require("functions.php");
	$DB = database_connect_to_rush00();
	$RESULT = NULL;
	$REQ = mysqli_prepare($DB, "INSERT INTO categories(name) VALUES (?)");
	mysqli_stmt_bind_param($REQ, "s", $_POST['name']);
	mysqli_stmt_execute($REQ);
	header("Location: createcategory.php");
	echo $_POST['name'];
?>