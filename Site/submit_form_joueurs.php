<?php

    if(isset($_POST['mail']) && !isset($_POST['pseudo'] )&& !isset($_POST['prenom']) && !isset($_POST[('nom')])){
        echo "Il faut renseigner tous les champs pour pouvoir ajouter un joueur";
    }
    $pseudo = $_POST['pseudo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
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

        <?php include('connect.php'); ?>

        <?php 
        $sqlQuery = 'INSERT INTO JOUEURS(PSEUDO_JOUEUR, NOM_JOUEUR, PRENOM_JOUEUR, MAIL_JOUEUR) VALUES (:pseudo, :nom, :prenom, :mail)'; 

        $insertJoueur = $db->prepare($sqlQuery); 

        $value = $insertJoueur->execute([
            'pseudo' => $pseudo, 
            'nom' => $nom, 
            'prenom' => $prenom, 
            'mail' => $mail,
        ]);
        ?>
        
        <?php if($value){ ?>
        <div class="container mt-5 w-40 bg-dark pb-2">
            <div class="row justify-content-center">
            <h1 class="text-white ">Votre joueur a été ajouté avec succès</h1>
            </div>
            <div class="row justify-content-center">
            <form action="joueurs.php">
                <button type="submit" class="btn btn-primary">Aller vers la liste des joueurs</button>
            </form>
            </div>
        </div>
        <?php } ?>
    </body>
</html>

