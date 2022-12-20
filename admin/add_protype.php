<?php
include "config.php";
include "models/db.php";
include "models/products.php";
include "models/protypes.php";
include "models/manufacture.php";
$protype = new Protype;
if(isset($_POST['name'])){
    $name = $_POST['name']; 
    //Them manufacture
    $protype->add($name);
    header('location: protype.php');
}