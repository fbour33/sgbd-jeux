<!DOCTYPE html>
<html>

    <head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
		<title>Saxo Gang Bande Dessinée</title>
		<meta charset="utf-8" />
		<meta name="description" content="Base de données de 50 jeux de société, avec plus de 200 avis !" />
		<meta name="author" content="Luca PEREIRA" />
	</head>

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