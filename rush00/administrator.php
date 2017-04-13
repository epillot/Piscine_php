<?php
	session_start();
	$HEADPATH = "include/head.php";
	require($HEADPATH);
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
					<a href="administrator.php"><li style="background-color: white;" class="button" title="Administation panel"><img src="./img/category.png"></li></a>
					<?php
				}
			?>
			<a href="basket.php"><li class="button" title="My cart"><img src="./img/basket.png"></li></a>
		</ul>
	</nav>
	</header>
	<section class="band">
		<h1>Administration panel = your are the BOSS !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
	<div class="zonecom">
		<h2>Commands</h2>
		<div class="command">
		<div class="line1">
			<span>No</span>
			<span>Client</span>
			<span>Product</span>
			<span>Qty</span>
			<span>ss-total</span>
		</div>
		<?php
			$DB = database_connect_to_rush00();
			$REQ = mysqli_query($DB, "SELECT * FROM commands ORDER BY id_command DESC");
			while ($DATA = mysqli_fetch_assoc($REQ))
			{
				$id = $DATA['id_command'];
				$product = $DATA['product'];
				$Q = $DATA['quantite'];
				$stotal = $Q * $DATA['price'];
				?>
					<div class="line">
						<span><?= $id ?></span>
						<span><?= $DATA['pseudo'] ?></span>
						<span><?= $product ?></span>
						<span><?= $Q ?></span>
						<span class="ppp"><?= number_format($stotal, 2, ',', ' '); ?> €</span>
					</div>
				<?php
			}
			mysqli_free_result($REQ);
		?>
		</div>
	</div>
	<div class="zonecom">
		<h2>Users panel</h2>
		<div class="panel">
			<a href="createuser.php">
				<div class="panelbutton">
					<img title="add" src="./img/adduser.png">
				</div>
			</a>
			<a href="edituser.php">
				<div class="panelbutton">
					<img title="edit" src="./img/moduser.png">
				</div>
			</a>
			<a href="deleteuser.php">
				<div class="panelbutton">
					<img title="delete" src="./img/deluser.png">
				</div>
			</a>
		</div>
	</div>
	<div class="zonecom">
		<h2>Products panel</h2>
		<div class="panel">
			<a href="createproduct.php">
				<div class="panelbutton">
					<img title="add" src="./img/add.png">
				</div>
			</a>
			<!-- <a href="editproduct.php">
				<div class="panelbutton">
					<img title="edit" src="./img/edit.png">
				</div>
			</a> -->
			<a href="deleteproduct.php">
				<div class="panelbutton">
					<img title="delete" src="./img/del.png">
				</div>
			</a>
		</div>
	</div>
	<div class="zonecom">
		<h2>Categories panel</h2>
		<div class="panel">
			<a href="createcategory.php">
				<div class="panelbutton">
					<img title="add" src="./img/addcat.png">
				</div>
			</a>
			<!-- <a href="editcategory.php">
				<div class="panelbutton">
					<img title="edit" src="./img/editcat.png">
				</div>
			</a> -->
			<a href="deletecategory.php">
				<div class="panelbutton">
					<img title="delete" src="./img/delcat.png">
				</div>
			</a>
		</div>
	</div>
	</main>
</body>
</html>