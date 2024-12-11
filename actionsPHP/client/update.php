<?php
include("../../database/db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['edit-submit']))
    {

    $id = $_POST['id-edit'];
    $name = trim($connection->real_escape_string($_POST['name-input-edit']));
    $dateNaissance = $_POST['date-input-edit'];
    $adresse = trim($connection->real_escape_string($_POST['adresse-input-edit']));
    $email = trim($connection->real_escape_string($_POST['email-input-edit']));
    $phone = trim($connection->real_escape_string($_POST['phone-input-edit']));
    if(empty($name) || empty($dateNaissance) || empty($adresse) || empty($phone) ){
        $_SESSION['error'] = "Fill All inputs";
        header("Location: /Gestion Voyage/components/clients.php");
    
    } else {
    $resul = $connection->query("UPDATE `client` SET `nom`=$name,`date_naissance`=$dateNaissance,`adresse`=$adresse,`telephone`=$phone, `email`= $email WHERE `id_client` =$id");
    var_dump($resul);
        if ($resul) {
            $_SESSION['succe'] = "Client Modified";
            echo 'Client updated Seccusfully';
        } else {
            $_SESSION['error'] = "Couldn't Modifie Client";

            echo  "Error: " ;
        }
    
    $connection->close();
    // header("Location: /Gestion Voyage/components/clients.php");

    }
}
else {
    header("Location: /Gestion Voyage/index.php");

}

?>