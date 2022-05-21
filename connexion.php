<?php

function connexion()
{
    $user = "root";
    $pass = "";

    try {
        $dbh = new PDO("mysql:host=localhost;dbname=qg", $user, $pass);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $dbh;
}