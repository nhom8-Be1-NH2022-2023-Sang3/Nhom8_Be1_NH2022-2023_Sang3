
<?php
require "config.php";
require "../models/db.php";
require "../models/products.php";
//tao csdl
?>
        <?php
        $product = new Product;
        $products = $product -> getAllProducts(); 
        $cart = $product -> getAllProducts();
      	if(isset($_GET['id'])):
	    $id=$_GET['id'];
	    if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]++;
	   }
	   else
	  {
		$_SESSION['cart'][$id]=1;
	  }
      endif; ?>
    <?php


function demSL()
{
    $tong = 0;
    //$key : id san pham
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=>$qty): 
            if(isset($key)){
                $tong++;
            }
        endforeach;
    }else{
        $tong = 0;
    }
    return $tong;
}
function tinhtongtien()
{
$product = new Product;
$products = $product -> getAllProducts(); 
    $tong = 0;
    foreach($_SESSION['cart'] as $key=>$qty): 
        foreach($products as $value):
             if($key == $value['id']): 
                if($value['selling'] == 1){
                    $value['price']  = $value['price'] * 0.9;
                }else{
                    $value['price']  = $value['price'] * 1;
                }
                $tong+= $value['price']* $qty;
        endif;
    endforeach;
    endforeach;
    return $tong;
}
?>
