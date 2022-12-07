
    <head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
		<title>Saxo Gang Bande Dessinée</title>
		<meta charset="utf-8" />
		<meta name="description" content="Base de données de 50 jeux de société, avec plus de 200 avis !" />
		<meta name="author" content="Luca PEREIRA" />

	</head>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto mr-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Visualisation
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="jeux.php">Jeux</a></li>
              <li><a class="dropdown-item" href="joueurs.php">Joueurs</a></li>
              <li><a class="dropdown-item" href="avis.php">Avis</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Requêtes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="jeux_critiques.php">Jeux critiqués pour un thème</a></li>
              <li><a class="dropdown-item" href="commentaire_categorie.php">Commentaires d'un joueur pour sa catégorie préférée</a></li>
              <li><a class="dropdown-item" href="appreciated_comment.php">Joueurs appreciant un avis</a></li>
              <li><a class="dropdown-item" href="ranking_players.php">Classement des joueurs selon le nombre d'avis déposés</a></li>
              <li><a class="dropdown-item" href="best_comment.php">Commentaire le mieux noté</a></li>
              <li><a class="dropdown-item" href="comment_list.php">Les n commentaires les plus récents</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ajouter
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="form_joueurs.php">Joueurs</a></li>
              <li><a class="dropdown-item" href="form_jeux.php">Jeux</a></li>
              <li><a class="dropdown-item" href="form_avis.php">Avis</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Entrer</button>
        </form>
      </div>
    </div>
  </nav>