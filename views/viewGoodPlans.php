<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le QG</title>
</head>
<body>
    <h1>Bienvenue sur Le QG et ses bons plans !</h1>

    <!-- Bons Plans -->
    <?php
    
        echo "Test des bons plans :";

        foreach($datatab as $goodplan){

    ?>

    <h2><?php echo $goodplan['title']; ?></h2>

    <p><?php echo $goodplan['textContent']; ?></p>
    <p>Commence le : <?php echo $goodplan['startingDate']; ?></p>
    <p>Finit le : <?php echo $goodplan['endingDate']; ?></p>

    <p>A lieu <?php
        if(empty($goodplan['cityID'])){
            echo "en ligne";
        } else {
            echo "à : ".$goodplan['cityID'];
        }
    ?></p>

    <p>Ecrit par <?php echo $goodplan['userID']; ?></p>

    <?php
        }
    ?>

    <a href="accueil">Accueil</a>

    
</body>
</html>