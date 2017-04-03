<?php
function ft_is_sort($tab)
{
	$sort_tab = $tab;
	sort($sort_tab);
	$i = 0;
	foreach($tab as $val)
	{
		if ($sort_tab[$i] != $val)
			return false;
		$i++;
	}
	return true;
}
?>
