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
    <link rel="stylesheet" href="../../views/bonplan-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


<title> LE QG - BonPlan </title>

</head>

<body>

    <nav class="navbar fixed-top  ">

        <div class="d-flex flex-column align-items-center">
          <br>
          <a href="../accueil"><img src="../../views/img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
          </div>

          <div class="row d-none d-sm-block">
          <div class="res  align-items-center ">
              <a class="home " href="../accueil" ><img class="invert"  src="../../views/img/accueil.png" alt="Accueil" width="50"></a>
              
              <!-- TODO link vers messagerie -->
              <a class="chat" href="#" ><img  class="invert"  src="../../views/img/chat.png" alt="Chat" width="50"></a>

              <?php
              if (!isset($_SESSION['currentUserID']))
              {
                echo '<a class="connexion" href="../seconnecter" ><img class="invert"  src="../../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
              } else
              {
                echo '<a class="connexion" href="../moncompte" ><img class="invert"  src="../../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
              }
              ?>
          </div>
        </div>
    </nav>

<header>


<!-----------FIL D'ARIANE DU BON PLAN --------->
<!-- a compléter en php -->

<ol class="breadcrumb">
  <li><a href="../accueil" title="Accueil">Accueil </a></li>
  <li><a href="../category/<?php echo $datatab[0]['categoryID']['categoryID']; ?>" title=""><?php echo $datatab[0]['categoryID']['title']; ?></a></li>
  <li class="page-active"><?php echo $datatab[0]['title']; ?></li>
</ol>

<!-- FIN DU FIL D'ARIANE DU BON PLAN -->

</header>

<main>

<!------------ CARTE BON PLAN ------------>

<div class="card mb-3" style="max-width: 70em;">
  <div class="row no-gutters">
    <div class=" cardlike col-md-4">            
    <i class="bi bi-heart-fill btn" href=""></i>
    <img src=
    <?php          
        echo "../../views/".$datatab[0]['mediaID'];
        ?>
        class="card-img invert img-fluid" alt="infos bon plan">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $datatab[0]['title']; ?></h5>
        <p class="card-text"><small class="text-muted">
        <?php
          $dateEtLieu = $datatab[0]['startingDate'];

          if(empty($datatab[0]['cityID'])){
            $dateEtLieu .= " en ligne";
          } else {
            $dateEtLieu .= " à : ".$datatab[0]['cityID'];
          }

          echo $dateEtLieu; 
        ?>
        </small></p>
        <p class="card-text"><?php echo $datatab[0]['textContent']; ?></p>
        <div class="proprio">
            <!-- link vers la pop up du profil  -->
            <a href=
            <?php
              echo "../compteexterne/".$datatab[0]['userID']['userID'];
              ?>
            ><img src=
            <?php
                echo "../../views/".$datatab[0]['userID']['mediaID'][0]['url'];
              ?> 
              alt="photo de profil" class="pp"></a>
            <h6><?php echo $datatab[0]['userID']['firstname']." ".$datatab[0]['userID']['lastname']; ?></h6>
        </div>
      </div>
    </div>
  </div>
</div>

<!--------- ZONE DE COMMENTAIRE -------->

<section class="coms mb-3 content-item">
    <div class="container">   
    	<div class="row">
      <div class="commentaires" id="commentaires"> 
        <?php if (isset($_SESSION['currentUserID'])) { ?> 
                <form method="post">
                	<h3>Nouveau Commentaire</h3>
                  <fieldset>
                    <div class="container">
                      <div class="row ajoutcom">
                              <div class="proprio myavatar col">
                                <img class="img-responsive " src=
                                <?php  echo "../../views/".$datatab[2]['mediaID'][0]['url']; ?>
                                alt="">
                              </div>
                              <div class="form-group col-8">
                                  <textarea name="comContent" class="form-control " placeholder="Ajouter un commentaire" required="" maxlength="140"></textarea>
                              </div>
                              <input type="hidden" name="goodplanID" value=<?php echo $datatab[0]['goodplanID']; ?>>
                              <div class="btnenvoyer col">
                                  <button type="submit" class="btn btn-normal">ENVOYER</button>
                              </div>
                        </div>  
                    </div>	
                  </fieldset>
                </form>

        <?php } else { ?>
          <p>Tu as besoin d'être connecté.e pour commenter.</p>
        <?php } ?>
    
                
                <h3><?php echo count($datatab[1]); ?> commentaires</h3>
                
                <div class="listecoms">

                <?php foreach ($datatab[1] as $key => $comment) { ?>
                  <!-- COMMENT 1 - START -->
                  <div class="media">
                    <!-- TODO link avatar -->
                            <a class="avatarcom pull-left" href="#"><img class="media-object" src="img/avatar1.png" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  <?php echo $comment['userID']['lastname']." ".$comment['userID']['firstname']; ?>
                                </h4>
                                <ul class="list-unstyled list-inline media-detail pull-left">
                                    <li><i class="fa fa-calendar"></i>
                                    <?php echo date("d/m/Y", strtotime($comment['date'])); ?>
                                  </li>
                                </ul>
                                <p><?php echo $comment['text']; ?></p>
                            </div>
                        </div>
                        <!-- COMMENT 1 - END -->
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--------- FIN ZONE DE COMMENTAIRE -------->

<!-- --- Boutons flottants à intégrer avec les filtres... -->


<section class="btn-flottants">

  <!-------- SCROLL ---------->

      <div class="scroll btn">
        <img src="../../views/img/top.png" alt="retourner en haut de la page" />
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
      <div class="container">

        <div class=" navfooter row d-flex  pt-5 mb-3">

              <div class="col-md-2 mb-3">
                  <h6><a href="../accueil">ACCUEIL</a></h6>
              </div>

              <!-- TODO link vers mon compte si connecté sinon vers connexion -->
              <div class="col-md-2 mb-3">
                  <h6><a href="#">MON COMPTE</a></h6>
              </div>

              <!-- TODO link vers messagerie -->
              <div class="col-md-2 mb-3">
                  <h6><a href="#">MESSAGERIE</a></h6>
              </div>

              <!-- TODO link vers page qui sommes nous -->
              <div class="col-md-2 mb-3">
                  <h6><a href="#">QUI SOMMES-NOUS</a></h6>
          </div>
        </div>

        <div class=" row d-flex mb-md-0 mb-4">

          <div class=" presentation col-md-8 col-12 mt-5">
                <p class="pitch">" Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun d'entre vous pourra contribuer et faire de cette plateforme un concentré d’informations pertinentes pour vous tous, étudiants de France ! "</p>
                <p class="signature"> L'Équipe du QG</p>

                <!-- Boutons -->
                <div class="boutonsfoot">
                    <a class=" inscription btn btn-primary " href="../inscription" role="button">INSCRIPTION</a>
                    <a class="inscription btn btn-primary " href="../connexion" role="button">CONNEXION</a>
                </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG  - IMAC 1 LLMNP -  <a href="../../views/mentions-legales.php" target="blank">Mentions Légales</a>
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