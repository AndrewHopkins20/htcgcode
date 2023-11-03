<!-- 
Author: Andrew Hopkins
Title: insertmember.php
Date: 09/05/20
Note: Inserts into members table
 -->





<?php


 ini_set("display_warnings", 1);
 ini_set("display_errors", 1);
require_once("connect.php");
$db = connectToDB();

$sql = "INSERT INTO htcgmembers (forename, surname, street, town, postcode, email, category)
        VALUES (:forename, :surname, :street, :town, :postcode, :email, :category)";

        $query =$db->prepare($sql);
        $query->bindParam(":forename", $_POST["txt_forename"]);
        $query->bindParam(":surname", $_POST["txt_surname"]);
        $query->bindParam(":street", $_POST["txt_street"]);
        $query->bindParam(":town", $_POST["txt_town"]);
        $query->bindParam(":postcode", $_POST["txt_postcode"]);
        $query->bindParam(":category", $_POST["sel_category"]);
        $query->bindParam(":email", $_POST["txt_email"]);
        
        $query->execute();
        $db = null;

        header("location:membershipconfirmation.php");
?>