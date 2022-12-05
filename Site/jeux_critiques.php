<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>



    <body class="bg-light">

    <?php

    include('connect.php'); 

    $sqlQuery = 'SELECT INTITULE_THEME FROM THEMES';

    //$joueursStatement = $db->prepare($sqlQuery);  
    $themesStatmentQuery = $db->query($sqlQuery);
    $themes = $themesStatmentQuery->fetchAll(); 

    ?>
        <form method="post" action="jeux_critiques.php">
        <div class="col bg-dark pt-4 pb-4">
            <form nethod="post">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="theme">
                <option disabled selected>Choisir un thème</option>
                <?php foreach($themes as $themes){ ?>
                        <option value=<?php echo $themes['INTITULE_THEME']?>><?php echo $themes['INTITULE_THEME']?></option>
                <?php } ?>
            </select>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
    <?php

    $nomTheme = isset($_POST['theme']) ? $_POST['theme'] : 0;
    //$sqlQueryId = "SELECT ID_THEME FROM THEMES WHERE INTITULE_THEME='$nomTheme'"; 
//
    //$StatmentQueryId = $db->query($sqlQueryId);
    //$idTheme = $idThemeStatmentQuery->fetchAll(); 

    $sqlQueryJeux = "SELECT DISTINCT J.nom_jeu, M.description_mecanique
                    FROM JEUX as J NATURAL JOIN MECANIQUES_UTIL NATURAL JOIN MECANIQUES as M NATURAL JOIN THEMES_UTIL
                    WHERE id_theme = ( SELECT id_theme FROM THEMES WHERE intitule_theme = '$nomTheme' )
                    AND id_jeu in ( SELECT DISTINCT id_jeu FROM CONFIGURATIONS)
                    ORDER BY description_mecanique ASC"; 

    $StatmentQueryJeux = $db->query($sqlQueryJeux);
    $jeuxMeca = $StatmentQueryJeux->fetchAll(); 
    
    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOM JEU</div>
                <div class="col">NOM MÉCANIQUE</div>
        </div>
            <?php foreach($jeuxMeca as $jeuxMeca) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $jeuxMeca[0]?></div>
                    <div class="col"><?php echo $jeuxMeca[1]?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>