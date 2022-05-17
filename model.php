<?php
require_once("connexion.php");
if (!isset($_SESSION)) {
    session_start();
  }
  
function getCurrentUser()
{
    if ($_SESSION)
    {
        try {
            $currentUserID = $_SESSION['currentUserID'];
            $data = connexion()->query("SELECT * FROM users WHERE userID=$currentUserID")->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $data;
    }
    else
    {
        return NULL;
    }
}

function getAllCities()
{
    try {
        $data = connexion()->query('SELECT * FROM cities')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlans(){
    try {
        $data = connexion()->query('SELECT * FROM goodplans')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getGoodPlansFromCategory($n){
    try {
        $data = connexion()->query('SELECT * FROM goodplans WHERE categoryID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneGoodPlan($n){
    try {
        $data = connexion()->query('SELECT * FROM goodplans WHERE goodplanID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneCity($n){
    try {
        $data = connexion()->query('SELECT * FROM cities WHERE cityID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneUser($n){
    try {
        $data = connexion()->query('SELECT * FROM users WHERE userID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneMedia($n){
    try {
        $data = connexion()->query('SELECT * FROM medias WHERE mediaID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllCategories(){
    try {
        $data = connexion()->query('SELECT * FROM categories')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllSubCategories($n){
    try {
        $data = connexion()->query('SELECT categories.* FROM `categories`, `subcategories` WHERE subcategories.subcategoryID = categories.categoryID AND subcategories.categoryID = 1')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getCategoryOfSubCategory($n){
    try {
        $data = connexion()->query('SELECT categories.* FROM `categories`, `subcategories` WHERE subcategories.subcategoryID = '.$n.' AND categories.categoryID = subcategories.categoryID')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOnlyCategories(){
    try {
        $data = connexion()->query('SELECT categories.* FROM `categories`, `subcategories` WHERE subcategories.subcategoryID != categories.categoryID')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneCategory($n){
    try {
        $data = connexion()->query('SELECT * FROM categories WHERE categoryID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function addOneMedia($t){
    $target_dir = "./views/usersData/";
    $target_bdd_dir = "usersData/";
    $target_file = null;
    $target_bdd_file = null;
    $ext = pathinfo($t, PATHINFO_EXTENSION);

    try {
        $maxMedia = connexion()->query('SELECT MAX(mediaID) FROM medias')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    if (empty($maxMedia[0][0]))
    {
        $target_file = $target_dir."picture0".".$ext";
        $target_bdd_file = $target_bdd_dir."picture0".".$ext";
    }
    else
    {
        $target_file = $target_dir."picture".$maxMedia[0][0].".$ext";
        $target_bdd_file = $target_bdd_dir."picture".$maxMedia[0][0].".$ext";
    }

    $uploadOk=1;

    $data = [
        'title' => $t,
        'url' => $target_bdd_file,
    ];
    $title = $data['title'];
    $url = $data['url'];
    $sql = "INSERT INTO medias (name, url) VALUES ('$title','$url')";

    try {
        $stmt= connexion()->prepare($sql);
        $stmt->execute($data);
        if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars($t). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    if (empty($maxMedia[0][0]))
    {
        return 1;
    }
    return $maxMedia[0][0];
}

function addOneGoodPlan($t, $content, $sD, $eD, $cat, $city, $user, $mediaID){
    if(!empty($city)){
        if(!empty($mediaID)){
            $data = [
                'title' => $t,
                'content' => $content,
                'sD' => $sD,
                'eD' => $eD,
                'category' => $cat,
                'city' => $city,
                'user' => $user,
                'media' => $mediaID,
            ];
            $sql = "INSERT INTO goodplans (title, textContent, startingDate, endingDate, categoryID, cityID, userID, mediaID) VALUES (:title,:content, :sD, :eD, :category, :city, :user, :media)";
        } else {
            $data = [
                'title' => $t,
                'content' => $content,
                'sD' => $sD,
                'eD' => $eD,
                'category' => $cat,
                'city' => $city,
                'user' => $user,
            ];
            $sql = "INSERT INTO goodplans (title, textContent, startingDate, endingDate, categoryID, cityID, userID) VALUES (:title,:content, :sD, :eD, :category, :city, :user)";
        }
    } else {
        if(!empty($mediaID)){
            $data = [
                'title' => $t,
                'content' => $content,
                'sD' => $sD,
                'eD' => $eD,
                'category' => $cat,
                'user' => $user,
                'media' => $mediaID,
            ];
            $sql = "INSERT INTO goodplans (title, textContent, startingDate, endingDate, categoryID, userID, mediaID) VALUES (:title,:content, :sD, :eD, :category, :user, :media)";
        } else {
            $data = [
                'title' => $t,
                'content' => $content,
                'sD' => $sD,
                'eD' => $eD,
                'category' => $cat,
                'user' => $user,
            ];
            $sql = "INSERT INTO goodplans (title, textContent, startingDate, endingDate, categoryID, userID) VALUES (:title,:content, :sD, :eD, :category, :user)";
        }
    }

    try {
        $stmt= connexion()->prepare($sql);
        $stmt->execute($data);
        echo "Post ajouté.<br/>
        <a href='accueil'>Accueil</a>";
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}