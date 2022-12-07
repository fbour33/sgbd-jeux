<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <?php include('connect.php'); 
    
    $sqlQuery = 'SELECT NOM_JEU FROM JEUX';

    $joueursStatement = $db->prepare($sqlQuery);  
    $jeuxStatmentQuery = $db->query($sqlQuery);
    $jeux = $jeuxStatmentQuery->fetchAll(); 
    ?>

    <body class="bg-light">
        <div class="col bg-dark pt-4 pb-4">
        <form name="form" >
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Jeu" onChange="location = this.options[this.selectedIndex].value;">
                <option disabled selected>Choisir un jeu</option>
                <?php foreach($jeux as $jeux){ ?>
                        <option value="avis.php?Jeu=<?php echo $jeux['NOM_JEU']; ?>"><?php echo $jeux['NOM_JEU'] ?></option>
                <?php } ?>
            </select>
        </form>
        </div>

    <?php
    $jeu = isset($_GET['Jeu']) ? $_GET['Jeu'] :'';
    $sqlQuery = "SELECT NOTE_AVIS, NB_JOUEUR, PSEUDO_JOUEUR, COMMENTAIRE_AVIS, DATE_AVIS, ID_AVIS FROM JOUEURS as J natural join AVIS as A natural join CONFIGURATIONS as C natural join JEUX where NOM_JEU ='$jeu'";

    $avisStatement = $db->prepare($sqlQuery);  
    $avisStatement->execute();
    $avis = $avisStatement->fetchAll();

    $compt = 0;

    ?>
        <div class="container text-center ">
        <?php if(isset($_GET['Jeu'])){?>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo $jeu; ?></div>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOTE</div>
                <div class="col">NB JOUEUR</div>
                <div class="col">COMMENTAIRE</div>
                <div class="col">APPRECIATION</div>
            </div>
        <?php }?>
        </div>

    <?php include('comment.php'); ?>

    </body>

</html>
