-- ============================================================
--   Nom de la base   :  JEUX                                
--   Nom de SGBD      :  ORACLE Version 7.0                    
--   Date de creation :  11/11/2022                      
-- ============================================================

drop table JEUX cascade constraints;

drop table JOUEURS cascade constraints;

drop table CREATEURS cascade constraints;

drop table AVIS cascade constraints;

drop table JUGEMENTS cascade constraints;

drop table EXTENSIONS cascade constraints;

drop table MECANIQUES cascade constraints;

drop table MECANIQUES_PREF cascade constraints;

drop table THEMES cascade constraints;

drop table THEMES_PREF cascade constraints;

drop table CONFIGURATIONS cascade constraints;

-- ============================================================
--   Table : JEUX                                          
-- ============================================================

create table JEUX
(
    ID_JEU                          NUMBER(3)              not null,
    NOM_JEU                         CHAR(20)               not null,
    EDITEUR_JEU                     CHAR(20)                       ,
    TYPE_JEU                        CHAR(20)                       ,
    DUREE_JEU                       NUMBER(3)                      ,
    DATE_JEU                        DATE                           ,
    constraint pk_jeux primary key (ID_JEU)
);

-- ============================================================
--   Table : JOUEURS                                           
-- ============================================================

create table JOUEURS
(
    ID_JOUEUR                       NUMBER(3)              not null,
    PSEUDO_JOUEUR                   CHAR(20)               not null,
    NOM_JOUEUR                      CHAR(20)               not null,
    PRENOM_JOUEUR                   CHAR(20)                       ,
    MAIL_JOUEUR                     CHAR(100)                      ,
    constraint pk_joueurs primary key (ID_JOUEUR)
);

-- ============================================================
--   Table : CREATEURS                                           
-- ============================================================

create table CREATEURS
(
    ID_CREATEUR                     NUMBER(3)              not null,
    NOM_CREATEUR                    CHAR(20)               not null,
    PRENOM_CREATEUR                 CHAR(20)                       ,
    EST_AUTEUR                      NUMBER(3)              not null,
    EST_ILLUSTRATEUR                NUMBER(3)              not null,
    ID_JEU                          NUMBER(3)              not null,
    constraint pk_createurs primary key (ID_CREATEUR)
);

-- ============================================================
--   Table : AVIS                                          
-- ============================================================

create table AVIS
(
    ID_AVIS                         NUMBER(3)              not null,
    NOTE_AVIS                       NUMBER(3)              not null,
    COMMENTAIRE_AVIS                CHAR(1000)                     ,
    DATE_AVIS                       DATE                           ,
    ID_JEU                          NUMBER(3)              not null,
    ID_CONFIG                       NUMBER(3)              not null,
    ID_JOUEUR                       NUMBER(3)              not null,
    constraint pk_avis primary key (ID_AVIS)
    constraint uc_avis UNIQUE (ID_JEU, ID_JOUEUR)
);

-- ============================================================
--   Table : JUGEMENTS                                          
-- ============================================================

create table JUGEMENTS
(
    ID_AVIS                         NUMBER(3)              not null,
    ID_JOUEURS                      NUMBER(3)              not null,
    EST_POSITIF                     NUMBER(3)                      ,
    EST_NEGATIF                     NUMBER(3)                      ,
);


-- ============================================================
--   Table : THEMES                                          
-- ============================================================

create table THEMES 
{
    INTITULE_THEME                  CHAR(20)              not null,
    ID_JEU                          NUMBER(3)             not null,
    constraint pk_themes primary key (INTITULE_THEME)   
};

-- ============================================================
--   Table : THEMES PREFERE                                      
-- ============================================================

create table THEMES_PREF 
{
    INTITULE_THEME                  CHAR(20)              not null,
    ID_JOUEURS                      NUMBER(3)             not null,   
};

-- ============================================================
--   Table : MECANIQUE                                          
-- ============================================================

create table MECANIQUES 
{
    DESCRIPTION_MECANIQUE           CHAR(20)              not null,
    ID_JEU                          NUMBER(3)             not null,   
    constraint pk_mecaniques primary key (DESCRIPTION_MECANIQUE)
};

-- ============================================================
--   Table : MECANIQUE PREFEREE                                        
-- ============================================================

create table MECANIQUES_PREF 
{
    DESCRIPTION_MECANIQUE           CHAR(20)              not null,
    ID_JOUEURS                      NUMBER(3)             not null,   
};

-- ============================================================
--   Table : EXTENSIONS                                        
-- ============================================================

create table EXTENSIONS 
{
    ID_EXTENSION                NUMBER(3)             not null,
    NOM_EXTENSION               CHAR(20)              not null,
    ID_JEU                      NUMBER(3)             not null, 
    constraint pk_extensions primary key (ID_EXTENSION)  
};

-- ============================================================
--   Table : CONFIGURATIONS                                        
-- ============================================================

create table CONFIGURATIONS 
{   
    ID_CONFIG                   NUMBER(3)             not null, 
    NB_JOUEURS                  NUMBER(3)             not null,
    constraint pk_config primary key (ID_CONFIG)
};

create table EXTENSIONS_UTILISEE 
{
    ID_EXTENSION                NUMBER(3)              not null, 
    ID_CONFIG                   NUMBER(3)              not null, 
    constraint pk_extensions_utilisee primary key (ID_EXTENSION, ID_CONFIG)
}

alter table MECANIQUES
    add constraint fk1_mecaniques foreign key (ID_JEU)
       references JEUX (ID_JEU);

alter table THEMES
    add constraint fk1_themes foreign key (ID_JEU)
       references JEUX (ID_JEU);

alter table CREATEURS
    add constraint fk1_createurs foreign key (ID_JEU)
       references JEUX (ID_JEU);

alter table EXTENSIONS
    add constraint fk1_extensions foreign key (ID_JEU)
       references JEUX (ID_JEU);

alter table MECANIQUES_PREF
    add constraint fk1_mecaniques_pref foreign key (ID_JOUEUR)
       references JOUEURS (ID_JOUEUR);

alter table MECANIQUES_PREF
    add constraint fk2_mecaniques_pref foreign key (DESCRIPTION_MECANIQUE)
       references MECANIQUES (DESCRIPTION_MECANIQUE);

alter table THEMES_RPEF
    add constraint fk1_themes_pref foreign key (ID_JOUEUR)
       references JOUEURS (ID_JOUEUR);

alter table THEMES_RPEF
    add constraint fk2_themes_pref foreign key (INTITULE_THEME)
        references MECANIQUES (INTITULE_THEME); 

alter table AVIS
    add constraint fk1_avis foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table AVIS
    add constraint fk2_avis foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR);

alter table JUGEMENTS
    add constraint fk1_jugements foreign key (ID_JEU)
        references JEUX (ID_JEU);

alter table JUGEMENTS
    add constraint fk2_jugements foreign key (ID_JOUEUR)
        references JOUEURS (ID_JOUEUR);

alter table EXTENSIONS_UTILISEE
    add constraint fk1_extensions_utilisee foreign key (ID_EXTENSION)
        references EXTENSIONS (ID_EXTENSION);

alter table EXTENSIONS_UTILISEE
    add constraint fk2_extensions_utilisee foreign key (ID_CONFIG)
        references CONFIGURATIONS (ID_CONFIG);