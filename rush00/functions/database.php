<?php
	function database_connect()
	{
		$add = "localhost";
		$user = "root";
		$pass = "root";
		$db = "";
		
		$mysqli = mysqli_connect($add, $user, $pass, $db);
		if (mysqli_connect_errno($mysqli))
		{
			echo "Echec de connexion à la base de données : " . mysqli_connect_error();
			return (NULL);
		}
		return ($mysqli);
	}

	function database_connect_to_rush00()
	{
		$add = "localhost";
		$user = "root";
		$pass = "root";
		$db = "rush00";
		
		$mysqli = mysqli_connect($add, $user, $pass, $db);
		if (mysqli_connect_errno($mysqli))
		{
			echo "Echec de connexion à la base de données : " . mysqli_connect_error();
			return (NULL);
		}
		return ($mysqli);
	}

?>