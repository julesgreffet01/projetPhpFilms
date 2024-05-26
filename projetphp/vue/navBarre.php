<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JulesCorporate </title>
    <link rel="icon" href="../img/julescorp.ico" type="image/x-icon">
    <link href="../css/navBarre.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"rel="stylesheet" type="text/css">
    <link href="../css/vueListeOeuvres.css"rel="stylesheet" type="text/css">
    <link href="../css/basDePage.css"rel="stylesheet" type="text/css">


</head>
<body>

<nav>
    <a href="../index.php" class="nav-item is-active" data-target="Bienvenue">Bienvenue <?php echo $_SESSION['prenom'] ?> </a>
    <a href="../controleur/listefilms.php" class="nav-item"  data-target="Films">Films</a>
    <a href="../controleur/listeSeries.php" class="nav-item"  data-target="Séries">Séries</a>
    <a href="../controleur/listeAnimes.php" class="nav-item"  data-target="Animés">Animés</a>
    <a href="../controleur/gestionOeuvre.php" class="nav-item"  data-target="Gérer oeuvres">Gestion</a>
    <form>
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input class="search-input" type="search" placeholder="Rechercher votre oeuvre">
        </div>
    </form>
    <span class="nav-indicator"></span>
    <a href="ListeOeuvre.php?connect=unset" class="nav-item" data-active-color="black" data-target="Se connecter" >Se déconnecter</a>
</nav>
