<?php

if ($_POST['submit'] == 'OK' && $_POST['passwd'] != "" && $_POST['login'] != "")
{
	if (!file_exists("../htdocs/private/"))
		mkdir("../htdocs/private", 0777, true);
	if (file_exists("../htdocs/private/passwd"))
		$pw = unserialize(file_get_contents("../htdocs/private/passwd"));
	else
		$pw = array();
	foreach ($pw as $elem)
	{
		if ($elem['login'] == $_POST['login'])
		{
			echo "ERROR\n";
			return ;
		}
	}
	$pw[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
	file_put_contents("../htdocs/private/passwd", serialize($pw));
	header('Location: index.html');
	echo "OK\n";
}
else
	echo "ERROR\n";

?>
