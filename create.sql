-- ============================================================
--   Nom de la base   :  JEUX                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  11/11/2022                      
-- ============================================================

-- ============================================================
--   Table : JEUX                                          
-- ============================================================

create table JEUX
(
    ID_JEU                          INT(3)                  not null AUTO_INCREMENT,
    NOM_JEU                         CHAR(100)               not null,
    EDITEUR_JEU                     CHAR(20)                        ,
    TYPE_JEU                        CHAR(20)                        ,
    DUREE_JEU                       INT(3)                          ,
    DATE_JEU                        DATE                            ,
    NB_JOUEURS_MIN                  INT(3)                          ,
    NB_JOUEURS_MAX                  INT(3)                          ,
    constraint pk_jeux primary key (ID_JEU)
);

-- ============================================================
--   Table : JOUEURS                                           
-- ============================================================

create table JOUEURS
(
    ID_JOUEUR                       INT(3)                  not null AUTO_INCREMENT,
    PSEUDO_JOUEUR                   CHAR(20)                unique not null,
    NOM_JOUEUR                      CHAR(20)                not null,
    PRENOM_JOUEUR                   CHAR(20)                not null,
    MAIL_JOUEUR                     CHAR(100)                       ,
    constraint pk_joueurs primary key (ID_JOUEUR)
);

-- ============================================================
--   Table : CREATEURS                                           
-- ============================================================

create table CREATEURS
(
    ID_CREATEUR                     INT(3)                  not null AUTO_INCREMENT,
    PRENOM_CREATEUR                 CHAR(20)                not null,
    NOM_CREATEUR                    CHAR(20)                        ,
    constraint pk_createurs primary key (ID_CREATEUR)
);

-- ============================================================
--   Table : CREATIONS                                         
-- ============================================================

create table CREATIONS
(
    ID_CREATEUR                     INT(3)              not null,
    EST_AUTEUR                      INT(3)                      ,
    EST_ILLUSTRATEUR                INT(3)                      ,
    ID_JEU                          INT(3)              not null,
    constraint pk_createurs primary key (ID_CREATEUR, ID_JEU)
);

-- ============================================================
--   Table : AVIS                                          
-- ============================================================

create table AVIS
(
    ID_AVIS                         INT(3)                  not null AUTO_INCREMENT,
    NOTE_AVIS                       INT(3)                  not null,
    COMMENTAIRE_AVIS                BLOB(1000)                      ,
    DATE_AVIS                       DATE                            ,
    ID_CONFIG                       INT(3)                  not null,
    ID_JOUEUR                       INT(3)                  not null,
    constraint pk_avis primary key (ID_AVIS)
);

-- ============================================================
--   Table : JUGEMENTS                                          
-- ============================================================

create table JUGEMENTS
(
    ID_JOUEUR                       INT(3)              not null,
    ID_AVIS                         INT(3)              not null,
    EST_POSITIF                     INT(3)                      ,
    EST_NEGATIF                     INT(3)                      ,
    constraint pk_jugement primary key (ID_JOUEUR, ID_AVIS)
);


-- ============================================================
--   Table : THEMES                                          
-- ============================================================

create table THEMES 
(
    ID_THEME                          INT(3)                not null AUTO_INCREMENT,
    INTITULE_THEME                    CHAR(20)              not null,
    constraint pk_themes primary key (ID_THEME)   
);

-- ============================================================
--   Table : THEMES PREFERE                                      
-- ============================================================

create table THEMES_PREF 
(
    ID_THEME                  INT(3)              not null,
    ID_JOUEUR                 INT(3)              not null,
    constraint pk_themes_pref primary key (ID_THEME, ID_JOUEUR)
);

-- ============================================================
--   Table : THEMES_UTILISES                                       
-- ============================================================

create table THEMES_UTIL
(
    ID_THEME                          INT(3)             not null,   
    ID_JEU                            INT(3)             not null,
    constraint pk_mecaniques primary key (ID_THEME, ID_JEU)
);

-- ============================================================
--   Table : MECANIQUE                                          
-- ============================================================

create table MECANIQUES 
(
    ID_MECANIQUE                    INT(3)                not null,   
    DESCRIPTION_MECANIQUE           CHAR(20)              not null,
    constraint pk_mecaniques primary key (ID_MECANIQUE)
);

-- ============================================================
--   Table : MECANIQUES PREFEREE                                        
-- ============================================================

create table MECANIQUES_PREF 
(
    ID_MECANIQUE                    INT(3)             not null,
    ID_JOUEUR                       INT(3)             not null,
    constraint pk_meca_pref primary key (ID_MECANIQUE, ID_JOUEUR)
   
);

-- ============================================================
--   Table : MECANIQUES UTILISEES                                          
-- ============================================================

create table MECANIQUES_UTIL
(
    ID_MECANIQUE                          INT(3)             not null,   
    ID_JEU                                INT(3)             not null,
    constraint pk_mecaniques primary key (ID_MECANIQUE, ID_JEU)
);


