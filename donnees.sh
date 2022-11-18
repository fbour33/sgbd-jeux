#!/bin/bash

creation_fichier()
{
    echo "
    -- ============================================================
    --    suppression des donnees
    -- ============================================================

    delete from JEUX ;
    delete from JOUEURS ;
    delete from CREATEURS ; 
    delete from AVIS ; 
    delete from JUGEMENTS ; 
    delete from EXTENSIONS ; 
    delete from MECANIQUES ;
    delete from MECANIQUES_PREF ; 
    delete from THEMES ; 
    delete from THEMES_PREF ; 
    delete from CONFIGURATIONS ; 

    commit ;

    -- ============================================================
    --    creation des donnees
    -- ============================================================
    " > donnees.sql
}

separation()
{
    fichier=$(echo bdd_csv/$1 | sed "s/\.csv/_new.csv/g")
    if [ $1 == "Jugements.csv" ]
    then 
        cat bdd_csv/$1 | cut -d\; -f1-4 | sed 's/\;/\,/g' > $fichier
    elif [ $1 == "Configurations.csv" ] || [ $1 == "Extensions_utilisees.csv" ]
    then
        cat bdd_csv/$1 | cut -d\; -f1-2 | sed 's/\;/\,/g' > $fichier
    else
        len=$(head -n1 bdd_csv/$1 | sed 's/\;\;*/\;/g' | grep -o \; | wc -l |sed 's/\ *//g')
        cat bdd_csv/$1 | cut -d\; -f1-$len | sed 's/\;/\,/g' > $fichier
    fi
    echo $fichier
}

creation_fichier 

for i in $(ls bdd_csv)
do 
    separation $(echo $i)
done

