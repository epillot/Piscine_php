<?php
	session_start();
	require("functions.php");
	$DB = database_connect_to_rush00();
	$IDS = array_keys($_SESSION['cart']);
	$PLAGE = implode(",", $IDS);
	$RESULT = mysqli_query($DB, "SELECT * FROM products WHERE id IN (" . $PLAGE . ")");

	$RES2 = mysqli_query($DB, "SELECT id_command FROM commands ORDER BY id_command DESC");

	$idcoo = mysqli_fetch_assoc($RES2);
	if ($idcoo == false)
	{
		$idco = 0;
	}
	else
	{
		$idco = $idcoo['id_command'] + 1;
	}
	$I = 0;
	$user = mysqli_real_escape_string($DB, $_SESSION['loggued_on_user']);

	while ($DATA = mysqli_fetch_assoc($RESULT))
	{
		$price = $DATA['price'];
		$product = mysqli_real_escape_string($DB, $DATA['name']);
		$quantite = $_SESSION['cart'][$IDS[$I]];
		$REQ = mysqli_query($DB, "INSERT INTO commands(pseudo, product, price, quantite, id_command) VALUES ('$user', '$product', $price, $quantite, $idco)");
		$I += 1;
	}
	mysqli_free_result($RESULT);
	$_SESSION['cart'] = "";
	unset($_SESSION['cart']);
	header("Location: index.php");
?>