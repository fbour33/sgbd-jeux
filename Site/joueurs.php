<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JOUEURS ORDER BY PSEUDO_JOUEUR ASC;';
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

            $sqlQueryDelete = "DELETE FROM JOUEURS WHERE PSEUDO_JOUEUR = :id_joueur;";
            $DeleteStatement = $db->prepare($sqlQueryDelete);

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
                        <a class="btn btn-sm btn-outline-danger" data-bs-toggle="collapse" data-bs-target="<?php echo $ref; ?>" href="<?php echo $ref; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $id; ?>">
                            Supprimer
                        </a>
                        <p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="collapse" id="<?php echo $id; ?>">
                                <div class="card card-body">
                                    <p>Work in progress ...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $compt++; ?>
            <?php } ?>
    
    </body>
</html>