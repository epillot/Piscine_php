<?php

$name = $_GET['name'];
$val = $_GET['value'];
$action = $_GET['action'];
if ($action == 'set' && $name != "" && $val != "")
	setcookie($name, $val, time() + 7*24*3600);
else if ($action == 'get')
{
	if ($_COOKIE[$name] != "")
		echo $_COOKIE[$name]."\n";
}
else if ($action == 'del' && $name != "")
	setcookie($name, "", -3600);

?>
