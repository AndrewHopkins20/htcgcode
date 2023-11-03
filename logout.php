<!-- 
    Author: Andrew Hopkins
    Title: logout.php
    Date: 09/05/20
    Note: Logs user out and returns them to the homepage
 -->




<?php

    session_start();
    
    unset($_SESSION['username']);

    header('location:htcghome.html');

?>