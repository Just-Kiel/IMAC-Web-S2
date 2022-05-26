<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
</head>
<body>
    <form method='POST' action="inscription">
        <div class="container">
            <h1>Créez votre compte</h1>
            <div>
                <label for="lastname">Nom :</label>
                <input type="text" placeholder="Entrez votre nom" name="lastname" required>
            </div>
            <div>
                <label for="firstname">Prénom :</label>
                <input type="text" placeholder="Entrez votre prénom" name="firstname" required>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" placeholder="Entrez votre email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" placeholder="Entrez votre mot de passe" name="password" minlength="5" maxlength="20" required>
            </div>
            <div>
                <label for="password">Confirmez votre mot de passe :</label>
                <input type="password" placeholder="Entrez votre mot de passe" name="confirmpassword" minlength="5" maxlength="20" required>
            </div>
            <label for="city">Votre ville :</label>
            <select name="cities">
            <?php
                foreach($datatab as $city){
                    echo '<option value="'.$city['cityID'].'">'.$city['name'].'</option>';
                }
            ?>
            </select>
            <div>
                <button type="submit">Créer mon compte</button>
            </div>
        </div>
    </form>
    <a href="accueil">Accueil</a>
</body>
</html>