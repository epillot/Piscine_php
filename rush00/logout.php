<?php
	session_start();
	require("include/head.php");
	$_SESSION['loggued_on_user'] = "";
	$_SESSION['isadmin'] = 0;
?>
<body>
	<?php require("include/header.php"); ?>
	<section class="band">
		<h1>See you soon :-)</h1>
		<a href="logout.php"><img title="Logout" src="./img/logout.png"></a>
	</section>
	<main class="view">
		<div class="zonelog">
			<p class="logout_msg">Your are now logged out !</p>
		</div>
	</main>
</body>
</html>