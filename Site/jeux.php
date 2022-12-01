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

    $sqlQuery = 'SELECT * FROM JEUX';

    $joueursStatement = $db->prepare($sqlQuery);  
    $jeuxStatmentQuery = $db->query($sqlQuery);
    $jeux = $jeuxStatmentQuery->fetchAll(); 

    ?>

    <div class="container text-center ">
            <div class="row justify-content-md-center border mt-2 bg-dark text-white">
                <div class="col">NOM</div>
                <div class="col">EDITEUR</div>
                <div class="col">TYPE DE JEU</div>
                <div class="col">DATE</div>
                <div class="col">DUREE</div>
                <div class="col-4">NOMBRE DE JOUEURS MIN-MAX</div>
        </div>
            <?php foreach($jeux as $jeux) {?>
                <div class="row bg-light border mt-2">
                    <div class="col"><?php echo $jeux['NOM_JEU']?></div>
                    <div class="col"><?php echo $jeux['EDITEUR_JEU']?></div>
                    <div class="col"><?php echo $jeux['TYPE_JEU']?></div>
                    <div class="col"><?php echo $jeux['DATE_JEU']?></div>
                    <div class="col"><?php echo "" . $jeux['DUREE_JEU'] . "min" ?></div>
                    <div class="col-4"><?php echo $jeux['NB_JOUEURS_MIN'] . ' - ' .$jeux['NB_JOUEURS_MAX']?></div>
            </div>
            <?php } ?>
    </div>
    
    </body>
</html>