-- ============================================================
--   Table : EXTENSIONS                                        
-- ============================================================

create table EXTENSIONS 
(
    ID_EXTENSION                INT(3)                not null,
    NOM_EXTENSION               CHAR(20)              not null,
    ID_JEU                      INT(3)                not null, 
    constraint pk_extensions primary key (ID_EXTENSION)  
);


-- ============================================================
--   Table : EXTENSIONS_UTILISEE                                        
-- ============================================================
create table EXTENSIONS_UTIL
(
    ID_CONFIG                   INT(3)              not null, 
    ID_EXTENSION                INT(3)              not null, 
    constraint pk_extensions_utilisee primary key (ID_EXTENSION, ID_CONFIG)
);


-- ============================================================
--   Table : CONFIGURATIONS                                        
-- ============================================================

create table CONFIGURATIONS 
(   
    ID_CONFIG                   INT(3)             not null AUTO_INCREMENT, 
    NB_JOUEUR                   INT(3)             not null,
    ID_JEU                      INT(3)             not null,
    constraint pk_config primary key (ID_CONFIG)
);


alter table CREATIONS
    add constraint fk2_creations foreign key (ID_CREATEUR)
        references CREATEURS (ID_CREATEUR)
        ON DELETE CASCADE
        ON UPDATE CASCADE;
    
alter table CREATIONS
    add constraint fk1_creations foreign key (ID_JEU)
        references JEUX (ID_JEU)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table AVIS
    add constraint fk1_avis foreign key (ID_CONFIG)
        references CONFIGURATIONS (ID_CONFIG)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table AVIS
    add constraint fk2_avis foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table JUGEMENTS
    add constraint fk1_jugements foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table JUGEMENTS
    add constraint fk2_jugements foreign key (ID_AVIS)
        references AVIS (ID_AVIS)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table THEMES_PREF
    add constraint fk1_themes_pref foreign key (ID_THEME)
        references THEMES (ID_THEME)
        ON DELETE CASCADE
        ON UPDATE CASCADE; 

alter table THEMES_PREF
    add constraint fk2_themes_pref foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table THEMES_UTIL
    add constraint fk1_themes_util foreign key (ID_THEME)
        references THEMES (ID_THEME)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table THEMES_UTIL
    add constraint fk2_themes_util foreign key (ID_JEU)
        references JEUX (ID_JEU)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table MECANIQUES_PREF
    add constraint fk1_mecaniques_pref foreign key (ID_MECANIQUE)
        references MECANIQUES (ID_MECANIQUE)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table MECANIQUES_PREF
    add constraint fk2_mecaniques_pref foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table MECANIQUES_UTIL
    add constraint fk1_mecaniques_util foreign key (ID_MECANIQUE)
        references MECANIQUES (ID_MECANIQUE)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table MECANIQUES_UTIL
    add constraint fk2_mecaniques_util foreign key (ID_JEU)
        references JEUX (ID_JEU)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table EXTENSIONS
    add constraint fk1_extensions foreign key (ID_JEU)
        references JEUX (ID_JEU)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table EXTENSIONS_UTIL
    add constraint fk1_extensions_util foreign key (ID_EXTENSION)
        references EXTENSIONS (ID_EXTENSION)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table EXTENSIONS_UTIL
    add constraint fk2_extensions_util foreign key (ID_CONFIG)
        references CONFIGURATIONS (ID_CONFIG)
        ON DELETE CASCADE
        ON UPDATE CASCADE;

alter table CONFIGURATIONS
    add constraint fk1_configurations foreign key (ID_JEU)
        references JEUX (ID_JEU)
        ON DELETE CASCADE
        ON UPDATE CASCADE;


-- ============================================================
--   Trigger : uniq_jeu_avis                                        
-- ============================================================

DELIMITER //
CREATE PROCEDURE uniq_jeu_avis (IN config INT , IN joueur INT)
BEGIN
    DECLARE cpt int;
    SELECT COUNT(*)
    INTO cpt
    FROM ( /* Selectionne tous les avis du jeu associ?? ?? une config particuli??re*/
        SELECT * 
        FROM AVIS NATURAL JOIN CONFIGURATIONS
        WHERE id_jeu = (
            SELECT id_jeu
            FROM CONFIGURATIONS
            WHERE id_config = config
        ) 
    ) a
    WHERE id_joueur = joueur 
    LIMIT 1;
    
    if 0 < cpt
    then 
        SIGNAL SQLSTATE '50001'
        SET MESSAGE_TEXT = 'Ce joueur ?? d??j?? donn?? son avis sur ce jeu';
    end if; 

END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER uniq_jeu_avis_insert
BEFORE INSERT ON AVIS
FOR EACH ROW
BEGIN
    CALL uniq_jeu_avis(NEW.id_config, NEW.id_joueur);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER uniq_jeu_avis_update
