<?PHP
function ft_split($str)
{
	$tab = explode(' ', $str);
	$out = array();
	foreach ($tab as $val)
	{
		if ($val != "")
			$out[] = $val;
	}
	sort($out, SORT_STRING);
	return $out;
}
?>
