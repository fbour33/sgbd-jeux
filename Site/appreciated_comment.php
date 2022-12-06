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
                        <option value="appreciated_comment.php?Jeu=<?php echo $jeux['NOM_JEU']; ?>"><?php echo $jeux['NOM_JEU'] ?></option>
                <?php } ?>
            </select>
        </form>
        </div>

    <?php
    $jeu = isset($_GET['Jeu']) ? $_GET['Jeu'] :'';
    $sqlQuery = 'SELECT NOTE_AVIS, NB_JOUEUR, PSEUDO_JOUEUR, COMMENTAIRE_AVIS, DATE_AVIS, ID_AVIS FROM JOUEURS as J natural join AVIS as A natural join CONFIGURATIONS as C natural join JEUX where NOM_JEU ="' . $jeu . '"';

    $avisStatement = $db->prepare($sqlQuery);  
    $avisStatmentQuery = $db->query($sqlQuery);
    $avis = $avisStatmentQuery->fetchAll(); 

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
            <?php foreach($avis as $avis) {?>
                <div class="row bg-light border mt-2"><?php echo 'Le ' . $avis['DATE_AVIS'] . ', ' . $avis['PSEUDO_JOUEUR'] . ' a posté :'; ?></div>
                <div class="row bg-light border ">
                    <div class="col"><?php echo $avis['NOTE_AVIS'] . '/20 ';?></div>
                    <div class="col"><?php echo $avis['NB_JOUEUR'];?></div>
                    <div class="col"><?php echo $avis['COMMENTAIRE_AVIS'];?></div>
                    <div class="col mt-2">
                    <p>
                    <a class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#PouceBleu" role="button" aria-expanded="false" aria-controls="PouceBleu">
                        <img src="up.png">   
                    </a>
                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="collapse" data-bs-target="#PouceRouge" href="#PouceRouge" type="button" aria-expanded="false" aria-controls="PouceRouge">
                        <img src="down.png">   
                    </button>
                    <p>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="collapse" id="PouceBleu">
                            <div class="card card-body">
                                
                                <?php 
                                
                                $id_avis = $avis['ID_AVIS'];
                                $sqlQueryAgree = "SELECT PSEUDO_JOUEUR
                                                        FROM JUGEMENTS NATURAL JOIN JOUEURS 
                                                        WHERE est_positif = 1
                                                        AND id_avis = $id_avis";
                                
                                $agreeStatement = $db->prepare($sqlQueryAgree);  
                                $agreeStatmentQuery = $db->query($sqlQueryAgree);
                                $agree = $agreeStatmentQuery->fetchAll(); 

                                foreach($agree as $agree){?>
                                    <p><?php echo $agree['PSEUDO_JOUEUR'];?></p>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="collapse" id="PouceRouge">
                            <div class="card card-body">
                                <?php 
                                
                                $id_avis = $avis['ID_AVIS'];
                                $sqlQueryAgree = "SELECT PSEUDO_JOUEUR
                                                        FROM JUGEMENTS NATURAL JOIN JOUEURS 
                                                        WHERE est_negatif = 1
                                                        AND id_avis = $id_avis";
                                
                                $agreeStatement = $db->prepare($sqlQueryAgree);  
                                $agreeStatmentQuery = $db->query($sqlQueryAgree);
                                $agree = $agreeStatmentQuery->fetchAll(); 

                                foreach($agree as $agree){?>
                                    <p><?php echo $agree['PSEUDO_JOUEUR'];?></p>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <?php } ?>
    </div>

    </body>

</html>
