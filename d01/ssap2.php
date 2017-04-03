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
$res1 = array();
$res2 = array();
$res3 = array();
foreach ($argv as $val)
{
	if (!$first)
	{
		$tab = ft_split($val);
		foreach ($tab as $word)
		{
			if (ctype_alpha($word) == true)
				$res1[] = $word;
			else if (ctype_digit($word))
				$res2[] = $word;
			else
				$res3[] = $word;
		}
	}
	$first = false;
}
sort($res1, SORT_STRING | SORT_FLAG_CASE);
sort($res2, SORT_STRING | SORT_FLAG_CASE);
sort($res3, SORT_STRING | SORT_FLAG_CASE);
foreach ($res1 as $word)
	echo $word."\n";
foreach ($res2 as $word)
	echo $word."\n";
foreach ($res3 as $word)
	echo $word."\n";

?>
