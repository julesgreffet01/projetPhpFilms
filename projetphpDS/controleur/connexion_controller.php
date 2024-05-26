<?php
// controller/connexion_controller.php

session_start();

require_once '../Modele/BDDManager.php';
require_once '../Modele/DAO/AdministrateurDAO.php';
require_once '../Modele/BO/Administrateur.php';

$bdd = initialiseConnexionBDD();
$AdministrateurDAO = new \DAO\AdministrateurDAO($bdd);
$_SESSION = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    if ($nom != "" && $password != "") {
        $admin = $AdministrateurDAO->verifAdmin($nom,$password);
        if ($admin) {
            $_SESSION['login'] = $admin->getNomAdmin();// Utilisez la méthode appropriée pour obtenir le nom de l'administrateur
            $_SESSION['prenom'] = $admin->getPrenomAdmin();
            header("Location: ListeOeuvre.php"); // Rediriger vers la page des oeuvres après connexion
            exit();
        } else {
            $error_message = "Identifiant ou mot de passe incorrect !";
        }
    }
}

include_once '../vue/vue_connexion.php';
