<!-- 
  Author: Andrew Hopkins
  Title: htcginformation.php
  Date: 09/05/20
  Note: Information page for my website


 -->



<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('location:htcglogin.html');
    }

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="htcgmain.css">
<link rel="stylesheet" href="htcgmainmobile.css">
<link rel="stylesheet" href="htcgmaindesktop.css">

<head>
  <header>Hopkin's TCG</header>
  <style>
    #div1 {
      width: 300px;
      height: 900px;
      line-height: 300px;
      text-align: right;
      vertical-align: middle;
    }

    img {
      vertical-align: middle;
      width: 300px;
    }

    .centered-left {
      position: absolute;
      top: 50%;
      left: 25%;
      transform: translate(-50%, -50%);
      text-align: center;

    }

    .centered-right {
      position: absolute;
      top: 50%;
      right: 5%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .text {
      background-color: lightgrey;
      width: 300px;
      border: 15px solid #3F548B;
      padding: 50px;
      margin: 20px;
      right: 25%;
    }
  </style>
</head>

<body>

  <ul>
    <li><a href="htcgmainmenu.php">Main Menu</a></li>
    <li><a href="htcgproducts.php">Products</a></li>
    <li><a href="htcginformation.php">Information</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

  <div class="centered-left">
    <img src="Pikachu.png" alt="Pikachu">
  </div>

  <div class="centered-right">
    <div class="text">
      <h1>About Pokemon Cards</h1>
      <p>Pokemon Cards each are classified by a type, this Pikachu is classed as an electric type and this is symbolised
        by the lightning bolt in the top right corner.</br>
        </br>
        Pokemon cards also have a rarity which is symbolised by the black symbol in the bottom right corner. a black
        circle means a card is a common. a black diamond means uncommon and a black star means rare.</br>
        </br>
        Each card also belongs to a set which is the bundle they are released in. For example this Pikachu was released
        along side 101 other cards in the Base Set.
      </p>
    </div>
</body>

</html>