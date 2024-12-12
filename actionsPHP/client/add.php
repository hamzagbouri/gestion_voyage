<?php
include("../../database/db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    $nom = trim(htmlspecialchars($_POST['name-input']));
    $email = trim(htmlspecialchars($_POST['email-input']));
    $telephone = trim(htmlspecialchars($_POST['phone-input']));
    $adresse = trim(htmlspecialchars($_POST['adresse-input']));
    $date_naissance = trim(htmlspecialchars($_POST['date-input']));

    if(empty($nom )|| empty($email) || empty($telephone) || empty($date_naissance) || empty($adresse))
    {
        echo "<script> alert('Fill all inputs') </script>";
        exit();
    }
    $addClientQuery = "INSERT INTO `client` (`nom`,`email`,`telephone`,`adresse`,`date_naissance`) VALUES ('$nom','$email','$telephone','$adresse','$date_naissance')";
    $res = $connection -> query($addClientQuery);
    if(!$res){
        echo "<script> alert('failed to add client') </script>";
        exit();
    }
    $_SESSION['succe'] = "Client ADDED!";

    header("Location: /Gestion Voyage/components/clients.php");



}
?>