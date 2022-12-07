import csv
import subprocess
import os 

#### Ecriture de tous les insert dans le fichier un fichier .sql par lecture d'un fichier .csv

def fill_table(myfile): 

    fichier = open("insert.sql", "a")

    compteur=1

    nom_table = myfile.upper()
    fichier.write("\n\n-- {}\n\n".format(nom_table))

    with open('bdd_csv/{}_new.csv'.format(myfile), 'r') as f:
        joueurs = csv.reader(f)

        for line in joueurs:
            nb_column = len(line) 
            if compteur == 1: #Sert à enlever le caractère spécial illisible par Bash contenu ligne 1
                compteur+= 1
            else: 
                if nb_column == 2:
                    fichier.write("insert into {} values ({}, {});\n".format(nom_table, line[0], line[1]))
                elif nb_column == 3:
                    fichier.write("insert into {} values ({}, {}, {});\n".format(nom_table, line[0], line[1], line[2]))
                elif nb_column == 4:
                    fichier.write("insert into {} values ({}, {}, {}, {});\n".format(nom_table, line[0], line[1], line[2], line[3]))
                elif nb_column == 5:
                    fichier.write("insert into {} values ({}, {}, {}, {}, {});\n".format(nom_table, line[0], line[1], line[2], line[3], line[4]))
                elif nb_column == 6:
                    fichier.write("insert into {} values ({}, {}, {}, {}, {}, {});\n".format(nom_table, line[0], line[1], line[2], line[3], line[4], line[5]))
                elif nb_column == 7:
                    fichier.write("insert into {} values ({}, {}, {}, {}, {}, {}, {});\n".format(nom_table, line[0], line[1], line[2], line[3], line[4], line[5], line[6]))
                elif nb_column == 8:
                    fichier.write("insert into {} values ({}, {}, {}, {}, {}, {}, {}, {});\n".format(nom_table, line[0], line[1], line[2], line[3], line[4], line[5], line[6], line[7]))

    fichier.write("\ncommit;")
    fichier.close()

#### Ecriture dans le dossier donnees.sql à partir de tous nos fichiers .csv

def create_table():
    myfiles = [ 'Joueurs', 'Jeux', 'Createurs', 'Configurations', 'Avis', 'Extensions', 'Jugements', 'Mecaniques', \
                'Mecaniques_pref', 'Mecaniques_util', 'Themes', 'Themes_pref', 'Themes_util', \
                'Creations', 'Extensions_util' ]
    for i in range(len(myfiles)):
        fill_table(myfiles[i])

os.system('rm -f donnees.sql')
os.system('./donnees.sh')
create_table()
os.system('rm -f bdd_csv/*_new.csv')