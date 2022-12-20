<?php  session_start();
require "config.php";
require "../models/db.php";
require "../models/products.php";
 foreach($_SESSION['cart'] as $key=>$qty): 
    if(isset($_SESSION['cart'][$_GET['id']])){
         if($_SESSION['cart'][$_GET['id']] == $qty){
            var_dump($_SESSION['cart'][$_GET['id']]);
            unset($_SESSION['cart'][$_GET['id']]);
            
        }
    }
endforeach;
header('location:cart.php');
?>
