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
        $data = connexion()->query('SELECT userID, lastname, firstname FROM users WHERE userID = '.$n)->fetchAll();
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

function addOneGoodPlan($t, $content, $sD, $eD, $cat, $city, $user){

    

    if(!empty($city)){
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