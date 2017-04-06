<?php

function auth($login, $passwd)
{
	$pw = unserialize(file_get_contents("../htdocs/private/passwd"));
	foreach ($pw as $elem)
	{
		if ($elem['login'] == $login)
		{
			$pass = hash('whirlpool', $passwd);
			if ($elem['passwd'] == $pass)
				return true;
			return false;
		}
	}
	return false;
}

?>
