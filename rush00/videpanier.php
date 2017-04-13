<?php
	session_start();
	if ($_POST['submit'] == "EMPTY CART !")
	{
		$_SESSION['cart'] = "";
		unset($_SESSION['cart']);
	}
	header("Location: basket.php");
?>