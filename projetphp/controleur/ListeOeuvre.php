<?php
session_start();
require_once ('../Modele/BO/Acteur.php');
require_once ('../Modele/BO/Administrateur.php');
require_once ('../Modele/BO/Classification.php');
require_once ('../Modele/BO/Genre.php');
require_once ('../Modele/BO/Realisateur.php');
require_once ('../Modele/BO/Oeuvre.php');


require_once ('../Modele/DAO/ActeurDAO.php');
require_once ('../Modele/DAO/RealisateurDAO.php');
require_once ('../Modele/DAO/OeuvreDAO.php');
require_once ('../Modele/DAO/AdministrateurDAO.php');
require_once ('../Modele/DAO/ClassificationDAO.php');
require_once ('../Modele/DAO/GenreDAO.php');


require_once ("../Modele/BDDManager.php");


$bdd=initialiseConnexionBDD();
$ActeurDAO = new \DAO\ActeurDAO($bdd);
$RealisateurDAO = new \DAO\RealisateurDAO($bdd);
$AdministrateurDAO = new \DAO\AdministrateurDAO($bdd);
$ClassificationDAO = new \DAO\ClassificationDAO($bdd);
$OeuvreDAO = new \DAO\oeuvreDAO($bdd);
$GenreDAO = new \DAO\genreDAO($bdd);

if(isset($_GET['connect']) && $_GET['connect'] = 'unset') {
    unset($_SESSION['login']);
}
$OeuvreDAO = new \DAO\OeuvreDAO($bdd);
$titre = 'accueil';
$mesFilms = $OeuvreDAO->getAllFilm();
$mesSeries = $OeuvreDAO->getAllSerie();
$mesAnimes = $OeuvreDAO->getAllAnime();
if(isset($_SESSION['login'])&&$_SESSION['login']!='' ){
    
    include('../vue/navBarre.php');
}
else{
    include('../vue/navBarreSC.php');
}
include('../vue/vueListeOeuvre.php');
include('../vue/basDePage.php');
