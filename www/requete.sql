--Liste les noms des equipes avec entraineur + logo, joueur et leurs age + nationalité par ordre alphabethique--

SELECT equipe.id, equipe.nom, equipe.entraineur, equipe.logo, joueur.nom, joueur.age, joueur.nationalité
FROM equipe
INNER JOIN joueur
ON joueur.equipe_id = equipe.id
ORDER BY equipe.nom ASC

--Liste les tournois avec leurs dates, lieux, heures debut et fin avec équipe participente--
SELECT tournoi.nom, tournoi.date, tournoi.heure_debut, tournoi.heure_fin, tournoi.lieu, equipe.nom
FROM tournoi
INNER JOIN equipe_tournoi
ON equipe_tournoi.tournoi_id = tournoi.id
INNER JOIN equipe
ON equipe.id = equipe_tournoi.equipe_id
WHERE tournoi.id = equipe_tournoi.equipe_id

--Liste les équipes + logo avec leurs entraineurs et dans quel tournoi ils sont--
SELECT equipe.nom, equipe.entraineur, equipe.logo, tournoi.nom
FROM equipe
INNER JOIN equipe_tournoi
ON equipe_tournoi.equipe_id = equipe.id
INNER JOIN tournoi
ON tournoi.id = equipe_tournoi.tournoi_id
WHERE equipe.id = equipe_tournoi.equipe_id
