<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>



    <body class="bg-light">

    <?php

    include('connect.php'); 

    $sqlQuery = 'SELECT PSEUDO_JOUEUR FROM JOUEURS';

    $joueursStatement = $db->prepare($sqlQuery);  
    $joueursStatmentQuery = $db->query($sqlQuery);
    $joueurs = $joueursStatmentQuery->fetchAll(); 

    ?>
        <div class="col bg-dark pt-4 pb-4">
            <form method="post"> <!--- action="jeux_critiques.php" -->
            <!--<form name="form">-->
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onChange="location = this.options[this.selectedIndex].value;" name="Joueur">
                    <option disabled selected>Choisir un joueur</option>
                    <?php foreach($joueurs as $joueurs){ ?>
                            <option value="commentaire_categorie.php?Joueur=<?php echo $joueurs['PSEUDO_JOUEUR']?>"><?php echo $joueurs['PSEUDO_JOUEUR']?></option>
                    <?php } ?>
                </select>
            <!--<button type="submit" class="btn btn-primary">Ajouter</button> -->
            </form>
        </div>
    <?php

    $nomJoueur = isset($_GET['Joueur']) ? $_GET['Joueur'] : '';
    //$sqlQueryId = "SELECT ID_THEME FROM THEMES WHERE INTITULE_THEME='$nomTheme'"; 
//
    //$StatmentQueryId = $db->query($sqlQueryId);
    //$idTheme = $idThemeStatmentQuery->fetchAll(); 

    $sqlQueryAvis = "SELECT note_avis, commentaire_avis, date_avis, nom_jeu
                     FROM AVIS NATURAL JOIN CONFIGURATIONS NATURAL JOIN JEUX
                     WHERE id_jeu IN (                       
                                        SELECT DISTINCT id_jeu 
                                        FROM MECANIQUES_UTIL NATURAL JOIN MECANIQUES_PREF
                                        WHERE id_joueur = (
                                                            SELECT id_joueur
                                                            FROM JOUEURS
                                                            WHERE pseudo_joueur = '$nomJoueur'
                                                          )
                                     )
                    ORDER BY id_jeu;"; 

    $StatmentAvis = $db->prepare($sqlQueryAvis);
    $StatmentQueryAvis = $db->query($sqlQueryAvis); 
    $avis = $StatmentQueryAvis->fetchAll();
    
    ?>

    <div class="container text-center ">
        <?php if(isset($_GET['Joueur'])){?>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo $nomJoueur; ?></div>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col-2">JEU</div>
                <div class="col">DATE</div>
                <div class="col">NOTE</div>
                <div class="col-7">COMMENTAIRE</div>
            </div>
        <?php } ?>
            <?php foreach($avis as $avis) {?>
                <div class="row bg-light border mt-2">
                    <div class="col-2"><?php echo $avis[3]?></div>
                    <div class="col"><?php echo $avis[2]?></div>
                    <div class="col"><?php echo $avis[0]?></div>
                    <div class="col-7"><?php echo $avis[1]?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>