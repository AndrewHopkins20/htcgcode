<!-- 
Author: Andrew Hopkins
Title: htcgorder.php
Date: 09/05/20
Note: Inserts into order table
 -->




<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('location:htcglogin.html');
    }
    
    require_once("connect.php");
    $db = connectToDB();

    $sql = "INSERT INTO htcgorder (memberno, forename, surname, street, town, postcode, email, category)
            VALUES (:memberno, :forename, :surname, :street, :town, :postcode, :email, :category)"; 

    $query=$db->prepare($sql);
    $query->bindParam(":memberno", $_SESSION['memberno']);  
    $query->bindParam(":forename", $_POST["txt_forename"]);
    $query->bindParam(":surname", $_POST["txt_surname"]);
    $query->bindParam(":street", $_POST["txt_street"]);
    $query->bindParam(":town", $_POST["txt_town"]);
    $query->bindParam(":postcode", $_POST["txt_postcode"]);
    $query->bindParam(":email", $_POST["txt_email"]);
    $query->bindParam(":category", $_POST["sel_category"]);
    $query->execute();
    $db = null;

    require_once("connect.php");
    $db = connectToDB();

    header("location:htcgcheckout.php");


?>