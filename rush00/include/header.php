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
			<a href="basket.php"><li class="button" title="My cart"><img src="./img/basket.png"></li></a>
		</ul>
	</nav>
</header>