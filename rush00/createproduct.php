<?php
	session_start();
	require("include/head.php");
	require("functions.php");
	if (isset($_POST["submit"]) && $_POST["submit"] == "CREATE !")
	{
		if ($_POST["name"] && $_POST["price"] && $_POST['description'])
		{
			$DB = database_connect_to_rush00();
			$name = mysqli_real_escape_string($DB, $_POST['name']);
			$price = mysqli_real_escape_string($DB, $_POST['price']);
			$desc = mysqli_real_escape_string($DB, $_POST['description']);
			if ($_POST['path'])
				$req = mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, '$name', '$price', '$desc', '$path')");
			else
			{
				$req = mysqli_query($DB, "INSERT INTO products(id, name, price, description, img) VALUES (NULL, '$name', '$price', '$desc', DEFAULT)");
			}
			if ($req != false)
			{
					mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('$name', 'All')");
					$req = mysqli_query($DB, "SELECT * FROM categories");
					while ($DATA = mysqli_fetch_assoc($req))
					{
							$cat = preg_replace("/ /", "_", $DATA['name']);
							if ($_POST[$cat] == 1 && $cat != 'All')
							{
								$realcat = $DATA['name'];
							 	mysqli_query($DB, "INSERT INTO liste(name_product, name_cat) VALUES ('$name', '$realcat')");
							}
					}
					mysqli_free_result($req);
			 }
		}
	}
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Administration panel = CREATE a new PRODUCT !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="box">
			<form method="POST" action="createproduct.php">
				<p>Name of the product</p>
				<input type="text" name="name" size="20" minlength="5" maxlength="20" required="required" />
				<p>Price (without '$' sign)</p>
				<input type="number" step="0.01" name="price" size="20" required="required"/>
				<p>Description</p>
				<input type="text" name="description" minlength="8" maxlength="200" size="20" required="required" />
				<p>Picture path</p>
				<input type="text" name="path" minlength="2" size="20" />
				<p>Choose categories</p>
				<?php
						$DB = database_connect_to_rush00();
						$RESULT = NULL;
						$RESULT = mysqli_query($DB, "SELECT * FROM categories");
						if ($RESULT != NULL)
						{
							while ($DATA = mysqli_fetch_assoc($RESULT))
							{
								if ($DATA['name'] != 'All')
								{
									?>
									<input type="checkbox" value="1" name="<?php echo $DATA['name'] ?>">
									<?php echo $DATA['name'] ?>
									<br />
									<?php
								}
							}
							mysqli_free_result($RESULT);
						}
					?>
				<p><input type="submit" name="submit" value="CREATE !"></p>
			</form>
		</div>
	</main>
</body>
</html>


<!-- a chaque fois quon cree un produit on rajoute le coupe produit/all dans liste -->
