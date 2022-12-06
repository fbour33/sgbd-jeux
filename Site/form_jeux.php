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
                    <form name="form" >
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="auteur" onChange="location = this.options[this.selectedIndex].value;">
                             <option disabled selected>Choisir le nombre d'auteur</option>
                             <option value="form_jeux.php?auteur=1">1</option>
                             <option value="form_jeux.php?auteur=2">2</option>
                        </select>
                    </form>                
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <?php for($i = 1; $i <= $_GET['auteur']; ++$i){ ?>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Nom auteur </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prenom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Prenom auteur </label>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col">
                        <h1 class="h3 text-white mt-2">Nombre d'illustrateur : </h1>
                    </div>
                    <div class="col">
                    <form name="form" >
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="illustrateur" onChange="location = this.options[this.selectedIndex].value;">
                             <option disabled selected>Choisir le nombre d''illustrateur</option>
                             <option value="form_jeux.php?illustrateur=1">1</option>
                             <option value="form_jeux.php?illustrateur=2">2</option>
                        </select>
                    </form>                
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <?php for($i = 1; $i <= $_GET['illustrateur']; ++$i){ ?>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="nom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Nom auteur </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="prenom" method="post" action="submit_form_joueurs.php"></textarea>
                            <label for="floatingTextarea">Prenom auteur </label>
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