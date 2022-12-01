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

    <?php include('connect.php'); 
    
    $sqlQuery = 'SELECT NOM_JEU FROM JEUX';

    $joueursStatement = $db->prepare($sqlQuery);  
    $jeuxStatmentQuery = $db->query($sqlQuery);
    $jeux = $jeuxStatmentQuery->fetchAll(); 

    ?>


    <body class="bg-light">
        <div class="col bg-dark pt-4 pb-4">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected>Choisir un jeu</option>
                <?php foreach($jeux as $jeux){ ?>
                        <option value="1"><?php echo $jeux['NOM_JEU'] ?></option>
                <?php } ?>
            </select>
        </div>
    </body>
</html>