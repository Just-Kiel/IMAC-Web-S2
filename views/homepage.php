<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le QG</title>
</head>
<body>
    <h1>Bienvenue sur Le QG !</h1>

    <!-- Système de connexion -->
    <?php
    if (empty($datatab))
    {
        echo "Vous n'êtes pas connecté <br/>
        <a href='inscription'>S'inscrire</a>
        <a href='connexion'>Se connecter</a>
        <a href='goodplan'>Bons Plans</a>";
    }
    else
    {
        echo "Vous êtes connecté en tant que " . $datatab[0]['lastname'] . " " . $datatab[0]['firstname'] . "<br/>
        <form method='POST' action='accueil'>
            <input type='submit' value='Se déconnecter'>
        </form>
        <a href='goodplan'>Bons Plans</a>
        <a href='addGoodPlan'>Ajout bon plan</a>";
    }
    ?>
    
</body>
</html>