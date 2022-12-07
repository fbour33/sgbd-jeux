<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>



    <body class="bg-light">

    <?php

    include('connect.php'); 

    ?>
        <div class="col bg-dark pt-4 pb-4">
            <form method="post"> <!--- action="jeux_critiques.php" -->
            <!--<form name="form">-->
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onChange="location = this.options[this.selectedIndex].value;" name="Nombre">
                    <option disabled selected>Choisir un nombre</option>
                    <?php for ($i = 1; $i <= 100; $i++){ ?>
                            <option value="comment_list.php?Nombre=<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
    <?php

    $nombre = isset($_GET['Nombre']) ? $_GET['Nombre'] : 0;

    echo $nombre;

    $sqlQueryAvis = "SELECT A.*,  PSEUDO_JOUEUR, NB_JOUEUR FROM Avis AS A NATURAL JOIN JOUEURS NATURAL JOIN CONFIGURATIONS ORDER BY date_avis DESC LIMIT :nombre "; 

    $StatementAvis = $db->prepare($sqlQueryAvis);
    $StatementAvis->bindParam(':nombre', $nombre, PDO::PARAM_INT);
    $StatementAvis->execute(); 
    $avis = $StatementAvis->fetchAll();
    
    ?>

<div class="container text-center ">
            <?php if(isset($_GET['Nombre'])){?>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo 'Liste des ' . $nombre . ' derniers commentaires'; ?></div>
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