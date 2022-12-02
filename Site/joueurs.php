<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JOUEURS ORDER BY PSEUDO_JOUEUR ASC; NOM_JOUEUR ASC';

    //$joueursStatement = $db->prepare($sqlQuery);  
    $joueursStatmentQuery = $db->query($sqlQuery);
    $joueurs = $joueursStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">PSEUDO</div>
                <div class="col">NOM</div>
                <div class="col">PRENOM</div>
                <div class="col">MAIL</div>
        </div>
            <?php foreach($joueurs as $joueurs) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $joueurs['PSEUDO_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['NOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['PRENOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['MAIL_JOUEUR']?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>