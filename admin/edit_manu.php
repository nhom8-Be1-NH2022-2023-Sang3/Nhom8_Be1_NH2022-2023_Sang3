<?php
include "config.php";
include "models/db.php";
include "models/manufacture.php";
$manufacture = new Manufacture;
if(isset($_POST['name']))
{
$id = $_POST['id'];
$name = $_POST['name'];
$manufacture->edit($name,$id);
header('location:manufacture.php');
}