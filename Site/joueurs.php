<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JOUEURS ORDER BY PSEUDO_JOUEUR ASC; NOM_JOUEUR ASC';

    $joueursStatmentQuery = $db->query($sqlQuery);
    $joueurs = $joueursStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">PSEUDO</div>
                <div class="col">NOM</div>
                <div class="col">PRENOM</div>
                <div class="col">MAIL</div>
                <div class="col">SUPPRIMER</div>
        </div>
            <?php foreach($joueurs as $joueurs) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $joueurs['PSEUDO_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['NOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['PRENOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['MAIL_JOUEUR']?></div>
                    <div class="col mt-2">
                        <p>
                        <a class="btn btn-sm btn-outline-danger" data-bs-toggle="collapse" data-bs-target="#Delete" href="#Delete" role="button" aria-expanded="false" aria-controls="Delete">
                            Supprimer
                        </a>
                        <p>
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="collapse" id="Supprimer">
                            <div class="card card-body">
                                
                                <?php 
                                
                                $sqlQueryAgree = "SELECT PSEUDO_JOUEUR FROM JOUEURS";
                              
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