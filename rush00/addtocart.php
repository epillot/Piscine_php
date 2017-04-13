<?php
	session_start();
	require("functions.php");
	require("include/head.php");
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Yes baby ! Do it again...</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<?php
			if ($_POST['submit'] == "add to cart")
			// if (isset($_GET['id']))
			{
				$DB = database_connect_to_rush00();
				$id = mysqli_real_escape_string($DB, $_POST['id']);
				$RESULT = NULL;
				$RESULT = mysqli_query($DB, "SELECT * FROM products WHERE id = " . $id);
				$DATA = mysqli_fetch_assoc($RESULT);
				$ID = $_POST['id'];
				$_SESSION['cart'][$ID] += $_POST['nb'];?>
				<div class="zone">
					<p>Product added to your cart !</p>
				</div><?php
			}
			else
			{?>
				<div class="zone">
					<p>No selected product...</p>
				</div><?php
			}?>
	</main>
</body>
</html>