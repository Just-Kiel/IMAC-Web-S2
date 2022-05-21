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
    <link rel="icon" href="../../views/img/leQG_Flavicon.png">
    <link rel="stylesheet" href="../../views/categorie-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

<title> LE QG - <?php echo $datatab[0][0]['title'];?> </title>

</head>

<body>

<!---  NAVABAR -->

    <nav class="navbar fixed-top">

        <div class="d-flex flex-column align-items-center">
          <br>
          <a href="../accueil"><img src="../../views/img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
          </div>

          <div class="row d-none d-sm-block">
          <div class="res  align-items-center ">
              <a class="home " href="../accueil" ><img class="invert"  src="../../views/img/accueil.png" alt="Accueil" width="50"></a>
              <!-- TODO link vers messagerie -->
              <div class="chat" data-toggle="modal" data-target="#chatModal">
                  <img  class=" invert"  src="../../views/img/chat.png" alt="messagerie" width="50">
              </div>
              <a class="connexion" href="../seconnecter" ><img class="invert"  src="../../views/img/sidentifier.png" alt="Connexion" width="50"></a>
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
                  <img src="../../views/img/oops.png" alt="">
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
    <div class="imgfixe1 md-8 col-4">
        <img src="../../views/img/girlonherphone.png" alt="illustration de fille sur son téléphone">
    </div>
    <div class="titrecategorie col-4">
    <h1><?php echo $datatab[0][0]['title'];?></h1>
    </div>
    <div class="imgfixe2 md-8 col-4">
        <img src="../../views/img/manonhislaptop.png" alt="illustration de garçon sur son ordinateur">
    </div>
</div>


</header>

<main>

<!-----------FIL D'ARIANE DU BON PLAN --------->
<div class="categorieschoice">
    <div class="arianne">
            <ol class="breadcrumb">
                <li><a href="../accueil" title="Accueil">Accueil </a></li>
                <li><a href="../category/<?php echo $datatab[3]['categoryID'];?>"><?php echo $datatab[3]['title'];?> </a> </li>
                <li href="" class="page-active"><?php echo $datatab[0][0]['title'];?> </li>
             </ol>
    </div>
</div>


<!-- FIN DU FIL D'ARIANE DU BON PLAN -->


<!------------ Bon plans de la catégorie ------------>

<div class="listCards">

<?php
  foreach ($datatab[1] as $key =>$goodplan) {
    if($key%2==0){
?>

    <div class="card mb-3" style="max-width: 70em;">
      <div class="row no-gutters">
        <div class=" col-md-4">
          <img src=
          <?php
          if(empty($goodplan['mediaID'])){
            echo "../../views/img/cine.jpg";
          } else {
            echo "../../views/".$goodplan['mediaID'];
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
                <a href="../viewgoodplan/<?php echo $goodplan['goodplanID']; ?>#commentaires"><i class="bi bi-chat-dots-fill btn" href="#"></i></a>
                  <!-- TODO like possible partout -->
                  <i class="bi bi-heart-fill btn" href=""></i>
                  <a href="../viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
            </div>
            <div class="proprio">
                <!-- link vers la pop up du profil  -->
                <!-- TODO link la photo de profil -->
                <a href=""><img src="../../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
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
              <a href="../viewgoodplan/<?php echo $goodplan['goodplanID']; ?>#commentaires"><i class="bi bi-chat-dots-fill btn" href="#"></i></a>
                  <!-- TODO like possible partout -->
                  <i class="bi bi-heart-fill btn" href=""></i>
                  <button type="button" class="profiter btn btn-primary" >J'EN PROFITE !</button>
            </div>
            <div class="proprio">
                <!-- link vers la pop up du profil  -->
                <!-- TODO link la photo de profil -->
                <a href=""><img src="../../views/img/avatar1.png" alt="photo de profil" class="pp"></a>
                <h6><?php echo $goodplan['userID']['firstname']." ".$goodplan['userID']['lastname']; ?></h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <img src=
          <?php
          if(empty($goodplan['mediaID'])){
            echo "../../views/img/cine.jpg";
          } else {
            echo "../../views/".$goodplan['mediaID'];
          }
        ?> 
        class="card-img invert img-fluid" alt="infos bon plan">
        </div>
      </div>
    </div>
</div>

<?php
    }
  }
?>

<!------------ Fin Bon plans de la catégorie ------------>


<!-- --- Boutons flottants à intégrer avec les filtres... -->

<!-- TODO link le reste -->


<section class="btn-flottants">

  <!-------- SCROLL ---------->

      <div class="scroll btn">
        <img src="../../views/img/top.png" alt="retourner en haut de la page" />
      </div>

<!-------- FILTRER - voir comment on fait ----------> 

<div class="filter btn" data-toggle="modal" data-target="#exampleModal">
        <img src="../../views/img/filter.png" href="#" alt="filtrer les bons plans" />
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
            <div class="modal-body">
              <form action="accueil" method="post"  >

                  <input
                  <?php 
                  if($datatab[3] == 'city'){
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
              </form>
            </div>
            <div class="modal-footer">
                <input class="validew" type="submit" value="Valider" data-dismiss="modal">
            </div>
          </div>
        </div>
      </div>

    <!-------- AJOUTER BON PLAN  voir comment on fait ---------->

      <div class="add btn ">
      <a href="../addGoodPlan"><img src="../../views/img/add.png" alt="ajouter un bon plan" /></a>
      </div>

</section>


    <!-- FIN Bouton flottants -->
</main>


<!-- Footer -->
<footer class="page-footer container-fluid">

      <!-- Footer Links -->
      <!-- TODO reste tous les links ici à faire -->
      <div class="container">

        <div class=" navfooter row d-flex  pt-5 mb-3">

              <div class="col-md-2 mb-3">
                  <h6><a href="../accueil">ACCUEIL</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">MON COMPTE</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">MESSAGERIE</a></h6>
              </div>

              <div class="col-md-2 mb-3">
                  <h6><a href="#">QUI SOMMES-NOUS ?</a></h6>
          </div>
        </div>

        <div class=" row d-flex mb-md-0 mb-4">

          <div class=" presentation col-md-8 col-12 mt-5">
                <p class="pitch">" Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun d'entre vous pourra contribuer et faire de cette plateforme un concentré d’informations pertinentes pour vous tous, étudiants de France ! "</p>
                <p class="signature"> L'Équipe du QG</p>

                <!-- Boutons -->
                <div class="boutonsfoot">
                    <a class=" inscription btn btn-primary " href="seconnecter.php" role="button">INSCRIPTION</a>
                    <a class="inscription btn btn-primary " href="seconnecter.php" role="button">CONNEXION</a>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>    

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