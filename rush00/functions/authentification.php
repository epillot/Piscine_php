<?php
	function authentification($LOGIN, $PASSWD)
	{
		require("functions/database.php");
		if (!$LOGIN || !$PASSWD)
		{
			echo "login or password null\n";
			return (FALSE);
		}
		$DB = database_connect_to_rush00();
		$RESULT = mysqli_query($DB, "SELECT * FROM users");
		while ($DATA = mysqli_fetch_assoc($RESULT))
		{
			if (($DATA['pseudo'] == $LOGIN) && ($DATA['password'] == hash('whirlpool', $PASSWD)))
			{
				if ($DATA['isadmin'] == 1)
				{
					$_SESSION['isadmin'] = 1;
				}
				mysqli_free_result($RESULT);
				return (TRUE);
			}
		}
		mysqli_free_result($RESULT);
		return (FALSE);
	}
?>
