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


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">


    <title> LE QG - ACCUEIL </title>

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

                <!-- TODO link vers la messagerie -->
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


    <!-------- MAIN --------->


    <main>
        <div class="col-sm-7 mx-auto text-justify">
            <h1>Mentions légales</h1>
            <h2> I. Éditeur du site LE QG ? Je dis MAC !</h2>
            <p>IMAC</br>
                SASU au capital de 30 000€</br>
                RCS Champs-Sur-Marne B 753 485 051</br>
                Code APE 6312Z</br>
                Siège social : Bd Copernic, 77420 Champs-sur-Marne - FRANCE
            </p>
            <p>La société IMAC n’est pas en charge de la publication des contenus mis en ligne par les membres, ces
                derniers étant uniquement hébergés sur la plateforme LE QG ? Je dis MAC !.</p>
            <br>

            <h2>II. Hébergeur</h2>
            <p>Just Kiel<br>
                38 avenue John F. Kennedy<br>
                Toulouse</p>
            <br>

            <h2>III. Conditions générales d'utilisation</h2>

            <p>L’utilisation du site http://le-qg.just-kiel.fr implique l’acceptation pleine et entière des conditions
                générales d’utilisation décrites à cette adresse.</p>

            <h2>IV. Politique de confidentialité et de protection de la vie privée</h2>

            <p>Le Site http://le-qg.just-kiel.fr est déclaré sous le numéro 1612841 auprès de la Commission Nationale
            Informatique et Libertés (CNIL). <br>

            Les informations recueillies font l'objet d'un traitement informatique destiné à créer une base de données
            d'utilisateurs. Conformément à la loi « informatique et libertés » du 6 janvier 1978 modifiée en 2004, vous
            bénéficiez d'un droit d'accès et de rectification aux informations qui vous concernent, que vous pouvez
            exercer par voie postale. Vous pouvez également, pour des
            motifs légitimes, vous opposer au traitement des données vous concernant. <br>

            Nous vous invitons à consulter notre politique de confidentialité pour en savoir plus sur l'origine et
            l'usage des données de navigation traitées à l'occasion de votre consultation et utilisation du Site
            DEALABS, et sur vos droits y afférent. <br> </p>
            <br>

            <h2>V. Droit d'auteur</h2>

            <p>La marque DEALABS est enregistrée auprès de l'INPI. <br>

            Les marques citées sont la propriété de leurs détenteurs respectifs. Toute reproduction, représentation,
            traduction, adaptation, ou citation qu'elle soit intégrale ou partielle, quel qu’en soit le procédé, est
            strictement interdite sans autorisation de Pepper France, sauf cas prévus par l'article L.112-5 du code de
            la propriété intellectuelle. Photos non contractuelles.
            </p>

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
                    <!-- TODO relink quisommesnous -->
                    <h6><a href="qui-sommes-nous.php">QUI SOMMES-NOUS ?</a></h6>
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