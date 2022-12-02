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
                        <h1 class="h3">Nombre d'auteur : </h1>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="Auteur">
                            <option selected >Nombre</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Auteur</label>
                </div>
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