<?php
include("../../database/db.php");
session_start();
if (isset($_GET['id']))
{
    $id = trim(htmlspecialchars(htmlentities($_GET['id'])));
    try {
        $resl =  $connection->query("SELECT * FROM client INNER JOIN reservation on reservation.id_client = $id");
        if($resl->num_rows >0){
            $_SESSION['error'] = "Couldn't delete client, delete it's reservation first";
        } else {
            $_SESSION['succe'] = "Client DELETED!";

            $connection->query("DELETE FROM `client` where `id_client` = $id");

        }
        header("Location: /Gestion Voyage/index.php");

    }catch (Exception $e)
    {
        echo $e -> getmessage();
    }
}
else {
    header("Location: /Gestion Voyage/index.php");

}

?>