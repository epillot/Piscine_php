<?php
	$DB = database_connect_to_rush00();
	if (!isset($_GET['category']))
	{
		$VAR = 'All';
	}
	else
	{
		$VAR = $_GET['category'];
	}
	

	$REQ = mysqli_prepare($DB, "SELECT products.id, products.name, products.price, products.description, products.img FROM products INNER JOIN liste ON products.name = liste.name_product WHERE liste.name_cat=?");
	mysqli_stmt_bind_param($REQ, "s", $VAR);
	mysqli_stmt_execute($REQ);
	mysqli_stmt_bind_result($REQ, $DATA['id'], $DATA['name'], $DATA['price'], $DATA['description'], $DATA['img']);
?>

<!-- select * from products INNER JOIN liste on products.name = liste.name_product where liste.name_cat like 'Pour seduire les femmes'; -->