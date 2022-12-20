<?php
include "config.php";
include "models/db.php";
include "models/products.php";
include "models/protypes.php";
include "models/manufacture.php";
$product = new Product;
if(isset($_POST['name'])){
    $name = $_POST['name']; 
    $manu_id =$_POST['manu'];
    $type_id = $_POST['protype'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $feature = isset( $_POST['feature'])?1:0;
    $selling = isset( $_POST['selling'])?1:0;
    //Them product
    $product->add($name,$manu_id,$type_id,$price,$image,$description,$feature,$selling);
    //Xu li hinh
    $target_dir = "../doantest/img/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
    header('location: product.php');
}