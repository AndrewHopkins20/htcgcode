<!-- 
    Author: Andrew Hopkins
    Title: htcgcartindex.php
    Date: 09/05/20
    Note: user selects quantity of product they want
 -->



<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:htcglogin.html');
}
 
?>
<!DOCTYPE html>
<?php


$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT *
        FROM htcgproducts
        WHERE productno = :productno";

$query=$db->prepare($sql);
$query->bindParam(':productno', $_GET["productno"]);
$query->execute();
$db = null;

$record = $query->fetch();

?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hopkins' TCG</title>
    <link href="htcgmain.css" rel="stylesheet" type="text/css" />
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
        <li><a href="htcgcartindex.php">Add To Basket</a></li>
        <li><a href="htcgviewcart.php">Go To Basket</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <section>
        <div>
            <form action="htcgaddtocart.php" method="post">
                Product Number: <?php echo $record["productno"] ?>
                <input type="hidden" id="txt_img" name="txt_img" value="<?php echo $record["img"] ?>" /><br />
                <input type="hidden" id="txt_memberno" name="txt_memberno"
                    value="<?php echo $_SESSION["memberno"] ?>" /><br />
                <input type="hidden" id="txt_productno" name="txt_productno"
                    value="<?php echo $record["productno"] ?>" /><br />
                <input type="hidden" id="txt_productname" name="txt_productname"
                    value="<?php echo $record["productname"] ?>" /><br />
                <input type="hidden" id="txt_price" name="txt_price" value="<?php echo $record["price"] ?>" /><br />
                <input type="hidden" id="txt_total" name="txt_total" value="<?php echo $record["total"] ?>" /><br />
                <select id="sel_qty" name="sel_qty" required>
                    <option value="">Qty</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select><br />
                <button>Add to Cart</button>

            </form>
        </div>
    </section>
</body>

</html>