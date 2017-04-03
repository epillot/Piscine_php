#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return ;
}
$len1 = strcspn($argv[1], "+-*/%");
if ($len1 == strlen($argv[1]))
{
	echo "Syntax Error\n";
	return ;
}
$n1 = trim(substr($argv[1], 0, $len1));
$n2 = trim(substr($argv[1], $len1 + 1));
$op = substr($argv[1], $len1, 1);
if (!ctype_digit($n1) || !ctype_digit($n2))
{
	echo "Syntax Error\n";
	return ;
}
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
