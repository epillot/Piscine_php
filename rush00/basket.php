<?php
	session_start();
	require("include/head.php");
	require("functions.php");
?>
<body>
	<header>
	<nav>
		<ul>
			<a href="index.php"><li id="logo" title="Home"><img src="./img/logo.png"></li></a>
			<a href="login.php"><li class="button" title="Login"><img src="./img/profile.png"></li></a>
			<?php
				if ($_SESSION['isadmin'] == 1)
				{
					?>
					<a href="administrator.php"><li class="button" title="Administation panel"><img src="./img/category.png"></li></a>
					<?php
				}
			?>
			<a href="basket.php"><li style="background-color: white;" class="button" title="My cart"><img src="./img/basket.png"></li></a>
		</ul>
	</nav>
</header>
	<section class="band">
		<h1>Your cart => checkout</h1>
		<?php
			if (isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != "")
			{
				echo "<p> Bienvenue " . $_SESSION['loggued_on_user'] . " :-)</p>";
			}
		?>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="cart">
			<?php
				if (isset($_SESSION['cart']))
				{
					$DB = database_connect_to_rush00();
					$RESULT = NULL;
					$TOTAL = 0;
					$IDS = array_keys($_SESSION['cart']);
					$PLAGE = implode(",", $IDS);
					$RESULT = mysqli_query($DB, "SELECT * FROM products WHERE id IN (" . $PLAGE . ")");
					$I = 0;
				}
				else
				{
					echo "Your cart is empty dude :(";
				}
				?>
				<div class="entete">
					<p>Picture</p>
					<p>Product</p>
					<p>Unit price</p>
					<p>Quantity</p>
					<p>Price</p>
				</div>
				<?php
				if (isset($_SESSION['cart']))
				{
					while ($DATA = mysqli_fetch_assoc($RESULT))
					{
						?>
							<div class="row">
								<div class="mini"><img src="<?php echo $DATA['img'];?>">
								</div>
								<span class="name"><?php echo $DATA['name']; ?></span>
								<span class="pu"><?php echo number_format($DATA['price'], 2, ',', ' '); ?>€</span>
								<span class="quantity"><?php echo $_SESSION['cart'][$IDS[$I]]; ?></span>
								<span class="price">
								<?php
									$PRICEINTER = $DATA['price'] * $_SESSION['cart'][$IDS[$I]];
									echo number_format($PRICEINTER, 2, ',', ' ');
								?>€</span>
							</div>
						<?php
						$TOTAL += ($DATA['price'] * $_SESSION['cart'][$IDS[$I]]);
						$I += 1;
					}
					mysqli_free_result($RESULT);
				}
			?>
			<div class="lastrow">
				<p class="finalprice"><?php echo number_format($TOTAL, 2, ',', ' ') ?>€</p>
				<p>Total =></p>
			</div>
		</div>
		<div class="videpanier">
			<form method="POST" action="videpanier.php">
				<input type="submit" name="submit" value="EMPTY CART !">
			</form>
		</div>
		<div class="checkout">
			<?php
				if (!isset($_SESSION['loggued_on_user']) || $_SESSION['loggued_on_user'] == "")
				{?>
					<a href="login.php" style="color: #e74c3c;">Please, log in to checkout !</a><?php
				}
				else
				{?>
					<a href="checkout.php" style="color: #2ecc71;">Proceed to checkout</a><?php
				}?>
		</div>
	</main>
</body>
</html>