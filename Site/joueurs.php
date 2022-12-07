<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JOUEURS ORDER BY PSEUDO_JOUEUR ASC;';
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $joueursStatement = $db->prepare($sqlQuery);
    $joueursStatement->execute();
    $joueurs = $joueursStatement->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">PSEUDO</div>
                <div class="col">NOM</div>
                <div class="col">PRENOM</div>
                <div class="col">MAIL</div>
                <div class="col">SUPPRIMER</div>
        </div>

            <?php 
            
            $compt = 0; 
            foreach($joueurs as $joueurs) {
                
                $ref = '#Delete' . $compt;
                $id = 'Delete' . $compt; 
            ?>


                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $joueurs['PSEUDO_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['NOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['PRENOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['MAIL_JOUEUR']?></div>
                    <div class="col mt-2">
                        <p>
                        <a class="btn btn-sm btn-outline-danger" data-bs-toggle="collapse" data-bs-target="<?php echo $ref; ?>" href="test.php" role="button" aria-expanded="false" aria-controls="<?php echo $id; ?>">
                            Supprimer
                        </a>
                        <p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="collapse" id="<?php echo $id; ?>">
                                <div class="card card-body">
                                    <?php
                                    print_r($joueurs['ID_JOUEUR']);
                                    print_r($id);
                                        //$id_joueur = $joueurs['ID_JOUEUR'];
                                        //$sqlQueryDelete = "DELETE FROM JOUEURS WHERE ID_JOUEUR = :id_joueur;";
//
                                        //$DeleteStatement = $db->prepare($sqlQueryDelete);
                                        //$DeleteStatement->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT); 
                                        //$DeleteStatement->execute(); 
                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php $compt++ ?>
            <?php } ?>
    </div>
    
    </body>
</html>