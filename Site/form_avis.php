<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>

    <?php

    include('connect.php'); 

    $sqlQueryPseudo = 'SELECT PSEUDO_JOUEUR FROM JOUEURS;';
    $pseudoStatement = $db->prepare($sqlQueryPseudo);  
    $pseudoStatement->execute();
    $pseudo = $pseudoStatement->fetchAll();

    $sqlQueryJeu = 'SELECT NOM_JEU FROM JEUX;';
    $jeuStatement = $db->prepare($sqlQueryJeu);  
    $jeuStatement->execute();
    $jeu = $jeuStatement->fetchAll();

    ?>
    <div class="container bg-dark mt-2 pb-3 rounded-lg">
        <h1 class="text-white h3">Ajouter un avis</h1>
        <form method="post" action="submit_form_avis.php">
        <div class="container mt-2">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Pseudo">
                    <option disabled selected>Pseudo</option>
                    <?php foreach($pseudo as $pseudo){ ?>
                            <option value=<?php echo $pseudo[0]; ?>><?php echo $pseudo[0]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="container mt-2">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="nom">
                    <option disabled selected>Nom du jeu</option>
                    <?php foreach($jeu as $jeu){ ?>
                            <option value=<?php echo $jeu[0]; ?>><?php echo $jeu[0]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="container mt-2">
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nb_joueur"></textarea>
                            <label for="floatingTextarea">Nombre de joueur</label>
                        </div>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="note">
                        <option disabled selected>Note</option>
                        <?php for($i = 0; $i <= 20; $i++){ ?>
                                <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="date_avis"></textarea>
                    <label for="floatingTextarea">Date (yyyy-mm-dd)</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating" rows="3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="commentaire"></textarea>
                    <label for="floatingTextarea">Commentaire</label>
                </div>
            </div>
            <div class="container mt-2">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>  
    </body>
</html>