<!-- 
  Author: Andrew Hopkins
  Title: htcgmainmenu.php
  Date: 09/05/20
  Note: Main menu navbar contains options of where to go next
 -->


<meta name="mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="icon" sizes="128x128" href="pokeball.png" />
<link rel="icon" sizes="192x192" href="pokeball.png" />
<link rel="apple-touch-icon" sizes="128x128" href="pokeball.png" />
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="pokeball.png" />

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




<head>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://comp-server.uhi.ac.uk/~08015801/Webpages/TheCodeNews/jquery.touchSwipe.js
"></script>



 
  <script>
  
    </script>
    
</head>

<body>

<header>Hopkin's TCG</header>
  

  <ul>
    <li><a href="htcgmainmenu.php">Main Menu</a></li>
    <li><a href="htcgproducts.php">Products</a></li>
    <li><a href="htcginformation.php">Information</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>

 

  <div class="centered">
    <div class="text">
      <h1>About us</h1>
      <p>Website created by Andrew Hopkins</br>
        Designed by Andrew Hopkins</br>
        Images Trademarked by The Pokemon Company</br>
        Hopkins' TCG (Which stands for Hopkins' trading card games)
        Specialise in trading cards specifically Pokemon trading cards.
      </p>
    </div>
  </div>
</body>

</html>