-------------------------------------------------------------------------------------
-------------------------------- Ajout dans les tables ------------------------------
-------------------------------------------------------------------------------------

-- Les variables de la forme :nom permettent d'ajouter un joueur à partir d'un formulaire en PhP

--------------------------------------- JOUEURS -------------------------------------

INSERT INTO JOUEURS(PSEUDO_JOUEUR, NOM_JOUEUR, PRENOM_JOUEUR, MAIL_JOUEUR) 
VALUES (:pseudo, :nom, :prenom, :mail);


----------------------------------------- JEUX --------------------------------------


----------------------------------------- AVIS --------------------------------------


-------------------------------------------------------------------------------------
---------------------------- Suprression dans les tables ----------------------------
-------------------------------------------------------------------------------------

-- Dans nos tables, nous avons configurés les clés secondaires en faisant en sorte que tous 
-- les éléments associés à la table soit supprimé aussi grâce aux mots clefs 
-- DELETE ON CASCADE. De ce fait on a besoin de Trigger, ce qui facilite la suppression

--------------------------------------- JOUEURS -------------------------------------

DELETE FROM JOUEURS WHERE ID_JOUEUR = ?; 

----------------------------------------- JEUX --------------------------------------

DELETE FROM JEUX WHERE ID_JEUX = ?; 

----------------------------------------- AVIS --------------------------------------

DELETE FROM AVIS WHERE ID_AVIS = ?; 

-------------------------------------------------------------------------------------
---------------------------- Modification dans les tables ---------------------------
-------------------------------------------------------------------------------------