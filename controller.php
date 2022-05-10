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

function viewAddGoodPlanPage(){
    $data[0] = getAllCategories();
    $data[1] = getAllCities();

    view('addGoodPlan.php', $data);
}

function viewGoodPlanPage($n){
    $data = getOneGoodPlan($n);
    $category = getOneCategory($data[0]['categoryID']);
    $data[0]['categoryID'] = $category[0];

    if(!empty($data[0]['mediaID'])){
        $media = getOneMedia($data[0]['mediaID']);
        $data[0]['mediaID'] = $media[0]['url'];
    }

    if(!empty($data[0]['cityID'])){
        $city = getOneCity($data[0]['cityID']);
        $data[0]['cityID'] = $city[0]['name'];
    }

    $user = getOneUser($data[0]['userID']);
    $data[0]['userID'] = $user[0];

    view('bonplan.php', $data);
}

function addGoodPlan(){
    $user = getCurrentUser();
    $user = $user[0]['userID'];

    $mediaID = null;
    $media = $_FILES['media']['name'];
    if(!empty($media)){        
        $mediaID = addOneMedia($user, $media);
    }

    $title = $_POST['title'];
    $textContent = $_POST['textContent'];
    $startingDate = $_POST['startingDate'];
    $endingDate = $_POST['endingDate'];
    $category = $_POST['categories'];
    $city = $_POST['cities'];
    

    addOneGoodPlan($title, $textContent, $startingDate, $endingDate, $category, $city, $user, $mediaID);
}

function viewHomePage()
{
    if (getCurrentUser() == NULL)
    {
        $data[0] = null;
        $data[1] = getAllGoodPlans();
        foreach($data[1] as $key=>$goodplan){
            if(!empty($goodplan['cityID'])){
                $city = getOneCity($goodplan['cityID']);
                $goodplan['cityID'] = $city[0]['name'];
            }

            if(!empty($goodplan['mediaID'])){
                $media = getOneMedia($goodplan['mediaID']);
                $goodplan['mediaID'] = $media[0]['url'];
            }

            $user = getOneUser($goodplan['userID']);
            $goodplan['userID'] = $user[0];

            $data[1][$key] = $goodplan;
        }
        $data[2] = getOnlyCategories();
        view('index.php', $data);
    }
    else
    {
        $data[0] = getCurrentUser();
        $data[1] = getAllGoodPlans();
        foreach($data[1] as $key=>$goodplan){
            if(!empty($goodplan['cityID'])){
                $city = getOneCity($goodplan['cityID']);
                $goodplan['cityID'] = $city[0]['name'];
            }
            
            if(!empty($goodplan['mediaID'])){
                $media = getOneMedia($goodplan['mediaID']);
                $goodplan['mediaID'] = $media[0]['url'];
            }

            $user = getOneUser($goodplan['userID']);
            $goodplan['userID'] = $user[0];

            $data[1][$key] = $goodplan;
        }
        $data[2] = getOnlyCategories();
        view('index.php', $data);
    }
}

function viewCategoryPage($n){
    $data[0] = getOneCategory($n);
    $data[1] = getAllSubCategories($n);
    $data[2] = getGoodPlansFromCategory($n);

    foreach($data[2] as $key=>$goodplan){
        if(!empty($goodplan['cityID'])){
            $city = getOneCity($goodplan['cityID']);
            $goodplan['cityID'] = $city[0]['name'];
        }
        
        if(!empty($goodplan['mediaID'])){
            $media = getOneMedia($goodplan['mediaID']);
            $goodplan['mediaID'] = $media[0]['url'];
        }

        $user = getOneUser($goodplan['userID']);
        $goodplan['userID'] = $user[0];

        $data[2][$key] = $goodplan;
    }

    view('category.php', $data);
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