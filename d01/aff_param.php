#!/usr/bin/php
<?php

$i = 0;
foreach ($argv as $val)
{
	if ($i != 0)
		echo $val."\n";
	$i++;
}

?>
