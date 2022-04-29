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
    <link rel="stylesheet" href="moncompte-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <title> LE QG - ACCUEIL </title>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar fixed-top  ">
        <div class="d-flex flex-column align-items-center">
            <br>
            <a href="index.php"><img src="img/leQG_logo.png" width="500" class=" invert img-fluid  "
                    alt="Accueil LE QG"></a>
        </div>
        <div class="row d-none d-sm-block">
            <div class="res  align-items-center ">
                <a class="home " href="index.php" target="blank"><img class="invert" src="img/accueil.png" alt="Accueil"
                        width="50"></a>
                <a class="chat" href="#" target="blank"><img class="invert" src="img/chat.png" alt="Chat"
                        width="50"></a>
                <a class="connexion" href="seconnecter.php" target="blank"><img class="invert" src="img/sidentifier.png"
                        alt="Connexion" width="50"></a>
            </div>
        </div>
    </nav>

    <h1>Jane Doe</h1>

    <!-- Tableau contenant les onglets "MES INFOS" et "MES BONS PLANS" -->
    <div>

       <div class="contents">
            <!-- Onglet MES INFOS -->
            <div id="content1" class="content ">
                <div class="container">
                    <!-- Informations utilisateurs -->
                    <div class="row align-items-center justify-content-center">
                        <div class="col-5">
                            <!-- A LINK VERS LA POP UP DE L'UTILISATEUR -->
                            <a href=""><img src="img/avatar1.png" alt="photo de profil" class="pp"></a></br>
                        </div>
                        <div class="col-4">
                            <b>
                                <p>Nom et prénom</pl>
                            </b>
                            <p>Jane Doe</p>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT LE NOM ET LE PRÉNOM DE L'UTILISATEUR -->

                            <b>
                                <p>Nombre de bons plans postés</p>
                            </b>
                            <p>12</p>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT L'EMAIL DE L'UTILISATEUR -->

                            <b>
                                <p>Inscrit.e depuis</p>
                            </b>
                            <p>10/12/2022</p>
                            <!-- AFFICHER INFORMATION BDD CONCERNANT LA VILLE DE L'UTILISATEUR -->
                        </div>

                    </div>

                    <!-- Boutons -->
                    <div class="text-center">
                        <div class="btn-grp" role="groupe">
                            <button class=" modifierbtn  btn btn-secondary">DEVENIR AMIS</button>
                            <!--FAIRE EN SORTE QUE LES DEUX DEVIENNENT AMIS AU NIVEAU DE LA BDD-->
                            <!-- SI DEJA AMIS ALORS LE BOUTON DEVIENT : SUPPRIMER DES AMIS -->
                            <button class=" modifierbtn  btn btn-secondary"  data-toggle="modal"
                    data-target="#exampleModal">ENVOYER UN MESSAGE</button>
                            <!--LINK VERS LA MESSAGERIE QUAND ELLE EXISTERA-->
                            <!--SI PAS AMIS, FENETRE MODALE QUI S'OUVRE-->
                        </div>
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
                                <p class="card-text">Description du bon plan. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Similique sint doloribus non ipsam nobis ullam natus nam sit
                                    obcaecati. Sed magnam similique molestias! At rerum, nemo accusamus mollitia facere
                                    ea maxime quod aliquam, enim quo itaque velit culpa! Quisquam animi delectus
                                    doloremque! Sed laudantium fugit blanditiis eaque! Laboriosam, excepturi
                                    repellendus.</p>
                            </div>
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
            <img src="img/top.png" alt="retourner en haut de la page" />
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
                    <h6><a href="#">QUI SOMMES-NOUS</a></h6>
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
                        <a class=" inscription btn btn-primary " href="seconnecter.php" role="button"
                            target="blank">INSCRIPTION</a>
                        <a class="inscription btn btn-primary " href="seconnecter.php" role="button"
                            target="blank">CONNEXION</a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG - IMAC 1 LLMNP - <a href="#"
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