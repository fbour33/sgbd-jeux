<!DOCTYPE html>
<html>


    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <div class="container bg-dark mt-2 pb-3 rounded-lg">
        <h1 class="text-white h3">Ajouter un jeu</h1>
        <form method="post" action="submit_form_joueurs.php">
            <div class="container mt-2">
                <div class="form-floating ">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" method="post"></textarea>
                    <label for="floatingTextarea">Nom</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Date de création (dd/mm/yyyy)</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Editeur</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col">
                        <h1 class="h3 text-white mt-2">Nombre d'auteur : </h1>
                    </div>
                    <div class="col">
                        <input type="select">
                        <name>Test</name>
                                <label>Choisir un nombre d'auteur</label>
                                        <option value="1" name="nb_auteur">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                        </input>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <?php for($i = 1; $i < $_POST['nb_auteur']; ++$i){ ?>
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Nom</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prenom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Prenom</label>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Illustrateur</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Date de création</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Durée de jeu</label>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Nombre de joueur minimum</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
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