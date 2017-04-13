<?php
	function insert_user(string $PSEUDO, string $EMAIL, string $PASSWORD, string $FIRSTNAME, string $LASTNAME, string $ADRESS, string $ZIPCODE)
	{
		$DB = database_connect_to_rush00();
		mysqli_select_db ($DB, "users");
		$ERROR = array(); // Permet de stocker les champs sur lesquels il y a des erreurs
		if (strlen($PSEUDO) < 5 || strlen($PSEUDO) > 20)
		{
			$ERROR[] = "pseudo";
		}
		if (filter_var($EMAIL, FILTER_VALIDATE_EMAIL) == FALSE)
		{
			$ERROR[] = "email";
		}
		if (strlen($PASSWORD < 8))
		{
			$ERROR[] = "password";
		}
		if (strlen($FIRSTNAME) < 2 || strlen($FIRSTNAME) > 20)
			$ERROR[] = 'firstname';
		if (strlen($LASTNAME) < 2 || strlen($LASTNAME) > 25)
			$ERROR[] = 'lastname';
		if (strlen($ADRESS) < 10 || strlen($ADRESS) > 100)
			$ERROR[] = 'address';
		if (strlen($ZIPCODE) != 5)
			$ERROR[] = 'zipcode';
		// if (!empty($ERROR))//Affiche les erreurs s'il y en a
		// 	return ($ERROR);
		$PASSWORD = hash('whirlpool', $PASSWORD);
		$PSEUDO = mysqli_real_escape_string($DB, $PSEUDO);
		$EMAIL = mysqli_real_escape_string($DB, $EMAIL);
		$PASSWORD = mysqli_real_escape_string($DB, $PASSWORD);
		$FIRSTNAME = mysqli_real_escape_string($DB, $FIRSTNAME);
		$LASTNAME = mysqli_real_escape_string($DB, $LASTNAME);
		$ADRESS = mysqli_real_escape_string($DB, $ADRESS);
		$ZIPCODE = mysqli_real_escape_string($DB, $ZIPCODE);

		if ((mysqli_query($DB, "INSERT INTO users(id, pseudo, email, password, firstname, lastname, address, zipcode) VALUES (NULL,'$PSEUDO','$EMAIL', '$PASSWORD', '$FIRSTNAME', '$LASTNAME', '$ADRESS', '$ZIPCODE')")) == TRUE)
		{
			return (TRUE);
		}
		return (FALSE);
	}
?>
