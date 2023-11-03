<!-- 
    Author: Andrew Hopkins
    Title: validate.php
    Date: 09/05/20
    Note: checks if login details are correct and if it is then it sends them to the main menu
 -->







<?php

    session_start();

    ini_set("display_warnings",1);
    ini_set("display_errors",1);

    $username = $_POST["txt_forename"];
    $password = $_POST["txt_surname"];

    $record = "";

    function validateUser(){
        require_once('connect.php');
        $db = connectToDB();

        $sql = "SELECT memberno, forename FROM htcgmembers
                WHERE forename = :forename 
                AND surname = :surname";

        $query = $db->prepare($sql);
        $query->bindParam(':forename', $_POST['txt_forename']);
        $query->bindParam(':surname', $_POST['txt_surname']);        
        $query->execute();

        if($query -> rowCount() > 0) {
            $record = $query->fetch();
            $_SESSION['username'] = $record['forename'];
            $_SESSION['memberno'] = $record['memberno'];       
                 
            return true;
        }
        else    
            return false;    
    }


    if(validateUser()){

        header("location:htcgmainmenu.php");
    } else {
        header("location:htcglogin.html");
    }

?>