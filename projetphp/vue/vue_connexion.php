<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/formulaireConnexion.css" rel="stylesheet" type="text/css">
    <title>Connexion</title>
</head>
<body>
    <?php   include('../vue/navBarreSC.php');
            include('../vue/basDePage.php');
    ?>
<div class="container">
    <h1>Connexion</h1>

    <?php if(isset($error_message)){ ?>
        <p class='error-message'><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="Nom">Identifiant</label>
        <input type="text" placeholder="Entrez votre Identifiant..." id="nom" name="nom" required/>
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe..." id="password" name="password" required/>
        <input type="submit" value="Se connecter" name="ok">
    </form>
</div>

</body>
</html>
