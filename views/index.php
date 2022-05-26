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
    <link rel="stylesheet" href="../views/polices.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- POLICES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Koulen&family=Rubik:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- FIN POLICES -->

<title> LE QG - ACCUEIL </title>

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
        <div class="chat" data-toggle="modal" data-target="#chatModal">
                  <img  class=" invert"  src="../views/img/chat.png" alt="messagerie" width="50">
        </div>
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

  <!---  HEADER -->

 <header>
<h1>BIENVENUE AU QG !</h1>
<section class="banniere ">
  <div class="input-group ">
    <div class="form-outline">

      <!--  barre de recherche -->

      <form action="" method="POST">
          <input type='hidden' name='type' value='search'>
          <input type="search" id="form1" class="form-control" name="recherche" placeholder="Je cherche quelque chose..."/>
      </form>


      <!--  FIN barre de recherche -->

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
<?php if(count($datatab[1])==0){ ?>
  
  <div class="reponseRecherche">
  <?php
  if (isset($datatab[4])){?>
          <div class="reponsePHP">
                  Désolé... Nous n'avons trouvé aucun résultat pour « <?php echo $datatab[4]; ?> »
                  <img src="../views/img/sadman.png" alt="">
          </div>
          <?php }
          else { ?>
          <div class="reponsePHP">
                  Il n'y a pas encore de bon plans, mais ça ne va pas tarder !
                  <img src="../views/img/sadman.png" alt="">
          </div>
          <?php } ?>
  </div>
  <?php } ?>


<!------------- NAV DE CATÉGORIES + AFFICHAGES DES BONS PLANS CORRESPONDANTS -->
<section class=" container-fluid column">
  <!------------  Tabs à relier a la bd et aux cartes d'en dessous -------->
  <nav class="categories">

  <ul class="nav nav-pills">
  <?php
  if(count($datatab[1])!=0){
    foreach ($datatab[2] as $category) {
  ?>

    <li class="nav-item">
      <a class="nav-link" aria-current="#" href="category/<?php echo $category['categoryID']; ?>"><?php echo $category['title']; ?></a>
    </li>

  <?php
    }
  }
  ?>
</ul>

</nav>

