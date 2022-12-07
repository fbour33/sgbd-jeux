<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
		<title>Saxo Gang Bande Dessinée</title>
		<meta charset="utf-8" />
		<meta name="description" content="Base de données de 50 jeux de société, avec plus de 200 avis !" />
		<meta name="author" content="Luca PEREIRA" />
    </head>

    <header>
        <?php include('header.php'); ?>
    </header>

<?php

    if (!isset($_POST['nom']) && !isset($_POST['prenom_aut']) && !isset($_POST['prenom_illu'])) {
        echo "Il faut renseigner les champs nom, prénom auteur et prénom illustrateur pour valider l'ajout";
    }
?>

    <body>

        <?php include('connect.php'); ?>

        <?php 
        $sqlQuery = 'INSERT INTO JEUX(NOM_JEU, EDITEUR_JEU, TYPE_JEU, DUREE_JEU, DATE_JEU, NB_JOUEURS_MIN, NB_JOUEURS_MAX) VALUES (:nom, :editeur, :type_jeu, :duree_jeu, :date_jeu, :nb_min, :nb_max)'; 

        $insertJeux = $db->prepare($sqlQuery); 

        $valueJeu = $insertJeux->execute([
            'nom' => $_POST['nom'], 
            'editeur' => $_POST['editeur'], 
            'type_jeu' => $_POST['type'], 
            'duree_jeu' => $_POST['duree'],
            'date_jeu' => $_POST['date'],
            'nb_min' => $_POST['nb_min'],
            'nb_max' => $_POST['nb_max'],
        ]);

        if($valueJeu){
            $sqlQueryIdJeu = 'SELECT ID_JEU FROM JEUX ORDER BY ID_JEU DESC LIMIT 1'; 
            $StatementIdJeu = $db->prepare($sqlQueryIdJeu);
            $StatementIdJeu->execute();
            $idJeu = $StatementIdJeu->fetchAll(); 
        }

        print_r($idJeu[0]);

        $sqlQueryAuteur = 'INSERT INTO CREATEURS(NOM_CREATEUR, PRENOM_CREATEUR) VALUES (:nom_aut, :prenom_aut)'; 
        $insertAuteur = $db->prepare($sqlQueryAuteur); 

        $valueAuteur = $insertAuteur->execute([
            'nom_aut' => $_POST['nom_aut'], 
            'prenom_aut' => $_POST['prenom_aut'], 
        ]);

        if($valueAuteur){
            $sqlQueryIdAuteur = 'SELECT id_createur FROM CREATEURS WHERE NOM_CREATEUR = :nom_aut AND PRENOM_CREATEUR = :prenom_aut';
            $StatementIdAuteur = $db->prepare($sqlQueryIdAuteur);
            $StatementIdAuteur->bindParam(':nom_aut', $_POST['nom_aut'], PDO::PARAM_INT);
            $StatementIdAuteur->bindParam(':prenom_aut', $_POST['prenom_aut'], PDO::PARAM_INT);
            $StatementIdAuteur->execute(); 
            $idAuteur = $StatementIdAuteur->fetchAll(); 
        }

        $sqlQueryIllustrateur = 'INSERT INTO CREATEURS(NOM_CREATEUR, PRENOM_CREATEUR) VALUES (:nom_illu, :prenom_illu)'; 
        $insertIllustrateur = $db->prepare($sqlQueryIllustrateur); 

        $valueIllustrateur = $insertIllustrateur->execute([
            'nom_illu' => $_POST['nom_illu'], 
            'prenom_illu' => $_POST['prenom_illu'], 
        ]);

        if($valueIllustrateur){
            $sqlQueryIdIllustrateur = 'SELECT id_createur FROM CREATEURS WHERE NOM_CREATEUR = :nom_illu AND PRENOM_CREATEUR = :prenom_illu';
            $StatementIdIllustrateur = $db->prepare($sqlQueryIdIllustrateur);
            $StatementIdIllustrateur->bindParam(':nom_illu', $_POST['nom_illu'], PDO::PARAM_INT);
            $StatementIdIllustrateur->bindParam(':prenom_illu', $_POST['prenom_illu'], PDO::PARAM_INT);
            $StatementIdIllustrateur->execute(); 
            $idIllustrateur = $StatementIdIllustrateur->fetchAll(); 
        }

        $sqlQueryId = 'INSERT INTO CREATIONS(ID_JEU, ID_CREATEUR, EST_AUTEUR, EST_ILLUSTRATEUR) VALUES (:idJeu, :idCreateur, :estAut, :estIllu)';
        $StatementId = $db->prepare($sqlQueryId); 

        if($idIllustrateur == $idAuteur){
            $valueId = $StatementId->execute([
                'idJeu' => $idJeu[0][0], 
                'idCreateur' => $idIllustrateur[0][0], 
                'estAut' => 1, 
                'estIllu' => 1,
            ]); 
        }else{
            $valueAuteur = $StatementId->execute([
                'idJeu' => $idJeu[0][0], 
                'idCreateur' => $idIllustrateur[0][0], 
                'estAut' => 0, 
                'estIllu' => 1,
            ]); 
            
            $valueIllustrateur = $StatementId->execute([
                'idJeu' => $idJeu[0][0], 
                'idCreateur' => $idAuteur[0][0], 
                'estAut' => 1, 
                'estIllu' => 0,
            ]);
        }

        ?>
        
        <?php if($valueJeu && (($valueAuteur && $valueIllustrateur) || $valueId )){ ?>
        <div class="container mt-5 w-40 bg-dark pb-2">
            <div class="row justify-content-center">
            <h1 class="text-white ">Votre jeu a été ajouté avec succès</h1>
            </div>
            <div class="row justify-content-center">
            <form action="jeux.php">
                <button type="submit" class="btn btn-primary">Aller vers la liste des jeux</button>
            </form>
            </div>
        </div>
        <?php } ?>
    </body>
</html>