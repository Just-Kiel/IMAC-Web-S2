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

<!---  NAVABAR -->

<nav class="navbar fixed-top  ">

<div class="d-flex flex-column align-items-center">
<br>
<a href="accueil"><img src="../views/img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
</div>

<div class="row d-none d-sm-block">
<div class="res  align-items-center ">
    <a class="home " href="accueil"><img class="invert"  src="../views/img/accueil.png" alt="Accueil" width="50"></a>
    <!-- TODO link vers messagerie -->
    <div class="chat" data-toggle="modal" data-target="#chatModal"><img  class="invert"  src="../views/img/chat.png" alt="Chat" width="50"></a>
    <?php
    if (!isset($_SESSION['currentUserID']))
    {
      echo '<a class="connexion" href="seconnecter" ><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
    } else
    {
      ?>
       <div class="menu-deroulant">
      <a class="connexion" href="moncompte"><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>
      <ul class="sous-menu">
        <li><a href="moncompte">mon compte</a></li>
        <li><form method='POST' action='accueil'>
        <input type='hidden' name='type' value='logout'>
        <input type='submit' value='Se déconnecter'>
    </form></li>
      </ul>
      </div>
      <?php
    }
    ?>
</div>
</div>
</nav>
  <!---  FIN NAVBAR -->

        <!-- pop up messagerie -->
        <div class="modal fade popfilter" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ooops ! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <img src="../views/img/oops.png" alt="">
                        <div class="contenuoops">
                            <p>La messagerie est en train de se faire une beauté. Revenez dans quelques temps pour discuter avec vos amis ! </p>
                            <p class="signatureoops">L'Équipe du QG </p>
                        </div>
                        
                    </div>
                        <input class="fermew" type="submit" value=" OK !" data-dismiss="modal">
                </div>
                </div>
            </div>
        <!-- ------------ -->
        
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

                 <!-- --- Boutons flottants à intégrer avec les filtres... -->

            <!-------- SCROLL ---------->

            <section class="btn-flottants">

                <div class="scroll btn">
                <img src="../views/img/top.png" alt="retourner en haut de la page" />
                </div>
            </section>
                                               
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

        <div class="col-md-2 mb-3" data-toggle="modal" data-target="#chatModal">
            <!-- TODO link vers messagerie -->
            <h6><a href="#">MESSAGERIE</a></h6>
        </div>

        <div class="col-md-2 mb-3">
            <h6><a href="quisommesnous">L'ÉQUIPE</a></h6>
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
    <p>© 2022 Copyright LE QG - IMAC 1 LLMNP - <a href="mentionslegales" target="blank">Mentions Légales</a>
    </p>
  </div>
  <!-- Copyright -->
</div>
</footer>

<!-- Footer -->


<!---------------------------------------SCRIPT----------------------->
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    

<!--<script> $('#MonCollapse').collapse({
  show: true
  })</script>-->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <script>

    /*FONCTION 
            role: Code qui permet d'afficher le contenue du site 
            apres une durée de temps de chargement choisie
             nom : afficherSite
             retourne: - 
             paramètres:*/
                       
            
                function afficherSite() {
                let load=document.querySelector(".loader-container");
                load.classList.add("cache");
            }
            
            setTimeout(afficherSite, 2000); 

             /*Animation du bouton scroll*/

             let fleche = document.querySelector(".scroll");
            fleche.addEventListener('click',()=> {

                window.scrollTo({top:0,
                    left:0,
                    behavior:"smooth"})
                })

            
    </script>
    
</body>
</html>