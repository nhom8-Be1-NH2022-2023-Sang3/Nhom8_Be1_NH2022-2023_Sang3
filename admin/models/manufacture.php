<?php
class Manufacture extends Db
{
    public function getAllManu()
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `manufactures` ORDER BY `manu_id` ");
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
       return $data;
}
public function getManuById($manu_id)
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `manufactures` WHERE `manu_id` = ?");
       //chuyen du lieu thanh mang
       $sql->bind_param("i",$manu_id);
     $sql -> execute();//return the object
     $data = array();
       $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
       return $data;
}
public function CheckDelByManu($manu_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products,manufactures 
     WHERE products.manu_id=manufactures.manu_id AND  manufactures.manu_id = ? ");
     $sql->bind_param("i",$manu_id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> num_rows;
     if($data >= 1){
          return true;
     }
     else
     {
          return false;
     }
}
public function add($name)
{
     $sql = self::$connection->prepare("INSERT INTO `manufactures` (`manu_name`) 
     VALUES ('$name')");
     return $sql -> execute();//return the object
}
public function del($id)
{
     $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manufactures`.`manu_id` = $id");
     $sql -> execute();//return the object
}
public function edit($name,$id)
{
     $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name`=? WHERE `manu_id`=?");
     $sql->bind_param("si",$name,$id);
     return $sql -> execute();//return the object
}
}