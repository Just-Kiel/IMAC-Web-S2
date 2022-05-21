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
            print "Erreur user !: " . $e->getMessage() . "<br/>";
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
        print "Erreur cities !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlans(){
    try {
        $data = connexion()->query('SELECT * FROM goodplans')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur goodplans !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlansCityOrdered(){
    try {
        $data = connexion()->query('SELECT DISTINCT goodplans.* FROM `goodplans` ORDER BY goodplans.cityID')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur city ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlansDateOrdered(){
    try {
        $data = connexion()->query('SELECT DISTINCT goodplans.* FROM `goodplans` ORDER BY goodplans.startingDate DESC')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur date ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlansLikeOrdered(){
    try {
        $data1 = connexion()->query('SELECT goodplans.* FROM goodplans, likes WHERE goodplans.goodplanID = likes.goodplanID GROUP BY likes.goodplanID 
        ORDER BY COUNT(likes.likeID) DESC')->fetchAll();

        $data2 = connexion()->query('SELECT DISTINCT goodplans.* FROM goodplans, likes WHERE goodplans.goodplanID NOT IN (SELECT likes.goodplanID FROM likes)')->fetchAll();

        $result = array_merge($data1, $data2);
    } catch (PDOException $e) {
        print "Erreur like ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $result;
}

function getGoodPlansFromCategory($n){
    try {
        $data = connexion()->query('SELECT DISTINCT * FROM goodplans WHERE goodplans.categoryID IN(SELECT subcategories.subcategoryID FROM subcategories WHERE subcategories.categoryID ='.$n.') OR goodplans.categoryID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur from cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlansCityOrderedFromCategory($n){
    try {
        $data = connexion()->query('SELECT DISTINCT * FROM goodplans WHERE goodplans.categoryID IN(SELECT subcategories.subcategoryID FROM subcategories WHERE subcategories.categoryID ='.$n.') OR goodplans.categoryID = '.$n.'  ORDER BY goodplans.cityID')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur city ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllGoodPlansDateOrderedFromCategory($n){
    try {
        $data = connexion()->query('SELECT DISTINCT * FROM goodplans WHERE goodplans.categoryID IN(SELECT subcategories.subcategoryID FROM subcategories WHERE subcategories.categoryID ='.$n.') OR goodplans.categoryID = '.$n.' ORDER BY goodplans.startingDate DESC')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur date ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

// TODO maybe fix à faire
function getAllGoodPlansLikeOrderedFromCategory($n){
    try {
        $data1 = connexion()->query('SELECT goodplans.* FROM goodplans, likes WHERE goodplans.goodplanID = likes.goodplanID AND goodplans.categoryID IN(SELECT subcategories.subcategoryID FROM subcategories WHERE subcategories.categoryID ='.$n.') OR goodplans.categoryID = '.$n.' GROUP BY likes.goodplanID 
        ORDER BY COUNT(likes.likeID) DESC')->fetchAll();

        $data2 = connexion()->query('SELECT DISTINCT goodplans.* FROM goodplans, likes WHERE goodplans.goodplanID NOT IN (SELECT likes.goodplanID FROM likes) AND goodplans.categoryID IN(SELECT subcategories.subcategoryID FROM subcategories WHERE subcategories.categoryID ='.$n.') OR goodplans.categoryID = '.$n)->fetchAll();

        $result = array_merge($data1, $data2);
    } catch (PDOException $e) {
        print "Erreur like ordered !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $result;
}

function getGoodPlansByUser($n){
    try {
        $data = connexion()->query('SELECT DISTINCT * FROM goodplans WHERE goodplans.userID ='.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur from cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneGoodPlan($n){
    try {
        $data = connexion()->query('SELECT * FROM goodplans WHERE goodplanID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one gp !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneCity($n){
    try {
        $data = connexion()->query('SELECT * FROM cities WHERE cityID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one city !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneUser($n){
    try {
        $data = connexion()->query('SELECT * FROM users WHERE userID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one user !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneMedia($n){
    try {
        $data = connexion()->query('SELECT * FROM medias WHERE mediaID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one media !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllCategories(){
    try {
        $data = connexion()->query('SELECT * FROM categories')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur all cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getAllSubCategories($n){
    try {
        $data = connexion()->query('SELECT categories.* FROM `categories`, `subcategories` WHERE subcategories.subcategoryID = categories.categoryID AND subcategories.categoryID ='.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur sub cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getCategoryOfSubCategory($n){
    try {
        $data = connexion()->query('SELECT categories.* FROM `categories`, `subcategories` WHERE subcategories.subcategoryID = '.$n.' AND categories.categoryID = subcategories.categoryID')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur cat of subcat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOnlyCategories(){
    try {
        $data = connexion()->query('SELECT DISTINCT categories.* FROM `categories`, `subcategories` WHERE categories.categoryID NOT IN (SELECT subcategoryID FROM subcategories)')->fetchAll();
    } catch (PDOException $e) {
        print "Erreur only cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getOneCategory($n){
    try {
        $data = connexion()->query('SELECT * FROM categories WHERE categoryID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one cat !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getLikes($like, $goodplanID){
    $stmt = connexion()->prepare("SELECT * FROM likes WHERE userID=? AND goodplanID=?");
    $stmt->execute(array($like, $goodplanID)); 
    $user = $stmt->fetch();
    if ($user) {
        return 1;
    } else {
        return 0;
    }
}

function getAllLikesforOneGoodplan($n){
    try {
        $data = connexion()->query('SELECT * FROM likes WHERE goodplanID='.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur one cat !: " . $e->getMessage() . "<br/>";
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
        print "Erreur media !: " . $e->getMessage() . "<br/>";
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
    $sql = "INSERT INTO medias(name, url) VALUES ('$title','$url')";

    try {
        $stmt= connexion()->prepare($sql);
        $stmt->execute();
        if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars($t). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } catch (PDOException $e) {
        print "Erreur media upload !: " . $e->getMessage() . "<br/>";
        die();
    }

    if (empty($maxMedia[0][0]))
    {
        return 1;
    }
    return $maxMedia[0][0]+1;
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
    } catch (PDOException $e) {
        print "Erreur upload gp !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function addOneComment($user, $text, $date, $goodplanID){
    $data = [
        'userID' => $user,
        'text' => $text,
        'date' => $date,
        'goodplanID' => $goodplanID
    ];
    $sql = "INSERT INTO comments (userID, text, date, goodplanID) VALUES (:userID,:text, :date, :goodplanID)";

    try {
        $stmt= connexion()->prepare($sql);
        $stmt->execute($data);
        echo "Commentaire ajouté";
    } catch (PDOException $e) {
        print "Erreur comment !: " . $e->getMessage() . "<br/>";
        die();
    }
}

function getAllCommentsOnOneGoodPlan($n){
    try {
        $data = connexion()->query('SELECT * FROM `comments` WHERE goodplanID = '.$n)->fetchAll();
    } catch (PDOException $e) {
        print "Erreur comments !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $data;
}

function getSearchGoodPlans($search){
    try{
            $recherche = htmlspecialchars($search);
            $resultats = connexion()->query('SELECT * FROM goodplans WHERE CONCAT(title,textContent) LIKE "%'.$recherche.'%" ORDER BY goodplanID DESC')->fetchAll();
      
    }catch (PDOException $e) {
        print "Erreur comments !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $resultats;
}