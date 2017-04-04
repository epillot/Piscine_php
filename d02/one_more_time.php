#!/usr/bin/php
<?php

function get_month($str)
{
	if ($str == "janvier" || $str == "Janvier")
		return 1;
	if ($str == "février" || $str == "Février" || $str == "fevrier" || $str == "Fevrier")
		return 2;
	if ($str == "mars" || $str == "Mars")
		return 3;
	if ($str == "avril" || $str == "Avril")
		return 4;
	if ($str == "mai" || $str == "Mai")
		return 5;
	if ($str == "juin" || $str == "Juin")
		return 6;
	if ($str == "juillet" || $str == "Juillet")
		return 7;
	if ($str == "Août" || $str == "Aout" || $str == "août" || $str == "aout")
		return 8;
	if ($str == "septembre" || $str == "Septembre")
		return 9;
	if ($str == "octobre" || $str == "Octobre")
		return 10;
	if ($str == "novembre" || $str == "Novembre")
		return 11;
	if ($str == "décembre" || $str == "Décembre" || $str == "decembre" || $str == "Decembre")
		return 12;
	return (0);
}

if ($argc == 1)
	return ;
$tab = explode(" ", $argv[1]);
if (preg_match("/^[lL]undi$|^[mM](ardi|ercredi)$|^[jJ]eudi$|^[vV]endredi$|^[sS]amedi$|^[dD]imanche$/", $tab[0]) != 1)
{
	echo "Wrong Format\n";
	return ;
}
if (preg_match("/^[0-9]{1,2}$/", $tab[1]) != 1)
{
	echo "Wrong Format\n";
	return ;
}
if (($m = get_month($tab[2])) == 0)
{
	echo "Wrong Format\n";
	return ;
}
if (preg_match("/^[0-9]{4}$/", $tab[3]) != 1)
{
	echo "Wrong Format\n";
	return ;
}
if (preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}$/", $tab[4]) != 1)
{
	echo "Wrong Format\n";
	return ;
}
$tab2 = explode(":", $tab[4]);
date_default_timezone_set('Europe/Paris');
echo mktime($tab2[0], $tab2[1], $tab2[2], $m, $tab[1], $tab[3])."\n";

?>
