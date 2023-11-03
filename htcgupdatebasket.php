<?php


session_start();

    require_once("connect.php");
    $db = connectToDB();


    $sql = "UPDATE htcgbasket
            SET total = quantity * price
            WHERE memberno = :memberno";


$query=$db->prepare($sql);
$query->bindParam(":memberno", $_GET["memberno"]);

$query->execute();
    $db = null;

    
    header("location:htcgviewbasket.php");









    ?>