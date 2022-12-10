<?php
session_start();
include 'connection.php';
class Checkout {
    public $productId;
    public $productQuantity;
    public $productName;
    public $productPrice = 0;
}
$productID = $_GET['productID'];
$query = "SELECT * FROM products WHERE ProductID = $productID";
$action = mysqli_query($connect,$query);
$result = mysqli_fetch_object($action);
$cart = new Checkout();
$cart->productId = $result->ProductID;
$cart->productQuantity =  (int)$_POST['quantity'];
$cart->productName = $result->ProductName;
$cart->productPrice = $result->UnitPrice * $cart->productQuantity;
$index = 0; $check=0;
while($index<sizeof($_SESSION['cart'])){
    if($_SESSION['cart'][$index]->productId == $cart->productId){
        $_SESSION['cart'][$index]->productQuantity += $cart->productQuantity;
        $_SESSION['cart'][$index]->productPrice = $_SESSION['cart'][$index]->productQuantity*$result->price;
        $check = 1;
        header('location: cartPage.php');
    }
    $index++;
}
if($check == 0){
    array_push($_SESSION['cart'],$cart);
    header('location: cartPage.php');
}
