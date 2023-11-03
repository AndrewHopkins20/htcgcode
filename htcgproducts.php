<!-- 
    Author: Andrew Hopkins
    Title: htcgproducts
    Date: 09/05/20
    Note: Displays all products from the product table, allows user to add them to there basket
 -->




<?php

    session_start();

   if(!isset($_SESSION['username'])){
      header('location:htcglogin.html');
    }

?>

<!DOCTYPE html>
<html>
<meta name="mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="icon" sizes="128x128" href="pokeball.png" />
<link rel="icon" sizes="192x192" href="pokeball.png" />
<link rel="apple-touch-icon" sizes="128x128" href="pokeball.png" />
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="pokeball.png" />
<link rel="stylesheet" href="htcgmain.css">
<link rel="stylesheet" href="htcgmainmobile.css">
<link rel="stylesheet" href="htcgmaindesktop.css">
<style>
    main {
        position: relative;
        font-family: 'Lato', sans-serif;
        min-height: 500px;
        text-align: center;
    }

    section {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    section>div>img {
        width: 70%;
    }

    section>div {
        width: 250px;
        border: 2px solid #3F548B;
        margin: 10px;
        background-color: lightgrey;
        text-align: left;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        font-family: 'Lato', sans-serif;
    }
</style>

<head>
    <header>Hopkin's TCG</header>
    <style>

    </style>
</head>

<body>
    <ul>
        <li><a href="htcgmainmenu.php">Main Menu</a></li>
        <li><a href="htcgproducts.php">Products</a></li>
        <li><a href="htcginformation.php">Information</a></li>
        <li><a href="htcgviewcart.php">Go To Basket</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>


    <section>
        <?php
ini_set("display_warnings", 1);
ini_set("display_errors", 1);

$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT * FROM htcgproducts ORDER BY productno + 0 ASC";

$query = $db->prepare($sql);
$query->execute();
$db = null;

while($row = $query->fetch()) {

    echo '<div>';
    echo '<div style="width:250px;height:250px;overflow:hidden;margin-bottom:5px;">
            <img src="' . $row["img"] . '" style="width:100%;" />
          </div>';
    echo  '<b style="display:inline-block;width:95px;">Product ID:</b>' . $row["productno"] . '<br />';
    echo '<hr />'         ;
    echo '<b style="display:inline-block;width:95px;">Name:</b>' .  $row["productname"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Description:</b>' .  $row["productabout"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Set:</b>' .  $row["productset"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Type:</b>' .  $row["prodtype"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Rarity:</b>' .  $row["productrarity"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Price:</b>' . '£' . $row["price"]  . '<br />';   
    echo '<b style="display:inline-block;width:95px;">In Stock:</b>' .  $row["qtyinstock"] . '<br />';  
    echo '<hr />';      
    echo '<a href="htcgcartindex.php?productno=' . $row["productno"] . '">Add to Cart</a> ';   
    echo '</div>';

} 
?>
        <section>

</body>

</html>