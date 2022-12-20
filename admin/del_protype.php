<?php
include "config.php";
include "models/db.php";
include "models/protypes.php";
$protype = new Protype;
$id = $_GET['id'];
if($protype->CheckDelByProtype($id)==true){
          ?>
          <script>
          window.location.href = "protype.php";
          alert("Van con san pham loai nay");
          </script>
          <?php
}
else{
          $protype->del($id);
          header('location: protype.php');
}