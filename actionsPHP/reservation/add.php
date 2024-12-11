<?php
include("../../database/db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    $id_client = trim(htmlspecialchars($_POST['client-input']));
    $id_activite = trim(htmlspecialchars($_POST['activite-input']));
    $status = trim(htmlspecialchars($_POST['status-input']));
    $date_reservation = date('Y-m-d H:i:s');

    if(empty($id_client )|| empty($id_activite) || empty($status) )
    {
        echo "<script> alert('Fill all inputs') </script>";
        exit();
    }
    $addReservationQuery = "INSERT INTO `reservation` (`id_client`,`id_activite`,`status`,`date_reservation`) VALUES ('$id_client','$id_activite','$status','$date_reservation')";
    $res = $connection -> query($addReservationQuery);
    if(!$res){
        $_SESSION['error'] = "Couldn't add reservation";
        exit();
    }
    $_SESSION['succe'] = "Reservation added";
    header("Location: /Gestion Voyage/components/reservations.php");



}
?>