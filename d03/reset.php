<?php

if (isset($_SERVER['PHP_AUTH_USER']))
	echo "ok\n";
$_SERVER['PHP_AUTH_USER'] = NULL;
if (isset($_SERVER['PHP_AUTH_USER']))
	echo "ok\n";
else
	echo "ko\n";
?>
