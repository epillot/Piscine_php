<?php

if ($_POST['submit'] == 'OK' && $_POST['newpw'] != "" && $_POST['login'] != "" && $_POST['oldpw'] != "")
{
	$pw = file_get_contents("../htdocs/private/passwd");
	if ($pw === false)
	{
		echo "ERROR\n";
		return ;
	}
	$pw = unserialize($pw);
	$actpw = hash('whirlpool', $_POST['oldpw']);
	foreach ($pw as $elem)
	{
		if ($elem['login'] == $_POST['login'] && $elem['passwd'] == $actpw)
		{
			$elem['passwd'] = hash('whirlpool', $_POST['newpw']);
			echo "OK\n";
			return ;
		}
	}
}
echo "ERROR\n";

?>
