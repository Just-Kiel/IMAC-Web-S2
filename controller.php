<?php
require_once("model.php");
if (!isset($_SESSION)) {
    session_start();
  }

function view($temp, $datatab=array())
{
    if (!isset($datatab['title']))
    {
        $title = "Pas de titre";
    }
    
    foreach ($datatab as $key => $val)
    {
        $$key = $val;
    }

    include('views/'.$temp);
}

function viewGoodPlansPage(){
    $data = getAllGoodPlans();
    foreach($data as $key=>$goodplan){
        if(!empty($goodplan['cityID'])){
            $city = getOneCity($goodplan['cityID']);
            $goodplan['cityID'] = $city[0]['name'];
        }

        $user = getOneUser($goodplan['userID']);
        $goodplan['userID'] = $user[0]['firstname']." ".$user[0]['lastname'];

        $data[$key] = $goodplan;
    }

    view('viewGoodPlans.php', $data);
}

function viewAddGoodPlanPage(){
    $data[0] = getAllCategories();
    $data[1] = getAllCities();
    view('addGoodPlan.php', $data);
}

function addGoodPlan(){
    $title = $_POST['title'];
    $textContent = $_POST['textContent'];
    $startingDate = $_POST['startingDate'];
    $endingDate = $_POST['endingDate'];
    $category = $_POST['categories'];
    $city = $_POST['cities'];
    $user = getCurrentUser();
    $user = $user[0]['userID'];

    addOneGoodPlan($title, $textContent, $startingDate, $endingDate, $category, $city, $user);
    
}

function viewHomePage()
{
    if (getCurrentUser() == NULL)
    {
        view('homepage.php');
    }
    else
    {
        view('homepage.php', getCurrentUser());
    }
}

function viewRegisterPage()
{
    view('register.php', getAllCities());
}

function viewLoginPage()
{
    view('login.php');
}

function register()
{
    $lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $city = $_POST['cities'];
    
    $stmt = connexion()->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    if ($user) {
        viewRegisterPage();
        echo "Cette addresse email existe déjà.";
    } else {
        if ($password != $confirmpassword)
        {
            viewRegisterPage();
            echo "Vos mots de passe ne correspondent pas.";
        }
        else
        {
            $sql = "INSERT INTO users (lastname, firstname, email, password, cityID) VALUES ('$lastname','$firstname','$email', '$hashed_password', '$city')";
            try {
                connexion()->query($sql);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
            echo "Votre compte a bien été créé.<br/>
            <a href='accueil'>Accueil</a>";
        }
    }
}

function login()
{
    $email = $_POST['email'];
	$password = $_POST['password'];

    $stmt = connexion()->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    if ($user) {
        if(password_verify($password, $user['password']))
        {
            if (!isset($_SESSION)) {
                session_start();
              }
            $_SESSION['currentUserID'] = $user['userID'];
            echo "Nous sommes heureux de vous revoir, " . getCurrentUser()[0]['lastname'] . " " . getCurrentUser()[0]['firstname'] . "<br/>
            <a href='accueil'>Accueil</a>";
        } else {
            viewLoginPage();
            echo "Votre mot de passe est incorrect.";
        }
    } else {
        viewLoginPage();
        echo "Cette addresse email n'existe pas.";
    }
}

function logout()
{
    session_destroy();
    echo "Vous vous êtes déconnecté.<br/> <a href='accueil'>Accueil</a>";
}