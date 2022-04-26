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
    <form method='POST' action="addgoodplan" enctype="multipart/form-data">
        <div class="container">
            <h1>Ajout d'un bon plan</h1>
            <div>
                <label for="title">Titre :</label>
                <input type="text" placeholder="Entrez un nom de bon plan" name="title" required>
            </div>
            <div>
                <label for="textContent">Contenu :</label>
                <textarea type="text" placeholder="Entrez un texte de contenu" name="textContent" required></textarea>
            </div>
            <div>
                <label for="startingDate">Date de début :</label>
                <input type="date" placeholder="Entrez la date de début" name="startingDate" required>
            </div>
            <div>
                <label for="endingDate">Date de fin :</label>
                <input type="date" placeholder="Entrez la date de début" name="endingDate" required>
            </div>

            <div>
            <label for="category">Catégorie :</label>
            <select name="categories">
            <?php
                foreach($datatab[0] as $category){
                    echo '<option value="'.$category['categoryID'].'">'.$category['title'].'</option>';
                }
            ?>
            </select>
            </div>
            
            <div>
            <label for="city">Ville :</label>
            <select name="cities">
            <?php
                foreach($datatab[1] as $city){
                    echo '<option value="'.$city['cityID'].'">'.$city['name'].'</option>';
                }
            ?>
            <option value="">En ligne</option>
            </select>
            </div>

            <div>
            <label for="media">Photo :</label>
            <input type="file" name="media" accept="image/*"/>
            </div>

            <div>
                <button type="submit">Poster un nouveau bon plan</button>
            </div>
        </div>
    </form>

    <a href="accueil">Accueil</a>

    
</body>
</html>