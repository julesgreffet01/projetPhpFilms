<?php
session_start();
require_once('../Modele/BO/Acteur.php');
require_once('../Modele/BO/Administrateur.php');
require_once('../Modele/BO/Classification.php');
require_once('../Modele/BO/Genre.php');
require_once('../Modele/BO/Realisateur.php');
require_once('../Modele/BO/Oeuvre.php');


require_once('../Modele/DAO/ActeurDAO.php');
require_once('../Modele/DAO/RealisateurDAO.php');
require_once('../Modele/DAO/OeuvreDAO.php');
require_once('../Modele/DAO/AdministrateurDAO.php');
require_once('../Modele/DAO/ClassificationDAO.php');
require_once('../Modele/DAO/GenreDAO.php');


require_once("../Modele/BDDManager.php");


$bdd = initialiseConnexionBDD();

if(isset($_GET['connect']) && $_GET['connect'] = 'unset') {
    unset($_SESSION['login']);
}

$ActeurDAO = new \DAO\ActeurDAO($bdd);
$RealisateurDAO = new \DAO\RealisateurDAO($bdd);
$AdministrateurDAO = new \DAO\AdministrateurDAO($bdd);
$ClassificationDAO = new \DAO\ClassificationDAO($bdd);
$OeuvreDAO = new \DAO\oeuvreDAO($bdd);
$GenreDAO = new \DAO\genreDAO($bdd);

$titre = 'accueil';

$Oeuvres = $OeuvreDAO->getAllOeuvre();
$Reals = $RealisateurDAO->getAllReal();
$Acteurs = $ActeurDAO->getAllAct();
$Classifications = $ClassificationDAO->getAllCla();
$Genres = $GenreDAO->getAllGenre();
$idOeuvre = 0;
if(isset($_SESSION['login'])&&$_SESSION['login']!=''){

    include('../vue/navBarre.php');
}
else{
    include('../vue/navBarreSC.php');
}

if (isset($_POST['BtnAdd']) && $_POST['idOeuvre'] && $_POST['titOri']!='' && $_POST['titFr']!='' && $_POST['Clas']!='' && $_POST['dur']!='' && $_POST['anneeSort']!='' && $_POST['res']!='' && $_POST['img']!='' && $_POST['nbEp']!=''){
    $Classification1 = $ClassificationDAO->findCla($_POST['Clas']);
    $Oeuvre = new \BO\Oeuvre($_POST['idOeuvre'],$_POST['titOri'],$_POST['titFr'],$_POST['anneeSort'],$_POST['res'],$_POST['nbEp'],$_POST['img'],$Classification1);
//------------------------------------------acteurs----------------------------------------
    if ($_POST['Acteur1']!=''){
        $Acteur1 = $ActeurDAO->findAct($_POST['Acteur1']);
        $tabActeurs[] = $Acteur1;
        if ($_POST['Acteur2']!=''){
            $Acteur2 = $ActeurDAO->findAct($_POST['Acteur2']);
            $tabActeurs[] = $Acteur2;
        }
        $Oeuvre->setActeurs($tabActeurs);
    }else if($_POST['Acteur2']!=''){
        $Acteur2 = $ActeurDAO->findAct($_POST['Acteur2']);
        $tabActeurs[] = $Acteur2;
        $Oeuvre->setActeurs($tabActeurs);
    }

    if ($_POST['ActeurP']!=''){
        $ActeurP = $ActeurDAO->findAct($_POST['ActeurP']);
        $tabActeurP[] = $ActeurP;
        $Oeuvre->setActeurP($tabActeurP);
    }

    //-------------------------genres---------------------
    if ($_POST['Genre1']!=''){
        $Genre1 = $GenreDAO->findGenre($_POST['Genre1']);
        $tabGenres[] = $Genre1;
        if ($_POST['Genre2']!=''){
            $Genre1 = $GenreDAO->findGenre($_POST['Genre2']);
            $tabGenres[] = $Genre1;
        }
        $Oeuvre->setMesgenres($tabGenres);
    }else if($_POST['Genre2']!=''){
        $Genre2 = $GenreDAO->findGenre($_POST['Genre2']);
        $tabGenres[] = $Genre2;
        $Oeuvre->setMesgenres($tabGenres);
    }

    //------------------------------realisateurs--------------------------
    if ($_POST['Real1']!=''){
        $Real1 = $RealisateurDAO->findReal($_POST['Real1']);
        $tabReals[] = $Real1;
        if ($_POST['Real2']!='') {
            $Real2 = $RealisateurDAO->findReal($_POST['Real2']);
            $tabReals[] = $Real2;
        }
        $Oeuvre->setMesrealisateurs($tabReals);
    }else if($_POST['Real2']!=''){
        $Real2 = $RealisateurDAO->findReal($_POST['Real2']);
        $tabReals[] = $Real2;
        $Oeuvre->setMesrealisateurs($tabReals);
    }
    $OeuvreDAO->updateOeuvre($Oeuvre);
    header('Location:ListeOeuvre.php');
}else {
    include('../vue/modifierOeuvre.php');
    include('../vue/basDePage.php');
}
