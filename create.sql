-- ============================================================
--   Nom de la base   :  JEUX                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  11/11/2022                      
-- ============================================================

-- drop table JEUX;

-- drop table JOUEURS;

-- drop table CREATEURS;

-- drop table CREATIONS;

-- drop table AVIS;

-- drop table JUGEMENTS;

-- drop table EXTENSIONS;

-- drop table EXTENSIONS_UTILISEE

-- drop table MECANIQUES;

-- drop table MECANIQUES_PREF;

-- drop table MECANIQUE_UTILISEES;

-- drop table THEMES;

-- drop table THEMES_PREF;

-- drop table THEMES_UTILISES

-- drop table CONFIGURATIONS;

-- ============================================================
--   Table : JEUX                                          
-- ============================================================

create table JEUX
(
    ID_JEU                          INT(3)                  not null,
    NOM_JEU                         CHAR(20)                not null,
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
    ID_JOUEUR                       INT(3)                  not null,
    PSEUDO_JOUEUR                   CHAR(20)                not null,
    NOM_JOUEUR                      CHAR(20)                not null,
    PRENOM_JOUEUR                   CHAR(20)                        ,
    MAIL_JOUEUR                     CHAR(100)                       ,
    constraint pk_joueurs primary key (ID_JOUEUR)
);

-- ============================================================
--   Table : CREATEURS                                           
-- ============================================================

create table CREATEURS
(
    ID_CREATEUR                     INT(3)                  not null,
    PRENOM_CREATEUR                 CHAR(20)                        ,
    NOM_CREATEUR                    CHAR(20)                not null,
    constraint pk_createurs primary key (ID_CREATEUR)
);

-- ============================================================
--   Table : CREATIONS                                         
-- ============================================================

create table CREATIONS
(
    ID_CREATEUR                     INT(3)              not null,
    EST_AUTEUR                      INT(3)              not null,
    EST_ILLUSTRATEUR                INT(3)              not null,
    ID_JEU                          INT(3)              not null,
    constraint pk_createurs primary key (ID_CREATEUR, ID_JEU)
);

-- ============================================================
--   Table : AVIS                                          
-- ============================================================

create table AVIS
(
    ID_AVIS                         INT(3)                  not null,
    NOTE_AVIS                       INT(3)                  not null,
    COMMENTAIRE_AVIS                BLOB(1000)                      ,
    DATE_AVIS                       DATE                            ,
    ID_JEU                          INT(3)                  not null,
    ID_CONFIG                       INT(3)                  not null,
    ID_JOUEUR                       INT(3)                  not null,
    constraint pk_avis primary key (ID_AVIS),
    constraint uc_avis UNIQUE key (ID_JEU, ID_JOUEUR)
);

-- ============================================================
--   Table : JUGEMENTS                                          
-- ============================================================

create table JUGEMENTS
(
    ID_JOUEUR                      INT(3)              not null,
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
    ID_THEME                          INT(3)                not null,
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

create table THEMES_UTILISES
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

create table MECANIQUES_UTILISEES
(
    ID_MECANIQUE                          INT(3)             not null,   
    ID_JEU                                INT(3)             not null,
    constraint pk_mecaniques primary key (ID_MECANIQUE)
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
create table EXTENSIONS_UTILISEE 
(
    ID_EXTENSION                INT(3)              not null, 
    ID_CONFIG                   INT(3)              not null, 
    constraint pk_extensions_utilisee primary key (ID_EXTENSION, ID_CONFIG)
);


-- ============================================================
--   Table : CONFIGURATIONS                                        
-- ============================================================

create table CONFIGURATIONS 
(   
    ID_CONFIG                   INT(3)             not null, 
    NB_JOUEUR                   INT(3)             not null,
    constraint pk_config primary key (ID_CONFIG)
);


alter table CREATIONS
    add constraint fk2_creations foreign key (ID_CREATEUR)
        references CREATEURS (ID_CREATEUR);
    
alter table CREATIONS
    add constraint fk1_creations foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table AVIS
    add constraint fk1_avis foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table AVIS
    add constraint fk2_avis foreign key (ID_CONFIG)
        references CONFIGURATIONS (ID_CONFIG);

alter table AVIS
    add constraint fk3_avis foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR);

alter table JUGEMENTS
    add constraint fk1_jugements foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR);

alter table JUGEMENTS
    add constraint fk2_jugements foreign key (ID_AVIS)
        references AVIS (ID_AVIS);

alter table THEMES_PREF
    add constraint fk1_themes_pref foreign key (ID_THEME)
        references THEMES (ID_THEME); 

alter table THEMES_PREF
    add constraint fk2_themes_pref foreign key (ID_JOUEUR)
       references JOUEURS (ID_JOUEUR);

alter table THEMES_UTILISES
    add constraint fk1_themes_util foreign key (ID_THEME)
        references THEMES (ID_THEME);

alter table THEMES_UTILISES
    add constraint fk2_themes_util foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table MECANIQUES_PREF
    add constraint fk1_mecaniques_pref foreign key (ID_MECANIQUE)
       references MECANIQUES (ID_MECANIQUE);

alter table MECANIQUES_PREF
    add constraint fk2_mecaniques_pref foreign key (ID_JOUEUR)
       references JOUEURS (ID_JOUEUR);

alter table MECANIQUES_UTILISEES
    add constraint fk1_mecaniques_util foreign key (ID_MECANIQUE)
        references MECANIQUES (ID_MECANIQUE);

alter table MECANIQUES_UTILISEES
    add constraint fk2_mecaniques_util foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table EXTENSIONS
    add constraint fk1_extensions foreign key (ID_JEU)
       references JEUX (ID_JEU);

alter table EXTENSIONS_UTILISEE
    add constraint fk1_extensions_util foreign key (ID_EXTENSION)
        references EXTENSIONS (ID_EXTENSION);

alter table EXTENSIONS_UTILISEE
    add constraint fk2_extensions_util foreign key (ID_CONFIG)
        references CONFIGURATIONS (ID_CONFIG);