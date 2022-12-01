<!DOCTYPE html>
<html>

    <head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        
		<title>Saxo Gang Bande Dessinée</title>
		<meta charset="utf-8" />
		<meta name="description" content="Base de données de 50 jeux de société, avec plus de 200 avis !" />
		<meta name="author" content="Luca PEREIRA" />
	</head>

    <header>
        <?php include('header.php'); ?> 
    </header>

    <body>
    <?php include('connect.php'); 

    $sqlQuery = 'SELECT * FROM JOUEURS ORDER BY PSEUDO_JOUEUR ASC; NOM_JOUEUR ASC';

    //$joueursStatement = $db->prepare($sqlQuery);  
    $joueursStatmentQuery = $db->query($sqlQuery);
    $joueurs = $joueursStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">PSEUDO</div>
                <div class="col">NOM</div>
                <div class="col">PRENOM</div>
                <div class="col">MAIL</div>
        </div>
            <?php foreach($joueurs as $joueurs) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $joueurs['PSEUDO_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['NOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['PRENOM_JOUEUR']?></div>
                    <div class="col"><?php echo $joueurs['MAIL_JOUEUR']?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>