#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	return ;
}
$op = trim($argv[2], " \t");
$n1 = trim($argv[1], " \t");
$n2 = trim($argv[3], " \t");
if ($op == "+")
	$res = $n1 + $n2;
else if ($op == "-")
	$res = $n1 - $n2;
else if ($op == "*")
	$res = $n1 * $n2;
else if ($op == "/")
	$res = $n1 / $n2;
else if ($op == "%")
	$res = $n1 % $n2;
echo $res."\n";
?>
