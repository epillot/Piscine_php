#!/usr/bin/php
<?PHP

while (1)
{
	echo "Entrez un nombre: ";
	$nb = fgets(STDIN);
	if ($nb == false)
		break ;
	$nb = trim($nb, "\n");
	if (is_numeric($nb) == true)
	{
		if ($nb % 2 == 0)
			echo "Le chiffre $nb est Pair\n";
		else
			echo "Le chiffre $nb est Impair\n";
	}
	else
		echo "'$nb' n'est pas un chiffre\n";
}

?>
