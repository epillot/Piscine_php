SELECT nom, prenom, CAST(date_naissance AS DATE) AS 'date de naissance'
FROM fiche_personne
WHERE (EXTRACT(YEAR FROM date_naissance) = 1989)
ORDER BY nom;
