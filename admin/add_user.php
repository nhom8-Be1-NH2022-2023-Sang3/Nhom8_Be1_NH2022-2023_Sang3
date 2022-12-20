<?php
include "config.php";
include "models/db.php";
include "models/user.php";
$user = new User;
if(isset($_POST['username'])){
          $name = $_POST['username']; 
          $password = $_POST['password'];
          $role = isset( $_POST['role'])?1:0;
          //Them User
          if($user->CheckUser($name)==true){
              ?>
              <script>
              window.location.href = "user_add.php";
              alert("Ten dang nhap da ton tai");
              </script>
              <?php
          }
          else{
              $user->add($name,$password,$role);
              header('location: user.php');
          }
}