<div class="listCards">
<?php
  $temp = 1;
  foreach ($datatab[1] as $key => $goodplan) {
    if ($key % 2 == 0) {
?>

  <div class="card mb-3" style="max-width: 70em;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src=
        <?php
            echo "../views/" . $goodplan['mediaID'];
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
            <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>#commentaires"><i class="bi bi-chat-dots-fill btn"></i></a>

              <?php
                if(array_key_exists('buttonlike', $_POST) && $temp == 1)
                {
                  $temp = 0;
                  addLike($_POST['type']);
                }
              ?>
            <form method="post">
              <?php
                if (isset($_SESSION['currentUserID']))
                {
                  $goodplanID = $goodplan['goodplanID'];
                  if(getLikes(getCurrentUser()[0][0], $goodplan['goodplanID'])==1)
                  {
                    echo "<input type='hidden' name='type' value=$goodplanID>";
                    echo "<input type='submit' name='buttonlike' class='profiter btn btn-primary' value='Je dislike'/>";
                  } else {
                    echo "<input type='hidden' name='type' value=$goodplanID>";
                    echo "<input type='submit' name='buttonlike' class='profiter btn btn-primary' value='Je like'/>";
                  }
                }
              ?>
            </form>
              <span>&nbsp;</span>
              <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>

              <p><?php echo count($goodplan['likes']); ?> likes</p>
          </div>
          <div class="proprio">
              <a href=
              <?php
              echo "compteexterne/".$goodplan['userID']['userID'];
              ?>><img src=
              <?php
                echo "../views/".$goodplan['userID']['mediaID'][0]['url'];
              ?>
               alt="photo de profil" class="pp"></a>
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
            <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>#commentaires"><i class="bi bi-chat-dots-fill btn" href="#"></i></a>

              <?php
                if(array_key_exists('buttonlike', $_POST) && $temp == 1)
                {
                  $temp = 0;
                  addLike($_POST['type']);
                }
              ?>
            <form method="post">
              <?php
                if (isset($_SESSION['currentUserID']))
                {
                  $goodplanID = $goodplan['goodplanID'];
                  if(getLikes(getCurrentUser()[0][0], $goodplan['goodplanID'])==1)
                  {
                    echo "<input type='hidden' name='type' value=$goodplanID>";
                    echo "<input type='submit' name='buttonlike' class='profiter btn btn-primary' value='Je dislike'/>";
                  }
                  else 
                  {
                    echo "<input type='hidden' name='type' value=$goodplanID>";
                    echo "<input type='submit' name='buttonlike' class='profiter btn btn-primary' value='Je like'/>";
                  }
                }
              ?>
            </form>
              <span>&nbsp;</span>

              <a href="viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
              <p><?php echo count($goodplan['likes']); ?> likes</p>
          </div>
          <div class="proprio">
              <a href=
              <?php
              echo "compteexterne/".$goodplan['userID']['userID'];
              ?>
              ><img src=
              <?php
                echo "../views/".$goodplan['userID']['mediaID'][0]['url'];
              ?>
              alt="photo de profil" class="pp"></a>
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

    <!-------- FILTRER - pop up et implémentation ----------> 

    <div class="filter btn" data-toggle="modal" data-target="#exampleModal">
        <img src="../views/img/filter.png" href="#" alt="filtrer les bons plans" />
      </div>


      <div class="modal fade popfilter" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Filtrer les catégories par :</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="accueil" method="post">
            <div class="modal-body">
              
                  <input
                  <?php 
                  if ($datatab[3] == 'city') {
                    echo "checked";
                  }
                   ?>
                  type="radio" value="city" name="myfilters">&nbsp;Par ville - A à Z</option><br>
                  <input
                  <?php 
                  if($datatab[3] == 'like'){
                    echo "checked";
                  }
                   ?>
                   type="radio" value="like" name="myfilters">&nbsp;Par popularité - décroissant</option><br>
                  <input
                  <?php 
                  if($datatab[3] == 'date'){
                    echo "checked";
                  }
                   ?> 
                   type="radio" value="date" name="myfilters">&nbsp;Par date - plus récent au moins récent</option><br>
                  <input 
                  <?php 
                  if($datatab[3] == 'null'){
                    echo "checked";
                  }
                   ?> 
                   type="radio" value="null" name="myfilters">&nbsp;Pas de filtre</option><br>

                <input type='hidden' name='type' value='filters'>
              
            </div>
            <div class="modal-footer">
                <input class="validew" type="submit" value="Valider">
            </div>
            </form>
          </div>
        </div>
      </div>

        <!-------- AJOUTER BON PLAN ---------->

        <?php if (isset($_SESSION['currentUserID']))
      {?>
        <div class="add btn ">
          <a class="addgp" href="addgoodplan"><img src="../views/img/add.png" href="addgoodplan" alt="ajouter un bon plan" /></a>
        </div>
        <?php
      }
      ?>

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
                <?php
                if (!isset($_SESSION['currentUserID'])) {
                echo '<h6><a class="connexion" href="seconnecter" >MON COMPTE</a></h6>';
                } else {
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
                  if (!isset($_SESSION['currentUserID'])) {
                  echo '<a class=" inscription btn btn-primary " href="seconnecter" role="button">REJOINDRE LE QG !</a>';
                  } else {
                  echo '<a class=" inscription btn btn-primary " href="moncompte" role="button">REJOINDRE LE QG !</a>';
                  }
                  ?>
                </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG - IMAC 1 LLMNP - <a href="mentionslegales" target="blank">Mentions Légales</a>
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
                let load = document.querySelector(".loader-container");
                load.classList.add("cache");
            }
            
            setTimeout(afficherSite, 2000); 

             /*Animation du bouton scroll*/

             let fleche = document.querySelector(".scroll");
            fleche.addEventListener('click', () => {

                window.scrollTo({
                  top: 0,
                  left: 0,
                  behavior: "smooth"
                })
                })
    </script>

  

   </body>


</html>