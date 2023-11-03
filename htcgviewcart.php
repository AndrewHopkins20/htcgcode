<!-- 
    Author: Andrew Hopkins
    Title: htcgviewcart.php
    Date: 09/05/20
    Note: Shows everything in the basket table where the member no is the users member no
 -->




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="htcgmain.css">
    <link rel="stylesheet" href="htcgmainmobile.css">
    <link rel="stylesheet" href="htcgmaindesktop.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hopkins' TCG</title>
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
</head>

<body>
    <h3>Your Cart</h3>



    <ul>
        <li><a href="htcgmainmenu.php">Main Menu</a></li>
        <li><a href="htcgproducts.php">Products</a></li>
        <li><a href="htcginformation.php">Information</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <section>
        <?php 


session_start();

if(!isset($_SESSION['username'])){
    header('location:htcglogin.html');
}


ini_set("display_warnings", 1);
ini_set("display_errors", 1);




$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT * FROM htcgbasket WHERE memberno = :memberno";
$query = $db->prepare($sql);
$query->bindParam(":memberno", $_SESSION['memberno']);  
$query->execute();
$db = null;

if ($query -> rowCount() > 0){


while($row = $query->fetch()) {

    echo '<div>';
    
    echo '<div style="width:250px;height:250px;overflow:hidden;margin-bottom:5px;">
                 <img src="' . $row["img"] . '" style="width:100%;" />
        </div>';

    echo  '<b style="display:inline-block;width:95px;">Product ID:</b>' . $row["productno"] . '<br />';
    echo '<hr />'         ;
    echo '<b style="display:inline-block;width:95px;">Name:</b>' .  $row["productname"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Price:</b>' . '£' .  $row["price"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Quantity:</b>' .  $row["quantity"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Total:</b>' . '£' .  $row["total"] . '<br />';
    echo '<hr />';      
    echo '<a href="htcgdeletefromcart.php?productno=' . $row["productno"] . '" onclick="return confirmDelete(' . $row["productno"] . ')">delete</a>';   
    echo '</div>';

    

}





?>

        <?php


$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT *
        FROM htcgmembers
        WHERE memberno = :memberno";

$query=$db->prepare($sql);
$query->bindParam(":memberno", $_SESSION['memberno']);  
$query->execute();
$db = null;

$record = $query->fetch();

?>


        <div>
            <form action="htcgorder.php" method="post">
                <input type="hidden" id="txt_memberno" name="txt_memberno"
                    value="<?php echo $_SESSION["memberno"] ?>" /><br />
                <input type="hidden" id="txt_forename" name="txt_forename"
                    value="<?php echo $record["forename"] ?>" /><br />
                <input type="hidden" id="txt_surname" name="txt_surname"
                    value="<?php echo $record["surname"] ?>" /><br />
                <input type="hidden" id="txt_street" name="txt_street" value="<?php echo $record["street"] ?>" /><br />
                <input type="hidden" id="txt_town" name="txt_town" value="<?php echo $record["town"] ?>" /><br />
                <input type="hidden" id="txt_postcode" name="txt_postcode"
                    value="<?php echo $record["postcode"] ?>" /><br />
                <input type="hidden" id="txt_email" name="txt_email" value="<?php echo $record["email"] ?>" /><br />
                <input type="hidden" id="sel_category" name="sel_category"
                    value="<?php echo $record["category"] ?>" /><br />

                <button>Purchase</button>
        </div>
        <section>

            <?php

}


else{

    echo "Basket Empty";

}

    
?>



</body>

</html>