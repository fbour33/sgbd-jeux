<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>



    <body class="bg-light">

    <?php

    include('connect.php'); 

    $sqlQuery = 'SELECT INTITULE_THEME FROM THEMES';

    $themesStatement = $db->prepare($sqlQuery);  
    $themesStatmentQuery = $db->query($sqlQuery);
    $themes = $themesStatmentQuery->fetchAll(); 

    ?>
        <div class="col bg-dark pt-4 pb-4">
            <form method="post"> <!--- action="jeux_critiques.php" -->
            <!--<form name="form">-->
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onChange="location = this.options[this.selectedIndex].value;" name="Theme">
                    <option disabled selected>Choisir un thème</option>
                    <?php foreach($themes as $themes){ ?>
                            <option value="jeux_critiques.php?Theme=<?php echo $themes['INTITULE_THEME']?>"><?php echo $themes['INTITULE_THEME']?></option>
                    <?php } ?>
                </select>
            <!--<button type="submit" class="btn btn-primary">Ajouter</button> -->
            </form>
        </div>
    <?php

    $nomTheme = isset($_GET['Theme']) ? $_GET['Theme'] : '';
    //$sqlQueryId = "SELECT ID_THEME FROM THEMES WHERE INTITULE_THEME='$nomTheme'"; 
//
    //$StatmentQueryId = $db->query($sqlQueryId);
    //$idTheme = $idThemeStatmentQuery->fetchAll(); 

    $sqlQueryJeux = "SELECT DISTINCT J.nom_jeu, M.description_mecanique
                    FROM JEUX as J NATURAL JOIN MECANIQUES_UTIL NATURAL JOIN MECANIQUES as M NATURAL JOIN THEMES_UTIL
                    WHERE id_theme = ( SELECT id_theme FROM THEMES WHERE intitule_theme = '$nomTheme' )
                    AND id_jeu in ( SELECT DISTINCT id_jeu FROM CONFIGURATIONS)
                    ORDER BY description_mecanique ASC"; 

    $StatmentJeux = $db->prepare($sqlQueryJeux);
    $StatmentQueryJeux = $db->query($sqlQueryJeux); 
    $jeuxMeca = $StatmentQueryJeux->fetchAll();
    
    ?>

    <div class="container text-center ">
        <?php if(isset($_GET['Theme'])){?>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo $nomTheme; ?></div>
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOM JEU</div>
                <div class="col">NOM MÉCANIQUE</div>
            </div>
        <?php } ?>
            <?php foreach($jeuxMeca as $jeuxMeca) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $jeuxMeca[0]?></div>
                    <div class="col"><?php echo $jeuxMeca[1]?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>