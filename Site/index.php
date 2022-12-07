<!DOCTYPE html>
<html>

    <header>
        <?php include('header.php'); ?>
    </header>

    <body>
    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT nom_jeu, SUM(note_avis)/ Count(note_avis) as Notes
                 FROM AVIS NATURAL JOIN CONFIGURATIONS NATURAL JOIN JEUX
                 GROUP BY id_jeu
                 ORDER BY Notes DESC;';

    $jeuxStatement = $db->prepare($sqlQuery);  
    $jeuxStatement->execute();
    $jeux = $jeuxStatement->fetchAll(); 

    ?>

    <div class="container text-center ">
        <div class="row justify-content-md-center border border-white mt-2 bg-dark text-white">
            <h1 class="h4"> 
                Vous ne savez pas à quoi jouer ce soir ? Vous ne savez plus comment occuper vos 
                nuits d'insomnie ? Regardez la sélection de nos meilleurs jeux, notés par nos 
                plus fidèles joueurs !
            </h1>
            <div class="row justify-content-md-center border border-white mt-2 bg-dark text-white">
            </div>
                <div class="col">CLASSEMENT</div>
                <div class="col">JEU</div>
                <div class="col">NOTE</div>
        </div>
        <?php $compt=1 ?>
            <?php foreach($jeux as $jeux) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $compt ?></div>
                    <div class="col"><?php echo $jeux['nom_jeu']?></div>
                    <div class="col"><?php echo $jeux['Notes']?></div>
            </div>
            <?php $compt++ ?>
            <?php } ?>
    </div>
    </body>

</html>