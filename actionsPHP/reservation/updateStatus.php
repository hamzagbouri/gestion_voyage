<?php
include("../../database/db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['status_reservation'])){
    $newStatus  = $_POST['status_reservation'];
    $id_reservation = $_POST['id_reservation'];
    $q = "UPDATE reservation set `status` = '$newStatus' where `id_reservation` = '$id_reservation'";
    $resultat = $connection->query($q);
    if($resultat){
        $_SESSION['succe'] = "Status Updated";
    }
    else
    {
        $_SESSION['error'] = "Couldn't update status";
        
    }
    header("Location: /Gestion Voyage/components/reservations.php");

}
   
?>