<?php
include "config.php";
include "models/db.php";
include "models/protypes.php";
$protype = new Protype;
if(isset($_POST['name']))
{
$id = $_POST['id'];
$name = $_POST['name'];
$protype->edit($name,$id);
header('location:protype.php');
}