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
    <link rel="stylesheet" href="../views/qui-sommes-nous-style.css">    
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

    <title> LE QG - L'équipe </title>

</head>

<body>

    <!---  NAVABAR -->


    <nav class="navbar fixed-top  ">

        <div class="d-flex flex-column align-items-center">
            <br>
            <a href="accueil"><img src="../views/img/leQG_logo.png" width="500" class=" invert img-fluid  "
                    alt="Accueil LE QG"></a>
        </div>

        <div class="row d-none d-sm-block">
            <div class="res  align-items-center ">
                <a class="home " href="accueil"><img class="invert" src="../views/img/accueil.png" alt="Accueil"
                        width="50"></a>
                        <!-- TODO link vers messagerie -->
                <a class="chat" href="#"><img class="invert" src="../views/img/chat.png" alt="Chat" width="50"></a>
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
    <!---  FIN NAVBAR -->

    <h1>Qui sommes-nous ?</h1>

    <!-------- MAIN --------->
    <main>
    
        <div class="container">
        
            <div class="row text-center">

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="../views/img/aurore.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Aurore Lafaurie</h5>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-assistant" style="color:#8Db600";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-php" style="color:#000080";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i></li>
                        </ul>
                    </div>
                </div><!-- End -->

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="../views/img/antoine.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Antoine Leblond</h5>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-php" style="color:#000080";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i></li>
                        </ul>
                    </div>
                </div><!-- End -->

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="../views/img/sarah.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Sarah N'Gotta</h5>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-gestion" style="color:#C4D61F";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-front" style="color:#FF69B4";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-sql" style="color:#4747ff";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i></li>
                        </ul>
                    </div>
                </div><!-- End -->

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="../views/img/aude.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Aude Pora</h5>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-front" style="color:#FF69B4";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-sql"  style="color:#4747ff";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i></li>
                        </ul>
                    </div>
                </div><!-- End -->

                 <!-- Team item -->
                 <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="../views/img/mathurin.png" alt="" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Mathurin Rambaud</h5>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-front" style="color:#FF69B4";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-sql"  style="color:#4747ff";></i></li>
                            <li class="list-inline-item"><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i></li>
                        </ul>
                    </div>
                </div><!-- End -->

                <!-- Team item -->
                <div class="col-xl-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <ul class="nomfonctions mb-0 list-inline mt-3">
                            <li><i class="bi bi-circle-fill text-gestion" style="color:#C4D61F";></i><span>&nbsp;Gestion de projet</span></li>
                            <li><i class="bi bi-circle-fill text-assistant" style="color:#8Db600";></i><span>&nbsp;Assistante de projet</span></li>
                            <li><i class="bi bi-circle-fill text-php" style="color:#000080";></i><span>&nbsp;PHP</span></li>
                            <li><i class="bi bi-circle-fill text-sql"  style="color:#4747ff";></i><span>&nbsp;SQL</span></li>                            
                            <li><i class="bi bi-circle-fill text-front" style="color:#FF69B4";></i><span>&nbsp;HTML/CSS/JS</span></li>
                            <li><i class="bi bi-circle-fill text-redaction" style="color:#242424";></i><span>&nbsp;Rédaction</span></li>
                        </ul>
                    </div>
                </div><!-- End -->
            </div>
        </div>



        <!-- --- Boutons flottants à intégrer avec les filtres... -->


        <section class="btn-flottants">

            <!-------- SCROLL ---------->

            <div class="scroll btn">
                <img src="../views/img/top.png" alt="retourner en haut de la page" />
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

                <div class="col-md-2 mb-3">
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
            <div class="footer-copyright text-center py-3">© 2022 Copyright LE QG - IMAC 1 LLMNP - <a
                    href="mentionslegales" target="blank">Mentions Légales</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>

    <!-- Footer -->



    <!---------------------------------------SCRIPT----------------------->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

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