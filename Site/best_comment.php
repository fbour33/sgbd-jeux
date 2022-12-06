<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>

    <?php 
    
    include('connect.php'); 

    $sqlQuery = 'SELECT ID_AVIS, COUNT(*) as JUGEMENT_OBTENU
                 FROM Jugements
                 GROUP BY id_avis
                 HAVING COUNT(*) = (
                                    SELECT MAX(COUNT(*))
                                    FROM Jugements
                                    GROUP BY id_avis
                                   )';

    $avisStatement = $db->prepare($sqlQuery);  
    $avisStatmentQuery = $db->query($sqlQuery);
    $avis = $avisStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">ID AVIS</div>
                <div class="col">APRECIATION</div>
        </div>
            <?php foreach($avis as $avis) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $avis['ID_AVIS']?></div>
                    <div class="col"><?php echo $avis['JUGEMENT_OBTENU']?></div>
                </div>
            <?php } ?>
    </div>
    
    </body>
</html>