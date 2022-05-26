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
    $user[0]['mediaID'] = getOneMedia($user[0]['mediaID']);
    $data[0]['userID'] = $user[0];

    $data[0]['likes'] = getAllLikesforOneGoodplan($data[0]['goodplanID']);

    $data[1] = getAllCommentsOnOneGoodPlan($data[0]['goodplanID']);

    foreach ($data[1] as $key=>$comment) {
        $user = getOneUser($comment['userID']);
        $user[0]['mediaID'] = getOneMedia($user[0]['mediaID']);

        $data[1][$key]['userID'] = $user[0];
    }

    $data[2] = null;
    $currentUser = getCurrentUser();
    if($currentUser != null){
        $currentUser[0]['mediaID'] = getOneMedia($currentUser[0]['mediaID']);

        $data[2] = $currentUser[0];
    }
    
    view('bonplan.php', $data);
}

function addGoodPlan(){
    $user = getCurrentUser();
    $user = $user[0]['userID'];

    $mediaID = null;
    $media = $_FILES['media']['name'];
    if(!empty($media)){        
        $mediaID = addOneMedia($media);
    }

    $title = $_POST['title'];
    $textContent = $_POST['textContent'];
    $startingDate = $_POST['startingDate'];
    $endingDate = $_POST['endingDate'];
    $category = $_POST['categories'];
    $city = $_POST['cities'];
    

    addOneGoodPlan($title, $textContent, $startingDate, $endingDate, $category, $city, $user, $mediaID);
}

function deleteGoodPlan($goodplanID)
{
    $sql = "DELETE FROM goodplans WHERE goodplanID='$goodplanID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function addComment(){
    $user = getCurrentUser();
    $user = $user[0]['userID'];

    $text = $_POST['comContent'];
    $date = date("Y/m/d");

    $goodplanID = $_POST['goodplanID'];

    addOneComment($user, $text, $date, $goodplanID);
}

function viewHomePage($f,$search)
{
    if (getCurrentUser() == NULL)
    {
        $data[0] = null;
    }
    else
    {
        $data[0] = getCurrentUser();
    }
        if(!empty($search)){
            $data[1] = getSearchGoodPlans($search);
            $data[3] = "null";
            $data[4] = $search;
        } else if(!empty($f)){
            switch ($f) {
                case 'city':
                    $data[1] = getAllGoodPlansCityOrdered();
                    $data[3] = "city";
                    break;
                case 'like':
                    $data[1] = getAllGoodPlansLikeOrdered();
                    $data[3] = "like";
                    break;

                case 'date':
                    $data[1] = getAllGoodPlansDateOrdered();
                    $data[3] = "date";
                    break;

                case "null":
                    $data[1] = getAllGoodPlans();
                    $data[3] = "null";
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            $data[1] = getAllGoodPlans();
            $data[3] = "null";
        }

        
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
            $user[0]['mediaID'] = getOneMedia($user[0]['mediaID']);

            $goodplan['userID'] = $user[0];

            $goodplan['likes'] = getAllLikesforOneGoodplan($goodplan['goodplanID']);

            $data[1][$key] = $goodplan;
        }
        $data[2] = getOnlyCategories();

        view('index.php', $data);
}

function viewCategoryPage($n, $f){
    $data[0] = getOneCategory($n);
    $data[1] = getAllSubCategories($n);
    // $data[2] = getGoodPlansFromCategory($n);
    $data[3] = getOnlyCategories();


    if(!empty($f)){
        switch ($f) {
            case 'city':
                $data[2] = getAllGoodPlansCityOrderedFromCategory($n);
                $data[4] = "city";
                break;
            case 'like':
                $data[2] = getAllGoodPlansLikeOrderedFromCategory($n);
                $data[4] = "like";
                break;

            case 'date':
                $data[2] = getAllGoodPlansDateOrderedFromCategory($n);
                $data[4] = "date";
                break;

            case "null":
                $data[2] = getGoodPlansFromCategory($n);
                $data[4] = "null";
                break;
            
            default:
                # code...
                break;
        }
    } else {
        $data[2] = getGoodPlansFromCategory($n);
        $data[4] = "null";
    }

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
        $user[0]['mediaID'] = getOneMedia($user[0]['mediaID']);

        $goodplan['userID'] = $user[0];

        $goodplan['likes'] = getAllLikesforOneGoodplan($goodplan['goodplanID']);

        $data[2][$key] = $goodplan;
    }

    view('categorie.php', $data);
}

function viewSubCategoryPage($n, $f){
    $data[0] = getOneCategory($n);
    // $data[1] = getGoodPlansFromCategory($n);
    $data[2] = getOnlyCategories();
    $data[3] = getCategoryOfSubCategory($n)[0];

    if(!empty($f)){
        switch ($f) {
            case 'city':
                $data[1] = getAllGoodPlansCityOrderedFromCategory($n);
                $data[4] = "city";
                break;
            case 'like':
                $data[1] = getAllGoodPlansLikeOrderedFromCategory($n);
                $data[4] = "like";
                break;

            case 'date':
                $data[1] = getAllGoodPlansDateOrderedFromCategory($n);
                $data[4] = "date";
                break;

            case "null":
                $data[1] = getGoodPlansFromCategory($n);
                $data[4] = "null";
                break;
            
            default:
                # code...
                break;
        }
    } else {
        $data[1] = getGoodPlansFromCategory($n);
        $data[4] = "null";
    }

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

    view('souscategorie.php', $data);
}

