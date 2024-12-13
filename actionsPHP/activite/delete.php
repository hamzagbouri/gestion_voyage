<?php
include("../../database/db.php");
session_start();
if (isset($_GET['id']))
{
    $id = trim(htmlspecialchars(htmlentities($_GET['id'])));
    try {
        $resl =  $connection->query("SELECT * FROM activite INNER JOIN reservation on reservation.id_activite = $id");
        if($resl->num_rows >0){
            $_SESSION['error'] = "Couldn't delete Activty, delete The reservation first";
        } else {
            $connection->query("DELETE FROM `activite` where `id_activite` = $id");
            $_SESSION['succe'] = "Activity DELETED!";


        }
        header("Location: /Gestion Voyage/components/activite.php");

    }catch (Exception $e)
    {
        echo $e -> getmessage();
    }
}
else {
    header("Location: /Gestion Voyage/index.php");

}

?>