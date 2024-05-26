<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JulesCorporate</title>
    <link rel="icon" href="../img/julescorp.ico" type="image/x-icon">
    <link href="../css/navBarreSC.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"rel="stylesheet" type="text/css">
    <link href="../css/vueListeOeuvres.css"rel="stylesheet" type="text/css">
    <link href="../css/basDePage.css"rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <a href="../index.php" class="nav-item is-active"  data-target="Bienvenue">Bienvenue</a>
    <a href="../controleur/listeFilms.php" class="nav-item"  data-target="Films">Films</a>
    <a href="../controleur/listeSeries.php" class="nav-item"  data-target="Séries">Séries</a>
    <a href="../controleur/listeAnimes.php" class="nav-item"  data-target="Animés">Animés</a>
    <form>
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input class="search-input" type="search" placeholder="Rechercher votre oeuvre">
        </div>
    </form>
    <span class="nav-indicator"></span>
    <a href="../controleur/connexion_controller.php" class="nav-item2" data-target="Se connecter" >Se connecter</a>
</nav>

