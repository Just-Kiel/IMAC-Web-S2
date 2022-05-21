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
    <link rel="stylesheet" href="../views/seconnecter-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


<title> LE QG - INSCRIPTION/CONNEXION </title>


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
              <a class="chat" href="#" ><img  class="invert"  src="../views/img/chat.png" alt="Chat" width="50"></a>
              <a class="connexion" href="seconnecter"><img class="invert"  src="../views/img/sidentifier.png" alt="Connexion" width="50"></a>
          </div>
        </div>
    </nav>

    <h1>SE CONNECTER AU QG !</h1>

    <?php
    if (!empty($_SESSION['error']))
    {
      echo "<div style='text-align:center;color:red'>";
          echo $_SESSION['error'];
          unset($_SESSION['error']);
      echo "</div>";
    } else if (!empty($_SESSION['success']))
    {
      echo "<div style='text-align:center;color:green'>";
          echo $_SESSION['success'];
          unset($_SESSION['success']);
      echo "</div>";
    }
    ?>

    <div class="tabs">
        <ul class="list">
            <li class="tab active" data-target="#content1">INSCRIPTION</li>
            <li class="tab" data-target="#content2">CONNEXION</li>
            </ul>
        <div class="contents">
            <div id="content1" class="content">
                
                <form method='POST' action="seconnecter" enctype="multipart/form-data">
                  <input type='hidden' name='type' value='register'>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                      <div class="col">
                        <div class="form-outline">
                          <label class="form-label" for="form6Example1">Ton prénom</label>
                          <input type="text" id="form6Example1" class="form-control" name="firstname" required/>
                        </div>
                        <div class=" nom form-outline">
                          <label class="form-label" for="form6Example2">Ton nom</label>
                          <input type="text" class="form-control" name="lastname" required/>
                        </div>
                      </div>
                      <div class="col">
                        <div class="avatarinput">
                          <label for="media">Ajouter une photo de profil</label>
                          <input type="file" name="media" accept="image/*" required/>
                        </div>
                      </div>
                    </div>
  
                    <!-- Text input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form6Example4">Ta ville</label>
                      <select name="cities">
                        <?php
                        foreach($datatab as $city){
                            echo '<option value="'.$city['cityID'].'">'.$city['name'].'</option>';
                        }
                        ?>
                      </select>
                    </div>
  
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form6Example5">Ton adresse email</label>
                      <input type="email" id="form6Example5" class="form-control" name="email" required/>
                    </div>
  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example2">Ton mot de passe</label>
                      <input type="password" id="form1Example2" class="form-control" name="password" minlength="5" maxlength="20" required/>
                    </div>

                    <!-- Confirmation mdp -->

                    <div class="form-outline mb-4">
                      <label class="form-label" for="">Confirme ton mot de passe</label>
                      <input type="password" class="form-control" name="confirmpassword" minlength="5" maxlength="20" required/>
                    </div>
  
                    <!-- Submit button -->
                    <button type="submit" class=" sinscrirebtn btn btn-primary btn-block mb-4">JE M'INSCRIS !</button>
              </form>
            
            </div>
            <div id="content2" class="content">
                <form method='POST' action="seconnecter">
                  <input type='hidden' name='type' value='login'>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example1">Ton adresse email</label>
                      <input type="email" id="form1Example1" class="form-control" name="email" required/>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example2">Ton mot de passe</label>
                      <input type="password" id="form1Example2" class="form-control" name="password" minlength="5" maxlength="20" required/>
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="connexionbtn btn btn-primary btn-block">JE ME CONNECTE !</button>
                  </form>
            
            </div>
        </div>
    </div>


<!-------- SCROLL ---------->

    <section class="btn-flottants">


    <div class="scroll btn">
      <img src="../views/img/top.png" alt="retourner en haut de la page" />
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


          window.onload = () => {
          const tabs = document.querySelectorAll(".tab");
          const contents = document.querySelectorAll(".content");
          let active = document.querySelector(".active");
          let target = active.dataset.target;

          affiche();

          // On affiche le contenu de l'onglet actif
          document.querySelector(target).classList.add("show");

          /**
          * Cette fonction gère le changement d'affichage
          */
          function affiche(){
              // On boucle sur tous les onglets
              for(let tab of tabs){
                  // On retire les écouteurs d'évènements
                  tab.removeEventListener("click", tabClick);

                  // On vérifie si l'onglet est actif
                  if(tab !== active){
                      tab.addEventListener("click", tabClick);
                      tab.classList.remove("active");
                  }
              }
              
              // On boucle sur les contenus
              for(let content of contents){
                  content.classList.remove("show");
              }
          }

          function tabClick(){
              target = this.dataset.target;
              active = this;
              this.classList.add("active");
              
              // On active le bon onglet et on "efface" les contenus
              affiche();

              // On affiche le contenu correspondant à l'onglet cliqué
              document.querySelector(target).classList.add("show");
          }
      }
</script>

</body>
</html>