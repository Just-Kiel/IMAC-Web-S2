# IMAC Web-S2

## Produit par Sarah N'GOTTA, Aude PORA, Mathurin RAMBAUD, Antoine LEBLOND et Aurore LAFAURIE

Dans le cadre du 2ème semestre d'IMAC, un projet Web nécessitant notamment du PHP nous est demandé.

De nombreuses propositions nous sont venues à l'esprit :
- Un réseau social,
- Un site référençant des musiques, films ou autres contenus,
- Un site permettant de partager ses aventures de voyage,
- Une plateforme permettant de proposer des bons plans et en même temps de les découvrir.

Notre choix final se porte sur la réalisation d'une plateforme de bons plans étudiants.

# LE QG ? Je dis MAC* !
*Meilleures Astuces & Conseils

## Le Pitch
Notre site est dédié aux étudiants en recherche de bons plans, de codes promos, d’activités à faire près de chez eux et bien plus encore. Grâce à cette plateforme, une génération entière d’étudiants pourra avoir accès à des informations qui amélioreront nettement leur qualité de vie étudiante, privée, sociale. Plus qu’un site de bon plans, LE QG est un véritable réseau social où chacun pourra contribuer et faire de cette plateforme un concentré d’informations pertinentes pour tous les étudiants de France !

# Comment utiliser ?

Le projet se base sur l'utilisation de l'architecture Modèle - Vue - Contrôleur.

## Base de données
Le fichier .sql est une base de la base de données utilisée. On y retrouve quelques villes déjà implémentées ainsi que les catégories et sous catégories déjà organisées.

## Connexion à la base de données
Les informations de connexion à la base de données sont à entrer dans le fichier connexion.php.

## Router
Dans le fichier router se trouve une variable count. Cette variable est à modifier en fonction de la longueur de l'URL afin de pouvoir effectuer les requêtes.