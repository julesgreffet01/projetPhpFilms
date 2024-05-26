<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Film</title>
    <link rel="stylesheet" href="../css/supprimerOeuvre.css">
</head>
<body>
<form action="../controleur/supprimerOeuvre.php" method="post">
    <h3>Veuillez choisir une oeuvre à supprimer :</h3>
    <div class="containergerer">     
        <div class="form-group">   
            <label for="Nos oeuvres">Nos oeuvres</label>
            <select id="classification" name="idOeuvre" class="button">
                <?php foreach ($Oeuvres as $row) {
                    echo '<option value="' . $row->getIdOeuvre() . '">' . $row->getTitreOriginal() . '</option>';
                } ?>
            </select>
        </div>
        <div class="form-group"> 
            <button type="submit" name = "btnDel" class="validate-button" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cette oeuvre ?')) { alert('Oeuvre supprimée!'); }">Valider</button>
        </div>
    </div>
</form>
</body>
</html>