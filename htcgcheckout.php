<!-- 
    Author: Andrew Hopkins
    Title: htcgcheckout.php
    Date: 09/05/20
    Note: Calculates Discounts and Displays Receipt


 -->
<!DOCTYPE html>
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



    <section>
        <?php


session_start();

if(!isset($_SESSION['username'])){
   header('location:htcglogin.html');
 }


$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT MAX(orderno), memberno, forename, surname, street, town, postcode, email, category
        FROM htcgorder
        WHERE memberno = :memberno";

$query=$db->prepare($sql);
$query->bindParam(":memberno", $_SESSION['memberno']);  
$query->execute();
$db = null;




while($row = $query->fetch()) {

    echo '<div>';

    echo  '<b style="display:inline-block;width:95px;">Order ID:</b>' . $row["MAX(orderno)"] . '<br />';
    echo '<hr />'         ;
    echo '<b style="display:inline-block;width:95px;">Member ID:</b>' .  $row["memberno"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Forename:</b>'  .  $row["forename"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Surname:</b>' .  $row["surname"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Street:</b>' . $row["street"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Town:</b>' . $row["town"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Postcode:</b>' . $row["postcode"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Email:</b>' . $row["email"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Category:</b>' . $row["category"] . '<br />';
    echo '<hr />';      
   
    echo '</div>';

    

}

$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT *
        FROM htcgbasket
        WHERE memberno = :memberno";

$query=$db->prepare($sql);
$query->bindParam(":memberno", $_SESSION['memberno']);  
$query->execute();
$db = null;

while($row = $query->fetch()) {

    echo '<div>';

    echo  '<b style="display:inline-block;width:95px;">Product ID:</b>' . $row["productno"] . '<br />';
    echo '<hr />'         ;
    echo '<b style="display:inline-block;width:95px;">Name:</b>' .  $row["productname"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Price:</b>'  . '£' .  $row["price"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Quantity:</b>' .  $row["quantity"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Total:</b>' . '£' . $row["total"] . '<br />';
    echo '<hr />'         ;
    echo '</div>';
    

}


            

$db = new PDO("mysql:host=comp-server.uhi.ac.uk;dbname=OR13024618", "OR13024618", "13024618");
$sql = "SELECT SUM(total)
        FROM htcgbasket
        WHERE memberno = :memberno";

$query=$db->prepare($sql);
$query->bindParam(":memberno", $_SESSION['memberno']);  
$query->execute();
$db = null;



while($row = $query->fetch()) {

    if($row["category"] = "gold"){

        $discount = $row["SUM(total)"] /100 * 25;
        $FinalTotal =$row["SUM(total)"] - $discount;

} elseif($row["category"] = "silver") {

    $discount = $row["SUM(total)"] /100 * 15;
    $FinalTotal = $row["SUM(total)"] - $discount;


}else{
    $discount = 0;
    $FinalTotal = $row["SUM(total)"];
}



    echo '<div>';
    echo  '<b style="display:inline-block;width:95px;">Grand Total:</b>' . '£' . $row["SUM(total)"] . '<br />';
    echo  '<b style="display:inline-block;width:95px;">Discount:</b>' . '£' . $discount . '<br />';
    echo '<hr />'         ;
    echo  '<b style="display:inline-block;width:95px;">Final Total:</b>' . '£' . $FinalTotal . '<br />';
    echo '<hr />'         ;
    echo '<a href="htcgmainmenu.php">Return To Menu</a> ';   
    echo '</div>';


}

?>
    </section>

</body>