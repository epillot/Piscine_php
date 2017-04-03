#!/usr/bin/php
<?php
if ($argc < 3)
	return ;
unset($argv[0]);
$key = $argv[1];
unset($argv[1]);
foreach($argv as $val)
{
	if (($pos = strpos($val, ':')) == true)
	{
		if (substr($val, 0, $pos) == $key)
			echo substr($val, $pos + 1)."\n";
	}
}
?>
