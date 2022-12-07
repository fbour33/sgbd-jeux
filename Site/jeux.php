<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JEUX';

    $joueursStatement = $db->prepare($sqlQuery);  
    $jeuxStatmentQuery = $db->query($sqlQuery);
    $jeux = $jeuxStatmentQuery->fetchAll(); 

    $compt = 0;

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOM</div>
                <div class="col">EDITEUR</div>
                <div class="col">TYPE DE JEU</div>
                <div class="col">DATE</div>
                <div class="col">DUREE</div>
                <div class="col-2">JOUEURS MIN-MAX</div>
                <div class="col">SUPPRIMER</div>
        </div>
            <?php foreach($jeux as $jeux) {

                $ref = '#Delete' . $compt;
                $id = 'Delete' . $compt; 

                ?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $jeux['NOM_JEU']?></div>
                    <div class="col"><?php echo $jeux['EDITEUR_JEU']?></div>
                    <div class="col"><?php echo $jeux['TYPE_JEU']?></div>
                    <div class="col"><?php echo $jeux['DATE_JEU']?></div>
                    <div class="col"><?php echo "" . $jeux['DUREE_JEU'] . "min" ?></div>
                    <div class="col-2"><?php echo $jeux['NB_JOUEURS_MIN'] . ' - ' .$jeux['NB_JOUEURS_MAX']?></div>
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