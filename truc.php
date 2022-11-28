<?php
/* Creation du serveur et de la liaison avec la base de donnees */
$servname = 'localhost';
$dbname = 'pdodb';
$user = 'root';
$password = 'root';
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $password);

/* Preparation des requetes */


$stmt_thm_crit = $dbco::prepare(
    "SELECT DISTINCT id_jeu, M.description_mecanique (à enlever apres test de tri)
    FROM Themes_utilise NATURAL JOIN Mecaniques_utilisee
    WHERE intitule_theme = ?
        AND id_jeu in (
            SELECT DISTINCT id_jeu
            FROM Avis
        )
    ORDER BY description_mecanique ASC"
);

$stmt_com_joueur = $dbco::prepare(
    "SELECT *
    FROM Avis
    WHERE id_jeu IN (
        SELECT DISTINCT id_jeu 
        FROM Mecaniques_utilisee
        WHERE description_mecanique IN (
            SELECT DISTINCT description_mecanique
            FROM Mecaniques_pref
            WHERE id_joueur = ?
        )
    )
    ORDER BY id_jeu" // Pour grouper tous les avis d'un meme jeu 
);

$stmt_com_positif = $dbco::prepare(
    " SELECT id_joueur
    FROM Jugements
    WHERE est_positif = 1
        AND id_avis = ?"
);

$stmt_class_note = $dbco::prepare(
    "SELECT id_joueur, pseudo_joueur, COUNT(*) as Avis_donne
    FROM Joueurs LEFT OUTER JOIN Avis USING(id_joueur)
    GROUP BY id_joueur, pseudo_joueur
    ORDER BY Avis_donne DESC"
);

$stmt_com_recent = $dbco::prepare(
    "SELECT *
    FROM Avis
    ORDER BY date_avis DESC
    LIMIT ? "
);

$stmt_com_indiff = $dbco::prepare(
    "SELECT id_avis, COUNT(*) as Jugements_obtenus
    FROM Jugements
    GROUP BY id_avis
    HAVING COUNT(*) = (
        SELECT MAX(COUNT(*))
        FROM Jugements
        GROUP BY id_avis
    )"
);

/* Le trigger en question:
CREATE OR REPLACE TRIGGER Ind_conf
AFTER INSERT OR UPDATE OR DELETE ON Jugements
FOR EACH ROW
BEGIN
    UPDATE Avis as A
    SET indice_confiance = (
        SELECT (1+COUNT(estPositif))/(1+COUNT(estNegatif))
        FROM Jugements
        WHERE id_avis = ?
        GROUP BY id_avis
    )
    WHERE A.id_avis = new.id_avis
END;

Requete Finale (??):
SELECT id_jeu, AVG(A.note * A.indice_confiance) as Note
FROM Avis AS A
GROUP BY id_avis
ORDER BY Note */

?>