<?php
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

$Acteur1 = new \BO\Acteur(4,'testNom','testPre','polonaise',new \DateTime("1990-05-27"));
$Acteur2 = new \BO\Acteur(10,'testUpdate','testPre','polonaise',new \DateTime("1990-05-27"));
$Admin1 = new \BO\Administrateur(4,'testUpdate','test','1234');
$Cla1 = new \BO\Classification(4,'testUpdate');
$Genre1 = new \BO\Genre(4,'testUpdate');
$Realisateur1 = new \BO\Realisateur(4,'testUpdate','test','polonais',true);

//-----------------find les Réalisateurs----------------
//$monreal = $RealisateurDAO->findReal(2);
//var_dump($monreal);


//-------------oeuvres----------------
//$monoeuvre = $OeuvreDAO->findOeuvre(1);
//var_dump($monoeuvre);
//$mesOeuvres = $OeuvreDAO->getAllOeuvre();
//var_dump($mesOeuvres);
$monOeuvre = $OeuvreDAO->findOeuvre(1);
var_dump($monOeuvre);
//$mesFilms = $OeuvreDAO->getAllFilm();
//var_dump($mesFilms);


//------------Acteurs-------------
$testgetall = $ActeurDAO->getAllAct();
//var_dump($testgetall);
//$testfind = $ActeurDAO->findAct(2);
//var_dump($testfind);
//$testCreateActeur = $ActeurDAO->createAct($Acteur1);
//var_dump($testCreateActeur);
//$testUpdateActeur = $ActeurDAO->updateAct($Acteur2);
//var_dump($testUpdateActeur);
//$testDeleteActeur = $ActeurDAO->deleteAct($Acteur2);
//var_dump($testDeleteActeur);
//$testActeurbyOeuvre = $ActeurDAO->getAllActByOeuvre(1);
//var_dump($testActeurbyOeuvre);
//$testActeurP = $ActeurDAO->getAllActPByOeuvre(2);
//var_dump($testActeurP);

?>
    <!--<!DOCTYPE html>
    <html>
    <head>
        <title>Liste des Acteurs</title>
    </head>
    <body>
    <h1>Liste des Acteurs</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nationalité</th>
            <th>Date de Naissance</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($testgetall as $acteur): ?>
            <tr>
                <td><?php echo $acteur->getIdAct(); ?></td>
                <td><?php echo $acteur->getNomAct(); ?></td>
                <td><?php echo $acteur->getPrenomAct(); ?></td>
                <td><?php echo $acteur->getNationaliteAct(); ?></td>
                <td><?php echo $acteur->getDateNaissanceAct()->format('Y-m-d'); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </body>
    </html>-->


<?php
//------------admins------------
//$testgetAllAdmin = $AdministrateurDAO->getAllAdmin();
//var_dump($testgetAllAdmin);
//$testfindAdmin = $AdministrateurDAO->findAdmin(2);
//var_dump($testfindAdmin);
//$testcreateAdmin = $AdministrateurDAO->createAdmin($Admin1);
//var_dump($testcreateAdmin);
//$testupdateAdmin = $AdministrateurDAO->updateAdmin($Admin1);
//var_dump($testupdateAdmin);
//$testdeleteadmin = $AdministrateurDAO->deleteAdmin($Admin1);
//var_dump($testdeleteadmin);
//$testVerif = $AdministrateurDAO->verifAdmin('greffet',1234);
//var_dump($testVerif);



//------------classification---------
//$testgetAllCla = $ClassificationDAO->getAllCla();
//var_dump($testgetAllCla);
//$testfindCla = $ClassificationDAO->findCla(2);
//var_dump($testfindCla);
//$testcreateCla = $ClassificationDAO->createCla($Cla1);
//var_dump($testcreateCla);
//$testupdateCla = $ClassificationDAO->updateCla($Cla1);
//var_dump($testupdateCla);
//$testdeleteCla = $ClassificationDAO->deleteCla($Cla1);
//var_dump($testdeleteCla);

//-------------Genre-------------
//$testGetAllGenre = $GenreDAO->getAllGenre();
//var_dump($testGetAllGenre);
//$testFindGenre = $GenreDAO->findGenre(2);
//var_dump($testFindGenre);
//$testCreateGenre = $GenreDAO->createGenre($Genre1);
//var_dump($testCreateGenre);
//$testupdateGenre = $GenreDAO->updateGenre($Genre1);
//var_dump($testupdateGenre);
//$testdeleteGenre = $GenreDAO->deleteGenre($Genre1);
//var_dump($testdeleteGenre);




//------------realisateurs-----------
//$testGetAllReal = $RealisateurDAO->getAllReal();
//var_dump($testGetAllReal);
//$testFindReal = $RealisateurDAO->findReal(2);
//var_dump($testFindReal);
//$testCreateReal = $RealisateurDAO->createReal($Realisateur1);
//var_dump($testCreateReal);
//$testUpdtaeReal = $RealisateurDAO->updateReal($Realisateur1);
//var_dump($testUpdtaeReal);
//$testdeleteReal = $RealisateurDAO->deleteReal($Realisateur1);
//var_dump($testdeleteReal);
?>