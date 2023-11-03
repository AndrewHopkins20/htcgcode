<!-- 
    Author: Andrew Hopkins
    Title: htcgdeletefromcart.php
    Date: 09/05/20
    Note: deletes product from basket
 -->




<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('location:htcglogin.html');
    }

    require_once("connect.php");
    $db = connectToDB();

    $sql = "DELETE FROM htcgbasket
            WHERE productno = :productno";

    $query=$db->prepare($sql);

    $query->bindParam(":productno", $_GET["productno"]);

    $query->execute();
    $db = null;

    header("location:htcgviewcart.php");


?>