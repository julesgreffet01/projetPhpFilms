<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Film</title>
    <link rel="stylesheet" href="../css/modifierOeuvre.css">
</head>
<body>
<form action="../controleur/modifierOeuvre.php" method="post">

    <div class="containergerer">
        <label for="classification">Choix de l'oeuvre à modifier : </label>
        <select id="classification" name="idOeuvre" class="button">
            <?php foreach ($Oeuvres as $row) {
                echo '<option value="' . $row->getIdOeuvre() . '">' . $row->getTitreOriginal() . '</option>';
            } ?>
        </select>
        <div class="form-group">
            <label for="titre">Titre originale du film</label>
            <input type="text" id="titre" name="titOri" class="button">
        </div>
        <div class="form-group">
            <label for="titre">Titre francais du film</label>
            <input type="text" id="titre" name="titFr" class="button">
        </div>
        <div class="form-group">
            <label for="classification">Classification</label>
            <select id="classification" name = "Clas" class="button">
                <?php foreach ($Classifications as $Cla) {
                    echo '<option value="' . $Cla->getIdCla() . '">' . $Cla->getLibCla() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="duree">Durée (en minutes)</label>
            <input type="number" id="duree" name = "dur" class="button" min="1" oninput="this.value = Math.max(this.value, 1)">
        </div>
        <div class="form-group">
            <label for="dateSortie">Année de Sortie</label>
            <input type="number" id="dateSortie" name = "anneeSort" min="1895" class="button">
        </div>
        <div class="form-group">
            <label for="synopsis">Synopsis</label>
            <input type="text" id="synopsis" name = "res" class="button">
        </div>
        <div class="form-group">
            <label for="realisateurs">Réalisateur 1</label>
            <select id="realisateurs" name = "Real1" class="button">
                <option value="">-- Sélectionnez un réalisateur --</option>
                <?php foreach ($Reals as $real) {
                    echo '<option value="' . $real->getIdReal() . '">' . $real->getNomReal() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="realisateurs">Réalisateur 2</label>
            <select id="realisateurs" name = "Real2" class="button">
                <option value="">-- Sélectionnez un réalisateur --</option>
                <?php foreach ($Reals as $real) {
                    echo '<option value="' . $real->getIdReal() . '">' . $real->getNomReal() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="acteurs">Acteur1</label>
            <select id="acteurs" name = "Acteur1" class="button">
                <option value="">-- Sélectionnez un acteur --</option>
                <?php foreach ($Acteurs as $acts) {
                    echo '<option value="' . $acts->getIdAct() . '">' . $acts->getNomAct() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="acteurs">Acteur2</label>
            <select id="acteurs" name = "Acteur2" class="button">
                <option value="">-- Sélectionnez un acteur --</option>
                <?php foreach ($Acteurs as $acts) {
                    echo '<option value="' . $acts->getIdAct() . '">' . $acts->getNomAct() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="acteurs">Acteur Principale</label>
            <select id="acteurs" name = "ActeurP" class="button">
                <option value="">-- Sélectionnez un acteur --</option>
                <?php foreach ($Acteurs as $acts) {
                    echo '<option value="' . $acts->getIdAct() . '">' . $acts->getNomAct() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="acteurs">Genre 1</label>
            <select id="acteurs" name = "Genre1" class="button">
                <option value="">-- Sélectionnez un genre --</option>
                <?php foreach ($Genres as $Gen) {
                    echo '<option value="' . $Gen->getIdGen() . '">' . $Gen->getLibGen() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="acteurs">Genre 2</label>
            <select id="acteurs" name = "Genre2" class="button">
                <option value="">-- Sélectionnez un genre --</option>
                <?php foreach ($Genres as $Gen) {
                    echo '<option value="' . $Gen->getIdGen() . '">' . $Gen->getLibGen() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="imageTitle">Titre de l'image</label>
            <input type="text" id="imageTitle" name = "img" class="button">
        </div>
        <div class="form-group">
            <label for="positiveNumber">Nombre d'épisodes</label>
            <input type="number" id="positiveNumber" name = "nbEp" class="button" min="1"oninput="this.value = Math.max(this.value, 1)">
        </div>
        <div class="form-group">
            <button type="submit" name = "BtnAdd" class="validate-button">Valider</button>
        </div>
    </div>
    <br>
    <br>
    <p>pour pouvoir scroller mais c est cache par le bas de page</p>
</form>
</body>
</html>
