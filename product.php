<?php
    session_start();
    include 'connection.php';
    $categoryID = $_GET['categoryID'];
    $query = "SELECT * FROM products WHERE CategoryID = $categoryID";
    $action = mysqli_query($connect, $query);
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
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Unit Price</th>
        </tr>
        <?php
            while($product = mysqli_fetch_object($action)){
        ?>
            <tr>
                <td><?=$product->ProductID?></td>
                <td><a href="productDetail.php?productID=<?=$product->ProductID?>"><?=$product->ProductName?></a></td>
                <td>$<?=$product->UnitPrice?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>