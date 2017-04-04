#!/usr/bin/php
<?php

if ($argc == 1)
	return ;
$res = preg_replace("/[ \\t]+/", " ", trim($argv[1]));//, " \t"));
echo $res."\n";

?>