function viewMentionsLegales(){
    view('mentions-legales.php');
}

function viewQuiSommesNous(){
    view('qui-sommes-nous.php');
}

function viewSeconnecterPage()
{
    view('seconnecter.php', getAllCities());
}

function viewMonComptePage()
{
    view('moncompte.php', getCurrentUser());
}

function viewModifierComptePage()
{
    view('moncompte-modif.php', getCurrentUser());
}

function viewCompteExterne($userID){
    $data = getOneUser($userID);

    $media = getOneMedia($data[0]['mediaID']);

    $data[0]['mediaID'] = $media[0];

    $data[1] = getGoodPlansByUser($userID);

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

    view('moncompte-vue-externe.php', $data);
}

function addLike($goodplanID){
    $current_user = getCurrentUser()[0][0];
    if(getLikes($current_user, $goodplanID)==1){
        $sql = "DELETE FROM likes WHERE goodplanID='$goodplanID' AND userID='$current_user'";
        try {
            connexion()->query($sql);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    else
    {
        $sql = "INSERT INTO likes (goodplanID, userID) VALUES ('$goodplanID', '$current_user')";
        try {
            connexion()->query($sql);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

function supprimerCompte()
{
    $currentUserID = getCurrentUser()[0][0];
    $sql = "DELETE FROM users WHERE userID='$currentUserID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $sql = "DELETE FROM goodplans WHERE userID='$currentUserID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $sql = "DELETE FROM comments WHERE userID='$currentUserID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $sql = "DELETE FROM friends WHERE firstuserID='$currentUserID' OR seconduserID='$currentUserID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $sql = "DELETE FROM likes WHERE userID='$currentUserID'";
    try {
        connexion()->query($sql);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    logout();
    $_SESSION['success'] = "Votre compte a bien été supprimé.";
    viewSeconnecterPage();
}

function modifierCompte()
{
    $lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $city = $_POST['cities'];
    $media = null;
    if ($_FILES['media']['size'] != 0)
    {
        $media = $_FILES['media'];
    }

    $currentUserID = getCurrentUser()[0][0];
    
    $stmt = connexion()->prepare("SELECT * FROM users WHERE email=? AND userID!=$currentUserID");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    if ($user) {
        $_SESSION['error'] = "Cette addresse email existe déjà.";
        viewModifierComptePage();
    } else {
        if ($password != $confirmpassword)
        {
            $_SESSION['error'] = "Vos mots de passe ne correspondent pas.";
            viewModifierComptePage();
        }
        else
        {
            if ($media != null)
            {
                if ($media['error'] === UPLOAD_ERR_OK)
                {
                    $mediaID = addOneMedia($media['name']);
                    $sql = "UPDATE users SET lastname='$lastname', firstname='$firstname', email='$email', password='$hashed_password', cityID='$city', mediaID='$mediaID' WHERE userID=$currentUserID";
                    try {
                        connexion()->query($sql);
                    } catch (PDOException $e) {
                        print "Erreur !: " . $e->getMessage() . "<br/>";
                        die();
                    }
                    $_SESSION['success'] = "Vos informations ont bien été modifiées.";
                    viewModifierComptePage();
                }
                else
                {
                    $_SESSION['error'] = "Votre image de profil ne doit pas dépasser 2Mo.";
                    viewModifierComptePage();
                }
            }
            else
            {
                $sql = "UPDATE users SET lastname='$lastname', firstname='$firstname', email='$email', password='$hashed_password', cityID='$city' WHERE userID=$currentUserID";
                try {
                    connexion()->query($sql);
                } catch (PDOException $e) {
                    print "Erreur !: " . $e->getMessage() . "<br/>";
                    die();
                }
                $_SESSION['success'] = "Vos informations ont bien été modifiées.";
                viewModifierComptePage();
            }
        }
    }
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

    $mediaID = null;
    $media = $_FILES['media']['name'];
    if(!empty($media)){        
        $mediaID = addOneMedia($media);
    }
    
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
            if ($_FILES['media']['error'] === UPLOAD_ERR_OK)
            {
                $sql = "INSERT INTO users (lastname, firstname, email, password, cityID, mediaID) VALUES ('$lastname','$firstname','$email', '$hashed_password', '$city', '$mediaID')";
                try {
                    connexion()->query($sql);
                } catch (PDOException $e) {
                    print "Erreur !: " . $e->getMessage() . "<br/>";
                    die();
                }
                $_SESSION['success'] = "Votre compte a bien été créé.";
                viewSeconnecterPage();
            }
            else
            {
                $_SESSION['error'] = "Votre image de profil ne doit pas dépasser 2Mo.";
                viewSeconnecterPage();
            }
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
            viewHomePage(null, null);
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