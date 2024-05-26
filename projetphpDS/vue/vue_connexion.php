<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/vue_connexion.css" rel="stylesheet" type="text/css">
    <title>JulesCorporate </title>
    <link rel="icon" href="../img/julescorp.ico" type="image/x-icon">
</head>
<body>
<?php include('navbarreSC.php'); 
        include('basDePage.php');?>
<div class="containerco">
    <h1>Veuillez-vous connecter</h1>

    <?php if(isset($error_message)): ?>
        <p class='error-message'><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form class="formco" method="POST" action="">
        <label for="Nom">Identifiant</label>
        <input type="text" placeholder="Entrez votre Identifiant..." id="nom" name="nom" required/>
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe..." id="password" name="password" required/>
        <input type="submit" value="Se connecter" name="ok">
    </form>
</div>

</body>
</html>