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
if ($argc == 1)
	return ;
$tab = ft_split($argv[1]);
$str = false;
$first = true;
foreach($tab as $val)
{
	if (!$first)
	{
		if ($str == false)
			$str = $val;
		else
			$str = $str." ".$val;
	}
	$first = false;
}
if ($str == false)
	$str = $tab[0];
else
	$str = $str." ".$tab[0];
echo $str."\n";
?>
