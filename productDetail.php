<?php
session_start();
include 'connection.php';
$productID = $_GET['productID'];
$query = "SELECT * FROM products WHERE ProductID = $productID";
$action = mysqli_query($connect, $query);
$result = mysqli_fetch_object($action);
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
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Supplier ID</th>
            <th>Category ID</th>
            <th>Quantity Per Unit</th>
            <th>Unit Price</th>
            <th>Units In Stock</th>
            <th>Units On Order</th>
            <th>Reorder Level</th>
            <th>Discontinued</th>
        </tr>
        <tr>
            <td><?=$result->ProductID?></td>
            <td><?=$result->ProductName?></td>
            <td><?=$result->SupplierID?></td>
            <td><?=$result->CategoryID?></td>
            <td><?=$result->QuantityPerUnit?></td>
            <td><?=$result->UnitPrice?></td>
            <td><?=$result->UnitsInStock?></td>
            <td><?=$result->UnitsOnOrder?></td>
            <td><?=$result->ReorderLevel?></td>
            <td><?=$result->Discontinued?></td>
        </tr>
    </table>
    <br><br>
    <form action="cart.php?productID=<?=$result->ProductID?>" method="post">
        <label for="Quantity">Quantity</label>
        <input type="test" name="quantity">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>