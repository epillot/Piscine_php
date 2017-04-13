<?php
	session_start();
	require("include/head.php");
	require("functions.php");
	if (!isset($_SESSION['init']) || $_SESSION['init'] == 0)
	{
		$_SESSION['init'] = 1;
		require_once("install.php");
	}
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>moustache.fr</h1>
		<?php
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
			{
				echo "<p> Welcome " . $_SESSION['loggued_on_user'] . " :-)</p>";
				if (isset($_SESSION['cart']) && $_SESSION['cart'] != "")
				{
					echo "<p>You have something in your cart :-D</p>";
				}
				else
				{
					echo "<p>Your cart is empty :-(</p>";
				}
			}
		?>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>

	</section>
	<main class="view">
		<?php
			require("include/select_bar.php");
			require("include/requests.php");
			while(mysqli_stmt_fetch($REQ))
			{
				?>
				<div class="product">
					<div class="illustration"><img src="<?php echo $DATA['img'] ?>">
				</div>
				<p class="titre"><?php echo $DATA['name'] ?></p>
				<p class="price"><?php echo number_format($DATA['price'], 2, ',', ' ') ?>€</p>
				<form method="POST" action="addtocart.php">
					<input type="number" value="1" min="1" name="nb" step="1">
					<input type="submit" name="submit" value="add to cart">
					<input style="display: none;" type="text" name="id" value="<?php echo $DATA['id']?>">
				</form>
				<p class="description"><?php echo $DATA['description'] ?></p>
				</div>
				<?php
			}
		?>
		</div>
	</main>
</body>
</html>


