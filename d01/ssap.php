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

$first = true;
$res = array();
foreach ($argv as $val)
{
	if (!$first)
	{
		$tab = ft_split($val);
		foreach ($tab as $word)
			$res[] = $word;
	}
	$first = false;
}
sort($res, SORT_STRING);
foreach ($res as $word)
	echo $word."\n";

?>
