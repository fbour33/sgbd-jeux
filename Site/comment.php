<div class="container text-center ">
            <?php foreach($avis as $avis) {?>
                <div class="row bg-black border border-dark mt-2"><?php echo 'Le ' . $avis['DATE_AVIS'] . ', ' . $avis['PSEUDO_JOUEUR'] . ' a posté :'; ?></div>
                <div class="row bg-light border border-dark">
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
                                                        AND id_avis = $id_avis;";
                                
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
                                                        AND id_avis = $id_avis;";
                                
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