<?php
require "config.php";
require "db.php";
require "user.php";
$user = new User;
if(isset($_POST['submit'])&&$_POST['username']!=''&& $_POST['password']!=''&& $_POST['repassword']!=''){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $repassword = $_POST['repassword'];
          if($password!=$repassword)
          {
                    header('location: ../doantest/register.php');
          }  
          if($user->KiemTraUser($username)>0)
          {
                    header('location: ../doantest/register.php');  
          }
          $user->Them($username,$password);
          header('location: ../doantest/login.php');

          
}
?>