BEFORE UPDATE ON AVIS
FOR EACH ROW
BEGIN
    CALL uniq_jeu_avis(NEW.id_config, NEW.id_joueur);
END //
DELIMITER ;

-- ============================================================
--   Trigger : date_parution_avis                                        
-- ============================================================

DELIMITER //
CREATE PROCEDURE date_parution_avis (IN config INT , IN date_avis DATE)
BEGIN   
    DECLARE date_parution date;
    SELECT date_jeu
    INTO date_parution
    FROM JEUX 
    WHERE id_jeu = (
        SELECT id_jeu
        FROM CONFIGURATIONS
        WHERE id_config = config
    );

    if date_avis < date_parution
    then 
        SIGNAL SQLSTATE '50001'
        SET MESSAGE_TEXT = "L'avis est donn?? avant la sortie du jeu";
    end if; 
END //
DELIMITER ; 

DELIMITER //
CREATE TRIGGER date_parution_avis_insert
BEFORE INSERT ON AVIS
FOR EACH ROW 
BEGIN   
    CALL date_parution_avis(NEW.id_config, NEW.date_avis);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER date_parution_avis_update
BEFORE UPDATE ON AVIS
FOR EACH ROW 
BEGIN   
    CALL date_parution_avis(NEW.id_config, NEW.date_avis);
END //
DELIMITER ;

-- ============================================================
--   Trigger : accord_jeu_config_extension                                        
-- ============================================================

DELIMITER //
CREATE PROCEDURE accord_jeu_config_extension (IN config INT , IN extension INT)
BEGIN
    DECLARE id_jeu_config int;
    DECLARE id_jeu_ext int;

    SELECT id_jeu
    INTO id_jeu_config
    FROM CONFIGURATIONS
    WHERE id_config = config;

    SELECT id_jeu 
    INTO id_jeu_ext
    FROM EXTENSIONS
    WHERE id_extension = extension;

    if id_jeu_config <> id_jeu_ext
    then 
        SIGNAL SQLSTATE '50001'
        SET MESSAGE_TEXT = "L'extension n'est pas utilis??e avec le bon jeu";
    end if; 
END //
DELIMITER ;


DELIMITER //
CREATE TRIGGER accord_jeu_config_extension_insert
BEFORE INSERT ON EXTENSIONS_UTIL
FOR EACH ROW 
BEGIN   
    CALL accord_jeu_config_extension(NEW.id_config, NEW.id_extension);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER accord_jeu_config_extension_update
BEFORE UPDATE ON EXTENSIONS_UTIL
FOR EACH ROW 
BEGIN   
    CALL accord_jeu_config_extension(NEW.id_config, NEW.id_extension);
END //
DELIMITER ;

-- ============================================================
--   Trigger : joueur_diff_jugements_avis                                        
-- ============================================================

DELIMITER //
CREATE PROCEDURE joueur_diff_jugements_avis(IN avis INT, IN joueur INT)
BEGIN
    DECLARE id_joueur_avis int;

    SELECT id_joueur
    INTO id_joueur_avis
    FROM AVIS
    WHERE id_avis= id_avis;

    if id_joueur = id_joueur_avis
    then 
        SIGNAL SQLSTATE '50001'
        SET MESSAGE_TEXT = "Il est impossible de noter son propre avis !";
    end if; 
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER joueur_diff_jugements_avis_insert
BEFORE INSERT ON JUGEMENTS
FOR EACH ROW 
BEGIN   
    CALL joueur_diff_jugements_avis(NEW.id_avis, NEW.id_joueur);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER joueur_diff_jugements_avis_update
BEFORE UPDATE ON JUGEMENTS
FOR EACH ROW 
BEGIN   
    CALL joueur_diff_jugements_avis(NEW.id_avis, NEW.id_joueur);
END //
DELIMITER ;

-- ============================================================
--   Trigger : nb_joueurs_config                                        
-- ============================================================

DELIMITER //
CREATE PROCEDURE nb_joueurs_config(IN jeu INT, IN nb_joueur INT )
BEGIN
    DECLARE nb_min int;
    DECLARE nb_max int;

    SELECT nb_joueurs_min, nb_joueurs_max
    INTO nb_min, nb_max
    FROM JEUX
    WHERE id_jeu = id_jeu;

    if (nb_joueur < nb_min) || (nb_joueur > nb_max)
    then 
        SIGNAL SQLSTATE '50001'
        SET MESSAGE_TEXT = "Le nombre de joueurs de la partie n'est pas coh??rent avec le jeu";
    end if; 
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER nb_joueurs_config_insert
BEFORE INSERT ON CONFIGURATIONS
FOR EACH ROW 
BEGIN   
    CALL nb_joueurs_config(NEW.id_jeu, NEW.nb_joueur);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER nb_joueurs_config_update
BEFORE UPDATE ON CONFIGURATIONS
FOR EACH ROW 
BEGIN   
    CALL nb_joueurs_config(NEW.id_jeu, NEW.nb_joueur);
END //
DELIMITER ;