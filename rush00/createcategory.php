<?php
	session_start();
	require("include/head.php");
	require("functions.php");
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>Administration panel = CREATE a new CATEGORY !</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="box">
			<form method="POST" action="createcategory2.php">
				<p>Name of the category</p>
				<input type="text" name="name" size="20" minlength="5" maxlength="20" required="required"/>
				<p><input type="submit" name="submit" value="CREATE !"></p>
			</form>
		</div>
	</main>
</body>
</html>
