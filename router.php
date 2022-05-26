<?php
require_once("controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtolower($_SERVER['REQUEST_URI']);
$tab = explode("/", $uri);

$count = 4;

switch ($tab[$count])
{
    case "accueil":
        $filters = null;
        $search=null;
        if($method == 'POST')
        {
            if($_POST['type'] == 'logout')
            {
                logout();
            } else if($_POST['type'] == 'filters'){
                $filters = $_POST['myfilters'];
            }
            else if($_POST['type']=='search'){
                $search = $_POST['recherche'];
            }
        }
        // passer en parametre les filters
        viewHomePage($filters, $search);
        break;

    case "seconnecter":
        if($method == 'POST')
        {
            if ($_POST['type'] == 'login')
            {
                login();
            }
            else if ($_POST['type'] == 'register')
            {
                register();
            }
            else if ($_POST['type'] == 'delete')
            {
                supprimerCompte();
            }
        }
        else
        {
            viewSeconnecterPage();
        }
        break;
    
    case "addgoodplan":
        if($method == 'POST')
        {
            addGoodPlan();
        }
            viewAddGoodPlanPage();
        break;

        case "moncompte":
            viewMonComptePage();
            break;

        case "compteexterne":
            if($method == 'POST')
            {
                ajouterAmis($tab[$count+1]);
            }
            viewCompteExterne($tab[$count+1]);
            break;
    
        case "modifiercompte":
            if($method == 'POST')
            {
                modifierCompte();
            }
            else
            {
                viewModifierComptePage();
            }
            break;
            
    case "viewgoodplan":
        if($method == 'POST' && $_POST['type'] == "comment"){
            addComment();
        }
        viewGoodPlanPage($tab[$count+1]);
        break;

    case "category":
        $filters = null;
        if($method == 'POST' && $_POST['type'] == 'filters'){
            $filters = $_POST['myfilters'];
        }
        viewCategoryPage($tab[$count+1], $filters);
        break;
    
    case "subcategory":
        $filters = null;
        if($method == 'POST' && $_POST['type'] == 'filters'){
            $filters = $_POST['myfilters'];
        }
        viewSubCategoryPage($tab[$count+1], $filters);
        break;

    case "mentionslegales":
        viewMentionsLegales();
        break;
    case "quisommesnous":
        viewQuiSommesNous();
        break;

    default:
        echo "La requête n'a pas fonctionné";
        break;
}