<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>

    <?php

    include('connect.php'); 

    $sqlQueryType = 'SELECT DISTINCT TYPE_JEU FROM JEUX';
    $typeStatement = $db->prepare($sqlQueryType);  
    $typeStatement->execute();
    $type = $typeStatement->fetchAll();

    ?>
    <div class="container bg-dark mt-2 pb-3 rounded-lg">
        <h1 class="text-white h3">Ajouter un jeu</h1>
        <form method="post" action="submit_form_jeux.php">
            <div class="container mt-2">
                <div class="form-floating ">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom"></textarea>
                    <label for="floatingTextarea">Nom</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="editeur"></textarea>
                    <label for="floatingTextarea">Editeur</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom_aut"></textarea>
                            <label for="floatingTextarea">Nom auteur</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prenom_aut"></textarea>
                            <label for="floatingTextarea">Prenom auteur</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom_illu"></textarea>
                            <label for="floatingTextarea">Nom illustrateur </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prenom_illu"></textarea>
                            <label for="floatingTextarea">Prenom illustrateur </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type">
                    <option disabled selected>Type de jeu</option>
                    <?php foreach($type as $type){ ?>
                            <option value=<?php echo $type[0]; ?>><?php echo $type[0]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="date"></textarea>
                    <label for="floatingTextarea">Date de création (yyy-mm-dd)</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="duree"></textarea>
                    <label for="floatingTextarea">Durée de jeu</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nb_min"></textarea>
                            <label for="floatingTextarea">Nombre de joueur minimum</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nb_max"></textarea>
                            <label for="floatingTextarea">Nombre de joueurs maximum</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
            <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>  
    </body>
</html>