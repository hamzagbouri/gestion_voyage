<?php
include("../../database/db.php");
session_start();
if (isset($_GET['id']))
{
    $id = trim(htmlspecialchars(htmlentities($_GET['id'])));
    try {
        
            $connection->query("DELETE FROM `reservation` where `id_reservation` = $id");
            $_SESSION['succe'] = "Reservation DELETED!";


        
        header("Location: /Gestion Voyage/components/reservations.php");

    }catch (Exception $e)
    {
        $_SESSION['error'] = "Couldn't delete reservation". $e -> getmessage();
    }
}
else {
    header("Location: /Gestion Voyage/index.php");

}

?>