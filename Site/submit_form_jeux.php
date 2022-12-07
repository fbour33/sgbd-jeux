<?php

    include('connect.php');
    if (!isset($_POST['nom']) && !isset($_POST['prenom_aut']) && !isset($_POST['prenom_illu'])) {
        echo "Il faut renseigner les champs nom, prénom auteur et prénom illustrateur pour valider l'ajout";
    }

    //Préparation des requêtes 

    $sqlQuery = 'INSERT INTO JEUX(NOM_JEU, EDITEUR_JEU, TYPE_JEU, DUREE_JEU, DATE_JEU, NB_JOUEURS_MIN, NB_JOUEURS_MAX) VALUES (:nom, :editeur, :type_jeu, :duree_jeu, :date_jeu, :nb_min, :nb_max)'; 
    $insertJeux = $db->prepare($sqlQuery); 

    $sqlQueryCreateur = 'INSERT INTO CREATEURS(NOM_CREATEUR, PRENOM_CREATEUR) VALUES (:nom_createur, :prenom_createur)'; 
    $insertCreateur = $db->prepare($sqlQueryCreateur); 

    $sqlQueryIdJeu = 'SELECT ID_JEU FROM JEUX ORDER BY ID_JEU DESC LIMIT 1'; 
    $StatementIdJeu = $db->prepare($sqlQueryIdJeu);

    $sqlQueryIdCreateur = 'SELECT ID_CREATEUR FROM CREATEURS WHERE NOM_CREATEUR = :nom AND PRENOM_CREATEUR = :prenom';
    $StatementIdCreateur = $db->prepare($sqlQueryIdCreateur);

?>
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



    <body>

        <?php 

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
            $StatementIdJeu->execute();
            $idJeu = $StatementIdJeu->fetchAll(); 
        }

        $valueAuteur = $insertCreateur->execute([
            'nom_createur' => $_POST['nom_aut'],
            'prenom_createur' => $_POST['prenom_aut'],
        ]);

        $valueIllustrateur = $valueAuteur;
         
        if (strcmp($_POST['nom_aut'], $_POST['nom_illu']) != 0 && strcmp($_POST['prenom_aut'], $_POST['prenom_illu']) != 0) {
            $valueIllustrateur = $insertCreateur->execute([
                'nom_createur' => $_POST['nom_illu'], 
                'prenom_createur' => $_POST['prenom_illu'], 
            ]);
        }
        if($valueAuteur){
            $StatementIdCreateur->bindParam(':nom', $_POST['nom_aut'], PDO::PARAM_STR_CHAR);
            $StatementIdCreateur->bindParam(':prenom', $_POST['prenom_aut'], PDO::PARAM_STR_CHAR);
            $StatementIdCreateur->execute(); 
            $idAuteur = $StatementIdCreateur->fetchAll(); 
        }

        if($valueIllustrateur){
            $StatementIdCreateur->bindParam(':nom', $_POST['nom_illu'], PDO::PARAM_STR_CHAR);
            $StatementIdCreateur->bindParam(':prenom', $_POST['prenom_illu'], PDO::PARAM_STR_CHAR);
            $StatementIdCreateur->execute(); 
            $idIllustrateur = $StatementIdCreateur->fetchAll(); 
        }

        //print_r($idIllustrateur);

        $sqlQueryId = 'INSERT INTO CREATIONS(ID_CREATEUR, EST_AUTEUR, EST_ILLUSTRATEUR, ID_JEU) VALUES (:idCreateur, :estAut, :estIllu, :idJeu)';
        $StatementId = $db->prepare($sqlQueryId); 

        if($idIllustrateur == $idAuteur){
            $valueId = $StatementId->execute([
                'idCreateur' => $idAuteur[0][0], 
                'estAut' => 1, 
                'estIllu' => 1,
                'idJeu' => $idJeu[0][0], 
            ]); 
        }else{
            $valueAuteur = $StatementId->execute([
                'idCreateur' => $idAuteur[0][0], 
                'estAut' => 1, 
                'estIllu' => 0,
                'idJeu' => $idJeu[0][0], 
            ]); 
            
            $valueIllustrateur = $StatementId->execute([
                'idCreateur' => $idIllustrateur[0][0], 
                'estAut' => 0, 
                'estIllu' => 1,
                'idJeu' => $idJeu[0][0], 
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