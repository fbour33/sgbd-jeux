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
    $sqlQuery = 'SELECT NOTE_AVIS, NB_JOUEUR, PSEUDO_JOUEUR, COMMENTAIRE_AVIS, DATE_AVIS FROM JOUEURS as J natural join AVIS as A natural join CONFIGURATIONS as C natural join JEUX where NOM_JEU ="' . $jeu . '"';

    $avisStatement = $db->prepare($sqlQuery);  
    $avisStatmentQuery = $db->query($sqlQuery);
    $avis = $avisStatmentQuery->fetchAll(); 
    ?>

        <div class="container text-center ">
            <?php if(isset($_GET['Jeu'])){?>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo $jeu; ?></div>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">PSEUDO JOUEUR</div>
                <div class="col">NOTE</div>
                <div class="col">COMMENTAIRE</div>
                <div class="col">NB JOUEUR</div>
                <div class="col">DATE</div>
        </div>
        <?php }?>
            <?php foreach($avis as $avis) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $avis['PSEUDO_JOUEUR']?></div>
                    <div class="col"><?php echo $avis['NOTE_AVIS'] . '/20'?></div>
                    <div class="col"><?php echo $avis['COMMENTAIRE_AVIS']?></div>
                    <div class="col"><?php echo $avis['NB_JOUEUR']?></div>
                    <div class="col"><?php echo $avis['DATE_AVIS']?></div>
            </div>
            <?php } ?>
    </div>

    </body>

</html>
