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
    <link rel="stylesheet" href="../views/moncompte-style.css">
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

    <title> LE QG - MON COMPTE </title>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar fixed-top  ">
        <div class="d-flex flex-column align-items-center">
            <br>
            <a href="accueil"><img src="../views/img/leQG_logo.png" width="500" class=" invert img-fluid  "
                    alt="Accueil LE QG"></a>
        </div>
        <div class="row d-none d-sm-block">
            <div class="res  align-items-center ">
                <a class="home " href="accueil"><img class="invert"  src="../views/img/accueil.png" alt="Accueil" width="50"></a>
                <!-- TODO link vers messagerie -->
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

    <h1>MES INFORMATIONS PERSONNELLES</h1>

    <!-- Tableau contenant les onglets "MES INFOS" et "MES BONS PLANS" -->
    <div class="tabs">

        <ul class="list">
            <li class="tab active" data-target="#content1">MES INFOS</li>
            <li class="tab" data-target="#content2">MES BONS PLANS</li>
        </ul>

        <div class="contents">
            <!-- Onglet MES INFOS -->
            <div id="content1" class="content">

                <!-- Informations utilisateurs -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <b><label class="form-label" for="form6Example1">Nom et prénom</label></b>
                            <?php echo "</br>" . $datatab[0]['lastname'] . " " . $datatab[0]['firstname'] ?>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT LE NOM ET LE PRÉNOM DE L'UTILISATEUR -->
                        </div>
                        <div class=" nom form-outline">
                            <b><label class="form-label" for="form6Example2">Email</label></b>
                            <?php echo "</br>" . $datatab[0]['email']?>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT L'EMAIL DE L'UTILISATEUR -->
                        </div>
                        <div class=" nom form-outline">
                            <b><label class="form-label" for="form6Example3">Ville</label></b>
                            <?php
                            $data = connexion()->query('SELECT name FROM cities WHERE cityID = '.$datatab[0]['cityID'])->fetchAll();
                            echo "</br>" . $data[0]['name'];
                            ?>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT LA VILLE DE L'UTILISATEUR -->
                        </div>
                    </div>
                    <div class="col">
                        <!-- A LINK VERS LA POP UP DE L'UTILISATEUR -->
                        <?php
                        $imgsrc = connexion()->query('SELECT url FROM medias WHERE mediaID = '.$datatab[0]['mediaID'])->fetchAll();
                        $src = "../views/" . $imgsrc[0][0];
                        echo "<a href=''><img src=" . "$src" . " alt='photo de profil' class='pp'></a></br>";
                        ?>
                    </div>
                </div>
                <!-- Boutons -->
                <a class=" modifierbtn btn btn-primary btn-block mb-4" href="modifiercompte">MODIFIER MES
                        INFORMATIONS</a>
                <button class=" supprimerbtn btn btn-primary btn-block mb-4" data-toggle="modal"
                    data-target="#exampleModal">SUPPRIMER MON COMPTE</button>
                <!--FAIRE EN SORTE QUE LE COMPTE SOIT BIEN SUPPRIME AU NIVEAU DE LA BDD-->

                <!-- Fenêtre modale pour le bouton SUPPRIMER COMPTE -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation suppression du compte</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Es-tu sûr.e de vouloir supprimer ton compte ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class=" fermerbtn btn btn-secondary"
                                    data-dismiss="modal">Fermer</button>
                                <button type="button" class=" confirmerbtn btn btn-primary">Je confirme</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet MES BONS PLANS -->
            <div id="content2" class="content">

              <!-- BDD -->
              <div class="card mb-3" style="max-width: 70em;">
                <div class="row no-gutters">
                  <div class=" cardlike col-md-4">            
                    <img src="../views/img/cine.jpg" class="card-img invert img-fluid" alt="infos bon plan">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Nom du bon plan</h5>
                      <p class="card-text"><small class="text-muted">Date et lieu</small></p>
                      <p class="card-text">Description du bon plan. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique sint doloribus non ipsam nobis ullam natus nam sit obcaecati. Sed magnam similique molestias! At rerum, nemo accusamus mollitia facere ea maxime quod aliquam, enim quo itaque velit culpa! Quisquam animi delectus doloremque! Sed laudantium fugit blanditiis eaque! Laboriosam, excepturi repellendus.</p>
                      <div class="btn-grp" role="groupe">
                        <!-- BDD -->
                        <button class=" modifierbtn btn btn-secondary"> <a href="moncompte-bonplan-modif.php">MODIFIER</a></button>
                        <!-- BDD -->
                        <button class=" supprimerbtn btn btn-secondary" data-toggle="modal" data-target="#modifbonplan">SUPPRIMER</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="modifbonplan" tabindex="-1" role="dialog" aria-labelledby="modifbonplanLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modifbonplanLabel">Confirmation suppression du bon plan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Es-tu sûr.e de vouloir supprimer ce bon plan ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class=" fermerbtn btn btn-secondary"
                                    data-dismiss="modal">Fermer</button>
                                <button type="button" class=" confirmerbtn btn btn-primary">Je confirme</button>
                            </div>
                        </div>
                    </div>
                </div>

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