<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
</head>
<body>
    <form method='POST' action="connexion">
        <div class="container">
            <h1>Connectez-vous à votre compte</h1>

            <div>
                <label for="email">Email :</label>
                <input type="email" placeholder="Entrez votre email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" placeholder="Entrez votre mot de passe" name="password" minlength="5" maxlength="20" required>
            </div>

            <div>
                <button type="submit">Se connecter</button>
            </div>
        </div>
    </form>
    <a href="accueil">Accueil</a>
</body>
</html>