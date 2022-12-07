<?php

    include('connect.php');
    if (!isset($_POST['note']) && !isset($_POST['nb_joueur'])) {
        echo "Il faut renseigner les champs note, et nombre de joueur pour valider l'ajout";
    }

    //Préparation des requêtes 

    $sqlQueryIdJeux = 'SELECT ID_JEU FROM JEUX WHERE NOM_JEU= :nom_jeu;'; 
    $idJeuxStatement = $db->prepare($sqlQueryIdJeux); 

    $sqlQueryConfig = 'SELECT COUNT(*) FROM CONFIGURATIONS WHERE NB_JOUEUR = :nb_joueur AND ID_JEU = :id_jeu;'; 
    $configStatement = $db->prepare($sqlQueryConfig);

    $sqlQueryIdConfig = 'SELECT ID_CONFIG FROM CONFIGURATIONS WHERE NB_JOUEUR = :nb_joueur LIMIT 1;'; 
    $idConfigStatement = $db->prepare($sqlQueryIdConfig);

    $sqlQueryNewIdConfig = 'SELECT ID_CONFIG FROM CONFIGURATIONS ORDER BY ID_AVIS DESC LIMIT 1'; 
    $newIdConfigStatement = $db->prepare($sqlQueryNewIdConfig);

    $sqlQueryInsertConfig = 'INSERT INTO CONFIGURATIONS(NB_JOUEUR, ID_JEU) VALUES (:nb_joueur, :id_jeu);';
    $insertConfig = $db->prepare($sqlQueryInsertConfig);

    $sqlQueryIdJoueur = 'SELECT ID_JOUEUR FROM JOUEURS WHERE PSEUDO_JOUEUR = :nom;';
    $idJoueurStatement = $db->prepare($sqlQueryIdJoueur);

    $sqlQueryAvis = 'INSERT INTO AVIS(NOTE_AVIS, COMMENTAIRE_AVIS,DATE_AVIS, ID_CONFIG, ID_JOUEUR) values (:note, :commentaire, :date_avis, :id_config, :id_joueur);';
    $avisStatement = $db->prepare($sqlQueryAvis);

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

        $idJeuxStatement->bindParam(':nom_jeu', $_POST['nom'], PDO::PARAM_STR_CHAR);
        $idJeuxStatement->execute();
        $idJeu = $idJeuxStatement->fetchAll(); 

        $configStatement->bindParam(':nb_joueur', $_POST['nb_joueur'], PDO::PARAM_INT);
        $configStatement->bindParam(':id_jeu', $idJeu, PDO::PARAM_INT);
        $configStatement->execute();
        $config = $configStatement->fetchAll();

        if($config > 0){
            $idConfigStatement->bindParam(':nb_joueur', $_POST['nb_joueur'], PDO::PARAM_INT);
            $idConfigStatement->execute();
            $idConfig = $idConfigStatement->fetchAll(); 
        }else{
            $insertConfig->execute([
                ':nb_joueur' => $_POST['nb_joueur'], 
                ':id_jeu' => $idJeu,
            ]);
            $newIdConfigStatement->execute();
            $idConfig = $newIdConfigStatement->fetchAll();
        }

        print_r($idJeu);
        print_r($idConfig);

        $idJoueurStatement->bindParam(':nom', $_POST['Pseudo'], PDO::PARAM_STR_CHAR);
        $idJoueurStatement->execute();
        $idJoueur = $idJoueurStatement->fetchAll();

        if($idConfig && $idJoueur){
            $avisStatement->execute([
                ':note' => $_POST['note'],
                ':commentaire' => $_POST['commentaire'],
                ':date_avis' => $_POST['date_avis'],
                ':id_config' => $idConfig[0][0],
                ':id_joueur' => $idJoueur[0][0],
            ]);
        }

        

        ?>
        
        <?php if($avisStatement){ ?>
        <div class="container mt-5 w-40 bg-dark pb-2">
            <div class="row justify-content-center">
            <h1 class="text-white ">Votre avis a bien été pris en compte</h1>
            </div>
            <div class="row justify-content-center">
            <form action="avis.php">
                <button type="submit" class="btn btn-primary">Aller vers la liste des avis</button>
            </form>
            </div>
        </div>
        <?php } ?>
    </body>
</html>