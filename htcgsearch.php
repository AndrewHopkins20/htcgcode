
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="htcgmain.css">
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

section > div > img {
    width: 70%;
}

section > div{
    width:250px;
    border: 2px solid #3F548B;
    margin:10px;
    background-color: lightgrey;
    text-align: left;
    padding: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    font-family: 'Lato', sans-serif;
}

    </style>
</head>
<body>
<ul>
  <li><a href="htcgmainmenu.php">Main Menu</a></li>
  <li><a href="htcgproducts.php">Products</a></li>
  <li><a href="htcginformation.php">Information</a></li>
  <li><a href="htcgcartindex.php">Add To Basket</a></li>
  <li><a href="htcgviewcart.php">Go To Basket</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
 <div style="text-align:center;">
         <form action="htcgproducts.php" method="get">
                <input type="text" id="productname" name="productname" placeholder="Search Product Name." required /><br />
               <br />
               <button>Search</button>
          </form>
 </div>

<section>
<?php

require_once("connect.php");
$db = connectToDB();

$sql = "SELECT *
        FROM htcgproducts
        WHERE productname = :productname";

$query=$db->prepare($sql);
$query->bindParam(':productname', $_GET["productname"]);
$query->execute();
$db = null;

$record = $query->fetch();

    echo '<div>';
    echo '<div style="width:250px;height:250px;overflow:hidden;margin-bottom:5px;">
            <img src="' . $row["img"] . '" style="width:100%;" />
          </div>';
    echo  $row["productno"] . ' ' . $row["productname"] . '<br />';
    echo '<hr />'         ;
    echo '<b style="display:inline-block;width:95px;">Description:</b>' .  $row["productabout"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Set:</b>' .  $row["productset"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Type:</b>' .  $row["prodtype"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Rarity:</b>' .  $row["productrarity"] . '<br />';
    echo '<b style="display:inline-block;width:95px;">Price:</b>' . '£' . $row["price"]  . '<br />';   
    echo '<b style="display:inline-block;width:95px;">In Stock:</b>' .  $row["qtyinstock"] . '<br />';  
    echo '<hr />'         ;
    echo '</div>';

} 
?>
<section>

</body>
</html>