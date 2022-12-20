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
}
?>