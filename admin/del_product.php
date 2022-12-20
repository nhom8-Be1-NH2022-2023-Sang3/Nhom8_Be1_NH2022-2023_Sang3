<?php
include "config.php";
include "models/db.php";
include "models/products.php";
$product = new Product;
if(isset($_GET['id'])){
$id = $_GET['id'];
$product->del($id);
header('location: product.php');
}
