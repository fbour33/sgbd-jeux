<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT ID_JOUEUR, PSEUDO_JOUEUR, COUNT(id_avis) as AVIS_DONNE
    FROM JOUEURS LEFT OUTER JOIN AVIS USING(id_joueur)
    GROUP BY id_joueur, pseudo_joueur
    ORDER BY Avis_donne DESC';

    $joueursStatement = $db->prepare($sqlQuery);  
    $joueursStatmentQuery = $db->query($sqlQuery);
    $joueurs = $joueursStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOMBRE D'AVIS DONNES</div>
                <div class="col">PSEUDO_JOUEUR</div>
        </div>
            <?php foreach($joueurs as $joueurs) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $joueurs['AVIS_DONNE']?></div>
                    <div class="col"><?php echo $joueurs['PSEUDO_JOUEUR']?></div>
                </div>
            <?php } ?>
    </div>
    
    </body>
</html>