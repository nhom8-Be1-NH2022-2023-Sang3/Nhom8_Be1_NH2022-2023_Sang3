<?php
class User extends Db{
          public function getAllUsers()
          {
          //lay du lieu
                    $sql = self::$connection->prepare("SELECT * FROM `user`");
                    $sql -> execute();//return the object
                    //chuyen du lieu thanh mang
                    $data = array();
                    $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
                    return $data;
          }
          public function getUserById($user_id)
          {
                    //lay du lieu
                    $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `id_user` = ?");
                    //chuyen du lieu thanh mang
                    $sql->bind_param("i",$user_id);
                    $sql -> execute();//return the object
                    $data = array();
                    $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
                    return $data;
          }  
          public function CheckUser($username)
          {
                    //lay du lieu
                    $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `username` = ?" );
                    $sql->bind_param("s",$username);
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
          //Thêm        
          public function add($username,$password,$role)
          {
                    $password = md5($password);
                    $sql = self::$connection->prepare(" INSERT INTO `user` (`username`, `password`,`role`) VALUES (?,?,?)" );
                    $sql->bind_param("ssi",$username,$password,$role);
                    $sql -> execute();    
          }
          //Sửa
          public function edit($password,$role,$id)
          {
                    $password = md5($password);
                    $sql = self::$connection->prepare("UPDATE `user` SET `password` = ?, `role` = ? WHERE `user`.`id_user` = ?");
                    $sql->bind_param("sii",$password,$role,$id);
                    return $sql -> execute();//return the object
          }
          // Xóa
          public function del($id)
          {
                    $sql = self::$connection->prepare("DELETE FROM `user` WHERE `user`.`id_user` = $id");
                    return $sql -> execute();//return the object
          }
}