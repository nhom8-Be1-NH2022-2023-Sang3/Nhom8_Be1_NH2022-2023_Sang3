<?php
class Protype extends Db
{
public function getAllProtypes()
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `protypes` ORDER BY `type_id` ");
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
       return $data;
}
public function getProtypeById($type_id)
{
          //lay du lieu
          $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id` = ?");
          //chuyen du lieu thanh mang
          $sql->bind_param("i",$type_id);
          $sql -> execute();//return the object
          $data = array();
          $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
          return $data;
}
public function CheckDelByProtype($type_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products,protypes 
     WHERE products.type_id=protypes.type_id AND  protypes.type_id = ? ");
     $sql->bind_param("i",$type_id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> num_rows;
     if($data >= 1){
          return true;
     }else{
          return false;
     }
}
public function add($name)
{
     $sql = self::$connection->prepare("INSERT INTO `protypes` (`type_name`) 
     VALUES ('$name')");
     return $sql -> execute();//return the object
}
public function edit($name,$id)
{
     $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`=? WHERE `type_id`=?");
     $sql->bind_param("si",$name,$id);
     return $sql -> execute();//return the object
}
public function del($id)
{
     $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `protypes`.`type_id` = $id");
     return $sql -> execute();//return the object
}
}
?>