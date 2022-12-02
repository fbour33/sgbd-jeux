<!DOCTYPE html>
<html>
    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <div class="container bg-dark mt-2 pb-3 rounded-lg">
        <h1 class="text-white h3">Ajouter un joueur</h1>
        <form method="post" action="submit_form_joueurs.php">
            <div class="container mt-2">
            <div class="form-floating ">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="pseudo" method="post" action="submit_form_joueurs.php"></textarea>
                <label for="floatingTextarea" >Pseudo</label>
            </div>
        </div>
        <div class="container mt-2">
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
        </div>
        <div class="container mt-2">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="mail" method="post" action="submit_form_joueurs.php"></textarea>
                <label for="floatingTextarea">Mail</label>
            </div>
        </div>
        <div class="container mt-2">
        <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
    </div>  
    </body>
</html>