<?php
require "config.php";
require "../models/db.php";
require "../models/products.php";
$product = new Product;
if(isset($_POST['submit'])){
          $idsp = $_GET['idtam'];
          $name = $_POST['name'];
          $email = $_POST['email'];
          $content = $_POST['content'];
          $star = $_POST['rating'];
          $product->addReview($email, $name, $content, $star,$idsp);
          header('location: product.php?idtam='.$_GET['idtam']);
}