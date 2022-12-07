<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body class="bg-light">

    <?php

    include('connect.php'); 

    ?>
        <div class="col bg-dark pt-4 pb-4">
            <form method="post"> <!--- action="jeux_critiques.php" -->
            <!--<form name="form">-->
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onChange="location = this.options[this.selectedIndex].value;" name="Nombre">
                    <option disabled selected>Choisir un nombre</option>
                    <?php for ($i = 1; $i <= 100; $i++){ ?>
                            <option value="comment_list.php?Nombre=<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </form>
        </div>
    <?php

    $nombre = isset($_GET['Nombre']) ? $_GET['Nombre'] : 0;

    $sqlQueryAvis = "SELECT A.*,  PSEUDO_JOUEUR, NB_JOUEUR FROM Avis AS A NATURAL JOIN JOUEURS NATURAL JOIN CONFIGURATIONS ORDER BY date_avis DESC LIMIT :nombre "; 

    $StatementAvis = $db->prepare($sqlQueryAvis);
    $StatementAvis->bindParam(':nombre', $nombre, PDO::PARAM_INT);
    $StatementAvis->execute(); 
    $avis = $StatementAvis->fetchAll();
    
    ?>

    <?php if(isset($_GET['Nombre'])){?>
        <div class="row justify-content-md-center border mt-2 bg-dark text-white"><?php echo 'Liste des ' . $nombre . ' derniers commentaires'; ?></div>
        <div class="row justify-content-md-center border mt-2 bg-dark text-white">
            <div class="col">NOTE</div>
            <div class="col">NB JOUEUR</div>
            <div class="col">COMMENTAIRE</div>
            <div class="col">APPRECIATION</div>
        </div>
    <?php }?>

    <?php include('comment.php'); ?>
    
    </body>
</html>