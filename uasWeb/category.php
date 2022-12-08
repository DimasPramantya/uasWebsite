<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
$query = 'SELECT * FROM categories';
$action = mysqli_query($connect,$query);
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
            <th>Category Name</th>
            <th>Description</th>
        </tr>
        <?php
            while($category = mysqli_fetch_object($action)){
        ?>
            <tr>
                <td>
                    <a href="product.php?categoryID=<?=$category->CategoryID?>"><?=$category->CategoryName?></a>
                </td>
                <td>
                    <?= $category->Description ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><br><br>
    <a href="logout.php"><button>Log Out</button></a>
</body>
</html>