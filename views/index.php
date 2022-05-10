
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset=utf-8>
    <meta name="description" content="Plateforme de bons plans, partage, étudiants, écologies, troc, astuces">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Copyright" content="Equipe du QG - IMAC 1">
    <meta name="Language" content="Fr">
    <meta name="Category" content="HTML - CSS">
    <meta name="Keywords" content="HTML, bons plans, étudiants, IMAC, Champs sur Marne">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../views/img/leQG_Flavicon.png">
    <link rel="stylesheet" href="../views/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


<title> LE QG - ACCUEIL </title>

</head>

<body>

<!---  : Picto chargement page -->

<!---  fin  Picto chargement page -->



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
        <a class="chat" href="#" ><img  class="invert"  src="../views/img/chat.png" alt="Chat" width="50"></a>
        <!-- TODO link vers mon compte si connecté sinon vers connexion -->
        <a class="connexion" href="seconnecter" ><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>
    </div>
  </div>
    </nav>


  <!---  FIN NAVBAR -->


  <!---  HEADER -->

 <header>
<h1>BIENVENUE AU QG !</h1>
<section class="banniere ">
  <div class="input-group ">
    <div class="form-outline">
      <input type="search" id="form1" class="form-control" placeholder="J'ai une petite question..."/>
    </div>
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
  </div>
</section>
</header> 

<!---  FIN DU HEADER -->



<!-------- MAIN --------->


<main>
<!------------- NAV DE CATÉGORIES + AFFICHAGES DES BONS PLANS CORRESPONDANTS -->
<section class=" container-fluid column">
  <p>
    Ici le contenu relatifs à la BdD : catégories et post relatifs
  </p>
  <?php
    if (empty($datatab[0]))
    {
        echo "Vous n'êtes pas connecté <br/>";
    }
    else
    {
        echo "Vous êtes connecté en tant que " . $datatab[0][0]['lastname'] . " " . $datatab[0][0]['firstname'] . "<br/>
        <form method='POST' action='accueil'>
            <input type='hidden' name='type' value='logout'>
            <input type='submit' value='Se déconnecter'>
        </form>";
    }
    ?>

  <!------------  Tabs à relier a la bd et aux cartes d'en dessous -------->
  <nav class="categories">

  <ul class="nav nav-pills">
  <?php
    foreach ($datatab[2] as $category) {
  ?>

    <li class="nav-item">

    <!-- TODO Il faut encore link les bons bons plans aux catégories et les afficher -->
      <a class="nav-link" aria-current="#" href="category/<?php echo $category['categoryID']; ?>"><?php echo $category['title']; ?></a>
    </li>

  <?php
    }
  ?>
</ul>

</nav>

  <!-- --- Pensez a relier les éléments fictifs au vrais de la BD 
++ voir comment faire le bouton like et l'ajout de commentaire -->

<div class="listCards">
<?php
  foreach ($datatab[1] as $key =>$goodplan) {
    if($key%2==0){
?>

  <div class="card mb-3" style="max-width: 70em;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src=
        <?php
          if(empty($goodplan['mediaID'])){
            echo "../views/img/cine.jpg";
          } else {
            echo "../views/".$goodplan['mediaID'];
          }
        ?>
        class="card-img invert img-fluid" alt="infos bon plan">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $goodplan['title']; ?></h5>
          <p class="card-text"><small class="text-muted">
            <?php
              $dateEtLieu = $goodplan['startingDate'];

              if(empty($goodplan['cityID'])){
                $dateEtLieu .= " en ligne";
            } else {
                $dateEtLieu .= " à : ".$goodplan['cityID'];
            }

              echo $dateEtLieu; 
            ?>
            </small></p>
          <p class="card-text"><?php echo $goodplan['textContent']; ?></p>
          <div class="pictos">
            <!-- TODO link vers section commentaire du bon plan -->
            <i class="bi bi-chat-dots-fill btn" href="#"></i>
              <!-- TODO like possible partout -->
              <i class="bi bi-heart-fill btn" href=""></i>
              <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
          </div>
          <div class="proprio">
              <!-- link vers la pop up du profil  -->
              <!-- TODO link la photo de profil -->
              <a href=""><img src="../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
              <h6><?php echo $goodplan['userID']['firstname']." ".$goodplan['userID']['lastname']; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
    } else {
?>

  <div class="card mb-3" style="max-width: 70em;">
    <div class="row no-gutters">
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?php echo $goodplan['title']; ?></h5>
          <p class="card-text"><small class="text-muted">
            <?php
              $dateEtLieu = $goodplan['startingDate'];

              if(empty($goodplan['cityID'])){
                $dateEtLieu .= " en ligne";
            } else {
                $dateEtLieu .= " à : ".$goodplan['cityID'];
            }

              echo $dateEtLieu; 
            ?>
            </small></p>
          <p class="card-text"><?php echo $goodplan['textContent']; ?></p>
          <div class="pictos">
            <!-- TODO link vers section commentaire du bon plan -->
              <i class="bi bi-chat-dots-fill btn" href="#"></i>
              <!-- TODO like possible partout -->
              <i class="bi bi-heart-fill btn" href=""></i>
              <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
          </div>
          <div class="proprio">
              <!-- link vers la pop up du profil  -->
              <!-- TODO link la photo de profil -->
              <a href=""><img src="../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
              <h6><?php echo $goodplan['userID']['firstname']." ".$goodplan['userID']['lastname']; ?></h6>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <img src=
        <?php
          if(empty($goodplan['mediaID'])){
            echo "../views/img/cine.jpg";
          } else {
            echo "../views/".$goodplan['mediaID'];
          }
        ?>
        class="card-img invert img-fluid" alt="infos bon plan">
      </div>
    </div>
  </div>

<?php
    }
  }
?>
</div>
  
</section>

  <!-- --- Boutons flottants à intégrer avec les filtres... -->


<section class="btn-flottants">

  <!-------- SCROLL ---------->

      <div class="scroll btn">
        <img src="../views/img/top.png" alt="retourner en haut de la page" />
      </div>

    <!-------- FILTRER - voir comment on fait ----------> 

      <div class="filter btn">
        <img src="../views/img/filter.png" href="#" alt="filtrer les bons plans" />
      </div>

        <!-------- AJOUTER BON PLAN  voir comment on fait ---------->

      <div class="add btn ">
        <a href="addGoodPlan"><img src="../views/img/add.png" alt="ajouter un bon plan" /></a>
      </div>

</section>
   
</main>

    <!-- FIN Bouton flottants -->

<!-- Footer -->
<footer class="page-footer container-fluid">

      <!-- Footer Links -->
      <div class="container">

        <div class=" navfooter row d-flex  pt-5 mb-3">

              <div class="col-md-2 mb-3">
                  <h6><a href="accueil">ACCUEIL</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">MON COMPTE</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">MESSAGERIE</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">BONS PLANS</a></h6>
          </div>
        </div>

        <div class=" row d-flex mb-md-0 mb-4">

          <div class=" presentation col-md-8 col-12 mt-5">
                <p class="pitch">" Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun d'entre vous pourra contribuer et faire de cette plateforme un concentré d’informations pertinentes pour vous tous, étudiants de France ! "</p>
                <p class="signature"> L'Équipe du QG</p>

                <!-- Boutons -->
                <div class="boutonsfoot">
                    <a class=" inscription btn btn-primary " href="seconnecter" role="button">INSCRIPTION</a>
                    <a class="inscription btn btn-primary " href="seconnecter" role="button">CONNEXION</a>
                </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG  - IMAC 1 LLMNP -  <a href="#" target="blank">Mentions Légales</a>
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
