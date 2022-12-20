<?php
include "config.php";
include "models/db.php";
include "models/user.php";
$user = new User;
if(isset($_POST['password']))
{
$id = $_POST['id'];
$password = $_POST['password'];
$role = isset( $_POST['role'])?1:0;
$user->edit($password,$role,$id);
header('location:user.php');
}