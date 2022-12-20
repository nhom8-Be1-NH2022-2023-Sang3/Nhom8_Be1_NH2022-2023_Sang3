<?php
include "config.php";
include "models/db.php";
include "models/user.php";
$user = new User;
$id = $_GET['id_user'];
$user->del($id);
header('location: User.php');