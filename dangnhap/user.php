<?php
class User extends Db
{
  public function CheckLogin($username,$password)
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `username` = ? AND `password`=?" );
      $password = md5($password); 
      $sql->bind_param("ss",$username,$password);
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> num_rows;
       if($data == 1){
         return true;
       }else{
         return false;
       }
}
public function CheckRole($username,$password)
{
    //lay du lieu
      $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `username` = ? AND `password`=?" );
      $password = md5($password); 
      $sql->bind_param("ss",$username,$password);
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
      return $data[0]['role'];
}
//Kiem tra username da ton tai trong DataBase hay chua
public function KiemTraUser($username)
{
      $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `username` = ? ");
      $sql->bind_param("s",$username);
      $sql -> execute();//return the object
       //chuyen du lieu thanh mang
       $data = array();
       $data = $sql -> get_result()-> num_rows;
       return $data;    
}
//Them user
public function Them($username,$password){
  $password = md5($password);
  $sql = self::$connection->prepare(" INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password')" );
  $sql -> execute();    
}
}
?>
