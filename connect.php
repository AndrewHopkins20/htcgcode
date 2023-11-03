<!-- 
    Author: Andrew Hopkins
    Title: connect.php
    Date: 09/05/20
    Note: connects to database when included in code
 -->




<?php

function connecttoDB(){
        $db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
        return $db;
    }

?>