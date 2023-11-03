<!-- 
  Author: Andrew Hopkins
  Title: htcgaddtocart.php
  Date: 09/05/20
  Note: Inserts value from basket form to database then it updates total and then updates stock
 -->




<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header('location:htcglogin.html');
    }
    
 






    require_once("connect.php");
    $db = connectToDB();

    $sql = "INSERT INTO htcgbasket
            VALUES (:img, :memberno, :productno, :productname, :price, :quantity, :total)"; 

    $query=$db->prepare($sql);
    $query->bindParam(":img", $_POST["txt_img"]);
    $query->bindParam(":memberno", $_SESSION['memberno']);  
    $query->bindParam(":productno", $_POST["txt_productno"]);
    $query->bindParam(":productname", $_POST["txt_productname"]);
    $query->bindParam(":price", $_POST["txt_price"]);
    $query->bindParam(":quantity", $_POST["sel_qty"]);
    $query->bindParam(":total", $_POST["txt_total"]);
    
    $query->execute();
    $db = null;

    require_once("connect.php");
    $db = connectToDB();

    $sql = "UPDATE htcgbasket
            SET total = price * quantity
            WHERE memberno = :memberno";

    $query=$db->prepare($sql);
    $query->bindParam(":memberno", $_SESSION['memberno']);
    $query->execute();
    $db = null;

    
   
    
    $db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
    $db = connectToDB();

    $sql = "UPDATE htcgproducts
            SET qtyinstock = qtyinstock - :quantity
            WHERE productno = :productno";
            
            $query=$db->prepare($sql);
            $query->bindParam(":productno", $_POST["txt_productno"]);
            $query->bindParam(":quantity", $_POST["sel_qty"]);
            $query->execute();
            $db = null;






    header("location:htcgviewcart.php");


?>