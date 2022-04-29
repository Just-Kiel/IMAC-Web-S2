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

function viewHomePage()
{
    if (getCurrentUser() == NULL)
    {
        view('index.php');
    }
    else
    {
        view('index.php', getCurrentUser());
    }
}

function viewSeconnecterPage()
{
    view('seconnecter.php', getAllCities());
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
        $_SESSION['error'] = "Cette addresse email existe déjà.";
        viewSeconnecterPage();
    } else {
        if ($password != $confirmpassword)
        {
            $_SESSION['error'] = "Vos mots de passe ne correspondent pas.";
            viewSeconnecterPage();
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
            $_SESSION['success'] = "Votre compte a bien été créé.";
            viewSeconnecterPage();
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
            viewHomePage();
        } else {
            $_SESSION['error'] = "Votre mot de passe est incorrect.";
            viewSeconnecterPage();
        }
    } else {
        $_SESSION['error'] = "Cette addresse email n'existe pas.";
        viewSeconnecterPage();
    }
}

function logout()
{
    session_unset();
    session_destroy();
}