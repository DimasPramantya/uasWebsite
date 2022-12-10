<?php
session_start();
include 'connection.php';
class Checkout {
    public $productId;
    public $productQuantity;
    public $productName;
    public $productPrice = 0;
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" >
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php
            $index = 0;
            while($index<sizeof($_SESSION['cart'])){
        ?>
            <tr>
                <td><?=$_SESSION['cart'][$index]->productName?></td>
                <td><?=$_SESSION['cart'][$index]->productQuantity?></td>
                <td>$<?=$_SESSION['cart'][$index]->productPrice?></td>
            </tr>
        <?php $index++; } ?>
    </table>
    <br><br><br>
    <a href="category.php"><button>Back To Category Page</button></a>    
</body>
</html>