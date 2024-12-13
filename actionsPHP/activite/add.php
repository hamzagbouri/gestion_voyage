<?php
include("../../database/db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    $titre = trim(htmlspecialchars($_POST['titre-input']));
    $description = trim(htmlspecialchars($_POST['description-input']));
    $prix = trim(htmlspecialchars($_POST['prix-input']));
    $places = trim(htmlspecialchars($_POST['places-input']));
    $date_debut = trim(htmlspecialchars($_POST['date-debut-input']));
    $date_fin = trim(htmlspecialchars($_POST['date-fin-input']));


    if(empty($titre )|| empty($description) || empty($prix) || empty($places) || empty($date_debut) || empty($date_fin))
    {
        $_SESSION['error'] = "Couldn't add activite";
        exit();
    }
    $addClientQuery = "INSERT INTO `activite` (`titre`,`description`,`prix`,`date_debut`,`date_fin`,`places_disponibles`)
                        VALUES ('$titre','$description','$prix','$date_debut','$date_fin','$places')";
    $res = $connection -> query($addClientQuery);
    if(!$res){
        $_SESSION['error'] = "Couldn't add activite";
        exit();
    }
    $_SESSION['succe'] = "Activite Addded!";
    header("Location: /Gestion Voyage/components/activite.php");



}
else {
    header("Location: /Gestion Voyage/index.php");

}
?>