<?php
require_once("controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtolower($_SERVER['REQUEST_URI']);
$tab = explode("/", $uri);

switch ($tab[4])
{
    case "accueil":
        if($method == 'POST' && $_POST['type'] == 'logout')
        {
            logout();
        }
        viewHomePage();
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
        else
        {
            viewAddGoodPlanPage();
        }
        break;

    case "moncompte":
        viewMonComptePage();
        break;

    case "modifiercompte":
        viewModifierComptePage();
        break;

    case "viewgoodplan":
        viewGoodPlanPage($tab[5]);
        break;

    case "category":
        viewCategoryPage($tab[5]);
        break;

    default:
        echo "La requête n'a pas fonctionné";
        break;
}