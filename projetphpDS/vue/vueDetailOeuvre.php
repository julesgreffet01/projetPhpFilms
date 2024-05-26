<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/vueDetailOeuvre.css" rel="stylesheet" type="text/css">
    <title>Détails Oeuvres</title>
</head>
<body>
<?php include('../vue/basDePage.php'); ?>
<div class="cadre">
    <?php if(!empty($monoeuvre)) { ?>
    <?php echo "<td><img class='image' src='../img/" . $monoeuvre->getImage() . ".jpg' alt='" . $monoeuvre->getImage() . "'></td>"; ?>
    <div class="texte">
        <p><strong> Titre Original :     <?php echo $monoeuvre->getTitreOriginal() ?></strong> </p>
            <p><strong> Titre Français :    <?php echo $monoeuvre->getTitreFrancais() ?> </strong></p>
            <p><strong>Date de Sortie :    <?php echo $monoeuvre->getAnneeSortie() ?> </strong></p>
            <p><strong>Nombre d'épisode :    <?php echo $monoeuvre->getNombreEpisodes() ?> </strong></p>
            <p><strong>Classification : <?php echo $monoeuvre->getClassification()->getLibCla() ?></strong></p>

        <?php if($monoeuvre->getMesgenres()!==[]){
            echo '<p><strong>Genres : ';
            foreach ($monoeuvre->getMesgenres() as $Oeuvre) {
                echo ($Oeuvre->getLibGen())." / ";
            }}else {
            echo '<p><strong> Genres : aucun </strong></p>';
        }
        ?>
        </strong> </p>

        <?php if($monoeuvre->getMesrealisateurs()!==[]){
            echo '<p><strong>Réalisateurs : ';
            foreach ($monoeuvre->getMesrealisateurs() as $Oeuvre) {
                echo ($Oeuvre->getPrenomReal())." ",($Oeuvre->getNomReal())." / ";
            }}else {
            echo '<p><strong> Réalisateurs : aucuns </strong></p>';
        }
        ?>
        </strong> </p>

        <?php if($monoeuvre->getActeurP()!==[]){
            echo '<p><strong>L acteur principale : ';
            foreach ($monoeuvre->getActeurP() as $Oeuvre) {
                echo ($Oeuvre->getPrenomAct())." ",($Oeuvre->getNomAct())." ";
            }}else {
            echo '<p><strong> L acteur princiaple : aucun </strong></p>';
        }
        ?>
        </strong> </p>
        <?php if($monoeuvre->getActeurs()!==[]){
            echo '<p><strong>Les acteurs : ';
            foreach ($monoeuvre->getActeurs() as $Oeuvre) {
                echo ($Oeuvre->getPrenomAct())." ",($Oeuvre->getNomAct())." / ";
            }}else {
            echo '<p><strong> Les acteurs : aucuns </strong></p>';
        }
        ?>
        </strong> </p>
            <p><strong>Résumé :    <?php echo $monoeuvre->getResume() ?> </p>
            <?php } else {
                echo "Aucune oeuvre trouvée pour cet identifiant.";
            }?>


</div>
</body>
</html>
