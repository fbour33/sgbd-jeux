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
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onChange="location = this.options[this.selectedIndex].value;">
                <option selected>Choisir un jeu</option>
                <?php foreach($jeux as $jeux){ ?>
                        <option value="avis.php?Jeu=<?php echo $jeux['NOM_JEU']; ?>"><?php echo $jeux['NOM_JEU'] ?></option>
                <?php } ?>
            </select>
        </form>
        </div>

        <?php include('connect.php'); 
    $jeu = $_GET['Jeu'];
    $sqlQuery = 'SELECT  A.* FROM AVIS as A natural join CONFIGURATIONS natural join JEUX where NOM_JEU ="' . $jeu . '"';

    $avisStatement = $db->prepare($sqlQuery);  
    $avisStatmentQuery = $db->query($sqlQuery);
    $avis = $avisStatmentQuery->fetchAll(); 
    ?>

        <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo $jeu?></div>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">ID</div>
                <div class="col">NOTE</div>
                <div class="col">COMMENTAIRE</div>
                <div class="col">DATE</div>
                <div class="col">ID CONFIG</div>
                <div class="col">ID JOUEUR</div>
        </div>
            <?php foreach($avis as $avis) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $avis['ID_AVIS']?></div>
                    <div class="col"><?php echo $avis['NOTE_AVIS']?></div>
                    <div class="col"><?php echo $avis['COMMENTAIRE_AVIS']?></div>
                    <div class="col"><?php echo $avis['DATE_AVIS']?></div>
                    <div class="col"><?php echo $avis['ID_CONFIG']?></div>
                    <div class="col"><?php echo $avis['ID_JOUEUR']?></div>
            </div>
            <?php } ?>
    </div>

    </body>

</html>
