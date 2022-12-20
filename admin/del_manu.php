<?php
include "config.php";
include "models/db.php";
include "models/manufacture.php";
$manu = new Manufacture;
$id = $_GET['id'];
if($manu->CheckDelByManu($id)==true){
          ?>
          <script>
          window.location.href = "manufacture.php";
          alert("Van con san pham loai nay");
          </script>
          <?php
}
else{
          $manu->del($id);
          header('location: manufacture.php');
}