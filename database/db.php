<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "voyage";

$connection = new mysqli($host,$user,$password,$dbname);

if(!$connection){
    echo 'Not connected';
    exit();
} 


?>