<?php
class Manufacture extends Db
{
public function getAllManu()
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `manufactures`");
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
       return $data;
}
}
?>