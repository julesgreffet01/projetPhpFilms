<?php include('navBarre.php'); ?>
<?php include('basdePage.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadres avec Boutons</title>
    <link href="../css/gestionOeuvre.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="cadre" id="oeuvre">
        <h2>Oeuvre</h2>
        <div class="boutonsOeuvre">
            <form action="../controleur/ajouterOeuvre.php">
                <button type="submit" id="ajouterOeuvre">Ajouter</button>
            </form>
            <form action="../controleur/modifierOeuvre.php">
                <button type="submit" id="ModifierOeuvre">Modifier</button>
            </form>
            <form action="../controleur/supprimerOeuvre.php">
                <button type="submit" id="SupprimerOeuvre">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="cadre" id="acteur">
        <h2>Auteur</h2>
        <div class="boutonsActeur">
            <form action="../controleur/listeSeries.php">
                <button type="submit" id="ajouterActeur">Ajouter</button>
                <button type="submit" id="ModifierActeur">Modifier</button>
                <button type="submit" id="SupprimerActeur">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="cadre" id="realisateur">
        <h2>Réalisateur</h2>
        <div class="boutonsRealisateur">
            <form action="../controleur/listeSeries.php">
                <button type="submit" id="ajouterRéalisateur">Ajouter</button>
                <button type="submit" id="ModifierRéalisateur">Modifier</button>
                <button type="submit" id="SupprimerRéalisateur">Supprimer</button>
            </form>
        </div>
    </div>
    <!-- Deux nouveaux cadres identiques -->
    <div class="cadre" id="genre">
        <h2>Genre</h2>
        <div class="boutonsGenre">
            <form action="../controleur/listeSeries.php">
                <button type="submit" id="ajouterGenre">Ajouter</button>
                <button type="submit" id="ModifierGenre">Modifier</button>
                <button type="submit" id="SupprimerGenre">Supprimer</button>
            </form>
        </div>
    </div>
    <div class="cadre" id="catégorie">
        <h2>Catégorie</h2>
        <div class="boutonsCategorie">
            <form action="../controleur/listeSeries.php">
                <button type="submit" id="ajouterCatégorie">Ajouter</button>
                <button type="submit" id="ModifierCatégorie">Modifier</button>
                <button type="submit" id="SupprimerCatégorie">Supprimer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>




