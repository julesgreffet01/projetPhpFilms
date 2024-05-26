<?php
session_start();
require_once ("../Modele/BDDManager.php");


require_once('../Modele/DAO/OeuvreDAO.php');



require_once ('../Modele/BO/Acteur.php');
require_once ('../Modele/BO/Classification.php');
require_once ('../Modele/BO/Genre.php');
require_once ('../Modele/BO/Realisateur.php');
require_once ('../Modele/BO/Oeuvre.php');
$bdd=initialiseConnexionBDD();

if(isset($_GET['connect']) && $_GET['connect'] = 'unset') {
    unset($_SESSION['login']);
}
$OeuvreDAO = new \DAO\OeuvreDAO($bdd);

if(isset($_GET['idOeuvre'])){
    $monoeuvre = $OeuvreDAO->findOeuvre($_GET['idOeuvre']);
    $titre = 'détails de l id';


    if(isset($_SESSION['login'])&&$_SESSION['login']!='' ){
        include('../vue/navBarre.php');
    }
    else{
        include('../vue/navBarreSC.php');
    }
    include_once('../vue/vueDetailOeuvre.php');
}