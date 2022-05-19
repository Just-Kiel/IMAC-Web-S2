<?php
require_once("controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtolower($_SERVER['REQUEST_URI']);
$tab = explode("/", $uri);

switch ($tab[4])
{
    case "accueil":
        $filters = null;
        if($method == 'POST')
        {
            if($_POST['type'] == 'logout')
            {
                logout();
            } else if($_POST['type'] == 'filters'){
                $filters = $_POST['myfilters'];
            }
        }
        // passer en parametre les filters
        viewHomePage($filters);
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
            viewCompteExterne($tab[5]);
            break;
    
        case "modifiercompte":
            viewModifierComptePage();
            break;
            
    case "viewgoodplan":
        if($method == 'POST'){
            addComment();
        }
        viewGoodPlanPage($tab[5]);
        break;

    case "category":
        viewCategoryPage($tab[5]);
        break;
    
    case "subcategory":
        viewSubCategoryPage($tab[5]);
        break;

    case "mentionslegales":
        viewMentionsLegales();
        break;

    default:
        echo "La requête n'a pas fonctionné";
        break;
}