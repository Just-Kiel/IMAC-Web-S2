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
    <link rel="stylesheet" href="../../views/moncompte-vue-externe-style.css">
    <link rel="stylesheet" href="../views/polices.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- POLICES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Koulen&family=Rubik:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- FIN POLICES -->

    <title> LE QG - <?php echo $datatab[0]['firstname'] . " " . $datatab[0]['lastname']; ?> </title>
</head>

<body>

    <!---  NAVABAR -->
    <nav class="navbar fixed-top  ">

<div class="d-flex flex-column align-items-center">
<br>
<a href="../accueil"><img src="../../views/img/leQG_logo.png" width="500" class=" invert img-fluid  " alt="Accueil LE QG"></a>
</div>

<div class="row d-none d-sm-block">
<div class="res  align-items-center ">
    <a class="home " href="../accueil"><img class="invert"  src="../../views/img/accueil.png" alt="Accueil" width="50"></a>
    <!-- TODO link vers messagerie -->
    <a class="chat" href="#" ><img  class="invert"  src="../../views/img/chat.png" alt="Chat" width="50"></a>
    <?php
    if (!isset($_SESSION['currentUserID']))
    {
      echo '<a class="connexion" href="../seconnecter" ><img class="invert"  src="../../views/img/sidentifier.png" alt="Connexion" width="50"></a>';
    } else
    {
      ?>
       <div class="menu-deroulant">
      <a class="connexion" href="../moncompte"><img class="invert"  src="../../views/img/sidentifier.png" alt="Connexion" width="50"></a>
      <ul class="sous-menu">
        <li><a href="../moncompte">mon compte</a></li>
        <li><form method='POST' action='../accueil'>
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


    <h1><?php echo $datatab[0]['firstname']." ".$datatab[0]['lastname']; ?></h1>

    <!-- Tableau contenant les onglets "MES INFOS" et "MES BONS PLANS" -->
    <div>

       <div class="contents">
            <!-- Onglet MES INFOS -->
            <div id="content1" class="content ">
                <div class="container">
                    <!-- Informations utilisateurs -->
                    <div class="row align-items-center justify-content-center">
                        <div class="col col-sm-4">
                            <img src=
                                <?php
                                echo "../../views/".$datatab[0]['mediaID']['url'];
                                ?>
                                 alt="photo de profil" class="pp"></br>
                        </div>
                        <div class="col-4">
                            <b>
                                <p class="nomcat">Nom et prénom</pl>
                            </b>
                            <p class="infutilisateur"><?php echo $datatab[0]['firstname']." ".$datatab[0]['lastname']; ?></p>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT LE NOM ET LE PRÉNOM DE L'UTILISATEUR -->

                            <b>
                                <p class="nomcat">Nombre de bons plans postés</p>
                            </b>
                            <p class="infutilisateur"><?php echo count($datatab[1]); ?></p>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT L'EMAIL DE L'UTILISATEUR -->
                        </div>

                    </div>

                    <!-- Boutons -->
                    <div class="text-center">
                    <?php if ($datatab[0]['userID'] != getCurrentUser()[0][0]) { ?>
                        <div class="btn-grp" role="groupe">
                            <form class="inscrform" method='POST' enctype="multipart/form-data">
                                <?php if(getIsFriend(getCurrentUser()[0][0], $datatab[0]['userID']) == 0) { ?>
                                <button type="submit" class=" modifierbtn btn btn-primary btn-block mb-4">DEVENIR AMIS</a>
                                <?php } else { ?>
                                <button type="submit" class=" modifierbtn btn btn-primary btn-block mb-4">SUPPRIMER DES AMIS</a>
                                <?php } ?>
                            </form>
                            <!-- TODO FAIRE EN SORTE QUE LES DEUX DEVIENNENT AMIS AU NIVEAU DE LA BDD-->
                            <!-- SI DEJA AMIS ALORS LE BOUTON DEVIENT : SUPPRIMER DES AMIS -->
                            <button class=" modifierbtn  btn btn-secondary"  data-toggle="modal"
                    data-target="#exampleModal">ENVOYER UN MESSAGE</button>
                            <!-- TODO LINK VERS LA MESSAGERIE QUAND ELLE EXISTERA-->
                            <!--SI PAS AMIS, FENETRE MODALE QUI S'OUVRE-->
                        </div>
                        <?php } ?>
                        <!-- Fenêtre modale pour le bouton SUPPRIMER COMPTE -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tu ne peux pas envoyer de messages à cet utilisateur.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Deviens ami.e avec cet utilisateur pour pouvoir lui envoyer un message !</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class=" fermerbtn btn btn-secondary"
                                    data-dismiss="modal">J'ai compris</button>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

                <h1 class="sesbonsplans">Ses bons plans :</h1>

                <?php
                    foreach($datatab[1] as $goodplan){
                ?>
                <div class="card mb-3" style="max-width: 70em;">
                    <div class="row no-gutters">
                        <div class=" cardlike col-md-4">
                            <img src=
                            <?php
                            echo "../../views/".$goodplan['mediaID'];
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
              <a href="../viewgoodplan/<?php echo $goodplan['goodplanID']; ?>" class="profiter btn btn-primary">J'EN PROFITE !</a>
            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>
            </div>


        </div>

    </div>
    </div>

    <!-------- SCROLL ---------->
    <section class="btn-flottants">
        <div class="scroll btn">
            <img src="../../views/img/top.png" alt="retourner en haut de la page" />
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
                    <p class="pitch">" Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun
                        d'entre vous pourra contribuer et faire de cette plateforme un concentré d’informations
                        pertinentes pour vous tous, étudiants de France ! "</p>
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
            <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG - IMAC 1 LLMNP - <a href="mentionslegales"
                    target="blank">Mentions Légales</a>
            </div>

        </div>
    </footer>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

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
        function affiche() {
            // On boucle sur tous les onglets
            for (let tab of tabs) {
                // On retire les écouteurs d'évènements
                tab.removeEventListener("click", tabClick);

                // On vérifie si l'onglet est actif
                if (tab !== active) {
                    tab.addEventListener("click", tabClick);
                    tab.classList.remove("active");
                }
            }

            // On boucle sur les contenus
            for (let content of contents) {
                content.classList.remove("show");
            }
        }

        function tabClick() {
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