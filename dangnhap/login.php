<?php
//session_start();
require "config.php";
require "db.php";
require "user.php";
$user = new User();
if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($user->CheckLogin($username,$password)){
        $password = $_POST['password'];
        $role = $user->CheckRole($username,$password);
        
        if($role==1){
            $_SESSION['role'] = $role;
            header('location: ../admin/index.php');
        }
        else
        {
            $_SESSION['user'] = $username;
            header('location: ../doantest/home.php');
        }
    }else{
        header('location: ../doantest/login.php');
    }
}

    