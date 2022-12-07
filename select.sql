-----------------------------------------------------------------------------------------------------
----------------------------- L’ensemble des jeux critiqués disponibles -----------------------------
---------------------------- dans un thème donné, classés par mécaniques.----------------------------
-----------------------------------------------------------------------------------------------------

SELECT DISTINCT J.nom_jeu, M.description_mecanique
FROM JEUX as J NATURAL JOIN MECANIQUES_UTIL NATURAL JOIN MECANIQUES as M NATURAL JOIN THEMES_UTIL
WHERE id_theme = (                  
        SELECT id_theme
        FROM THEMES
        WHERE intitule_theme = ? 
    )
    AND id_jeu in (                 
        SELECT DISTINCT id_jeu
        FROM CONFIGURATIONS
    )
ORDER BY description_mecanique ASC; 

----------------------------------------------------------------------------------------------------------------- 
---------------------------- Pour un joueur donné, la liste des commentaires se  --------------------------------
-------------------------- référant à un jeu dans une de ses catégories préférées. ------------------------------
----------------------------------------------------------------------------------------------------------------- 

SELECT note_avis, commentaire_avis, date_avis, nom_jeu
FROM AVIS NATURAL JOIN CONFIGURATIONS NATURAL JOIN JEUX
WHERE id_jeu IN (                       
    SELECT DISTINCT id_jeu 
    FROM MECANIQUES_UTIL NATURAL JOIN MECANIQUES_PREF
    WHERE id_joueur = (
        SELECT id_joueur
        FROM JOUEURS
        WHERE pseudo_joueur = ?
    )
)
ORDER BY id_jeu;

----------------------------------------------------------------------------------------------------------------------
---------------------------- Pour un commentaire, la liste des joueurs qui l'ont apprecie ----------------------------
----------------------------------------------------------------------------------------------------------------------

SELECT pseudo_joueur
FROM JUGEMENTS NATURAL JOIN JOUEURS 
WHERE est_positif = 1
    AND id_avis = ?; 

-----------------------------------------------------------------------------------------------------------------------
---------------------------- Les joueurs, classés selon le nombre de jeux qu’ils ont notés ----------------------------
----------------------------------------------------------------------------------------------------------------------- 

SELECT id_joueur, pseudo_joueur, COUNT(id_avis) as Avis_donne
FROM JOUEURS LEFT OUTER JOIN AVIS USING(id_joueur)
GROUP BY id_joueur, pseudo_joueur
ORDER BY Avis_donne DESC; 

-- La liste des n commentaires les plus récents

SELECT * FROM Avis ORDER BY date_avis DESC LIMIT ?; 

-------------------------------------------------------------------------------------------------------- 
---------------------------- Le commentaire qui laisse le moins indifférent ----------------------------
-------------------------------------------------------------------------------------------------------- 

SELECT id_avis, COUNT(*) as Jugements_obtenus
FROM Jugements
HAVING COUNT(*) = (
    SELECT MAX(COUNT(*))
    FROM Jugements
    GROUP BY id_avis
)
GROUP BY id_avis; 

--------------------------------------------------------------------------------------------------------
------------------------------ Classement des jeux selon une moyenne dans ------------------------------
---------------------------- laquelle chaque note est pondérée par l'indice-----------------------------
------------------------------ de confiance du commentaire correspondant. ------------------------------
--------------------------------------------------------------------------------------------------------

/* Cette requête ne peut s'exécuter que si un attribut indice_confiance à été défini dans la table AVIS */

DELIMITER //
CREATE PROCEDURE ind_conf (IN avis INT)
BEGIN
    UPDATE Avis as A
        SET indice_confiance = (
            SELECT (1+COUNT(estPositif))/(1+COUNT(estNegatif))
            FROM Jugements
            WHERE id_avis = avis
            GROUP BY id_avis
        )
        WHERE A.id_avis = avis;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER Ind_conf_insert
AFTER INSERT ON Jugements
FOR EACH ROW
BEGIN
    CALL ind_conf(NEW.id_avis);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER Ind_conf_update
AFTER UPDATE ON Jugements
FOR EACH ROW
BEGIN
    CALL ind_conf(NEW.id_avis);
END;
DELIMITER ;

DELIMITER //
CREATE TRIGGER Ind_conf_delete
AFTER DELETE ON Jugements
FOR EACH ROW
BEGIN
    CALL ind_conf(NEW.id_avis);
END;
DELIMITER ;

SELECT id_jeu, AVG(A.note * A.indice_confiance) as Note
FROM Avis AS A
GROUP BY id_avis
ORDER BY Note