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
    <link rel="icon" href="img/leQG_Flavicon.png">
    <link rel="stylesheet" href="bonplan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


<title> LE QG - BonPlan </title>

</head>

<body>

    <nav class="navbar fixed-top  ">

        <div class="d-flex flex-column align-items-center">
          <br>
          <a href="index.php"><img src="img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
          </div>

          <div class="row d-none d-sm-block">
          <div class="res  align-items-center ">
              <a class="home " href="index.php" ><img class="invert"  src="img/accueil.png" alt="Accueil" width="50"></a>
              <a class="chat" href="#" ><img  class="invert"  src="img/chat.png" alt="Chat" width="50"></a>
              <a class="connexion" href="seconnecter.php" ><img class="invert"  src="img/sidentifier.png" alt="Connexion" width="50"></a>
          </div>
        </div>
    </nav>

<header>


<!-----------FIL D'ARIANE DU BON PLAN --------->
<!-- a compléter en php -->

<ol class="breadcrumb">
  <li><a href="index.php" title="Accueil">Accueil </a></li>
  <li><a href="" title="">Nom de la catégorie</a></li>
  <li class="page-active">Nom du bon plan</li>
</ol>

<!-- FIN DU FIL D'ARIANE DU BON PLAN -->

</header>

<main>

<!------------ CARTE BON PLAN ------------>

<div class="card mb-3" style="max-width: 70em;">
  <div class="row no-gutters">
    <div class=" cardlike col-md-4">            
    <i class="bi bi-heart-fill btn" href=""></i>
    <img src="img/cine.jpg" class="card-img invert img-fluid" alt="infos bon plan">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Nom du bon plan</h5>
        <p class="card-text"><small class="text-muted">Date et lieu</small></p>
        <p class="card-text">Description du bon plan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique sint doloribus non ipsam nobis ullam natus nam sit obcaecati. Sed magnam similique molestias! At rerum, nemo accusamus mollitia facere ea maxime quod aliquam, enim quo itaque velit culpa! Quisquam animi delectus doloremque! Sed laudantium fugit blanditiis eaque! Laboriosam, excepturi repellendus.</p>
        <div class="proprio">
            <!-- link vers la pop up du profil  -->
            <a href=""><img src="img/avatar1.png" alt="photo de profil" class="pp"></a>
            <h6>Nom Prénom</h6>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- --- Boutons flottants à intégrer avec les filtres... -->


<section class="btn-flottants">

  <!-------- SCROLL ---------->

      <div class="scroll btn">
        <img src="img/top.png" alt="retourner en haut de la page" />
      </div>

        <!-------- AJOUTER BON PLAN  voir comment on fait ---------->

      <div class="add btn ">
        <img src="img/add.png" href="#" alt="ajouter un bon plan" />
      </div>

</section>


    <!-- FIN Bouton flottants -->
</main>


<!-- Footer -->
<footer class="page-footer container-fluid">

      <!-- Footer Links -->
      <div class="container">

        <div class=" navfooter row d-flex  pt-5 mb-3">

              <div class="col-md-2 mb-3">
                  <h6><a href="index.php">ACCUEIL</a></h6>
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