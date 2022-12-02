<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <?php include('connect.php'); 
    
    $sqlQuery = 'SELECT NOM_JEU FROM JEUX';

    $joueursStatement = $db->prepare($sqlQuery);  
    $jeuxStatmentQuery = $db->query($sqlQuery);
    $jeux = $jeuxStatmentQuery->fetchAll(); 

    ?>


    <body class="bg-light">
        <div class="col bg-dark pt-4 pb-4">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Choisir un jeu</option>
                <?php foreach($jeux as $jeux){ ?>
                        <option value="1"><?php echo $jeux['NOM_JEU'] ?></option>
                <?php } ?>
            </select>
        </div>
    </body>
</html>