<?php
require_once("controller.php");

$method = $_SERVER['REQUEST_METHOD'];
$uri = strtolower($_SERVER['REQUEST_URI']);
$tab = explode("/", $uri);

switch ($tab[4])
{
    case "accueil":
        if($method == 'POST')
        {
            logout();
        }
        else
        {
            viewHomePage();
        }
        break;

    case "inscription":
        if($method == 'POST')
        {
            register();
        }
        else
        {
            viewRegisterPage();
        }
        break;

    case "connexion":
        if($method == 'POST')
        {
            login();
        }
        else
        {
            viewLoginPage();
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

    default:
        echo "La requête n'a pas fonctionné";
        break;
}