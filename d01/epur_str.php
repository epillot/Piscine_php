#!/usr/bin/php
<?php

function ft_split($str)
{
	$tab = explode(' ', $str);
	$out = array();
	foreach ($tab as $val)
	{
		if ($val != "")
			$out[] = $val;
	}
	return $out;
}

if ($argc > 1)
{
	$str = false;
	$tab = ft_split($argv[1]);
	foreach ($tab as $val)
	{
		if ($str != false)
			$str = $str." ".$val;
		else
			$str = $val;
	}
	echo $str."\n";
}

?>
