<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Plateforme de bons plans, partage, étudiants, écologies, troc, astuces">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Copyright" content="Equipe du QG - IMAC 1">
    <meta name="Language" content="Fr">
    <meta name="Category" content="HTML - CSS">
    <meta name="Keywords" content="HTML, bons plans, étudiants, IMAC, Champs sur Marne">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../views/img/leQG_Flavicon.png">
    <link rel="stylesheet" href="../views/addGoodPlan-style.css">
    <link rel="stylesheet" href="../views/polices.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


     <!-- POLICES -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Koulen&family=Rubik:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- FIN POLICES -->
   
    <title>Le QG - Ajouter un bon plan</title>

</head>
<body>
        <nav class="navbar fixed-top  ">

                <div class="d-flex flex-column align-items-center">
                    <br>
                    <a href="accueil"><img src="../views/img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
                </div>

                <div class="row d-none d-sm-block">
                    <div class="res  align-items-center ">
                        <a class="home " href="accueil" ><img class="invert"  src="../views/img/accueil.png" alt="Accueil" width="50"></a>

                        <!-- TODO link messagerie -->
                        <a class="chat" href="#" ><img  class="invert"  src="../views/img/chat.png" alt="Chat" width="50"></a>

                        <?php
                        if (!isset($_SESSION['currentUserID']))
                        {
                        echo '<a class="connexion" href="seconnecter" ><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
                        } else
                        {
                        echo '<a class="connexion" href="moncompte" ><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
                        }
                        ?>
                    </div>
                </div>
        </nav>

        <header>

                <div class="ban container md-4 col-12">
                        <h1>JE PARTAGE UN SUPER BON PLAN !</h1>
                </div>


        </header>

        <main>
                <div class=" addpage">
                    <div class="formajoutbp">
                            <!-- Bons Plans -->
                            <form method='POST' action="addgoodplan" enctype="multipart/form-data">
                                    <div class="container">
                                        <div>
                                            <label for="title">Titre :</label>
                                            <input class="nomzone" type="text" placeholder="Titre du Bon Plan" name="title" required>
                                        </div>
                                        <div>
                                            <label for="textContent">Contenu :</label>
                                            <textarea type="text" placeholder="Description de ton super bon plan" name="textContent" required></textarea>
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
                                        <label for="city">Ça se passe ici :</label>
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
                                        <input type="file" name="media" accept="image/*" required/>
                                        </div>

                                        <div class="envoiaddBP">
                                            <button type="submit">POSTER UN NOUVEAU BON PLAN</button>
                                        </div>
                                    </div>
                                </form>

                    </div>
                    <div class="illustration">
                        <img src="../views/img/goodplanillu.png" alt="">
                    </div>
                </div>
                                               
        </main>

        <!-- Footer -->
<footer class="page-footer container-fluid">

<!-- Footer Links -->
<div class="container">

  <div class=" navfooter row d-flex  pt-5 mb-3">

        <div class="col-md-2 mb-3">
            <h6><a href="accueil">ACCUEIL</a></h6>
        </div>

        <div class="col-md-2 mb-3">
            <?php
            if (!isset($_SESSION['currentUserID']))
            {
            echo '<h6><a class="connexion" href="seconnecter" >MON COMPTE</a></h6>';
            } else
            {
            echo '<h6><a class="connexion" href="moncompte" >MON COMPTE</a></h6>';
            }
            ?>
        </div>

        <div class="col-md-2 mb-3">
            <!-- TODO link vers messagerie -->
            <h6><a href="#">MESSAGERIE</a></h6>
        </div>

        <div class="col-md-2 mb-3">
            <h6><a href="../views/qui-sommes-nous.php">L'ÉQUIPE</a></h6>
    </div>
  </div>

  <div class=" row d-flex mb-md-0 mb-4">

    <div class=" presentation col-md-8 col-12 mt-5">
          <p class="pitch">" Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun d'entre vous pourra contribuer et faire de cette plateforme un concentré d’informations pertinentes pour vous tous, étudiants de France ! "</p>
          <p class="signature"> L'Équipe du QG</p>

          <!-- Boutons -->
          <div class="boutonsfoot">
                <?php
                if (!isset($_SESSION['currentUserID']))
                {
                echo '<a class=" inscription btn btn-primary " href="seconnecter" role="button">REJOINDRE LE QG !</a>';
                } else
                {
                echo '<a class=" inscription btn btn-primary " href="moncompte" role="button">REJOINDRE LE QG !</a>';
                }
                ?>
          </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    <p>© 2022 Copyright LE QG  - IMAC 1 LLMNP -  <a href="../views/mentions-legales.php" target="blank">Mentions Légales</a>
    </p>
  </div>
  <!-- Copyright -->
</div>
</footer>

<!-- Footer -->

</body>
</html>