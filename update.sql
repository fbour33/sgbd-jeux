-------------------------------------------------------------------------------------
-------------------------------- Ajout dans les tables ------------------------------
-------------------------------------------------------------------------------------

-- Les variables de la forme :nom permettent d'ajouter un joueur à partir d'un formulaire en PhP

--------------------------------------- JOUEURS -------------------------------------

INSERT INTO JOUEURS(PSEUDO_JOUEUR, NOM_JOUEUR, PRENOM_JOUEUR, MAIL_JOUEUR) 
    VALUES (:pseudo, :nom, :prenom, :mail);

----------------------------------------- JEUX --------------------------------------

INSERT INTO JOUEURS(PSEUDO_JOUEUR, NOM_JOUEUR, PRENOM_JOUEUR, MAIL_JOUEUR) 
    VALUES (:pseudo, :nom, :prenom, :mail);

----------------------------------------- AVIS --------------------------------------

INSERT INTO AVIS(NOTE_AVIS, COMMENTAIRE_AVIS,DATE_AVIS, ID_CONFIG, ID_JOUEUR) 
    VALUES (:note, :commentaire, :date_avis, :id_config, :id_joueur);

-------------------------------------------------------------------------------------
---------------------------- Suprression dans les tables ----------------------------
-------------------------------------------------------------------------------------

-- Dans nos tables, nous avons configurés les clés secondaires en faisant en sorte que tous 
-- les éléments associés à la table soient supprimés aussi grâce aux mots clefs 
-- DELETE ON CASCADE. De ce fait, il n'y a pas besoin de Trigger, ce qui facilite la suppression

--------------------------------------- JOUEURS -------------------------------------

DELETE FROM JOUEURS WHERE ID_JOUEUR = ?; 

----------------------------------------- JEUX --------------------------------------

DELETE FROM JEUX WHERE ID_JEUX = ?; 

----------------------------------------- AVIS --------------------------------------

DELETE FROM AVIS WHERE ID_AVIS = ?; 

-------------------------------------------------------------------------------------
---------------------------- Modification dans les tables ---------------------------
-------------------------------------------------------------------------------------

-- Ces requêtes permettent de mettre à jour l'entièreté des bases d'un coup
-- Pour modifier seulement certaines colonnes, il suffit de laisser seulement les noms 
-- des colonnes désirées dans l'instruction SET


--------------------------------------- JOUEURS -------------------------------------

UPDATE JOUEURS SET PSEUDO_JOUEUR = ?, NOM_JOUEUR = ?, PRENOM_JOUEUR = ?, MAIL_JOUEUR = ?
    WHERE id_joueur = ?;

----------------------------------------- JEUX --------------------------------------

UPDATE JEUX SET NOM_JEU = ?, EDITEUR_JEU = ?, TYPE_JEU = ? ,DUREE_JEU = ?,
    DATE_JEU = ?, NB_JOUEURS_MIN = ?, NB_JOUEURS_MAX = ?   
    WHERE id_jeu = ?;

----------------------------------------- AVIS --------------------------------------

UPDATE AVIS SET NOTE_AVIS = ?, COMMENTAIRE_AVIS = ?, DATE_AVIS = ?, ID_CONFIG = ?, ID_JOUEUR = ?
    WHERE id_avis = ?;
